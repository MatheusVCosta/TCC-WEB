<?php
    require_once('controller/controllerHome.php');

    $controllerHome = new controllerHome();
    
    $pagina = $controllerHome->getPage();

?>
<link rel="stylesheet" href="view/cms/css/pagina_home.css">
<div class="home-gerenciar">
    <div class="home-capecario2">
        <h2>Pagina Home</h2>
    </div>
    <div class="home-painel-banner <?=@($pagina->getBanner()->getStatus() == 0)?'sessao-desativada':''?> ">
        <div class="home-sessao">
            <div class="home-painel-banner-texto">
                <p class="home-painel-banner-texto-primario"><?=@$pagina->getBanner()->getTexto()?></p>
                <p class="home-painel-banner-texto-secundario"><?=@$pagina->getBanner()->getTexto2()?></p>
                <div class="home-painel-banner-btn_anunciar">
                    <a href="">Anuncie!</a>
                </div>
            </div>
            <div class="home-painel-banner-imagem">
                <!--<img src="view/imagem/slider/imagem1.jpg">-->
                <img src="view/upload/<?=@$pagina->getBanner()->getFoto()?>">
                <div class="mascara-imagem" onclick="home_banner_imagem()"></div>
            </div>
        </div>
        <div class="home-operacoes">
            <button onclick="home_banner_editavel()"> Editar   </button>
            <button onclick="home_esconder_sessao('banner',<?=@$pagina->getBanner()->getStatus()?>)"> Esconder </button>
            <button class="home-btnSalvar" onclick="home_banner_salvar()"> Salvar   </button>
        </div>
    </div>
    <div class="home-painel-como-funciona <?=@($pagina->getComofunciona()->getStatus() == 0)?'sessao-desativada':''?>">
        <div class="home-sessao">
            <div class="home-painel-como-funciona-titulo"><?=@$pagina->getComofunciona()->getTitulo()?></div>
            <div class="home-painel-como-funciona-texto">
                <?=@$pagina->getComofunciona()->getTexto()?>
            </div>
            <div class="home-painel-como-funciona-imagem">
                <img src="view/upload/<?=@$pagina->getComofunciona()->getFoto()?>">
                <div class="mascara-imagem" onclick="home_como_funciona_imagem()"></div>
            </div>
        </div>
        <div class="home-operacoes">
            <button onclick="home_como_funciona_editavel()"> Editar </button>
            <button onclick="home_esconder_sessao('sessao_como_funciona',<?=@$pagina->getComofunciona()->getStatus()?>)"> Esconder </button>
            <button class="home-btnSalvar" onclick="home_como_funciona_salvar()"> Salvar   </button>
        </div>
    </div>
    <div class="home-painel-oque-pode-ser <?=@($pagina->getOquePodeAlugar()->getStatus() == 0)?'sessao-desativada':''?>">
        <div class="home-sessao">
            <div class="home-painel-oque-pode-ser-titulo"> <?=@$pagina->getOquePodeAlugar()->getTitulo()?> </div>
            
            <div class="home-painel-oque-pode-ser-topicos">
                
                <div class="home-painel-oque-pode-ser-topico">
                    <div class="home-painel-oque-pode-ser-topico-img">
                        <img class="imagem_tipo" src="view/upload/<?=@$pagina->getOquePodeAlugar()->getFoto1()?>">
                        <div class="mascara-imagem" onclick="home_pode_ser_alugado_imagem('1',this)"></div>
                    </div>
                    <div class="home-painel-oque-pode-ser-topico-titulo">
                       <?=@$pagina->getOquePodeAlugar()->getTitulo1()?>
                    </div>
                    <div class="home-painel-oque-pode-ser-topico-desc">
                       <?=@$pagina->getOquePodeAlugar()->getTexto1()?>
                    </div>
                </div>
                <div class="home-painel-oque-pode-ser-topico">
                    <div class="home-painel-oque-pode-ser-topico-img">
                        <img class="imagem_tipo" src="view/upload/<?=@$pagina->getOquePodeAlugar()->getFoto2()?>">
                        <div class="mascara-imagem" onclick="home_pode_ser_alugado_imagem('2',this)"></div>
                    </div>
                    <div class="home-painel-oque-pode-ser-topico-titulo">
                       <?=@$pagina->getOquePodeAlugar()->getTitulo2()?>
                    </div>
                    <div class="home-painel-oque-pode-ser-topico-desc">
                       <?=@$pagina->getOquePodeAlugar()->getTexto2()?>
                    </div>
                </div>
                <div class="home-painel-oque-pode-ser-topico">
                    <div class="home-painel-oque-pode-ser-topico-img">
                        <img class="imagem_tipo" src="view/upload/<?=@$pagina->getOquePodeAlugar()->getFoto3()?>">
                        <div class="mascara-imagem" onclick="home_pode_ser_alugado_imagem('3',this)"></div>
                    </div>
                    <div class="home-painel-oque-pode-ser-topico-titulo">
                       <?=@$pagina->getOquePodeAlugar()->getTitulo3()?>
                    </div>
                    <div class="home-painel-oque-pode-ser-topico-desc">
                       <?=@$pagina->getOquePodeAlugar()->getTexto3()?>
                    </div>
                </div>

            </div>
        </div>
        <div class="home-operacoes">
            <button onclick="home_pode_ser_alugado_editavel()"> Editar   </button>
            <button onclick="home_esconder_sessao('sessao_oque_pode_alugar',<?=@$pagina->getOquePodeAlugar()->getStatus()?>)"> Esconder </button>
            <button class="home-btnSalvar" onclick="home_pode_ser_alugado_salvar()"> Salvar   </button>
        </div>
    </div>
    <div class="home-painel-por-que-anunciar <?=@($pagina->getPorQueAnunciar()->getStatus() == 0)?'sessao-desativada':''?>">
        <div class="home-sessao">
            <div class="home-painel-por-que-anunciar-titulo"><?=@$pagina->getPorQueAnunciar()->getTitulo()?></div>
            <div class="home-painel-por-que-anunciar-img">
                <img src="view/upload/<?=@$pagina->getPorQueAnunciar()->getFoto()?>">
                <div class="mascara-imagem" onclick="home_por_que_anunciar_imagem()"></div>
            </div>
            <div class="home-painel-por-que-anunciar-desc">
                <?=@$pagina->getPorQueAnunciar()->getTexto()?>
            </div>
        </div>
        <!--       -->
        <div class="home-operacoes">
            <button onclick="home_por_que_anunciar_editavel()"> Editar   </button>
            <button onclick="home_esconder_sessao('sessao_por_que_anunciar',<?=@$pagina->getPorQueAnunciar()->getStatus()?>)"> Esconder </button>
            <button class="home-btnSalvar" onclick="home_por_que_anunciar_salvar()"> Salvar   </button>
        </div>
    </div>
    <div class="home-painel-quer-anunciar <?=@($pagina->getQuerAnunciar()->getStatus() == 0)?'sessao-desativada':''?>">
        <div class="home-sessao">
            <div class="home-painel-quer-anunciar-titulo"><?=@$pagina->getQuerAnunciar()->getTitulo()?></div>
            <div class="home-painel-quer-anunciar-subtitulo"><?=@$pagina->getQuerAnunciar()->getSubTitulo()?></div>
            <div class="home-painel-quer-anunciar-topicos">
                <div class="home-painel-quer-anunciar-topico">
                    <div class="home-painel-quer-anunciar-topico-img">
                        <img src="view/upload/<?=@$pagina->getQuerAnunciar()->getFoto1()?>" onclick="home_quer_anunciar_imagem(this,1)">
                    </div>
                    <div class="home-painel-quer-anunciar-topico-titulo">
                        <?=@$pagina->getQuerAnunciar()->getSubTitulo1()?>
                    </div>
                    <div class="home-painel-quer-anunciar-topico-desc">
                        <?=@$pagina->getQuerAnunciar()->getTexto1()?>
                    </div>
                </div>
                <div class="home-painel-quer-anunciar-topico">
                    <div class="home-painel-quer-anunciar-topico-img">
                        <img src="view/upload/<?=@$pagina->getQuerAnunciar()->getFoto2()?>" onclick="home_quer_anunciar_imagem(this,2)">
                    </div>
                    <div class="home-painel-quer-anunciar-topico-titulo">
                        <?=@$pagina->getQuerAnunciar()->getSubTitulo2()?>
                    </div>
                    <div class="home-painel-quer-anunciar-topico-desc">
                        <?=@$pagina->getQuerAnunciar()->getTexto2()?>
                    </div>
                </div>
                <div class="home-painel-quer-anunciar-topico">
                    <div class="home-painel-quer-anunciar-topico-img">
                        <img src="view/upload/<?=@$pagina->getQuerAnunciar()->getFoto3()?>" onclick="home_quer_anunciar_imagem(this,3)">
                    </div>
                    <div class="home-painel-quer-anunciar-topico-titulo">
                        <?=@$pagina->getQuerAnunciar()->getSubTitulo3()?>
                    </div>
                    <div class="home-painel-quer-anunciar-topico-desc">
                        <?=@$pagina->getQuerAnunciar()->getTexto3()?>
                    </div>
                </div>
                <div class="home-painel-quer-anunciar-topico">
                    <div class="home-painel-quer-anunciar-topico-img">
                        <img src="view/upload/<?=@$pagina->getQuerAnunciar()->getFoto4()?>" onclick="home_quer_anunciar_imagem(this,4)">
                    </div>
                    <div class="home-painel-quer-anunciar-topico-titulo">
                        <?=@$pagina->getQuerAnunciar()->getSubTitulo4()?>
                    </div>
                    <div class="home-painel-quer-anunciar-topico-desc">
                        <?=@$pagina->getQuerAnunciar()->getTexto4()?>
                    </div>
                </div>
            </div>
        </div>
        <div class="home-operacoes">
            <button onclick="home_quer_anunciar_editavel()"> Editar   </button>
            <button onclick="home_esconder_sessao('sessao_quer_anunciar',<?=@$pagina->getQuerAnunciar()->getStatus()?>)"> Esconder </button>
            <button class="home-btnSalvar" onclick="home_quer_anunciar_salvar()"> Salvar   </button>
        </div>
    </div>
</div>
<script src="view/cms/pagina_home/modal.js"></script>