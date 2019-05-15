<?php  

class ControllerLocacao{

    private $locacaoDao;

    public function __contruct(){

        require_once('model/clienteClass.php');        
        require_once('model/locacaoClass.php');
        require_once('model/dao/locacaoDao.php');
        $this->locacaoDAO = new LocacaoDAO();
        
    }
    public function inserir(){

    }
    public function atualizar(){

    }

    public function excluir(){

    }

    public function listar(){
        
      $cliente = unserialize($_SESSION['cliente']);
      $status = "normal";
      
       if(isset($_GET['andamento'])){
           
        $status = "andamento";  
        
       }else{
           
       }

       $this->locacaoDAO->selectAll($status,$cliente->getId());
    }
}

?>