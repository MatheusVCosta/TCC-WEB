//click no botão pelo id abrir cadastro
$('#abrir_cadastro').click(function(){
    // fadeIn para abrir a modal - 400 tempo de abertura
    $("#container2").fadeIn(400);
    $.ajax({
        type: 'POST',
        url: '?cms/pagina_como_ganhar_dinheiro/cadastrar.php',
        // o callback tras o retorno da requisição da url feita por post
        success:function(callback){
            modal(callback);
            setTimeout(function(){

                $('#formComo_ganhar_dinheiro').find('textarea').richText();

            },200);
        }
    });
});

function abrir_cadastro(sessao){
    $.ajax({
        type: 'POST',
        url: '?cms/pagina_como_ganhar_dinheiro/cadastrar.php&sessao='+sessao,
        success:function(callback){
            modal(callback);
            setTimeout(function(){
                //$('#formComo_ganhar_dinheiro').find('textarea').richText();
                $('#formComo_ganhar_dinheiro').find('textarea').each(function(){

                    $(this).richText();
                })
            },200);
        }
    });
}