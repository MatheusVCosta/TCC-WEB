<?php 

class veiculo{

    private $id_veiculo;
    private $ano;
    private $placa;
    private $quilometragem;
    private $renavam;
    /* OLHA PESSOAL EU SINTO QUE TEM ALGO DE ERRADO NÃO SO POR QUE EU TO MAL MAS PQ
     * E POSSIVEL CRIAR um getCliente() que retorna um objeto cliente, mas so dizendo
     */
    private $id_tipo_veiculo;
    private $id_marca_veiculo;
    private $id_modelo_veiculo;
    private $id_cliente;

    /* Objetos  vi que éra necessario para fazer as coisas */
    private $tipo_veiculo;
    private $marca_veiculo;
    private $modelo_veiculo;
    private $cliente;

    /*
     * Preciso armazenar as fotos em algum lugar
     */
    private $fotos;
    /*
     * Preciso armazenar os acessorios em algum lugar
     */
    private $acessorios;

    public function __construct(){

    }

    public function setId($id_veiculo){
        $this->id_veiculo = $id_veiculo;
        return $this;
    }
    public function getId(){
        return $this->id_veiculo;
    }
    public function setAno($ano){
        $this->ano = $ano;
        return $this;
    }
    public function getAno(){
        return $this->ano;   
    }
    public function setPlaca($placa){
        $this->placa = $placa;
        return $this;
    }
    public function getPlaca(){
        return $this->placa;
    }
    public function setQuilometragem($quilometragem){
        $this->quilometragem = $quilometragem;
        return $this;
    }
    public function getQuilometragem(){
        return $this->quilometragem;
    }
    public function setRenavam($renavam){
        $this->renavam = $renavam;
        return $this;
    }
    public function getRenavam(){
        return $this->renavam;
    }

    /*  
     *  Definindo o get e set Das forekeys
     *  Acho que seria melhor :
     *  Melhor seria um getMarca() retornando um objeto marca
     *  Melhor seria um getModelo() retornando um objeto modelo
     *  Melhor seria um getTipo() retornando um objeto Tipo
     *  Melhor seria um getCliente() retornando um objeto Cliente
     */
    public function setIdTipoVeiculo($id_tipo_veiculo){
        $this->id_tipo_veiculo = $id_tipo_veiculo;
        return $this;
    }
    public function getIdTipoVeiculo(){
        return $this->id_tipo_veiculo;
    }
    public function setIdMarcaVeiculo($id_marca_veiculo){
        $this->id_marca_veiculo = $id_marca_veiculo;
        return $this;
    }
    public function getIdMarcaVeiculo(){
        return $this->id_marca_veiculo;
    }
    public function setIdModeloVeiculo($id_modelo_veiculo){
        $this->id_modelo_veiculo = $id_modelo_veiculo;
        return $this;
    }
    public function getIdModeloVeiculo(){
        return $this->id_modelo_veiculo;
    }
    public function setIdCliente($id_cliente){
        $this->id_cliente = $id_cliente;
        return $this;
    }
    public function getIdCliente(){
        return $this->id_cliente;
    }
    /*
     * Acabei de perceber que presiso pegar os dados de marca,modelo e tipo
     * de forma rapida diretamente da lista.
     */
    public function setCliente($cliente){
        $this->cliente = $cliente;
        return $this;
    }
    public function getCliente(){
        return $this->cliente;
    }
    public function setTipo($tipo){
        $this->tipo_veiculo = $tipo;
        return $this;
    }
    public function getTipo(){
        return $this->tipo_veiculo;
    }
    public function setMarca($marca_veiculo){
        $this->marca_veiculo = $marca_veiculo;
        return $this;
    }
    public function getMarca(){
        return $this->marca_veiculo;
    }
    public function setModelo($modelo){
        $this->modelo_veiculo = $modelo;
        return $this;
    }
    public function getModelo(){
        return $this->modelo_veiculo;
    }
    /* Cuida de passar os acessorios */
    public function setAcessorios($acessorios){
        $this->acessorios = $acessorios;
        return $this;
    }
    public function getAcessorios(){
        return $this->acessorios;
    }

    /* Cuida de passar as fotos */
    public function setFotos($fotos){
        $this->fotos = $fotos;
        return $this;
    }
    public function getFotos(){
        return $this->fotos;
    }

}


?>