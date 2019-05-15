<?php
    
    
    

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Mob'Share</title>
    <link rel="stylesheet" type="text/css" media="screen" href="view/css/cadastrar_usuario.css"/>
    <script src="view/js/libs/jquery/jquery-3.3.1.js"></script>
    <script src="view/painel_usuario/js/jqueryform.js"></script>
    <script src="view/js/notify.js"></script>
    <script src="view/js/libs/jqueryMask/jquery.mask.js"></script>
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
                    <h1 class="texto_primario_h1">Cadastrar Usuário</h1>
                    <p class="texto_secundario_p">Crie uma conta e alugue um veículo</p>
                </div>
            </div>
        </header>
        <div class="containerCadastro">
            <form id="frmCliente"  method='post' enctype="multipart/form-data" onsubmit="clientes_cadastrar(this)" action="router.php?controller=clientes&modo=inserir">
            <h1>Cadastro de usuário</h1>
                <div class="seguraCadastro">
                    <h2>Dados pessoais</h2>
                    <div class="linha"></div>
                    <div class="form-center" style="height: 600px;">
                        <div id="dadosPessoais" class="formDadosPessoais">
                            <label for="txtNome">Nome*</label><br>
                            <input type="text" name="txtNome" id="txtNome" placeholder="Nome" required><br>
                            <label for="txtNome">Data de nascimento*</label><br>
                            <input type="date" name="txtDtNasc" id="txtDtNasc" ><br>
                            <label for="txtCpf">CPF*</label><br>
                            <input type="text" name="txtCpf" id="txtCpf" placeholder="CPF" required><br>
                            <label for="txtRg">RG*</label><br>
                            <input type="text" name="txtRg" id="txtRg" placeholder="RG" required><br>
                            <label for="txtCnh">CNH*</label><br>
                            <input type="text" name="txtCnh" id="txtCnh" placeholder="CNH" required><br>
                        </div>
                        <div class="formCarregarFotos">
                            <h2>Foto</h2>
                            <div id="fotoCliente">
                                <div class="addFotoCliente" id="addFotoCliente"></div>
                                <input type="file" name="fotoCliente" onchange="mostraImagem64(this)" accept="image/png, image/jpeg, image/jpg" required>
                                <div class="btnFoto">
                                    <p>Adicionar foto</p>
                                </div>
                            </div>
                            <div id="fotoCNh">
                                <div class="addFotoCliente" id="addCnhCliente"></div>
                                <input type="file" name="fotoCNH" onchange="mostraImagem64(this)" accept="image/png, image/jpeg, image/jpg" required>
                                
                                <div class="btnFoto">
                                    <p>Adicionar foto CNH</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="seguraCadastro">
                    <h2>Comunicação</h2>
                    <div class="linha"></div>
                    <div class="form-center" style="height: 220px;">
                        <div class="formDadosComunicacao">
                            <label for="txtEmail">Email*</label><br>
                            <input type="text" name="txtEmail" id="txtEmail" placeholder="example@example.com" required><br>
                            <div class="linhaInput">
                                <div class="col_2">
                                    <label for="txtTelefone">Telefone</label><br>
                                    <input type="text" name="txtTelefone" id="txtTelefone" placeholder="11 0000-0000">
                                   
                                </div>
                                <div class="col_2">
                                    <label for="txtCelular">Celular*</label><br>
                                    <input type="text" name="txtCelular" id="txtCelular" placeholder="11 90000-0000" required>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
                <div class="seguraCadastro">
                    <h2>Endereço</h2>
                    <div class="linha"></div>
                    <div class="form-center" style="height: 445px;">
                        <div class="formDadosComunicacao">
                            
                            <div class="linhaInput">
                                <div class="col_2">
                                    <label for="txtCep">CEP*</label><br>
                                    <input type="text" name="txtCep" id="txtCep" placeholder="00000-000" required>
                                </div>
                                <div class="col_2">
                                    <label for="txtCIdade">Cidade*</label><br>
                                    <input type="text" name="txtCidade" id="txtCidade" placeholder="Ex. Jandira" required>
                                </div>
                               
                            </div>
                            <label for="txtNome">Rua*</label><br>
                            <input type="text" name="txtRua" id="txtRua" required><br>
                            <div class="linhaInput">
                                <div class="col_3" style="width:390px">
                                    <label for="txtBairro" >Bairro*</label><br>
                                    <input type="text" style="width:380px;" name="txtBairro" id="txtBairro" placeholder="Bairro" required>
                                </div>
                                <div class="col_3" style="width:390px">
                                    <label for="txtNumero">Numero*</label><br>
                                    <input type="text" style="width:380px;" name="txtNumero" id="txtNumero" placeholder="Ex. 222" required>
                                </div>
                                <div class="col_3" style="width:120px">
                                    <label for="txtUf">UF*</label><br>
                                    <input type="text" style="width:110px;" name="txtUf" id="txtUf" placeholder="Ex. SP " required>
                                </div>
                                <label for="txtComplemento">Complemento</label><br>
                                <input type="text" name="txtComplemento" id="txtComplemento" required ><br>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="seguraCadastro">
                    <h2>Autenticação</h2>
                    <div class="linha"></div>
                    <div class="form-center" style="height: 220px;">
                        <div class="formDadosComunicacao">
                            <label for="txtNomeUsuario">Nome de usuario*</label><br>
                            <input type="text" name="txtNomeUsuario" id="txtNomeUsuario" required><br>
                            <div class="linhaInput">
                                <div class="col_2">
                                    <label for="txtSenha">Senha*</label><br>
                                    <input type="password" name="txtSenha" id="txtSenha" required>
                                </div>
                                <div class="col_2">
                                    <label for="txtConfSenha">Confirmar Senha*</label><br>
                                    <input type="password" name="txtConfSenha" id="txtConfSenha" required>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
                <div class="seguraCadastro">
                    <h2>Finalização</h2>
                    <div class="linha"></div>
                    <div class="form-center" style="height: 120px;">
                        <input type="checkbox" id="chkTermos" required><label>Aceitar termos de uso</label>
                        <div class="formDadosComunicacao">
                            <input type="submit" name="btnSalvar" value="Cadastrar" id="btnCadastrar">        
                        </div>
                        
                    </div>
                </div>
            </form>
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
</body>
</html>   