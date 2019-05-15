<?php

if(isset($_GET['id_tipo_veiculo'])){
    
    require_once('controller/controllerTipo_veiculo.php');


    $controllerTipo_veiculo = new ControllerTipoVeiculo();

    $lista = $controllerTipo_veiculo->listar_acessorios($_GET['id_tipo_veiculo']);

    $tipo_veiculo = $controllerTipo_veiculo->getById($_GET['id_tipo_veiculo']);

}

?>
<div class="modal_acessorios">
    <h2 style="text-align:center; margin:7px 0px 10px 0px;">Defina os acessorios para um tipo de veiculo</h2>
    <div style=" display: block; width: 100%; height: auto; overflow: auto;">
        <h4 style="float:left;">Tipo de veiculo <strong><?=@$tipo_veiculo->getNome()?></strong></h3>
        <h3 onclick="acessorios_adicionar(<?=@$_GET['id_tipo_veiculo']?>)" style="float:right;"><img src="view/cms/imagem/icones/check1.png" width="20px"> Adicionar Acessorio </h3>
    </div>
    <div class="caixa_acessorios">
    <?php

     if(count($lista) < 1){
        echo "<img class='img_not_find alt='Nada encontrado' src='view/imagem/magnify.gif'>";
        echo " <p class='aviso_tabela'> Nenhum Acessorio encontrado!</p> ";
     }else{
        
        if((round(count($lista)/3)) < 1){
            $lista_acessorios =  array_chunk($lista,1);
        }else{
             $lista_acessorios =  array_chunk($lista,round(count($lista)/3));
        }


        foreach($lista_acessorios as $lista){?>

            <div class="caixa_item">

            <?php foreach($lista as $acessorio){?>
                <div class="item">
                    <label onclick="acessorios_alterar_status(this,<?=@$acessorio->getId()?>,<?=@$acessorio->getStatus()?>)">
                        <input type="checkbox" name="acessorios" <?=@ ($acessorio->getStatus() == 1)?'checked':''?>>
                        <?=@$acessorio->getNome()?>
                    </label>
                    <img class="edit" src="view/cms/imagem/icones/edit.png"
                         onclick="acessorios_editar(<?=@$_GET['id_tipo_veiculo']?>,<?=@$acessorio->getId()?>)" alt="edit">
                    <img class="delete" src="view/cms/imagem/icones/delete.png" 
                         onclick="acessorios_delete(<?=@$_GET['id_tipo_veiculo']?>,<?=@$acessorio->getId()?>)" alt="delete">
                </div>
            <?php } ?>

            </div>

        <?php }
    } ?>
    </div>
</div>
<script src="view/cms/veiculos/acessorios/modal_acessorios.js"></script>