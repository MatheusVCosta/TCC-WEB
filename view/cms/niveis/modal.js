$('#abrir_cadastro').click(function(){
    $("#container2").fadeIn(400);
   
    $.ajax({
        type:'POST',
        url:'?cms/niveis/cadastro_niveis.php',
        success:function(callback){
            // $('#modal').css({"width": "1000px", "height": "600px"});
            $('#modal').html(callback);
        }
    });
});