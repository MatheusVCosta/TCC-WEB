<table class="tbl_tipos_veiculos">
    <thead><!-- Legenda cabeçario da tabela-->
        <tr>
            <th>Tipo</th>
            <th>Porcentual</th>
            <th>Opções</th>
        </tr>
    </thead>
    <tbody><!-- Dados da tabela -->
        <?php

            require_once("controller/controllerTipo_veiculo.php");

            $controllerTipo = new ControllerTipoVeiculo();

            $lista = $controllerTipo->listar_tipo();

            if(count($lista)< 1 ){
                echo "<img class='img_not_find' alt='Nada encontrado' src='view/imagem/magnify.gif'>";
                echo " <p class='aviso_tabela'> Nenhum tipo encontrado!</p> ";
            }

            foreach($lista as $tipo){?>

            <tr>
                <td><?=@$tipo->getNome()?></td>
                <td><?=@$tipo->getPercentual()?>%</td>
                <td>
                    <img alt="edit" title="Editar"  onclick="tipo_veiculo_getById(<?=@$tipo->getId()?>)"
                         src="view/cms/imagem/icones/edit.png">
                    <img alt="delete" onclick="tipo_veiculo_excluir(<?=@$tipo->getId()?>)" 
                         title="Excluir" src="view/cms/imagem/icones/delete.png">
                </td>
            </tr>

        <?php } ?>
    </tbody>
</table>