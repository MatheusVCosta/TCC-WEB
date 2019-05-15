<?php
    
    require_once('controller/controllerVeiculo.php');

    $controllerVeiculo = new ControllerVeiculos();
    


    $veiculo = $controllerVeiculo->getById($_GET['id_veiculo']);
    
?>
<div class="modal_veiculos">
    <div class="imagem">

        <!--<img width="232" src="http://s2.glbimg.com/-oLwVF55FXXX2ug5_HfrkhYpQ8s=/620x413/top/e.glbimg.com/og/ed/f/original/2017/04/24/056_057_ae624-01.jpg">-->
        <img width="232" class="principalImagem" src="view/upload/<?=@$veiculo->getFotos()[0]?>">

        <div class="lista_imagens">
        <?php foreach($veiculo->getFotos() as $foto ){ ?>
            <div class="item_imagem">
                <img src="view/upload/<?=@$foto?>" onclick="veiculos_pendentes_modal_ver_imagem(this)">
            </div>
        <?php } ?>
        </div>
    </div>
    <div class="descricao">
        <div class="caixa_inputs_veiculos">
            <div class="caixa_campos">
                <div class="campo_veiculos">
                    <label>Ano</label>
                    <input value="<?=@$veiculo->getAno()?>" disabled>
                </div>
                <div class="campo_veiculos">
                    <label>Quilometragem</label>
                    <input value="<?=@$veiculo->getQuilometragem()?>" disabled>
                </div>
            </div>
            <div class="caixa_campos">
                <div class="campo_veiculos">
                    <label>Renavam</label>
                    <input value="<?=@$veiculo->getRenavam()?>" disabled>
                </div>
                <div class="campo_veiculos">
                    <label>Placa</label>
                    <input value="<?=@$veiculo->getPlaca()?>" disabled>
                </div>
            </div>
            <div class="caixa_campos">
                <div class="caixa_acessorios">
                    <h3>Acessorios:</h3>
                    <?php foreach($veiculo->getAcessorios() as $acessorio){ ?>
                        <?php if($acessorio->getEstado() == 1 ){ ?>
                            <div class="item_acessorio"><?=@$acessorio->getNome()?></div>
                        <?php } ?>
                    <?php } ?>
                </div>
                <!--<textarea placeholder="Descrição" disabled> Viagens da região Central para a região Oeste</textarea>-->
            </div>
        </div>
    </div>
    <div class="descricao_veiculo_pendentes">
        <div class="caixas_veiculo_pendentes">
            <div class="item_caixa_veiculo">
                <label> Modelo </label>
                <?php if($veiculo->getModelo()->getExcluido() == 1){?>
                
                    <input value="<?=@$veiculo->getModelo()->getNome()?>" title="Modelo excluido " style="border-color: #f70000;" disabled>
                
                <?php }elseif($veiculo->getModelo()->getStatus() == 0){?>

                    <input value="<?=@$veiculo->getModelo()->getNome()?>" title="Modelo desativado " style="border-color: #f70000;" disabled>

                <?php }else{?>

                    <input value="<?=@$veiculo->getModelo()->getNome()?>" disabled>

                <?php }?>
            </div>
            <div class="item_caixa_veiculo">
                <label> Tipo </label>
                <?php if($veiculo->getTipo()->getExcluido() == 1){ ?>
                
                    <input value="<?=@$veiculo->getTipo()->getNome()?>" title="Tipo de veiculo Excluido" style="border-color: #f70000;" disabled>
                
                <?php }else{ ?>

                    <input value="<?=@$veiculo->getTipo()->getNome()?>" disabled>

                <?php } ?>
            </div>
            <div class="item_caixa_veiculo">
                <label> Marca </label>
                <?php if($veiculo->getMarca()->getStatus() == 0){?>
                    <input value="<?=@$veiculo->getMarca()->getNome()?>" title="Marca desativada" style="border-color: #f70000;" disabled>
                <?php }else{?>
                    <input value="<?=@$veiculo->getMarca()->getNome()?>" disabled>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="caixa_aprovacao">
        <button onclick="chamaModalAprovar(<?=@$veiculo->getId()?>)"> Aprovar</button>
        <button onclick="chamaModalReprovar(<?=@$veiculo->getId()?>)"> Reprovar</button>
    </div>
</div>
<link rel="stylesheet" type="text/css" href="view/cms/css/veiculos_pendentes.css">
<script  src="view/cms/veiculos/veiculos_pendentes.js"></script>