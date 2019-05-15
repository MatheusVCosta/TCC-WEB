function pararExportaFip(id_tipo_veiculo){

	/* Farol que para a exportação quando for 1 */
	window.exportarFIPestado = 1;
	
	$('.modal_fip .btn_fip_exportar').text(' Iniciar Exportação ');
	$('.modal_fip .btn_fip_exportar').attr('onclick','exportarFIP('+id_tipo_veiculo+')');

}
function exportarFIP(id_tipo_veiculo){

   $('.modal_fip .btn_fip_exportar').text(' Parar a exportação ');
   $('.modal_fip .btn_fip_exportar').attr('onclick','pararExportaFip('+id_tipo_veiculo+')');

   $.get('https://fipeapi.appspot.com/api/1/carros/marcas.json').then(function(res){

	res.forEach(function(marca,acc){

		//Para o processo de exportação
		if(window.exportarFIPestado == 1)return;


	    var marcaExportar = marca;
	    
	    $('.fip_descricao p').text('Pegando marca ' + marca.name);

		setTimeout(function(){

			//Para o processo de exportação
			if(window.exportarFIPestado == 1)return;
			
			$('.fip_descricao p').text('Pegando Modelos da marca ' + marca.name);

			$.get(`https://fipeapi.appspot.com/api/1/carros/veiculos/${marca.id}.json`)
            .then(function(modelosToMarca){
				
				//Para o processo de exportação
				if(window.exportarFIPestado == 1)return;

                marcaExportar.modelos = [];
                marcaExportar.modelos = modelosToMarca;

                exportarMarca(id_tipo_veiculo,marcaExportar);
                
                $('.fip_descricao p').text('Atualizando marca ' + marcaExportar.name);

				if(acc+1 == res.length){
					
					setTimeout(function(){
						$('.fip_descricao p').text('Exportação Terminada !');
						$('.modal_fip .btn_fip_exportar').attr('onclick','fecharModal()');
						$('.modal_fip .btn_fip_exportar').text(' Sair ');
					},2000);

				}

            });

		},(marca.id * 176)+1000 * acc);
		
	})

})
}

function exportarMarca(id_tipo_veiculo,marca){

	setTimeout(function(){

		//Para o processo de exportação
		if(window.exportarFIPestado == 1)return;

		var marca_atual = marca;
		var modelos = marca.modelos;

		/* Removendo ligação */
		delete marca_atual.modelos;

		$.ajax({url:'router.php?controller=TIPO_VEICULO&modo=fip_exportar&marca&id_tipo_veiculo='+id_tipo_veiculo,
			method:'POST',
			data:marca,
		}).then(function(resposta){

			console.log("Resposta",resposta);
			
			if(window.exportarFIPestado == 1)return;

			if(resposta.toString().search('sucesso')>=0){

				/* Marca criada ou atualizada */
				$('.fip_descricao p').text(marca.name + ' atualizada ');

				//Para o processo de exportação
				

				modelos.forEach(function(modelo){

					//Para o processo de exportação
					if(window.exportarFIPestado == 1)return;

					modelo.cod_marca = marca.id;

					exportarModelo(id_tipo_veiculo,modelo);

				})
			}

		})

	},180)
   
}
function exportarModelo(id_tipo_veiculo,modelo){
	setTimeout(function(){

		//Para o processo de exportação
		if(window.exportarFIPestado == 1)return;

		$.ajax({url:'router.php?controller=TIPO_VEICULO&modo=fip_exportar&modelo&id_tipo_veiculo='+id_tipo_veiculo,
			method:'POST',
			data:modelo,
		}).then(function(resposta){

			//Para o processo de exportação
			if(window.exportarFIPestado == 1)return;	

			console.log("Resposta Modelo : ",resposta);

			if(resposta.toString().search('sucesso')>=0){
				console.log("Modelo Exportado");
				$('.fip_descricao p').text(modelo.name + ' atualizado ou criado ');
			}
		})

	},100)
}
