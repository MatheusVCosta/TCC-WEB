<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Mob'Share-Home</title>
    <link rel="stylesheet" type="text/css" media="screen" href="view/css/home.css"/>
    <script src="view/js/libs/jquery/jquery-3.3.1.js"></script>
    <script src="view/js/pages/script_home.js"></script>
</head>
<body>
    <div id="principal">
        <header >
            <!-- <img src="imagem/fundo.jpg" alt="" title="">  -->
            <nav class="cor_site_padrao">
                <div id="segura_nav">
                    <div id="logo">
                        <img src="view/imagem/mob.png" alt="logo" title="logo">
                    </div>

                    <div class="segura_menu">
                        <ul>
                            <li><a href="home.php">Home</a></li>
                            <li><a href="view/melhores_anuncios.php">Destaques</a></li>
                            <li><a href="view/principais_anuncios.php">Veículos a venda</a></li>
                            <li><a href="view/tabela_valor.php">Tabela de preços</a></li>
                            <li><a href="view/como_ganhar_dinheiro.php">Como ganhar dinheiro</a></li>
                            <li class="menu_mais">
                                <a href="#">Mais <span class="seta-baixo"></span></a>
                                <ul class="sub_menu"> 
                                    <li style="border-radius:0px 10px 0px 0px;"><a href="view/parceiro.php">Parceiros</a></li> 
                                    <li><a href="view/sobre.php">Sobre</a></li> 
                                    <li><a href="view/faq.php">F.A.Q</a></li> 
                                    <li style="border-radius:0px 0px 10px 10px;"><a href="view/termos_uso.php">Termos de uso</a></li>
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
             <div class="fundo_site_top">
                <section class="section_anuncios">

                    <div class="menu_home">
                        <div class="menu_central">
                            <ul>
                                <li><a class="click" href="#porque_anunciar">Por que anúnciar?</a></li>
                                <li><a class="click" href="#como_funciona">Como funciona?</a></li>
                                <li><a class="click" href="#tipo_veiculos">O que pode ser alugador?</a></li>
                                <li><a class="click" href="#destaques">Destaques</a></li>
                                <li><a class="click" href="#anuncie_veiculo">Anuncie seu veículo</a></li>
                                <li><a class="click" href="#fale_conosco">Fale conosco</a></li>
                            </ul>
                        </div>
                    </div>

                    <div id="div_anuncio" id="porque_anunciar">
                        <h2 class="titulo_section font_white" style="margin-top:50px;">Por que anúnciar seu veículo?</h2>
                        <div class="alugar_veiculo">
                            <div class="imagem_alugar_veiculo">
                                <img  src="view/imagem/home/teste1.png" alt="" title=""> 
                            </div>
                            <div class="area_texto">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc maximus, nulla ut commodo sagittis, sapien dui mattis dui, non pulvinar lorem felis nec erat Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc maximus, nulla ut commodo sagittis, sapien dui mattis dui, non pulvinar lorem felis nec erat Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc maximus, nulla ut commodo sagittis, sapien dui mattis dui, non pulvinar lorem felis nec erat
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc maximus, nulla ut commodo 
                                </p>
                            </div>
                           
                        </div>
                    </div>
                </section>
                <section class="section_conteudo">
                    <div class="como_funciona" id="como_funciona">
                        <h2 class="titulo_section font_white" style="margin-top:50px;">Como funciona?</h2>

                        <div id="segura_como_funciona">
                            <div class="area_texto_maior">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc maximus, nulla ut commodo sagittis, sapien dui mattis dui, non pulvinar lorem felis nec erat
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc maximus, nulla ut commodo sagittis, sapien dui mattis dui, non pulvinar lorem felis nec erat
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc maximus, nulla ut commodo sagittis, sapien dui mattis dui, non pulvinar lorem felis nec erat
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc maximus, nulla ut commodo sagittis, sapien dui mattis dui, non pulvinar lorem felis nec erat
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc maximus, nulla ut commodo sagittis, sapien dui mattis dui, non pulvinar lorem felis nec erat
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc maximus, nulla ut commodo sagittis, sapien dui mattis dui, non pulvinar lorem felis nec erat
                                   
                                </p>
                            </div >
                            <img class="imagem_como_funciona" src="view/imagem/home/carr.jpg" alt="" title="">   
                        </div>
                    </div>
                </section>
            </div>
            <section class="section_conteudo fundo_white" style="height:710px;" id="tipo_veiculos">
                <h2 class="titulo_section font_green" style="font-size:50px; margin-top:100px;">O que pode ser alugador?</h2>
                <div class="area_tipo_veiculo" >
                    <div class="tipos_veiculos">

                        <a href="#"><img class="imagem_tipo" src="view/imagem/home/bike.png"></a>
                        <h3>Bicicletas</h3>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc maximus, nulla ut commodo sagittis, sapien dui mattis dui, non pulvinar lorem felis nec erat
                        </p>
                    </div>
                    <div class="tipos_veiculos">
                        <a href="#"><img class="imagem_tipo"  src="view/imagem/home/moto.png"></a>   
                        <h3>Motos</h3>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc maximus, nulla ut commodo sagittis, sapien dui mattis dui, non pulvinar lorem felis nec erat
                        </p>     
                    </div>
                    <div class="tipos_veiculos">
                        <a href="#"><img class="imagem_tipo" src="view/imagem/home/car.png"></a>
                        <h3>Carros</h3>
                        <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc maximus, nulla ut commodo sagittis, sapien dui mattis dui, non pulvinar lorem felis nec erat
                            
                        </p>
                    </div>
                
            </section>
            
            <section class="section_conteudo_anuncios" id="destaques">
                <div id="area_anuncios">
                <h2 class="titulo_left font_green">Veja os destaques dessa semana</h2>
                    <div id="explicao_como_alugar">

                        <h3>Dica para os locadores</h3>
                        <p> 
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
                            Lorem ipsum dolor sit amet, consectetur 
                            adipiscing elit. Nunc maximus, nulla ut 
                            commodo sagittis, sapien dui mattis dui, 
                            non pulvinar lorem felis nec erat
                        </p>
                        <!-- <form>
                            <div class="combo_box">
                                <label>Tipo de veículo</label><br>
                                <select>
                                    <option>Tipo de veiculo</option>
                                </select>
                            </div>
                            <div class="combo_box">
                                <label>Modelo</label><br>
                                <select>
                                    <option>Selecione o modelo</option>
                                </select>
                            </div>
                            <div class="combo_box">
                                <label>Marca</label><br>
                                <select>
                                    <option>Selecione a marca</option>
                                </select>
                            </div>
                            <div class="combo_box">
                                <input type="button" class="btn_filtro" value="Filtrar">
                            </div>
                        </form> -->
                    </div>
                    
                    <div id="segura_anuncios">
                        <a href="#">
                            <div class="anuncios">
                                    <img class="img_anuncio" src="view/imagem/home/palio.jpg" alt="Nome veiculo" title="Nome veiculo">
                                <div class="info_anuncio">
                                    <p class="nome_veiculo">R$ 30,00/hora</p>

                                    <p class="info_veiculo" style="margin-top:10px;">Fiat Palio 4 portas</p>
                                    <p class="info_veiculo">2018 | 3000 Km</p>
                                    <p class="info_veiculo" >Matheus Vieira | São Paulo-SP</p>
                                    
                                    <div class="stars_avaliacao">
                                        <img src="view/imagem/icones/star1.png" alt="star">
                                        <img class="star_left" src="view/imagem/icones/star1.png" alt="star">
                                        <img class="star_left" src="view/imagem/icones/star1.png" alt="star">
                                        <img class="star_left" src="view/imagem/icones/star1.png" alt="star">
                                        <img class="star_left" src="view/imagem/icones/star1.png" alt="star">
                                        <p class="percentual_avaliacao">4.5%</p>
                                    </div>
                                    
                                </div>
                            </div>
                        </a>
                        <a href="#">
                            <div class="anuncios">
                                <img class="img_anuncio" src="view/imagem/home/i30.jpg" alt="Nome veiculo" title="Nome veiculo">
                                <div class="info_anuncio">
                                    <p class="nome_veiculo">R$ 30,00/hora</p>

                                    <p class="info_veiculo" style="margin-top:10px;">Hyundai i30</p>
                                    <p class="info_veiculo">2018 | 3000 Km</p>
                                    <p class="info_veiculo" >Matheus Vieira | São Paulo-SP</p>
                                    
                                    <div class="stars_avaliacao">
                                        <img src="view/imagem/icones/star1.png" alt="star">
                                        <img class="star_left" src="view/imagem/icones/star1.png" alt="star">
                                        <img class="star_left" src="view/imagem/icones/star1.png" alt="star">
                                        <img class="star_left" src="view/imagem/icones/star1.png" alt="star">
                                        <img class="star_left" src="view/imagem/icones/star1.png" alt="star">
                                        <p class="percentual_avaliacao">4.5%</p>
                                    </div>
                                    
                                </div>
                            </div>
                        </a>
                        <a href="#">
                            <div class="anuncios">
                                <img class="img_anuncio" src="view/imagem/home/hb20.jpg" alt="Nome veiculo" title="Nome veiculo">
                                <div class="info_anuncio">
                                    <p class="nome_veiculo">R$ 30,00/hora</p>

                                    <p class="info_veiculo" style="margin-top:10px;">Hyundai hb20</p>
                                    <p class="info_veiculo">2018 | 3000 Km</p>
                                    <p class="info_veiculo" >Matheus Vieira | São Paulo-SP</p>
                                    
                                    <div class="stars_avaliacao">
                                        <img src="view/imagem/icones/star1.png" alt="star">
                                        <img class="star_left" src="view/imagem/icones/star1.png" alt="star">
                                        <img class="star_left" src="view/imagem/icones/star1.png" alt="star">
                                        <img class="star_left" src="view/imagem/icones/star1.png" alt="star">
                                        <img class="star_left" src="view/imagem/icones/star1.png" alt="star">
                                        <p class="percentual_avaliacao">4.5%</p>
                                    </div>
                                    
                                </div>
                            </div>
                        </a>
                        <a href="#">
                            <div class="anuncios">
                                <img class="img_anuncio" src="view/imagem/home/gol.jpg" alt="Nome veiculo" title="Nome veiculo">
                                <div class="info_anuncio">
                                    <p class="nome_veiculo">R$ 30,00/hora</p>

                                    <p class="info_veiculo" style="margin-top:10px;">Volkswagem Gol</p>
                                    <p class="info_veiculo">2018 | 3000 Km</p>
                                    <p class="info_veiculo" >Matheus Vieira | São Paulo-SP</p>
                                    
                                    <div class="stars_avaliacao">
                                        <img src="view/imagem/icones/star1.png" alt="star">
                                        <img class="star_left" src="view/imagem/icones/star1.png" alt="star">
                                        <img class="star_left" src="view/imagem/icones/star1.png" alt="star">
                                        <img class="star_left" src="view/imagem/icones/star1.png" alt="star">
                                        <img class="star_left" src="view/imagem/icones/star1.png" alt="star">
                                        <p class="percentual_avaliacao">4.5%</p>
                                    </div>
                                    
                                </div>
                            </div>
                        </a>
                        <a href="#">
                            <div class="anuncios">
                                <img class="img_anuncio" src="view/imagem/home/Bicicleta.jpg" alt="Nome veiculo" title="Nome veiculo">
                                <div class="info_anuncio">
                                    <p class="nome_veiculo">R$ 30,00/hora</p>

                                    <p class="info_veiculo" style="margin-top:10px;">HUPI Whistler</p>
                                    <p class="info_veiculo">2018 | 3000 Km</p>
                                    <p class="info_veiculo" >Matheus Vieira | São Paulo-SP</p>
                                    
                                    <div class="stars_avaliacao">
                                        <img src="view/imagem/icones/star1.png" alt="star">
                                        <img class="star_left" src="view/imagem/icones/star1.png" alt="star">
                                        <img class="star_left" src="view/imagem/icones/star1.png" alt="star">
                                        <img class="star_left" src="view/imagem/icones/star1.png" alt="star">
                                        <img class="star_left" src="view/imagem/icones/star1.png" alt="star">
                                        <p class="percentual_avaliacao">4.5%</p>
                                    </div>
                                    
                                </div>
                            </div>
                        </a>
                        <a href="#">
                            <div class="anuncios">
                                <img class="img_anuncio" src="view/imagem/home/xj9.jpg" alt="Nome veiculo" title="Nome veiculo">
                                <div class="info_anuncio">
                                    <p class="nome_veiculo">R$ 30,00/hora</p>

                                    <p class="info_veiculo" style="margin-top:10px;">Yamaha Xj6</p>
                                    <p class="info_veiculo">2018 | 3000 Km</p>
                                    <p class="info_veiculo" >Matheus Vieira | São Paulo-SP</p>
                                    
                                    <div class="stars_avaliacao">
                                        <img src="view/imagem/icones/star1.png" alt="star">
                                        <img class="star_left" src="view/imagem/icones/star1.png" alt="star">
                                        <img class="star_left" src="view/imagem/icones/star1.png" alt="star">
                                        <img class="star_left" src="view/imagem/icones/star1.png" alt="star">
                                        <img class="star_left" src="view/imagem/icones/star1.png" alt="star">
                                        <p class="percentual_avaliacao">4.5%</p>
                                    </div>
                                    
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </section>
            <section class="section_anunciar fundo_white" id="anuncie_veiculo">
                <div id="segura_conteudo">
                    <h2 class="titulo_left font_green">Quer anúnciar seu veículo?</h2>
                    <div class="anunciar_veiculo">
                        <h2>Siga os passos abaixo e anuncie seu veículo!</h2>
                        
                        <div class="div_passos">
                            <div class="bolinha_passos">
                                <p class="numero_bolinhas">1</p>
                            </div>
                            <div class="texto_passos">
                                <h3 >Crie uma conta hoje é GRÁTIS!</h3>
                                <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc maximus, nulla ut commodo sagittis, sapien dui mattis dui, non pulvinar lorem felis nec erat
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc maximus, nulla ut commodo sagittis, sapien dui mattis dui, non pulvinar lorem felis nec erat
                                Lore
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc maximus, nulla ut commodo sagittis, sapien dui mattis dui, non pulvinar lorem felis nec erat
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc maximus, nulla ut commodo sagittis, sapien dui mattis dui, non pulvinar lorem felis nec erat
                                LoreLorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc maximus, nulla ut commodo sagittis, sapien dui mattis dui, non pulvinar lorem felis nec erat
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc maximus, nulla ut commodo sagittis, sapien dui mattis dui, non pulvinar lorem felis nec erat
                                Lore
                                </p>
                            </div>
                            <div class="img_bolinha">
                                <img src="view/imagem/home/i.jpg"> 
                            </div>
                        </div>
                        <div class="div_passos">
                            <div class="img_bolinha">
                                <img src="view/imagem/home/i.jpg"> 
                            </div>
                            <div class="texto_passos">
                                <h3 style="margin-left: 400px;">Cadastre seu veículo</h3>
                                <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc maximus, nulla ut commodo sagittis, sapien dui mattis dui, non pulvinar lorem felis nec erat
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc maximus, nulla ut commodo sagittis, sapien dui mattis dui, non pulvinar lorem felis nec erat
                                Lore</p>
                            </div>
                            <div class="bolinha_passos">
                                <p class="numero_bolinhas">2</p>
                            </div>
                        </div>
                        <div class="div_passos">
                            <div class="bolinha_passos">
                                <p class="numero_bolinhas">3</p>
                            </div>
                            <div class="texto_passos">
                                <h3 >Agora crie seu anúncio!</h3>
                                <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc maximus, nulla ut commodo sagittis, sapien dui mattis dui, non pulvinar lorem felis nec erat
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc maximus, nulla ut commodo sagittis, sapien dui mattis dui, non pulvinar lorem felis nec erat
                                Lore</p>
                            </div>
                            <div class="img_bolinha">
                                <img src="view/imagem/home/i.jpg"> 
                            </div>
                        </div>
                        <div class="div_passos">
                            <div class="img_bolinha">
                                <img src="view/imagem/home/i.jpg">  
                            </div>
                            <div class="texto_passos">
                                <h3 style="margin-left: 170px;">Aguarde contato e feche negócio com alguém!</h3>
                                <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc maximus, nulla ut commodo sagittis, sapien dui mattis dui, non pulvinar lorem felis nec erat
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc maximus, nulla ut commodo sagittis, sapien dui mattis dui, non pulvinar lorem felis nec erat
                                Lore</p>
                            </div>
                            <div class="bolinha_passos">
                                <p class="numero_bolinhas">4</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="section_fale_conosco" id="fale_conosco">
                <h2>Fale conosco</h2>
                <div class="fale_conosco">
                    <form name="formFaleConosco" action="" method="POST">
                        <div class="formulario">
                            <div class="input_form">
                                <input type="text" name="txtNome" placeholder="Nome">
                            </div>
                            <div class="input_form">
                                <input type="text" name="txtNome" placeholder="E-mail" >
                            </div>
                            <div class="input_form">
                                <input type="text" name="txtNome" placeholder="Celular">
                            </div>
                            <div class="input_form">
                                <textarea style="height: 100px;" placeholder="Mensagem"></textarea>
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
            <form id="frmEmail">
                <h3>Quer receber noticias?</h3>
                <input type="text" placeholder="Insira seu email" class="input_newsletter">
                <button class="botao_newsletter">Enviar</button>
            </form>
        </div>
    </div>

    <div class="contatos">
        <div class="segura_mapa_contato">
            <div class="segura_contatos">
                <h3> Quer entrar em contato? </h3>
                <div id="telefone_email">
                    <p><strong>Telefone</strong>: 0800 755 855</p>
                    <p><strong>Telefone</strong>: 0800 755 855</p>
                    <p><strong>E-mail</strong>: atendimento@mobshare.com.br</p>
                </div>
            </div>
            <div class="mapa_site">
                <h3> Navegue pelo site </h3>
                <div class="coluna_mapa">
                    <p>Melhores avaliações</p>
                    <p>Termos de uso</p>
                    <p>Principais anúncio</p>
                    <p>Tutorial</p>
                    <p>Tabela de Preço</p>
                </div>
                <div class="coluna_mapa">
                    <p>Detalhe dos valores</p>
                    <p>Sobre a empresa</p>
                    <p>F.A.Q</p>
                    <p>Seja um parceio</p>
                    <p>Área administrativa</p>                        
                </div>
            </div>
        </div>
        <!--  Caixas das redes sociais  -->
        <div class="redes_sociais">
            <p>Siga nós nas redes</p>
            <div class="segura_rs" style="text-align: center;">
                <img src="view/imagem/rs/f.png">
                <img src="view/imagem/rs/i.png">
                <img src="view/imagem/rs/t.png">
            </div>
            <p>Baixe nosso aplicativo na playstore</p>
            <div class="playstore">
                <img class="center" style="display:block;" src="view/imagem/googleplay.png" width="128">
            </div>
        </div>
    </div>
</footer>
</body>
</html>