<?php 
    
    
    class ControllerUsuarios{
       
        private $usuariosDao;
        
        public function __construct(){
            //importando classes
            require_once('model/usuarioClass.php');
            require_once('model/dao/usuarioDAO.php');

            $this->usuariosDao = new UsuarioDao();

        }

        public function inserir_usuarios(){

            //verificar se o metodo que esta chegando é GET ou POST
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
		
                $usuario = new Usuario();

				$usuario->setNome($_POST['txtNome'])
						 ->setEmail($_POST['txtEmail'])
						 ->setSenha($_POST['txtSenha'])
						 ->setNivel($_POST['slcNivel']);

                $this->usuariosDao->insert($usuario);
            }

        }
        public function excluir_usuarios(){
            $id_usuario = $_GET['id'];

            if( $this->usuariosDao->delete($id_usuario) ){
            	
            	if(!isset($_SESSION))session_start();

            	if(isset($_SESSION['usuario'])){

            		$usuario = unserialize($_SESSION['usuario']);
        			if($usuario->getId() == $_GET['id']){
						//guarda na session o usuario
						unset($_SESSION['usuario']);


						header("location: ./");
        			}
            	}
            }
        }
        public function atualizar_usuarios(){
			//verificar se o metodo que esta chegando é GET ou POST
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
		
                $usuario = new Usuario();

				$usuario->setId($_GET['id'])
						->setNome($_POST['txtNome'])
						->setEmail($_POST['txtEmail'])
						->setSenha($_POST['txtSenha'])
						->setNivel($_POST['slcNivel']);

                $this->usuariosDao->update($usuario);
            }
        }
        public function listar_usuarios(){
            $consulta = $this->usuariosDao->selectAll();

            return $consulta;
        }
        public function getById(){

            $id_usuario = $_POST['id'];

            return $this->usuariosDao->selectById($id_usuario);

        }

        public function logar(){

			$usuario  = new Usuario();
			
			$usuario->setEmail($_POST['txtEmail'])
					->setSenha($_POST['txtSenha']);

			
			if($logado = $this->usuariosDao->logar($usuario)){
				
				 
				if($logado->verificar($usuario->getSenha())){

					// Verificando se a session esta ativa
                    if(!isset($_SESSION))session_start();
                 

                    //guarda na session o usuario
                    $_SESSION['usuario'] = serialize($logado);
					
					echo " sucesso ao logar com o usuario";

				}else{

					echo "Erro ao logar com o usuario senha incorreta";

				}
				
			
			}else{
			   
			   echo " Erro !!!! ";
				
			
			}

        	return $this->usuariosDao->logar($usuario);

        }
		
		public function deslogar(){

			if(!isset($_SESSION))session_start();
                 

			//guarda na session o usuario
			unset($_SESSION['usuario']);


			header("location: ./");
					
		}


    }

?>