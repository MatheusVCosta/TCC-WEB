<?php

    class conexaoMysql{
        
        private $server;
        private $user;
        private $password;
        private $database;

        //método construtos para passar os dados do banco 
        public function __construct(){
         
            $this->user = 'root';
	        $this->password = 'bcd127';
   	        $this->server = 'localhost';
            $this->user = 'root';
            $this->database = 'mob_share';
        }

        //método para abrir conexao com o banco
        public function connect_database(){
           
            try{
                $conexao = new PDO('mysql:host='.$this->server.';dbname='.$this->database, $this->user, $this->password);
                return $conexao;
            }catch(PDOException $erro){
                echo 'Erro ao tentar a conexao com o banco de dados! <br>
                Linhas: '.$erro->getLine().'<br>
                Mensagem: '. $erro->getMessage();
            }
        }
        //fechar conexao
        public function close_database(){
            $conexao = null;
            unset($conexao);
        }
    }

?>
