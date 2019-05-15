<?php


class  MarcaDAO{
    private $conex;
    
    public function __construct(){
        require_once('model/marcaClass.php');
        require_once('model/dao/conexaoMysql.php');
        $this->conex = new  conexaoMysql();
    }

    public function insert($marca,$tipo){

        $sql = "insert into tbl_marca_veiculo(nome_marca)".
               "VALUES('" . $marca->getNome() . "')";

        //Abrido conexao com o BD
        $PDO_conex = $this->conex->connect_database();


        if($PDO_conex->query($sql)){//Inserindo Marca

            $id_marca = $PDO_conex->lastInsertId();//ID da marca inserida

            $sql = "insert into tbl_marca_veiculo_tipo_veiculo(id_tipo_veiculo,id_marca_veiculo)".
                   "VALUES('" . $tipo->getId() . "',$id_marca)";
                
            if($PDO_conex->query($sql)){// Vinculando Marca com o tipo de veiculo

                echo "Insert com sucesso";
            
            }else{
            
                echo "Erro no script de insert";
            
            }
        }else{
            echo "Erro no script de insert";
        }
        $this->conex->close_database();
    }

    public function update($marca){

        
        $sql = "UPDATE tbl_marca_veiculo SET nome_marca ='".$marca->getNome()."' ". 
               "WHERE id_marca_veiculo =".$marca->getId();

        //Abrido conexao com o BD
        $PDO_conex = $this->conex->connect_database();


        if($PDO_conex->query($sql)){

            echo "update com sucesso";
            return true;
        } else {
            echo "Erro no script de update";
            return false;
        }
        
    }

    public function delete($id,$id_tipo_veiculo){
        /* Em desenvolvimento */
        $sql = "UPDATE tbl_marca_veiculo_tipo_veiculo SET excluido = 1 WHERE id_marca_veiculo = $id AND id_tipo_veiculo= $id_tipo_veiculo";

        $PDO_conex = $this->conex->connect_database();

        if($PDO_conex->query($sql)){
            
            echo " Marca excluido com sucesso ";

            return true;
            
        } else {

            echo " Erro ao excluir o Marca ";

            return false;
        }

        $this->conex->close_database();

    }

    public function status($id_marca,$status){

        echo "CHegou em status ";

        $sql = "UPDATE tbl_marca_veiculo SET status='$status' WHERE id_marca_veiculo=".$id_marca;

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

    public function select($id){
        $sql = "SELECT * FROM tbl_marca_veiculo where id_marca_veiculo =".$id;

        //Abrido conexao com o BD
        $PDO_conex = $this->conex->connect_database();
        
        $select = $PDO_conex->query($sql);


        if($rs_marca = $select->fetch(PDO::FETCH_ASSOC)){
            
            $marca = new Marca();

            $marca->setId($rs_marca['id_marca_veiculo'])
                  ->setNome($rs_marca['nome_marca'])
                  ->setStatus($rs_marca['status']);
            
            return $marca;

        } else {

            echo "Erro no marca não encontrada";

        }
    }
    /* FIP */
    public function updateByFIP($marca,$tipo){

        echo "Chegou no updateByFIP \n ";
       

        // Abrido conexao com o BD
        $PDO_conex = $this->conex->connect_database();

        if($marcaAnterior = $this->selectByCodFIP($marca->getCodFIP())){
            
            $marcaAnterior->setNome($marca->getNome());// Definindo o novo nome recebido
            
            /* Fazendo o update !! */
            if($this->update($marcaAnterior)){
                $marca->setId($marcaAnterior->getId());
            }

        } else {// Cria se não existir
            echo "Criano Marca ";
            $sql = "insert into tbl_marca_veiculo(nome_marca,cod_fip)".
               "VALUES('" . $marca->getNome() . "','". $marca->getCodFIP() ."')";

            if($PDO_conex->query($sql)){//Inserindo Marca

                $marca->setId($PDO_conex->lastInsertId());//ID da marca inserida

            }else{
                echo "Erro Desconhecido na exportação ao inserir a marca ";
            }


        }


        $sql = "SELECT * FROM tbl_marca_veiculo_tipo_veiculo WHERE id_tipo_veiculo = ". $tipo->getId() ." AND  id_marca_veiculo=". $marca->getId();

        $rows = $PDO_conex->query($sql);

        /* VERIFICANDO SE A MARCA JÁ ESTA VINCULADO AO Tipo de veiculo */
        if($rows->rowCount() < 1 ){
            
            echo " |Entrou| ";
            // inserindo o vinculo

            $sql = "insert into tbl_marca_veiculo_tipo_veiculo(id_tipo_veiculo,id_marca_veiculo)".
                   "VALUES('" . $tipo->getId() . "',". $marca->getId() .")";
                
            if($PDO_conex->query($sql)){// Vinculando Marca com o tipo de veiculo

                echo "Insert com sucesso";
            
            }else{
            
                echo "Erro no script de insert";
            
            }

        } else {

            echo "Vinculo ja existente";
        }



    }

    public function selectByCodFIP($cod_fip){


        $sql = "SELECT * FROM tbl_marca_veiculo where cod_fip =".$cod_fip;

        //Abrido conexao com o BD
        $PDO_conex = $this->conex->connect_database();
        
        $select = $PDO_conex->query($sql);


        if($rs_marca = $select->fetch(PDO::FETCH_ASSOC)){
            
            $marca = new Marca();

            $marca->setId($rs_marca['id_marca_veiculo'])
                  ->setNome($rs_marca['nome_marca'])
                  ->setCodFIP($rs_marca['cod_fip']);
            
            return $marca;

        } else {

            echo "Erro no marca não encontrada";

            return false;

        }
    }

}



?>