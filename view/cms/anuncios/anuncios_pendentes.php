<?php

    $controller = 'veiculo_pendentes';
    $modo = 'inserir';
?>
<div class="segura_form">  
    <div class="segura_text_button">
        <h2> Anúncios Aguardando Aprovação</h2>
    </div>
    
    <div class="tbl_anuncios_pendentes">

        <?php require_once('view/cms/anuncios/tabela_anuncios_pendentes.php')?>
    
    </div>
</div>
<link rel="stylesheet" type="text/css" href="view/cms/css/anuncios_pendentes.css">