/*
* Chama uma modal para criação de um modelo 
* @params id int = id do tipo de veiculo
*/
function modelo_adicionar(id){
    $.ajax({url:'?cms/veiculos/modelos/modal_criar_editar.php&id='+id})
    .then(function(resposta){
        modal(resposta.toString());
    })
}
/*
* Chama uma modal para edição de um modelo
* @params id int = id do modelo
*/

function modelo_editar(id,id_modelo){
    $.ajax({url:'?cms/veiculos/modelos/modal_criar_editar.php&id='+ id + '&id_modelo='+id_modelo})
    .then(function(resposta){
        modal(resposta.toString());
    })
}


/* Funções que fazem o crud de modelos */
function modelo_insert(form){
    event.preventDefault();

    $.ajax({
        url:$(form).attr("action"),
        data:$(form).serialize(),
        type:'POST',
        method:'POST',
        success:function(resposta){
            console.log("Resposta : ",resposta);
            if(resposta.search("sucesso")>=0){
                $.notify(" Modelo gravado com sucesso! ","success");
                chamaModalModelos($(form).attr('data-idTipo'));
            }
        }
    })

}
function modelo_update(form){

    event.preventDefault();

    $.ajax({
        url:$(form).attr("action"),
        data:$(form).serialize(),
        type:'POST',
        method:'POST',
        success:function(resposta){
            console.log("Resposta : ",resposta);
            if(resposta.search("sucesso")>=0){
                
                $.notify(" Modelo atualizado com sucesso! ","success");

                chamaModalModelos($(form).attr('data-idTipo'));
            
            }
        }
    })

}
function modelo_delete(id_tipo_veiculo,id){

   $('.caixa_modelos').html('')
   $('.caixa_modelos').css({'background-image':'url(view/imagem/loading.svg)',
                            'background-position':'center',
                            'background-repeat':'no-repeat',
                            'background-color':' #e8e8e8'});


    $.ajax({
        url:'router.php?controller=modelos&modo=excluir&id='+id,
        type:'POST',
        success:function(resposta){
            
            console.log("Resposta: ",resposta);

            if(resposta.search("sucesso")>=0){
                
                $.notify(" Modelo atualizado com sucesso! ","success");

                chamaModalModelos(id_tipo_veiculo);
            
            }
        }
    })
}
/*
* Chama uma modal para criação da marca
* @params id int = id do tipo de veiculo
*/
function marca_adicionar(id){
    $.ajax({url:'?cms/veiculos/modelos/modal_criar_editar.php&id_tipo_veiculo='+id})
    .then(function(resposta){
        modal(resposta.toString());
    })
}
/*
* Chama uma modal para edição de uma marca
* @params id int = id do modelo
*/

function marca_editar(id,id_modelo){
    $.ajax({url:'?cms/veiculos/modelos/modal_criar_editar.php&id='+ id + '&id_modelo='+id_modelo})
    .then(function(resposta){
        modal(resposta.toString());
    })
}

/* STATUS */
function modelos_alterar_status(caixa,id_modelo,status){
    
    /* Impede que entre em um loop infinito */
    if($(caixa).attr('data-submetido') == 0){
       $(caixa).attr('data-submetido',1);
       return true;
    }else{
        $(caixa).attr('data-submetido',0);
    }

    event.preventDefault();

    // Alterando status
    status = (status == 0 )? 1 : 0;

    /* Verifica se esta checkado ou não */
    $.ajax({url:'router.php?controller=modelos&modo=alterarStatus&id='+id_modelo,
            type:'POST',
            method:'POST',
            data:{status},
            success:function(resposta){

                console.log("RESPOSTA: ",resposta);

                if(resposta.search("sucesso")>=0){
                
                    $.notify(" Modelo Alterado com sucesso! ","success");
                    
                                 
                    $(caixa).attr('onclick','modelos_alterar_status(this,'+id_modelo+','+ status +')');

                    $(caixa).find('input[type="checkbox"]').click()                    

                }
            }
     })

}