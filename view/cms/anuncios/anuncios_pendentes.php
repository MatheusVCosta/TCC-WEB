<?php

    $controller = 'veiculo_pendentes';
    $modo = 'inserir';
?>
<div class="segura_form">  
    <h3 class="titulo_pagina">Aguardando Aprovação</h3>
    
    <div class="tbl_anuncios_pendentes">

        <?php require_once('view/cms/anuncios/tabela_anuncios_pendentes.php')?>
    
    </div>
</div>
<link rel="stylesheet" type="text/css" href="view/cms/css/anuncios_pendentes.css">