

/* Funções que chamam a modal para criar ou editar um topico */
function pagina_topico_criar(){
    $.get('?cms/pagina_seja_parceiro/modal_topicos.php')
    .then(function(resposta){
        modal(resposta);
    })
}
function pagina_topico_editar(id_topico){
    $.get('?cms/pagina_seja_parceiro/modal_topicos.php&id='+id_topico)
    .then(function(resposta){
        modal(resposta);
    })
}

/* CRUD de topico*/
function pagina_topico_insert(form){

   var submetido = ($(form).attr('data-submit') || 0) * 1;
   

  //Efita o lopp do ajaxForm (DIFICIL DE EXPLICAR)!Quando damos submit() no ajaxForm ele chama o onsubmit do formulario e então retorna para essa função que cria o reinvia acedentalmente
   if(submetido == 1){
      
      $(form).attr('data-submit','0');
      
      return true;

   }else{
     
     $(form).attr('data-submit','1');

   }

   event.preventDefault();
    
   var form = $(form);
    
   $(form).find('*').hide(200);
   $(form).css({'background-image':'url(view/imagem/loading.svg)',
                'background-repeat': 'no-repeat',
                'background-position':'center'});

   $(form).append("<p style='text-align: center; color: #888888; bottom: 0; position: absolute; width: 100%; left: 0;'> Carregando.. </p>");
   
   // Envia os dados do formulario
   $(form)
   .ajaxForm({
       success:function(resposta){
         console.log("RESPOSTA",resposta);
         
         if(resposta.toString().search('sucesso')>=0){

           $.notify("Topico cadastrado com sucesso", "success");
           
           // Redirecionando o usuario depois da menssagem de sucesso aparecer
           setTimeout(function(){
             
             fecharModal();

             conteudo_subMenu('pagina_seja_parceiro/pagina_seja_parceiro.php');


           },800)

         }
       },
   }).submit();
}
function pagina_topico_update(){

  var submetido = ($(form).attr('data-submit') || 0) * 1;
   

  //Efita o lopp do ajaxForm (DIFICIL DE EXPLICAR)!Quando damos submit() no ajaxForm ele chama o onsubmit do formulario e então retorna para essa função que cria o reinvia acedentalmente
  if(submetido == 1){
      
      $(form).attr('data-submit','0');
      
      return true;

   }else{
     
     $(form).attr('data-submit','1');

   }

   event.preventDefault();
    
   var form = $(form);
    
   $(form).find('*').hide(200);
   $(form).css({'background-image':'url(view/imagem/loading.svg)',
                'background-repeat': 'no-repeat',
                'background-position':'center'});

   $(form).append("<p style='text-align: center; color: #888888; bottom: 0; position: absolute; width: 100%; left: 0;'> Carregando.. </p>");
   
   // Envia os dados do formulario
   $(form)
   .ajaxForm({
       success:function(resposta){
         console.log("RESPOSTA",resposta);
         
         if(resposta.toString().search('sucesso')>=0){

           $.notify("Topico atualizado com sucesso", "success");
           
           // Redirecionando o usuario depois da menssagem de sucesso aparecer
           setTimeout(function(){
             
             //fecharModal();

             conteudo_subMenu('pagina_seja_parceiro/pagina_seja_parceiro.php');


           },800)

         }
       },
   }).submit();
}
function pagina_topico_delete(id_topico){
  $.ajax({
    url:'router.php?controller=SEJA_PARCEIRO_TOPICOS&modo=EXCLUIR&id='+id_topico,
  }).then(function(resposta){
    console.log(resposta);
    if(resposta.toString().search('sucesso')){

      $.notify("Topico Removido com sucesso", "success");
      conteudo_subMenu('pagina_seja_parceiro/pagina_seja_parceiro.php');
    
    }
  });
}
/* mostra como ficara a imagem uplada */
function mostraImagemTopico(input){
  var file = input.files[0];

  var reader = new FileReader();

  reader.onloadend = function() {
     $(input).parent().find('.imagem_foto').css({'background-image':'url("'+ reader.result +'")'});
  }

  reader.readAsDataURL(file);
}
var formularioBanner = 0;
/*funções que cuidam da edição do painel IMG > conteudo < IMG*/
function sejaParceirotornarEditavel(){
    /* Coloca a propriedade  contenteditable em todos os elementos par aque sejam editaveis */
    $('.seja-parceiro-painel-parceiros-conteudo-conteudo div').attr('contenteditable','true');
    $('.seja-parceiro-painel-parceiros-conteudo-conteudo button').attr('contenteditable','true');

    $('.seja-parceiro-painel-parceiros-conteudo-conteudo div[contenteditable]').focus();
    $('.seja-parceiro-painel-parceiros-conteudo-conteudo div[contenteditable]').click();
    $('.seja-parceiro-painel-parceiros-conteudo-conteudo div[contenteditable]').attr('autofocus','true');

    $('#seja-parceiro-btnSalvar').show(350);
}
/* Salva uma imagem do lados IMG > < IMG */
function sejaParceiroSalvarImagem(lado,img){
    
    var file;

    if(formularioBanner == 0){

      formularioBanner = $('<form  method="post" enctype="multipart/form-data" action="router.php?controller=SEJA_PARCEIRO_TOPICOS&modo=ATUALIZAR&banner"></form>');
    
      formularioBanner.append('<input type="file" name="foto'+ lado +'">');
      
      file = formularioBanner.find('input[type="file"][name="foto'+ lado +'"]');

    }else if(formularioBanner.find('input[type="file"][name="foto'+ lado +'"]')[0]){

      file = formularioBanner.find('input[type="file"][name="foto'+ lado +'"]');

    }else{

      formularioBanner.append('<input type="file" name="foto'+ lado +'">');
      
      file = formularioBanner.find('input[type="file"][name="foto'+ lado +'"]');
    
    }

    file.change(function(){
      
      var imagem = file[0].files[0];

      var reader = new FileReader();

      reader.onloadend = function() {
         $(img).parent().find('img').attr('src',reader.result);
         $('#seja-parceiro-btnSalvar').show(350);
      }

      reader.readAsDataURL(imagem);
    }).click();

}
function sejaParceiroEsconder(status){

  if(status == 0){
    status = 1;
  }else{
    status = 0;
  }
  $.ajax({url:'router.php?controller=SEJA_PARCEIRO_TOPICOS&modo=ATUALIZAR&banner',
          method:'POST',
          type:'POST',
          data:{
              status
          },
          success:function(resposta){
              console.log(resposta);
              if(resposta.toString().search('sucesso')>=0){

                 $.notify("Banner Atualizado com sucesso", "success");

                 // Redirecionando o usuario depois da menssagem de sucesso aparecer
                 setTimeout(function(){

                   conteudo_subMenu('pagina_seja_parceiro/pagina_seja_parceiro.php');

                 },800)

               }
          }
        })
}
/* Salva todo o conteudo IMG > CONTEUDO < IMG*/
function sejaParceiroSalvarPainel(){

  if(formularioBanner == 0)formularioBanner = $('<form  method="post" enctype="multipart/form-data" action="router.php?controller=SEJA_PARCEIRO_TOPICOS&modo=ATUALIZAR&banner"></form>');

    // Verifica se e para editar o conteudo do centro
  if($('.seja-parceiro-painel-parceiros-conteudo-conteudo div[contenteditable]')[0]){

    var texto1 = $('.seja-parceiro-painel-parceiros-conteudo-conteudo div[contenteditable]')[0].innerHTML;
    var texto2 = $('.seja-parceiro-painel-parceiros-conteudo-conteudo div[contenteditable]')[1].innerHTML;
    
    formularioBanner.append('<textarea name="texto1"></textarea>');
    formularioBanner.find('[name="texto1"]').text(texto1);

    formularioBanner.append('<textarea name="texto3"></textarea>')
    formularioBanner.find('[name="texto3"]').text(texto2);
    
    var textoBotao = $('.seja-parceiro-painel-parceiros-conteudo-conteudo button[contenteditable]')[0].innerHTML;

    formularioBanner.append('<input type="text" name="texto2">')
    formularioBanner.find('[name="texto2"]').val(textoBotao);
  }

  //console.log("FORM : ",formularioBanner.serialize());
  $(formularioBanner)
   .ajaxForm({
       success:function(resposta){
         console.log("RESPOSTA",resposta);
         
         if(resposta.toString().search('sucesso')>=0){

           $.notify("Banner Atualizado com sucesso", "success");
           
           // Redirecionando o usuario depois da menssagem de sucesso aparecer
           setTimeout(function(){
             
             conteudo_subMenu('pagina_seja_parceiro/pagina_seja_parceiro.php');


           },800)

         }
       },
   }).submit();

}