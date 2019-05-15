<?php


class locacaoDAO{

    private $conex;

    public function __construct(){
        
        require_once('model/dao/conexaoMysql.php');
        
        $this->conex = new  conexaoMysql();
    }

    public function insert($locacao){
        
        $sql = " INSERT INTO tbl_locacao(id_cliente_locador, id_anuncio,valor_locacao,data_hora_final,id_percentual)".
                   " VALUES('". $locacao->getId_cliente_locador() ."','". $locacao->getAnuncio() ."','". $locacao->getValor_locacao() ."','". $locacao->getData_hora_final() ."',". $locacao->getId_percentual() .")";
            
         //Abrido conexao com o BD
        $PDO_conex = $this->conex->connect_database();

        if($PDO_conex->query($sql)){

            echo "inserido com sucesso";

        } else {

            echo "Erro no script de insert";

        }
    }
    public function update(){

    }

    public function delete(){

    }

    public function selectAll($tipo,$id_cliente_logado){
       
       if($tipo = "andamento"){
        
        $sql = "SELECT tbl_locacao.* FROM tbl_anuncio inner join tbl_locacao on (tbl_locacao.id_anuncio = tbl_anuncio.id_anuncio AND tbl_locacao.data_hora_final is null) where tbl_anuncio.id_cliente_locador="$id_cliente_logado; 
       
       }else{
      
        $sql = "SELECT tbl_locacao.* FROM tbl_anuncio inner join tbl_locacao on (tbl_locacao.id_anuncio = tbl_anuncio.id_anuncio) where tbl_anuncio.id_cliente_locador="$id_cliente_logado; 
       
       }

       $PDO_conex = $this->conex->connect_database();

       $select = $PDO_conex->query($sql);

    }

    public function selectById($id){
            
        $sql = "SELECT * FROM tbl_locacao where id_locacao =".$id;

        $PDO_conex = $this->conex->connect_database();

        $select = $PDO_conex->query($sql);

        if($rs_locacao = $select->fetch(PDO::FETCH_ASSOC)){

            $acessorio = new Acessorio();

            $acessorio->setId($rs_locacao['id_locacao'])
                        ->setId_cliente_locador($rs_locacao['id_cliente_locador'])
                        ->setAnuncio($rs_locacao['id_anuncio'])
                        ->setValor_locacao($rs_locacao['valor_locacao'])
                        ->setData_hora_final($rs_locacao['data_hora_final'])
                        ->setId_percentual($rs_locacao['id_percentual']);


            $this->conex->close_database();

            return $acessorio;

        } else {

            $this->conex->close_database();

            return false;
        }

    }
}
?>