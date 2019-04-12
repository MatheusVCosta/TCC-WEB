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

            $this->usuariosDao->delete($id_usuario);
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
			
			var_dump($_POST);
			
			$usuario->setEmail($_POST['txtEmail'])
					->setSenha($_POST['txtSenha']);

			$logado = $this->usuariosDao->logar($usuario);
			
			if($logado){
				
				echo $logado->verificar($usuario->getSenha());
				 
				if($logado->verificar($usuario->getSenha())){
					
					echo "sucesso ao logar com o usuario";

				}else{

					echo "erro ao logar com o usuario email incorreto";

				}
				
			
			}else{
			
				echo "erro ao logar com o usuario";
			
			}

        	return $this->usuariosDao->logar($usuario);

        }



    }

?>