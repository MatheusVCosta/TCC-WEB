<?php
    
    // Controla o controller e o modo par aa submição do formulario
    $action = "router.php?controller=acessorios&modo=inserir&id_tipo_veiculo=" . $_GET['id_tipo_veiculo'];
    
    // Dados do formulario
    $titulo = "Cadastrar Acessorio";
    $submit = "acessorios_insert(this)";
    $nome   = "";

    // Verifica se ele quer editar um modelo existente!
    if(isset($_GET['id_acessorios'])){
    
        require_once("controller/controllerAcessorios.php");

        $controllerAcessorios = new ControllerAcessorios();

        $acessorio = $controllerAcessorios->getById($_GET['id_acessorios']);
        $titulo = " Editar Acessorio ";
        
        
        // alerando modo para atualizar
        $action = "router.php?controller=acessorios&modo=atualizar&id_acessorios=" . $_GET['id_acessorios'];
        
        $submit = "acessorios_uptade(this)";

        $nome   = $acessorio->getNome();
    }
    
?>
<form id="frmAcessorio" action="<?=$action?>" data-idTipo="<?=@$_GET['id_tipo_veiculo']?>" onsubmit="<?=@$submit?>"> 

    <div class="modal_modelos_crud">
        <h3> <?=@$titulo?> </h3>
        <div class="campo">
            <label> Nome do acessorio </label>
            <input type="text" name="nome" maxlength="50" value="<?=@$nome?>" required>
        </div>
        <div class="campo">
            <button type="submit"> Salvar </button>
        </div>
    </div>
</form>
