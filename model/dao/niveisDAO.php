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
            }else{
                echo "Erro no script de insert";
            }
            $this->conex->close_database();
        }

        public function delete($id){
            $sql = "DELETE FROM tbl_niveis where id_niveis=".$id;

            $PDO_conex = $this->conex->connect_database();

            if($PDO_conex->query($sql)){
                echo "Insert com sucesso";
            }else{
                echo "Erro no script de insert";
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
                       ->setDescricao($rs_niveis['descricao']);           
                        
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
            }
            $this->conex->close_database();

            return $listar_niveis;
        }


    }

?>