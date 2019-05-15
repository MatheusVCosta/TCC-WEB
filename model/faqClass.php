<?php

    class Faq{

    private $id;
    private $titulo;
    private $perguntas;
    private $respostas;
    private $status;

    public function __construct(){

    }

    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
        return $this;
    }

    public function getPerguntas(){
        return $this->perguntas;
    }
    public function setPerguntas($perguntas){
        $this->perguntas = $perguntas;
        return $this;
    }

    public function getRespostas(){
        return $this->respostas;
    }
    public function setRespostas($respostas){
        $this->respostas = $respostas;
        return $this;
    }
    public function setStatus($status){
        $this->status = $status;
        return $this;
    }
    public function getStatus(){
        return $this->status;
    }
}

?>