<link rel="stylesheet" type="text/css" href="view/cms/css/como_ganhar_dinheiro.css">
<script src="view/cms/pagina_como_ganhar_dinheiro/modal.js"></script>

<script src="view/cms/js/libs/richText/jquery.richtext.min.js"></script>
<link  rel="stylesheet" href="view/cms/js/libs/richText/richtext.min.css">

<div class="segura_text_button">
    <h2>TABELA COMO GANHAR DINHEIRO</h2>
   <button class="adicionar_nivel" onclick="abrir_cadastro('sessao1');">Editar sessão 1</button>
   <button class="adicionar_nivel" onclick="abrir_cadastro('sessao2');">Editar sessão 2</button>
   <button class="adicionar_nivel" onclick="abrir_cadastro('sessao3');">Editar sessão 3</button>
</div>
<div class="segura_tabela">
    <div class="tabela_niveis">
        <div class="linha_titulo">
            <div class="col_titulo" style="width:200px; border-left: 1px solid black;">Sessão 1</div>
            <div class="col_titulo" style="width:600px; border-left: 1px solid black;">TÍTULO DA SESSÃO</div>
            <div class="col_titulo" style="width:130px; border-left: 1px solid black;">Opções</div>
        </div>
        <?php 
        require_once('controller/controllerComo_ganhar_dinheiro.php');

            $controller_como_ganhar_dinheiro = new ControllerComo_ganhar_dinheiro();

            $como_ganhar_dinheiro =  $controller_como_ganhar_dinheiro->getPage();

        ?>
        <div class="linha_resposta">
            <div class="col_resposta" style="padding-top: 10px; width:800px;  border-left: 1px solid black; padding-left: 140px;"><?=@$como_ganhar_dinheiro->getTitulo_sessao1()?></div>
            <div class="col_resposta_button" style="width:100px;  border-left: 1px solid black;">
                <img src="view/cms/imagem/icones/edit.png" style="float:left;" alt="edit" title="Editar" onclick="abrir_cadastro('sessao1');">
<!--                 <img src="view/cms/imagem/icones/delete.png" height="48px" width="48px" alt="delete" title="Excluir" onclick="como_ganhar_dinheiro_delete(1)"> -->
            </div>
        </div>
    </div>
    <div class="tabela_niveis">
        <div class="linha_titulo">
            <div class="col_titulo" style="width:200px; border-left: 1px solid black;">Sessão 1</div>
            <div class="col_titulo" style="width:600px; border-left: 1px solid black;">TÍTULO DA SESSÃO</div>
            <div class="col_titulo" style="width:130px; border-left: 1px solid black;">Opções</div>
        </div>
        <div class="linha_resposta">
            <div class="col_resposta" style="padding-top: 10px; width:800px;  border-left: 1px solid black; padding-left: 140px;"><?=@$como_ganhar_dinheiro->getTitulo_sessao2()?></div>
            <div class="col_resposta_button" style="width:100px;  border-left: 1px solid black;">
                <img src="view/cms/imagem/icones/edit.png" style="float:left;" alt="edit" title="Editar" onclick="abrir_cadastro('sessao2');">
<!--                 <img src="view/cms/imagem/icones/delete.png" height="48px" width="48px" alt="delete" title="Excluir" onclick="como_ganhar_dinheiro_delete(2)"> -->
            </div>
        </div>
    </div>
    <div class="tabela_niveis">
        <div class="linha_titulo">
            <div class="col_titulo" style="width:200px; border-left: 1px solid black;">Sessão 1</div>
            <div class="col_titulo" style="width:600px; border-left: 1px solid black;">TÍTULO DA SESSÃO</div>
            <div class="col_titulo" style="width:130px; border-left: 1px solid black;">Opções</div>
        </div>
        <div class="linha_resposta">
            <div class="col_resposta" style="padding-top: 10px; width:800px;  border-left: 1px solid black; padding-left: 140px;"><?=@$como_ganhar_dinheiro->getTitulo_sessao3()?></div>
            <div class="col_resposta_button" style="width:100px;  border-left: 1px solid black;">
                <img src="view/cms/imagem/icones/edit.png" style="float:left;" alt="edit" title="Editar" onclick="abrir_cadastro('sessao3');">
<!--                 <img src="view/cms/imagem/icones/delete.png" height="48px" width="48px" alt="delete" title="Excluir" onclick="como_ganhar_dinheiro_delete(3)"> -->
            </div>
        </div>
    </div>
</div>