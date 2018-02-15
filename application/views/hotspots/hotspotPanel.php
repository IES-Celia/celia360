<html>
<head>
  <style>
    div#imgHS {
  display: flex;
  flex-wrap: wrap;
  overflow-y: auto;
  align-content: flex-star;
  width: 40%;
  height: 90%;
}
    
    a {
  margin: 1px;

}
    div#panel{
      position: absolute;
      right: 100px;
      top:10px;
    }
    .borderojo{
      border: 2px solid red;
    }
  </style>
</head>
<script src="<?php echo base_url("assets/js/jquery.js"); ?>"></script>
  <body>
  <?php

	if (isset($error)) {
		echo "<p style='color:red'>".$error."</p>";
	}
	if (isset($mensaje)) {
		echo "<p style='color:blue'>".$mensaje."</p>";
	}

    
  echo "<div id='imgHS'>";
  foreach( $lista_imagenes as $img){
   $img_correcto = explode(".",$img["url_imagen"]);
   $imagen_propiedades = array(
    "src" => "assets/imagenes/imagenes-hotspots/".$img_correcto[0]."_miniatura.JPG",
    "class" => "imgHS",
    "width" => "120",
    "height" => "120",
    "data-id" => $img["id_imagen"]
    
  ); 
  echo "<a href='#'>"; 
  echo img($imagen_propiedades);
  echo "</a>";       
  
  }
 ?>
</div>
<div id='panel'>
 <h2>Imagenes Seleccionadas</h2><br>
 HotSpot ID
 <input type="text" id='idhs' value="<?php echo $idhs; ?>" disabled/><br>
 <ul id='img_seleccionadas'>
 
 </ul><br>
  <button onclick='add_img_to_hotspot()'>Enviar</button>
</div>
  
  <!-- Pruebas AJAX -->
  <div id='pruebaAjax'>
  <h2 id='titulo'></h2>
  <div id='gallery'>
  <img src=''>
  </div>
  <p id='texto'></p>
  <div id='Gmodal-content'></div>
    
    <button onclick='panelInformacion(8)'>panel 8</button>
    <button onclick='panelInformacion(9)'>panel 9</button>
  </div>
  
  
<script>
  /*
    Cuando pinche en un enlace, asociar la imagen de ese enlace
    Y mostrarlo en el otro DIV.
    
    Si esa imagen ya estaba asociado y vuelve a pulsar, lo quita.
    
    Al finalizar pincha en el boton aceptar y se crea la tabla.
    
    En el controlador de hotspots deberia salir una nueva opcion
    En esa opcion te deja modificar las imagenes asociadas a ese punto.
    
    OPCIONAL- permitir organizar el orden de visualizacion
    
  */
   $("a").on('click', function(evento){
     evento.preventDefault();
     if($(this).find("img").hasClass("borderojo")){
       $(this).find("img").removeClass("borderojo");
       //Remove el elemento de la lista.
       var imagen_buscar =$(this).find("img").attr("src");
       $(".seleccionado").each(function(){
         if(imagen_buscar==$(this).text()){
           $(this).remove();
         }
       });
     } else {
       
      var imagen = $(this).find("img");
      //Aqui guardaria el data-id y el src
      var attr_idimg = imagen.attr("data-id");
      var attr_img = imagen.attr("src");
      imagen.addClass("borderojo");
      $("#img_seleccionadas").append("<li class='seleccionado' data-id="+attr_idimg+">"+attr_img+"</li>");

      //TODO:confirm
     }
    });
       
     
    
  
  function add_img_to_hotspot(){
    var prueba = [];
    //Valor temporal para probar si funciona
    var hotspot = $("#idhs").val();
    //Aqui guardo en un array todos los ids de imagenes y lo mando al script php
    $("#img_seleccionadas li").each(function(i){
      prueba.push($(this).attr("data-id"));
      
    });
    
    
    var peticion = $.ajax({
      url: "add_imgs_hotspot",
      type: "POST",
      data:{listaimg : prueba, idhs : hotspot}
    });
    
    peticion.done(function(){
     alert("TERMINADA! la transferencia!");
    });
    
  }
  
  
  
    //Version mas reciente del panel
  function panelInformacion(args){
     //$(".modal").css("visibility","visible");
     var peticion = $.ajax({
        url:"load_panel",
        type:"post",
        data:{id_hotpost : args},
        beforeSend: function(){
        //Cambiar el valor del texto y titulo
        $("#titulo").html("Cargando...");
        $("#texto").html("Cargando...");
        //Borrar las tiras creadas en el punto anterior
          $(".GmySlides").each(function(){
            $(this).remove();
           
          });
        }
     });
    
    peticion.done(function(datos){
      var prueba = JSON.parse(datos);
      //Cargamos una vez los datos basicos
      $("#titulo").html(prueba[0].titulo_panel);
      $("#texto").html(prueba[0].texto_panel);
      //La primera imagen que sale al abrir el panel
      $("#gallery").find("img").attr("src",prueba[0].url_imagen);
      //Por cada indice del array creamos la imagen de la galeria
      for(var i=0;i<prueba.length;i++){
        //Para poner bien el enlace con codeigniter guardamos en la variable la url y luego se la pasamos
        var enlace = "<?php echo base_url("assets/imagenes-hotspots/")?>"+prueba[i].url_imagen;
        $("#Gmodal-content").append("<img class='GmySlides' src='"+enlace+"' style='width:100%'>");
        
      }
     
      
    });
  }

</script>  
</body>	
</html>
