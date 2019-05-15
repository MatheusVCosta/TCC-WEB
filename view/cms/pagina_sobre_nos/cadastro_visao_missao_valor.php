<?php 
        require_once('controller/controllerSobre.php');

            $controller_sobre = new ControllerSobre();

            $registro =  $controller_sobre->listar_sobre();
            $action = "";
            $titulo ="";
            $texto = "";
            if(isset($_GET['modo'])){
                $action = "router.php?controller=sobre&modo=atualizar";
               if($_GET['modo'] == "visao"){
                $titulo = $registro->getTitulo_visao_sobre();
                $texto = $registro->getTexto_visao_sobre();
                $action .= "&visao";
               }elseif($_GET['modo'] == "valores"){
                 $titulo = $registro->getTitulo_valores_sobre();
                 $texto = $registro->getTexto_valores_sobre();
                 $action.= "&valores";
               }elseif($_GET['modo'] == "missao"){
                  $titulo = $registro->getTitulo_missao_sobre();
                 $texto = $registro->getTexto_missao_sobre();
                 $action.= "&missao";
               }

            }
?>


<link rel="stylesheet" type="text/css" href="view/cms/css/sobre_empresa.css">
<div>
    <form class="form_cadastro" method="POST" enctype="multipart/form-data" action="<?php echo($action)?>"  onsubmit="editar_sobre_submit(this)" id="formSobre">
         <h3 class="titulo_pagina">Cadastrar Visão Missão Valores</h3>
        <div class="segura_form_cadastro">
            <!--<select id="cb_visoes">
                <option value="">Seleciona um titulo</option>
                <option value="missao">Missão</option>
                 <option value="visao">Visão</option>
                 <option value="valor">Valor</option>
            
            </select><br>-->
            <h2><?=@$_GET['modo']?></h2>
            <label for="titulo">Titulo</label><br>
            <input id="titulo_sobre" value="<?php echo($titulo)?>" name="titulo" placeholder="titulo" required style="margin-bottom:10px;" required><br>
             <label for="imagem_sobre">Imagem</label><br>
            <input  type="file" name='foto' ><br>
            
            <label for="texto_sobre">Texto</label><br>
            <input id="texto_sobre" value="<?php echo($texto)?>" name="texto" placeholder="Texto" required><br>

            
            
            <input type="submit" name="btn_salvar" class="btn_padrao" value="Salvar">
            
        </div>

    </form>


</div>