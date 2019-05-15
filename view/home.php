<?php
    
    $cliente = null;
    $boolean = "false";
    require_once('controller/controllerHome.php');
    require_once('model/clienteClass.php');

    $controllerHome = new controllerHome();
    $pagina = $controllerHome->getPage();
    
    // Pegando o Cliente Logado
    if(!isset($_SESSION))session_start();

    if(isset($_POST['logout'])){
        echo "Sucesso";
        $boolean = false;
        session_destroy();
    }
   
    if(isset($_SESSION['cliente'])){
        $cliente = unserialize($_SESSION['cliente']);
        $boolean = true;
    }
        
    

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Mob'Share</title>
    <link rel="stylesheet" type="text/css" media="screen" href="view/css/home.css"/>
    <script src="view/js/libs/jquery/jquery-3.3.1.js"></script>
    <script src="view/js/notify.js"></script>
    <script src="view/js/libs/jqueryMask/jquery.mask.js"></script>
    <script src="view/js/main.js"></script>
</head>
<body>
<script>
    $(document).ready(function(){
        if(<?php echo $boolean?>)
            headerLogado();
        else
            headerNaoLogado();
    });
</script>
<div id="principal">
    <div class="container">
        <div class="modal">

        </div>
    </div>
    <div id="principal">
        <div class="container">
            <div class="modal">

            </div>
        </div>
        <header id="header_home" style="background-image: url(view/upload/<?=@$pagina->getBanner()->getFoto()?>);<?=@($pagina->getBanner()->getStatus() == 0)?'height: 100px;':''?>">
            <nav class="cor_site_padrao">
                <div id="segura_nav">
                    <div id="logo">
                        <img src="view/imagem/mob.png" alt="logo" title="logo">
                    </div>
                    <div class="segura_menu">
                        <ul>
                            <li><a href="?home">INÍCIO</a></li>
                            <li><a href="?melhores_anuncios">VEICULOS EM DESTAQUE</a></li>
                            <li><a href="?principais_anuncios">VEÍCULOS A VENDA</a></li>
                            <li><a href="?como_ganhar_dinheiro">GANHE DINHEIRO</a></li>
                            <li><a href="?parceiros">SEJA UM PARCEIRO</a></li>
                            <li><a href="?sobre">SOBRE NÓS</a></li>
                        </ul>
                    </div>
                    <div class="modoLogin" onload="verificarLogin(<?php $cliente ?>)">
                    <div class="segura_login">
                        <div class="login_cadastro" id="login" style="width: 110px;">
                            <a href="javascript:efetuarLogin()"><img src="view/imagem/login_amarelo.png" alt="login"><p>LOGIN</p></a>
                        </div>
                        <div class="login_cadastro" style="width: 160px;">
                            <a href="javascript:getCadastro()"><img src="view/imagem/downloads2/cadastrar.png" alt="login"><p>CADATRAR-SE</p></a>
                        </div>
                    </div>
                </div>    
            </nav>
            <div class="texto_chamativo" style="<?=@($pagina->getBanner()->getStatus() == 0)?'display:none;':''?>">
                <p class="texto_primario"><?=@$pagina->getBanner()->getTexto()?></p>
                <p class="texto_secundario"><?=@$pagina->getBanner()->getTexto2()?></p>
                <div class="btn_anunciar">
                    <a href="#">Anuncie!</a>
                </div>
            </div>
        </header>
        <div id="conteudo">
            <section class="section_conteudo" style="<?=@($pagina->getComofunciona()->getStatus() == 0)?'display:none;':''?>">
                <div class="como_funciona" id="como_funciona">
                    <h2 class="titulo_section font_white" ><?=@$pagina->getComofunciona()->getTitulo()?></h2>

                    <div id="segura_como_funciona">
                        <div class="area_texto_maior">
                            <?=@$pagina->getComofunciona()->getTexto()?>
                            
                        </div >
                        <img class="imagem_como_funciona" src="view/upload/<?=@$pagina->getComofunciona()->getFoto()?>" alt="carro" title="">   
                    </div>
                </div>
            </section>   
            <section class="section_conteudo2" style="height:450px; <?=@($pagina->getOquePodeAlugar()->getStatus() == 0)?'display:none;':''?>">
                <h2 class="titulo_section" style="margin-top:30px;"><?=@$pagina->getOquePodeAlugar()->getTitulo()?></h2>
                <div class="area_tipo_veiculo" >
                    <div class="tipos_veiculos">

                        <a href="#"><img class="imagem_tipo" src="view/upload/<?=@$pagina->getOquePodeAlugar()->getFoto1()?>"></a>
                        <h3><?=@$pagina->getOquePodeAlugar()->getTitulo1()?></h3>
                        <p>
                            <?=@$pagina->getOquePodeAlugar()->getTexto1()?>
                        </p>
                    </div>
                    <div class="tipos_veiculos">
                        <a href="#"><img class="imagem_tipo"  src="view/upload/<?=@$pagina->getOquePodeAlugar()->getFoto2()?>"></a>   
                        <h3><?=@$pagina->getOquePodeAlugar()->getTitulo2()?></h3>
                        <p>
                            <?=@$pagina->getOquePodeAlugar()->getTexto2()?>
                        </p>     
                    </div>
                    <div class="tipos_veiculos">
                        <a href="#"><img class="imagem_tipo" src="view/upload/<?=@$pagina->getOquePodeAlugar()->getFoto3()?>"></a>
                        <h3><?=@$pagina->getOquePodeAlugar()->getTitulo3()?></h3>
                        <p>
                            <?=@$pagina->getOquePodeAlugar()->getTexto3()?>
                        </p>
                    </div>
                </div>
            </section>
            <section class="section_anuncios" style="<?=@($pagina->getPorQueAnunciar()->getStatus() == 0)?'display:none;':''?>">
                <div id="div_anuncio">
                    <h2 class="titulo_section font_white"><?=@$pagina->getPorQueAnunciar()->getTitulo()?></h2>
                    <div class="alugar_veiculo">
                        <div class="imagem_alugar_veiculo">
                            <img  src="view/upload/<?=@$pagina->getPorQueAnunciar()->getFoto()?>" alt="" title=""> 
                        </div>
                        <div class="area_texto">
                            <p>
                                <?=@$pagina->getPorQueAnunciar()->getTexto()?>
                            </p>
                        </div>
                    
                    </div>
                </div>
            </section>
            <section class="section_anunciar fundo_white" style="<?=@($pagina->getQuerAnunciar()->getStatus() == 0)?'display:none;':''?>" id="anuncie_veiculo">
                <div id="segura_conteudo">
                    <h2 class="titulo_left"><?=@$pagina->getQuerAnunciar()->getTitulo()?></h2>
                    <div class="anunciar_veiculo">
                        <h2><?=@$pagina->getQuerAnunciar()->getSubTitulo()?></h2>
                        
                        <div class="div_passos">
                            <img src="view/upload/<?=@$pagina->getQuerAnunciar()->getFoto1()?>" alt="teste">
                            <h2><?=@$pagina->getQuerAnunciar()->getSubTitulo1()?></h2>
                            <div class="texto_como_anunciar">
                                <?=@$pagina->getQuerAnunciar()->getTexto1()?>
                            </div>
                        </div>
                        <div class="div_passos">
                            <img src="view/upload/<?=@$pagina->getQuerAnunciar()->getFoto2()?>" alt="teste">
                            <h2><?=@$pagina->getQuerAnunciar()->getSubTitulo2()?></h2>
                            <div class="texto_como_anunciar">
                                <?=@$pagina->getQuerAnunciar()->getTexto2()?>
                            </div>
                        </div>
                        <div class="div_passos">
                            <img src="view/upload/<?=@$pagina->getQuerAnunciar()->getFoto3()?>" alt="teste">
                            <h2><?=@$pagina->getQuerAnunciar()->getSubTitulo3()?></h2>
                            <div class="texto_como_anunciar">
                                <?=@$pagina->getQuerAnunciar()->getTexto3()?>
                            </div>
                        </div>
                        <div class="div_passos">
                            <img src="view/upload/<?=@$pagina->getQuerAnunciar()->getFoto4()?>" alt="teste">
                            <h2><?=@$pagina->getQuerAnunciar()->getSubTitulo4()?></h2>
                            <div class="texto_como_anunciar">
                                <?=@$pagina->getQuerAnunciar()->getTexto4()?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="section_conteudo_anuncios" id="destaques">
                <div id="area_anuncios">
                <h2 class="titulo_left">Veja os destaques dessa semana</h2>            
                    <div id="segura_anuncios">
                        <a href="#">
                            <div class="anuncios">
                                    <img class="img_anuncio" src="view/imagem/palio.jpg" alt="Nome veiculo" title="Nome veiculo">
                                <div class="info_anuncio">
                                    <p class="nome_veiculo">R$ 30,00/hora</p>

                                    <p class="info_veiculo" style="margin-top:10px;">Fiat Palio 4 portas</p>
                                    <p class="info_veiculo">2018 | 3000 Km</p>
                                    <p class="info_veiculo" >Matheus Vieira | São Paulo-SP</p>
                                    
                                    <div class="stars_avaliacao">
                                        <img src="view/imagem/star1.png" alt="star">
                                        <img class="star_left" src="view/imagem/star1.png" alt="star">
                                        <img class="star_left" src="view/imagem/star1.png" alt="star">
                                        <img class="star_left" src="view/imagem/star1.png" alt="star">
                                        <img class="star_left" src="view/imagem/star1.png" alt="star">
                                        <p class="percentual_avaliacao">4.5%</p>
                                    </div>
                                    
                                </div>
                            </div>
                        </a>
                        <a href="#">
                            <div class="anuncios">
                                <img class="img_anuncio" src="view/imagem/i30.jpg" alt="Nome veiculo" title="Nome veiculo">
                                <div class="info_anuncio">
                                    <p class="nome_veiculo">R$ 30,00/hora</p>

                                    <p class="info_veiculo" style="margin-top:10px;">Hyundai i30</p>
                                    <p class="info_veiculo">2018 | 3000 Km</p>
                                    <p class="info_veiculo" >Matheus Vieira | São Paulo-SP</p>
                                    
                                    <div class="stars_avaliacao">
                                        <img src="view/imagem/star1.png" alt="star">
                                        <img class="star_left" src="view/imagem/star1.png" alt="star">
                                        <img class="star_left" src="view/imagem/star1.png" alt="star">
                                        <img class="star_left" src="view/imagem/star1.png" alt="star">
                                        <img class="star_left" src="view/imagem/star1.png" alt="star">
                                        <p class="percentual_avaliacao">4.5%</p>
                                    </div>
                                    
                                </div>
                            </div>
                        </a>
                        <a href="#">
                            <div class="anuncios">
                                <img class="img_anuncio" src="view/imagem/hb20.jpg" alt="Nome veiculo" title="Nome veiculo">
                                <div class="info_anuncio">
                                    <p class="nome_veiculo">R$ 30,00/hora</p>

                                    <p class="info_veiculo" style="margin-top:10px;">Hyundai hb20</p>
                                    <p class="info_veiculo">2018 | 3000 Km</p>
                                    <p class="info_veiculo" >Matheus Vieira | São Paulo-SP</p>
                                    
                                    <div class="stars_avaliacao">
                                        <img src="view/imagem/star1.png" alt="star">
                                        <img class="star_left" src="view/imagem/star1.png" alt="star">
                                        <img class="star_left" src="view/imagem/star1.png" alt="star">
                                        <img class="star_left" src="view/imagem/star1.png" alt="star">
                                        <img class="star_left" src="view/imagem/star1.png" alt="star">
                                        <p class="percentual_avaliacao">4.5%</p>
                                    </div>
                                    
                                </div>
                            </div>
                        </a>
                        <a href="#">
                            <div class="anuncios">
                                <img class="img_anuncio" src="view/imagem/gol.jpg" alt="Nome veiculo" title="Nome veiculo">
                                <div class="info_anuncio">
                                    <p class="nome_veiculo">R$ 30,00/hora</p>

                                    <p class="info_veiculo" style="margin-top:10px;">Volkswagem Gol</p>
                                    <p class="info_veiculo">2018 | 3000 Km</p>
                                    <p class="info_veiculo" >Matheus Vieira | São Paulo-SP</p>
                                    
                                    <div class="stars_avaliacao">
                                        <img src="view/imagem/star1.png" alt="star">
                                        <img class="star_left" src="view/imagem/star1.png" alt="star">
                                        <img class="star_left" src="view/imagem/star1.png" alt="star">
                                        <img class="star_left" src="view/imagem/star1.png" alt="star">
                                        <img class="star_left" src="view/imagem/star1.png" alt="star">
                                        <p class="percentual_avaliacao">4.5%</p>
                                    </div>
                                    
                                </div>
                            </div>
                        </a>
                        <a href="#">
                            <div class="anuncios">
                                <img class="img_anuncio" src="view/imagem/bicicleta.jpg" alt="Nome veiculo" title="Nome veiculo">
                                <div class="info_anuncio">
                                    <p class="nome_veiculo">R$ 30,00/hora</p>

                                    <p class="info_veiculo" style="margin-top:10px;">HUPI Whistler</p>
                                    <p class="info_veiculo">2018 | 3000 Km</p>
                                    <p class="info_veiculo" >Matheus Vieira | São Paulo-SP</p>
                                    
                                    <div class="stars_avaliacao">
                                        <img src="view/imagem/star1.png" alt="star">
                                        <img class="star_left" src="view/imagem/star1.png" alt="star">
                                        <img class="star_left" src="view/imagem/star1.png" alt="star">
                                        <img class="star_left" src="view/imagem/star1.png" alt="star">
                                        <img class="star_left" src="view/imagem/star1.png" alt="star">
                                        <p class="percentual_avaliacao">4.5%</p>
                                    </div>
                                    
                                </div>
                            </div>
                        </a>
                        <a href="#">
                            <div class="anuncios">
                                <img class="img_anuncio" src="view/imagem/xj9.jpg" alt="Nome veiculo" title="Nome veiculo">
                                <div class="info_anuncio">
                                    <p class="nome_veiculo">R$ 30,00/hora</p>

                                    <p class="info_veiculo" style="margin-top:10px;">Yamaha Xj6</p>
                                    <p class="info_veiculo">2018 | 3000 Km</p>
                                    <p class="info_veiculo" >Matheus Vieira | São Paulo-SP</p>
                                    
                                    <div class="stars_avaliacao">
                                        <img src="view/imagem/star1.png" alt="star">
                                        <img class="star_left" src="view/imagem/star1.png" alt="star">
                                        <img class="star_left" src="view/imagem/star1.png" alt="star">
                                        <img class="star_left" src="view/imagem/star1.png" alt="star">
                                        <img class="star_left" src="view/imagem/star1.png" alt="star">
                                        <p class="percentual_avaliacao">4.5%</p>
                                    </div>
                                    
                                </div>
                            </div>
                        </a>
                        <a href="#">
                            <div class="anuncios">
                                <img class="img_anuncio" src="view/imagem/gol.jpg" alt="Nome veiculo" title="Nome veiculo">
                                <div class="info_anuncio">
                                    <p class="nome_veiculo">R$ 30,00/hora</p>

                                    <p class="info_veiculo" style="margin-top:10px;">Volkswagem Gol</p>
                                    <p class="info_veiculo">2018 | 3000 Km</p>
                                    <p class="info_veiculo" >Matheus Vieira | São Paulo-SP</p>
                                    
                                    <div class="stars_avaliacao">
                                        <img src="view/imagem/star1.png" alt="star">
                                        <img class="star_left" src="view/imagem/star1.png" alt="star">
                                        <img class="star_left" src="view/imagem/star1.png" alt="star">
                                        <img class="star_left" src="view/imagem/star1.png" alt="star">
                                        <img class="star_left" src="view/imagem/star1.png" alt="star">
                                        <p class="percentual_avaliacao">4.5%</p>
                                    </div>
                                    
                                </div>
                            </div>
                        </a>
                        <a href="#">
                            <div class="anuncios">
                                <img class="img_anuncio" src="view/imagem/bicicleta.jpg" alt="Nome veiculo" title="Nome veiculo">
                                <div class="info_anuncio">
                                    <p class="nome_veiculo">R$ 30,00/hora</p>

                                    <p class="info_veiculo" style="margin-top:10px;">HUPI Whistler</p>
                                    <p class="info_veiculo">2018 | 3000 Km</p>
                                    <p class="info_veiculo" >Matheus Vieira | São Paulo-SP</p>
                                    
                                    <div class="stars_avaliacao">
                                        <img src="view/imagem/star1.png" alt="star">
                                        <img class="star_left" src="view/imagem/star1.png" alt="star">
                                        <img class="star_left" src="view/imagem/star1.png" alt="star">
                                        <img class="star_left" src="view/imagem/star1.png" alt="star">
                                        <img class="star_left" src="view/imagem/star1.png" alt="star">
                                        <p class="percentual_avaliacao">4.5%</p>
                                    </div>
                                    
                                </div>
                            </div>
                        </a>
                        <a href="#">
                            <div class="anuncios">
                                <img class="img_anuncio" src="view/imagem/xj9.jpg" alt="Nome veiculo" title="Nome veiculo">
                                <div class="info_anuncio">
                                    <p class="nome_veiculo">R$ 30,00/hora</p>

                                    <p class="info_veiculo" style="margin-top:10px;">Yamaha Xj6</p>
                                    <p class="info_veiculo">2018 | 3000 Km</p>
                                    <p class="info_veiculo" >Matheus Vieira | São Paulo-SP</p>
                                    
                                    <div class="stars_avaliacao">
                                        <img src="view/imagem/star1.png" alt="star">
                                        <img class="star_left" src="view/imagem/star1.png" alt="star">
                                        <img class="star_left" src="view/imagem/star1.png" alt="star">
                                        <img class="star_left" src="view/imagem/star1.png" alt="star">
                                        <img class="star_left" src="view/imagem/star1.png" alt="star">
                                        <p class="percentual_avaliacao">4.5%</p>
                                    </div>
                                    
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </section>

            <section class="section_fale_conosco" id="fale_conosco">
                <h2>Fale conosco</h2>
                <div class="fale_conosco">
                    <form name="formFaleConosco" onsubmit="fale_conosco_enviar(this)" action="router.php?controller=FALE_CONOSCO&modo=inserir" method="POST">
                        <div class="formulario">
                            <div class="input_form">
                                <input type="text" name="txtNome" maxlength="100" pattern="[a-z A-Z ã ç á é í õ ó ê è ì Ç Ã Õ Á É Ó À È Ò Ù ú ù]*" placeholder="Nome">
                            </div>
                            <div class="input_form">
                                <input type="email" name="txtEmail" maxlength="100" pattern="^([a-z._\-0-9áéíóúàèìòùâêîôûãẽĩõũç]*@+([a-z0-9]+.+[a-z0-9])*)+$" placeholder="E-mail" >
                            </div>
                            <div class="input_form">
                                <input type="text" id="txtTelefone" pattern="^(\((1[1-9]|2[12478]|3[1234578]|4[1-9]|5[1345]|6[1-9]|7[134579]|8[1-9]|9[1-9])\)([0-9]{4}[-][0-9]{4}))+$" name="txtTelefone" maxlength="20" placeholder="Telefone">
                            </div>
                            <div class="input_form">
                                <input type="text" id="txtCelular" name="txtCelular" maxlength="20" pattern="^(\((1[1-9]|2[12478]|3[1234578]|4[1-9]|5[1345]|6[1-9]|7[134579]|8[1-9]|9[1-9])\)(9[0-9]{4}[-][0-9]{4}))+$"  placeholder="Celular">
                            </div>
                            <div class="input_form">
                                <textarea style="height: 100px;" name="menssagem" placeholder="Mensagem"></textarea>
                            </div>
                            <input type="submit" name="btnEnviar" value="Enviar" id="buttonEnviar">
                        </div>
                    </form>
                </div>
            </section>
            
        </div>
    </div>
    <footer class="cor_site_padrao">
        <!--  Caixas que contem o contato e o navegar pelo site -->
        <div class="newsletter">
            <div class="logo_mob">
                <img src="view/imagem/mob.png" alt="logo">
            </div>
            <div class="segura_newsletter">
                <form id="frmEmail" onsubmit="email_marketing_enviar(this)" action="router.php?controller=EMAIL_MARKETING&modo=INSERIR" method="POST" >
                    <h3>Quer receber noticias?</h3>
                    <input type="email" name="txtEmail" placeholder="Insira seu email" class="input_newsletter">
<!--                     <button type="submit" name="btnEnviar" class="botao_newsletter">Enviar</button> -->
                    <input class="botao_newsletter" type="submit" name="btnEnviar" value="Enviar">
                </form>
            </div>
        </div>

        <div class="contatos">
            <div class="segura_mapa_contato">
                <div class="segura_contatos">
                    <h3> Quer entrar em contato? </h3>
                    <div id="telefone_email">
                        <p>Telefone:  0800 755 855</p>
                        <p>Telefone:  0800 755 855</p>
                        <p>E-mail: atendimento@mobshare.com.br</p>
                        <img src="view/imagem/cracha_branco.png" alt="cracha">
                        <a href="?cms/login">Área administrativa</a> 
                    </div>
                </div>
                <div class="mapa_site">
                    <h3> Navegue pelo site </h3>
                    <div class="coluna_mapa">
                        <a href="?melhores_anuncios">Melhores avaliações</a><br>
                        <a href="?termos_uso.php">Termos de uso</a><br>
                        <a href="?principais_anuncios.php">Principais anúncio</a><br>
                        <a href="?como_ganhar_dinheiro.php">Ganhe dinheiro</a><br>
                    </div>
                    <div class="coluna_mapa">
                        <a href="?sobre.php">Sobre a empresa</a><br>
                        <a href="?faq.php">F.A.Q</a><br>
                        <a href="?parceiros.php">Seja um parceio</a>                 
                    </div>
                </div>
            </div>
            <!--  Caixas das redes sociais  -->
            <div class="redes_sociais">
                <p>Siga nós nas redes</p>
                <div class="segura_rs" style="text-align: center;">
                    <a href="https://www.instagram.com/?hl=pt-br"><img src="view/imagem/instagram.png" alt="Instagran" title="Instagran"></a>
                    <a href="https://pt-br.facebook.com/"><img src="view/imagem/facebook.png" alt="facebook" title="Facebook"></a>
                    <a href="https://twitter.com/login?lang=pt" ><img src="view/imagem/twitter.png" alt="Twitter" title="Twitter" ></a>
                </div>
                <p>Baixe nosso aplicativo na playstore</p>
                <div class="playstore">
                    <img class="center" style="display:block;" src="view/imagem/googleplay.png">
                </div>
            </div>
        </div>
    </footer>
    <script>
        jQuery("#txtTelefone").mask("(99)9999-9999");
        jQuery("#txtCelular").mask("(99)99999-9999");
       
    </script>
</body>
</html>