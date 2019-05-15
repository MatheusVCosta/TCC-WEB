<?php

    class Sobre{
        private $id_sobre;
        private $titulo_sobre;
        private $texto_sobre;
        private $foto_sobre;
        private $titulo_missao_sobre;
        private $texto_missao_sobre;
        private $foto_missao_sobre; 
        private $titulo_visao_sobre;
        private $texto_visao_sobre;
        private $foto_visao_sobre; 
        private $titulo_valores_sobre;
        private $texto_valores_sobre;
        private $foto_valores_sobre;
        
        public function __construct(){
            
        }
        
//        GET E SET DO ID 
        public function getId_sobre(){
            return $this->id_sobre;
        }
        
        public function setId_sobre($id_sobre){
            $this->id_sobre = $id_sobre;
            return $this;
        }       
        
//        GET titulo
        public function getTitulo_sobre(){
            return $this->titulo_sobre;
        }
        
        public function setTitulo_sobre($titulo_sobre){
            $this->titulo_sobre = $titulo_sobre;
            return $this;
        }
       
//    GET E SET texto
        public function getTexto_sobre(){
            return $this->texto_sobre;
        }
        
        public function setTexto_sobre($texto_sobre){
            $this->texto_sobre = $texto_sobre;
            return $this;
        }
//        GET E SET foto
        
        public function getFoto_sobre(){
            return $this->foto_sobre;
        }
        
        public function setFoto_sobre($foto_sobre){
            $this->foto_sobre = $foto_sobre;
            return $this;
        }
           
//GET E SET titulo_missao 
        
        public function getTitulo_missao_sobre(){
            return $this->titulo_missao_sobre;
        }
        
        public function setTitulo_missao_sobre($titulo_missao_sobre){
            $this->titulo_missao_sobre = $titulo_missao_sobre;
            return $this;
        }       
//GET E SET texto_missao
         public function getTexto_missao_sobre(){
            return $this->texto_missao_sobre;
        }
        
        public function setTexto_missao_sobre($texto_missao_sobre){
            $this->texto_missao_sobre = $texto_missao_sobre;
            return $this;
        }              
//GET E SET Foto_missao
        
         public function getFoto_missao_sobre(){
            return $this->foto_missao_sobre;
        }
        
        public function setFoto_missao_sobre($foto_missao_sobre){
            $this->foto_missao_sobre = $foto_missao_sobre;
            return $this;
        }               
//GET E SET titulo_visao
        
         public function getTitulo_visao_sobre(){
            return $this->titulo_visao_sobre;
        }
        
        public function setTitulo_visao_sobre($titulo_visao_sobre){
            $this->titulo_visao_sobre = $titulo_visao_sobre;
            return $this;
        }         
//GET E SET texto_visao
         public function getTexto_visao_sobre(){
            return $this->texto_visao_sobre;
        }
        
        public function setTexto_visao_sobre($texto_visao_sobre){
            $this->texto_visao_sobre = $texto_visao_sobre;
            return $this;
        }              
//GET E SET foto_visao
        public function getFoto_visao_sobre(){
            return $this->foto_visao_sobre;
        }
        
        public function setFoto_visao_sobre($foto_visao_sobre){
            $this->foto_visao_sobre = $foto_visao_sobre;
            return $this;
        }               
//GET E SET titulo_valores
        public function getTitulo_valores_sobre(){
            return $this->titulo_valores_sobre;
        }
        
        public function setTitulo_valores_sobre($titulo_valores_sobre){
            $this->titulo_valores_sobre = $titulo_valores_sobre;
            return $this;
        }         
//GET E SET texto_valores
         public function getTexto_valores_sobre(){
            return $this->texto_valores_sobre;
        }
        
        public function setTexto_valores_sobre($texto_valores_sobre){
            $this->texto_valores_sobre = $texto_valores_sobre;
            return $this;
        }              
//GET E SET foto_valores
          public function getFoto_valores_sobre(){
            return $this->foto_valores_sobre;
        }
        
        public function setFoto_valores_sobre($foto_valores_sobre){
            $this->foto_valores_sobre = $foto_valores_sobre;
            return $this;
        }                  
      
    }











?>