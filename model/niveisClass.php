<?php

    class Niveis{

        private $id_niveis;
        private $nome_nivel;
        private $descricao;
        private $excluido;
        private $lista_menu;


        public function __construct(){

        }
        
        public function getId_niveis(){
            return $this->id_niveis;
        }
        public function setId_niveis($id_niveis){
            $this->id_niveis = $id_niveis;
            return $this;
        }


        public function getNome_nivel(){
            return $this->nome_nivel;
        }
        public function setNome_nivel($nome_nivel){
            $this->nome_nivel = $nome_nivel;
            return $this;
        }


        
        public function getDescricao(){
            return $this->descricao;
        }
        public function setDescricao($descricao){
            $this->descricao = $descricao;
            return $this;
        }

        public function setListaMenu($lista_menu){
            $this->lista_menu = $lista_menu;
            return $this;
        }
        public function getListaMenu(){
            return $this->lista_menu;
        }
        /* Gets e Sets que definem se o nivel foi ou não excluido */
        public function setExcluido($excluido){
            $this->excluido = $excluido;
            return $this;
        }
        public function getExcluido(){
            return $this->excluido;
        }
       
    }
    /* Class que representa os itens do menu  */
    class menu{

        private $id_menu;
        private $nome_menu;
        private $href;
        private $icone;
        private $click;
        /* Atributo que define se possui ou não */
        private $selecionado;

        public function setId($id_menu){
            $this->id_menu = $id_menu;
            return $this;
        }
        public function getId(){
            return $this->id_menu;
        }
        public function setNome($nome_menu){
            $this->nome_menu = $nome_menu;
            return $this;
        }
        public function getNome(){
            return $this->nome_menu;
        }
        public function setHref($href){
            $this->href = $href;
            return $this;
        }
        public function getHref(){
            return $this->href;
        }
        public function setIcone($icone){
            $this->icone = $icone;
            return $this;
        }
        public function getIcone(){
            return $this->icone;
        }
        public function setClick($click){
            $this->click = $click;
            return $this;
        }
        public function getClick(){
            return $this->click;
        }
        public function setSelecionado($selecionado){
            $this->selecionado = $selecionado;
            return $this;
        }
        public function getSelecionado(){
            return $this->selecionado;
        }

    }
?>