<?php
/* Dados do formulario */
$titulo = "";
$descricao = "";
$foto = "";
$action = "router.php?controller=SEJA_PARCEIRO_TOPICOS&topico&modo=inserir";
$submit = "pagina_topico_insert(this)";

if(isset($_GET['id'])){
   
    require_once('controller/controllerSejaParceiro.php');
    
    $controller_seja_parceiro = new ControllerSejaParceiro();

    $topico = $controller_seja_parceiro->getById($_GET['id']);

    $titulo = $topico->getTitulo();
    
    $descricao = $topico->getTexto();

    $foto = " style='background-image: url(view/upload/". $topico->getFoto() .");' ";
    
    $action = "router.php?controller=SEJA_PARCEIRO_TOPICOS&modo=ATUALIZAR&topico&id=".$topico->getId();

    $submit = "pagina_topico_update(this)";

}


?>
<form class="modal_topicos" onsubmit="pagina_topico_insert(this)" method='post' enctype="multipart/form-data" action="<?=@$action?>">
    <h3>Topico</h3>
    <table>
        <tr>
            <td><label>Titulo</label></td>
            <td><input placeholder="Titulo do topico" name="titulo" maxlength="45" value="<?=@$titulo?>" required></td>
        </tr>
        <tr>
            <td colspan="2">
                <h4> Descrição: </h4>
                <textarea placeholder="Descrição basica" name="texto" required><?=@$descricao?></textarea>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <div class="imagem_foto" <?=@$foto?> ></div>
                <input type="file" accept="image/png, image/jpeg, image/jpg" name="imagem" onchange="mostraImagemTopico(this)" <?=@(isset($_GET['id']))?'':'required'?>>
            </td>
        </tr>
    </table>
    <button id="btnSalvarTopico">Salvar</button>
</form>