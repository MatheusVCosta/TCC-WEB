<?php

class Como_ganhar_dinheiroDao{

    private $conex;

    public function __construct(){
     
        require_once('model/como_ganhar_dinheiroClass.php');
        require_once('model/dao/conexaoMysql.php');
        $this->conex = new  conexaoMysql();
    
    }

    public function insert($como_ganhar_dinheiro){
            
            $sql = "insert into tbl_como_ganhar_dinheiro(titulo_sessao1,lista1_sessao1,lista2_sessao1,img1_sessao1,titulo_sessao2,img1_sessao2,lista1_sessao2,img2_sessao2,lista2_sessao2,titulo_sessao3,texto_sessao3)".
               "VALUES('". $como_ganhar_dinheiro->getTitulo_sessao1() ."',
                    '". $como_ganhar_dinheiro->getLista1_sessao1() ."',
                    '". $como_ganhar_dinheiro->getLista2_sessao1() ."',
                    '". $como_ganhar_dinheiro->getImg1_sessao1() ."',
                    '". $como_ganhar_dinheiro->getTitulo_sessao2() ."',
                    '". $como_ganhar_dinheiro->getImg1_sessao2() ."',
                    '". $como_ganhar_dinheiro->getLista1_sessao2() ."',
                    '". $como_ganhar_dinheiro->getImg2_sessao2() ."',
                    '". $como_ganhar_dinheiro->getLista2_sessao2() ."',
                    '". $como_ganhar_dinheiro->getTitulo_sessao3() ."',
                    '". $como_ganhar_dinheiro->getTexto_sessao3() ."'
                    )";
            echo $sql;
            //Abrido conexao com o BD
            $PDO_conex = $this->conex->connect_database();

            if($PDO_conex->query($sql)){
                echo "Insert com sucesso";
            }else{
                echo "Erro no script de insert";
            }
            $this->conex->close_database();

        }
        public function delete($id){
                
            $sql = " DELETE FROM tbl_como_ganhar_dinheiro where id = $id ";

            $PDO_conex = $this->conex->connect_database();


            if($PDO_conex->query($sql)){
                   echo "Registro deletado !";
            } else {
                    echo "Registro não encontrado!! $sql";
                    return 0;
            }

        }
        public function update($como_ganhar_dinheiro){
        
                $sql = "UPDATE tbl_como_ganhar_dinheiro SET titulo_sessao1='" . $como_ganhar_dinheiro->getTitulo_sessao1() . "', 
                lista1_sessao1='" . $como_ganhar_dinheiro->getLista1_sessao1() . "' ,
                lista2_sessao1='" . $como_ganhar_dinheiro->getLista2_sessao1() . "' ,
                img1_sessao1='" . $como_ganhar_dinheiro->getImg1_sessao1() . "' ,
                titulo_sessao2='" . $como_ganhar_dinheiro->getTitulo_sessao2() . "' ,
                img1_sessao2='" . $como_ganhar_dinheiro->getImg1_sessao2() . "' ,
                lista1_sessao2='" . $como_ganhar_dinheiro->getLista1_sessao2() . "' ,
                img2_sessao2='" . $como_ganhar_dinheiro->getImg2_sessao2() . "' ,
                lista2_sessao2='" . $como_ganhar_dinheiro->getLista2_sessao2() . "' ,
                titulo_sessao3='" . $como_ganhar_dinheiro->getTitulo_sessao3() . "' ,
                texto_sessao3='" . $como_ganhar_dinheiro->getTexto_sessao3() . "'".
                " WHERE id =".$como_ganhar_dinheiro->getId();

                echo $sql;
                //Abrido conexao com o BD
                $PDO_conex = $this->conex->connect_database();

                if($PDO_conex->query($sql)){
                    echo "update com sucesso";
                } else {
                    echo "Erro no script de update";
                }

                $this->conex->close_database();
        
        
    }
    public function selectAll(){

        $sql = " SELECT * FROM tbl_como_ganhar_dinheiro";

        $PDO_conex = $this->conex->connect_database();

        $select = $PDO_conex->query($sql);

        $listar_registros = array();

        while($rs_como_ganhar_dinheiro = $select->fetch(PDO::FETCH_ASSOC)){

            $como_ganhar_dinheiro = new Como_ganhar_dinheiro();
            $como_ganhar_dinheiro->setId($rs_como_ganhar_dinheiro['id'])
                                ->setTitulo_sessao1($rs_como_ganhar_dinheiro['titulo_sessao1'])
                                ->setLista1_sessao1($rs_como_ganhar_dinheiro['lista1_sessao1'])
                                ->setLista2_sessao1($rs_como_ganhar_dinheiro['lista2_sessao1'])
                                ->setImg1_sessao1($rs_como_ganhar_dinheiro['img1_sessao1'])
                                ->setTitulo_sessao2($rs_como_ganhar_dinheiro['titulo_sessao2'])
                                ->setImg1_sessao2($rs_como_ganhar_dinheiro['img1_sessao2'])
                                ->setLista1_sessao2($rs_como_ganhar_dinheiro['lista1_sessao2'])
                                ->setImg2_sessao2($rs_como_ganhar_dinheiro['img2_sessao2'])
                                ->setLista2_sessao2($rs_como_ganhar_dinheiro['lista2_sessao2'])
                                ->setTitulo_sessao3($rs_como_ganhar_dinheiro['titulo_sessao3'])
                                ->setTexto_sessao3($rs_como_ganhar_dinheiro['texto_sessao3']);

            $listar_registros[] = $como_ganhar_dinheiro;

        }

        $this->conex->close_database();

        return $listar_registros;



    }
    public function selectById($id = 0 ){

        $sql = " SELECT * FROM tbl_como_ganhar_dinheiro order by id desc limit 1 ";
    }
    public function selectPage(){

        $sql = " SELECT * FROM tbl_como_ganhar_dinheiro order by id desc limit 1";

        $PDO_conex = $this->conex->connect_database();

        $select = $PDO_conex->query($sql);

        if($rs_como_ganhar_dinheiro = $select->fetch(PDO::FETCH_ASSOC)){

            $como_ganhar_dinheiro = new Como_ganhar_dinheiro();
            $como_ganhar_dinheiro->setId($rs_como_ganhar_dinheiro['id'])
                ->setTitulo_sessao1($rs_como_ganhar_dinheiro['titulo_sessao1'])
                ->setLista1_sessao1($rs_como_ganhar_dinheiro['lista1_sessao1'])
                ->setLista2_sessao1($rs_como_ganhar_dinheiro['lista2_sessao1'])
                ->setImg1_sessao1($rs_como_ganhar_dinheiro['img1_sessao1'])
                ->setTitulo_sessao2($rs_como_ganhar_dinheiro['titulo_sessao2'])
                ->setImg1_sessao2($rs_como_ganhar_dinheiro['img1_sessao2'])
                ->setLista1_sessao2($rs_como_ganhar_dinheiro['lista1_sessao2'])
                ->setImg2_sessao2($rs_como_ganhar_dinheiro['img2_sessao2'])
                ->setLista2_sessao2($rs_como_ganhar_dinheiro['lista2_sessao2'])
                ->setTitulo_sessao3($rs_como_ganhar_dinheiro['titulo_sessao3'])
                ->setTexto_sessao3($rs_como_ganhar_dinheiro['texto_sessao3']);

            return $como_ganhar_dinheiro;

        } else {
                echo "Registro não encontrado!!";
                return 0;
        }


    }

}
?>