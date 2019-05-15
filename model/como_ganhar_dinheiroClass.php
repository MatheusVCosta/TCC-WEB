<?php

class Como_ganhar_dinheiro{

    private $id;

    private $titulo_sessao1;
    private $lista1_sessao1;
    private $lista2_sessao1;
    private $img1_sessao1;

    private $titulo_sessao2;
    private $img1_sessao2;
    private $lista1_sessao2;
    private $img2_sessao2;
    private $lista2_sessao2;

    private $titulo_sessao3;
    private $texto_sessao3;   

    public function __construct(){

    }

    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
        return $this;
    }

    /*SESSÃO 1*/
    public function getTitulo_sessao1(){
        return $this->titulo_sessao1;
    }
    public function setTitulo_sessao1($titulo_sessao1){
        $this->titulo_sessao1 = $titulo_sessao1;
        return $this;
    }

    public function getLista1_sessao1(){
        return $this->lista1_sessao1;
    }
    public function setLista1_sessao1($lista1_sessao1){
        $this->lista1_sessao1 = $lista1_sessao1;
        return $this;
    }

    public function getLista2_sessao1(){
        return $this->lista2_sessao1;
    }
    public function setLista2_sessao1($lista2_sessao1){
        $this->lista2_sessao1 = $lista2_sessao1;
        return $this;
    }

    public function getImg1_sessao1(){
        return $this->img1_sessao1;
    }
    public function setImg1_sessao1($img1_sessao1){
        $this->img1_sessao1 = $img1_sessao1;
        return $this;
    }


    /*SESSÃO 2*/
     public function getTitulo_sessao2(){
        return $this->titulo_sessao2;
    }
    public function setTitulo_sessao2($titulo_sessao2){
        $this->titulo_sessao2 = $titulo_sessao2;
        return $this;
    }

    public function getImg1_sessao2(){
        return $this->img1_sessao2;
    }
    public function setImg1_sessao2($img1_sessao2){
        $this->img1_sessao2 = $img1_sessao2;
        return $this;
    }

    public function getLista1_sessao2(){
        return $this->lista1_sessao2;
    }
    public function setLista1_sessao2($lista1_sessao2){
        $this->lista1_sessao2 = $lista1_sessao2;
        return $this;
    }

    public function getImg2_sessao2(){
        return $this->img2_sessao2;
    }
    public function setImg2_sessao2($img2_sessao2){
        $this->img2_sessao2 = $img2_sessao2;
        return $this;
    }

    public function getLista2_sessao2(){
        return $this->lista2_sessao2;
    }
    public function setLista2_sessao2($lista2_sessao2){
        $this->lista2_sessao2 = $lista2_sessao2;
        return $this;
    }
    
    /*SESSÃO 3*/
    public function getTitulo_sessao3(){
        return $this->titulo_sessao3;
    }
    public function setTitulo_sessao3($titulo_sessao3){
        $this->titulo_sessao3 = $titulo_sessao3;
        return $this;
    }

    public function getTexto_sessao3(){
        return $this->texto_sessao3;
    }
    public function setTexto_sessao3($texto_sessao3){
        $this->texto_sessao3 = $texto_sessao3;
        return $this;
    }
}
?>