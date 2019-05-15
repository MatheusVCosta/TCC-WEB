<?php

    class AcessorioDAO{

        private $conex;

        public function __construct(){
            require_once('model/acessorioClass.php');
            require_once('model/dao/conexaoMysql.php');
            $this->conex = new  conexaoMysql();
        }

        public function insert($acessorio){
            
            $sql = " INSERT INTO tbl_acessorios(nome_acessorios,id_tipo_veiculo)".
                   " VALUES('". $acessorio->getNome() ."',". $acessorio->getIdTipoVeiculo() .")";
            
             //Abrido conexao com o BD
            $PDO_conex = $this->conex->connect_database();

            if($PDO_conex->query($sql)){

                echo "inserido com sucesso";

            } else {

                echo "Erro no script de insert";

            }

            

        }

        public function delete($id){
            
            /* Em desenvolvimento */
            $sql = "UPDATE tbl_acessorios SET excluido = 1 WHERE id_acessorios = $id";

            $PDO_conex = $this->conex->connect_database();

            if($PDO_conex->query($sql)){

                 echo " acessorio excluida com sucesso ";

                 return true;

            } else {

                 echo " Erro ao excluir o Modelo ";

                 return false;
            }

            $this->conex->close_database();

        
        }

        public function update($acessorio){

            $sql = "UPDATE tbl_acessorios SET nome_acessorios='". $acessorio->getNome() ."' WHERE id_acessorios=".$acessorio->getId();

             //Abrido conexao com o BD
            $PDO_conex = $this->conex->connect_database();

            if($PDO_conex->query($sql)){

                echo "atualizado com sucesso";

            } else {

                echo "Erro no script de atualização";

            }
            
        }
        public function status($id_acessorios,$status){

            echo "CHegou em status ";
            
            $sql = "UPDATE tbl_acessorios SET status='$status' WHERE id_acessorios=".$id_acessorios;

             //Abrido conexao com o BD
            $PDO_conex = $this->conex->connect_database();

            if($PDO_conex->query($sql)){

                echo "atualizado com sucesso";
                
                return true;
            
            } else {

                echo "Erro no script de atualização";
                
                return false;

            }   
        }
        public function selectAll(){
            

        }
        public function selectById($id){
            
            $sql = "SELECT * FROM tbl_acessorios where id_acessorios =".$id;


            $PDO_conex = $this->conex->connect_database();

            $select = $PDO_conex->query($sql);


            if($rs_acessorio = $select->fetch(PDO::FETCH_ASSOC)){

                $acessorio = new Acessorio();

                $acessorio->setId($rs_acessorio['id_acessorios'])
                          ->setNome($rs_acessorio['nome_acessorios'])
                          ->setStatus($rs_acessorio['status'])
                          ->setIdTipoVeiculo($rs_acessorio['id_tipo_veiculo']);

                
                $this->conex->close_database();


                return $acessorio;

            } else {
                
                $this->conex->close_database();

                return false;
            }



        }
        /* Retorna um veotr de acessorios com estado false para s eo veiculo não possui e true para caso possui */
        public function selectByVeiculo($veiculo){
            
            $sql =  "SELECT *,tbl_acessorios.status as 'statusAcessorio',if(tbl_acessorio_veiculo.id_veiculo IS NOT null,TRUE,FALSE) as 'estado' FROM tbl_tipo_veiculo left join tbl_acessorios ".
                    "on tbl_tipo_veiculo.id_tipo_veiculo = tbl_acessorios.id_tipo_veiculo ".
                    "left join tbl_acessorio_veiculo on ".
                    "( tbl_acessorio_veiculo.id_acessorio = tbl_acessorios.id_acessorios AND  tbl_acessorio_veiculo.id_veiculo = ". $veiculo->getId() .") ".
                    "WHERE tbl_tipo_veiculo.id_tipo_veiculo =" . $veiculo->getIdTipoVeiculo();
            
            $PDO_conex = $this->conex->connect_database();

            $select = $PDO_conex->query($sql);
                
            $lista_acessorio = array();

            while($rs_acessorio = $select->fetch(PDO::FETCH_ASSOC)){

                $acessorio = new Acessorio();

                $acessorio->setId($rs_acessorio['id_acessorios'])
                          ->setNome($rs_acessorio['nome_acessorios'])
                          ->setIdTipoVeiculo($rs_acessorio['id_tipo_veiculo'])
                          ->setStatus($rs_acessorio['statusAcessorio'])
                          ->setEstado($rs_acessorio['estado']);


                $lista_acessorio[] = $acessorio;

            }

            $this->conex->close_database();

            return $lista_acessorio;
        }


    }

?>