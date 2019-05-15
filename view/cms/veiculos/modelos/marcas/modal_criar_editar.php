<?php
    
    // Controla o controller e o modo par aa submição do formulario
    $action = "router.php?controller=marcas&modo=inserir&id_tipo_veiculo=" . $_GET['id_tipo_veiculo'];
    
    // Dados do formulario
    $titulo = "Cadastrar Marca";
    $submit = "marca_insert(this)";
    $nome   = "";
    // Verifica se ele quer editar uma marca
    if(isset($_GET['id_marca'])){
        
        require_once("controller/controllerMarcas.php");
        $controllerMarcas = new ControllerMarcas();
        
        $marca = $controllerMarcas->getById($_GET['id_marca']);

        $submit = "marca_update(this)";
        $action = "router.php?controller=marcas&modo=atualizar&id=" . $_GET['id_marca'];

        //Dados do formulario
        $titulo = "Editar Marca";
        $nome   = $marca->getNome();
        
    }

?>
<form id="frmMarca" action="<?=$action?>" data-idTipo="<?=@$_GET['id_tipo_veiculo']?>" onsubmit="<?=@$submit?>"> 

    <div class="modal_marcas_crud">
        <h3> <?=@$titulo?> </h3>
        <div class="campo">
            <label> Nome da marca </label>
            <input type="text" name="nome" maxlength="50" value="<?=@$nome?>" required>
        </div>
        <div class="campo">
            <button type="submit"> Salvar </button>
        </div>
    </div>
</form>
