<?php

    class SejaParceiroTopicoDAO{
        
        private $conex;

        public function __construct(){

            require_once('model/topicoParceiroClass.php');

            require_once('model/dao/conexaoMysql.php');
            
            $this->conex = new  conexaoMysql();

        }

        public function insert($topico){
           
            $sql = "INSERT INTO tbl_seja_parceiro(titulo_seja_parceiro,texto_seja_parceiro,foto_seja_parceiro)VALUES('". $topico->getTitulo() ."','". $topico->getTexto() ."','" . $topico->getFoto() ."')";

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
            
            $sql = "DELETE FROM tbl_seja_parceiro WHERE id_seja_parceiro= $id ";

            $PDO_conex = $this->conex->connect_database();


            if($PDO_conex->query($sql)){
               echo " Topico deletado com sucesso";
            } else {
               echo "topico não encontrado!! $sql";
               return 0;
            }
        }
        
        public function update($topico){
            
            $sql = "UPDATE tbl_seja_parceiro SET ".
                   "titulo_seja_parceiro = '". $topico->getTitulo() ."',".
                   "texto_seja_parceiro  = '". $topico->getTexto() ."',".
                   "foto_seja_parceiro   = '". $topico->getFoto() ."'".
                   "WHERE id_seja_parceiro =".$topico->getId();
            
            //Abrido conexao com o BD
            $PDO_conex = $this->conex->connect_database();

            if($PDO_conex->query($sql)){
                echo "Update com sucesso";
            }else{
                echo "Erro no script de update $sql";
            }

            $this->conex->close_database();
        }
        public function updateBanner($banner){


           $sql = "INSERT INTO tbl_seja_parceiro_banner(texto1_seja_parceiro_banner,texto2_seja_parceiro_banner,texto3_seja_parceiro_banner,foto1_seja_parceiro_banner,foto2_seja_parceiro_banner,status)".
                  "VALUES('". $banner->getTexto1() ."','". $banner->getTexto2() ."',".
                  "'". $banner->getTexto3() ."','". $banner->getFoto1() ."',".
                  "'". $banner->getFoto2() ."',". $banner->getStatus() .")";

           //Abrido conexao com o BD
           $PDO_conex = $this->conex->connect_database();

           if($PDO_conex->query($sql)){
                echo "Update com sucesso";
           }else{
                echo "Erro no script de update $sql";
           }

            $this->conex->close_database();
        }
        
        public function selectBanner(){
/* Parei aqui */
            $sql = "SELECT * FROM tbl_seja_parceiro_banner order by id_seja_parceiro_banner desc limit 1";
            
            $PDO_conex = $this->conex->connect_database();

            $select = $PDO_conex->query($sql);
            
            if($rs_banner = $select->fetch(PDO::FETCH_ASSOC)){

                $banner = new PaginaParceiroBanner();

                $banner->setId($rs_banner['id_seja_parceiro_banner'])
                       ->setTexto1($rs_banner['texto1_seja_parceiro_banner'])
                       ->setTexto2($rs_banner['texto2_seja_parceiro_banner'])
                       ->setTexto3($rs_banner['texto3_seja_parceiro_banner'])
                       ->setFoto1($rs_banner['foto1_seja_parceiro_banner'])
                       ->setFoto2($rs_banner['foto2_seja_parceiro_banner'])
                       ->setStatus($rs_banner['status']);

                return $banner;

            } else {
                 echo "Banner não encontrado!!";
                 return false;
            }   
        }
        public function selectAll(){

            
            $sql = "SELECT * FROM tbl_seja_parceiro";
            
            $PDO_conex = $this->conex->connect_database();

            $select = $PDO_conex->query($sql);

            $listar_topicos = array();

            while($rs_topico = $select->fetch(PDO::FETCH_ASSOC)){
                

                $topico = new TopicoParceiro();

                $topico->setId($rs_topico['id_seja_parceiro'])
                       ->setTitulo($rs_topico['titulo_seja_parceiro'])
                       ->setTexto($rs_topico['texto_seja_parceiro'])
                       ->setFoto($rs_topico['foto_seja_parceiro']);

                $listar_topicos[] = $topico;
                
            }
        
            $this->conex->close_database();

            return $listar_topicos;

        }
        public function selectById($id){
            
            $sql = "SELECT * FROM tbl_seja_parceiro WHERE id_seja_parceiro=$id";
            
            $PDO_conex = $this->conex->connect_database();

            $select = $PDO_conex->query($sql);

            if($rs_topico = $select->fetch(PDO::FETCH_ASSOC)){

                $topico = new TopicoParceiro();

                $topico->setId($rs_topico['id_seja_parceiro'])
                       ->setTitulo($rs_topico['titulo_seja_parceiro'])
                       ->setTexto($rs_topico['texto_seja_parceiro'])
                       ->setFoto($rs_topico['foto_seja_parceiro']);

                return $topico;

            } else {
                    echo "Topico não encontrado!!";
                    return false;
            }

        }

    }

?>