$(document).scroll(function(){
   
   var boxGrid = $('[data-model="AnunciosBox"]');
   
   if(window.window.scrollY > boxGrid.offset().top && !boxGrid.hasClass('action-animated')) {
        
       boxGrid.addClass('action-animated'); 
        
  }

});