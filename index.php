<?php
	
	/* Atenção só não melhorei isso para que todos comprendesem !! */
	/*  
		Faz o redirecionamento de pagina baseado no primeiro parametro
		Exemplo:
			ir Home	= $.get('?home') ou $.get('?home.php') ou $.get('?home.html')
			ir CMS	= $.get('?cms/home') ou $.get('?cms/home.php') ou $.get('?cms/home.html')
	*/
	if(count($_GET)>=1){// Verifica se foi passado um parametro 
		
		//Pegando o primeiro atributo get /?home ou /?home.php ou /?home.html

		$nome_pagina = array_keys($_GET)[0];// Seria bom se verificase se em um valor!!


		// Verificando ?pagina
		if(file_exists( 'view/'.$nome_pagina.'.php' )){
			
			require_once( 'view/'. $nome_pagina .'.php');
		
		// Verificando se foi passado ?pagina.php
		}else if(file_exists( 'view/' . substr($nome_pagina, 0 , -4).'.php' )){
			
			require_once('view/' . substr($nome_pagina, 0 , -4).'.php');
			
		// Verificando se não é um arquivo html 
		}else if(file_exists( 'view/' . $nome_pagina . '.html')){

			require_once( 'view/'. $nome_pagina .'.html');
		
		// Verificando se não e um html passado com . /?home.html
		}else if(file_exists( 'view/' . substr($nome_pagina, 0 , -5).'.html' )){
			
			require_once('view/' . substr($nome_pagina, 0 , -5).'.html');
		
		//Seria bom se eu  implementase pelo menos mais 1 
		}else{

			echo "<pre> Pagina não Encontrada!! </pre>";

		}
	
	//Pega a home caso nenhum atrubuto tenha sido passado
	}else{

		require_once("view/home.php");
	}

?>
