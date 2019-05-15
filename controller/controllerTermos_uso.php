<?php
class ControllerTermos_uso{

    //private $conex;
    private $termos_usoDAO;

    public function __construct(){

        require_once('model/dao/termos_usoDAO.php');
        require_once('model/termos_usoClass.php');

        $this->termos_usoDao = new Termos_usoDao();

        $this->conex = new conexaoMysql();
    }
    public function inserir_termos_uso(){

        //verificar se o metodo que esta chegando é GET ou POST
            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                $termos_uso = new Termos_uso();

                $termos_uso->setTitulo($_POST['txtTitulo'])
                            ->setTexto($_POST['txtTexto']);

                $this->termos_usoDao->insert($termos_uso);
            }
            
    }

    public function excluir_termos_uso(){

        $id = $_GET['id'];
        $this->termos_usoDao->delete($id);

    }
    public function atualizar_termos_uso(){

        //verificar se o metodo que esta chegando é GET ou POST
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $termos_uso = $this->getPagina();

                if(isset($_POST['txtTitulo'])){
                    $termos_uso->setTitulo($_POST['txtTitulo'])
                               ->setTexto($_POST['txtTexto']);
                }

               if(isset($_POST['status'])){
                    $termos_uso->setStatus($_POST['status']);
                }

                $this->termos_usoDao->insert($termos_uso);
            }

    }

    public function getById(){

        $id = $_POST['id'];
        return $this->termos_usoDao->selectById($id);

    }

    public function listar_termos_uso(){

        $consulta = $this->termos_usoDao->selectAll();

        return $consulta;
    }

    public function getPagina(){

        $consulta = $this->termos_usoDao->selectPage();

        return $consulta;
    }
}
?>
