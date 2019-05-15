<link rel="stylesheet" type="text/css" href="view/cms/css/pagina_termos_uso.css">
<script src="view/cms/pagina_termos_uso/modal.js"></script>

<div class="segura_text_button">
    <h2>TABELA TERMOS DE USO</h2>
    <button class="adicionar_nivel" id="abrir_cadastro">Editar TERMO DE USO</button>
</div>
<div class="segura_tabela">
    <div class="tabela_niveis">
        <div class="linha_titulo">
            <div class="col_titulo" style="width:400px; border-left: 1px solid black;">Título</div>
            <div class="col_titulo" style="width:400px; border-left: 1px solid black;">Texto do Termo</div>
            <div class="col_titulo" style="width:130px; border-left: 1px solid black;">Opções</div>
        </div>
        <?php 
            require_once('controller/controllerTermos_uso.php');

            $controller_termos_uso = new ControllerTermos_uso();

            $pagina =  $controller_termos_uso->getPagina();

            ?>
                <div class="linha_resposta">
                    <div class="col_resposta" style="padding-top: 10px; width:400px;  border-left: 1px solid black;"><?=@$pagina->getTitulo()?></div>
                    <div class="col_resposta" style="padding-top: 10px; width:400px;  border-left: 1px solid black;"><?=@$pagina->getTexto()?></div>
                    <div class="col_resposta" style="width:130px;  border-left: 1px solid black;">
                        <img src="view/cms/imagem/icones/edit.png" alt="edit" title="Editar" onclick="termos_uso()">
                        <img src="view/cms/imagem/icones/delete.png" alt="delete" title="Excluir" onclick="termos_uso_delete()">
                        <?php if($pagina->getStatus() == 1){ ?>
                            <img src="view/cms/imagem/icones/enable.png" alt="ativa" title="ativar" onclick="termos_uso_status(1)">
                        <?php }else{ ?>
                            <img src="view/cms/imagem/icones/disable.png" alt="desativa" title="desativar" onclick="termos_uso_status(0)">
                        <?php } ?>
                    </div>
                </div>
            <?php
        ?>
    </div>
</div>