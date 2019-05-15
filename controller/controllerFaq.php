<?php
class ControllerFaq{

    //private $conex;
    private $faqDAO;

    public function __construct(){

        //require_once('model/dao/conexaoMysql.php');
        require_once('model/dao/faqDAO.php');
        require_once('model/faqClass.php');

        $this->faqDao = new FaqDao();

        $this->conex = new conexaoMysql();
    }
    public function inserir_faq(){

        //$faq = new Faq();
        //verificar se o metodo que esta chegando é GET ou POST
            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                $faq = new Faq();

                $faq->setPerguntas($_POST['txtPerguntas'])
                    ->setRespostas($_POST['txtRespostas']);

                $this->faqDao->insert($faq);
            }
            
    }

    public function excluir_faq(){

        $id = $_GET['id'];
        $this->faqDao->delete($id);

    }
    public function atualizar_faq(){

        //$faq = new Faq();
        //verificar se o metodo que esta chegando é GET ou POST
            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                $faq = $this->faqDao->selectById($_GET['id']);
                
                if(isset($_POST['txtPerguntas'])){

                    $faq->setPerguntas($_POST['txtPerguntas'])
                        ->setRespostas($_POST['txtRespostas']);
                
                }
                if(isset($_POST['status'])){
                    $faq->setStatus($_POST['status']);
                }

                $this->faqDao->update($faq);
            }

    }

    //$id = 0
    public function getById(){

//          if($id == 0)$id = $_GET['id'];


//         return $this->faqDao->selectById($id);


        $id = $_POST['id'];
        return $this->faqDao->selectById($id);

    }

    public function listar_faq(){

        $consulta = $this->faqDao->selectAll();

        return $consulta;
    }
}
?>