<?php

    class Niveis{

        private $id_niveis;
        private $nome_nivel;
        private $descricao;


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
        
       
    }

?>