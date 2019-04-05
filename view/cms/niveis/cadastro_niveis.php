<?php
    $controller = null;
    $modo = null;
    $botao = 'Salvar';
    $id_nivel  = 0;
    $nome_nivel = null;
    $descricao = null;

    if(isset($Niveis)){
        $id_nivel = $Niveis->getId_niveis();
        $nome_nivel = $Niveis->getNome_nivel();
        $descricao = $Niveis->getDescricao();

        $controller = 'niveis';
        $modo = 'atualizar';
        $botao = 'Editar';
    }else{
        $controller = 'niveis';
        $modo = 'inserir';
    }
    
?>
<div class="segura_form">  
    <h3 class="titulo_pagina">Cadastrar nivel</h3>
    <form method="POST" id="form">
        <input value="<?php echo($nome_nivel)?>" name="txtNome_nivel" class="nome_nivel" placeholder="Nome Nível" required>
        <input value="<?php echo($descricao)?>" name="txtDescricao" class="nome_nivel" placeholder="Descrição" required>
        <label class="titulo_menu">Menus</label><br>
        <div class="check_box_menus">
            
            <input type="checkbox" id="teste"><label for="teste">TESTE</label><br>
            <input type="checkbox"><label>TESTE</label><br>
            <input type="checkbox"><label>TESTE</label><br>
            <input type="checkbox"><label>TESTE</label><br>
            <input type="checkbox"><label>TESTE</label><br>
            
        </div>
        <!-- onclick chamando a função route()
        serve para o JavaScript chamar o route.php passado o que precisa ser feito
        enviando o controller e o modo que vai ser acessado
        -->
        <input type="submit" name="btn_salvar" class="btn_padrao" value="<?php echo($botao) ?>" onclick='route("<?php echo($controller) ?>","<?php echo($modo) ?>",<?php echo($id_nivel)?>)'>
    </form>

    <div class="tbl_niveis">
        
    </div>
</div>