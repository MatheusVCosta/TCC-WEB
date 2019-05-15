<div class="seja-parceiro-rodape">
    
    <h2>Pagina Seja um Parceiro</h2>

    <button onclick="pagina_topico_criar()">Adicionar Topico</button>

</div>

<div class="seja-parceiro-container">
    <?php
        require_once('controller/controllerSejaParceiro.php');

        $controller_seja_parceiro = new ControllerSejaParceiro();

        $banner = $controller_seja_parceiro->getBanner();

    ?>
    <!-- Area do gerenciamento do img > sds < img -->

    <div class="seja-parceiro-painel-parceiros" style="<?=($banner->getStatus() == 0)?'box-shadow: 7px 5px 13px 5px rgba(120,135,182,.1);opacity: 0.7;':''?>">
        <div class="seja-parceiro-painel-parceiros-imagem">
            <img src="view/upload/<?=@$banner->getFoto1()?>">
            <div onclick="sejaParceiroSalvarImagem('1',this)" class="seja-parceiro-painel-parceiros-imagem-alterar"></div>
        </div>
        <div class="seja-parceiro-painel-parceiros-conteudo">
            <div class="seja-parceiro-painel-parceiros-conteudo-bordaEsquerda"></div>
            <div class="seja-parceiro-painel-parceiros-conteudo-conteudo">

                <div>
                    <?=@$banner->getTexto1()?>
                </div>

                <button><?=@$banner->getTexto2()?></button>

                <div>
                    <?=@$banner->getTexto3()?>
                </div>

            </div>
            <div class="seja-parceiro-painel-parceiros-conteudo-bordaDireita"></div>
        </div>
        <div class="seja-parceiro-painel-parceiros-imagem">
            <img src="view/upload/<?=@$banner->getFoto2()?>">
            <div onclick="sejaParceiroSalvarImagem('2',this)" class="seja-parceiro-painel-parceiros-imagem-alterar"></div>
        </div>
        <button onclick="sejaParceirotornarEditavel()" class="seja-parceiro-painel-parceiros-btn btnEditar"> Editar </button>
        <button onclick="sejaParceiroEsconder(<?=@$banner->getStatus()?>)" class="seja-parceiro-painel-parceiros-btn btnEsconder"> Esconder </button>
        <button onclick="sejaParceiroSalvarPainel()" style="display:none;" id="seja-parceiro-btnSalvar" class="seja-parceiro-painel-parceiros-btn btnEsconder"> Salvar </button>
    </div>

    <!-- Area do gerenciamento dos topicos -->
    <div class="seja-parceiro-painel-parceiros-topicos">
        <!-- Importa a tabela conteudo os topicos  -->
        <?php require_once('view/cms/pagina_seja_parceiro/tabela_topicos.php') ?>
    </div>

</div>

<link rel="stylesheet" type="text/css" href="view/cms/css/pagina_parceiros.css">
<script src="view/cms/pagina_seja_parceiro/modal.js"></script>