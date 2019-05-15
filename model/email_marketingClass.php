<?php 

class Email_marketing{

    private $id;
    private $email;

    public function __construct(){

    }

    /*Get*/

    public function getId(){
		return $this->id;
	}

    public function getEmail(){
        return $this->email;
    }

    /*Set*/

    public function setId($id){
		$this->id =  $id;
		return $this;
    }
    
    public function setEmail($email){
		$this->email =  $email;
		return $this;
    }
	
}

?>