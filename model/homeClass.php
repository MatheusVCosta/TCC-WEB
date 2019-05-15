<?php 
/* Será que fica bom em uma só class ? Eu me odeio!!!!! ass: GIl */
/* TÁ HORRÍVEL ISSO !! (:D) ass: Lucas*/
class Home{
    
    /* SESSÃO 1 Banner */
    private $banner;
    
    /* SESSÃO 2 */
    private $sessao_como_funciona;

    /* SESSÃO 3*/
    private $sessao_oque_pode_alugar;
    
    /* SESSÃO 4 */
    private $sessao_por_que_anunciar;
    
    /* SESSÃO 5 */
    private $sessao_quer_anunciar;

    public function __constructor(){

    }
    public function setBanner($banner){
        $this->banner = $banner;
        return $this;
    }
    public function getBanner(){
        return $this->banner;
    }

    public function setComofunciona($sessao_como_funciona){
        $this->sessao_como_funciona = $sessao_como_funciona;
        return $this;
    }
    public function getComofunciona(){
        return $this->sessao_como_funciona;
    }

    public function setOquePodeAlugar($sessao_oque_pode_alugar){
        $this->sessao_oque_pode_alugar = $sessao_oque_pode_alugar;
        return $this;
    }

    public function getOquePodeAlugar(){
        return $this->sessao_oque_pode_alugar;
        
    }
    
    //$sessao_por_que_anunciar
    public function setPorQueAnunciar($sessao_por_que_anunciar){
        $this->sessao_por_que_anunciar = $sessao_por_que_anunciar;
        return $this;
    }
    public function getPorQueAnunciar(){
        return $this->sessao_por_que_anunciar;
    }

    //$sessao_quer_anunciar
    public function setQuerAnunciar($sessao_quer_anunciar){
        $this->sessao_quer_anunciar = $sessao_quer_anunciar;
        return $this;
    }
    public function getQuerAnunciar(){
        return $this->sessao_quer_anunciar;
    }
}

class Banner{
    /* `tbl_home_sessao1` */

    private $id_pagina_home;
    private $foto_banner;
    private $texto_banner;
    private $texto2_banner;
    private $status_banner;

    public function __constructor(){

    }
    public function setId($id_pagina_home){
        $this->id_pagina_home = $id_pagina_home;
        return $this;
    }
    public function getId(){
        return $this->id_pagina_home;
    }
    public function setFoto($foto_banner){
        $this->foto_banner = $foto_banner;
        return $this;
    }
    public function getFoto(){
        return $this->foto_banner;
    }
    public function setTexto($texto_banner){
        $this->texto_banner = $texto_banner;
        return $this;
    }
    public function getTexto(){
        return $this->texto_banner;
    }
    public function setTexto2($texto2_banner){
        $this->texto2_banner = $texto2_banner;
        return $this;
    }
    public function getTexto2(){
        return $this->texto2_banner;
    }
    public function setStatus($status_banner){
        $this->status_banner = $status_banner;
        return $this;
    }
    public function getStatus(){
        return $this->status_banner;
    }


}
class SessaoComoFunciona{
    /* `tbl_home_sessao2` */
    private $id_pagina_home2;
    private $titulo_sessao2;
    private $texto_sessao2;
    private $foto_sessao2;
    private $status_sessao2;

    public function __constructor(){

    }
    public function setId($id_pagina_home2){
        $this->id_pagina_home2 = $id_pagina_home2;
        return $this;
    }
    public function getId(){
        return $this->id_pagina_home2;
    }
    public function setTitulo($titulo_sessao2){
        $this->titulo_sessao2 = $titulo_sessao2;
        return $this;
    }
    public function getTitulo(){
        return $this->titulo_sessao2;
    }
    public function setTexto($texto_sessao2){
        $this->texto_sessao2 = $texto_sessao2;
        return $this;
    }
    public function getTexto(){
        return $this->texto_sessao2;
    }
    public function setFoto($foto_sessao2){
        $this->foto_sessao2 = $foto_sessao2;
        return $this;
    }
    public function getFoto(){
        return $this->foto_sessao2;
    }
    public function setStatus($status_sessao2){
        $this->status_sessao2 = $status_sessao2;
        return $this;
    }
    public function getStatus(){
        return $this->status_sessao2;
    }
}

class SessaoOquePodeAlugar{
    /* `tbl_home_sessao3` */
    private $id_home_sessao3;
    private $status_sessao3;
    private $titulo_sessao3;

    public function __constructor(){}
    
    public function setId($id_home_sessao3){
        $this->id_home_sessao3 = $id_home_sessao3;
        return $this;
    }
    public function getId(){
        return $this->id_home_sessao3;
    }
    public function setStatus($status_sessao3){
        $this->status_sessao3 = $status_sessao3;
        return $this;
    }
    public function getStatus(){
        return $this->status_sessao3;
    }
    public function setTitulo($titulo_sessao3){
        $this->titulo_sessao3 = $titulo_sessao3;
        return $this;
    }
    public function getTitulo(){
        return $this->titulo_sessao3;
    }

    private $foto1_sessao3;
    private $titulo1_sessao3;
    private $texto1_sessao3;

    public function setFoto1($foto1_sessao3){
        $this->foto1_sessao3 = $foto1_sessao3;
        return $this;
    }
    public function getFoto1(){
        return $this->foto1_sessao3;
    }
    public function setTitulo1($titulo1_sessao3){
        $this->titulo1_sessao3 = $titulo1_sessao3;
        return $this;
    }
    public function getTitulo1(){
        return $this->titulo1_sessao3;
    }
    public function setTexto1($texto1_sessao3){
        $this->texto1_sessao3 = $texto1_sessao3;
        return $this;
    }
    public function getTexto1(){
        return $this->texto1_sessao3;
    }

    private $foto2_sessao3;
    private $titulo2_sessao3;
    private $texto2_sessao3;
    
    public function setFoto2($foto2_sessao3){
        $this->foto2_sessao3 = $foto2_sessao3;
        return $this;
    }
    public function getFoto2(){
        return $this->foto2_sessao3;
    }
    public function setTitulo2($titulo2_sessao3){
        $this->titulo2_sessao3 = $titulo2_sessao3;
        return $this;
    }
    public function getTitulo2(){
        return $this->titulo2_sessao3;
    }
    public function setTexto2($texto2_sessao3){
        $this->texto2_sessao3 = $texto2_sessao3;
        return $this;
    }
    public function getTexto2(){
        return $this->texto2_sessao3;
    }

    private $foto3_sessao3;
    private $titulo3_sessao3;
    private $texto3_sessao3;

    public function setFoto3($foto3_sessao3){
        $this->foto3_sessao3 = $foto3_sessao3;
        return $this;
    }
    public function getFoto3(){
        return $this->foto3_sessao3;
    }
    public function setTitulo3($titulo3_sessao3){
        $this->titulo3_sessao3 = $titulo3_sessao3;
        return $this;
    }
    public function getTitulo3(){
        return $this->titulo3_sessao3;
    }
    public function setTexto3($texto3_sessao3){
        $this->texto3_sessao3 = $texto3_sessao3;
        return $this;
    }
    public function getTexto3(){
        return $this->texto3_sessao3;
    }
}

class SessaoPorQueAnunciar{
    
    /* `tbl_home_sessao4` */

    private $id_home_sessao4;
    private $titulo_sessao4;
    private $foto_sessao4;
    private $texto_sessao4;
    private $status_sessao4;

    public function __constructor(){

    }

    public function setId($id_home_sessao4){
        $this->id_home_sessao4 = $id_home_sessao4;
        return $this;
    }
    public function getId(){
        return $this->id_home_sessao4;
    }
    public function setTitulo($titulo_sessao4){
        $this->titulo_sessao4 = $titulo_sessao4;
        return $this;
    }
    public function getTitulo(){
        return $this->titulo_sessao4;
    }
    public function setFoto($foto_sessao4){
        $this->foto_sessao4 = $foto_sessao4;
        return $this;
    }
    public function getFoto(){
        return $this->foto_sessao4;
    }
    public function setTexto($texto_sessao4){
        $this->texto_sessao4 = $texto_sessao4;
        return $this;
    }
    public function getTexto(){
        return $this->texto_sessao4;
    }
    public function setStatus($status){
        $this->status = $status;
        return $this;
    }
    public function getStatus(){
        return $this->status;
    }

}
class SessaoQuerAnunciar{

    /* `tbl_home_sessao5` */

    private $id_home_sessao5;
    private $status_sessao5;
    private $titulo_sessao5;
    private $subtitulo_sessao5;
    
    public function __constructor(){}

    public function setId($id_home_sessao5){
        $this->id_home_sessao5 = $id_home_sessao5;
        return $this;
    }
    public function getId(){
        return $this->id_home_sessao5;
    }
    public function setSubTitulo($subtitulo_sessao5){
        $this->subtitulo_sessao5 = $subtitulo_sessao5;
        return $this;
    }
    public function getSubTitulo(){
        return $this->subtitulo_sessao5;
    }
    public function setStatus($status_sessao5){
        $this->status_sessao5 = $status_sessao5;
        return $this;
    }
    public function getStatus(){
        return $this->status_sessao5;
    }
    public function setTitulo($titulo_sessao5){
        $this->titulo_sessao5 = $titulo_sessao5;
        return $this;
    }
    public function getTitulo(){
        return $this->titulo_sessao5;
    }

    private $subtitulo1_sessao5;
    private $foto1_sessao5;
    private $texto1_sessao5;

    public function setSubTitulo1($subtitulo1_sessao5){
        $this->subtitulo1_sessao5 = $subtitulo1_sessao5;
        return $this;
    }
    public function getSubTitulo1(){
        return $this->subtitulo1_sessao5;
    }
    public function setFoto1($foto1_sessao5){
        $this->foto1_sessao5 = $foto1_sessao5;
        return $this;
    }
    public function getFoto1(){
        return $this->foto1_sessao5;
    }
    public function setTexto1($texto1_sessao5){
        $this->texto1_sessao5 = $texto1_sessao5;
        return $this;
    }
    public function getTexto1(){
        return $this->texto1_sessao5;
    }

    private $subtitulo2_sessao5;
    private $foto2_sessao5;
    private $texto2_sessao5;

    public function setSubTitulo2($subtitulo2_sessao5){
        $this->subtitulo2_sessao5 = $subtitulo2_sessao5;
        return $this;
    }
    public function getSubTitulo2(){
        return $this->subtitulo2_sessao5;
    }
    public function setFoto2($foto2_sessao5){
        $this->foto2_sessao5 = $foto2_sessao5;
        return $this;
    }
    public function getFoto2(){
        return $this->foto2_sessao5;
    }
    public function setTexto2($texto2_sessao5){
        $this->texto2_sessao5 = $texto2_sessao5;
        return $this;
    }
    public function getTexto2(){
        return $this->texto2_sessao5;
    }

    private $subtitulo3_sessao5;
    private $foto3_sessao5;
    private $texto3_sessao5;

    public function setSubTitulo3($subtitulo3_sessao5){
        $this->subtitulo3_sessao5 = $subtitulo3_sessao5;
        return $this;
    }
    public function getSubTitulo3(){
        return $this->subtitulo3_sessao5;
    }
    public function setFoto3($foto3_sessao5){
        $this->foto3_sessao5 = $foto3_sessao5;
        return $this;
    }
    public function getFoto3(){
        return $this->foto3_sessao5;
    }
    public function setTexto3($texto3_sessao5){
        $this->texto3_sessao5 = $texto3_sessao5;
        return $this;
    }
    public function getTexto3(){
        return $this->texto3_sessao5;
    }
    
    private $subtitulo4_sessao5;
    private $foto4_sessao5;
    private $texto4_sessao5;

    public function setSubTitulo4($subtitulo4_sessao5){
        $this->subtitulo4_sessao5 = $subtitulo4_sessao5;
        return $this;
    }
    public function getSubTitulo4(){
        return $this->subtitulo4_sessao5;
    }
    public function setFoto4($foto4_sessao5){
        $this->foto4_sessao5 = $foto4_sessao5;
        return $this;
    }
    public function getFoto4(){
        return $this->foto4_sessao5;
    }
    public function setTexto4($texto4_sessao5){
        $this->texto4_sessao5 = $texto4_sessao5;
        return $this;
    }
    public function getTexto4(){
        return $this->texto4_sessao5;
    }
}

?>