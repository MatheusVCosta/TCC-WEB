// $(document).ready(function(){
    

 //variavel global para controlar se é para abrir ou fechar
 let controle = false;
//Funççao para abrir o menu com mais opções
function abrir_menu(height, sub_menu, item_menu){
    // alert(sub_menu);
    //se o controle for igual a false significa que está fechado
    //então recebe a "ação" de abrir
    if(controle == false){
        //é trocado para true 
        controle = true;
        //e a div recebe a animação de abrir, a variavel height está sendo passado no click
        //do botão
        $(sub_menu).css("height",height).show(550);
        $(item_menu).css("background-color", "#585858");
    }else{
        //se for igual a true então significa que está aberto e precis ser fechado
        controle = false;
        $(sub_menu).hide(400);
        $(item_menu).css("background-color", "#7b7b7b");
    }
    // controle = false;
    
}

// });