<?php 
    
    require_once("controller/controllerTipo_veiculo.php");
    $controller_tipo_veiculo = new ControllerTipoVeiculo();

    $tipo = $controller_tipo_veiculo->getById($_GET['id_tipo_veiculo']);



?>
<div class="modal_fip">
    <div class="fip_descricao">
        <img src="view/cms/imagem/loading_2.svg" witdh="125">
        <p>Desejá iniciar a exportação da fip para o <?=@$tipo->getNome()?>?</p>
    </div>
    <button class="btn_fip_exportar" onclick="exportarFIP(<?=@$tipo->getId()?>)"> Iniciar Exportação </button>
</div>
<script src="view/cms/veiculos/fip/modal_fip.js"></script>