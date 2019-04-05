


//Mensagem: variavel para passar a mensagem que será mostrada para o usuário depois de uma ação
let mensagem = "";
let msg = "";
let type = "";

let caminho = "";
var href = window.location.href;
var caminho_absoluto = `${href}router.php`;
caminho_absoluto = 'view/cms/';
//Função para enviar as informações do formulario para o route.php
//parametros passados:
//controller = Definir qual será o controller que será acessado
//modo = Serve para saber o que será executado no banco, insert, update ou consulta
function route(controller, modo, id_item){
   
    //Desativa o elemento submit para a tela não piscar
    event.preventDefault();

    //Definir qual mensagem será mostrada de acorodo com o modo
    if(id_item > 0){
        mensagem = "Editado com sucesso";
        caminho = `router.php?controller=${controller}&modo=${modo}&id=${id_item}`
    }else{
        mensagem = "Cadastro com sucesso";
        caminho = `router.php?controller=${controller}&modo=${modo}`;
    }

    $.ajax({
        type:"POST",
        url: caminho,
        data: $('#form').serialize(),
        success:function(dados){

        	console.log(dados);
            if(dados == ""){
                msg = "Erro! tente novamente";
                type= 'warr';
            } else {
                msg = mensagem;
                type= 'success';
            }
            $.notify(msg, type);
            listarDados(); 
           
        }            
    });
}
//função para excluir os dados 
function excluir_dados(controller, modo, id_item){
    $.ajax({
        type:"GET",
        url: `router.php?`,
        data: {controller: controller, modo: modo, id:id_item},
        success:function(dados){
            $.notify("Excluido com sucesso", "success");
            listarDados();   
        }            
    });
}
function buscar_dados(controller, modo, id_item){
    $.ajax({
        type:"GET",
        url: `router.php?`,
        data: {controller: controller, modo: modo, id:id_item},
        success:function(dados){
            $('.conteudo').html(dados);
            listarDados(); 
        }               
    });
}
function conteudo_subMenu(nome_pagina,teste){
    if(teste){

        $.ajax({
            type:'GET',
            url:'?cms/'+nome_pagina,
            success:function(html){
                $('.conteudo').html(html);
            }
        })

    }else{
        $.ajax({
			type: 'POST',
			url: '?cms/niveis/'+nome_pagina,
			success: function(dados){
				$('.conteudo').html(dados);
				listarDados();
			}

		})
    }
}
function listarDados(){
    $.ajax({
        type:'get',
        url:'?cms/niveis/tabela',
        success: function(dados){
            $('.tbl_niveis').html(dados);
        }
    });
}

/* Usuario  js */
var usuario = {
    getById:function(id){//Pega o usuario
        $.ajax({
            type:'post',
            method:'post',
            url:'router.php?controller=usuarios&modo=select',
			data:{id}
        }).then(function(resposta){
           	$('.conteudo').html(resposta);
        })
    },
    getDados:function(){
        $.ajax({
            type:'post',
            method:'post',
            url:'router.php?controller=usuarios&modo=selectAll',
        }).then(function(resposta){
            $('.tbl_usuarios').html(resposta);
        })
    },
    dao:{
        insert:function(form){

            form = $(form);

            console.log("Formulario: ",form);
            $.ajax({
                type:'post',
                method:'post',
                url:form.attr('action'),
                data: form.serialize()
            }).then(function(resposta){
                console.log("Resposta do html ", resposta);
                if(resposta.toString().search('sucesso')>=0){

                    $.notify("usuario Cadastrado com sucesso", "success");
                    
                    usuario.getDados();
                }
            })
            return false;
        },
        update:function(form){
            
           form = $('form#formUsuario');

            console.log("Formulario: ",form);
            $.ajax({
                type:'post',
                method:'post',
                url:form.attr('action'),
                data: form.serialize()
            }).then(function(resposta){
                console.log("Resposta do html ", resposta);
                if(resposta.toString().search('sucesso')>=0){

                    $.notify("usuario Atualizado com sucesso", "success");
                    
                    conteudo_subMenu('usuarios/cadastro_usuarios',true);

                }
            })
            return false;
        },
        delete:function(id){
            $.ajax({
                type:'post',
                method:'post',
                url:'router.php?controller=usuarios&modo=excluir&id='+id,
            }).then(function(resposta){
                console.log("Resposta do html ", resposta);
                if(resposta.toString().search('sucesso')>=0){

                    $.notify("usuario Deletado com sucesso", "success");
                    
                    conteudo_subMenu('usuarios/cadastro_usuarios',true);

                }
            })
        }
    }
}