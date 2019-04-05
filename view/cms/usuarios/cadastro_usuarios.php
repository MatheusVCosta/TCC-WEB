<?php

    $controller = 'usuarios';
    $modo = 'inserir';

    /* dados do formulario */
    $nome = "";
    $email = "";
    $senha = "";
    $slcNivel = "";
    $submit = 'return usuario.dao.insert(this)';//js
    $id_usuario_cms = '';
    if(@$usuario){
        $nome = $usuario->getNome();
        $email = $usuario->getEmail();
        $senha = $usuario->getSenha();
        $slcNivel = $usuario->getNivel();
        $id_usuario_cms = '&id='.$usuario->getId();
        $modo = 'ATUALIZAR';
        $submit = 'return usuario.dao.update(this)';//js
    }
?>
<div class="segura_form">  
    <h3 class="titulo_pagina">Cadastrar Usuarios</h3>
    <form method="POST" id="formUsuario" onsubmit="<?=@$submit?>" data-id="<?=@$id_usuario_cms?>"
     action="router.php?controller=<?=@$controller?>&modo=<?=@$modo?><?=@$id_usuario_cms?>">
        <input  name="txtNome" class="nome_nivel" placeholder="Nome "  value="<?=@$nome?>" required>
        <input  name="txtEmail" class="nome_nivel" placeholder="email" value="<?=@$email?>" required>
        <input  name="txtSenha" type="password" class="nome_nivel"     value="<?=@$senha?>" placeholder="Senha" required>
        <select name="slcNivel" class="usuario_slc" id="slcNivel" requied>
                
        </select>
        <input type="submit" name="btn_salvar" class="btn_padrao" value="Salvar">
    </form>

    <div class="tbl_usuarios">
        
    </div>
</div>

<script>
//Chamando a função para pegar os dados
usuario.getDados();

$.ajax({url:'router.php?controller=niveis&modo=selectall&json'}).then(function(res){
    
    var lista = JSON.parse(res);
    
    for(var i =0 ; i < lista.length;i++){
        var item = JSON.parse(lista[i]);

        if("<?=$slcNivel?>" == item.id && "<?=@$modo?>" == "ATUALIZAR"){
            $('#slcNivel').append('<option value="'+item.id+'" selected>' + item.nome + '</option>');   
        }
        
        
        $('#slcNivel').append('<option value="'+item.id+'">' + item.nome + '</option>');
    }
    
});
</script>
<link rel="stylesheet" type="text/css" href="view/cms/css/usuario.css">