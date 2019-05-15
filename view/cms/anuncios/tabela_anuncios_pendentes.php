<?php
    
    require_once('controller/controllerAnuncios.php');
    
    $controllerAnuncio =  new ControllerAnuncios();

    $lista = $controllerAnuncio->listar_anunciosPendentes();

    
?>
<table>
    <thead><!-- Legenda,cabeçario da tabela-->
        <tr>
            <th>Veículo</th>
            <th>Dias Disponiveis</th>
            <th>Hora de retirada</th>
            <th>Hora de entrega</th>
            <th>Valor/Hora</th>
            <th>Descrição</th>
            <th>Aprovar/Reprovar</th>
        </tr>
    </thead>
    <tbody><!-- Conteudo da tabela -->
       <?php if(count($lista)< 1 ){ ?>
           
           <tr>
                <td colspan='7'>
                      <img class='img_not_find' style=" max-width: 128px;" width='128' alt='Nada encontrado' src='view/imagem/magnify.gif'>
                      <p class='aviso_tabela'> Nenhum anuncio pendente encontrado!</p>
                </td>
           </tr>

    <?php }else{

            foreach($lista as $anuncio){ ?>
             <tr>
                <td><?=@$anuncio->getVeiculo()->getModelo()->getNome()?></td>
                <td><?=@$anuncio->countDias()?></td>
                <td><?=@$anuncio->getHorarioInicio()?></td>
                <td><?=@$anuncio->getHorarioTermino()?></td>
                <td>R$ <?=@$anuncio->getValor()?></td>
                <td><?=@$anuncio->getDescricao()?></td>
                <td onclick="chamaModalAnunciosAprova(<?=@$anuncio->getId()?>)">
                    <button>Aprovar/Reprovar</button>
                </td>
            </tr>
<?php       }
        }
?>
    </tbody>
</table>