<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Mob'Share-Home</title>
    <link rel="stylesheet" type="text/css" media="screen" href="view/css/faq.css"/>
    <script src="view/js/libs/jquery/jquery-3.3.1.js"></script>
    <script src="view/js/notify.js"></script>
    <script src="view/js/main.js"></script>
    <script src="view/js/faq.js"></script>
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
                            <div class="login_cadastro" style="width: 110px;">
                                <a href="javascript:getLogin()"><img src="view/imagem/login_amarelo.png" alt="login"><p>LOGIN</p></a>
                            </div>
                            <div class="login_cadastro" style="width: 160px;">
                                <a href="javascript:getCadastro()"><img src="view/imagem/downloads2/cadastrar.png" alt="login"><p>CADATRAR-SE</p></a>
                            </div>
                        </div>
                    </div>    
                </nav>
                <div class="caixa_texto_pages_all">
                    <h1 class="texto_primario_h1">F.A.Q</h1>
                    <p class="texto_secundario_p">Dúvidas frequetes</p>
                </div>
            </div>
        </header>
        <div id="principal">
            <section class="conteudo_faq">
                <div id="conteudo">                    
                    <div class="caixa_faq">
                        <div class="titulos_perguntas">
                            <h2 class="perguntas_frequentes">As perguntas mais frequentes</h2>
                        </div>
                         <?php 
                            require_once('controller/controllerFaq.php');

                                $controller_faq = new ControllerFaq();

                                $listFaq =  $controller_faq->listar_faq();


                                if(count($listFaq) < 1){
                                  echo "<img style='width: 279px; display: block; margin-left: auto; margin-right: auto; margin-top: 13px;' class='img_not_find' alt='Nada encontrado' src='view/imagem/magnify.gif'>";
                                  echo " <p style='text-align: center;' class='aviso_tabela'> Nenhum registro encontrado!</p> ";
                                }
                                $acc = 0 ;
                            ?>
                        <?php foreach($listFaq as $registro){ ?>
                                <?php if($registro->getStatus() == 1){ ?>
                                    <div class="linha_perguntas ">
                                        <div class="segura_perguntas">
                                            <h3><?=@$registro->getPerguntas()?></h3>
                                            <p>Resposta:&nbsp<?=@$registro->getRespostas()?></p>
                                        </div>
                                        <img src="view/imagem/arrow_down.png" onclick="ver_resposta_completa(this)" id="seta" alt="seta">
                                    </div>
                                <?php }else{ 
                                        $acc++;
                                      }?>
                        <?php } ?>
                        <?php if(count($listFaq) == $acc){ ?>
                                <script>
                                    setTimeout(function(){
                                        $(".caixa_faq").notify(
                                          "Sem dados!", 
                                          { position:"top" }
                                        );    
                                    },400);
                                    
                                </script>
                        <?php } ?>
                    </div>
                    <div class="paginacao">
                        <div class="paginacao_item"><p>Prev</p></div>
                        <div class="paginacao_item"><p>1</p></div>
                        <div class="paginacao_item"><p>2</p></div>
                        <div class="paginacao_item"><p>3</p></div>
                        <div class="paginacao_item"><p>4</p></div>
                        <div class="paginacao_item"><p>5</p></div>
                        <div class="paginacao_item"><p>6</p></div>
                        <div class="paginacao_item"><p>7</p></div>
                        <div class="paginacao_item"><p>8</p></div>
                        <div class="paginacao_item"><p>9</p></div>
                        <div class="paginacao_item"><p>Next</p></div>
                    </div>
                </div>
                
            </section>  
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
    </div>
</body>
</html>