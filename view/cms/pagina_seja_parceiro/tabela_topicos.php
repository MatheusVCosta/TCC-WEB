<?php
    require_once('controller/controllerSejaParceiro.php');

    $controller_seja_parceiro = new ControllerSejaParceiro();

    $lista = $controller_seja_parceiro->listar_topicos();

?>

<div class="seja-parceiro-painel-parceiros-topicos-tabela">
    <!-- Linha guarda ate 3 itens (topicos) por linha-->
<?php
    if(count($lista) < 1){
        echo "<img class='img_not_find alt='Nada encontrado' src='view/imagem/magnify.gif'>";
        echo " <p class='aviso_tabela'> Nenhum Topico encontrado!</p> ";
     }else{


         if((round(count($lista)/3)) < 1){
            $lista_topicos =  array_chunk($lista,1);
         }else{
            $lista_topicos =  array_chunk($lista,round(count($lista)/3));
         }
        
        foreach($lista_topicos as $listaTopicos){?>

        <div class="topicos-tabela-linha">
            <!-- TOPICO -->
            <?php foreach($listaTopicos as $topico){ ?>
                    <div class="item-topico">
                        <div class="img">
                            <img src="view/upload/<?=@$topico->getFoto()?>">
                        </div>
                        <div class="titulo"><?=@$topico->getTitulo()?></div>
                        <div class="desc">
                            <?=@$topico->getTexto()?>
                        </div>
                        <div class="botoes">
                            <button onclick="pagina_topico_editar(<?=@$topico->getId()?>)">Editar</button>
                            <button onclick="pagina_topico_delete(<?=@$topico->getId()?>)">Deletar</button>
                        </div>
                    </div>
            <?php } ?>

    <?php } ?>
        </div>
 <?php } ?>
<div>