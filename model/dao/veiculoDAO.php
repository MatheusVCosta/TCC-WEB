<?php


class  VeiculoDAO{

    private $conex;

    /* Ligações <--->  da tabela de veiculo */
    private $marcasDAO;
    private $modelosDAO;
    private $tiposDAO;
    private $clientesDAO;
    private $acessoriosDAO;
    
    public function __construct(){

        require_once('model/veiculoClass.php');
        require_once('model/dao/conexaoMysql.php');
        
        /* LIGAÇÃO clientes <---> veiculo */
        require_once('model/dao/clienteDAO.php');
        $this->clientesDAO = new ClienteDAO();

        /* LIGAÇÃO marcas <---> veiculo */
        require_once('model/dao/marcasDAO.php');
        $this->marcasDAO = new MarcaDAO();
        
        /* LIGAÇÃO modelos <---> veiculo */
        require_once('model/dao/modelosDAO.php');
        $this->modelosDAO = new ModeloDAO();

        /* LIGAÇÃO tipos <---> veiculo */
        require_once('model/dao/tipo_veiculoDAO.php');
        $this->tiposDAO = new TipoVeiculoDAO();

        /* LIGAÇÃO acessorios <---> veiculo */
        require_once('model/dao/acessorioDAO.php');
        $this->acessoriosDAO = new AcessorioDAO();

        $this->conex = new  conexaoMysql();

    }

    public function insert($veiculo){


    }

    public function update($veiculo){
       
    }

    public function aprovar($id_veiculo, $mensagem, $id_usuario_cms){
        
        $sql = "INSERT INTO tbl_aprovacao_veiculo (status_aprovacao,mensagem,id_usuario_cms,id_veiculo)".
                "VALUES(0,'". $mensagem ."',". $id_usuario_cms .",". $id_veiculo .")";
        echo "SQL : $sql";
        //Abrido conexao com o BD
        $PDO_conex = $this->conex->connect_database();

        if($PDO_conex->query($sql)){
            echo "Insert com sucesso";
        }else{
            echo "Erro no script de insert";
        }
        $this->conex->close_database();
    }
    public function reprovar($id_veiculo, $mensagem, $id_usuario_cms){

        $sql = "INSERT INTO tbl_aprovacao_veiculo (status_aprovacao,mensagem,id_usuario_cms,id_veiculo)".
                "VALUES(0,'". $mensagem ."',". $id_usuario_cms .",". $id_veiculo .")";
        
        //Abrido conexao com o BD
        $PDO_conex = $this->conex->connect_database();

        if($PDO_conex->query($sql)){
            echo "Insert com sucesso";
        }else{
            echo "Erro no script de insert";
        }

        $this->conex->close_database();
    }

    public function selectById($id){

       $sql = " SELECT * FROM tbl_veiculo WHERE id_veiculo=".$id;
        
        //Abrido conexao com o BD
       $PDO_conex = $this->conex->connect_database();

        
        $select = $PDO_conex->query($sql);

        if($rs_veiculo = $select->fetch(PDO::FETCH_ASSOC)){

            $veiculo = new Veiculo();

            $veiculo->setId($rs_veiculo['id_veiculo'])
                    ->setAno($rs_veiculo['ano'])
                    ->setPlaca($rs_veiculo['placa'])
                    ->setQuilometragem($rs_veiculo['quilometragem'])
                    ->setRenavam($rs_veiculo['renavam'])
                    ->setIdTipoVeiculo($rs_veiculo['id_tipo_veiculo'])
                    ->setIdMarcaVeiculo($rs_veiculo['id_marca_veiculo'])
                    ->setIdModeloVeiculo($rs_veiculo['id_modelo_veiculo'])
                    ->setIdCliente($rs_veiculo['id_cliente']);
             
             $marca   = $this->marcasDAO->select($veiculo->getIdMarcaVeiculo());

             $modelo  = $this->modelosDAO->select($veiculo->getIdModeloVeiculo());

             $tipo    = $this->tiposDAO->select($veiculo->getIdTipoVeiculo());

             $cliente = $this->clientesDAO->selectById($veiculo->getIdCliente());

             $acessorios = $this->acessoriosDAO->selectByVeiculo($veiculo);
             

             /*  Colocando os objetos */

             $veiculo->setMarca($marca)
                     ->setModelo($modelo)
                     ->setTipo($tipo)
                     ->setCliente($cliente)
                     ->setAcessorios($acessorios);

            /* Pegando fotos */
            $sqlFoto = "SELECT * FROM tbl_foto_veiculo WHERE id_veiculo=".$rs_veiculo['id_veiculo'];

            $selectFoto = $PDO_conex->query($sqlFoto);
            
            $fotos = array();
            // Verifica se o select possui alguma coisa e evita o erro call to member
            if($selectFoto){

                while($rs_fotos = $selectFoto->fetch(PDO::FETCH_ASSOC)){
                    $fotos[]=  $rs_fotos['nome_foto'];
                }

            }

            $veiculo->setFotos($fotos);

            return $veiculo;

        } else {
            echo "Veiculo não encontrado";
            return false;
        }
        

        $this->conex->close_database();        

    }
    public function selectAll(){

        $sql = " SELECT * FROM tbl_veiculo ";

        //Abrido conexao com o BD
        $PDO_conex = $this->conex->connect_database();

        
        $select = $PDO_conex->query($sql);

        $listar_veiculo = array();

        while($rs_veiculo = $select->fetch(PDO::FETCH_ASSOC)){

            
            $veiculo = new Veiculo();

            $veiculo->setId($rs_veiculo['id_veiculo'])
                    ->setAno($rs_veiculo['ano'])
                    ->setPlaca($rs_veiculo['placa'])
                    ->setQuilometragem($rs_veiculo['quilometragem'])
                    ->setRenavam($rs_veiculo['renavam'])
                    ->setIdTipoVeiculo($rs_veiculo['id_tipo_veiculo'])
                    ->setIdMarcaVeiculo($rs_veiculo['id_marca_veiculo'])
                    ->setIdCliente($rs_veiculo['id_cliente']);

             $marca   = $this->marcasDAO->select($veiculo->getIdMarcaVeiculo());

             $modelo  = $this->modelosDAO->select($veiculo->getIdModeloVeiculo());

             $tipo    = $this->tiposDAO->select($veiculo->getIdTipoVeiculo());

             $cliente = $this->clientesDAO->selectById($veiculo->getIdCliente());

             $acessorios = $this->acessoriosDAO->selectByVeiculo($veiculo);
             

             /*  Colocando os objetos */

             $veiculo->setMarca($marca)
                     ->setModelo($modelo)
                     ->setTipo($tipo)
                     ->setCliente($cliente)
                     ->setAcessorios($acessorios);


            /* Pegando fotos */
            $sql = "SELECT * FROM tbl_foto_veiculo WHERE id_veiculo=".$rs_veiculo['id_veiculo'];

            $select = $PDO_conex->query($sql);
            
            $fotos = array();

            while($rs_fotos = $select->fetch(PDO::FETCH_ASSOC)){
                $fotos[]=  $rs_fotos['nome_foto'];
            }
            $veiculo->setFotos($fotos);

            $listar_veiculo[] = $veiculo;

        }
        

        $this->conex->close_database();        

        return $listar_veiculo;

    }

    public function selectAllPendentes(){
        /* Pegando todos os Veiculos que não tenha um status */
        $sql = "SELECT * FROM tbl_veiculo where id_veiculo not in (select id_veiculo from tbl_aprovacao_veiculo)";

        //Abrido conexao com o BD
        $PDO_conex = $this->conex->connect_database();

        
        $select = $PDO_conex->query($sql);

        $listar_veiculo = array();

        while($rs_veiculo = $select->fetch(PDO::FETCH_ASSOC)){

            $veiculo = new Veiculo();

            $veiculo->setId($rs_veiculo['id_veiculo'])
                    ->setAno($rs_veiculo['ano'])
                    ->setPlaca($rs_veiculo['placa'])
                    ->setQuilometragem($rs_veiculo['quilometragem'])
                    ->setRenavam($rs_veiculo['renavam'])
                    ->setIdTipoVeiculo($rs_veiculo['id_tipo_veiculo'])
                    ->setIdMarcaVeiculo($rs_veiculo['id_marca_veiculo'])
                    ->setIdModeloVeiculo($rs_veiculo['id_modelo_veiculo'])
                    ->setIdCliente($rs_veiculo['id_cliente']);
             
             $marca   = $this->marcasDAO->select($veiculo->getIdMarcaVeiculo());

             $modelo  = $this->modelosDAO->select($veiculo->getIdModeloVeiculo());

             $tipo    = $this->tiposDAO->select($veiculo->getIdTipoVeiculo());

             $cliente = $this->clientesDAO->selectById($veiculo->getIdCliente());

             $acessorios = $this->acessoriosDAO->selectByVeiculo($veiculo);
             

             /*  Colocando os objetos */

             $veiculo->setMarca($marca)
                     ->setModelo($modelo)
                     ->setTipo($tipo)
                     ->setCliente($cliente)
                     ->setAcessorios($acessorios);

            /* Pegando fotos */
            $sqlFoto = "SELECT * FROM tbl_foto_veiculo WHERE id_veiculo=".$rs_veiculo['id_veiculo'];

            $selectFoto = $PDO_conex->query($sqlFoto);
            
            $fotos = array();
            // Verifica se o select possui alguma coisa e evita o erro call to member
            if($selectFoto){

                while($rs_fotos = $selectFoto->fetch(PDO::FETCH_ASSOC)){
                    $fotos[]=  $rs_fotos['nome_foto'];
                }

            }

            $veiculo->setFotos($fotos);

            $listar_veiculo[] = $veiculo;

        }
        

        $this->conex->close_database();        

        return $listar_veiculo;
        
    }

}



?>