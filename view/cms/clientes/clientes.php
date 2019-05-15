<div class="segura_text_button">
    <h2>Clientes</h2>
</div>
<div id="segura_campos">
<table width="950px">
    <tr>
        <td>Nome</td>
        <td>Cpf</td>
        <td>Email</td>
        <td>Celular</td>
        <td>Cidade</td>
        <td>Estado</td>
        <td>Status</td>
    </tr>
    <?php require_once('controller/controllerClientes.php');

    $controller_clientes = new ControllerClientes();

    $listRegistro =  $controller_clientes->listar_registro_clientes();


    if(count($listRegistro) < 1){
        echo "<img class='img_not_find alt='Nada encontrado' src='view/imagem/magnify.gif'>";
        echo " <p class='aviso_tabela'> Nenhum registro encontrado!</p> ";
    }

    foreach($listRegistro as $registro){
    ?>
        <tr>
            <td><?=$registro->getNome()?></td>
            <td><?=$registro->getCPF()?></td> 
            <td><?=$registro->getEmail()?></td>
            <td><?=$registro->getCelular()?></td>
            <td><?=$registro->getCidade()?></td>
            <td><?=$registro->getUf()?></td>
            <td>
                    <img onclick="clientes_ativar_desativar(<?=@$registro->getId()?>,<?=@$registro->getStatus()?>)" 

                         <?php if( $registro->getStatus() == 1){ ?>
                            src="view/cms/imagem/icones/on.png" alt="on-off">
                         <?php }else{ ?>
                            src="view/cms/imagem/icones/off.png" alt="on-off">
                        <?php } ?>
            </td>
        </tr>
        <?php
    }
    ?>
</table>
<link rel="stylesheet" type="text/css" href="view/cms/css/cliente.css">