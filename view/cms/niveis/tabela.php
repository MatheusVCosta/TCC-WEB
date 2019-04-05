

<div class="linha_titulo">
    <div class="col_titulo" style="width:180px; border-left:">Nome nível</div>
    <div class="col_titulo" style="width:280px; border-left: 1px solid black;">Descrição</div>
    <div class="col_titulo" style="width:130px; border-left: 1px solid black;">Ações</div>
</div>

<?php
   
    $mensagem = "Nada aqui";
    //IMPORTANDO A CONTROLLER DE NIVEL
    require_once('controller/controllerNiveis.php');

    //INSTANCIANDO A CLASS CONTROLLERNIVEIS.PHP btn_padrao
    $listar_niveis = new ControllerNiveis();
    if($listar_niveis == null){

    }
    //$listar_niveis recebendo O OBJETO DE RETORNO DO METODO LISTAR_NIVEIS()
    $lista = $listar_niveis->listar_niveis();

    // #DEBUGANDO
    // echo "<pre>";
    // print_r($lista);

    //FOREACH vai passar de um array de objetos e guardar dentro do objeto $list
    foreach($lista as $list){
       
?>

<div class="linha_resposta">
    <div class="col_resposta" style="padding-top: 10px; width:180px;"><?php echo($list->getNome_nivel())?></div>
    <div class="col_resposta" style="padding-top: 10px; width:280px;  border-left: 1px solid black;"><?php echo($list->getDescricao())?></div>
    <div class="col_resposta" style="width:130px;  border-left: 1px solid black;">
        <img src="view/cms/imagem/icones/edit.png" alt="edit" title="Editar" onclick="buscar_dados('niveis', 'buscar', <?php echo($list->getId_niveis())?>)">
        <img src="view/cms/imagem/icones/delete.png" alt="delete" title="Excluir" onclick="excluir_dados('niveis', 'excluir', <?php echo($list->getId_niveis())?>)">
        
    </div>
</div>

<?php
    }
?>