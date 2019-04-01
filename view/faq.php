<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Mob'Share-Home</title>
    <link rel="stylesheet" type="text/css" media="screen" href="css/faq.css"/>
    <script src="js/libs/jquery/jquery-3.3.1.js"></script>
    <script src="js/pages/faq.js"></script>
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
        <div id="principal">
            <div class="menu_faq">
                <div class="segura_item">
                    <div class="menu_item"><p>Duvidas</p></div>
                    <div class="menu_item"><p>Como anunciar</p></div>
                    <div class="menu_item"><p>Como criar conta</p></div>
                    <div class="menu_item"><p>Chat</p></div>
                    <div class="menu_item"><p>Moto</p></div>
                    <div class="menu_item"><p>Carro</p></div>
                </div>
            </div>
            <section class="conteudo_faq">
                
                <h2>FAQ</h2>
                <div id="conteudo">
                    
                    <div class="texto_faq">
                        <p>Lorem ipsum dolor sit amet, consectetur 
                            adipiscing elit. Nunc maximus, nulla ut 
                            commodo sagittis, sapien dui mattis dui, 
                            non pulvinar lorem felis nec erat
                            Lorem ipsum dolor sit amet, consectetur 
                            adipiscing elit. Nunc maximus, nulla ut 
                            commodo sagittis, sapien dui mattis dui, 
                            non pulvinar lorem felis nec erat
                            Lorem ipsum dolor sit amet, consectetur 
                            adipiscing elit. Nunc maximus, nulla ut 
                            commodo sagittis, sapien dui mattis dui, 
                            non pulvinar lorem felis nec erat
                            Lorem ipsum dolor sit amet, consectetur 
                            adipiscing elit. Nunc maximus, nulla ut 
                            commodo sagittis, sapien dui mattis dui, 
                            non pulvinar lorem felis nec erat
                            Lorem ipsum dolor sit amet, consectetur 
                            adipiscing elit. Nunc maximus, nulla ut 
                            commodo sagittis, sapien dui mattis dui, 
                            non pulvinar lorem felis nec erat
                            Lorem ipsum dolor sit amet, consectetur 
                            adipiscing elit. Nunc maximus, nulla ut 
                            commodo sagittis, sapien dui mattis dui, 
                            non pulvinar lorem felis nec erat
                        </p>
                    </div>
                    
                    <div class="caixa_faq">
                        <div class="titulos_perguntas">
                            <h2 class="perguntas_frequentes">As perguntas mais frequentes</h2>
                        </div>
                        <div class="linha_perguntas">
                            <div class="segura_perguntas">
                                <h3>Pergntas sobre carros</h3>
                                <p>Respostas: Lorem ipsum dolor sit amet, consectetur 
                                adipiscing elit. Nunc maximus, nulla ut 
                                commodo sagittis, sapien dui mattis dui, 
                                non pulvinar lorem felis nec erat
                                Lorem ipsum dolor sit amet, consectetur 
                                adipiscing elit. Nunc maximus, nulla ut </p>
                            </div>
                            <img src="imagem/icones/seta_preta.png" alt="seta" onclick="mostrar_mais()">
                        </div>
                        <div class="linha_perguntas">
                            <div class="segura_perguntas">
                                <h3>Pergntas sobre carros</h3>
                                <p>Respostas: Lorem ipsum dolor sit amet, consectetur 
                                adipiscing elit. Nunc maximus, nulla ut 
                                commodo sagittis, sapien dui mattis dui, 
                                non pulvinar lorem felis nec erat
                                Lorem ipsum dolor sit amet, consectetur 
                                adipiscing elit. Nunc maximus, nulla ut </p>
                            </div>
                            <img src="imagem/icones/seta_preta.png" alt="seta">
                        </div>
                        <div class="linha_perguntas">
                            <div class="segura_perguntas">
                                <h3>Pergntas sobre carros</h3>
                                <p>Respostas: Lorem ipsum dolor sit amet, consectetur 
                                adipiscing elit. Nunc maximus, nulla ut 
                                commodo sagittis, sapien dui mattis dui, 
                                non pulvinar lorem felis nec erat
                                Lorem ipsum dolor sit amet, consectetur 
                                adipiscing elit. Nunc maximus, nulla ut </p>
                            </div>
                            <img src="imagem/icones/seta_preta.png" alt="seta">
                        </div>
                        <div class="linha_perguntas">
                            <div class="segura_perguntas">
                                <h3>Pergntas sobre carros</h3>
                                <p>Respostas: Lorem ipsum dolor sit amet, consectetur 
                                adipiscing elit. Nunc maximus, nulla ut 
                                commodo sagittis, sapien dui mattis dui, 
                                non pulvinar lorem felis nec erat
                                Lorem ipsum dolor sit amet, consectetur 
                                adipiscing elit. Nunc maximus, nulla ut </p>
                            </div>
                            <img src="imagem/icones/seta_preta.png" alt="seta">
                        </div>
                        <div class="linha_perguntas ">
                            <div class="segura_perguntas">
                                <h3>Pergntas sobre carros</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur 
                                adipiscing elit. Nunc maximus, nulla ut 
                                commodo sagittis, sapien dui mattis dui, 
                                non pulvinar lorem felis nec erat
                                Lorem ipsum dolor sit amet, consectetur 
                                adipiscing elit. Nunc maximus, nulla ut </p>
                            </div>
                            <img src="imagem/icones/seta_preta.png" alt="seta">
                        </div>
                        
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
            <?php require_once('footer.php')?>
        </footer>
    </body>
</html>