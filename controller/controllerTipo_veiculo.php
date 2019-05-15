<?php

class ControllerTipoVeiculo{

    private $tipoVeiculoDAO;

    public function __construct(){

        require_once('model/dao/tipo_veiculoDAO.php');
        require_once('model/tipo_veiculoClass.php');

        /* FIP */
        require_once('model/marcaClass.php');
        require_once('model/modeloClass.php');

        $this->tipoVeiculoDAO = new TipoVeiculoDAO();
    
    }

    public function inserir_tipo(){

        $tipo = new TipoVeiculo();

        $tipo->setNome($_POST['txtNome'])
             ->setPercentual($_POST['txtPercentual']);

        $this->tipoVeiculoDAO->insert($tipo);

    }

    public function atualizar_tipo(){

        $tipo = new TipoVeiculo();

        $tipo->setId($_GET['id'])
             ->setNome($_POST['txtNome'])
             ->setPercentual($_POST['txtPercentual']);

        $this->tipoVeiculoDAO->uptade($tipo);
    }

    public function excluir_tipo(){


        $this->tipoVeiculoDAO->delete($_GET['id']);

    }

    public function listar_tipo(){
        return $this->tipoVeiculoDAO->selectAll();
    }

    public function getById($id = 0){
        
        if($id != 0)return $this->tipoVeiculoDAO->select($id);

        return $this->tipoVeiculoDAO->select($_GET['id']);
    }
    
    /* Marcas e acessorio !  Talvers virem um controller no futuro */
    public function listar_marcas(){
        
        return $this->tipoVeiculoDAO->getMarcas($_GET['id']);

    }

    public function listar_modelos(){
        
        return $this->tipoVeiculoDAO->getModelos($_GET['id']);

    }
    /* Preciso padronizar mais um pouco */
    public function listar_acessorios(){
        
        return $this->tipoVeiculoDAO->getAcessorios($_GET['id_tipo_veiculo']);

    }
    public function exportar_fip(){
        
        var_dump($_POST);
        
        if(isset($_GET['marca'])){/* Exportando marca */

            $marca = new Marca();
            $marca->setNome($_POST['name'])
                  ->setCodFIP($_POST['id']);

            $this->tipoVeiculoDAO->exportarMarca($_GET['id_tipo_veiculo'],$marca);

        } else {/* Exportando Modelo */
            
            $modelo = new Modelo();

            $modelo->setNome($_POST['name'])
                   ->setCodFIP($_POST['id']);

            $this->tipoVeiculoDAO->exportarModelo($_GET['id_tipo_veiculo'],$_POST['cod_marca'],$modelo);

        }
        

    }
}


?>