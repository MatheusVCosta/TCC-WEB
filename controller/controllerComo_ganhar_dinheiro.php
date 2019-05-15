<?php
    class ControllerComo_ganhar_dinheiro{

        
        private $como_ganhar_dinheiroDAO;

        public function __construct(){

            require_once('model/como_ganhar_dinheiroClass.php');
            require_once('model/dao/como_ganhar_dinheiroDAO.php');

            $this->como_ganhar_dinheiroDAO = new Como_ganhar_dinheiroDAO();

        }
        public function inserir_como_ganhar_dinheiro(){
               if($_SERVER['REQUEST_METHOD'] == 'POST'){

                $como_ganhar_dinheiro = new Como_ganhar_dinheiro();
                echo ('<pre>');
                var_dump($_POST);

                var_dump($_FILES);
                $como_ganhar_dinheiro->setTitulo_sessao1($_POST['txtTitulo_sessao1'])
                            ->setLista1_sessao1($_POST['txtLista1_sessao1'])
                            ->setLista2_sessao1($_POST['txtLista2_sessao1'])
                            ->setTitulo_sessao2($_POST['txtTitulo_sessao2'])
                            ->setLista1_sessao2($_POST['txtLista1_sessao2'])
                            ->setLista2_sessao2($_POST['txtLista2_sessao2'])
                            ->setTitulo_sessao3($_POST['txtTitulo_sessao3'])
                            ->setTexto_sessao3($_POST['txtTexto_sessao3'])
                            ->setImg1_sessao1($this->uploadImagem($_FILES['img1_sessao1']))
                            ->setImg1_sessao2($this->uploadImagem($_FILES['img1_sessao2']))
                            ->setImg2_sessao2($this->uploadImagem($_FILES['img2_sessao2']));

                $this->como_ganhar_dinheiroDAO->insert($como_ganhar_dinheiro);
            }
            
        }
        public function excluir_como_ganhar_dinheiro(){
            $id = $_GET['id'];
            $this->como_ganhar_dinheiroDAO->delete($id);
        }
        public function atualizar_como_ganhar_dinheiro(){

            $como_ganhar_dinheiro = $this->getPage();
               echo $como_ganhar_dinheiro->getImg1_sessao2();
            if($_GET['sessao'] == "sessao1"){
                var_dump($_POST);
                $como_ganhar_dinheiro->setTitulo_sessao1($_POST['txtTitulo_sessao1'])
                    ->setLista1_sessao1($_POST['txtLista1_sessao1'])
                    ->setLista2_sessao1($_POST['txtLista2_sessao1']);
                    //->setImg1_sessao1($this->uploadImagem($_FILES['img1_sessao1']));

            }elseif($_GET['sessao'] == "sessao2"){
                $como_ganhar_dinheiro->setTitulo_sessao2($_POST['txtTitulo_sessao2'])
                    //->setImg1_sessao2($this->uploadImagem($_FILES['img1_sessao2']))
                    ->setLista1_sessao2($_POST['txtLista1_sessao2'])
                    //->setImg2_sessao2($this->uploadImagem($_FILES['img2_sessao2']))
                    ->setLista2_sessao2($_POST['txtLista2_sessao2']);

            }elseif($_GET['sessao'] == "sessao3"){
                $como_ganhar_dinheiro->setTitulo_sessao3($_POST['txtTitulo_sessao3'])
                    ->setTexto_sessao3($_POST['txtTexto_sessao3']);
            }
            if(isset($_FILES['img1_sessao1']) && $_FILES['img1_sessao1']['size'] > 0){
                $como_ganhar_dinheiro->setImg1_sessao1($this->uploadImagem($_FILES['img1_sessao1']));
             }
             if(isset($_FILES['img1_sessao2']) && $_FILES['img1_sessao2']['size'] > 0){
                $como_ganhar_dinheiro->setImg1_sessao2($this->uploadImagem($_FILES['img1_sessao2']));
             }
             if(isset($_FILES['img2_sessao2']) && $_FILES['img2_sessao2']['size'] > 0){
                $como_ganhar_dinheiro->setImg2_sessao2($this->uploadImagem($_FILES['img2_sessao2']));
             }
                $this->como_ganhar_dinheiroDAO->insert($como_ganhar_dinheiro);
          echo $como_ganhar_dinheiro->getImg1_sessao2();
        }
        public function getPage(){
                            
            return $this->como_ganhar_dinheiroDAO->selectPage();

        }
        public function listar_como_ganhar_dinheiro(){
            
        $consulta = $this->como_ganhar_dinheiroDAO->selectAll();

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