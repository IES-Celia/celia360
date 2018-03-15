$(document).ready(function(){
    $("#descripcion_portada").fadeOut('fast');
// para que cambie el background a INICIO al hacer hover
    
$('#header_portada img').mouseenter(function(){
    $("#titulito").text(base_titulo);
    $("#descripcion_portada").text("");
    $("#descripcion_portada").siblings().fadeIn('fast');
});
    
      $('html, body').css({
        overflow: 'hidden',
        height: '100%'
    });
    
// para que cambie el background a LIBRE al hacer hover

$('#opcionlibre_portada').mouseenter(function(){
    $("#titulito").text("Visita Libre");
    
    $("#descripcion_portada").text("Recorre el emblematico instituto Celia Viñas a voluntad");
    $("#descripcion_portada").fadeIn('fast');
    $("#descripcion_portada").siblings().fadeOut('fast');
    // $("#descripcion_portada").siblings().css('visibility', 'hidden');; con mantiene el mismo flujo pero no tiene animación
});
    
$('#opcionlibre_portada').click(function(){
  $('#portadaca').fadeOut();
}); 

$('#opcionguiada_portada').click(function(){
  $('#portadaca').fadeOut();
}); 
      
// para que cambie el background a GUIADA al hacer hover

$('#opcionguiada_portada').mouseenter(function(){
    $("#titulito").text("Visita Guiada");
    $("#descripcion_portada").text("Dejate llevar y le mostraremos la historia de nuestro instituto");
    $("#descripcion_portada").fadeIn('fast');
    $("#descripcion_portada").siblings().fadeOut();
    
});
    
// para que cambie el background a PUNTOS DESTACADOS al hacer hover
  
$('#opciondestacada_portada').mouseenter(function(){
    $("#titulito").text("Zonas Destacadas");
    $("#descripcion_portada").text("Pasea por los lugares más atractivos del instituto");
    $("#descripcion_portada").fadeIn('fast');
    $("#descripcion_portada").siblings().fadeOut();
    
});

    
// para que cambie el background a BIBLIOTECA al hacer hover
  
$('#clickbiblio').mouseenter(function(){
    $("#titulito").text("Biblioteca");
    $("#descripcion_portada").text("Descubre y lee algunos de los libros de los que disponemos");
    $("#descripcion_portada").fadeIn('fast');
    $("#descripcion_portada").siblings().fadeOut();
    
});    
    
// para que cambie el background a creditos al hacer hover
  
$('#creditos_portada').mouseenter(function(){
    $("#titulito").text("Creditos");
    $("#descripcion_portada").text("Conoce los alumnos de DAW que hicieron posible este tour");
    $("#descripcion_portada").fadeIn('fast');
    $("#descripcion_portada").siblings().fadeOut();
    
});  
    
    
$("#slider1_portada").mouseenter(function(){
    $("#titulito").text(base_titulo);
    $("#descripcion_portada").text("");
    $("#descripcion_portada").siblings().fadeIn();
});    
    
    
    
////// PRUEBA PARA MOSTRAR BIBLIO AYAX
$('#clickbiblio').on("click",function(){
    $('#bibliotecaajax').css("display","block");
});
    // para desactivar el scroll cuando la pantalla sea grande 
//if ($(window).width()<800){
  

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