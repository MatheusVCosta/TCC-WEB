<?php

    class AnuncioDAO{

        private $conex;
        private $veiculosDAO;

        public function __construct(){
            
            require_once('model/anuncioClass.php');
            require_once('model/dao/conexaoMysql.php');
            
            /* LIGAÇÃO veiculos <---> anuncios */
            require_once('model/dao/veiculoDAO.php');
            $this->veiculosDAO = new VeiculoDAO();

            $this->conex = new  conexaoMysql();
        }

        public function insert($acessorio){
            $sql = "INSERT INTO tbl_anuncio (descricao,id_cliente_locador, id_veiculo, horario_inicio, horario_termino, data_inicial, data_final)".
                   "VALUES ('Final de semana na zona oeste', 1 , '3', '01:00', '18:00', '2019-04-10', '2019-04-26')";
        }

        public function delete($id){
            
        }

        public function update($acessorio){
            
        }
        public function selectAll(){
            


        }

        public function selectAllProcessados(){

            $sql = "SELECT tbl_anuncio.*,tbl_aprovacao_anuncio.status_aprovacao FROM tbl_anuncio inner join tbl_aprovacao_anuncio on tbl_aprovacao_anuncio.id_anuncio = tbl_anuncio.id_anuncio";

            //Abrido conexao com o BD
            $PDO_conex = $this->conex->connect_database();


            $select = $PDO_conex->query($sql);

            $lista_anuncios = array();

            while($rs_anuncio = $select->fetch(PDO::FETCH_ASSOC)){

                    $anuncio = new Anuncio();
                    
                    $anuncio->setId($rs_anuncio['id_anuncio'])
                            ->setDescricao($rs_anuncio['descricao'])
                            ->setIdClienteLocador($rs_anuncio['id_cliente_locador'])
                            ->setIdVeiculo($rs_anuncio['id_veiculo'])
                            ->setHorarioInicio($rs_anuncio['horario_inicio'])
                            ->setHorarioTermino($rs_anuncio['horario_termino'])
                            ->setDataInicial($rs_anuncio['data_inicial'])
                            ->setDataFinal($rs_anuncio['data_final'])
                            ->setValor($rs_anuncio['valor_hora'])
                            ->setStatus($rs_anuncio['status_aprovacao']);

                    
                    
                    $veiculo = $this->veiculosDAO->selectById($rs_anuncio['id_veiculo']);

                    $anuncio->setVeiculo($veiculo)
                            ->setLocador($veiculo->getCliente());



                    $lista_anuncios[] = $anuncio;

            }


            $this->conex->close_database();        

            return $lista_anuncios;
        }
        /* Retorna uma lsita do sanuncios que ainda não foram aprovados ou reprovados */
        public function selectAllPendentes(){

            $sql = "SELECT * FROM tbl_anuncio WHERE id_anuncio not in (select id_anuncio from tbl_aprovacao_anuncio)";

            //Abrido conexao com o BD
            $PDO_conex = $this->conex->connect_database();


            $select = $PDO_conex->query($sql);

            $lista_anuncios = array();

            while($rs_anuncio = $select->fetch(PDO::FETCH_ASSOC)){

                    $anuncio = new Anuncio();
                    
                    $anuncio->setId($rs_anuncio['id_anuncio'])
                            ->setDescricao($rs_anuncio['descricao'])
                            ->setIdClienteLocador($rs_anuncio['id_cliente_locador'])
                            ->setIdVeiculo($rs_anuncio['id_veiculo'])
                            ->setHorarioInicio($rs_anuncio['horario_inicio'])
                            ->setHorarioTermino($rs_anuncio['horario_termino'])
                            ->setDataInicial($rs_anuncio['data_inicial'])
                            ->setDataFinal($rs_anuncio['data_final'])
                            ->setValor($rs_anuncio['valor_hora']);

                    
                    
                    $veiculo = $this->veiculosDAO->selectById($rs_anuncio['id_veiculo']);

                    $anuncio->setVeiculo($veiculo)
                            ->setLocador($veiculo->getCliente());



                    $lista_anuncios[] = $anuncio;

            }


            $this->conex->close_database();        

            return $lista_anuncios;


        }
        public function selectById($id){
            
            $sql = "SELECT * FROM tbl_anuncio WHERE id_anuncio=". $id;

            //Abrido conexao com o BD
            $PDO_conex = $this->conex->connect_database();


            $select = $PDO_conex->query($sql);

            $lista_anuncios = array();

            if($rs_anuncio = $select->fetch(PDO::FETCH_ASSOC)){

                    $anuncio = new Anuncio();
                    
                    $anuncio->setId($rs_anuncio['id_anuncio'])
                            ->setDescricao($rs_anuncio['descricao'])
                            ->setIdClienteLocador($rs_anuncio['id_cliente_locador'])
                            ->setIdVeiculo($rs_anuncio['id_veiculo'])
                            ->setHorarioInicio($rs_anuncio['horario_inicio'])
                            ->setHorarioTermino($rs_anuncio['horario_termino'])
                            ->setDataInicial($rs_anuncio['data_inicial'])
                            ->setDataFinal($rs_anuncio['data_final'])
                            ->setValor($rs_anuncio['valor_hora']);

                    
                    
                    $veiculo = $this->veiculosDAO->selectById($rs_anuncio['id_veiculo']);

                    $anuncio->setVeiculo($veiculo)
                            ->setLocador($veiculo->getCliente());



                   return $anuncio;

            } else {

                return false;
            
            }


            $this->conex->close_database();        
        }

        public function aprovar($id_veiculo, $mensagem, $id_usuario_cms){
        
            $sql = "INSERT INTO tbl_aprovacao_anuncio (status_aprovacao,mensagem,id_usuario_cms,id_anuncio)".
                   " VALUES(0,'". $mensagem ."',". $id_usuario_cms .",". $id_veiculo .")";
            
            echo "SQL : $sql ";

            //Abrido conexao com o BD
            $PDO_conex = $this->conex->connect_database();

            if($PDO_conex->query($sql)){
                echo " Insert com sucesso ";
            } else {
                echo " Erro no script de insert ";
            }
            $this->conex->close_database();
        }
        public function reprovar($id_veiculo, $mensagem, $id_usuario_cms){

            $sql = "INSERT INTO tbl_aprovacao_anuncio (status_aprovacao,mensagem,id_usuario_cms,id_anuncio)".
                   " VALUES(0,'". $mensagem ."',". $id_usuario_cms .",". $id_veiculo .")";

            //Abrido conexao com o BD
            $PDO_conex = $this->conex->connect_database();

            if($PDO_conex->query($sql)){
                echo " Insert com sucesso ";
            } else {
                echo " Erro no script de insert ";
            }

            $this->conex->close_database();
        }
    }

?>