$(document).ready(function(){
    $('#cambio_portada').hide();
 
// para que cambie el background a INICIO al hacer hover
    
$('#header_portada img').bind("mouseenter",function(){
    $('#slider1_portada').css("background-image", "url('assets/imagenes/portada/portada5.jpg')");
    $('#cambio_portada').fadeOut();
    $('#slider1_portada .contenedor_portada').children().fadeIn();
    
    $('#slider1_portada').unbind("click");
    
});
    
// para que cambie el background a LIBRE al hacer hover

    
$('#opcionlibre_portada').bind("mouseenter",function(){
    $('#cambio_portada').fadeIn();
    $('#destacado_portada').fadeOut();
    $('#guiada_portada').fadeOut();
    $('#libre_portada').fadeIn();
    $('#slider1_portada .contenedor_portada').children().fadeOut();
  
});
    
$('#opcionlibre_portada').click(function(){
  $('#portadaca').fadeOut();
  
}); 
  
$('#opcionguiada_portada').click(function(){
  $('#portadaca').fadeOut();
  
}); 
  
  

    
    
// para que cambie el background a GUIADA al hacer hover

    
$('#opcionguiada_portada').bind("mouseenter",function(){
    $('#cambio_portada').fadeIn();
    $('#destacado_portada').fadeOut();
    $('#guiada_portada').fadeIn();
    $('#libre_portada').fadeOut();
    $('#slider1_portada .contenedor_portada').children().fadeOut();
    
});
    
// para que cambie el background a PUNTOS DESTACADOS al hacer hover

    
$('#opciondestacada_portada').bind("mouseenter",function(){
    $('#cambio_portada').fadeIn();
    $('#destacado_portada').fadeIn();
    $('#guiada_portada').fadeOut();
    $('#libre_portada').fadeOut();
    $('#slider1_portada .contenedor_portada').children().fadeOut();
    
});

////// PRUEBA PARA MOSTRAR BIBLIO AYAX
$('#clickbiblio').on("click",function(){
    $('#bibliotecaajax').css("display","block");
});
    // para desactivar el scroll cuando la pantalla sea grande 
//if ($(window).width()<800){
    $('html, body').css({
        overflow: 'hidden',
        height: '100%'
    });

    // para activar el scroll    
    /*$('#lazo_portada').on('click',function(){
      $('html, body').css({
        overflow: 'auto',
        height: 'auto'
    });  
    });*/
    
    // para darle efecto al historia
    /*
    $('#lazo_portada').on('click', function(e){
        e.preventDefault();
       $('html,body').animate({
           scrollTop: 1000
       }, 800); 
    });*/
    
//}
});