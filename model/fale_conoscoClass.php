<?php 

class Fale_conosco{

    private $id;
    private $nome;
    private $email;
    private $telefone;
    private $celular;
    private $mensagem;

    public function __construct(){

    }

    /*Get*/

    public function getId(){
		return $this->id;
	}

    public function getNome(){
        return $this->nome;
    }

    public function getEmail(){
        return $this->email;
    }
    
	public function getTelefone(){
		return $this->telefone;
	}

    public function getCelular(){
        return $this->celular;
    }
    
    public function getMensagem(){
        return $this->mensagem;
    }

    /*Set*/

    public function setId($id){
		$this->id =  $id;
		return $this;
    }
    
    public function setNome($nome){
		$this->nome =  $nome;
		return $this;
    }
    
    public function setEmail($email){
		$this->email =  $email;
		return $this;
    }

    public function setTelefone($telefone){
		$this->telefone = $telefone;
		return $this;
    }

    public function setCelular($celular){
		$this->celular =  $celular;
		return $this;
    }
    
    public function setMensagem($mensagem){
		$this->mensagem =  $mensagem;
		return $this;
	}
}

?>