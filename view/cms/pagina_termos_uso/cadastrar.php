<?php

    /*$botao = "salvar";
    $id = 0;
    $titulo = "";
    $texto = "";
    $router = "router.php?controller=termos_uso&modo=inserir";
    $funcaoJS = "termos_uso_insert(formTermos_uso)";

    // só vai entrar nessa condição se o objeto nível existir. Se houver a condição, no momento de editar, executará esse código
    if(isset($termos_uso)){
        
        $id = $termos_uso->getId();
        $titulo = $termos_uso->getTitulo();
        $texto = $termos_uso->getTexto();
        $router = "router.php?controller=termos_uso&modo=atualizar&id=".$id;
        $funcaoJS = "termos_uso_update(formTermos_uso)";
        $botao = 'Editar';
    }*/
    require_once('controller/controllerTermos_uso.php');

    $controller_termos_uso = new ControllerTermos_uso();

    $termos_uso = $controller_termos_uso->getPagina();

    $router = "router.php?controller=termos_uso&modo=atualizar";
    
    $funcaoJS = "termos_uso_update(this)";

    $botao = 'Editar';

?>
<div class="segura_form">
    <form class="form_cadastro" method="POST" id="formTermos_uso" name="formTermos_uso" onsubmit="<?=@$funcaoJS?>" action="<?=@$router?>">
    <h3 class="titulo_pagina">Cadastrar Termos de Uso</h3>
        <div class="segura_form_cadastro">
            <label for="pergunta_faq">Adicionar Título para Página</label><br>

            <input id="pergunta_faq" value="<?php echo($termos_uso->getTitulo())?>" name="txtTitulo" placeholder="Insira um Título" required style="margin-bottom:10px;"><br>
            
            <label for="resposta_faq">Adicionar Termo de Uso</label><br>

            <textarea id="resposta_faq" value="<?php echo($termos_uso->getTexto())?>" name="txtTexto" placeholder="Insira uma resposta" rows="5" cols="45" required><?php echo($termos_uso->getTexto())?></textarea><br>
            <input maxlength="100" id="pergunta_faq" value="<?php echo($termos_uso->getTitulo())?>" name="txtTitulo" placeholder="Insira um Título" required style="margin-bottom:10px;"><br>
            
            <label for="resposta_faq">Adicionar Termo de Uso</label><br>

            <textarea maxlength="65000" id="resposta_faq" name="txtTexto" placeholder="Insira uma resposta" rows="5" cols="45" required><?php echo($termos_uso->getTexto())?></textarea><br>
        </div>
        <input type="submit" name="btn_salvar" class="btn_padrao" value="<?php echo($botao)?>">
    </form>
</div>
<link rel="stylesheet" type="text/css" href="view/cms/css/pagina_termos_uso.css">