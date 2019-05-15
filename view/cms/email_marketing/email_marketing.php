<link rel="stylesheet" type="text/css" href="view/cms/css/email_marketing.css">
<div class="segura_text_button">
    <h2>Tabelas de emails</h2>
</div>
<div class="segura_tabela_email">  
    <div class="tabela">
        <div class="linha_titulo">
            <p style="width:150px;" class="col_text">
                SELECIONE
<!--             	<input type="checkbox" value="checkTodos" name="checkTodos" onChange="selecioneEmails(this)"> -->
            </p>
            <p style="width:848px; border-left: 1px solid black;" class="col_text">
               EMAIL
            </p>
        </div>
        <div class="tabela_dados">
			<?php
                require_once('controller/controllerEmail_marketing.php');

                $controller_email_marketing = new ControllerEmail_marketing();

                $listRegistro =  $controller_email_marketing->listar_registro_email_marketing();


                if(count($listRegistro) < 1){
                  echo "<img class='img_not_find alt='Nada encontrado' src='view/imagem/magnify.gif'>";
                  echo " <p class='aviso_tabela'> Nenhum registro encontrado!</p> ";
                }

                foreach($listRegistro as $registro){
            ?>
            <div class="linha_dados">
                <p style="width:150px;" class="col_text">
                    <input type="checkbox" id="<?=@$registro->getId()?>" value="<?=@$registro->getEmail()?>" name="emails">
                </p>
                <p style="width:848px; border-left: 1px solid black;" class="col_text">
                    <?=@$registro->getEmail()?>
                </p>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
<button class="btn_exportar" onclick="exportarChamado()">Exportar</button>
<button class="btn_exportar" onclick="enviarEmail();">Enviar E-mail</button>
<script src="view/cms/email_marketing/email.js"> 
</script>
