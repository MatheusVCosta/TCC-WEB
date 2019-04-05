

<div class="linha_titulo">
    <div class="col_titulo" style="width:180px; border-left:">Nome Usuario</div>
    <div class="col_titulo" style="width:280px; border-left: 1px solid black;">Email</div>
    <div class="col_titulo" style="width:130px; border-left: 1px solid black;">Opcoes</div>
</div>

<?php
    
  foreach($listUsuarios as $usuario){
       
?>

<div class="linha_resposta">
    <div class="col_resposta" style="padding-top: 10px; width:180px;"><?php echo($usuario->getNome())?></div>
    <div class="col_resposta" style="padding-top: 10px; width:280px;  border-left: 1px solid black;"><?php echo($usuario->getEmail())?></div>
    <div class="col_resposta" style="width:130px;  border-left: 1px solid black;">
        <img src="view/cms/imagem/icones/edit.png" alt="edit" title="Editar"      onclick="usuario.getById(<?=@$usuario->getId()?>)">
        <img src="view/cms/imagem/icones/delete.png" alt="delete" title="Excluir" onclick="usuario.dao.delete(<?=@$usuario->getId()?>)">
    </div>
</div>

<?php
    }
?>