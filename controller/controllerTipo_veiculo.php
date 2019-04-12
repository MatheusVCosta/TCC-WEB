<?php

class ControllerTipoVeiculo{

    private $tipoVeiculoDAO;

    public function __construct(){

        require_once('model/dao/tipo_veiculoDAO.php');
        require_once('model/tipo_veiculoClass.php');

        $this->tipoVeiculoDAO = new TipoVeiculoDAO();
    
    }

    public function inserir_tipo(){

        $tipo = new TipoVeiculo();

//Parei Aqui!!!

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

    public function listar_tipo(){
        return $this->tipoVeiculoDAO->selectAll();
    }

    public function getById(){
        return $this->tipoVeiculoDAO->select($_GET['id']);
    }

}


?>