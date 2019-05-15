/* Arquivo js Principal */

$.notify.addStyle('classNotify', {
    html: "<div><span data-notify-text/></div>",
    classes: {
        base: {
        "height":"40px",
       
        "padding": "10px 10px 0px 10px",
        "border-radius": "2px", 
        "color": "white",
        "font-family":"OpenSans-Regular",
        },
        classSuccess: {
            "background-color": "#03b85b",
        },
        classError:{
            "background-color": "#ff2020"
        }
    }
    
});

function logar(form){
    event.preventDefault();
    $.post({
        url:$(form).attr('action'),
        data:$(form).serialize(),
    })
    .then(resposta=>{
        console.log("Resposta",resposta);
        if(resposta.toString().search('sucesso')>=0){
            //Se tudo der certo o login será efertuado com sucesso
            //E o menu do cliente ira mudar, assim tendo acesso ao painel de usuario
            headerLogado();
            closeLogin();

           $.notify("Login efetuado com sucesso. Seja bem vindo", {
               style: 'classNotify',
               className: 'classSuccess'
           });
           
        }else{
            $.notify(resposta.toString(), {
                style: 'classNotify',
                className: 'classError'
            });
        }
    })
       
}

function headerLogado(){
    $.ajax({
        type:"GET",
        url:"view/menu/menuLogado.php",
        success:function(dados){
            $(".modoLogin").html(dados);
            console.log(dados)
        }
    })
}
function headerNaoLogado(){
    $.ajax({
        type:"GET",
        url:"view/menu/menuNaoLogado.php",
        success:function(dados){
            console.log(dados)
            $(".modoLogin").html(dados);
        }
    })
}

function efetuarLogin(){
    $('.container').fadeIn(250)
    $.ajax({
        type: "POST",
        url:'?login_usuario.php',
        success:function(callback){
            $(".modal").html(callback);
        }
    });
}


function closeLogin(){
    $('.container').fadeOut(250);
}

function getCadastro(){
    // Redirecionando o usuario para o formualrio de cadastro
    window.location.href = '?cadastro_usuario.php';
}

function fale_conosco_enviar(form){

    event.preventDefault();

    $(form).find('*').hide();
    $('.fale_conosco')
    .css({'background-image':'url(view/imagem/loading.svg)',
          'background-position':'center',
          'background-size':'213px',
          'background-repeat':'no-repeat'});


	$.ajax({
		type:'post',
		method:'post',
		url:$(form).attr('action'),
		data: $(form).serialize(),
		success:function(resposta){

			if(resposta.toString().search('sucesso')>=0){
			   
			   setTimeout(function(){
			       $('.fale_conosco')
                   .css({'background-image':'none',
                         'background-position':'center;',
                         'background-size':'213px',
                         'background-repeat':'no-repeat'});

                   $(form).find('*').show();
			   },600);

               $.notify('Formulario enviado!','success');
			}

		}
	})
}
function email_marketing_enviar(form){
	event.preventDefault();
	$.ajax({
		url:$(form).attr('action'),
		type:'POST',
		method:'POST',
		data:$(form).serialize(),
		success:function(resposta){
			console.log(resposta);
			$(form).find('input[name="txtEmail"]').val('');
			$.notify(" Email cadastrado "," success ");
		}
	})
}
// FUNÇÃO PARA CADASTRA CLIENTE
function mostraImagem64(input){
    var file = input.files[0];
  
    var reader = new FileReader();
  
    reader.onloadend = function() {
       $(input).parent().find('.addFotoCliente').css({'background-image':'url("'+ reader.result +'")'});
    }
    console.log(file);
    reader.readAsDataURL(file);
  }
  
  function clientes_cadastrar(form){ 
     var submetido = ($(form).attr('data-submit') || 0) * 1;
    //Efita o lopp do ajaxForm (DIFICIL DE EXPLICAR)!Quando damos submit() no ajaxForm ele chama o onsubmit do formulario e então retorna para essa função que cria o reinvia acedentalmente
     if(submetido == 1){
        return true;
     }else{ 
       $(form).attr('data-submit','1');
     }
     event.preventDefault();
  
     var form = $(form);
  
     $(form).find('fieldset,button').hide(200);
     $(form).css({'background-image':'url(view/imagem/loading.svg)'});
     $(form).append("<p style='text-align: center; color: #888888; bottom: 0; position: absolute; width: 100%; left: 0;'> Carregando.. </p>");
     
     // Envia os dados do formulario
     $(form)
     .ajaxForm({
         success:function(resposta){
           console.log("RESPOSTA",resposta);
           if(resposta.toString().search('sucesso')>=0){
  
             $.notify("usuario cadstrado com sucesso", "success");
             // Redirecionando o usuario depois da menssagem de sucesso aparecer
             setTimeout(function(){  
               //Redirecionando
               window.location = "?painel_usuario/home.php";
             },800)
           }
         },
     }).submit();
  
  }