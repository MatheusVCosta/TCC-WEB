<link rel="stylesheet" type="text/css" href="view/cms/css/pagina_faq.css">
<script src="view/cms/pagina_faq/modal.js"></script>

<div class="segura_text_button">
    <h2>TABELA FAQ</h2>
    <button class="adicionar_nivel" id="abrir_cadastro">ADICIONAR FAQ</button>
</div>
<div class="segura_tabela">
    <div class="tabela_niveis">
        <div class="linha_titulo">
            <div class="col_titulo" style="width:400px; border-left: 1px solid black;">Pergunta</div>
            <div class="col_titulo" style="width:400px; border-left: 1px solid black;">Resposta</div>
            <div class="col_titulo" style="width:130px; border-left: 1px solid black;">Opções</div>
        </div>
        <?php 
            require_once('controller/controllerFaq.php');

            $controller_faq = new ControllerFaq();

            $listFaq =  $controller_faq->listar_faq();


            if(count($listFaq) < 1){
              echo "<img class='img_not_find alt='Nada encontrado' src='view/imagem/magnify.gif'>";
              echo " <p class='aviso_tabela'> Nenhum registro encontrado!</p> ";
            }

            foreach($listFaq as $registro){
        ?>
            <div class="linha_resposta">
                <div class="col_resposta" style="padding-top: 10px; width:400px;  border-left: 1px solid black;"><?=@$registro->getPerguntas()?></div>
                <div class="col_resposta" style="padding-top: 10px; width:400px;  border-left: 1px solid black;"><?=@$registro->getRespostas()?></div>
                <div class="col_resposta" style="width:180px;  border-left: 1px solid black;">
                    <img src="view/cms/imagem/icones/edit.png" alt="edit" title="Editar" onclick="faq_getById(<?=@$registro->getId()?>)">
                    <img src="view/cms/imagem/icones/delete.png" alt="delete" title="Excluir" onclick="faq_delete(<?=@$registro->getId()?>)">
                    <?php if($registro->getStatus() == 1){ ?>
                            <img src="view/cms/imagem/icones/enable.png" alt="delete" title="Excluir" onclick="faq_status(<?=@$registro->getId()?>,1)">
                    <?php }else{ ?>
                            <img src="view/cms/imagem/icones/disable.png" alt="delete" title="Excluir" onclick="faq_status(<?=@$registro->getId()?>,0)">
                    <?php } ?>
                </div>
            </div>
        <?php
            }
        ?>
    </div>
</div>