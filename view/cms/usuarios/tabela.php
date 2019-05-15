<link rel="stylesheet" type="text/css" href="view/cms/css/niveis.css">
<link rel="stylesheet" type="text/css" href="view/cms/css/usuario.css">
<div class="segura_text_button">
    <h2>Tabelas Usuarios</h2>
    <button class="adicionar_usuario" id="abrir_cadastro_usuario">ADICIONAR Usuarios </button>
</div>
<div class="segura_tabela">
    <div class="tabela_usuarios">
        <table class="tbl_usuario">
            <thead>
              <tr>
                  <th>Nome</th>
                  <th>Email</th>
                  <th>Ações</th>
              </tr>
            </thead>
            <tbody>
            <?php
                require_once('controller/controllerUsuarios.php');

                $controller_usuario = new ControllerUsuarios();

                $listUsuarios =  $controller_usuario->listar_usuarios();


                if(count($listUsuarios) < 1){?>
                <tr>
                    <td colspan="3">
                      <img style=" width: auto; height: auto; " class='img_not_find' alt='Nada encontrado' src='view/imagem/magnify.gif'>
                      <p class='aviso_tabela'> Nenhum usuário encontrado!</p>
                    </td>
                </tr>
<?php
                }

                foreach($listUsuarios as $usuario){
?>

                  <tr>
                      <td><?=@$usuario->getNome()?></td>
                      <td><?=@$usuario->getEmail()?></td>
                      <td>
                           <img src="view/cms/imagem/icones/edit.png" alt="edit" title="Editar"      onclick="usuario_getById(<?=@$usuario->getId()?>)">
                           <img src="view/cms/imagem/icones/delete.png" alt="delete" title="Excluir" onclick="usuario_delete(<?=@$usuario->getId()?>)">
                      </td>
                  </tr>

             <?php
                }
             ?>
             </tbody>
          </table>
    </div>
</div>
<script src="view/cms/usuarios/modal.js"></script>