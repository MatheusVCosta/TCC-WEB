<?php

    $controller = null;
    $modo = null;

    //perguntar para o Marcel pq isso aqui HAHAHA
    if(isset($_REQUEST['controller'])){
        $controller = strtoupper($_GET['controller']);
        $modo = strtoupper($_GET['modo']);

        switch($controller){
            
            case 'NIVEIS':
                //importando a controller de niveis
                require_once('controller/controllerNiveis.php');
                //instanciando a class controllerNiveis
                $controller_niveis = new ControllerNiveis();
                
                switch($modo){
                    
                    case 'INSERIR':
                        $controller_niveis->inserir_niveis();                        
                        break;
                    case 'ATUALIZAR':
                        $controller_niveis->atualizar_niveis();
                    break;
                    case 'EXCLUIR':
                        $controller_niveis->excluir_nivel();
                    break;
                    case "SELECTALL":

                        $lista_niveis =  $controller_niveis->listar_niveis();

                        require_once('view/cms/niveis/tabela.php');

                    break;
                    case 'BUSCAR':
                        $Niveis = $controller_niveis->buscar_nivel();
                        require_once('view/cms/niveis/cadastro_niveis.php');
                        break; 
                    break;
                   
             }
             break;
            /* Usuario */
            case 'USUARIOS':
                
                require_once('controller/controllerUsuarios.php');

                $controller_usuario = new ControllerUsuarios();
                
                

                switch($modo){
                    case "INSERIR":
                        
                        $controller_usuario->inserir_usuarios();

                        
                        break;
                    case "ATUALIZAR":
                         
                         $controller_usuario->atualizar_usuarios();
                         
                         break;
                    case "EXCLUIR":
                         $controller_usuario->excluir_usuarios();
                         break;
                    case "SELECTALL":

                        $listUsuarios =  $controller_usuario->listar_usuarios();

                        require_once('view/cms/usuarios/tabela.php');

                        break;
                   case "SELECT":
                        
                        $usuario = $controller_usuario->getById();
                        require_once('view/cms/usuarios/cadastro.php');
                        break;
                   case "LOGAR":

                        $controller_usuario->logar();

                        break;
                }
 
                break;
              case "TIPO_VEICULO":
                    
                    require_once("controller/controllerTipo_veiculo.php");
                    $controller_tipo_veiculo = new ControllerTipoVeiculo();

                    switch($modo){
                        case "INSERIR":
                            
                            $controller_tipo_veiculo->inserir_tipo();

                            break;
                        case "ATUALIZAR":
                            
                            $controller_tipo_veiculo->atualizar_tipo();

                            break;
                        case "SELECT":
                            
                            $tipo = $controller_tipo_veiculo->getById();

                            require_once('view/cms/veiculos/tipo_veiculo.php');

                            break;
                    }
                
                break;
        }
      
        
    }
?>