<?php
// controller e modo sempre iniciam em null
    $titulo = "Cadastrar Nivel";
    $botao = 'Salvar';
    $id_nivel  = 0;
    $nome_nivel = null;
    $descricao = null;
    $router = "router.php?controller=niveis&modo=inserir";
    $funcaoJS = "inserir_nivel();";
    $lista_menu = array();

    // só vai entrar nessa condição se o objeto nível existir. Se houver a condição, no momento de editar, executará esse código
    if(isset($Niveis)){
        $id_nivel = $Niveis->getId_niveis();
        $nome_nivel = $Niveis->getNome_nivel();
        $descricao = $Niveis->getDescricao();
        
        $lista_menu = $Niveis->getListaMenu();

        $router = "router.php?controller=niveis&modo=atualizar&id=".$id_nivel;
        $funcaoJS = "atualizar_nivel()";
        $botao = 'Editar';
        $titulo = "Editar Nivel";
    }else{// Vontade de refazer 
        
        require_once('controller/controllerNiveis.php');

        $controller_niveis = new ControllerNiveis();

        $lista_menu = $controller_niveis->listar_menu();

    }
    
?>

<div class="segura_form">  
    
    <form class="form_cadastro" method="POST" id="formNiveis" onsubmit="<?=@$funcaoJS?>" action="<?=@$router?>">
    <h3 class="titulo_pagina"><?=@$titulo?></h3>
        <div class="segura_form_cadastro">
            <label for="nome_nivel">Nome nível</label><br>
            <input id="nome_nivel" value="<?php echo($nome_nivel)?>" name="txtNome_nivel" placeholder="Nome Nível" required style="margin-bottom:10px;"><br>
            <label for="descricao">Descrição</label><br>
            <input id="descricao" value="<?php echo($descricao)?>" name="txtDescricao" placeholder="Descrição" required><br>
            <label for="acessos"> Acessos </label>
            <select id="acessos" multiple required name="slcMenu">
                <?php foreach($lista_menu as $menu){?>
                    <option value="<?=@$menu->getId()?>" <?=@$menu->getSelecionado()?>>
                        <?=@$menu->getNome()?>
                    </option>
                <?php } ?>
            </select>
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
<script>
    $('#acessos').selectize();
</script>