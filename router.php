<?php

    $controller = null;
    $modo = null;

    //perguntar para o Marcel pq isso aqui HAHAHA!hum?
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
                   case "DESLOGAR":
                        
                        $controller_usuario->deslogar();
                        
                        break;
                }
 
                break;
              /* Tipo de veiculo */
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
                        case "EXCLUIR":
                            
                            $controller_tipo_veiculo->excluir_tipo();
                            
                            break;
                        case "SELECT":
                            
                            $tipo = $controller_tipo_veiculo->getById();

                            require_once('view/cms/veiculos/tipo_veiculo.php');

                            break;
                        case "FIP_EXPORTAR":

                            $controller_tipo_veiculo->exportar_fip();

                            break;
                        case "JSON_MARCAS":

                            $Listamarcas = $controller_tipo_veiculo->listar_marcas(); 
                            $lista = array();   
                            foreach($Listamarcas as $marca){
                                $lista[]= $marca->to_json();
                            }
                            echo json_encode($lista);
                            break;
                    }
                
                break;
            /* Modelos de veiculos */
            case "MODELOS":
                    
                    require_once("controller/controllerModelos.php");
                    $controller_modelos = new ControllerModelos();

                    switch($modo){
                        case "INSERIR":
                            
                            $controller_modelos->inserir_modelo();

                            break;
                        case "ATUALIZAR":
                            
                            $controller_modelos->atualizar_modelo();

                            break;
                        case "EXCLUIR":
                            
                            $controller_modelos->excluir_modelo();
                            
                            break;
                        case "ALTERARSTATUS":

                            $controller_modelos->status_modelo();
                            
                            break;
                        case "SELECT":
                            
                            $modelo = $controller_modelos->getById();

                            require_once('view/cms/veiculos/modelos/modal_criar_editar.php');

                            break;
                    }
                
                break;
                /* Marcas de Veiculos */
                case "MARCAS":
                    
                    require_once("controller/controllerMarcas.php");
                    $controller_marcas = new ControllerMarcas();

                    switch($modo){
                        case "INSERIR":
                            
                            $controller_marcas->inserir_marca();

                            break;
                        case "ATUALIZAR":
                            
                            $controller_marcas->atualizar_marca();

                            break;
                        case "EXCLUIR":
                            
                            $controller_marcas->excluir_marca();
                            
                            break;
                        case "ALTERARSTATUS":

                            $controller_marcas->status_marca();
                            
                            break;
                        case "SELECT":
                            
                            $marca = $controller_marcas->getById();

                            require_once('view/cms/veiculos/marcas/modal_criar_editar.php');

                            break;
                    }
                
                break;
                /* Acessorios de Veiculos */
                case "ACESSORIOS":
                    
                    require_once("controller/controllerAcessorios.php");
                    $controller_acessorios = new ControllerAcessorios();

                    switch($modo){
                        case "INSERIR":

                            $controller_acessorios->inserir_acessorio();

                            break;
                        case "ATUALIZAR":

                            $controller_acessorios->atualizar_acessorio();

                            break;
                       case "EXCLUIR":
                            
                            $controller_acessorios->excluir_acessorio();

                            break;
                       case "ALTERARSTATUS":

                            $controller_acessorios->status_acessorio();
                            
                            break;
                    }
                
                break;
                /* Veiculos */
                case "VEICULOS":
                    
                    require_once("controller/controllerVeiculo.php");
                    $controller_veiculos = new ControllerVeiculos();

                    switch($modo){
                        case "INSERIR":

                            $controller_veiculos->inserir_veiculo();

                            break;
                        case "ATUALIZAR":

                            $controller_veiculos->atualizar_veiculo();

                            break;
                       case "APROVAR":

                            $controller_veiculos->aprovar_veiculo();

                            break;
                       case "REPROVAR":

                            $controller_veiculos->reprovar_veiculo();

                            break;
                    }
                
                break;
                /* CRUD DE Clientes(painel Usuario) */
                case "CLIENTES":
                    
                    require_once("controller/controllerClientes.php");
                    $controller_clientes = new ControllerClientes();

                    switch($modo){
                        case "INSERIR":
                            
                            $controller_clientes->inserir_cliente();

                            break;
                        case "ATUALIZAR":
                            
                            $controller_clientes->atualizar_cliente();

                            break;
                        case "SELECT":
                            
                            $cliente = $controller_clientes->getById();

                            require_once('view/cms/veiculos/marcas/modal_criar_editar.php');

                            break;
                        case "LOGAR":
                           $controller_clientes->logar();
                            break;
                        case "STATUS":
                           echo($controller_clientes->status());
			   break;
                    }
                        
                
                break;
                /* PAGINA SEJA PARCEIRO TOPICOS */
                case "SEJA_PARCEIRO_TOPICOS":
                    
                    require_once("controller/controllerSejaParceiro.php");
                    $controller_seja_parceiro = new ControllerSejaParceiro();

                    switch($modo){
                        case "INSERIR":
                            
                            $controller_seja_parceiro->inserir_topico();

                            break;
                        case "ATUALIZAR":
                            
                            $controller_seja_parceiro->atualizar_seja_parceiro();

                            break;
                        case "EXCLUIR":
                            
                            $controller_seja_parceiro->excluir_topico();
                            
                            break;
                    }
                
                break;
                /* CRUD DE Anuncios */
                case "ANUNCIOS":
                    
                    require_once('controller/controllerAnuncios.php');

                   $controller_anuncio =  new ControllerAnuncios();

                    switch($modo){
                        case "INSERIR":
                            
                            $controller_anuncio->inserir_anuncio();

                            break;
                        case "ATUALIZAR":
                            
                            $controller_anuncio->atualizar_anuncio();

                            break;
                        case "APROVAR":

                            $controller_anuncio->aprovar_anuncio();

                            break;
                        case "REPROVAR":
                                
                            $controller_anuncio->reprovar_anuncio();
                                
                            break;
                    }
                
                break;

                /* HOME */
                case "HOME":
                
                require_once('controller/controllerHome.php');

                $controller_home = new controllerHome();
              
                switch($modo){
                    case "ATUALIZAR":
                         
                         $controller_home->atualizar_home();
                         
                         break;
                    case "ESCONDER":
                    
                         $controller_home->esconder_home();

                         break;
                }
 
                break;

                /* Faq */
                case 'FAQ':
                
                require_once('controller/controllerFaq.php');

                $controller_faq = new ControllerFaq();

                
                switch($modo){
                    case "INSERIR":
                        
                        $controller_faq->inserir_faq();

                        
                        break;
                    case "ATUALIZAR":
                         
                         $controller_faq->atualizar_faq();
                         
                         break;
                    case "EXCLUIR":
                         $controller_faq->excluir_faq();
                         break;
                    case "SELECTALL":

                        $listFaq =  $controller_faq->listar_faq();

                        require_once('view/cms/pagina_faq/tabela.php');

                        break;
                   case "SELECT":
                        
                        $faq = $controller_faq->getById();
                        require_once('view/cms/pagina_faq/cadastrar.php');
                        break;
                }
 
                break;

                /*sobre*/

                case 'SOBRE':
                
                require_once('controller/controllerSobre.php');

                $controller_sobre = new ControllerSobre();
              
                switch($modo){
                    case "INSERIR":
                        
                        $controller_sobre->inserir_sobre();

                        
                        break;
                    case "ATUALIZAR":
                         
                         $controller_sobre->atualizar_sobre();
                         
                         break;
                    case "EXCLUIR":
                         $controller_sobre->excluir_sobre();
                         break;
                    case "SELECTALL":

                        $listSobre =  $controller_sobre->listar_sobre();

                        require_once('view/cms/pagina_sobre_nos/pagina_sobre_nos.php');

                        break;
                   case "SELECT":
                        
                        $sobre = $controller_sobre->getById();
                        
                        require_once('view/cms/pagina_sobre_nos/cadastro_historia.php');
                            
                        require_once('view/cms/pagina_sobre_nos/cadastro_visao_missao_valores');
                        break;
                }
 
                break;

                /*COMO GANHAR DINHEIRO*/

                case 'COMO_GANHAR_DINHEIRO':
                
                require_once('controller/controllerComo_ganhar_dinheiro.php');

                $controller_como_ganhar_dinheiro = new ControllerComo_ganhar_dinheiro();
              
                switch($modo){
                    case "INSERIR":
                        
                        $controller_como_ganhar_dinheiro->inserir_como_ganhar_dinheiro();

                        
                        break;
                    case "ATUALIZAR":
                         
                         $controller_como_ganhar_dinheiro->atualizar_como_ganhar_dinheiro();
                         
                         break;
                    case "EXCLUIR":
                         $controller_como_ganhar_dinheiro->excluir_como_ganhar_dinheiro();
                         break;
                    case "SELECTALL":

                        $listComo_ganhar_dinheiro =  $controller_como_ganhar_dinheiro->listar_como_ganhar_dinheiro();

                        require_once('view/cms/pagina_como_ganhar_dinheiro/tabela.php');

                        break;
                   case "SELECT":
                        
                        $como_ganhar_dinheiro = $controller_como_ganhar_dinheiro->getPage();
                        require_once('view/cms/pagina_como_ganhar_dinheiro/cadastrar.php');
                        break;
                }
 
                break;
                case "FALE_CONOSCO":
                     require_once('controller/controllerFale_conosco.php');
                     $controller_fale_conosco = new ControllerFale_conosco();
                     switch($modo){
                           case "INSERIR":
                                $controller_fale_conosco->inserir_fale_conosco();
                                break;
                                case "ATUALIZAR":
                         
                         $controller_fale_conosco->atualizar_fale_conosco();
                         
                         break;
                    case "EXCLUIR":
                    
                         $controller_fale_conosco->excluir_fale_conosco();
                         break;
                    case "SELECTALL":

                        $listFale_conosco =  $controller_fale_conosco->listar_fale_conosco();

                        require_once('view/cms/pagina_fale_conosco/tabela.php');

                        break;
                   case "SELECT":

                        $fale_conosco = $controller_fale_conosco->getById();
                        require_once('view/cms/pagina_fale_conosco/cadastrar.php');
                        break;
                     
            
                }
                break;

                /*Termo de Uso*/
                case ($controller == 'TERMOS' || $controller == "TERMOS_USO"):
                echo "estou na controller termos";
                require_once('controller/controllerTermos_uso.php');

                $controller_termos_uso = new ControllerTermos_uso();

                switch($modo){
                    case "INSERIR":

                        $controller_termos_uso->inserir_termos_uso();

                        break;
                    case "ATUALIZAR":

                         $controller_termos_uso->atualizar_termos_uso();

                         break;
                    case "EXCLUIR":

                         $controller_termos_uso->excluir_termos_uso();
                         break;
                    case "SELECTALL":

                        $listTermos_uso =  $controller_termos_uso->listar_termos_uso();

                        require_once('view/cms/pagina_termos_uso/tabela.php');

                        break;
                   case "SELECT":

                        $termos_uso = $controller_termos_uso->getById();
                        require_once('view/cms/pagina_termos_uso/cadastrar.php');
                        break;
                }

                break;
                /*Email Marketing*/
                case "EMAIL_MARKETING":
                
                   require_once('controller/controllerEmail_marketing.php');

                   $controller_email_marketing = new ControllerEmail_marketing();
              
                   switch($modo){
                      case "ENVIAR":

                         $controller_email_marketing->enviar();

                         break;
                       case "INSERIR":

                         $controller_email_marketing->inserir();

                         break;
                    }
 
                break;
                
        }
      
        
    }
?>
