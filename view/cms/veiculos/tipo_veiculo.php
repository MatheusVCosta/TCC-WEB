<?php

    $controller = 'tipo_veiculo';
    $modo = 'inserir';
    
    /* Dados do formulario */
    $nome   =   '';
    $percentual =   '';
    $id =   '';
    $id_tipo_veiculo = 0;
    $submit = 'tipo_veiculo_cadastro(this)';

    if(isset($tipo)){

        $modo = 'atualizar';

        $id = '&id=' . $tipo->getId();
        $id_tipo_veiculo = $tipo->getId();
        /* DADOS */
        $nome = $tipo->getNome();
        $percentual = $tipo->getPercentual();
        
        $submit = 'tipo_veiculo_atualizar(this)';

    }

?>
<div class="segura_form">  
    <h3 class="titulo_pagina verde">Tipo de veiculos</h3>
    <form onsubmit="<?=@$submit?>" method="POST" id="frmTipo_veiculo"
     action="router.php?controller=<?=@$controller?>&modo=<?=@$modo?><?=@$id?>">

        <input  name="txtNome" type="text" id="nome"    value="<?=@$nome?>"  required>
        <input  name="txtPercentual" id="porcentual"    value="<?=@$percentual?>"  placeholder="10%" pattern="([0-9]*)" required>
        
        <?php if(isset($tipo)){?>

            <p class="tipo_veiculo_comentario" onclick="chamaModalAcessorios(<?=@$id_tipo_veiculo?>)"> Adicionar acessorio ao tipo de veiculo </p>
            <p class="tipo_veiculo_comentario" onclick="chamaModalModelos(<?=@$id_tipo_veiculo?>)"> Adicionar modelo ao tipo de veiculo </p>
            <p class="tipo_veiculo_comentario" onclick="chamaModalFip(<?=@$id_tipo_veiculo?>)"> Exportar dados da tabela Fip </p>

        <?php } ?>

        <input type="submit" name="btn_salvar" class="btn_padrao" id="btnTipoVeiculo" value="Salvar">

    </form>

    <div class="tbl_tipo_veiculo">

        <?php require_once('view/cms/veiculos/tabela_tipo_veiculo.php')?>
    
    </div>
</div>
<link rel="stylesheet" type="text/css" href="view/cms/css/tipo_veiculo.css">