<div class="segura_form">
    <div class="segura_text_button">
        <h2>Fale Conosco</h2>
    </div>
    <div id="descarregarConteudo">
        <div id="titulos">
            <h2 style="margin-right: 100px; margin-left: 100px;">Nome</h2>
            <h2 style="margin-right: 250px; margin-left: 80px;">E-mail</h2>
            <h2 style="margin-right: ; margin-left: 130px;">Opções</h2>
        </div>
        <div class="itensMensagens">
            <?php
                require_once('controller/controllerFale_conosco.php');

                $controller_fale_conosco = new ControllerFale_conosco();

                $listRegistro =  $controller_fale_conosco->listar_fale_conosco();


                if(count($listRegistro) < 1){
                  echo "<img class='img_not_find alt='Nada encontrado' src='view/imagem/magnify.gif'>";
                  echo " <p class='aviso_tabela'> Nenhum registro encontrado!</p> ";
                }

                foreach($listRegistro as $registro){
            ?>
                <div class="email">
                    <h3><?=@$registro->getNome()?></h3>
                </div>
                <div class="mensagem">
                    <h3><?=@$registro->getEmail()?></h3>
                </div>
                <div class="abrir">
                    <button class="btn_exportar" onclick="chamaModalFaleConosco(<?=@$registro->getId()?>);"> Abrir</button>
                    <button class="btn_exportar" onclick="exportarChamado(<?=@$registro->getId()?>)">Exportar</button>
                    <button class="btn_exportar" onclick="fale_conosco_delete(<?=@$registro->getId()?>)">Excluir</button>
                </div>
            <?php
                }
             ?>
        </div>
    </div>
</div>
<link rel="stylesheet" type="text/css" href="view/cms/css/fale_conosco.css">
<script  src="view/cms/fale_conosco/fale_conosco.js">
</script>