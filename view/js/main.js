var gridAnuncioVenda = function() {//Função de atualização do gridAnuncioVenda

    var boxGrid = document.querySelector('div[data-model="AnunciosBox"]');

    var width = boxGrid.offsetWidth;

    var quantidadePorLinha = Math.round(width / 320);

    boxGrid.setAttribute("style", `grid-template-columns: repeat(${quantidadePorLinha},280px);`)

}
window.onresize = function(){// Evento de redimendionar a tela
    gridAnuncioVenda();
} 
gridAnuncioVenda();



/* Função de Import */
function include(file_path){
    return new Promise(function(resolve,reject){
      try{
         var j = document.createElement("script");
         j.type = "text/javascript";
         j.async = false;
         j.onload = function(){
           resolve();  
         };
         j.src = file_path;
         document.head.appendChild(j);
      }catch(e){
          reject(e);
      }
    })
}


