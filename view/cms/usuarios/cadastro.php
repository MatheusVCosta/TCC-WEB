<?php
    $controller = 'usuarios';
    $modo = 'inserir';
    $botao = "Inserir";
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
        $senha = '5465464487754';
        $slcNivel = $usuario->getNivel();
        $id_usuario_cms = '&id='.$usuario->getId();
        $modo = 'ATUALIZAR';
        $submit = 'usuario_update()';//js
        $botao = "Atualizar";
    }
?>
<div class="segura_form">
    
    <form method="POST" id="formUsuario" onsubmit="<?=@$submit?>" data-id="<?=@$id_usuario_cms?>"
     action="router.php?controller=<?=@$controller?>&modo=<?=@$modo?><?=@$id_usuario_cms?>">
     <h3 class="titulo_pagina">Cadastrar Usuarios</h3>
        <div class="segura_form_cadastro">
            <label for="lblNome">Nome</label>
            <input id="lblNome" maxlength="20" name="txtNome" placeholder="Nome "  value="<?=@$nome?>" required>
            <label for="lblEmail">Email</label>
            <input type="email" maxlength="150" id="lblEmail" name="txtEmail" placeholder="email" value="<?=@$email?>" pattern="^([a-z._\-0-9áéíóúàèìòùâêîôûãẽĩõũç]*@+([a-z0-9]+.+[a-z0-9])*)+$" required>
            <label for="lblSenha">Senha</label>
            <input id="lblSenha" maxlength="45" name="txtSenha" type="password" value="<?=@$senha?>" placeholder="Senha" required>
            <label>Nível</label>
            <select name="slcNivel" id="slcNivel" required>
            <?php
                require_once("controller/controllerNiveis.php");
                
                $controllerNiveis = new ControllerNiveis();
                $lista_niveis = $controllerNiveis->listar_niveis();

            ?>
                
                <?php foreach($lista_niveis as $nivel){ ?>

                    <?php if( $nivel->getId_niveis() == $slcNivel ){?>

                            <option value="<?php echo $nivel->getId_niveis(); ?>" selected>
                                <?php echo $nivel->getNome_nivel(); ?>
                                <?=@(($nivel->getExcluido() == 1)?'#excluido':'')?>
                            </option>

                    <?php }elseif($nivel->getExcluido() == 0){ ?>

                            <option value="<?php echo $nivel->getId_niveis(); ?>">
                                <?php echo $nivel->getNome_nivel(); ?>
                            </option>

                    <?php } ?>

            <?php }?>
            </select>
        </div>
       

        <input type="submit" name="btn_salvar" class="btn_padrao" value="<?php echo $botao?>">
    </form>
</div>
<link rel="stylesheet" type="text/css" href="view/cms/css/usuario.css">