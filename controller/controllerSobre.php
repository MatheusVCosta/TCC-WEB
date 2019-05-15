<?php
    class ControllerSobre{


        private $sobreDAO;
        public function __construct(){
            // padrão - todas as controllers precisão disso
            // abrindo conexao com o mysql
            //importando classes
            require_once('model/sobreClass.php');
            require_once('model/dao/sobreDAO.php');

            $this->sobreDAO = new SobreDAO();
        }
        public function inserir_sobre(){
               if($_SERVER['REQUEST_METHOD'] == 'POST'){

                $sobre = new Sobre();

                $sobre->setTitulo_sobre($_POST['txtTitulo_historia'])
                    ->setTexto_sobre($_POST['txtTexto_historia'])
                    ->setFoto_sobre($this->uploadImagem($_FILES['foto_sobre']))
                    ->setTitulo_missao_sobre($_POST['txtTitulo_missao'])
                    ->setTexto_missao_sobre($_POST['txtTexto_missao'])
                    ->setFoto_missao_sobre($this->uploadImagem($_FILES['Foto_missao_sobre']))
                    ->setTitulo_visao_sobre($_POST['txtTitulo_visao'])
                    ->setTexto_visao_sobre($_POST['txtTexto_visao'])
                    ->setFoto_visao_sobre($this->uploadImagem($_FILES['Foto_visao_sobre']))
                    ->setTitulo_valores_sobre($_POST['txtTitulo_valores'])
                    ->setTexto_valores_sobre($_POST['txtTexto_valores'])
                    ->setFoto_valores_sobre($this->uploadImagem($_FILES['Foto_valores_sobre']));

                $this->sobreDAO->insert($sobre);
            }
            
        }
        public function excluir_sobre(){
            $id_sobre = $_GET['id_sobre'];
            $this->sobreDAO->delete($id_sobre);
        }
        public function atualizar_sobre(){
        
            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                $sobre = new Sobre();

                /*$sobre->setId_sobre($_GET['id_sobre'])
                   ->setTitulo_sobre($_POST['txtTitulo_historia'])
                    ->setTexto_sobre($_POST['txtTexto_historia'])
                    ->setFoto_sobre($_POST['img_sobre'])
                    ->setTitulo_missao_sobre($_POST['txtTitulo_missao'])
                    ->setTexto_missao_sobre($_POST['txtTexto_missao'])
                    ->setFoto_missao_sobre($_POST['img_missao'])
                    ->setTitulo_visao_sobre($_POST['txtTitulo_visao'])
                    ->setTexto_visao_sobre($_POST['txtTexto_visao'])
                    ->setFoto_visao_sobre($_POST['img_visao'])
                    ->setTitulo_valores_sobre($_POST['txtTitulo_valores'])
                    ->setTexto_valores_sobre($_POST['txtTexto_valores'])
                    ->setFoto_valores_sobre($_POST['img_valores']);*/
                
                if(isset($_GET['valores'])){
                    $sobre = $this->sobreDAO->selectAll();
                    $sobre->setTitulo_valores_sobre($_POST['titulo'])
                          ->setTexto_valores_sobre($_POST['texto']);
                    if($_FILES['foto']['size']>0){
                        $sobre->setFoto_valores_sobre($this->uploadImagem($_FILES['foto']));
                    }
                }elseif(isset($_GET['missao'])){
                    $sobre = $this->sobreDAO->selectAll();
                    $sobre->setTitulo_missao_sobre($_POST['titulo'])
                          ->setTexto_missao_sobre($_POST['texto']);
                    if($_FILES['foto']['size']>0){
                        $sobre->setFoto_missao_sobre($this-uploadImagem($_FILES['foto']));
                    }
                }elseif(isset($_GET['visao'])){
                    $sobre = $this->sobreDAO->selectAll();
                    $sobre->setTitulo_visao_sobre($_POST['titulo'])
                          ->setTexto_visao_sobre($_POST['texto']);
                    if($_FILES['foto']['size']>0){
                        $sobre->setFoto_visao_sobre($this->uploadImagem($_FILES['foto']));
                    }
                }elseif(isset($_GET['historia'])){
                    $sobre = $this->sobreDAO->selectAll();

                    $sobre->setTitulo_sobre($_POST['titulo'])
                          ->setTexto_sobre($_POST['texto']);
                          
                    if($_FILES['foto']['size']>0){
                        $sobre->setFoto_sobre($this->uploadImagem($_FILES['foto']));
                    }   

                }
                
                $this->sobreDAO->update($sobre);
            }
            
        }
        public function buscar_sobre(){
            $id_sobre = $_POST['id_sobre'];
            
            return $this;

        }
        public function listar_sobre(){
            
        $consulta = $this->sobreDAO->selectAll();

        return $consulta;
        }
        
         public function uploadImagem($arquivo){
            
            // Verifica Se o arquivo tem um tamanho $_File tem conteudo
            if($arquivo['size']>0){

                // Vetor com uma lista de arquivos que são permitidos
                $arquivosPermitidos=array(".jpg",".png",".jpeg",".svg");
                // Pega o nome do arquivo
                $nomeArquivo = pathinfo($arquivo['name'], PATHINFO_FILENAME);
                // Pega a extenção do arquivo
                $extencao_arquivo = strrchr($arquivo['name'],".");
                
                // Define o tipo de arquivo que pode ler armazenado
                if( in_array($extencao_arquivo,$arquivosPermitidos) ){

                    $tamanho = round(($arquivo['size'])/1024);
                    // Define o tamanho maximo de para a foto enviada
                    if($tamanho<=4096){// 4 MB 
                        // Operações sobre o arquivo de imagem
                        /* AREA SEGURA!!! */
                        
                        /*  Aleatoriedade nessesaria para gerar um nome diferente:
                         *  gera 3 valores aleatorios entre 1 e 9  e os soma com a data atual do upload
                         */
                        $entropia = rand(1, 9) . "" . rand(1, 9) . "" .rand(1, 9) . "" . date('Y-m-d H:i:s');

                        // Criando novo nome para a imagem baseado na entropia 
                        $novoNome = (md5($entropia.$nomeArquivo))."".$extencao_arquivo;
                        
                        // Novo Caminho para a imagem 
                        $caminho_novo_da_imagem = "view/upload/".$novoNome;
                        // Caminho atual da imagem
                        $caminho_atual_da_imagem = $arquivo['tmp_name'];
                        
                        // MOVENDO ARQUIVO DO CAMINHO ATUAL PARA O NOVO CAMINHO 
                        if(move_uploaded_file($caminho_atual_da_imagem,$caminho_novo_da_imagem)){
                            
                            // Caso tudo tenha dado certo retorna o novo nome do arquivo
                            return $novoNome;
                        
                        }
                    }
                }
            }

            // Caso não funcione retorna um false para quem o chamou
            return false;
        }
    

        
}
?>