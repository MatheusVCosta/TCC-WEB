<?php 
    
    
    class ControllerVeiculos{
       
        private $veiculosDAO;
              
        public function __construct(){
            

            require_once('model/veiculoClass.php');
            require_once('model/usuarioClass.php');
            require_once('model/dao/veiculoDAO.php');


            $this->veiculosDAO = new VeiculoDAO();

        }

        public function aprovar_veiculo(){

            if(!isset($_SESSION))session_start();
            
            $id_usuarioCMS = 1;

            if(isset($_SESSION['usuario'])){
                $usuario = unserialize($_SESSION['usuario']);

                $id_usuarioCMS = $usuario->getId();
            }


            $this->veiculosDAO->aprovar($_GET['id_veiculo'],$_POST['motivo'],$id_usuarioCMS);
        
        }
        public function reprovar_veiculo(){
            
            if(!isset($_SESSION))session_start();
            
            $id_usuarioCMS = 1;

            if(isset($_SESSION['usuario'])){
                $usuario = unserialize($_SESSION['usuario']);

                $id_usuarioCMS = $usuario->getId();
            }


            $this->veiculosDAO->reprovar($_GET['id_veiculo'],$_POST['motivo'],$id_usuarioCMS);
        }

        public function inserir_veiculo(){
              
            
        }

        public function atualizar_veiculo(){

            
            
        }
        
        public function getById($id_veiculo = 0){
            
            if($id_veiculo == 0)$id_veiculo = $_GET['id_veiculo'];

            return $this->veiculosDAO->selectById($id_veiculo);
        }

        public function listar_veiculos(){
            
        }
        /* Retorna uma lsita com os veiculo que ainda não foram aprovados ou pendentes */
        public function listar_veiculos_pendentes(){
            return $this->veiculosDAO->selectAllPendentes();
        }

    }

?>