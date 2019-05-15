<?php 
        require_once('controller/controllerSobre.php');

            $controller_sobre = new ControllerSobre();

            $registro =  $controller_sobre->listar_sobre();

?>
<link rel="stylesheet" type="text/css" href="view/cms/css/sobre_empresa.css">
<div>
    <form action="router.php?controller=sobre&modo=atualizar&historia" onsubmit="editar_sobre_submit(this)" class="form_cadastro" method="POST" id="formSobre">
         <h3 class="titulo_pagina">Cadastrar história</h3>
        <div class="segura_form_cadastro">
            <label for="titulo">Titulo</label><br>
            <input id="titulo_sobre" value="<?=@$registro->getTitulo_sobre()?>" name="titulo" placeholder="titulo" required style="margin-bottom:10px;"><br>
            <label for="texto_sobre">Texto</label><br>
            <input id="texto_sobre" value="<?=@$registro->getTexto_sobre()?>" name="texto" placeholder="Texto" required><br>
            
            <label for="imagem_sobre">Imagem</label><br>
<!--            <input id="imagem_sobre" value="" name="txt_imagem_sobre" placeholder="imagem" required><br>-->
            <input  type="file" name="foto">
            
            <input type="submit" name="btn_salvar" class="btn_padrao" value="Salvar">
        </div>

    </form>


</div>