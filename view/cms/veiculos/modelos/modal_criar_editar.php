<?php
    
    require_once("controller/controllerTipo_veiculo.php");

    // Controla o controller e o modo par aa submição do formulario
    $action = "router.php?controller=modelos&modo=inserir";
    
    // Pegando marcas do tipo de veiculo
    $controllerTipo_veiculo = new ControllerTipoVeiculo();
    $listaMarcas = $controllerTipo_veiculo->listar_marcas();

    // Dados do formulario
    $titulo = "Cadastrar Modelos";
    $submit = "modelo_insert(this)";
    $nome   = "";

    // Verifica se ele quer editar um modelo existente!
    if(isset($_GET['id_modelo'])){
    
        require_once("controller/controllerModelos.php");

        $controllerModelos = new ControllerModelos();

        $modelo = $controllerModelos->getById($_GET['id_modelo']);
        $titulo = " Editar Modelo ";

        $modo = "atualizar";
        
        // alerando modo para atualizar
        $action = "router.php?controller=modelos&modo=atualizar&id=" . $_GET['id_modelo'];
        $submit = "modelo_update(this)";

        $nome   = $modelo->getNome();
    }
    
?>
<form id="frmModelos" action="<?=$action?>" data-idTipo="<?=@$_GET['id']?>" onsubmit="<?=@$submit?>"> 

    <div class="modal_modelos_crud">
        <h3> <?=@$titulo?> </h3>
        <?php if(count($listaMarcas)<1){ ?>
            <img class="img_not_find" alt='Nada encontrado' src='view/imagem/magnify.gif'>
            <p class='aviso_tabela'> Nenhuma marca encontrada! Cadastre uma</p>
            <div class="campo">
                <button type="button" onclick="marca_adicionar(<?=@$_GET['id']?>)"> Cadastrar Marca </button>
            </div>
        <?php } else { ?>
            <div class="campo">
                <label>Marca:</label>
                <select name="id_tipo_marca" required>
                    <?php foreach($listaMarcas as $marca){ ?>
                          
                          <?php if($marca->getStatus() == 1){ ?>

                              <option value="<?=@$marca->getIdTipoMarca()?>"
                              <?php if(isset($modelo) && $modelo->getIdTipoMarca() == $marca->getIdTipoMarca())echo "selected";?>>
                                    <?=@$marca->getNome()?>
                              </option>

                          <?php } ?>

                    <?php } ?>
                </select>
            </div>
            <div class="campo">
                <label> Nome do modelo </label>
                <input type="text" name="nome" maxlength="50" value="<?=@$nome?>" required>
            </div>
            <div class="campo">
                <button type="submit"> Salvar </button>
            </div>
        <?php } ?>
    </div>
</form>