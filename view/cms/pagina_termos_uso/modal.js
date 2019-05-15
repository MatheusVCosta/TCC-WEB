//click no botão pelo id abrir cadastro
$('#abrir_cadastro').click(function(){
    

    $.ajax({
        type: 'POST',
        url: '?cms/pagina_termos_uso/cadastrar.php',
        // o callback tras o retorno da requisição da url feita por post
        success:function(resposta){
            modal(resposta);
        }
    });
});
