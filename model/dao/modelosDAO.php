<?php


class  ModeloDAO{
    private $conex;
    
    public function __construct(){
        require_once('model/modeloClass.php');
        require_once('model/dao/conexaoMysql.php');
        $this->conex = new  conexaoMysql();
    }

    public function insert($modelo){

        $sql = "insert into tbl_modelo_veiculo(nome_modelo,id_marca_tipo)".
               "VALUES('" . $modelo->getNome() . "',". $modelo->getIdTipoMarca() .")";

        //Abrido conexao com o BD
        $PDO_conex = $this->conex->connect_database();

        if($PDO_conex->query($sql)){
            echo "Insert com sucesso";
        }else{
            echo "Erro no script de insert";
        }
        $this->conex->close_database();
    }

    public function update($modelo){
        
        $sql = "UPDATE tbl_modelo_veiculo SET nome_modelo='" . $modelo->getNome() . "', id_marca_tipo='" . $modelo->getIdTipoMarca() . "'".
               " WHERE id_modelo =".$modelo->getId();
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

    public function delete($id){
        /* Em desenvolvimento */
        $sql = "UPDATE tbl_modelo_veiculo SET excluido = 1 WHERE id_modelo = $id";

        $PDO_conex = $this->conex->connect_database();

        if($PDO_conex->query($sql)){
            
            echo " Modelo excluido com sucesso ";

            return true;
            
        } else {

            echo " Erro ao excluir o Modelo ";

            return false;
        }

        $this->conex->close_database();

    }
    public function status($id_modelo,$status){

            echo "CHegou em status ";
            
            $sql = "UPDATE tbl_modelo_veiculo SET status='$status' WHERE id_modelo=".$id_modelo;

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
        $sql = "SELECT * FROM tbl_modelo_veiculo WHERE id_modelo = $id";

        $PDO_conex = $this->conex->connect_database();

        $select = $PDO_conex->query($sql);

        if($rs_modelos = $select->fetch(PDO::FETCH_ASSOC)){

            $modelo = new Modelo();
            $modelo->setId($rs_modelos['id_modelo'])
                   ->setNome($rs_modelos['nome_modelo'])
                   ->setStatus($rs_modelos['status'])
                   ->setExcluido($rs_modelos['excluido'])
                   ->setIdTipoMarca($rs_modelos['id_marca_tipo']);

            return $modelo;

        } else {

            echo "Modelo não encontrado!!";
            return false;
        }


    }
    public function updateByFIP($modelo,$marca,$tipo){
        echo "Chegou no updateByFIP \n ";

        // Abrido conexao com o BD
        $PDO_conex = $this->conex->connect_database();

        $sql = "SELECT * FROM tbl_marca_veiculo_tipo_veiculo ".
               " WHERE id_marca_veiculo = ". $marca->getId() ." AND id_tipo_veiculo=". $tipo->getId();
            
        $select = $PDO_conex->query($sql);

        if($vinculo = $select->fetch(PDO::FETCH_ASSOC)){//Pegando o vinculo de ligação

           $modelo->setIdTipoMarca($vinculo['id_tipo_marca']);// Defininco o vinculo

           /* Verifica se o modelo já existe */
           if($modeloAnterior = $this->selectByCodFIP($modelo->getCodFIP(),$tipo->getId())){


                $modelo->setId($modeloAnterior->getId());//Pegando o id do modeloAnterior

                /* Fazendo o update !! */
                if($this->update($modelo)){
                    echo " UPTADE realaizado na exportação ";
                    return $modelo;
                }else{
                    echo "Erro na atualização da exportação ";
                }

            } else {// Cria se não existir
                
                echo "Criano Modelo \n ";

                $sql = "INSERT INTO tbl_modelo_veiculo(nome_modelo,cod_fip,id_marca_tipo)".
                       "VALUES('" . $modelo->getNome() . "','". $modelo->getCodFIP() ."',". $modelo->getIdTipoMarca() .")";

                echo $sql;

                if($PDO_conex->query($sql)){//Inserindo Marca


                    $modelo->setId($PDO_conex->lastInsertId());//ID da marca inserida

                    $this->conex->close_database();

                    echo "Modelo inserido com sucesso";

                    return $modelo;

                } else {

                    echo "Erro Desconhecido na exportação ao inserir a modelo ";

                }
            }
        } else {
            echo "Erro na exportação ao inserir a modelo vinculo marca <--> tipo veiculo inexistente ";
        }

        $this->conex->close_database();
        
        return false;
    }
    /* Recebe o cod da fip e o id do tipo de veiculo */
    public function selectByCodFIP($cod_fip,$id_tipo_veiculo){

        echo "Chegou no selectByCodFIP ";
        
        $sql = "select tbl_marca_veiculo_tipo_veiculo.*,tbl_modelo_veiculo.* from tbl_tipo_veiculo ".
               "inner join tbl_marca_veiculo_tipo_veiculo ".
               "on tbl_tipo_veiculo.id_tipo_veiculo = tbl_marca_veiculo_tipo_veiculo.id_tipo_veiculo ".
               "inner join tbl_modelo_veiculo ".
               "on tbl_marca_veiculo_tipo_veiculo.id_tipo_marca = tbl_modelo_veiculo.id_marca_tipo ".
               "WHERE tbl_tipo_veiculo.id_tipo_veiculo =$id_tipo_veiculo  ".
               "AND tbl_modelo_veiculo.cod_fip='$cod_fip'";
        
        $PDO_conex = $this->conex->connect_database();


        $select = $PDO_conex->query($sql);

        if($rs_modelos = $select->fetch(PDO::FETCH_ASSOC)){

            $modelo = new Modelo();
            $modelo->setId($rs_modelos['id_modelo'])
                   ->setNome($rs_modelos['nome_modelo'])
                   ->setIdTipoMarca($rs_modelos['id_marca_tipo']);
            // Retornando o modelo! 
            return $modelo;

        } else {
            echo "Modelo não encontrado!!";
            return false;
        }
        
    }

}



?>