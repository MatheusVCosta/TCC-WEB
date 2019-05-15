function abrir_menu(nome_pagina){
    
   event.preventDefault();
    
   $.ajax({
    type:"POST",
    url:"?painel_usuario/"+nome_pagina,
    success:function(dados){
        $("#conteudo").html(dados)
        
    }

   });
}

