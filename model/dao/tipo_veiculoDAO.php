<?php


class  TipoVeiculoDAO{
    
    private $conex;
    
    /* Ligações <--->  da tabela de tipo_veiculo */
    private $marcasDAO;
    private $modelosDAO;
    

    public function __construct(){
        
        require_once('model/tipo_veiculoClass.php');
        require_once('model/dao/conexaoMysql.php');

        /* FIP */
        require_once('model/marcaClass.php');
        require_once('model/modeloClass.php');
        require_once("model/acessorioClass.php");

        /* LIGAÇÃO marcas <---> tipo_veiculo */
        require_once('model/dao/marcasDAO.php');
        $this->marcasDAO = new MarcaDAO();

        /* LIGAÇÃO modelos <---> veiculo */
        require_once('model/dao/modelosDAO.php');
        $this->modelosDAO = new ModeloDAO();

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
        $sql = "UPDATE tbl_tipo_veiculo SET excluido = 1 WHERE id_tipo_veiculo = $id";
                            
        $PDO_conex = $this->conex->connect_database();

        if($PDO_conex->query($sql)){
            
            echo " Tipo de veiculo excluido com sucesso ";

            return true;
            
        } else {

            echo " Erro ao excluir o tipo ";

            return false;
        }

        $this->conex->close_database();

    }

    public function select($id){
        /* LEFT JOIN pois o valor pode não existir na tabela de percentual */
        $sql = "SELECT tbl_tipo_veiculo.*, if(tbl_percentual.percentual is null, 0, Max(tbl_percentual.percentual) )  as 'percentual' ,if(tbl_percentual.percentual is null, 0, Max(tbl_percentual.data) )  as 'data' FROM tbl_tipo_veiculo ".
               "left join tbl_percentual on  tbl_percentual.id_tipo_veiculo = tbl_tipo_veiculo.id_tipo_veiculo ".
               "WHERE tbl_tipo_veiculo.id_tipo_veiculo =" . $id . " group by tbl_tipo_veiculo.id_tipo_veiculo  ";
        
                    
        $PDO_conex = $this->conex->connect_database();

        $select = $PDO_conex->query($sql);

        if($rs_tipo = $select->fetch(PDO::FETCH_ASSOC)){

            $tipo = new TipoVeiculo();
            
            $tipo->setId($rs_tipo['id_tipo_veiculo'])
                 ->setData($rs_tipo['data'])
                 ->setNome($rs_tipo['nome_tipo_veiculo'])
                 ->setExcluido($rs_tipo['excluido'])
                 ->setPercentual($rs_tipo['percentual']);
        } else {
            echo " Tipo de veiculo não encontrado ";
        }

        $this->conex->close_database();

        return $tipo;

    }

    public function selectAll(){
            
            /* LEFT JOIN pois o valor pode não existir na tabela de percentual */

            $sql = " SELECT tbl_tipo_veiculo.*, if(tbl_percentual.percentual is null, 0, Max(tbl_percentual.percentual) )  as 'percentual' ,if(tbl_percentual.percentual is null, 0, Max(tbl_percentual.data) )  as 'data' FROM tbl_tipo_veiculo ".
                   " left join tbl_percentual on  tbl_percentual.id_tipo_veiculo = tbl_tipo_veiculo.id_tipo_veiculo ".
                   " WHERE tbl_tipo_veiculo.excluido = 0 ".
                   " group by tbl_tipo_veiculo.id_tipo_veiculo ";

            
            $PDO_conex = $this->conex->connect_database();

            $select = $PDO_conex->query($sql);
               
            $lista_tipo = array();
            
           
            while($rs_tipos = $select->fetch(PDO::FETCH_ASSOC)){

                $tipo = new TipoVeiculo();
                $tipo->setId($rs_tipos['id_tipo_veiculo'])
                     ->setData($rs_tipos['data'])
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
        $sql = "SELECT tbl_marca_veiculo.*,tbl_modelo_veiculo.*,tbl_modelo_veiculo.status as 'statusModelo' FROM tbl_tipo_veiculo   ".
               "inner join tbl_marca_veiculo_tipo_veiculo on tbl_tipo_veiculo.id_tipo_veiculo = tbl_marca_veiculo_tipo_veiculo.id_tipo_veiculo ".
               "inner join tbl_marca_veiculo on tbl_marca_veiculo.id_marca_veiculo = tbl_marca_veiculo_tipo_veiculo.id_marca_veiculo ".
               "inner join tbl_modelo_veiculo on tbl_modelo_veiculo.id_marca_tipo = tbl_marca_veiculo_tipo_veiculo.id_tipo_marca  ".
               "WHERE tbl_modelo_veiculo.excluido = 0 AND tbl_tipo_veiculo.id_tipo_veiculo =" . $id;

        /* Com subquery  e WHERE */
//         $sql = "SELECT tbl_marca_veiculo.*,tbl_modelo_veiculo.*,tbl_modelo_veiculo.status as 'statusModelo' FROM ".
//                "tbl_marca_veiculo_tipo_veiculo,tbl_marca_veiculo,tbl_modelo_veiculo,tbl_tipo_veiculo ".
//                "where tbl_tipo_veiculo.id_tipo_veiculo = tbl_marca_veiculo_tipo_veiculo.id_tipo_veiculo AND ".
//                "tbl_marca_veiculo.id_marca_veiculo = tbl_marca_veiculo_tipo_veiculo.id_marca_veiculo	AND ".
//                "tbl_modelo_veiculo.id_marca_tipo = tbl_marca_veiculo_tipo_veiculo.id_tipo_marca 		AND ".
//                "tbl_modelo_veiculo.excluido = 0                                                  		AND ".
//                "tbl_tipo_veiculo.id_tipo_veiculo =" . $id;

        $PDO_conex = $this->conex->connect_database();

        $select = $PDO_conex->query($sql);

        $lista_modelos = array();


        while($rs_modelos = $select->fetch(PDO::FETCH_ASSOC)){

            $modelo = new Modelo();
            $modelo->setId($rs_modelos['id_modelo'])
                   ->setNome($rs_modelos['nome_modelo'])
                   ->setStatus($rs_modelos['statusModelo'])
                   ->setIdTipoMarca($rs_modelos['id_marca_tipo']);


            $lista_modelos[] = $modelo;
        }



        $this->conex->close_database();

        return $lista_modelos;
    }
    
    /* Area das Marcas ! Talves vire um novo DAO*/
    public function getMarcas($id){

        $sql = "SELECT tbl_marca_veiculo.*,tbl_marca_veiculo_tipo_veiculo.*,tbl_marca_veiculo.status as 'statusMarca' FROM tbl_tipo_veiculo ".
               "inner join tbl_marca_veiculo_tipo_veiculo on tbl_marca_veiculo_tipo_veiculo.id_tipo_veiculo = tbl_tipo_veiculo.id_tipo_veiculo ".
               "inner join tbl_marca_veiculo on tbl_marca_veiculo.id_marca_veiculo = tbl_marca_veiculo_tipo_veiculo.id_marca_veiculo ".
               "WHERE tbl_marca_veiculo_tipo_veiculo.excluido = 0 AND tbl_tipo_veiculo.id_tipo_veiculo=". $id;

        $PDO_conex = $this->conex->connect_database();

        $select = $PDO_conex->query($sql);

        $lista_marcas = array();


        while($rs_marcas = $select->fetch(PDO::FETCH_ASSOC)){

            $marca = new Marca();
            $marca->setId($rs_marcas['id_marca_veiculo'])
                  ->setNome($rs_marcas['nome_marca'])
                  ->setStatus($rs_marcas['statusMarca'])
                  ->setIdTipoMarca($rs_marcas['id_tipo_marca']);

            $lista_marcas[] = $marca;
        }



        $this->conex->close_database();

        return $lista_marcas;
    }

    public function getAcessorios($id){


        $sql = "SELECT * FROM tbl_acessorios where excluido = 0 AND  id_tipo_veiculo =".$id;
        

        $PDO_conex = $this->conex->connect_database();

        $select = $PDO_conex->query($sql);

        $lista_acessorios = array();


        while($rs_acessorios = $select->fetch(PDO::FETCH_ASSOC)){

            $acessorio = new Acessorio();

            $acessorio->setId($rs_acessorios['id_acessorios'])
                      ->setNome($rs_acessorios['nome_acessorios'])
                      ->setStatus($rs_acessorios['status'])
                      ->setIdTipoVeiculo($rs_acessorios['id_tipo_veiculo']);

            $lista_acessorios[] = $acessorio;
        }



        $this->conex->close_database();

        return $lista_acessorios;
    }

    public function exportarMarca($id_tipo_veiculo,$marca){
        /* Verificando se a marca ja existe pelo cod da tabela fip */
        
        $tipo = $this->select($id_tipo_veiculo);
        
        $this->marcasDAO->updateByFIP($marca,$tipo);


    }
    public function exportarModelo($id_tipo_veiculo,$cod_marca_fip,$modelo){
        /* Verificando se a marca ja existe pelo cod da tabela fip */
        
        $tipo  = $this->select($id_tipo_veiculo);
        $marca = $this->marcasDAO->selectByCodFIP($cod_marca_fip);

        echo "Chegou aqui!!";

        $this->modelosDAO->updateByFIP($modelo,$marca,$tipo);


    }

    /*Select para painel de usuário para cadastrar veículo*/
//     public function getTipoVeiculos(){

//         $sql = "SELECT tbl_marca_veiculo.*,tbl_modelo_veiculo. ."
//     }
}
?>