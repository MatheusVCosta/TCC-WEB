<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Mob'Share-Home</title>
    <link rel="stylesheet" type="text/css" media="screen" href="css/termo_uso.css"/>
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
        <section class="section_termos_uso">
            <h2>Termos de uso</h2>
            <div class="conteudo">
                <div class="texto_termos">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc maximus, nulla ut commodo sagittis, sapien dui mattis dui, non pulvinar lorem felis nec erat
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc maximus, nulla ut commodo sagittis, sapien dui mattis dui, non pulvinar lorem felis nec erat
                    Lorem ipsu</p>
                </div>
                <div class="termos">
                    
                </div>
            </div>
        </section>
    </div>
    <footer class="cor_site_padrao">
        <?php require_once('footer.php')?>
    </footer>
</body>
</html>