<?php

    class Usuario{

        private $id;
        private $nome;
        private $email;
	private $senha;
	private $id_niveis;

        public function __construct(){

        }

	/* Gets */
        
	public function getId(){
		return $this->id;
	}
	public function getNome(){
		return $this->nome;
	}
	public function getEmail(){
		return $this->email;
	}
	public function getSenha(){
		return $this->senha;
	}
	public function getNivel(){
		return $this->id_niveis;		
	}

	
	/* Sets */

	public function setId($id){
		$this->id =  $id;
		return $this;
	}
	public function setNome($nome){
		$this->nome = $nome;
		return $this;
	}
	public function setEmail($email){
		$this->email = $email;
		return $this;
	}
	public function setSenha($senha){
		$this->senha = $senha;
		return $this;
	}
	public function setNivel($id_niveis){
		$this->id_niveis =  $id_niveis;
		return $this;	
	}

    }

?>