<?php

class Acessorio{
    
    private $id_acessorios;
    private $nome_acessorios;
    private $id_tipo_veiculo;
    /* Identifica se o estado (checket) do acessorio  0 = desativado and 1 = ativado */
    private $status;
    /* Identifica se o carro possui o acessorio  */
    private $estado;

    public function setId($id_acessorios){
        $this->id_acessorios = $id_acessorios;
        return $this;
    }

    public function getId(){
        return $this->id_acessorios;
    }

    public function setNome($nome_acessorios){
        $this->nome_acessorios = $nome_acessorios;
        return $this;
    }

    public function getNome(){
        return $this->nome_acessorios;
    }

    public function setIdTipoVeiculo($id_tipo_veiculo){
        $this->id_tipo_veiculo = $id_tipo_veiculo;
        return $this;
    }

    public function getIdTipoVeiculo(){
        return $this->id_tipo_veiculo;
    }

    public function setStatus($status){
        $this->status = $status;
        return $this;
    }
    public function getStatus(){
        return $this->status;
    }
    /* Estado e o que define se o carro tem ou não esse acessorio checado */
    public function setEstado($estado){
        $this->estado = $estado;
        return $this;
    }
    public function getEstado(){
        return $this->estado;
    }

}

?>