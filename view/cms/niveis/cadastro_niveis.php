<?php
    $controller = null;
    $modo = null;
    $botao = 'Salvar';
    $id_nivel  = 0;
    $nome_nivel = null;
    $descricao = null;
    $router = "router.php?controller=niveis&modo=inserir";
    $funcaoJS = "inserir_nivel();";
    
    if(isset($Niveis)){
        $id_nivel = $Niveis->getId_niveis();
        $nome_nivel = $Niveis->getNome_nivel();
        $descricao = $Niveis->getDescricao();

        $router = "router.php?controller=niveis&modo=atualizar&id=".$id_nivel;
        $funcaoJS = "atualizar_nivel()";
        $botao = 'Editar';
    
        
    }
    
?>
<div class="segura_form">  
    <h3 class="titulo_pagina">Cadastrar nivel</h3>
    <form class="form_cadastro" method="POST" id="formNiveis" onsubmit="<?=@$funcaoJS?>" action="<?=@$router?>">
        <div class="segura_form_cadastro">
            <label for="nome_nivel">Nome nível</label><br>
            <input id="nome_nivel" value="<?php echo($nome_nivel)?>" name="txtNome_nivel" placeholder="Nome Nível" required style="margin-bottom:10px;"><br>
            <label for="descricao">Descrição</label><br>
            <input id="descricao" value="<?php echo($descricao)?>" name="txtDescricao" placeholder="Descrição" required><br>
        </div>

        <!-- <label class="titulo_menu">Menus</label><br>
        <div class="check_box_menus">
            <input type="checkbox" id="teste"><label for="teste">TESTE</label><br>
            <input type="checkbox"><label>TESTE</label><br>
            <input type="checkbox"><label>TESTE</label><br>  
        </div> -->
        <!-- onclick chamando a função route()
        serve para o JavaScript chamar o route.php passado o que precisa ser feito
        enviando o controller e o modo que vai ser acessado
        -->
        <input type="submit" name="btn_salvar" class="btn_padrao" value="<?php echo($botao)?>">
    </form>

   
</div>
<link rel="stylesheet" type="text/css" href="view/cms/css/niveis.css">