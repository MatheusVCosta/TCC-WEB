var marcas = {};
$.get('https://fipeapi.appspot.com/api/1/carros/marcas.json').then(function(res){
	
	console.log("RESPOSTA",res);

	res.forEach(function(marca,acc){
		
		marcas[marca.id] = marca;
        marcas[marca.id].sql = `INSERT INTO tbl_modelos(nome_marca)VALUES('${ marca.name }')`;

		setTimeout(function(){
			
			$.get(`https://fipeapi.appspot.com/api/1/carros/veiculos/${marca.id}.json`)
            .then(function(modelosToMarca){
                marcas[marca.id].modelos = [];
                //marcas[marca.id].modelos = modelosToMarca;
                modelosToMarca.forEach(function(modelo){
                   modelo.sql = `INSERT INTO tbl_modelo_veiculo(nome_modelo)VALUES('${ modelo.name }')`;
                   marcas[marca.id].modelos.push(modelo);
                });

            });

			console.log(`marca ${marca.name}     :   `,new Date().getTime());
		},(marca.id * 176)+1000 * acc);
		
	})

})
function marcasToSql(objetoMarcas){
    var sqlMarcas = "";
    var sqlModelos = "";
    Object.keys(objetoMarcas)
    .forEach(function(index){
        
        sqlMarcas += objetoMarcas[index].sql;

        objetoMarcas[index].modelos.forEach(function(modelo){
            sqlModelos += modelo.sql;
        })
    })
    console.log("Sql Marcas  : ",sqlMarcas);
    console.log("Sql Modelos : ",sqlModelos);
}