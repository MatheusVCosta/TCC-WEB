<?php
    $controller = 'usuarios';
    $modo = 'inserir';
    /* dados do formulario */
    $nome = "";
    $email = "";
    $senha = "";
    $slcNivel = "";
    $submit = 'usuario_insert(this)';//js
    $id_usuario_cms = '';
    if(@$usuario){
        $nome = $usuario->getNome();
        $email = $usuario->getEmail();
        $senha = '2545';
        $slcNivel = $usuario->getNivel();
        $id_usuario_cms = '&id='.$usuario->getId();
        $modo = 'ATUALIZAR';
        $submit = 'usuario_update(this)';//js
    }
?>
<div class="segura_form">
    <h3 class="titulo_pagina">Cadastrar Usuarios</h3>
    <form method="POST" id="formUsuario" onsubmit="<?=@$submit?>" data-id="<?=@$id_usuario_cms?>"
     action="router.php?controller=<?=@$controller?>&modo=<?=@$modo?><?=@$id_usuario_cms?>">
        <div class="segura_form_cadastro">
            <label for="lblNome">Nome</label>
            <input id="lblNome" name="txtNome" placeholder="Nome "  value="<?=@$nome?>" required>
            <label for="lblEmail">Email</label>
            <input id="lblEmail" name="txtEmail" placeholder="email" value="<?=@$email?>" required>
            <label for="lblSenha">Senha</label>
            <input id="lblSenha" name="txtSenha" type="password" value="<?=@$senha?>" placeholder="Senha" required>
            <label>Nível</label>
            <select name="slcNivel" id="slcNivel" requied>
            <?php
                require_once("controller/controllerNiveis.php");
                
                $controllerNiveis = new ControllerNiveis();
                $lista_niveis = $controllerNiveis->listar_niveis();
                
                foreach($lista_niveis as $nivel){
                
            ?>

                <option value="<?php echo $nivel->getId_niveis(); ?>"
                    <?php echo ($nivel->getId_niveis() == $slcNivel)?'selected':''?>>

                    <?php echo $nivel->getNome_nivel(); ?>
                    
                </option>

            <?php }?>
            </select>
        </div>
       

        <input type="submit" name="btn_salvar" class="btn_padrao" value="Salvar">
    </form>
</div>
<link rel="stylesheet" type="text/css" href="view/cms/css/usuario.css">