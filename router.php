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

                    case 'BUSCAR':
                        
                        $Niveis = $controller_niveis->buscar_nivel();
                        require_once('view/cms/niveis/cadastro_niveis.php');
                        break; 
                    break;
                    case "SELECTALL":
                        //INSTANCIANDO A CLASS CONTROLLERNIVEIS.PHP btn_padrao
                        $listar_niveis = new ControllerNiveis();
                        //$listar_niveis recebendo O OBJETO DE RETORNO DO METODO LISTAR_NIVEIS()
                        $lista = $listar_niveis->listar_niveis();

                       if(!isset($_GET['json'])){
                            
                            require_once('view/cms/niveis/tabela.php');

                       }else{
                           
                           $listaJSON = array();
                           
                           foreach($lista as $nivel){

                                $listaJSON[] = $nivel->json_parse();

                           }

                           echo json_encode($listaJSON);
                       }

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
                        require_once('view/cms/usuarios/cadastro_usuarios.php');
                }
 
                break;
        }
      
        
    }
?>