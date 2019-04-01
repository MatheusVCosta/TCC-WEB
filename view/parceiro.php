<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Mob'Share-Home</title>
    <link rel="stylesheet" type="text/css" media="screen" href="css/parceiro.css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script src="js/libs/jquery/jquery-3.3.1.js"></script>
</head>
<body>
    <div id="principal">
        <header>
            <nav class="cor_site_padrao">
                <div id="segura_nav">
                    <div id="logo">
                        <img src="imagem/mob.png" alt="logo" title="logo">
                    </div>

                    <div class="segura_menu">
                        <ul>
                            <li><a href="../index.php">Home</a></li>
                            <li><a href="melhores_anuncios.php">Destaques</a></li>
                            <li><a href="principais_anuncios.php">Veículos a venda</a></li>
                            <li><a href="tabela_valor.php">Tabela de preços</a></li>
                            <li><a href="como_ganhar_dinheiro.php">Como ganhar dinheiro</a></li>
                            <li class="menu_mais">
                                <a href="#">Mais <span class="seta-baixo"></span></a>
                                <ul class="sub_menu"> 
                                    <li style="border-radius:0px 10px 0px 0px;"><a href="parceiros.php">Parceiros</a></li> 
                                    <li><a href="sobre.php">Sobre</a></li> 
                                    <li><a href="faq.php">F.A.Q</a></li> 
                                    <li style="border-radius:0px 0px 10px 10px;"><a href="termos_uso.php">Termos de uso</a></li>
                                </ul> 
                            </li>
                        </ul>
                    </div>
                    
                    <div class="segura_login">
                        <input type="button" name="btmLogin" id="btnLogin" class="cor_detalhe_site_padrao" value="Login">
                        <input type="button" name="btmCadastro" id="btnCadastro" value="Cadastra-se" class="cor_detalhe_site_padrao">
                    </div>
                </div>    
            </nav>

            <div class="texto_chamativo">
                <p class="texto_primario">Ganhar dinheiro <span style="color:#306b2c;">compartilhando</span> seu veículo nunca foi tão fácil</p>
                <p class="texto_secundario">O que acha de anúnciar ele AGORA!</p>
                <div class="btn_anunciar">
                    <a href="#">Anuncie-já!</a>
                </div>
            </div>
        </header>
        <div id="conteudo">

             <div class="row" style=" height: 360px;">
                <div class="cold4 esquerda">
                    <img src="imagem/bg-parceiros.jpg" style="height: 355px; width:100%;">
                </div>
                <div class="cold2 center" style="width: 29%;">
                    <div class="esquerda border-left"></div>
                    <div id="seja-parceiro" class="center" style="margin-top: 15px;">
                        <p>Lorem ipsum dolor sit amet, consectetur adi,suada nibh. Quisque placerat faucibus erat a sodales. Suspendisse condimentum vehicula dolor eu dapibus</p> 
                        <button>Quero ser um Parceiro</button>
                        <p>Lorem ipsum dolor sit amet, consectetur adi,suada nibh. Quisque placerat faucibus erat a sodales. Suspendisse condimentum vehicula dolor eu dapibus</p> 
                        <img src="imagem/selo4.png" alt="sdssd" width="92">
                    </div>
                    <div class="direita border-right"></div>
                </div>
                <div class="cold4 direita">
                    <img src="imagem/bg-usuario.jpg"  style="height: 355px; width:100%;">
                </div>

             </div>
             <div role="banner">
                <link rel="stylesheet" href="js/libs/Blink_Slider/css/blink.css">
                <script src="js/libs/Blink_Slider/js/jquery.blink.js"></script>
                <section class="blink-slider" style="    overflow: hidden;    color: black;">
                    <div class="blink-view" id="blink">
                      <div class="viewSlide">
                        <div class="painel" style="background-image:url('imagem/slider1.png');">
                            <div class="desc">
                                <h2> Novos Parceiros </h2>
                                <p> lorem ipsum sdasdsads  s asdsawssa ass dsa s</p>
                                <div class="row">
                                    <img src="imagem/comodo.png">
                                    <img src="imagem/ss.png">
                                    <img src="imagem/7ca63168605753eeecf23cd61c614de5.png">
                                </div>
                            </div>
                        </div>

                        <!--<img class="fullImg" src="imagem/slider1.png" style="    height: 562px;"/>-->
                    </div>
                        <div class="viewSlide">
                            <div class="painel" style="background-image:url('imagem/slider3.jpg');">
                                <div class="desc">
                                    <h2> Programa de Parceria </h2>
                                    <p>lorem ipsum sdasdsads  s asdsawssa ass dsa s</p>
                                    <div class="row">
                                        <img src="imagem/1c048d6612d553e8b4b1bda8502b6c3a.png">
                                        <img src="imagem/46b0e33418abc420e5c11690d44edaf6.png">
                                        <img src="imagem/7ca63168605753eeecf23cd61c614de5.png">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="blink-control" id="blink-control">

                    </div>
                </section>
                <script type="text/javascript">
                    $(document).ready(function(){
                        $("#blink").blink();
                    });
                </script>
             </div>
             <div id="beficiosBox" class="center">
                 <div class="row center">
                    <div class="cold3 center">
                        <div class="beneficio center">
                            <div class="img center">
                                <img src="imagem/family.jpg">
                            </div>
                            <div class="titulo">Ferias</div>
                            <div class="desc">
                                lorem ipsum lacus vehicula faucibus tristique molestie mi, commodo 
                            </div>
                        </div>
                    </div>
                    <div class="cold3 center">
                        <div class="beneficio center">
                            <div class="img center">
                                <img src="imagem/people-car2.jpg">
                            </div>
                            <div class="titulo">Seus Funcionarios</div>
                            <div class="desc">
                                lorem ipsum lacus vehicula faucibus tristique molestie mi, commodo 
                            </div>
                        </div>
                    </div>
                    <div class="cold3 center">
                        <div class="beneficio center">
                            <div class="img center">
                                <img src="imagem/people-car.jpg">
                            </div>
                            <div class="titulo"> Descontos </div>
                            <div class="desc">
                                lorem ipsum lacus vehicula faucibus tristique molestie mi, commodo 
                            </div>
                        </div>
                    </div>
                 </div>
                 <div class="row center">
                    <div class="cold3 center">
                        <div class="beneficio center">
                            <div class="img center">
                                <img src="imagem/people-car3.jpg">
                            </div>
                            <div class="titulo"> Só o melhor </div>
                            <div class="desc">
                                lorem ipsum lacus vehicula faucibus tristique molestie mi, commodo 
                            </div>
                        </div>
                    </div>
                    <div class="cold3 center">
                        <div class="beneficio center">
                            <div class="img center">
                                <img src="imagem/people-car4.jpg">
                            </div>
                            <div class="titulo">Impressione Clientes</div>
                            <div class="desc">
                                lorem ipsum lacus vehicula faucibus tristique molestie mi, commodo 
                            </div>
                        </div>
                    </div>
                    <div class="cold3 center">
                        <div class="beneficio center">
                            <div class="img center">
                                <img src="imagem/people-car5.jpg">
                            </div>
                            <div class="titulo"> Locomoção definitiva </div>
                            <div class="desc">
                                lorem ipsum lacus vehicula faucibus tristique molestie mi, commodo 
                            </div>
                        </div>
                    </div>
                 </div>
             </div>
        </div>
    </div>
    <footer class="cor_site_padrao">
        <?php require_once('footer.php')?>
    </footer>
    </body>
</html>