<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Mob'Share-Home</title>
    <link rel="stylesheet" type="text/css" media="screen" href="view/css/termo_uso.css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script src="view/js/libs/jquery/jquery-3.3.1.js"></script>
    <script src="view/js/notify.js"></script>
    <script src="view/js/main.js"></script>
</head>
<body>
    <div id="principal">
        <header>
            <div id="imgPretaRgb">
                <nav class="cor_site_padrao">
                    <div id="segura_nav">
                        <div id="logo">
                            <img src="view/imagem/mob.png" alt="logo" title="logo">
                        </div>
                        <div class="segura_menu">
                            <ul>
                                <li><a href="?home">INÍCIO</a></li>
                                <li><a href="?melhores_anuncios">VEÍCULOS EM DESTAQUE</a></li>
                                <li><a href="?principais_anuncios">VEÍCULOS A VENDA</a></li>
                                <li><a href="?como_ganhar_dinheiro">GANHE DINHEIRO</a></li>
                                <li><a href="?parceiros">SEJA UM PARCEIRO</a></li>
                                <li><a href="?sobre">SOBRE NÓS</a></li>
                            </ul>
                        </div>

                        <div class="segura_login">
                            <div class="login_cadastro" id="login" style="width: 110px;">
                                <a href="javascript:getLogin()"><img src="view/imagem/login_amarelo.png" alt="login"><p>LOGIN</p></a>
                            </div>
                            <div class="login_cadastro" style="width: 160px;">
                                <a href="javascript:getCadastro()"><img src="view/imagem/downloads2/cadastrar.png" alt="login"><p>CADATRAR-SE</p></a>
                            </div>
                        </div>
                    </div>    
                </nav>
                <div class="caixa_texto_pages_all">
                    <h1 class="texto_primario_h1">Termos de uso</h1>
                    <p class="texto_secundario_p">Termos de uso da Mob'share</p>
                </div>
            </div>
        </header>
        <?php 

                require_once('controller/controllerTermos_uso.php');

                $controller_termos_uso = new ControllerTermos_uso();
                $pagina =  $controller_termos_uso->getPagina();

         ?>


         <?php if(!$pagina){ ?>

                    <img class='img_not_find' alt='Nada encontrado' src='view/imagem/magnify.gif'>
                    <p class='aviso_tabela'> Nenhum registro encontrado!</p>

        <?php  } elseif($pagina->getStatus() == 1 ){ ?>

            <section class="section_termos_uso">

                <div class="conteudo">
                    <div class="texto_termos">
                        <p><?=@$pagina->getTitulo()?></p>
                    </div>
                    <div class="termos">
                        <p><?=@$pagina->getTexto()?></p>
                    </div>
                </div>
            </section>

        <?php } else { ?>
              <script>
                $.notify(" Pagina desabilidada! Redirecionando para o inicio ","info")
                
                setTimeout(function(){
                    
                    //Redirecionando
                    window.location = "?home.php";

                },1600);

              </script>       
        <?php } ?>
    </div>
    <footer class="cor_site_padrao">
        <!--  Caixas que contem o contato e o navegar pelo site -->
        <div class="newsletter">
            <div class="logo_mob">
                <img src="view/imagem/mob.png" alt="logo">
            </div>
            <div class="segura_newsletter">
                <form id="frmEmail" onsubmit="email_marketing_enviar(this)" action="router.php?controller=EMAIL_MARKETING&modo=INSERIR" method="POST">
                    <h3>Quer receber noticias?</h3>
                    <input type="text" name="txtEmail" placeholder="Insira seu email" class="input_newsletter">
                    <button class="botao_newsletter">Enviar</button>
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
                        <a href="?cms/home_cms">Área administrativa</a> 
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
</body>
</html>