<?php
    
    $router = "router.php?controller=email_marketing&modo=ENVIAR";
    $funcaoJS = "emails_enviar(this)";
?>
<div class="segura_form">
    <form class="form_cadastro" method="POST" action="<?=@$router?>" onsubmit="<?=@$funcaoJS?>">
        <div class="segura_form_cadastro">
            <label for="nome_nivel">Enviar Email</label><br>
            <input id="descricao" name="assunto" placeholder="Assunto" required><br>
            <textarea name="mensagem" placeholder="Digite sua mensagem" style="margin-top: 20px;"
             rows="8" cols="45" style="resize: none;" maxlength="500" required></textarea>
        </div>
        <input type="submit" class="btn_padrao" name="enviar" value="Enviar">
    </form>
</div>
<style>
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "OpenSans-Regular";
}
.titulo_pagina{
    width: 599px;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
    font-family: "OpenSans-Regular";
    background-color: #00984A;
    font-size: 30px;
    color: white;
}
.btn_padrao {
    width: 150px;
    height: 40px;
    cursor: pointer;
    outline: none;
    border-radius: 10px;
    border: none;
    margin-top: 180px;
    margin-left: 230px;
    font-family: verdana;
    font-size: 15px;
    color: white;
    background-color: #00984A;
}
segura_form{
    width:900px;
    height: 450px;
    margin-left: auto;
    margin-right: auto;
    margin-top: 10px;
    border:1px solid black;
    border-radius: 5px;
    /* display: none; */
}
form{
    width:600px;
    height: 400px;
    margin-left: auto;
    margin-right: auto;
    margin-top: 30px;
    border:1px solid black;
    border-radius: 10px;
    background-color: #fff;
    background-position: center;
    background-repeat: no-repeat;
}
::-webkit-input-placeholder {
    font-size: 15px;
}

.segura_form_cadastro{
    width:350px;
    height: 150px;
    margin-left: auto;
    margin-right: auto;
    margin-top: 7px;
}
 .segura_form_cadastro label{
    font-family: "OpenSans-Regular";
    font-size: 17px;
    line-height: 30px;
 }
.segura_form_cadastro input{
   width:350px;
   height: 35px;
   border:1px solid #7a7a7a;
   border-radius: 5px;
   padding-left: 7px;
   outline: none;
}
.segura_form_cadastro input:focus {
    color: #495057;
    background-color: #fff;
    border-color: #98c9fd;
    box-shadow: 0 0 0 0.1rem rgba(0, 123, 255, 0.25);
}
</style>