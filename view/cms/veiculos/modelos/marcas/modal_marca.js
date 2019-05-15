/*
* Chama uma modal para criação de uma marca 
* @params id int = id do tipo de veiculo
*/
function marca_adicionar(id){
    event.preventDefault();
    $.ajax({url:'?cms/veiculos/modelos/marcas/modal_criar_editar.php&id_tipo_veiculo='+id})
    .then(function(resposta){
        modal(resposta.toString());
    })
}
/*
* Chama uma modal para edição de um modelo
* @params id int = id do modelo
*/

function marca_editar(id,id_marca){
    $.ajax({url:'?cms/veiculos/modelos/marcas/modal_criar_editar.php&id_tipo_veiculo='+ id + '&id_marca='+id_marca})
    .then(function(resposta){
        modal(resposta.toString());
    })
}


/* Funções que fazem o crud de modelos */
function marca_insert(form){
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
function marca_update(form){

    event.preventDefault();

    console.log("hellow");


    $.ajax({
        url:$(form).attr("action"),
        data:$(form).serialize(),
        type:'POST',
        method:'POST',
        success:function(resposta){
            console.log("Resposta : ",resposta);
            if(resposta.search("sucesso")>=0){
                
                $.notify(" Modelo atualizado com sucesso! ","success");

                chamaModalMarcas($(form).attr('data-idTipo'));
            
            }
        }
    })

}
function marca_delete(id_tipo_veiculo,id){

   $('.caixa_marcas').find('*').hide(200);
   $('.caixa_marcas').css({'background-image':'url(view/imagem/loading.svg)',
                            'background-position':'center',
                            'background-repeat':'no-repeat',
                            'background-color':' #e8e8e8'});

    $.ajax({
        url:'router.php?controller=marcas&modo=excluir&id='+id+'&id_tipo_veiculo='+id_tipo_veiculo,
        type:'POST',
        success:function(resposta){
            
            console.log("Resposta: ",resposta);

            if(resposta.search("sucesso")>=0){
                
                $.notify(" Marca Removido com sucesso! ","success");

                chamaModalMarcas(id_tipo_veiculo);
            
            }
        }
    })
}

/* STATUS */
function marcas_alterar_status(caixa,id_marca,status){
    
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
    $.ajax({url:'router.php?controller=marcas&modo=alterarStatus&id='+id_marca,
            type:'POST',
            method:'POST',
            data:{status},
            success:function(resposta){

                console.log("RESPOSTA: ",resposta);

                if(resposta.search("sucesso")>=0){
                
                    $.notify(" Modelo Alterado com sucesso! ","success");
                    
                                 
                    $(caixa).attr('onclick','modelos_alterar_status(this,'+id_marca+','+ status +')');

                    $(caixa).find('input[type="checkbox"]').click()                    

                }
            }
     })

}