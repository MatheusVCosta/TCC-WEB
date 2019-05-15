<?php

class Email_marketingDAO{

        private $conex;
        public function __construct(){
            require_once('model/email_marketingClass.php');
            require_once('model/dao/conexaoMysql.php');
            $this->conex = new  conexaoMysql();
        }

        public function insert($email_marketing){
            
            $sql = "INSERT INTO tbl_email_mkt(email)".
                   "VALUES('".$email_marketing->getEmail()."')";
            
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
            $sql = " DELETE FROM tbl_email_mkt where id = $id ";

            $PDO_conex = $this->conex->connect_database();


            if($PDO_conex->query($sql)){
                   echo "Registro deletado !";
            } else {
                    echo "Registro não encontrado!! $sql";
                    return 0;
            }
        }

        public function selectAll(){

            $sql = " SELECT * FROM tbl_email_mkt";
            
            $PDO_conex = $this->conex->connect_database();

            $select = $PDO_conex->query($sql);

            $listar_registros = array();

            while($rs_email_marketing = $select->fetch(PDO::FETCH_ASSOC)){
                

                $email_marketing = new Email_marketing();
                $email_marketing->setId($rs_email_marketing['id'])
                        ->setEmail($rs_email_marketing['email']);

                $listar_registros[] = $email_marketing;
                
            }
        
            $this->conex->close_database();

            return $listar_registros;

        }
        public function selectById($id){

            $sql = " SELECT * FROM tbl_email_mkt where id = $id ";

            $PDO_conex = $this->conex->connect_database();

            $select = $PDO_conex->query($sql);

            if($rs_usuario = $select->fetch(PDO::FETCH_ASSOC)){

                $email_marketing = new Email_marketing();
                $email_marketing->setId($rs_email_marketing['id'])
                        ->setEmail($rs_email_marketing['email']);

                return $usuario;

            } else {
                    echo "Registro não encontrado!!";
                    return 0;
            }

        }
}

?>