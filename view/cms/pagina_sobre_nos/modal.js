function chamaModalCadastroHistoria(){
    $.ajax({
        type:'POST',
        url:'?cms/pagina_sobre_nos/cadastro_historia.php',
        success:function(resposta){
            modal(resposta);
        }
    });   
}

function chamaModalCadastroVisao(){
    $.ajax({
        type:'POST',
        url:'?cms/pagina_sobre_nos/cadastro_visao_missao_valor.php',
        success:function(resposta){
            modal(resposta);
        }
    });   
}
function editar_sobre(modo){
    $.ajax({
        type:'GET',
        url:'?cms/pagina_sobre_nos/cadastro_visao_missao_valor.php&modo='+modo,
        success:function(resposta){
            modal(resposta);
        }
    })
}

function editar_sobre_submit(form){
     var submetido = ($(form).attr('data-submit') || 0) * 1;
   

  //Efita o lopp do ajaxForm (DIFICIL DE EXPLICAR)!Quando damos submit() no ajaxForm ele chama o onsubmit do formulario e então retorna para essa função que cria o reinvia acedentalmente
   if(submetido == 1){

      return true;

   }else{
     
     $(form).attr('data-submit','1');

   }

   event.preventDefault();
    
   var form = $(form);
    
//    $(form).find('fieldset,button').hide(200);
//    $(form).css({'background-image':'url(view/imagem/loading.svg)'});
//    $(form).append("<p style='text-align: center; color: #888888; bottom: 0; position: absolute; width: 100%; left: 0;'> Carregando.. </p>");
   
   // Envia os dados do formulario
   $(form)
   .ajaxForm({
       success:function(resposta){
         console.log("RESPOSTA",resposta);
         
         if(resposta.toString().search('sucesso')>=0){

           $.notify("Visao atualizada com sucesso", "success");
           
           // Redirecionando o usuario depois da menssagem de sucesso aparecer
           setTimeout(function(){
             fecharModal();
             conteudo_subMenu('pagina_sobre_nos/pagina_sobre_nos',true)
             //Redirecionando
//              window.location = "?painel_usuario/home.php";


           },800)

         }
       },
   }).submit();
}