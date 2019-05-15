<?php

    require_once('controller/controllerVeiculo.php');

    $controllerVeiculo = new ControllerVeiculos();
    


    $lista = $controllerVeiculo->listar_veiculos_pendentes()


?>
<table>
    <thead><!-- Legenda,cabeçario da tabela-->
        <tr>
            <th>ID</th>
            <th>Tipo</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Opções</th>
        </tr>
    </thead>
    <tbody><!-- Conteudo da tabela -->
    <?php if(count($lista)< 1 ){ ?>
           
           <tr>
                <td colspan='5'>
                      <img class='img_not_find' style=" max-width: 128px;" width='128' alt='Nada encontrado' src='view/imagem/magnify.gif'>
                      <p class='aviso_tabela'> Nenhum veiculo pendente encontrado!</p>
                </td>
           </tr>

    <?php }else{

            foreach($lista as $veiculo){ ?>

            <tr>
                <td><?=@$veiculo->getId()?></td>
                <td><?=@$veiculo->getTipo()->getNome()?></td>
                <td><?=@$veiculo->getMarca()->getNome()?></td>
                <td><?=@$veiculo->getModelo()->getNome()?></td>
                <td>
                    <!-- Atenção quando clicar deve abrir uma modal para aprovação! -->
                    <button onclick="chamaModalVeiculosAprova(<?=@$veiculo->getId()?>)"><img alt="edit" title="Editar" src="view/cms/imagem/icones/edit.png"> VER </button>
                </td>
            </tr>
<?php       }
        } 
?>
    <tbody>
</table>