<?php


class Modelo{
    
    private $id_modelo;
    private $nome_modelo;
    private $id_tipo_marca;
    /* Identifica se o estado (checket) do acessorio  0 = desativado and 1 = ativado */
    private $status;
    private $excluido;

    /* FIP */
    private $cod_fip;

    public function __construct(){

    }
    
    public function getId(){
        return $this->id_modelo;
    }

    public function setId($id){
        $this->id_modelo = $id;
        return $this;
    }

    public function getNome(){
        return $this->nome_modelo;
    }

    public function setNome($nome){
        $this->nome_modelo = $nome;
        return $this;
    }

    public function getIdTipoMarca(){
        return $this->id_tipo_marca;
    }

    public function setIdTipoMarca($id_tipo_marca){
        $this->id_tipo_marca = $id_tipo_marca;
        return $this;
    }
    public function setStatus($status){
        $this->status = $status;
        return $this;
    }
    public function getStatus(){
        return $this->status;
    }
    public function setExcluido($excluido){
        $this->excluido = $excluido;
        return $this;
    }
    public function getExcluido(){
        return $this->excluido;
    }

    /* FIP */
    public function setCodFIP($cod_fip){
        $this->cod_fip = $cod_fip;
        return $this;
    }
    public function getCodFIP(){
        return $this->cod_fip;
    }

}


















?>