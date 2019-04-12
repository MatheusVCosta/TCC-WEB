<?php


class  TipoVeiculoDAO{
    
    private $conex;

    public function __construct(){
        
        require_once('model/tipo_veiculoClass.php');
        require_once('model/dao/conexaoMysql.php');

        $this->conex = new  conexaoMysql();
    }

    public function insert($tipo_veiculo){
        
        $sql ="INSERT INTO tbl_tipo_veiculo(nome_tipo_veiculo) VALUES
            ('" . $tipo_veiculo->getNome() . "')";

        $PDO_conex = $this->conex->connect_database();
        
        if($PDO_conex->query($sql)){

           echo "Insert com sucesso";
            
            // Inserindo o percentual na tabela tbl_percentual
           // PEGANDO O ID do Ultimo Registro inserido
           $id_tipo_veiculo = $PDO_conex->lastInsertId();

           $sql = "INSERT INTO tbl_percentual(percentual,id_tipo_veiculo,data)".
                   "VALUE(". $tipo_veiculo->getPercentual() ."," . $id_tipo_veiculo . " ,'" . date('Y-m-d H:i:s') . "')";


           if($PDO_conex->query($sql)){
               echo "Insert com sucesso";
           }else{
           
               echo "Erro no script de insert";
           }

        }else{
            echo "Erro no script de insert";
        }

        $this->conex->close_database();

    }
    public function uptade($tipo){
        
        $sql = "UPDATE tbl_tipo_veiculo SET nome_tipo_veiculo = '" . $tipo->getNome() . "' ".
               "WHERE id_tipo_veiculo = ".$tipo->getId();

        $PDO_conex = $this->conex->connect_database();

        if($PDO_conex->query($sql)){
           
           echo "Update com sucesso";
            
           $sql = "INSERT INTO tbl_percentual(percentual,id_tipo_veiculo,data)".
                  "VALUE(". $tipo->getPercentual() ."," . $tipo->getId() . " ,'" . date('Y-m-d H:i:s') . "')";


           if($PDO_conex->query($sql)){
               echo "Insert com sucesso";
           }else{
           
               echo "Erro no script de insert";
           }

        }else{
           
           echo "Erro no script de uptade $sql";
        }

        $this->conex->close_database();

    }

    public function delete($id){
        /* Em desenvolvimento */
        $sql = "SELECT tbl_tipo_veiculo.*, if(tbl_percentual.percentual is null, 0, Max(tbl_percentual.percentual) )  as 'percentual' FROM tbl_tipo_veiculo ".
               "left join tbl_percentual on  tbl_percentual.id_tipo_veiculo = tbl_tipo_veiculo.id_tipo_veiculo ".
               "WHERE tbl_tipo_veiculo.id_tipo_veiculo =" . $id . " group by tbl_tipo_veiculo.id_tipo_veiculo  ";
        
                    
        $PDO_conex = $this->conex->connect_database();

        $select = $PDO_conex->query($sql);

        if($rs_tipo = $select->fetch(PDO::FETCH_ASSOC)){

            $tipo = new TipoVeiculo();
            
            $tipo->setId($rs_tipo['id_tipo_veiculo'])
                 ->setNome($rs_tipo['nome_tipo_veiculo'])
                 ->setPercentual($rs_tipo['percentual']);
        } else {
            echo " Tipo de veiculo não encontrado ";
        }

        $this->conex->close_database();

    }

    public function select($id){
        /* LEFT JOIN pois o valor pode não existir na tabela de percentual */
        $sql = "SELECT tbl_tipo_veiculo.*, if(tbl_percentual.percentual is null, 0, Max(tbl_percentual.percentual) )  as 'percentual' FROM tbl_tipo_veiculo ".
               "left join tbl_percentual on  tbl_percentual.id_tipo_veiculo = tbl_tipo_veiculo.id_tipo_veiculo ".
               "WHERE tbl_tipo_veiculo.id_tipo_veiculo =" . $id . " group by tbl_tipo_veiculo.id_tipo_veiculo  ";
        
                    
        $PDO_conex = $this->conex->connect_database();

        $select = $PDO_conex->query($sql);

        if($rs_tipo = $select->fetch(PDO::FETCH_ASSOC)){

            $tipo = new TipoVeiculo();
            
            $tipo->setId($rs_tipo['id_tipo_veiculo'])
                 ->setNome($rs_tipo['nome_tipo_veiculo'])
                 ->setPercentual($rs_tipo['percentual']);
        } else {
            echo " Tipo de veiculo não encontrado ";
        }

        $this->conex->close_database();

        return $tipo;

    }

    public function selectAll(){
            
            /* LEFT JOIN pois o valor pode não existir na tabela de percentual */

            $sql = "SELECT tbl_tipo_veiculo.*, if(tbl_percentual.percentual is null, 0, Max(tbl_percentual.percentual) )  as 'percentual' FROM tbl_tipo_veiculo ".
                   "left join tbl_percentual on  tbl_percentual.id_tipo_veiculo = tbl_tipo_veiculo.id_tipo_veiculo group by tbl_tipo_veiculo.id_tipo_veiculo";
            
            $PDO_conex = $this->conex->connect_database();

            $select = $PDO_conex->query($sql);
               
            $lista_tipo = array();
            
           
            while($rs_tipos = $select->fetch(PDO::FETCH_ASSOC)){

                $tipo = new TipoVeiculo();
                $tipo->setId($rs_tipos['id_tipo_veiculo'])
                     ->setNome($rs_tipos['nome_tipo_veiculo'])
                     ->setPercentual($rs_tipos['percentual']);


                $lista_tipo[] = $tipo;
            }

           

            $this->conex->close_database();

            return $lista_tipo;

    }

    /* Area dos modelos ! Talves vire um novo DAO*/
    public function getModelos($id){
        /* select com 4 tabelas */

        /* Com inner join */
        $sql = "SELECT tbl_marca_veiculo.*,tbl_modelo_veiculo.* FROM tbl_tipo_veiculo  
                inner join tbl_marca_veiculo_tipo_veiculo on tbl_tipo_veiculo.id_tipo_veiculo = tbl_marca_veiculo_tipo_veiculo.id_tipo_veiculo
                inner join tbl_marca_veiculo    on tbl_marca_veiculo.id_marca_veiculo = tbl_marca_veiculo_tipo_veiculo.id_marca_veiculo
                inner join tbl_modelo_veiculo on tbl_modelo_veiculo.id_marca_tipo = tbl_marca_veiculo_tipo_veiculo.id_tipo_marca 
                WHERE tbl_tipo_veiculo.id_tipo_veiculo = 1";

        /* Com subquery  e WHERE */
        $sql = "SELECT tbl_marca_veiculo.*,tbl_modelo_veiculo.* FROM
                tbl_marca_veiculo_tipo_veiculo,tbl_marca_veiculo,tbl_modelo_veiculo,tbl_tipo_veiculo
                where tbl_tipo_veiculo.id_tipo_veiculo = tbl_marca_veiculo_tipo_veiculo.id_tipo_veiculo AND
                tbl_marca_veiculo.id_marca_veiculo = tbl_marca_veiculo_tipo_veiculo.id_marca_veiculo	AND
                tbl_modelo_veiculo.id_marca_tipo = tbl_marca_veiculo_tipo_veiculo.id_tipo_marca 		AND
                tbl_tipo_veiculo.id_tipo_veiculo = 1;"
    }


}



?>