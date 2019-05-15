<?php

if(isset($_GET['id'])){
    
    require_once('controller/controllerTipo_veiculo.php');


    $controllerTipo_veiculo = new ControllerTipoVeiculo();

    $lista = $controllerTipo_veiculo->listar_modelos();

    $tipo_veiculo = $controllerTipo_veiculo->getById();


}

?>
<div style="background-color:white; height:auto; padding:2px 5px; border-radius: 4px; min-width: 571px;">
    <h2 style="text-align:center; margin:7px 0px 10px 0px;">Defina modelos para um tipo de veiculo</h2>
    <div style=" display: block; width: 100%; height: auto; overflow: auto;">
        <h4 style="float:left;">Tipo de veiculo <strong><?=@$tipo_veiculo->getNome()?></strong></h3>
        <h3 onclick="chamaModalMarcas(<?=@$_GET['id']?>)" style="float:right;  margin-right: 11px;">
            <img src="view/cms/imagem/icones/check1.png" width="20px"> Marcas
        </h3>
        <h3 onclick="modelo_adicionar(<?=@$_GET['id']?>)" style="float:right;  margin-right: 11px;">
            <img src="view/cms/imagem/icones/check1.png" width="20px"> Adicionar modelo 
        </h3>
    </div>
    <div class="caixa_modelos">
    <?php

     if(count($lista) < 1){
        echo "<img class='img_not_find alt='Nada encontrado' src='view/imagem/magnify.gif'>";
        echo " <p class='aviso_tabela'> Nenhum Modelo encontrado!</p> ";
     }else{


     if((round(count($lista)/3)) < 1){
        $lista_modelos =  array_chunk($lista,1);
     }else{
         $lista_modelos =  array_chunk($lista,round(count($lista)/3));
     }



    foreach($lista_modelos as $lista){?>

        <div class="caixa_item">

        <?php foreach($lista as $modelo){?>
            <div class="item">
                <label onclick="modelos_alterar_status(this,<?=@$modelo->getId()?>,<?=@$modelo->getStatus()?>)">
                    <input type="checkbox" name="modelos" <?=@ ($modelo->getStatus() == 1)?'checked':''?>>
                    <strong><?=@$modelo->getNome()?></strong>

                </label>
                <img onclick="modelo_editar(<?=@$_GET['id']?>,<?=@$modelo->getId()?>)" class="edit" src="view/cms/imagem/icones/edit.png" alt="edit">
                <img onclick="modelo_delete(<?=@$_GET['id']?>,<?=@$modelo->getId()?>)" class="delete" src="view/cms/imagem/icones/delete.png" alt="delete">
            </div>  
        <?php } ?>

        </div>

    <?php }
    } ?>
</div>
<script src="view/cms/veiculos/modelos/modal_modelo.js"></script>
<script src="view/cms/veiculos/modelos/marcas/modal_marca.js"></script>