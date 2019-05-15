<?php

class controllerHome{
    
    private $homeDAO;

    public function __construct(){
        //importando classes
        require_once('model/homeClass.php');
        require_once('model/dao/homeDAO.php');

        $this->homeDAO = new HomeDAO();
    }

    public function esconder_home(){

        echo $_POST['status'];

        if(isset($_GET['banner'])){
            
            $banner = $this->homeDAO->selectBanner();

            $this->homeDAO->insertBanner($banner,$_POST['status']);

        }elseif(isset($_GET['sessao_como_funciona'])){
            
            $sessao = $this->homeDAO->selectSessaoComoFunciona();

            $this->homeDAO->insertSessaoComoFunciona($sessao,$_POST['status']);

        }elseif(isset($_GET['sessao_oque_pode_alugar'])){

            $sessao = $this->homeDAO->selectSessaoOquePodeAlugar();

            $this->homeDAO->insertSessaoOquePodeAlugar($sessao,$_POST['status']);

        }elseif(isset($_GET['sessao_por_que_anunciar'])){

            $sessao = $this->homeDAO->selectSessaoPorQueAnunciar();

            $this->homeDAO->insertSessaoPorQueAnunciar($sessao,$_POST['status']);

        }elseif(isset($_GET['sessao_quer_anunciar'])){
            
            $sessao = $this->homeDAO->selectSessaoQuerAnunciar();

            $this->homeDAO->insertSessaoQuerAnunciar($sessao,$_POST['status']);

        }
    }

    public function atualizar_home(){

        /* Foi mal galera mas só consegui assim */
        
        if(isset($_GET['banner'])){
            
            $this->update_sessao1();

        }elseif(isset($_GET['sessao_como_funciona'])){
            
            $this->update_sessao2();

        }elseif(isset($_GET['sessao_oque_pode_alugar'])){

            $this->update_sessao3();

        }elseif(isset($_GET['sessao_por_que_anunciar'])){

            $this->update_sessao4();

        }elseif(isset($_GET['sessao_quer_anunciar'])){
            
            $this->update_sessao5();

        }
    }
    

    public function update_sessao1(){/* Banner */
        
        $banner = $this->homeDAO->selectBanner();

        if( isset($_FILES['foto']) && $_FILES['foto']['size'] > 0 ){
            $banner->setFoto($this->uploadImagem($_FILES['foto']));
        }
        

        if(isset($_POST['texto'])){
            $banner->setTexto($_POST['texto']);
        }
        if(isset($_POST['texto2'])){
            $banner->setTexto2($_POST['texto2']);
        }


        $this->homeDAO->insertBanner($banner);
    }
    public function update_sessao2(){

        $sessao = $this->homeDAO->selectSessaoComoFunciona();

        echo "Hellow ";

        if( isset($_FILES['foto']) && $_FILES['foto']['size'] > 0 ){
            $sessao->setFoto($this->uploadImagem($_FILES['foto']));
        }
        if(isset($_POST['titulo'])){
            $sessao->setTitulo($_POST['titulo']);
        }
        if(isset($_POST['texto'])){
            $sessao->setTexto($_POST['texto']);
        }


        $this->homeDAO->insertSessaoComoFunciona($sessao);
        
    }
    public function update_sessao3(){

        $sessao = $this->homeDAO->selectSessaoOquePodeAlugar();

        if( isset($_FILES['foto1']) && $_FILES['foto1']['size'] > 0 ){
            $sessao->setFoto1($this->uploadImagem($_FILES['foto1']));
        }
        if( isset($_FILES['foto2']) && $_FILES['foto2']['size'] > 0 ){
            $sessao->setFoto2($this->uploadImagem($_FILES['foto2']));
        }
        if( isset($_FILES['foto3']) && $_FILES['foto3']['size'] > 0 ){
            $sessao->setFoto3($this->uploadImagem($_FILES['foto3']));
        }

        if(isset($_POST['titulo'])){
            $sessao->setTitulo($_POST['titulo']);
        }
        /* Topico 1 */
        if(isset($_POST['topico1-titulo'])){
            $sessao->setTitulo1($_POST['topico1-titulo']);
        }
        if(isset($_POST['topico1-texto'])){
            $sessao->setTexto1($_POST['topico1-texto']);
        }
        /* Topico 2 */
        if(isset($_POST['topico2-titulo'])){
            $sessao->setTitulo2($_POST['topico2-titulo']);
        }
        if(isset($_POST['topico2-texto'])){
            $sessao->setTexto2($_POST['topico2-texto']);
        }
        /* Topico 3 */
        if(isset($_POST['topico3-titulo'])){
            $sessao->setTitulo3($_POST['topico3-titulo']);
        }
        if(isset($_POST['topico3-texto'])){
            $sessao->setTexto3($_POST['topico3-texto']);
        }


        $this->homeDAO->insertSessaoOquePodeAlugar($sessao);
    }
    public function update_sessao4(){

        $sessao = $this->homeDAO->selectSessaoPorQueAnunciar();


        if( isset($_FILES['foto']) && $_FILES['foto']['size'] > 0 ){
            $sessao->setFoto($this->uploadImagem($_FILES['foto']));
        }
        if(isset($_POST['titulo'])){
            $sessao->setTitulo($_POST['titulo']);
        }
        if(isset($_POST['texto'])){
            $sessao->setTexto($_POST['texto']);
        }


        $this->homeDAO->insertSessaoPorQueAnunciar($sessao);
    }
    public function update_sessao5(){

        $sessao = $this->homeDAO->selectSessaoQuerAnunciar();

        if( isset($_FILES['foto1']) && $_FILES['foto1']['size'] > 0 ){
            $sessao->setFoto1($this->uploadImagem($_FILES['foto1']));
        }
        if( isset($_FILES['foto2']) && $_FILES['foto2']['size'] > 0 ){
            $sessao->setFoto2($this->uploadImagem($_FILES['foto2']));
        }
        if( isset($_FILES['foto3']) && $_FILES['foto3']['size'] > 0 ){
            $sessao->setFoto3($this->uploadImagem($_FILES['foto3']));
        }
        if( isset($_FILES['foto4']) && $_FILES['foto4']['size'] > 0 ){
            $sessao->setFoto4($this->uploadImagem($_FILES['foto4']));
        }

        if(isset($_POST['titulo'])){
            $sessao->setTitulo($_POST['titulo']);
        }
        if(isset($_POST['subtitulo'])){
            $sessao->setSubTitulo($_POST['subtitulo']);
        }
        /* Topico 1 */
        if(isset($_POST['topico1-titulo'])){
            $sessao->setSubTitulo1($_POST['topico1-titulo']);
        }
        if(isset($_POST['topico1-texto'])){
            $sessao->setTexto1($_POST['topico1-texto']);
        }
        /* Topico 2 */
        if(isset($_POST['topico2-titulo'])){
            $sessao->setSubTitulo2($_POST['topico2-titulo']);
        }
        if(isset($_POST['topico2-texto'])){
            $sessao->setTexto2($_POST['topico2-texto']);
        }
        /* Topico 3 */
        if(isset($_POST['topico3-titulo'])){
            $sessao->setSubTitulo3($_POST['topico3-titulo']);
        }
        if(isset($_POST['topico3-texto'])){
            $sessao->setTexto3($_POST['topico3-texto']);
        }
        /* Topico 4 */
        if(isset($_POST['topico4-titulo'])){
            $sessao->setSubTitulo4($_POST['topico4-titulo']);
        }
        if(isset($_POST['topico4-texto'])){
            $sessao->setTexto4($_POST['topico4-texto']);
        }


        $this->homeDAO->insertSessaoQuerAnunciar($sessao);
    }
    public function getPage(){
        
        return $this->homeDAO->selectPage();

    }

    /* UPLOAD DE IMAGEM 
     * $arquivo = $_FILE['foto'] = objeto file do PHP
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