/* Cuida das imagens da modal de veiculo Pendentes
*/
function anuncios_pendentes_modal_ver_imagem(imagem){

    var imagemSelecionada = $(imagem);
    var imagemPrincipal = $('.modal_anuncios .imagem img.principalImagem');
    
    imagemPrincipal.attr('src',imagemSelecionada.attr('src'));

    // Limpando as imagens selecionadas
    $('.modal_anuncios .imagem .lista_imagens .item_imagem img').css({'border':'none'});

    imagemSelecionada.css({'border':'solid 1px blue'});
}
function chamaModalAprovarAnuncio(id_anuncio){
    $.ajax('?cms/anuncios/aprovacao_anuncios/aprovar&id_anuncio='+id_anuncio)
    .then(function(resposta){
        modal(resposta);
    })
}
function chamaModalReprovarAnuncio(id_anuncio){

    $.ajax('?cms/anuncios/aprovacao_anuncios/reprovar&id_anuncio='+id_anuncio)
    .then(function(resposta){
        modal(resposta);
    })

}

function anuncios_pendentes_aprovar(form){
    event.preventDefault();
    $.ajax({
          url:$(form).attr('action'),
          type:'POST',
          method:'POST',
          data:$(form).serialize(),
          success:function(resposta){
            console.log("Resposta",resposta);
            if(resposta.toString().search('sucesso')>=0){
				$.notify("anuncio aprovado",'success');
				conteudo_subMenu('anuncios/anuncios_pendentes',true)
				fecharModal();
			}
          } 
        })
}
function anuncios_pendentes_reprovar(form){
    event.preventDefault();
    $.ajax({
          url:$(form).attr('action'),
          type:'POST',
          method:'POST',
          data:$(form).serialize(),
          success:function(resposta){
            console.log("Resposta : ",resposta);
            if(resposta.toString().search('sucesso')>=0){
				$.notify("anuncio reprovado",'success');
				conteudo_subMenu('anuncios/anuncios_pendentes',true)
				fecharModal();
			}
          }
        })
}
