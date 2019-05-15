<link rel="stylesheet" type="text/css" href="view/cms/css/sobre_empresa.css">
<script src="view/cms/pagina_sobre_nos/modal.js"></script>

<!--div que segura -->
<div id="principal">
    <div class="segura_text_button">
        
        <h2>Tabelas Sobre a empresa</h2>
        <div id="segura_button"> 
            <button class="adicionar_sobre" onclick="chamaModalCadastroHistoria()">Salvar Historia </button>
        </div>
        
    </div>
      <?php 
        require_once('controller/controllerSobre.php');

            $controller_sobre = new ControllerSobre();

            $registro =  $controller_sobre->listar_sobre();


            if(!$registro){
              echo "<img class='img_not_find alt='Nada encontrado' src='view/imagem/magnify.gif'>";
              echo " <p class='aviso_tabela'> Nenhum registro encontrado!</p> ";
            }else{
                   ?>
    <div class="segura_tabela">
        
        <div class="tabela_sobre">
            <div class="linha_titulo">
                <div class="col_titulo" style="width:180px; border-left:">Titulo</div>
                 <div class="col_titulo" style="width:280px; border-left:1px solid black;">Texto</div>
                 <div class="col_titulo" style="width:280px; border-left:1px solid black;">imagem</div>
            </div>
            
             <div class="linha_titulo_sobre">
                <div class="col_titulo_sobre" style="width:180px; border-left:">
                 <input type="text" value="<?=@$registro->getTitulo_sobre()?>">
                 
                 </div>
                 <div class="col_titulo_sobre" style="width:280px; border-left:1px solid black;">
                    <textarea style="resize:unset;    width: 95%;height: 167px; border-color: #d0d0d0;"><?=@$registro->getTexto_sobre()?></textarea>
                 
                 </div>
                 <div class="col_titulo_sobre" style="width:280px; border-left:1px solid black;">
                 
                 <input class="input_img"type="image" src="view/upload/<?=@$registro->getFoto_sobre()?>">
                     
                 <div class="mask_img">
                 </div>
                 
                 </div>
            </div>
            
            
            
        
            
        </div>
        
        
        <div class="tabela_valores_visao">
            <div class="linha_titulo_visao">
                <div class="col_titulo_visao" style="width:209px; border-left:"> Visão </div>
                <div class="col_titulo_visao" style="width:204px; border-left:1px solid black;"> Missão </div>
                <div class="col_titulo_visao" style="width:212px; border-left:1px solid black;"> Valores </div>
            </div>
                    
                <div class="segura_visao">
                        
                        <div class="titulo_visao"><h5><?=@$registro->getTitulo_visao_sobre()?></h5></div>
                        <div class="imagem_visao">
                             
                            <img src="view/upload/<?php echo($registro->getFoto_visao_sobre())?>">
                        </div>
                        
                        <div class="texto"><?=@$registro->getTexto_visao_sobre()?></div>
                        <div class="segura_icones"> 
                            <img class="icone" onclick="editar_sobre('visao')"  src="view/cms/imagem/editar.png">
                        </div> 
                    </div>
                    <div class="segura_visao">
                        
                        <div class="titulo_visao"><h5><?=@$registro->getTitulo_missao_sobre()?></h5></div>
                        <div class="imagem_visao">
                            <img src="view/upload/<?php echo($registro->getFoto_missao_sobre())?>">
                        </div>
                        
                        <div class="texto"><?=@$registro->getTexto_missao_sobre()?></div>
                        <div class="segura_icones"> 
                            <img class="icone"  onclick="editar_sobre('missao')" src="view/cms/imagem/editar.png">
                        </div> 
                    </div>
                    <div class="segura_visao">
                        
                        <div class="titulo_visao"><h5><?=@$registro->getTitulo_valores_sobre()?></h5></div>
                        <div class="imagem_visao">
                            <img src="view/upload/<?php echo($registro->getFoto_valores_sobre())?>">
                        </div>
                        
                        <div class="texto"><?=@$registro->getTexto_valores_sobre()?></div>
                        <div class="segura_icones"> 
                            <img class="icone" onclick="editar_sobre('valores')" src="view/cms/imagem/editar.png">
                        </div> 
                    </div>
                <?php 
                }
                ?>  
            
            
            
            
            
            
            
<!--            <div class="segura_visao">
                <h5>Titulo</h5>
                <div class="titulo_visao"></div>
                <div class="imagem_visao">
                </div>
                <button>Carregar foto</button>
                <div class="texto"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies.</div>
                <div class="segura_icones"> 
                    <img class="icone" src="view/cms/imagem/editar.png">
                    <img class="icone" src="view/cms/imagem/delete.png">
                </div> 
            </div>
            <div class="segura_visao">
                <h5>Titulo</h5>
                <div class="titulo_visao"></div>
                <div class="imagem_visao">
                </div>
                <button>Carregar foto</button>
                <div class="texto"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies.</div>
                <div class="segura_icones"> 
                    <img class="icone" src="view/cms/imagem/editar.png">
                    <img class="icone" src="view/cms/imagem/delete.png">
                </div> 
            </div> -->
            
            
            
        </div>
    </div>
    
   
    


</div>