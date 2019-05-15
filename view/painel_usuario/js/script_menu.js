 //variavel global para controlar se é para abrir ou fechar
let controle = false;
let backup_menu = "";
//Funççao para abrir o menu com mais opções
// height - passar a altura que a div do submenu vai ter
// sub_menu - referenciar qual sub_menu será aberto
function abrir_menu(d, sub_menu, item_menu){
    // alert(sub_menu);
    //se o controle for igual a false significa que está fechado
    //então recebe a "ação" de abrir
    if(backup_menu == sub_menu){
        $(sub_menu).css("height","auto").slideUp(300);
        controle = false;
        backup_menu = "";
    }
    else if(backup_menu != ""){
        $(backup_menu).css("height","auto").slideUp(300);
        if(controle == false){
            $(sub_menu).css("height","auto").slideDown(350);
            controle = true;
            backup_menu = sub_menu;
        }
        else{
            $(sub_menu).css("height","auto").slideDown(350);
            controle = false;
            backup_menu = sub_menu;
        }
    }
    else{
        backup_menu = sub_menu;
        if(controle == false){
            $(sub_menu).css("height","auto").slideDown(350);
            controle = true;
        }  
    }
}

function conteudo_subMenu(nome_pagina){

    
        $.ajax({
            type:'GET',
            url:'?painel_usuario/'+nome_pagina,
            success:function(html){
                $('#conteudo').html(html);
            }
        })

    
}