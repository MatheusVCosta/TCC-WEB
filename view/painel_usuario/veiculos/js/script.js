// function getValueOption(){
//     //recupera value do option
//     var e = document.getElementById("cb_veiculos");
//     var itemSelecionado = e.options[e.selectedIndex].value;

//     //Recupera texto do option
// //     var e = document.getElementById("cb_veiculos");
// //     var itemSelecionado = e.options[e.selectedIndex].text;  

//     console.log(itemSelecionado); 
// }

function getTipoVeiculo(idTipoVeiculo){
    console.log("Aqui: " + idTipoVeiculo);
    $.ajax({
        type:'POST',
        url:'router.php?controllerTipo_veiculo= tipo_veiculo&modo = buscar', 
        success:function(callback){
            getMarcaVeiculo(idTipoVeiculo);
        }
        
    });

}

function getMarcaVeiculo(idTipoVeiculo){
    $.ajax(`router.php?controller=tipo_veiculo&modo=json_marcas&id=${idTipoVeiculo}`).then(res=>{
        dados = JSON.parse(res)
        if(dados.length > 0){
            var option = '<option>Selecione a marca</option>';
            for(var objeto of dados){
                option += `<option value='${objeto.id_marca_tipo}'>${objeto.nome_marca}</option>`;
            }
          
            $('#cb_marcas').prop( "disabled",false);
           
        }else{
            option = '<option>Marca não encontrada</option>';
            $('#cb_marcas').attr("disabled", true);
        }
        $('#cb_marcas').html(option);
       
        
    })
}