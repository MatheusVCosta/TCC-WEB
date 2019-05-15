<?php

    require_once('controller/controllerAnuncios.php');

    $controllerAnuncio =  new ControllerAnuncios();

    if($anuncio = $controllerAnuncio->getById($_GET['id_anuncio'])){

?>
    <div class="modal_anuncios">
        <div class="imagem">
            <img width="232" src="view/upload/<?=@$anuncio->getVeiculo()->getFotos()[0]?>" class="principalImagem">
            <div class="lista_imagens">
                <?php foreach($anuncio->getVeiculo()->getFotos() as $foto ){ ?>
                    <div class="item_imagem">
                        <img src="view/upload/<?=@$foto?>" onclick="anuncios_pendentes_modal_ver_imagem(this)">
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="descricao">
            <div class="caixa_inputs_anuncios">
                <div class="caixa_campos">
                    <div class="campo_anuncios">
                        <label>H. Inicio</label>
                        <input value="<?=@$anuncio->getHorarioInicio()?>" disabled>
                    </div>
                    <div class="campo_anuncios">
                        <label>H. Final</label>
                        <input value="<?=@$anuncio->getHorarioTermino()?>" disabled>
                    </div>
                </div>
                <div class="caixa_campos">
                    <div class="campo_anuncios">
                        <label>D. Inicio</label>
                        <input value="<?=@$anuncio->getDataInicial('br')?>" disabled>
                    </div>
                    <div class="campo_anuncios">
                        <label>D. Final</label>
                        <input value="<?=@$anuncio->getDataFinal('br')?>" disabled>
                    </div>
                </div>
                <div class="caixa_campos">
                    <textarea placeholder="Descrição" disabled><?=@$anuncio->getDescricao()?></textarea>
                </div>
            </div>
        </div>
        <div class="descricao_veiculo_anuncios">
            <div class="caixas_veiculo_anuncios">
                <div class="item_caixa_veiculo">
                    <label> Ano </label>
                    <input value="<?=@$anuncio->getVeiculo()->getAno()?>" disabled>
                </div>
                <div class="item_caixa_veiculo">
                    <label> Placa </label>
                    <input value="<?=@$anuncio->getVeiculo()->getPlaca()?>" disabled>
                </div>
                <div class="item_caixa_veiculo">
                    <label> Quilometragem </label>
                    <input value="<?=@$anuncio->getVeiculo()->getQuilometragem()?>" disabled>
                </div>
                <div class="item_caixa_veiculo">
                    <label> Modelo </label>
                    <?php if($anuncio->getVeiculo()->getModelo()->getExcluido() == 1){?>
                
                        <input value="<?=@$anuncio->getVeiculo()->getModelo()->getNome()?>" title="Modelo excluido " style="border-color: #f70000;" disabled>

                    <?php }elseif($anuncio->getVeiculo()->getModelo()->getStatus() == 0){?>

                        <input value="<?=@$anuncio->getVeiculo()->getModelo()->getNome()?>" title="Modelo desativado " style="border-color: #f70000;" disabled>

                    <?php }else{?>

                        <input value="<?=@$anuncio->getVeiculo()->getModelo()->getNome()?>" disabled>

                    <?php }?>
                </div>
                <div class="item_caixa_veiculo">
                    <label> Tipo </label>
                    <?php if($anuncio->getVeiculo()->getTipo()->getExcluido() == 1){ ?>
                
                        <input value="<?=@$anuncio->getVeiculo()->getTipo()->getNome()?>" title="Tipo de veiculo Excluido" style="border-color: #f70000;" disabled>
                
                    <?php }else{ ?>

                        <input value="<?=@$anuncio->getVeiculo()->getTipo()->getNome()?>" disabled>

                    <?php } ?>
                </div>
                <div class="item_caixa_veiculo">
                    <label> Marca </label>
                    <?php if($anuncio->getVeiculo()->getMarca()->getStatus() == 0){?>
                        <input value="<?=@$anuncio->getVeiculo()->getMarca()->getNome()?>" title="Marca desativada" style="border-color: #f70000;" disabled>
                    <?php }else{?>
                        <input value="<?=@$anuncio->getVeiculo()->getMarca()->getNome()?>" disabled>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="caixa_aprovacao">
            <button onclick="chamaModalAprovarAnuncio(<?=@$_GET['id_anuncio']?>)"> Aprovar</button>
            <button onclick="chamaModalReprovarAnuncio(<?=@$_GET['id_anuncio']?>)"> Reprovar</button>
        </div>
    </div>

<?php } else { ?>
      <img class='img_not_find' style=" max-width: 128px;" width='128' alt='Nada encontrado' src='view/imagem/magnify.gif'>
      <p class='aviso_tabela'> Nenhum anuncio encontrado!</p>
<?php } ?>
<link rel="stylesheet" type="text/css" href="view/cms/css/anuncios_pendentes.css">
<script src="view/cms/anuncios/anuncios_pendentes.js"></script>