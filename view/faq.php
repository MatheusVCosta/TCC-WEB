<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Mob'Share-Home</title>
    <link rel="stylesheet" type="text/css" media="screen" href="css/faq.css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
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
                            <li><a href="tabela_valor.php">Veículos a venda</a></li>
                            <li><a href="sobre.php">Tabela de preços</a></li>
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
            <div  id="faq-painel-topicos" class="row">
                <button> Carros </button>
                <button> Locações </button>
                <button> Usuários </button>
                <button> Valores </button>
            </div>
             <div id="faq-painel-perguntas">
                <div class="pergunta">
                    <div class="cold8 desc">
                        <h2> Pergunta sobre carros</h2>
                        <p> Inicio da resposta</p>
                    </div>
                    <div class="cold2 scroll">
                        <img src="imagem/arrow_down.png" width="32">
                        <!--<i class="fas fa-chevron-down"></i>-->
                    </div>
                </div>
                <div class="pergunta">
                    <div class="cold8 desc">
                        <h2> Pergunta Locações</h2>
                        <p> Inicio da resposta</p>
                    </div>
                    <div class="cold2 scroll">
                        <img src="imagem/arrow_down.png" width="32">
                        <!--<i class="fas fa-chevron-down"></i>-->
                    </div>
                </div>
                <div class="pergunta">
                    <div class="cold8 desc">
                        <h2> Pergunta valores</h2>
                        <p> Inicio da resposta</p>
                    </div>
                    <div class="cold2 scroll">
                        <img src="imagem/arrow_down.png" width="32">
                        <!--<i class="fas fa-chevron-down"></i>-->
                    </div>
                </div>
             </div>
             <div class="row">
                <div class="cold7 center" id="faq-painel-paginete">
                    <div class="btn"><i class="fas fa-chevron-left"></i></div>
                    <div class="cold3">
                        <div class="btn">1</div>
                        <div class="btn">2</div>
                        <div class="btn">3</div>
                        <div class="btn">4</div>
                        <div class="btn">5</div>
                    </div>
                    <div class="btn"><i class="fas fa-chevron-right"></i></div>
                <div>
             </div>
        </div>
        <footer class="row">
            <!--  Caixas que contem o contato e o navegar pelo site -->
            <div class="row borda_embaixo">
                <div class="cold4 esquerda logo">
                  <img src="imagem/faveicon.png" alt="logo" height="100px" width="100px">
                </div>
                <div class="cold4 direita">
                  <form id="frmEmail">
                    <div class="row"><p>Quer receber noticias</p></div>
                    <div class="row">
                         <input type="text" placeholder="Insira seu email" class="cold7 esquerda">
                         <button class="cold2 esquerda">Enviar</button>
                    </div>
                  </form>
                </div>
            </div>
            <div class="row" style="padding-top:15px;">
                <div class="cold7 esquerda" data-style="caixa-contatos">
                    <div class="cold4 esquerda">
                        <h3> Quer entrar em contato? </h3>
                        <p><strong>Telefone</strong>: 0800 755 855</p>
                        <p><strong>E-mail</strong>: atendimento@mobshare.com.br</p>
                    </div>
                    <div class="cold7 esquerda" data-style="naveguesite">
                        <h3> Navegue pelo site </h3>
                        <div class="cold4">Melhores avaliações</div><div class="cold4">Termos de uso</div>
                        <div class="cold4">Principais anúncio</div><div class="cold4">Tutorial</div>
                        <div class="cold4">Tabela de Preço</div><div class="cold4">Detalhe dos valores</div>
                        <div class="cold4">Sobre a empresa</div><div class="cold4">F.A.Q</div>
                        <div class="cold4">Seja um parceio</div><div class="cold4">Acesse a áreas administrativa</div>
                    </div>
                </div>
                <!--  Caixas das redes sociais  -->
                <div class="cold3 direita" data-style="caixa-redes">
                    <div class="row"><p>Siga nós nas redes</p></div>
                        <div class="row" style="text-align: center;">
                        <i class="fab fa-facebook"></i>
                        <i class="fab fa-instagram"></i>
                        <i class="fab fa-twitter-square"></i>
                        <i class="fab fa-google-plus-square"></i>
                    </div>
                    <div class="row"><p>Baixe nosso aplicativo na playstore</p></div>
                    <div class="row">
                        <img class="center" style="display:block;" src="imagem/googleplay.png" width="128">
                    </div>
                </div>
            </div>
        </footer>
</body>
</html>