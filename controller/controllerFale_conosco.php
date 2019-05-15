<?php 
       
class ControllerFale_conosco{
    
    private $fale_conoscoDao;
    
    public function __construct(){
        //importando classes
        require_once('model/fale_conoscoClass.php');
        require_once('model/dao/fale_conoscoDAO.php');

        $this->fale_conoscoDao = new Fale_conoscoDao();
    }
    public function inserir_fale_conosco(){
        
        $fale_conosco = new Fale_conosco();

        $fale_conosco->setNome($_POST['txtNome'])
                     ->setEmail($_POST['txtEmail'])
                     ->setTelefone($_POST['txtTelefone'])
                     ->setCelular($_POST['txtCelular'])
                     ->setMensagem($_POST['menssagem']);
        
        $this->fale_conoscoDao->insert($fale_conosco);


    }

    public function excluir_fale_conosco(){
        $id = $_GET['id_fale_conosco'];

        $this->fale_conoscoDao->delete($id);
    }

    public function listar_fale_conosco(){
        $consulta = $this->fale_conoscoDao->selectAll();

        return $consulta;
    }
    
    public function getById( $id = 0 ){
        
        
        if($id == 0 )$id = $_GET['id_fale_conosco'];
        
        return $this->fale_conoscoDao->selectById($id);

    }
}
?>