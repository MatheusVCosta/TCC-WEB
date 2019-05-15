// $(document).ready(function(){
//     $('#seta').click(function(){
//         $('.segura_perguntas p').css("height","800px");
//     });
// })
function ver_resposta_completa(seta){
    $($(seta).parent().find('p')[0]).css({'word-break': 'break-all',
    'white-space': 'initial'})
    $(seta).attr('onclick','esconder_resposta_completa(this)')
}
function esconder_resposta_completa(seta){
    $($(seta).parent().find('p')[0]).css({'word-break':'unset',
    'white-space': 'nowrap'});
    $(seta).attr('onclick','ver_resposta_completa(this)')
}