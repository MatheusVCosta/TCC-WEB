<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Sobre</title>
        <link rel="stylesheet" type="text/css" href="css/sobre.css">
    </head>
    <body>
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
        <div id="main">
            <section>
                <h1 id="titulo">Sobre a empresa</h1>
                <div id="sobreEmpresaImgText">
                    <div id="textSobreEmpresa">
                        <h2>Titulo</h2>
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. 
                        </p>  
                    </div>
                    <div id="imgEmpresa"> 
                        <img src="imagem/29.jpg" alt="29"> 
                    </div>
                </div>
            </section>
            <div id="banner">
                 <div id="conteudo_banner">
                     <div id="caixa_banner">
                     </div>
                     <div id="texto_banner">
                         Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                     </div>
                </div>
            </div>
            <section>
                <div class="imgTextMVV">
                    <h2> Missão</h2>
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                    </p>
                </div>
                <div class="imgTextMVV">
                    <h2> Visão</h2>
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                    </p>
                </div>
                <div class="imgTextMVV">
                    <h2> Valores</h2>
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                        Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                    </p>
                </div>
            </section>
        </div>
        <footer class="cor_site_padrao">
            <?php require_once('footer.php')?>
        </footer>
    </body> 
</html>