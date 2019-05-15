<?php

class HomeDAO{

    private $conex;

    public function __construct(){
     
        require_once('model/homeClass.php');
        require_once('model/dao/conexaoMysql.php');
        $this->conex = new  conexaoMysql();
    
    }

    public function selectPage(){

        

        $home = new Home();
        
        $banner                   = $this->selectBanner();
        $sessao_como_funciona     = $this->selectSessaoComoFunciona();
        $sessao_oque_pode_alugar  = $this->selectSessaoOquePodeAlugar();
        $sessao_por_que_anunciar  = $this->selectSessaoPorQueAnunciar();
        $sessao_quer_anunciar     = $this->selectSessaoQuerAnunciar();

        $home->setBanner($banner)
             ->setComofunciona($sessao_como_funciona)
             ->setOquePodeAlugar($sessao_oque_pode_alugar)
             ->setPorQueAnunciar($sessao_por_que_anunciar)
             ->setQuerAnunciar($sessao_quer_anunciar);

        return $home;

    }
    /* Monta e insere os objetos de cada sessão */

    /* DAO */
    public function selectBanner(){
         // Pegando o ultimo banner
         $sql = "SELECT * FROM tbl_home_sessao1 order  by id_pagina_home desc limit 1";

         //Abrido conexao com o BD
        $PDO_conex = $this->conex->connect_database();
        
        $select = $PDO_conex->query($sql);

        if($rs_banner = $select->fetch(PDO::FETCH_ASSOC)){
            
            $banner = new Banner();

            $banner->setId($rs_banner['id_pagina_home'])
                   ->setTexto($rs_banner['texto_banner'])
                   ->setTexto2($rs_banner['texto2_banner'])
                   ->setFoto($rs_banner['foto_banner'])
                   ->setStatus($rs_banner['status_banner']);
            
            return $banner;

        } else {

            echo "Erro no marca não encontrada";

            return false;

        }

        $this->conex->close_database();
    
    }
    public function insertBanner($banner,$status = 1){

        echo $status;
         // Pegando o ultimo banner
         $sql = "INSERT INTO `tbl_home_sessao1`(`status_banner`,`texto_banner`,`foto_banner`,`texto2_banner`)".
                "VALUES($status,'". $banner->getTexto() ."','". $banner->getFoto() ."','". $banner->getTexto2() ."')";
        
        $PDO_conex = $this->conex->connect_database();

        if($PDO_conex->query($sql)){
            echo "insert com sucesso";
        } else {
            echo "Erro no script de insert";
        }
        $this->conex->close_database();
    }

    /* DAO */
    public function selectSessaoComoFunciona(){
        // Pegando o ultimo 
        $sql = "SELECT * FROM tbl_home_sessao2 order  by id_pagina_home2 desc limit 1";
        $PDO_conex = $this->conex->connect_database();
        
        $select = $PDO_conex->query($sql);

        
        if($rs_sessao = $select->fetch(PDO::FETCH_ASSOC)){
        
            $sessao = new SessaoComoFunciona();

            $sessao->setId($rs_sessao['id_pagina_home2'])
                   ->setTitulo($rs_sessao['titulo_sessao2'])
                   ->setTexto($rs_sessao['texto_sessao2'])
                   ->setFoto($rs_sessao['foto_sessao2'])
                   ->setStatus($rs_sessao['status_sessao2']);
            
            return $sessao;

        } else {

            echo "Erro no marca não encontrada";

            return false;

        }

        $this->conex->close_database();
    }
    public function insertSessaoComoFunciona($sessao,$status = 1){
        // Pegando o ultimo 
        $sql = "INSERT INTO `tbl_home_sessao2`(`status_sessao2`,`titulo_sessao2`,`texto_sessao2`,`foto_sessao2`)".
               "VALUES($status,'". $sessao->getTitulo() ."','". $sessao->getTexto() ."','". $sessao->getFoto() ."')";

        $PDO_conex = $this->conex->connect_database();

        if($PDO_conex->query($sql)){
            echo "insert com sucesso";
        } else {
            echo "Erro no script de insert";
        }
        $this->conex->close_database();
    }

    /* DAO */
    public function selectSessaoOquePodeAlugar(){
        // Pegando o ultimo 
        $sql = "SELECT * FROM tbl_home_sessao3 order  by id_home_sessao3 desc limit 1";
        $PDO_conex = $this->conex->connect_database();
        
        $select = $PDO_conex->query($sql);

        if($rs_sessao = $select->fetch(PDO::FETCH_ASSOC)){
            
            $sessao = new SessaoOquePodeAlugar();

            $sessao->setId($rs_sessao['id_home_sessao3'])
                   ->setTitulo($rs_sessao['titulo_sessao3'])
                   ->setStatus($rs_sessao['status_sessao3'])
                   ->setFoto1($rs_sessao['foto1_sessao3'])
                   ->setTitulo1($rs_sessao['titulo1_sessao3'])
                   ->setTexto1($rs_sessao['texto1_sessao3'])
                   ->setFoto2($rs_sessao['foto2_sessao3'])
                   ->setTitulo2($rs_sessao['titulo2_sessao3'])
                   ->setTexto2($rs_sessao['texto2_sessao3'])
                   ->setFoto3($rs_sessao['foto3_sessao3'])
                   ->setTitulo3($rs_sessao['titulo3_sessao3'])
                   ->setTexto3($rs_sessao['texto3_sessao3']);
            
            return $sessao;

        } else {

            echo "Erro no marca não encontrada";

            return false;

        }

        $this->conex->close_database();
    }
    public function insertSessaoOquePodeAlugar($sessao,$status = 1){
        // Pegando o ultimo 
        $sql = "INSERT INTO `tbl_home_sessao3`(`status_sessao3`,`titulo_sessao3`,`foto1_sessao3`,`foto2_sessao3`,`foto3_sessao3`,`titulo1_sessao3`,`titulo2_sessao3`,`titulo3_sessao3`,`texto1_sessao3`,`texto2_sessao3`,`texto3_sessao3`)".
               "VALUES($status,'". $sessao->getTitulo() ."','". $sessao->getFoto1() ."','". $sessao->getFoto2() ."','". $sessao->getFoto3() ."',".
               "'". $sessao->getTitulo1() ."','". $sessao->getTitulo2() ."','". $sessao->getTitulo3() ."',".
               "'". $sessao->getTexto1() ."','". $sessao->getTexto2() ."','". $sessao->getTexto3() ."')";

        $PDO_conex = $this->conex->connect_database();

        if($PDO_conex->query($sql)){
            echo "insert com sucesso";
        } else {
            echo "Erro no script de insert";
        }
        $this->conex->close_database();
        
    }
    
    /* DAO */
    public function selectSessaoPorQueAnunciar(){
        // Pegando o ultimo 
        $sql = "SELECT * FROM tbl_home_sessao4 order  by id_home_sessao4 desc limit 1";
        $PDO_conex = $this->conex->connect_database();
        
        $select = $PDO_conex->query($sql);

        if($rs_sessao = $select->fetch(PDO::FETCH_ASSOC)){
            
            $sessao = new SessaoPorQueAnunciar();

            $sessao->setId($rs_sessao['id_home_sessao4'])
                   ->setFoto($rs_sessao['foto_sessao4'])
                   ->setTitulo($rs_sessao['titulo_sessao4'])
                   ->setTexto($rs_sessao['texto_sessao4'])
                   ->setStatus($rs_sessao['status_sessao4']);
            
            return $sessao;

        } else {

            echo "Erro no marca não encontrada";

            return false;

        }

        $this->conex->close_database();
    }
    public function insertSessaoPorQueAnunciar($sessao,$status = 1){
        // Pegando o ultimo 
        $sql = "INSERT INTO `tbl_home_sessao4`(`status_sessao4`,`titulo_sessao4`,`foto_sessao4`,`texto_sessao4`)".
               "VALUES($status,'". $sessao->getTitulo() ."','". $sessao->getFoto() ."','". $sessao->getTexto() ."')";

        $PDO_conex = $this->conex->connect_database();

        if($PDO_conex->query($sql)){
            echo "insert com sucesso";
        } else {
            echo "Erro no script de insert";
        }
        $this->conex->close_database();
    }

    /* DAO */
    public function selectSessaoQuerAnunciar(){
        // Pegando o ultimo 
        $sql = "SELECT * FROM tbl_home_sessao5 order  by id_home_sessao5 desc limit 1";
        $PDO_conex = $this->conex->connect_database();
        
        $select = $PDO_conex->query($sql);

        if($rs_sessao = $select->fetch(PDO::FETCH_ASSOC)){
            
            $sessao = new SessaoQuerAnunciar();

            $sessao->setId($rs_sessao['id_home_sessao5'])
                   ->setTitulo($rs_sessao['titulo_sessao5'])
                   ->setSubTitulo($rs_sessao['subtitulo_sessao5'])
                   ->setStatus($rs_sessao['status_sessao5'])
                   ->setSubTitulo1($rs_sessao['subtitulo1_sessao5'])
                   ->setFoto1($rs_sessao['foto1_sessao5'])
                   ->setTexto1($rs_sessao['texto1_sessao5'])
                   ->setSubTitulo2($rs_sessao['subtitulo2_sessao5'])
                   ->setFoto2($rs_sessao['foto2_sessao5'])
                   ->setTexto2($rs_sessao['texto2_sessao5'])
                   ->setSubTitulo3($rs_sessao['subtitulo3_sessao5'])
                   ->setFoto3($rs_sessao['foto3_sessao5'])
                   ->setTexto3($rs_sessao['texto3_sessao5'])
                   ->setSubTitulo4($rs_sessao['subtitulo4_sessao5'])
                   ->setFoto4($rs_sessao['foto4_sessao5'])
                   ->setTexto4($rs_sessao['texto4_sessao5']);
            
            return $sessao;

        } else {

            echo "Erro no marca não encontrada";

            return false;

        }

        $this->conex->close_database();
    }
    public function insertSessaoQuerAnunciar($sessao,$status = 1){
        // Pegando o ultimo 
        $sql = "INSERT INTO `tbl_home_sessao5`(`status_sessao5`,`titulo_sessao5`,`subtitulo_sessao5`,`subtitulo1_sessao5`,`subtitulo2_sessao5`,`subtitulo3_sessao5`,`subtitulo4_sessao5`,`foto1_sessao5`,`foto2_sessao5`,`foto3_sessao5`,`foto4_sessao5`,`texto1_sessao5`,`texto2_sessao5`,`texto3_sessao5`,`texto4_sessao5`)VALUES".
               "($status,'". $sessao->getTitulo() ."','". $sessao->getSubTitulo() ."',".
               "'". $sessao->getSubTitulo1() ."','". $sessao->getSubTitulo2() ."',".
               "'". $sessao->getSubTitulo3() ."','". $sessao->getSubTitulo4() ."',".
               "'". $sessao->getFoto1() ."','". $sessao->getFoto2() ."',".
               "'". $sessao->getFoto3() ."','". $sessao->getFoto4() ."',".
               "'". $sessao->getTexto1() ."','". $sessao->getTexto2() ."',".
               "'". $sessao->getTexto3() ."','". $sessao->getTexto4() ."')";

        $PDO_conex = $this->conex->connect_database();

        if($PDO_conex->query($sql)){
            echo "insert com sucesso";
        } else {
            echo "Erro no script de insert";
        }
        $this->conex->close_database();
    }


}





?>