//Mensagem: variavel para passar a mensagem que será mostrada para o usuário depois de uma ação
let mensagem = "";
let msg = "";
let type = "" ;
let caminho = "";
var href = window.location.href;
var caminho_absoluto = 'view/cms/';

function enviar(){
	event.preventDefault();
	console.log("Hellow!!!!!!")
	$.ajax({
		type:'post',
		method:'post',
		url:$(form).attr('action'),
		data: $(form).serialize(),
		success:function(dados){
			console.log("Hellow@",dados);
			if(dados.toString().search('sucesso')>=0){

				$.notify("Email enviado com sucesso", "success");

				conteudo_subMenu('email_marketing/email_marketing.php',true);
				fecharModal();
			}
		}
	})
}
function conteudo_subMenu(nome_pagina){

        $.ajax({
            type:'GET',
            url:'?cms/'+nome_pagina,
            success:function(html){
                $('.conteudo').html(html);
            }
        })


}
function inserir_nivel(){
    form = $('#formNiveis');
    
    var nome = form.find('#nome_nivel').val();
    var descricao = form.find('#descricao').val();
    var slcMenu = form.find('#acessos').val();

    event.preventDefault();
    $.ajax({
        type:"POST",
        method:'POST',
        url: form.attr('action'),
        data:{
        	'txtNome_nivel':nome,
        	'txtDescricao':descricao,
        	'slcMenu':slcMenu,
        },
        async: true,
        success:function(dados){
            $.notify("Nível inserido com sucesso", "success");
            conteudo_subMenu('niveis/tabela_niveis', true);
            fecharModal();
        }
    });
}
function atualizar_nivel(){
	
	form = $('#formNiveis');

	var nome = form.find('#nome_nivel').val();
    var descricao = form.find('#descricao').val();
    var slcMenu = form.find('#acessos').val();

    event.preventDefault();
    $.ajax({
        type:"POST",
        url: form.attr('action'),
        data:{
        	'txtNome_nivel':nome,
        	'txtDescricao':descricao,
        	'slcMenu':slcMenu,
        },
        async: true,
        success:function(dados){
            $.notify("Nível editado com sucesso", "success"); 
            conteudo_subMenu('niveis/tabela_niveis', true);
            fecharModal();
        }
    });
   
}

function excluir_niveis(controller, modo, id_item){
    $.ajax({
        type:"GET",
        url: `router.php?`,
        data: {controller: controller, modo: modo, id:id_item},
        success:function(dados){
            
            $.notify("Nível excluído com sucesso", "success");
            conteudo_subMenu('niveis/tabela_niveis', true);
        }            
    });
}
function buscar_dados(controller, modo, id_item){
    $.ajax({
        type:"GET",
        url: `router.php?`,
        data: {controller: controller, modo: modo, id:id_item},
        success:function(dados){
            modal(dados);
           
        }               
    });
}

/* Crud de Usuario */
function usuario_getById(id){
	event.preventDefault();
	 $.ajax({
		type:'post',
		method:'post',
		url:'router.php?controller=usuarios&modo=select',
		data:{id},
		success:function(dados){
			modal(dados);
		}
	})
}

function usuario_getDados(){

	conteudo_subMenu('usuarios/tabela',true);

}
function usuario_insert(form){

	event.preventDefault();

	$.ajax({
		type:'post',
		method:'post',
		url:$(form).attr('action'),
		data: $(form).serialize(),
		success:function(dados){

			if(dados.toString().search('sucesso')>=0){

				$.notify("usuario Cadastrado com sucesso", "success");

				conteudo_subMenu('usuarios/tabela',true);
				fecharModal();
			}
		}
	})
}
function usuario_update(form){

	event.preventDefault();

	$.ajax({
		type:'post',
		method:'post',
		url:$(form).attr('action'),
		data: $(form).serialize(),
		success:function(dados){

			if(dados.toString().search('sucesso')>=0){

				$.notify("usuario Atualizado com sucesso", "success");

				conteudo_subMenu('usuarios/tabela',true);
				
				fecharModal()


			}
		}
	})
}

function usuario_delete(id){

	$.ajax({
		type:'post',
		method:'post',
		url:'router.php?controller=usuarios&modo=excluir&id='+id,
		success:function(dados){
			console.log('dados',dados);
			if(dados.toString().search('sucesso')>=0){

				$.notify("usuario Deletado com sucesso", "info");
				if(usuario_logado.id != id){
					
					conteudo_subMenu('usuarios/tabela',true);
				
				} else {
					console.log("Deslogando!");
					window.location = "router.php?controller=USUARIOS&modo=DESLOGAR";
				}

			}
		}
	});
}

/* logar função  temporario */
function logar(formulario){
	// Desativa o submit do formualrio par a tela não piscar
	event.preventDefault();

	$.ajax({
		type:'post',
		method: 'post',
		url:'router.php?controller=usuarios&modo=logar',
		data:$(formulario).serialize()
	}).then(function(resposta){
		
		console.log("Resposta: ",resposta);
		if(resposta.toString().search('sucesso')>=0){
			$.notify("usuario logado com sucesso", "success");
			//var redirecionamento = window.location.origin + window.location.pathname + '?cms/home';
			window.location.href = '?cms/home_cms';
		}else{
			$.notify(resposta.toString(), "error");
		}
	})
}

/* Crud de Tipo de veiculo */
function tipo_veiculo_cadastro(form){
	
	event.preventDefault();

	$.ajax({
		type:'POST',
		url:$(form).attr('action'),
		data:$(form).serialize(),
		success:function(resposta){
			console.log("RESPOSTA:",resposta);
			if(resposta.toString().search('sucesso')>=0){
				$.notify("Tipo de veiculo cadastrado",'success');
				conteudo_subMenu('veiculos/tipo_veiculo',true);
			}
		}
	})

}

function tipo_veiculo_atualizar(form){

	event.preventDefault();

	$.ajax({
		type:'POST',
		url:$(form).attr('action'),
		data:$(form).serialize(),
		success:function(resposta){
			console.log("RESPOSTA:",resposta);
			if(resposta.toString().search('sucesso')>=0){
				$.notify("Tipo de veiculo atualixado",'success');
				conteudo_subMenu('veiculos/tipo_veiculo',true);
			}
		}
	})
}

function tipo_veiculo_excluir(id){
	$.ajax({
		type:'POST',
		method:'POST',
		url:'router.php?controller=tipo_veiculo&modo=excluir&id='+id,
		success:function(resposta){

			if(resposta.toString().search('sucesso')>=0){

				$.notify("Tipo de veiculo removido ",'success');
				conteudo_subMenu('veiculos/tipo_veiculo',true);

			}
		}
	})
}

function tipo_veiculo_getById(id){
	event.preventDefault();
	$.ajax({
		type:'GET',
		method:'GET',
		url:'router.php?controller=tipo_veiculo&modo=select&id='+id,
		success:function(dados){
			$('.conteudo').html(dados);
		}
	})
}



/* Ignore isso!!! */
function chamaModalAcessorios(id_tipo_veiculo){

	if(id_tipo_veiculo < 1)return;
	
	$.get('?cms/veiculos/acessorios/modal_tabela.php&id_tipo_veiculo='+id_tipo_veiculo)
	 .then(function(res){
		modal(res.toString());
	});
}

function chamaModalModelos(id_tipo_veiculo){
	
	if(id_tipo_veiculo < 1)return;

	$.get('?cms/veiculos/modelos/modal_tabela.php&id='+id_tipo_veiculo)
	 .then(function(res){
		modal(res.toString());
	});

}
function chamaModalFip(id_tipo_veiculo){
	$.get('?cms/veiculos/fip/modal_fip.php&id_tipo_veiculo='+id_tipo_veiculo)
	 .then(function(res){
		modal(res.toString());
	});
}

function chamaModalMarcas(id_tipo_veiculo){
	
	if(id_tipo_veiculo < 1)return;

	$.get('?cms/veiculos/modelos/marcas/modal_tabela.php&id='+id_tipo_veiculo)
	 .then(function(res){
		modal(res.toString());
	});

}


function chamaModalAnunciosAprova(id_anuncio){
	$.get('?cms/anuncios/modal_anuncios_pendentes.php&id_anuncio='+id_anuncio)
	 .then(function(res){
		modal(res.toString());
    })
}

function chamaModalFaleConosco(id_fale_conosco){
	$.get('?cms/fale_conosco/modal.php&id_fale_conosco='+ id_fale_conosco)
     .then(function(res){
		modal(res.toString());
	});
}
function fale_conosco_delete(id){
	//event.preventDefault();
	$.ajax({
		type:'post',
		method:'post',
		url:'router.php?controller=fale_conosco&modo=excluir&id_fale_conosco='+id,
		success:function(dados){
			console.log("sgasha",dados)
			if(dados.toString().search('sucesso')>=0){

				$.notify("Deletado com sucesso", "info");

				conteudo_subMenu('fale_conosco/tabela',true);
				

			}
		}
	});
}
function chamaModalVeiculosAprova(id){
	$.get('?cms/veiculos/modal_veiculos_pendentes.php&id_veiculo='+id)
	 .then(function(res){
		modal(res.toString());
    })
}
function chamaModalEmailMarketing(id_email_mkt){
	$.get('?cms/email_marketing/modal.php&id_email_mkt='+ id_email_mkt)
     .then(function(res){
		modal(res.toString());
	});
}


// FAQ

function faq_getById(id){
	event.preventDefault();
	 $.ajax({
		type:'post',
		method:'post',
		url:'router.php?controller=faq&modo=select',
		data:{id},
		success:function(dados){
			modal(dados);
		}
	})
}

function faq_getDados(){

	conteudo_subMenu('pagina_faq/tabela',true);

}
function faq_insert(form){

	event.preventDefault();

	$.ajax({
		type:'post',
		method:'post',
		url:'router.php?controller=fale_conosco&modo=excluir&id_fale_conosco='+id,
		success:function(dados){
			console.log("sgasha",dados)
			if(dados.toString().search('sucesso')>=0){

				$.notify("Deletado com sucesso", "info");

				conteudo_subMenu('fale_conosco/tabela',true);
				

			}
		}
	});
}
function chamaModalVeiculosAprova(id){
	$.get('?cms/veiculos/modal_veiculos_pendentes.php&id_veiculo='+id)
	 .then(function(res){
		modal(res.toString());
    })
}
function chamaModalEmailMarketing(id_email_mkt){
	$.get('?cms/email_marketing/modal.php&id_email_mkt='+ id_email_mkt)
     .then(function(res){
		modal(res.toString());
	});
}


// PAGINA GANHE DINHEIRO
function como_ganhar_dinheiro_getById(sessao){
	event.preventDefault();
	 $.ajax({
		type:'post',
		method:'post',
		url:'router.php?controller=como_ganhar_dinheiro&modo=select',
		data:{sessao},
		success:function(dados){
			modal(dados);
		}
	})
}

function como_ganhar_dinheiro_getDados(){

	conteudo_subMenu('pagina_como_ganhar_dinheiro/tabela',true);

}
function como_ganhar_dinheiro_insert(form){

	event.preventDefault();
	console.log("Hellow!!!!!!")
	$.ajax({
		type:'post',
		method:'post',
		url:$(form).attr('action'),
		data: $(form).serialize(),
		success:function(dados){
			if(dados.toString().search('sucesso')>=0){

				$.notify("Cadastrado com sucesso", "success");

				conteudo_subMenu('pagina_como_ganhar_dinheiro/tabela',true);
				fecharModal();
			}
		}
	})
}
function como_ganhar_dinheiro_update(form){

	var submetido = ($(form).attr('data-submit') || 0) * 1;
   

  //Efita o lopp do ajaxForm (DIFICIL DE EXPLICAR)!Quando damos submit() no ajaxForm ele chama o onsubmit do formulario e então retorna para essa função que cria o reinvia acedentalmente
   if(submetido == 1){

      return true;

   }else{
     
     $(form).attr('data-submit','1');

   }

   event.preventDefault();
    
   var form = $(form);
//    if(form.attr('data-sessao') == 'sessao1'){
//    	$('form').find('[name="txtLista1_sessao1"]')[1].value= $('form').find('[name="txtLista1_sessao1"]')[0].value;
// 	$('form').find('[name="txtLista2_sessao1"]')[1].value= $('form').find('[name="txtLista2_sessao1"]')[0].value;
//    }else if(form.attr('data-sessao') == 'sessao2'){
//    	$('form').find('[name="txtLista1_sessao2"]')[1].value= $('form').find('[name="txtLista1_sessao2"]')[0].value;
// 	$('form').find('[name="txtLista2_sessao2"]')[1].value= $('form').find('[name="txtLista2_sessao2"]')[0].value;
//    }else if(form.attr('data-sessao') == 'sessao3'){
// 	$('form').find('[name="txtTexto_sessao3"]')[1].value= $('form').find('[name="txtTexto_sessao3"]')[0].value;
//    }
   	 // Envia os dados do formulario
   $(form).ajaxForm({
       success:function(resposta){
         console.log("RESPOSTA",resposta);
         
         if(resposta.toString().search('sucesso')>=0){

           $.notify("Registro alterado com sucesso", "success");
           
           // Redirecionando o usuario depois da menssagem de sucesso aparecer
           setTimeout(function(){
             
             //Redirecionando
			conteudo_subMenu('pagina_como_ganhar_dinheiro/tabela',true);

           },800)

         }
       },
   }).submit();
}

function como_ganhar_dinheiro_delete(id){
	event.preventDefault();
	$.ajax({
		type:'post',
		method:'post',
		url:'router.php?controller=como_ganhar_dinheiro&modo=excluir&id='+id,
		success:function(dados){
			if(dados.toString().search('sucesso')>=0){

				$.notify("Deletado com sucesso", "info");

				conteudo_subMenu('pagina_como_ganhar_dinheiro/tabela',true);
				

			}
		}
	});
}
// SEJA PARCEIRO

// SOBRE NOS

// TERMOS DE USO
function termos_uso(){
	 $.ajax({
        type: 'POST',
        url: '?cms/pagina_termos_uso/cadastrar.php',
        // o callback tras o retorno da requisição da url feita por post
        success:function(resposta){
            modal(resposta);
        }
    });
}

function termos_uso_getDados(){

	conteudo_subMenu('pagina_termos_uso/tabela',true);

}


function termos_uso_update(form){

	event.preventDefault();

	$.ajax({
		type:'post',
		method:'post',
		url:$(form).attr('action'),
		data: $(form).serialize(),
		success:function(dados){
			console.log("Dados : ",dados)
			if(dados.toString().search('sucesso')>=0){

				$.notify("Atualizado com sucesso", "success");

				conteudo_subMenu('pagina_termos_uso/tabela',true);
				
				fecharModal()


			}
		}
	})
}
function termos_uso_status(status_atual){
	
	var novoStatus = (status_atual == 1)?0:1;

	$.ajax({
		type:'post',
		method:'post',
		url:'router.php?controller=termos_uso&modo=atualizar',
		data: {status:novoStatus},
		success:function(dados){
			console.log("Dados : ",dados)
			if(dados.toString().search('sucesso')>=0){

				$.notify("Atualizado com sucesso", "success");

				conteudo_subMenu('pagina_termos_uso/tabela',true);


			}
		}
	})
}

/*function termos_uso_delete(id){
	event.preventDefault();
	$.ajax({
		type:'post',
		method:'post',
		url:'router.php?controller=termos_uso&modo=excluir&id='+id,
		success:function(dados){
			if(dados.toString().search('sucesso')>=0){

				$.notify("Deletado com sucesso", "info");

				conteudo_subMenu('pagina_termos_uso/tabela',true);
				

			}
		}
	});
}*/
// PAGINA HOME - SESSÕES



/* Função que exporta csv 
 * params csv = String = texto com o csv:
 * 'exemplo@mail.com;joão;(11)4323-2545\n'
 * 'valor;valor;valor;valor\n'
 *	\n = quebra linha
 */
function toCSV(nome,csv = 0){
 	/* Algumas validações */
 	var nomeArquivo = (csv != 0)? nome: 'export';
	var csvExport = (csv != 0)? csv: nome;
 	// Cria um link para ser ativar o download
 	var a    = document.createElement('a');
	// Diz ao browser que o conteudo sera um texto do tipo csv
	a.href        = 'data:text/csv;charset=UTF-8,' + csvExport;
	a.target      = '_blank';
	a.download    = nomeArquivo + new Date().getTime() +'.csv';
	document.body.appendChild(a);
	a.click();
 }

/* ativar e desativar de cliente*/
function clientes_ativar_desativar(id, status){
    
    if (status == 0){
        status = 1;
    }else{
        status = 0;
    }
    $.ajax({
        type:'post',
        method:'post',
        url:'router.php?controller=clientes&modo=status&id='+id,
        data:{
            'status':status
        },
        success:function(resposta){
//            alert(resposta);
         if(resposta == '1'){
             conteudo_subMenu('clientes/clientes');
         }
        }
        
    }) 
}
/* Faq */
function faq_inserir(form){
	event.preventDefault();
	$.ajax({
		url:$(form).attr('action'),
		type:'POST',
		method:'POST',
		data:$(form).serialize(),
		success:function(resposta){
			console.log("Resposta : ",resposta);
			if(resposta.toString().search('sucesso') >= 0){
				$.notify(" Questão salva com sucesso ","success")
				conteudo_subMenu('pagina_faq/tabela.php');
				fecharModal();
			}
		}
	})
}
function faq_atualizar(form){
	event.preventDefault();
	$.ajax({
		url:$(form).attr('action'),
		type:'POST',
		method:'POST',
		data:$(form).serialize(),
		success:function(resposta){
			console.log("Respota:",resposta);
			if(resposta.toString().search('sucesso') >= 0){
				$.notify(" Questão salva com sucesso ","success")
				conteudo_subMenu('pagina_faq/tabela.php');
				fecharModal();
			}
		}
	})
}

function faq_getById(id){
	event.preventDefault();
	 $.ajax({
		type:'post',
		method:'post',
		url:'router.php?controller=faq&modo=select',
		data:{id},
		success:function(dados){
			modal(dados);
		}
	})
}

function faq_getDados(){

	conteudo_subMenu('pagina_faq/tabela',true);

}
function faq_delete(id){
	event.preventDefault();
	$.ajax({
		type:'post',
		method:'post',
		url:'router.php?controller=faq&modo=excluir&id='+id,
		success:function(dados){
			console.log("Dados:",dados)
			if(dados.toString().search('sucesso')>=0){

				$.notify("Deletado com sucesso", "info");

				conteudo_subMenu('pagina_faq/tabela');
				

			}
		}
	});
}
function faq_status(id,status_atual){
	// Redefinindo status_atual
	if (status_atual == 0)status_atual = 1;
    else status_atual = 0;

    $.ajax({
		url:'router.php?controller=faq&modo=atualizar&id='+id,
		type:'POST',
		method:'POST',
		data:{
			status:status_atual
		},
		success:function(resposta){

			if(resposta.toString().search('sucesso') >= 0){
				
				$.notify(" Questão salva com sucesso ","success")
				conteudo_subMenu('pagina_faq/tabela.php');
				
			}
		}
	})
}