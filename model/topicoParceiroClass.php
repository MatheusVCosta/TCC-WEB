<?php

class PaginaParceiroBanner{

    private $id_seja_parceiro_banner;
    private $status;

    private $texto1_seja_parceiro_banner;
    private $texto2_seja_parceiro_banner;
    private $texto3_seja_parceiro_banner;

    private $foto1_seja_parceiro_banner;
    private $foto2_seja_parceiro_banner;

    public function __construct(){

    }
    public function setId($id_seja_parceiro){
        $this->id_seja_parceiro = $id_seja_parceiro;
        return $this;
    }
    public function getId(){
        return $this->id_seja_parceiro;
    }
    public function setStatus($status){
        $this->status = $status;
        return $this;
    }
    public function getStatus(){
        return $this->status;
    }
    /* Textos */
    public function setTexto1($texto1_seja_parceiro_banner){
        $this->texto1_seja_parceiro_banner = $texto1_seja_parceiro_banner;
        return $this;
    }
    public function getTexto1(){
        return $this->texto1_seja_parceiro_banner;
    }
    public function setTexto2($texto2_seja_parceiro_banner){
        $this->texto2_seja_parceiro_banner = $texto2_seja_parceiro_banner;
        return $this;
    }
    public function getTexto2(){
        return $this->texto2_seja_parceiro_banner;
    }
    public function setTexto3($texto3_seja_parceiro_banner){
        $this->texto3_seja_parceiro_banner = $texto3_seja_parceiro_banner;
        return $this;
    }
    public function getTexto3(){
        return $this->texto3_seja_parceiro_banner;
    }
    /* Fotos */
    public function setFoto1($foto1_seja_parceiro_banner){
        $this->foto1_seja_parceiro_banner = $foto1_seja_parceiro_banner;
        return $this;
    }
    public function getFoto1(){
        return $this->foto1_seja_parceiro_banner;
    }

    public function setFoto2($foto2_seja_parceiro_banner){
        $this->foto2_seja_parceiro_banner = $foto2_seja_parceiro_banner;
        return $this;
    }
    public function getFoto2(){
        return $this->foto2_seja_parceiro_banner;
    }
    
    
}

class TopicoParceiro{

    private $id_seja_parceiro;
    private $titulo_seja_parceiro;
    private $texto_seja_parceiro;
    private $foto_seja_parceiro;

    public function setId($id_seja_parceiro){
        $this->id_seja_parceiro = $id_seja_parceiro;
        return $this;
    }
    public function getId(){
        return $this->id_seja_parceiro;
    }
    public function setTitulo($titulo_seja_parceiro){
        $this->titulo_seja_parceiro = $titulo_seja_parceiro;
        return $this;
    }
    public function getTitulo(){
        return $this->titulo_seja_parceiro;
    }
    public function setTexto($texto_seja_parceiro){
        $this->texto_seja_parceiro = $texto_seja_parceiro;
        return $this;
    }
    public function getTexto(){
        return $this->texto_seja_parceiro;
    }
    public function setFoto($foto_seja_parceiro){
        $this->foto_seja_parceiro = $foto_seja_parceiro;
        return $this;
    }
    public function getFoto(){
        return $this->foto_seja_parceiro;
    }

}




?>