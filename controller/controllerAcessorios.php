<?php

class ControllerAcessorios{
       
       private $acessoriosDAO;
        
       public function __construct(){
        //importando classes
        require_once('model/acessorioClass.php');
        require_once('model/dao/acessorioDAO.php');

        $this->acessoriosDAO = new AcessorioDAO();

       }

       public function inserir_acessorio(){
           
           $acessorio = new Acessorio();
           
           $acessorio->setIdTipoVeiculo($_GET['id_tipo_veiculo'])
                     ->setNome($_POST['nome']);
           
           $this->acessoriosDAO->insert($acessorio);
       }

       public function excluir_acessorio(){
           
           $this->acessoriosDAO->delete($_GET['id']);

       }
       public function atualizar_acessorio(){
           
           $acessorio = new Acessorio();

           $acessorio->setId($_GET['id_acessorios'])
                     ->setNome($_POST['nome']);
           
           $this->acessoriosDAO->update($acessorio);

       }
       public function status_acessorio(){
            

            $this->acessoriosDAO->status($_GET['id'],$_POST['status']);

       }

       public function listar_acessorios(){}

       public function getById($id = 0){

           if($id != 0)return $this->acessoriosDAO->selectById($id);


           return $this->acessoriosDAO->selectById($_GET['id_acessorios']);

       }


}
?>