<?php 
    
    
    class ControllerNiveis{
       
        private $niveisDao;
        private $niveis;
        // $path = $_SERVER['DOCUMENT_ROOT'];
        
        public function __construct(){
            //importando classes
            require_once('model/niveisClass.php');
            require_once('model/dao/niveisDAO.php');
            //instanciando as classes
            $this->niveis = new Niveis();
            $this->niveisDao = new NiveisDao();

        }

        public function inserir_niveis(){

            //verificar se o metodo que esta chegando é GET ou POST
            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                $nome_nivel = $_POST['txtNome_nivel'];
                $descricao = $_POST['txtDescricao'];

                $this->niveis->setNome_nivel($nome_nivel);
                $this->niveis->setDescricao($descricao);

                $this->niveisDao->insert($this->niveis);
            }
        }
        public function excluir_nivel(){
            $id_nivel = $_GET['id'];

            $this->niveisDao->delete($id_nivel);
        }
        public function atualizar_niveis(){
            
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $nome_nivel = $_POST['txtNome_nivel'];
                $descricao = $_POST['txtDescricao'];
                $id_nivel = $_GET['id'];

                $this->niveis->setNome_nivel($nome_nivel);
                $this->niveis->setDescricao($descricao);
                $this->niveis->setId_niveis($id_nivel);

                $this->niveisDao->update($this->niveis);
            }
        }
        public function listar_niveis(){
            $consulta = $this->niveisDao->selectAll();

            return $consulta;
        }
        public function buscar_nivel(){
            $id_nivel = $_GET['id'];
            return $this->niveisDao->selectById($id_nivel);
        }



    }

?>