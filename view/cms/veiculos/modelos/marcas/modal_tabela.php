<?php

if(isset($_GET['id'])){
    
    require_once('controller/controllerTipo_veiculo.php');


    $controllerTipo_veiculo = new ControllerTipoVeiculo();

    $lista = $controllerTipo_veiculo->listar_marcas();

    $tipo_veiculo = $controllerTipo_veiculo->getById();

}
?>
<div style="background-color:white; height:auto;  padding:2px 5px;">
    <h2 style="text-align:center; margin:7px 0px 10px 0px;">Defina marcas para um tipo de veiculo</h2>
    <div style=" display: block; width: 100%; height: auto; overflow: auto;">
        <h4 style="float:left;">Tipo de veiculo <strong><?=@$tipo_veiculo->getNome()?></strong></h3>
        <h3 onclick="marca_adicionar(<?=@$_GET['id']?>)" style="float:right;"><img src="view/cms/imagem/icones/check1.png" width="20px"> Adicionar marca </h3>
    </div>
    <div class="caixa_marcas">
    <?php

     if(count($lista) < 1){
        echo "<img class='img_not_find alt='Nada encontrado' src='view/imagem/magnify.gif'>";
        echo " <p class='aviso_tabela'> Nenhuma Marca encontrado!</p> ";
     }

     $coluna = 1;


     $lista_marcas =  array_chunk($lista,3);


    foreach($lista_marcas as $lista){?>

        <div class="caixa_item">

        <?php foreach($lista as $marca){?>
            <div class="item">
                <label onclick="marcas_alterar_status(this,<?=@$marca->getId()?>,<?=@$marca->getStatus()?>)">

                    <input type="checkbox" name="modelos"  <?=@ ($marca->getStatus() == 1)?'checked':''?>>
                    <strong><?=@$marca->getNome()?></strong>

                </label>
                <img onclick="marca_editar(<?=@$_GET['id']?>,<?=@$marca->getId()?>)" class="edit" src="view/cms/imagem/icones/edit.png" alt="edit">
                <img onclick="marca_delete(<?=@$_GET['id']?>,<?=@$marca->getId()?>)" class="delete" src="view/cms/imagem/icones/delete.png" alt="delete">
            </div>  
        <?php } ?>

        </div>

    <?php } ?>
</div>
<script src="view/cms/veiculos/modelos/marcas/modal_marca.js"></script>