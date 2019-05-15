//click no botão pelo id abrir cadastro
$('#abrir_cadastro').click(function(){

    $.ajax({
        type: 'POST',
        url: '?cms/pagina_faq/cadastrar.php',
        // o callback tras o retorno da requisição da url feita por post
        success:function(callback){
            modal(callback);
        }
    });
});