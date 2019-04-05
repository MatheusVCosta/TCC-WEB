
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="view/cms/css/home_cms.css">
    <script src="view/cms/js/jquery.js"></script>
    <script src="view/cms/js/script_menu.js"></script>
    <script src="view/cms/js/script_CRUD.js"></script>
    <script src="view/cms/js/notify.js"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>CMS-Mos'share</title>
</head>
<body>
    <div class="principal">
        <div id="container">
            <header>
                <div id="logo"> 
                    <img src="view/cms/imagem/header/mob.png" alt="">
                </div>
                <div id="info_usuario">
                    <div id="sobre_usuario">
                        <div class="segura_info">
                            <p>Matheus</p>
                            <p>Administrador</p>
                        </div>
                        <div class="segura_info" style="padding-top:13px;">
                            <a href="#">Sair</a>
                        </div>
                        <div class="imagem_home">
                            <img src="view/cms/imagem/header/house.png" alt="home">
                        </div>
                        <div class="imagem_home" style="margin-top:-140px;">
                            <img src="view/cms/imagem/icones/logout.png" alt="home">
                        </div>
                    </div>
                    <div id="imagem_usuario">
                        <img src="view/cms/imagem/header/user.png" alt="user">
                    </div>
                    
                </div>
            </header>
            <nav>
                <!-- <p id="texto_menu">Menu</p> -->
                <div class="menu_lateral">
                    <div class="item_menu" onclick="abrir_menu('120px', '#gerenciar_paginas')">
                        <img src="view/cms/imagem/icones/paginas.png" alt="Gerenciar paginas"> 
                        <p>Gerenciar paginas</p>
                        
                    </div>
                    <div class="sub_menu" id="gerenciar_paginas"> 

                    </div>

                    <div class="item_menu" onclick="abrir_menu('120px', '#gerenciar_veiculos')">
                        <img src="view/cms/imagem/icones/veiculo.png" alt="Gerenciar veiculos"> 
                        <p>Gerenciar veiculos</p>
                    </div>
                    <div class="sub_menu" id="gerenciar_veiculos"> 
    
                    </div>
                    <div class="item_menu" onclick="abrir_menu('120px')">
                        <img src="view/cms/imagem/icones/anuncio.png" alt="Anúncios"> 
                        <p>Anúncios</p>
                    </div>
                    <div class="sub_menu"> 
    
                    </div>
                    <div class="item_menu" id="cliente_atv" onclick="abrir_menu('140px', '#clientes', '#cliente_atv')">
                        <img src="view/cms/imagem/icones/cliente.png" alt="Clientes">
                        <p>Clientes</p>
                    </div>
                    <div class="sub_menu" id="clientes"> 
                        
                    </div>
                    <div class="item_menu" id="usuario_atv" onclick="abrir_menu('140px', '#usuarios', '#usuario_atv')">
                        <img src="view/cms/imagem/icones/funcionario.png" alt="Usuario CMS">
                        <p>Usuários CMS</p>
                    </div>
                    <div class="sub_menu" id="usuarios"> 
                        <div class="item_sub_menu" onclick="conteudo_subMenu('cadastro_niveis')">
                            <img src="view/cms/imagem/icones/cliente.png" alt="Clientes">
                            <p>Cadastrar niveis</p>
                        </div>
                        <div class="item_sub_menu" onclick="conteudo_subMenu('usuarios/cadastro_usuarios',true)">
                            <img src="view/cms/imagem/icones/cliente.png" alt="Clientes">
                            <p>Cadastrar usuários</p>
                        </div>
                    </div>
                    <div class="item_menu" onclick="abrir_menu('120px')">
                        <img src="view/cms/imagem/icones/fale_conosco.png" alt="fale conosco">
                        <p>Fale conosco</p>
                    </div>
                    <div class="sub_menu"> 
    
                    </div>
                    <div class="item_menu" onclick="abrir_menu('120px')">
                        <img src="view/cms/imagem/icones/email.png" alt="Anúncios">
                        <p>Email marketing</p>
                    </div>
                    <div class="sub_menu"> 
    
                    </div>
                    
                </div>   
            </nav>
            <div class="conteudo">
                
            </div>
        </div>
    </div>
</body>
</html>