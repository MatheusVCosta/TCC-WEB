/* Cuida das imagens da modal de veiculo Pendentes
*/
function veiculos_pendentes_modal_ver_imagem(imagem){

    var imagemSelecionada = $(imagem);
    var imagemPrincipal = $('.modal_veiculos .imagem img.principalImagem');
    
    imagemPrincipal.attr('src',imagemSelecionada.attr('src'));

    // Limpando as imagens selecionadas
    $('.modal_veiculos .imagem .lista_imagens .item_imagem img').css({'border':'none'});

    imagemSelecionada.css({'border':'solid 1px blue'});
}
function chamaModalAprovar(id_veiculo){
    $.ajax('?cms/veiculos/aprovacao_veiculos/aprovar&id_veiculo='+id_veiculo)
    .then(function(resposta){
        modal(resposta);
    })
}
function chamaModalReprovar(id_veiculo){
    $.ajax('?cms/veiculos/aprovacao_veiculos/reprovar&id_veiculo='+id_veiculo)
    .then(function(resposta){
        modal(resposta);
    })
}

function veiculos_pendentes_aprovar(form){
    event.preventDefault();
    $.ajax({
          url:$(form).attr('action'),
          type:'POST',
          method:'POST',
          data:$(form).serialize(),
          success:function(resposta){
            console.log("Resposta",resposta);
            if(resposta.toString().search('sucesso')>=0){
				$.notify("veiculo aprovado",'success');
				conteudo_subMenu('veiculos/veiculos_pendentes',true);
				fecharModal();
			}
          } 
        })
}
function veiculos_pendentes_reprovar(form){
    event.preventDefault();
    $.ajax({
          url:$(form).attr('action'),
          type:'POST',
          method:'POST',
          data:$(form).serialize(),
          success:function(resposta){
            console.log("Resposta : ",resposta);
            if(resposta.toString().search('sucesso')>=0){
				$.notify("veiculo reprovado",'success');
				conteudo_subMenu('veiculos/veiculos_pendentes',true);
				fecharModal();
			}
          }
        })
}
