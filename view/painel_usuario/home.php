<?php
    
    require_once('model/clienteClass.php');

    // Pegando o Cliente Logado
    if(!isset($_SESSION))session_start();
    $cliente = unserialize($_SESSION['cliente']);

    //ATENÇÃO!! Pode dar erro se o cliente não estiver logado !!!
    if($cliente->getCpf() == null) echo "oi";

?>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>painel_usuario-Home</title>

    <!-- import dos arquivos scripts -->
    <script src="view/painel_usuario/js/jquery.js"></script>
    <script src="view/painel_usuario/js/script_crud.js"></script>
    <script src="view/painel_usuario/js/script_menu.js"></script>
    <script src="view/js/notify.js"></script>

    <link rel="stylesheet" type="text/css" href="view/painel_usuario/css/home.css"/>

    
</head>
    <body>
        <!--DIV PRINCIPAL QUE SEGURA TUDO -->
        <div id="principal">
            <!--CABEÇALHO-->
            <header>
                <!--TODO CONTEUDO DO CABEÇALHO-->
                <div id="conteudo_header">     
                    <div class="img_logo">
                        <img src="view/imagem/Mob.png" title="logo da empresa" alt="logo da empresa">
                    </div>
                    <div class="boasVindas">
                        <div id="bemVindo">
                            <h3>Olá! <?=@$cliente->getNome()?></h3>
                            <p>Você tem 10 notificações</p>
                            <div id="segura_icones"> 
                                <div class="icone"> 
                                    <img class="img_icone" src="view/painel_usuario/imagem/icone_home.png" title="icone" alt="icone">
                                </div>
                                <div class="icone">
                                    <img class="img_icone" src="view/painel_usuario/imagem/chart.png" title="icone" alt="icone">
                                </div> 
                                <div class="icone">
                                    <img class="img_icone" src="view/painel_usuario/imagem/star.png" title="icone" alt="icone">
                                    
                                </div>
                            </div>
                        </div>
                
                        <div class="img_cliente" >
                            <div class="editarPerfil">
                                <img id="imgEditarPerfil" src="view/painel_usuario/imagem/editarPerfil.png">
                            </div>
                            <img src="view/upload/<?=@$cliente->getFoto()?>" title="Foto do usuario" alt="foto do usuario">
                        </div>
                    </div>
                </div>
            </header>
            <!--MENU-->
            <nav>
                <div class="menu_lateral">
                    <div class="item_menu" onclick="abrir_menu('120px', '#gerenciar_anuncios')">
                        <img src="view/cms/imagem/icones/paginas.png" alt="Gerenciar paginas"> 
                        <p>Gerenciar anuncios</p>
                    </div>
                    <div class="sub_menu" id="gerenciar_anuncios" > 
                        <div class="item_sub_menu" onclick="conteudo_subMenu('anuncios/cadastrar_anuncio',true)">
                            <img src="view/cms/imagem/icones/bike.png" alt="tipo">
                            <p>Cadastrar anúncio</p>
                        </div>
                        <div class="item_sub_menu"  onclick="conteudo_subMenu('anuncios/interessado_veiculo',true)">
                            <img src="view/cms/imagem/icones/bike.png" alt="tipo">
                            <p> Interessados </p>
                        </div>
                        <div class="item_sub_menu" onclick="conteudo_subMenu('anuncios/anuncio_estatistica',true)">
                            <img src="view/cms/imagem/icones/bike.png" alt="tipo">
                            <p> Estatística </p>
                        </div>
                    </div>
                    <div class="item_menu" onclick="abrir_menu('120px', '#gerenciar_veiculos')">
                        <img src="view/cms/imagem/icones/veiculo.png" alt="Gerenciar veiculos"> 
                        <p>Gerenciar veiculos</p>
                    </div>
                    <div class="sub_menu" id="gerenciar_veiculos"> 
                        <div class="item_sub_menu" onclick="conteudo_subMenu('veiculos/cadastrar',true)">
                            <img src="view/cms/imagem/icones/bike.png" alt="tipo">
                            <p>Cadastrar veículo</p>
                        </div>
                        <div class="item_sub_menu" onclick="conteudo_subMenu('veiculos/meus_veiculos',true)">
                            <img src="view/cms/imagem/icones/bike.png" alt="tipo">
                            <p>lista veículo</p>
                        </div>
                        <div class="item_sub_menu" onclick="conteudo_subMenu('veiculos/meus_veiculos_locados',true)">
                            <img src="view/cms/imagem/icones/bike.png" alt="tipo">
                            <p>Meus Veiculos Locados</p>
                        </div>
                        <div class="item_sub_menu" onclick="conteudo_subMenu('veiculos/veiculos_estatistica')">
                            <img src="view/cms/imagem/icones/bike.png" alt="tipo">
                            <p>Estatísticas</p>
                        </div>
                    </div>
                    <div class="item_menu" onclick="abrir_menu('120px','#gerenciar_pendentes')">
                        <img src="view/cms/imagem/icones/anuncio.png" alt="Anúncios"> 
                        <p>Gerenciar locações</p>
                    </div>
                    <div class="sub_menu" id="gerenciar_pendentes"> 
                        <div class="item_sub_menu" onclick="conteudo_subMenu('locacao/andamento',true)">
                            <img src="view/cms/imagem/icones/bike.png" alt="tipo">
                            <p> Em andamento</p>
                        </div>
                        <div class="item_sub_menu" onclick="conteudo_subMenu('locacao/agendamento',true)">
                            <img src="view/cms/imagem/icones/bike.png" alt="tipo">
                            <p> Agendamentos</p>
                        </div>
                        <div class="item_sub_menu" onclick="conteudo_subMenu('locacao/avaliacoes',true)">
                            <img src="view/cms/imagem/icones/bike.png" alt="tipo">
                            <p> Avaliações dos locadores</p>
                        </div>
                        <div class="item_sub_menu" onclick="conteudo_subMenu('anuncios/anuncios_aprovados',true)">
                            <img src="view/cms/imagem/icones/bike.png" alt="tipo">
                            <p> Estatísticas </p>
                        </div>
                    </div>
                    <div class="item_menu"  onclick="abrir_menu('120px','#gerenciar_locacoes')">
                        <img src="view/cms/imagem/icones/cliente.png" alt="Clientes">
                        <p> Minhas Locações </p>
                    </div>
                    <div class="sub_menu" id="gerenciar_locacoes"> 
                        <div class="item_sub_menu" onclick="conteudo_subMenu('minhas_locacoes/carros_alugados',true)">
                            <img src="view/cms/imagem/icones/bike.png" alt="tipo">
                            <p> Carros Alugados </p>
                        </div>
                        <div class="item_sub_menu" onclick="conteudo_subMenu('minhas_locacoes/avaliacoes',true)">
                            <img src="view/cms/imagem/icones/bike.png" alt="tipo">
                            <p> Avaliações </p>
                        </div>
                        <div class="item_sub_menu" onclick="conteudo_subMenu('minhas_locacoes/estatistica',true)">
                            <img src="view/cms/imagem/icones/bike.png" alt="tipo">
                            <p> Estatísticas </p>
                        </div>
                    </div>
                    <div class="item_menu" onclick="conteudo_subMenu('conversa/conversa',true)">
                        <img src="view/cms/imagem/icones/funcionario.png" alt="Usuario CMS">
                        <p>Conversas</p>
                    </div>
                </div>
            </nav>
            <!-- TODO O CONTEUDO-->
            <div id="conteudo">


                <!-- conteudo MEUS VEICULOS LOCADOS -->
            
            <div class="conteudo_veiculos_locados">
                
                
                
            </div>
                




















                



        </div>
    </div>
  </body>
</html>