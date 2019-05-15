<?php

    class NiveisDao{
        
        private $conex;
        public function __construct(){
            require_once('model/dao/conexaoMysql.php');
            $this->conex = new  conexaoMysql();
        }

        public function insert($nivel){
            
            $sql ="INSERT into tbl_niveis (nome_nivel, descricao) VALUES 
            ('".$nivel->getNome_nivel()."','".$nivel->getDescricao()."')";

            //Abrido conexao com o BD
            $PDO_conex = $this->conex->connect_database();

            if($PDO_conex->query($sql)){
                echo "Insert com sucesso";

                $id_niveis = $PDO_conex->lastInsertId();//ID do nivel inserido
                
                $nivel->setId_niveis($id_niveis);

                $this->vincularMenu($nivel->getListaMenu(),$nivel);

            }else{
                echo "Erro no script de insert";
            }
            $this->conex->close_database();
        }

        public function delete($id){
            $sql = "UPDATE tbl_niveis SET excluido = 1 WHERE id_niveis=".$id;

            $PDO_conex = $this->conex->connect_database();

            if($PDO_conex->query($sql)){
                echo "Delete com sucesso";
            }else{
                echo "Erro no script de DELETE ";
            }
            $this->conex->close_database();
        }

        public function update($nivel){
            
            $sql = "UPDATE tbl_niveis set
            nome_nivel='".$nivel->getNome_nivel()."',
            descricao='".$nivel->getDescricao()."'
            WHERE id_niveis=".$nivel->getId_niveis();

            $PDO_conex = $this->conex->connect_database();


            if($PDO_conex->query($sql)){
                echo "Update com sucesso";

                $this->vincularMenu($nivel->getListaMenu(),$nivel);
                
            }else{
                echo "Erro no script de insert";
            }
            $this->conex->close_database();
        }
        public function selectAll(){
            //script para rodar no banco
            $sql = "SELECT * FROM tbl_niveis order by id_niveis desc";
            
            $PDO_conex = $this->conex->connect_database();

            $select = $PDO_conex->query($sql);
               
            $listar_niveis = array();
            //Carregar todos os dados que estão no banco e guardando dentro
            //de um array local
            while($rs_niveis = $select->fetch(PDO::FETCH_ASSOC)){

                $niveis = new Niveis();
                $niveis->setId_niveis($rs_niveis['id_niveis'])
                       ->setNome_nivel($rs_niveis['nome_nivel'])
                       ->setDescricao($rs_niveis['descricao'])
                       ->setListaMenu($this->selectMenu($rs_niveis['id_niveis']))
                       ->setExcluido($rs_niveis['excluido']);
                        
                $listar_niveis[] = $niveis;
            }

           

            $this->conex->close_database();

            return $listar_niveis;

        }
        public function selectById($id){
            $sql = "SELECT * FROM tbl_niveis WHERE id_niveis =".$id;

            $PDO_conex = $this->conex->connect_database();

            $select = $PDO_conex->query($sql);

            if($rs_niveis = $select->fetch(PDO::FETCH_ASSOC)){

                $listar_niveis = new Niveis();
                
                $listar_niveis->setId_niveis($rs_niveis['id_niveis']);
                
                $listar_niveis->setNome_nivel($rs_niveis['nome_nivel']);
                
                $listar_niveis->setDescricao($rs_niveis['descricao']);

                $listar_niveis->setExcluido($rs_niveis['excluido']);

                $listar_niveis->setListaMenu($this->selectMenu($rs_niveis['id_niveis']));
            }

            $this->conex->close_database();

            return $listar_niveis;
        }
        /*
         * Recebe um list acom os ids de cada menu
         * Recebe um objeto Nivel
         */
        public function vincularMenu($lista_menus,$nivel){

            $sql = "DELETE FROM tbl_niveis_menu WHERE id_niveis = ".$nivel->getId_niveis();

            $PDO_conex = $this->conex->connect_database();

            if($PDO_conex->query($sql)){
                echo "Permições Anteirores apagadas com sucesso";
            }
            foreach($lista_menus as $id_menu){
                $sql = "INSERT INTO `mob_share`.`tbl_niveis_menu`(`id_menu`,`id_niveis`)".
                       "VALUES($id_menu,". $nivel->getId_niveis() .")";
                if($PDO_conex->query($sql)){
                    echo "Permições Adicionada com sucesso";
                }else{
                    echo "Erro ao adicionar a permição ";    
                }
            }
        }
        /* Essa função retorna um vetor com o menu 
         * recebe como parametro o nivel desejado 
         * se o dado não for informado retorna um vetor
         * com os itens do vetor não selecionados
         */
        public function selectMenu($id_niveis = 0){
            /* Precisa de um left join  */
            $sql = "SELECT tbl_menu.*,if(tbl_niveis_menu.id_niveis is not null,'selected','') as 'selecionado' FROM tbl_menu left join tbl_niveis_menu ".
                   "on (tbl_menu.id_menu = tbl_niveis_menu.id_menu AND tbl_niveis_menu.id_niveis = $id_niveis);";
            $lista_menu = array();

            $PDO_conex = $this->conex->connect_database();

            $select = $PDO_conex->query($sql);

           while($rs_menu = $select->fetch(PDO::FETCH_ASSOC)){

                $menu = new menu();
                
                $menu->setId($rs_menu['id_menu'])
                     ->setNome($rs_menu['nome_menu'])
                     ->setHref($rs_menu['href'])
                     ->setIcone($rs_menu['icone'])
                     ->setClick($rs_menu['onclick'])
                     ->setSelecionado($rs_menu['selecionado']);
                
                $lista_menu [] = $menu;
            }

            $this->conex->close_database();

            return $lista_menu;
        }
    }

?>