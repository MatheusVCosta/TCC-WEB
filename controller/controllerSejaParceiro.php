<?php


class ControllerSejaParceiro{
       
       private $topicosDAO;
        
       public function __construct(){

        require_once('model/topicoParceiroClass.php');
        require_once('model/dao/seja_parceiro_topicoDAO.php');

        $this->topicosDAO = new SejaParceiroTopicoDAO();

       }

       public function inserir_topico(){

            echo "Chegou na controoler de modo insert";
            
            $topico = new TopicoParceiro();

            $topico->setTitulo($_POST['titulo'])
                   ->setTexto($_POST['texto'])
                   ->setFoto($this->uploadImagem($_FILES['imagem']));


            $this->topicosDAO->insert($topico);
       }

       public function excluir_topico(){
             
             $this->topicosDAO->delete($_GET['id']);

       }
       public function atualizar_seja_parceiro(){
               if(isset($_GET['topico'])){
                    $this->atualizar_topico();
               }else if(isset($_GET['banner'])){
                    $this->atualizar_banner();
               }
       }
       public function atualizar_topico(){
             
             $topico = $this->topicosDAO->selectById($_GET['id']);

             if(isset($_FILES['imagem']) && $_FILES['imagem']['size']){
                $topico->setFoto($this->uploadImagem($_FILES['imagem']));
             }
             $topico->setTitulo($_POST['titulo'])
                    ->setTexto($_POST['texto']);
             
             $this->topicosDAO->update($topico);

       }
       public function atualizar_banner(){

              $banner = $this->topicosDAO->selectBanner();

              if(isset($_POST['texto1'])){

                 $banner->setTexto1($_POST['texto1'])
                        ->setTexto2($_POST['texto2'])
                        ->setTexto3($_POST['texto3']);
              }
              if($_FILES['foto1']['size'] > 0){
                 $banner->setFoto1($this->uploadImagem($_FILES['foto1']));
              }
              if($_FILES['foto2']['size'] > 0){
                 $banner->setFoto2($this->uploadImagem($_FILES['foto2']));
              }
              if(isset($_POST['status'])){
                 $banner->setStatus($_POST['status']);
              }else{
                 $banner->setStatus(1);
              }

              $this->topicosDAO->updateBanner($banner);
       }
       public function getBanner(){
              return $this->topicosDAO->selectBanner();
       }
       public function listar_topicos(){

           return $this->topicosDAO->selectAll();
           
       }

       public function getById($id = 0){
              if($id == 0)$id = $_GET['id'];

              return $this->topicosDAO->selectById($id);
       }

       /* UPLOAD DE IMAGEM 
        * $arquivo = $_FILE['imagem'] = objeto file do PHP
        */
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