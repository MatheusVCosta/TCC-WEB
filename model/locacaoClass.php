class Locacao{

    private $id_locacao;
    private $id_cliente_locador;
    private $id_anuncio;
    private $valor_locacao;
    private $data_hora_final;
    private $id_percentual;

    public function setId($id_locacao){
        $this->id_locacao = $id_locacao;
        return $this;
    }

    public function getId(){
        return $this->$id_locacao;
    }

    public function setId_cliente_locador($id_cliente_locador){
        $this->id_cliente_locador = $id_cliente_locador;
        return $this;
    }

    public function getId_cliente_locador(){
        return $this->$id_cliente_locador;
    }

    public function setAnuncio($id_anuncio){
        $this->id_locacao = $id_anuncio;
        return $this;
    }

    public function getAnuncio(){
        return $this->$id_anuncio;
    }

    public function setValor_locacao($valor_locacao){
        $this->valor_locacao = $valor_locacao;
        return $this;
    }

    public function getValor_locacao(){
        return $this->$valor_locacao;
    }

    public function setData_hora_final($data_hora_final){
        $this->data_hora_final = $data_hora_final;
        return $this;
    }

    public function getData_hora_final(){
        return $this->$data_hora_final;
    }
    
    public function setId_percentual($id_percentual){
        $this->id_locacao = $id_percentual;
        return $this;
    }

    public function getId_percentual(){
        return $this->$id_percentual;
    }
}