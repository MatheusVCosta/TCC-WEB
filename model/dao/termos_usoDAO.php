<?php
    class Termos_usoDao{

        private $conex;
        // metodo construtor da classe - 
        public function __construct(){
            require_once('model/termos_usoClass.php');
            require_once('model/dao/conexaoMysql.php');
            $this->conex = new conexaoMysql();
        }

        public function insert($termos_uso){
            
            $sql = "insert into tbl_termos_uso(titulo,texto,status)".
               "VALUES('". $termos_uso->getTitulo() ."','". $termos_uso->getTexto() ."',". $termos_uso->getStatus() .")";

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
                
            $sql = " DELETE FROM tbl_termos_uso where id = $id ";

            $PDO_conex = $this->conex->connect_database();


            if($PDO_conex->query($sql)){
                   echo "Registro deletado !";
            } else {
                    echo "Registro não encontrado!! $sql";
                    return 0;
            }

        }
        public function update($termos_uso){
        
                $sql = "UPDATE tbl_termos_uso SET titulo='" . $termos_uso->getTitulo() . "' , texto='" . $termos_uso->getTexto() . "' " .
                       ", status = ".$termos_uso->getStatus() ." ".
                       " WHERE id =".$termos_uso->getId(). " ";
                echo $sql;
                //Abrido conexao com o BD
                $PDO_conex = $this->conex->connect_database();

                if($PDO_conex->query($sql)){
                    echo "update com sucesso";
                } else {
                    echo "Erro no script de update";
                }

                $this->conex->close_database();
        }
        public function selectPage(){
            
            $sql = " SELECT * FROM tbl_termos_uso order by id desc limit 1";
            
            $PDO_conex = $this->conex->connect_database();

            $select = $PDO_conex->query($sql);

            $listar_registros = array();

           if($rs_termos_uso = $select->fetch(PDO::FETCH_ASSOC)){


                $termos_uso = new Termos_uso();
                $termos_uso->setId($rs_termos_uso['id'])
                           ->setTitulo($rs_termos_uso['titulo'])
                           ->setTexto($rs_termos_uso['texto'])
                           ->setStatus($rs_termos_uso['status']);

                $this->conex->close_database();

                return $termos_uso;

            } else {

                $this->conex->close_database();
                echo "Registro não encontrado!!";

               return false;
            }
        
                
        }
        public function selectAll(){
            
            $sql = " SELECT * FROM tbl_termos_uso";
            
            $PDO_conex = $this->conex->connect_database();

            $select = $PDO_conex->query($sql);

            $listar_registros = array();

            while($rs_termos_uso = $select->fetch(PDO::FETCH_ASSOC)){
                

                $termos_uso = new Termos_uso();
                $termos_uso->setId($rs_termos_uso['id'])
                            ->setTitulo($rs_termos_uso['titulo'])
                            ->setTexto($rs_termos_uso['texto'])
                            ->setStatus($rs_termos_uso['status']);

                $listar_registros[] = $termos_uso;
                
            }
        
            $this->conex->close_database();

            return $listar_registros;


                
        }
        public function selectById($id){
            
            $sql = " SELECT * FROM tbl_termos_uso where id = $id ";

            $PDO_conex = $this->conex->connect_database();

            $select = $PDO_conex->query($sql);

            if($rs_termos_uso = $select->fetch(PDO::FETCH_ASSOC)){

            $termos_uso = new Termos_uso();
            $termos_uso->setId($rs_termos_uso['id'])
                       ->setTitulo($rs_termos_uso['titulo'])
                       ->setTexto($rs_termos_uso['texto'])
                       ->setStatus($rs_termos_uso['status']);

                return $termos_uso;

            } else {
                    echo "Registro não encontrado!!";
                    return false;
            }


        }

    }
?>
