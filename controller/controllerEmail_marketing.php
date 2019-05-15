<?php 
       
class ControllerEmail_marketing{
    
    private $email_marketingDao;
    
    public function __construct(){
        //importando classes
        require_once('model/email_marketingClass.php');
        require_once('model/dao/email_marketingDAO.php');

        $this->email_marketingDao = new Email_marketingDao();
    }

    public function excluir_registro_email_marketing(){
        $id_email = $_GET['id'];

        $this->email_marketingDao->delete($id);
    }

    public function inserir(){
        
        $email_marketing = new Email_marketing();

        $email_marketing->setEmail($_POST['txtEmail']);
        
        $this->email_marketingDao->insert($email_marketing);

    }

    public function listar_registro_email_marketing(){
        $consulta = $this->email_marketingDao->selectAll();

        return $consulta;
    }
    public function getById(){

        $id = $_POST['id'];

        return $this->email_marketingDao->selectById($id);

    }
    public function enviar(){
        
        sleep(1);

        $assunto = $_POST['assunto'];
        $email = $_POST['email'];
        $mensagem = $_POST['mensagem'];
        
        $dados = array('email'=>"$email",
                       'assunto'=>"$assunto",
                       'conteudo'=>"$mensagem",
                       'key'=>"5748844fd988sdfsfsad");
        //mail($destinatario,$assunto,$corpo,$remetente);
        $resposta = $this->sendHttp('http://mobshare-email.herokuapp.com/email',$dados);

        var_dump($resposta);
        

    }
    public function sendHttp($url,$data){
        $dados = http_build_query($data);
        $contexto = stream_context_create(array(
            'http' => array(
                'method' => 'POST',
                'content' => $dados,
                'header' => "Content-type: application/x-www-form-urlencoded\r\n"
                . "Content-Length: " . strlen($dados) . "\r\n",
            )
        ));
        $resposta = "";
        
       $resposta = file_get_contents($url, null, $contexto);
       if(!$resposta){

           $auth = base64_encode("17259209:15553758807");

           /* PROXY SENAI ME ATRASANDO!!!*/
           $contexto = stream_context_create(array(
            'http' => array(
                'proxy' => "http://10.107.132.7:3129",
                'method' => 'POST',
                'content' => $dados,
                'header' => "Content-type: application/x-www-form-urlencoded\r\n"
                . "Content-Length: " . strlen($dados) . "\r\n",
                )
            ));
            $resposta = file_get_contents($url, null, $contexto);
       }
        
        return $resposta;
    }
}
?>