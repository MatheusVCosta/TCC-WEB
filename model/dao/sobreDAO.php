<?php

class SobreDAO{
    private $conex;
        
    //metodo construtor
    public function __construct(){
        require_once('model/dao/conexaoMysql.php');
        $this->conex = new conexaoMysql();
    }
    //recebendo objeto da sobreClass
    //criando inserte 
    public function insert ($sobre){
        $sql = "insert into tbl_pagina_sobre(id_sobre,titulo_sobre,texto_sobre,foto_sobre,titulo_missao_sobre,texto_missao_sobre,foto_missao_sobre,titulo_visao_sobre,texto_visao_sobre,foto_visao_sobre,titulo_valores_sobre,texto_valores_sobre,foto_valores_sobre)".
       "VALUES('" . $sobre->getTitulo_sobre() . "',
            ". $sobre->getTexto_sobre() .",
            ". $sobre->getFoto_sobre() .",
            ". $sobre->getTitulo_missao_sobre() .",
            ". $sobre->getTexto_missao_sobre() .",
            ". $sobre->getFoto_missao_sobre() .",
            ". $sobre->getTitulo_visao_sobre() .",
            ". $sobre->getTexto_visao_sobre() .",
            ". $sobre->getFoto_visao_sobre() .",
            ". $sobre->getTitulo_valores_sobre() .",
            ". $sobre->getTexto_valores_sobre() .",
            ". $sobre->getFoto_valores_sobre() ." 
        )";

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
        $sql = "DELETE FROM tbl_pagina_sobre where id_sobre = $id";
        
        $PDO_conex = $this->conex->connect_database();
        
        if($PDO_conex->query($sql)){
            echo"Registro deletado!";
        }else{
            echo "Registro não encontrado!$sql";
            return 0;
        }
    }
    public function update($sobre){
         $sql = "UPDATE tbl_pagina_sobre SET 
         titulo_sobre='" . $sobre->getTitulo_sobre() . "', 
         texto_sobre='" . $sobre->getTexto_sobre() . "' ,
         foto_sobre='" . $sobre->getFoto_sobre() . "' ,
         
         titulo_missao_sobre='" . $sobre->getTitulo_missao_sobre() . "' ,
         texto_missao_sobre='" . $sobre->getTexto_missao_sobre() . "' ,
         foto_missao_sobre='" . $sobre->getFoto_missao_sobre() . "' ,
         titulo_visao_sobre='" . $sobre->getTitulo_visao_sobre() . "' ,
         texto_visao_sobre='" . $sobre->getTexto_visao_sobre() . "' ,
         foto_visao_sobre='" . $sobre->getFoto_visao_sobre() . "' ,
         titulo_valores_sobre='" . $sobre->getTitulo_valores_sobre() . "' ,
         texto_valores_sobre='" . $sobre-> getTexto_valores_sobre() . "' ,
         foto_valores_sobre='" . $sobre->getFoto_valores_sobre() . "'".
        " WHERE id_sobre =".$sobre->getId_sobre();
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
        $sql = "SELECT * FROM tbl_pagina_sobre";
        
        $PDO_conex = $this->conex->connect_database();
        
        $select = $PDO_conex->query($sql);
        
        //$listar_registros = array();
        
        while($rs_sobre = $select->fetch(PDO::FETCH_ASSOC)){
            
            $sobre = new Sobre();
            $sobre->setId_sobre($rs_sobre['id_sobre']) 
                ->setId_sobre($rs_sobre['id_sobre'])
                ->setTitulo_sobre($rs_sobre['titulo_sobre'])
                ->setTexto_sobre($rs_sobre['texto_sobre'])
                ->setFoto_sobre($rs_sobre['foto_sobre'])
                ->setTitulo_missao_sobre($rs_sobre['titulo_missao_sobre'])
                ->setTexto_missao_sobre($rs_sobre['texto_missao_sobre'])
                ->setFoto_missao_sobre($rs_sobre['foto_missao_sobre'])
                ->setTitulo_visao_sobre($rs_sobre['titulo_visao_sobre'])
                ->setTexto_visao_sobre($rs_sobre['texto_visao_sobre'])
                ->setFoto_visao_sobre($rs_sobre['foto_visao_sobre'])
                ->setTitulo_valores_sobre($rs_sobre['titulo_valores_sobre'])
                ->setTexto_valores_sobre($rs_sobre['texto_valores_sobre'])
                ->setFoto_valores_sobre($rs_sobre['foto_valores_sobre']);
            
            return $sobre;
        }
        
        return false;
        
    }
    public function selectById($id_sobre){
        $sql = "SELECT * FROM tbl_pagina_sobre where id_sobre= $id_sobre";
        
        $PDO_conex = $this->conex->connect_database();
        
        $select = $PDO_conex->query($sql);
        
        if($rs_sobre = $select->fetch(PDO::FETCH_ASSOC))
        {
            $sobre = new Sobre();
            $sobre->setId_sobre($rs_sobre['id_sobre'])
                ->setTitulo_sobre($rs_sobre['titulo_sobre'])
                ->setTexto_sobre($rs_sobre['texto_sobre'])
                ->setFoto_sobre($rs_sobre['foto_sobre'])
                ->setTitulo_missao_sobre($rs_sobre['titulo_missao_sobre'])
                ->setTexto_missao_sobre($rs_sobre['texto_missao_sobre'])
                ->setFoto_missao_sobre($rs_sobre['foto_missao_sobre'])
                ->setTitulo_visao_sobre($rs_sobre['titulo_visao_sobre'])
                ->setTexto_visao_sobre($rs_sobre['texto_visao_sobre'])
                ->setFoto_visao_sobre($rs_sobre['foto_visao_sobre'])
                ->setTitulo_valores_sobre($rs_sobre['titulo_valores_sobre'])
                ->setTexto_valores_sobre($rs_sobre['texto_valores_sobre'])
                ->setFoto_valores_sobre($rs_sobre['foto_valores_sobre']);
            
            return $sobre;
            
        }else{
                    echo "Registro não encontrado!!";
                    return 0;
            }
    }
}








?>