function abrir_menu(nome_pagina){
   $.ajax({
    type:"POST",
    url:"view/painel_usuario/"+nome_pagina,
    success:function(dados){
        $("#conteudo").html(dados)
        
    }

   });
}