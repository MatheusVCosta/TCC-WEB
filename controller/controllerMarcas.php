<?php 
    
    
    class ControllerMarcas{
       
        private $marcasDAO;
        private $tipoVeiculoDAO;
              
        public function __construct(){
            
            require_once('model/marcaClass.php');
            require_once('model/dao/marcasDAO.php');

            // relacionamento TIPO DE VEICULO --- MARCA
            require_once('model/tipo_veiculoClass.php');
            require_once('model/dao/tipo_veiculoDAO.php');


            $this->marcasDAO = new MarcaDAO();

            $this->tipoVeiculoDAO = new TipoVeiculoDAO();

        }

        public function inserir_marca(){
              
            $modelo = new Marca();

            $modelo->setNome($_POST['nome']);
            
            $tipo = $this->tipoVeiculoDAO->select($_GET['id_tipo_veiculo']);

                        
            $this->marcasDAO->insert($modelo,$tipo);
        
        }

        public function atualizar_marca(){

            
            $marca = new Marca();
            $marca->setId($_GET['id'])
                   ->setNome($_POST['nome']);
            
            $this->marcasDAO->update($marca);
        }
        
        public function excluir_marca(){

            $this->marcasDAO->delete($_GET['id'],$_GET['id_tipo_veiculo']);

        }

        public function status_marca(){
            

            $this->marcasDAO->status($_GET['id'],$_POST['status']);

        }

        public function getById($id_marca = 0){
            
            if($id_marca == 0)$id_marca = $_GET['id'];
            

            return $this->marcasDAO->select($id_marca);

        }

        public function listar_marcas(){

        }
        
        public function listar_marcas_veiculo($id_tipo_veiculo = 0){

            if($id_tipo_veiculo == 0)$id_tipo_veiculo = $_GET['id_tipo_veiculo'];
            
//Parei aqui checkbox da tela de cadastro de marcas
            return $this->marcasDAO->select($id_modelo);
        }

    }

?>