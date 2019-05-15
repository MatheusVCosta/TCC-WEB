function exportarChamado(){
    
    var tabela = $('.tabela');
    var csvEmail = " ";
    
    /*  Procurando por um input de type igual a checket e de name igual a emails no estado de checked(checkada) dentro da tabela */
    tabela.find('input[type="checkbox"][name="emails"]:checked')
    /* For() dentro das checkets pegas */
    .each(function(){

          csvEmail += $(this).val() + "\n";
    })

    toCSV('emails',csvEmail);

    /*$.ajax({url:'?cms/email_marketing/exportacao.php&id_email_mkt='+id_email_mkt})
    .then(function(resposta){
        var csv = "Nome;Email;Celular;Mensagem \n";
        csv += resposta;
        toCSV('fale_conosco',csv);
    })*/
}
function selecioneEmails(checkTodos){
    
    if($(checkTodos).is(':checked')){
        // Checka
        $('input[type="checkbox"][name="emails"]').prop('checked',true);
    }else{
        // DesChecka
        $('input[type="checkbox"][name="emails"]').prop('checked',false);
    }
}
function enviarEmail(){
	
	var tabela = $('.tabela');
    
    var emails = [];
    
    /*  Procurando por um input de type igual a checket e de name igual a emails no estado de checked(checkada) dentro da tabela */
    tabela.find('input[type="checkbox"][name="emails"]:checked')
    /* For() dentro das checkets pegas */
    .each(function(){
		  console.log("checket")
          emails.push($(this).val());
    })
    
	if(emails.length >= 1){
		$.get('?cms/email_marketing/enviar_email.php')
		 .then(function(res){
			modal(res.toString());
			window.emails = emails;
		});
	}else{
		$.notify("Por favor! Selecione um ou mais emails!","info");
	}
}
function emails_enviar(form){
	event.preventDefault();
	var assunto  = $(form).find('[name="assunto"]').val();
	var mensagem  = $(form).find('[name="mensagem"]').val();
	var acc = 0;
	
   $(form).find('*').hide(200);
   $(form).css({'background-image':'url(view/imagem/loading.svg)'});
   $(form).append("<p class='loading-emails' style='text-align: center; color: #888888; margin-top: 322px;'> Carregando.. </p>");
   var terminado = 0;
   do{
		
		var email = window.emails[acc];

		$.ajax({url:'router.php?controller=email_marketing&modo=ENVIAR',
			    type:'POST',
			    method:'POST',
			    data:{assunto,mensagem,email},
			    success:function(resposta){
			    	if(resposta.toString().search('Email enviado') < 0){
			    		setTimeout(function(){
			    			$.ajax({url:'http://mobshare-email.herokuapp.com/email',
			    				method:'POST',
			    				type:'POST',
			    				data:{
			    					email,assunto,conteudo:mensagem,
			    					key:"5748844fd988sdfsfsad"
			    				}}).then(function(resposta){
									setTimeout(function(){
										console.log("Oi:",resposta);
										$(form).find('p.loading-emails').text("Email "+email+" enviado!");

										console.log("Terminado : ",terminado);

										terminado++;

										if(window.emails.length == terminado){
											$.notify("Todos os emails foram enviados com sucesso!","success");
											/* Fechando a janela */
											setTimeout(function(){fecharModal()},300);
										}

									},200);

			    				})
			    		},200);
						console.log("Erro enviando automaticamente!!");
			    		
			    	}
			    	setTimeout(function(){
						console.log("Oi:",resposta);
						$(form).find('p.loading-emails').text("Email "+email+" enviado!");

						console.log("Terminado : ",terminado);

						terminado++;

						if(window.emails.length == terminado){
							$.notify("Todos os emails foram enviados com sucesso!","success");
							/* Fechando a janela */
							setTimeout(function(){fecharModal()},300);
						}
			    		
			    	},200);

			    }
		   })

		acc++;
	}while(window.emails.length > acc);

}
