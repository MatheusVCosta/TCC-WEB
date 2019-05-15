/* HOME  Banner */
var formBanner = 0;
function home_banner_editavel(){
    
    var painel = $('.home-painel-banner');

    painel.find('.home-painel-banner-texto-primario').attr('contenteditable','true');
    painel.find('.home-painel-banner-texto-secundario').attr('contenteditable','true');

    //painel.find('.home-painel-banner-btn_anunciar').attr('contenteditable','true');

    painel.find('.home-painel-banner-texto-secundario').focus();
    painel.find('.home-painel-banner-texto-secundario').click();
    painel.find('.home-painel-banner-texto-secundario').attr('autofocus','true');

    painel.find('.home-operacoes .home-btnSalvar').show(350);
}
function home_banner_imagem(){

    var painel = $('.home-painel-banner');

    var file;

    if(formBanner == 0){

      formBanner = $('<form  method="post" enctype="multipart/form-data" action="router.php?controller=HOME&modo=ATUALIZAR&banner"></form>');
    
      formBanner.append('<input type="file" name="foto">');
      
      file = formBanner.find('input[type="file"][name="foto"]');

    }else if(formBanner.find('input[type="file"][name="foto"]')[0]){

      file = formBanner.find('input[type="file"][name="foto"]');

    }else{

      formBanner.append('<input type="file" name="foto">');
      
      file = formBanner.find('input[type="file"][name="foto"]');
    
    }

    file.change(function(){
      
      var imagem = file[0].files[0];

      var reader = new FileReader();

      reader.onloadend = function() {
         
         painel.find('.home-painel-banner-imagem img').attr('src',reader.result);

         painel.find('.home-operacoes .home-btnSalvar').show(350);
      }

      reader.readAsDataURL(imagem);

    }).click();
}
/* Função para salvar */
/* Salva todo o conteudo e as imagens */
function home_banner_salvar(){

   var form = formBanner;

  if(form == 0)form = $('<form  method="post" enctype="multipart/form-data" action="router.php?controller=HOME&modo=ATUALIZAR&banner"></form>');

  // Verifica se e para editar o conteudo do centro
  if($('.home-painel-banner-texto-primario[contenteditable]')[0]){
    console.log("Chegou ");
    var texto_primario = $('.home-painel-banner-texto-primario')[0].innerHTML;
    var texto_secundario = $('.home-painel-banner-texto-secundario')[0].innerHTML;
    
    form.append('<input type="text" name="texto">');
    form.find('[name="texto"]').val(texto_primario);

    form.append('<input type="text" name="texto2">');
    form.find('[name="texto2"]').val(texto_secundario);
    
  }
  //console.log("FORM : ",formularioBanner.serialize());
  $(form)
   .ajaxForm({
       success:function(resposta){
         console.log("RESPOSTA",resposta);
         
         if(resposta.toString().search('sucesso')>=0){

           $.notify("Banner Atualizado com sucesso", "success");
           
           // Redirecionando o usuario depois da menssagem de sucesso aparecer
           setTimeout(function(){
             
             conteudo_subMenu('pagina_home/pagina_home.php');


           },800)

         }
       },
   }).submit();

}

/* Funções da sessão como funciona */
var formComoFunciona = 0;
function home_como_funciona_editavel(){

    var painel = $('.home-painel-como-funciona');

    painel.find('.home-painel-como-funciona-titulo').attr('contenteditable','true');
    painel.find('.home-painel-como-funciona-texto').attr('contenteditable','true');

    painel.find('p,h1,h2,h3,h4,li,ul').attr('contenteditable','true');

    painel.find('.home-painel-como-funciona-titulo').focus();
    painel.find('.home-painel-como-funciona-titulo').click();
    painel.find('.home-painel-como-funciona-titulo').attr('autofocus','true');

    painel.find('.home-operacoes .home-btnSalvar').show(350);
}
function home_como_funciona_imagem(){

    var painel = $('.home-painel-como-funciona');

    var file;

    if(formComoFunciona == 0){

      formComoFunciona = $('<form  method="post" enctype="multipart/form-data" action="router.php?controller=HOME&modo=ATUALIZAR&sessao_como_funciona"></form>');
    
      formComoFunciona.append('<input type="file" name="foto">');
      
      file = formComoFunciona.find('input[type="file"][name="foto"]');

    }else if(formComoFunciona.find('input[type="file"][name="foto"]')[0]){

      file = formComoFunciona.find('input[type="file"][name="foto"]');

    }else{

      formComoFunciona.append('<input type="file" name="foto">');
      
      file = formComoFunciona.find('input[type="file"][name="foto"]');
    
    }

    file.change(function(){
      
      var imagem = file[0].files[0];

      var reader = new FileReader();

      reader.onloadend = function() {
         
         painel.find('.home-painel-como-funciona-imagem img').attr('src',reader.result);

         painel.find('.home-operacoes .home-btnSalvar').show(350);
      }

      reader.readAsDataURL(imagem);

    }).click();
}
/* Função para salvar */
/* Salva todo o conteudo e as imagens */
function home_como_funciona_salvar(){

   var form = formComoFunciona;

  if(form == 0)form = $('<form  method="post" enctype="multipart/form-data" action="router.php?controller=HOME&modo=ATUALIZAR&sessao_como_funciona"></form>');

  // Verifica se e para editar o conteudo do centro
  if($('.home-painel-como-funciona-titulo[contenteditable]')[0]){
    console.log("Chegou ");
    var titulo = $('.home-painel-como-funciona-titulo')[0].innerHTML;
    var texto = $('.home-painel-como-funciona-texto')[0].innerHTML;
    
    form.append('<input type="text" name="titulo">');
    form.find('[name="titulo"]').val(titulo);

    form.append('<textarea name="texto"></textarea>')
    form.find('[name="texto"]').val(texto);
    
  }
  //console.log("FORM : ",formularioBanner.serialize());
  $(form)
   .ajaxForm({
       success:function(resposta){
         console.log("RESPOSTA",resposta);
         
         if(resposta.toString().search('sucesso')>=0){

           $.notify("Banner Atualizado com sucesso", "success");
           
           // Redirecionando o usuario depois da menssagem de sucesso aparecer
           setTimeout(function(){
             
             conteudo_subMenu('pagina_home/pagina_home.php')


           },800)

         }
       },
   }).submit();

}
/* Oque pode ser alugado? */
var formPodeSerAlugado = 0;
function home_pode_ser_alugado_editavel(){

    var painel = $('.home-painel-oque-pode-ser');

    painel.find('.home-painel-oque-pode-ser-titulo').attr('contenteditable','true');

    painel.find('.home-painel-oque-pode-ser-topico-titulo,.home-painel-oque-pode-ser-topico-desc').attr('contenteditable','true');

    painel.find('.home-painel-oque-pode-ser-titulo').focus();
    painel.find('.home-painel-oque-pode-ser-titulo').click();
    painel.find('.home-painel-oque-pode-ser-titulo').attr('autofocus','true');

    painel.find('.home-operacoes .home-btnSalvar').show(350);
}
function home_pode_ser_alugado_imagem(lado,mascara){

    var painel = $('.home-painel-oque-pode-ser');

    var file;

    if(formPodeSerAlugado == 0){

      formPodeSerAlugado = $('<form  method="post" enctype="multipart/form-data" action="router.php?controller=HOME&modo=ATUALIZAR&sessao_oque_pode_alugar"></form>');
    
      formPodeSerAlugado.append('<input type="file" name="foto'+lado+'">');
      
      file = formPodeSerAlugado.find('input[type="file"][name="foto'+lado+'"]');

    }else if(formPodeSerAlugado.find('input[type="file"][name="foto'+lado+'"]')[0]){

      file = formPodeSerAlugado.find('input[type="file"][name="foto'+lado+'"]');

    }else{

      formPodeSerAlugado.append('<input type="file" name="foto'+lado+'">');
      
      file = formPodeSerAlugado.find('input[type="file"][name="foto'+lado+'"]');
    
    }

    file.change(function(){
      
      var imagem = file[0].files[0];

      var reader = new FileReader();

      reader.onloadend = function() {
         
         $(mascara).parent().find('img').attr('src',reader.result);

         painel.find('.home-operacoes .home-btnSalvar').show(350);
      }

      reader.readAsDataURL(imagem);

    }).click();
}
function home_pode_ser_alugado_salvar(){

   var form = formPodeSerAlugado;

  if(form == 0)form = $('<form  method="post" enctype="multipart/form-data" action="router.php?controller=HOME&modo=ATUALIZAR&sessao_oque_pode_alugar"></form>');

    // Verifica se e para editar o conteudo do centro
  if($('.home-painel-oque-pode-ser-titulo[contenteditable]')[0]){

    var titulo = $('.home-painel-oque-pode-ser-titulo')[0].innerHTML;
    
    form.append('<input name="titulo">');
    form.find('[name="titulo"]').val(titulo);


    /* Topico 1 */
    var topico1 = $($('.home-painel-oque-pode-ser-topico')[0])

    form.append('<input name="topico1-titulo">');
    form.append('<input name="topico1-texto">');
    form.find('[name="topico1-titulo"]').val(topico1.find('.home-painel-oque-pode-ser-topico-titulo').html());
    form.find('[name="topico1-texto"]').val(topico1.find('.home-painel-oque-pode-ser-topico-desc').html());
    
    /* Topico 2 */
    var topico2 = $($('.home-painel-oque-pode-ser-topico')[1])
    
    form.append('<input name="topico2-titulo">');
    form.append('<input name="topico2-texto">');
    form.find('[name="topico2-titulo"]').val(topico2.find('.home-painel-oque-pode-ser-topico-titulo').html());
    form.find('[name="topico2-texto"]').val(topico2.find('.home-painel-oque-pode-ser-topico-desc').html());

    /* Topico 3 */
    var topico3 = $($('.home-painel-oque-pode-ser-topico')[2])
    
    form.append('<input name="topico3-titulo">');
    form.append('<input name="topico3-texto">');
    form.find('[name="topico3-titulo"]').val(topico3.find('.home-painel-oque-pode-ser-topico-titulo').html());
    form.find('[name="topico3-texto"]').val(topico3.find('.home-painel-oque-pode-ser-topico-desc').html());
  }
  //console.log("FORM : ",formularioBanner.serialize());
  $(form)
   .ajaxForm({
       success:function(resposta){
         console.log("RESPOSTA",resposta);
         
         if(resposta.toString().search('sucesso')>=0){

           $.notify("Banner Atualizado com sucesso", "success");
           
           // Redirecionando o usuario depois da menssagem de sucesso aparecer
           setTimeout(function(){
             
             conteudo_subMenu('pagina_home/pagina_home.php')


           },800)

         }
       },
   }).submit();

}


/* Por que anúnciar seu veículo? */
var formPorQueAnunciar = 0;
function home_por_que_anunciar_editavel(){

    var painel = $('.home-painel-por-que-anunciar');

    painel.find('.home-painel-por-que-anunciar-titulo').attr('contenteditable','true');

    painel.find('.home-painel-por-que-anunciar-desc').attr('contenteditable','true');

    painel.find('.home-painel-por-que-anunciar-titulo').focus();
    painel.find('.home-painel-por-que-anunciar-titulo').click();
    painel.find('.home-painel-por-que-anunciar-titulo').attr('autofocus','true');

    painel.find('.home-operacoes .home-btnSalvar').show(350);
}
function home_por_que_anunciar_imagem(){

    var painel = $('.home-painel-por-que-anunciar');

    var file;

    if(formPorQueAnunciar == 0){

      formPorQueAnunciar = $('<form  method="post" enctype="multipart/form-data" action="router.php?controller=HOME&modo=ATUALIZAR&sessao_por_que_anunciar"></form>');
    
      formPorQueAnunciar.append('<input type="file" name="foto">');
      
      file = formPorQueAnunciar.find('input[type="file"][name="foto"]');

    }else if(formPorQueAnunciar.find('input[type="file"][name="foto"]')[0]){

      file = formPorQueAnunciar.find('input[type="file"][name="foto"]');

    }else{

      formPorQueAnunciar.append('<input type="file" name="foto">');
      
      file = formPorQueAnunciar.find('input[type="file"][name="foto"]');
    
    }

    file.change(function(){
      
      var imagem = file[0].files[0];

      var reader = new FileReader();

      reader.onloadend = function() {
         
         painel.find('.home-painel-por-que-anunciar-img img').attr('src',reader.result);

         painel.find('.home-operacoes .home-btnSalvar').show(350);
      }

      reader.readAsDataURL(imagem);

    }).click();
}
function home_por_que_anunciar_salvar(){

   var form = formPorQueAnunciar;

  if(form == 0)form = $('<form  method="post" enctype="multipart/form-data" action="router.php?controller=HOME&modo=ATUALIZAR&sessao_por_que_anunciar"></form>');

    // Verifica se e para editar o conteudo do centro
  if($('.home-painel-por-que-anunciar-titulo[contenteditable]')[0]){

    var titulo = $('.home-painel-por-que-anunciar-titulo')[0].innerHTML;
    var texto = $('.home-painel-por-que-anunciar-desc')[0].innerHTML;
    
    form.append('<textarea name="titulo"></textarea>');
    form.find('[name="titulo"]').val(titulo);

    form.append('<textarea name="texto"></textarea>')
    form.find('[name="texto"]').val(texto);
    
  }
  //console.log("FORM : ",formularioBanner.serialize());
  $(form)
   .ajaxForm({
       success:function(resposta){
         console.log("RESPOSTA",resposta);
         
         if(resposta.toString().search('sucesso')>=0){

           $.notify("Banner Atualizado com sucesso", "success");
           
           // Redirecionando o usuario depois da menssagem de sucesso aparecer
           setTimeout(function(){
             
             conteudo_subMenu('pagina_home/pagina_home.php');


           },800)

         }
       },
   }).submit();

}

/* Quer anúnciar seu veículo? */
var formQuerAnunciar = 0;
function home_quer_anunciar_editavel(){
    
    var painel = $('.home-painel-quer-anunciar');

    painel.find('.home-painel-quer-anunciar-titulo').attr('contenteditable','true');
    painel.find('.home-painel-quer-anunciar-subtitulo').attr('contenteditable','true');

    painel.find('.home-painel-quer-anunciar-topico-titulo,.home-painel-quer-anunciar-topico-desc').attr('contenteditable','true');

    painel.find('.home-painel-quer-anunciar-titulo').focus();
    painel.find('.home-painel-quer-anunciar-titulo').click();
    painel.find('.home-painel-quer-anunciar-titulo').attr('autofocus','true');

    painel.find('.home-operacoes .home-btnSalvar').show(350);
}
function home_quer_anunciar_imagem(img,lado){

    var painel = $('.home-painel-quer-anunciar');

    var file;

    if(formQuerAnunciar == 0){

      formQuerAnunciar = $('<form  method="post" enctype="multipart/form-data" action="router.php?controller=HOME&modo=ATUALIZAR&sessao_quer_anunciar"></form>');
    
      formQuerAnunciar.append('<input type="file" name="foto'+lado+'">');
      
      file = formQuerAnunciar.find('input[type="file"][name="foto'+lado+'"]');

    }else if(formQuerAnunciar.find('input[type="file"][name="foto'+lado+'"]')[0]){

      file = formQuerAnunciar.find('input[type="file"][name="foto'+lado+'"]');

    }else{

      formQuerAnunciar.append('<input type="file" name="foto'+lado+'">');
      
      file = formQuerAnunciar.find('input[type="file"][name="foto'+lado+'"]');
    
    }

    file.change(function(){
      
      var imagem = file[0].files[0];

      var reader = new FileReader();

      reader.onloadend = function() {
         
         $(img).attr('src',reader.result);

         painel.find('.home-operacoes .home-btnSalvar').show(350);
      }

      reader.readAsDataURL(imagem);

    }).click();
}
function home_quer_anunciar_salvar(){

   var form = formQuerAnunciar;

  if(form == 0)form = $('<form  method="post" enctype="multipart/form-data" action="router.php?controller=HOME&modo=ATUALIZAR&sessao_quer_anunciar"></form>');

    // Verifica se e para editar o conteudo do centro
  if($('.home-painel-quer-anunciar-titulo[contenteditable]')[0]){

    var titulo = $('.home-painel-quer-anunciar-titulo')[0].innerHTML;
    var subtitulo = $('.home-painel-quer-anunciar-subtitulo')[0].innerHTML;
    
    form.append('<input name="titulo">');
    form.find('[name="titulo"]').val(titulo);

    form.append('<textarea name="subtitulo"></textarea>')
    form.find('[name="subtitulo"]').val(subtitulo);

    /* Topico 1 */
    var topico1 = $($('.home-painel-quer-anunciar-topico')[0])

    form.append('<input type="text" name="topico1-titulo">');
    form.append('<input type="text" name="topico1-texto">');
    form.find('[name="topico1-titulo"]').val(topico1.find('.home-painel-quer-anunciar-topico-titulo').html());
    form.find('[name="topico1-texto"]').val(topico1.find('.home-painel-quer-anunciar-topico-desc').html());
    
    /* Topico 2 */
    var topico2 = $($('.home-painel-quer-anunciar-topico')[1])
    
    form.append('<input type="text" name="topico2-titulo">');
    form.append('<input type="text" name="topico2-texto">');
    form.find('[name="topico2-titulo"]').val(topico2.find('.home-painel-quer-anunciar-topico-titulo').html());
    form.find('[name="topico2-texto"]').val(topico2.find('.home-painel-quer-anunciar-topico-desc').html());

    /* Topico 3 */
    var topico3 = $($('.home-painel-quer-anunciar-topico')[2])
    
    form.append('<input type="text" name="topico3-titulo">');
    form.append('<input type="text" name="topico3-texto">');
    form.find('[name="topico3-titulo"]').val(topico3.find('.home-painel-quer-anunciar-topico-titulo').html());
    form.find('[name="topico3-texto"]').val(topico3.find('.home-painel-quer-anunciar-topico-desc').html());

    /* Topico 4 */
    var topico4 = $($('.home-painel-quer-anunciar-topico')[3])
    
    form.append('<input type="text" name="topico4-titulo">');
    form.append('<input type="text" name="topico4-texto">');
    form.find('[name="topico4-titulo"]').val(topico4.find('.home-painel-quer-anunciar-topico-titulo').html());
    form.find('[name="topico4-texto"]').val(topico4.find('.home-painel-quer-anunciar-topico-desc').html());
  }
  //console.log("FORM : ",formularioBanner.serialize());
  $(form)
   .ajaxForm({
       success:function(resposta){
         console.log("RESPOSTA",resposta);
         
         if(resposta.toString().search('sucesso')>=0){

           $.notify("Banner Atualizado com sucesso", "success");
           
           // Redirecionando o usuario depois da menssagem de sucesso aparecer
           setTimeout(function(){
             
             conteudo_subMenu('pagina_home/pagina_home.php');


           },800)

         }
       },
   }).submit();

}

/* FUnção que esconde as sessões */
function home_esconder_sessao(sessao,status){

  if(status == 1)status = 0
  else status = 1;

  $.ajax({url:'router.php?controller=HOME&modo=ESCONDER&'+sessao,
          method:'POST',
          data:{status}
        }).then(function(resposta){
          console.log("Hellow : ",resposta);

          $.notify("Sessao Atualizada com sucesso", "success");
            
          conteudo_subMenu('pagina_home/pagina_home.php');
        })


}