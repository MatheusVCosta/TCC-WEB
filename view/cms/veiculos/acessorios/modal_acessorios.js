function acessorios_adicionar(id){
    $.ajax({url:'?cms/veiculos/acessorios/modal_criar_editar.php&id_tipo_veiculo='+id})
    .then(function(resposta){
        console.log("CONTEUDO : ",resposta);
        modal(resposta.toString());
    })
}
/*
* Chama uma modal para edição de um modelo
* @params id int = id do modelo
*/

function acessorios_editar(id_tipo_veiculo,id){
    $.ajax({url:'?cms/veiculos/acessorios/modal_criar_editar.php&id_acessorios='+ id+'&id_tipo_veiculo='+id_tipo_veiculo})
    .then(function(resposta){
        modal(resposta.toString());
    })
}


/* Funções que fazem o crud de acessorios */
function acessorios_insert(form){

    event.preventDefault();

    $.ajax({
        url:$(form).attr("action"),
        data:$(form).serialize(),
        type:'POST',
        method:'POST',
        success:function(resposta){
            console.log("Resposta : ",resposta);
            if(resposta.search("sucesso")>=0){
                $.notify(" Acessorio gravado com sucesso! ","success");
                chamaModalAcessorios($(form).attr('data-idTipo'));
            }
        }
    })

}
function acessorios_uptade(form){

    event.preventDefault();

    $.ajax({
        url:$(form).attr("action"),
        data:$(form).serialize(),
        type:'POST',
        method:'POST',
        success:function(resposta){
            console.log("Resposta : ",resposta);
            if(resposta.search("sucesso")>=0){
                
                $.notify(" Acessorio atualizado com sucesso! ","success");

                chamaModalAcessorios($(form).attr('data-idTipo'));
            
            }
        }
    })

}
function acessorios_delete(id_tipo_veiculo,id){

   $('.caixa_acessorios').find('*').hide(200);
   $('.caixa_acessorios').css({'background-image':'url(view/imagem/loading.svg)',
                            'background-position':'center',
                            'background-repeat':'no-repeat',
                            'background-color':' #e8e8e8'});
   $.ajax({
        url:'router.php?controller=acessorios&modo=excluir&id='+id,
        type:'POST',
        success:function(resposta){
            
            console.log("Resposta: ",resposta);

            if(resposta.search("sucesso")>=0){
                
                $.notify(" Acessorio Removido com sucesso! ","success");

                chamaModalAcessorios(id_tipo_veiculo);
            
            }
        }
    })
}
/* STATUS */
function acessorios_alterar_status(caixa,id_acessorio,status){
    
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
    $.ajax({url:'router.php?controller=acessorios&modo=alterarStatus&id='+id_acessorio,
            type:'POST',
            method:'POST',
            data:{status},
            success:function(resposta){

                console.log("RESPOSTA: ",resposta);

                if(resposta.search("sucesso")>=0){
                
                    $.notify(" Acessorio Alterado com sucesso! ","success");
                    
                                 
                    $(caixa).attr('onclick','acessorios_alterar_status(this,'+id_acessorio+','+ status +')');

                    $(caixa).find('input[type="checkbox"]').click()                    

                }
            }
     })


}