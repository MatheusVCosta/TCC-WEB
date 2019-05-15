<?php

class Fale_conoscoDAO{

        private $conex;
        public function __construct(){
            require_once('model/fale_conoscoClass.php');
            require_once('model/dao/conexaoMysql.php');
            $this->conex = new  conexaoMysql();
        }
        public function insert($fale_conosco){
            
            $sql = "INSERT INTO tbl_fale_conosco(nome_fale_conosco,email_fale_conosco,telefone_fale_conosco,celular_fale_conosco,mensagem_fale_conosco)".
                   "VALUES('". $fale_conosco->getNome() ."','". $fale_conosco->getEmail() ."',". 
                   "'". $fale_conosco->getTelefone() ."',".
                   "'". $fale_conosco->getCelular() ."','". $fale_conosco->getMensagem() ."')";
            
            $PDO_conex = $this->conex->connect_database();


            if($PDO_conex->query($sql)){
                   echo "Registro inserido com sucesso ";
                   return true;
            } else {
                   echo "Erro no script de insert!! $sql";
                   return false;
            }
        }
        public function delete($id){
            $sql = " DELETE FROM tbl_fale_conosco where id_fale_conosco = $id ";

            $PDO_conex = $this->conex->connect_database();


            if($PDO_conex->query($sql)){
                   echo "Registro deletado !";
            } else {
                    echo "Registro não encontrado!! $sql";
                    return 0;
            }
        }

        public function selectAll(){

            $sql = " SELECT * FROM tbl_fale_conosco";
            
            $PDO_conex = $this->conex->connect_database();

            $select = $PDO_conex->query($sql);

            $listar_registros = array();

            while($rs_fale_conosco = $select->fetch(PDO::FETCH_ASSOC)){
                

                $fale_conosco = new Fale_conosco();
                $fale_conosco->setId($rs_fale_conosco['id_fale_conosco'])
                        ->setNome($rs_fale_conosco['nome_fale_conosco'])
                        ->setEmail($rs_fale_conosco['email_fale_conosco'])
                        ->setCelular($rs_fale_conosco['celular_fale_conosco'])
                        ->setMensagem($rs_fale_conosco['mensagem_fale_conosco']);

                $listar_registros[] = $fale_conosco;
                
            }
        
            $this->conex->close_database();

            return $listar_registros;

        }
        public function selectById($id){

            $sql = " SELECT * FROM tbl_fale_conosco where id_fale_conosco = $id ";

            $PDO_conex = $this->conex->connect_database();

            $select = $PDO_conex->query($sql);

            if($rs_fale_conosco = $select->fetch(PDO::FETCH_ASSOC)){

                $fale_conosco = new Fale_conosco();
                $fale_conosco->setId($rs_fale_conosco['id_fale_conosco'])
                        ->setNome($rs_fale_conosco['nome_fale_conosco'])
                        ->setEmail($rs_fale_conosco['email_fale_conosco'])
                        ->setCelular($rs_fale_conosco['celular_fale_conosco'])
                        ->setMensagem($rs_fale_conosco['mensagem_fale_conosco']);

                return $fale_conosco;

            } else {
                    echo "Registro não encontrado!!";
                    return 0;
            }

        }
}

?>