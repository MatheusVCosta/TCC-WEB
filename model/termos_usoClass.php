<?php

    class Termos_uso{

    private $id;
    private $titulo;
    private $texto;
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

    public function getTitulo(){
        return $this->titulo;
    }
    public function setTitulo($titulo){
        $this->titulo = $titulo;
        return $this;
    }

    public function getTexto(){
        return $this->texto;
    }
    public function setTexto($texto){
        $this->texto  = $texto;
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