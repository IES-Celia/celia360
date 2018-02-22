<html>
<head>
  <style>
  
  #contenedor_img {
  display:flex;
  align-items: flex-end;
  justify-content:flex-start;
}
  #imgHS {
  display: flex;
  flex-wrap: wrap;
  width: 60%;
  height: 70%;
}
    
  #imgHS > a {
  margin-left: 2px;
  margin-right: 2px;
}
  #panel{
  display:flex;
  align-items: baseline;
  flex-flow: column wrap;
  margin: 0 20px;
  align-self:flex-start;
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

  
  echo "<h2>Imagenes disponibles</h2>
  <div id='contenedor_img'>
  <br><div id='imgHS'>";
  
  foreach( $lista_imagenes as $img){
   $img_correcto = explode(".",$img["url_imagen"]);
   $img_correcto_enlace = base_url("assets/imagenes/imagenes-hotspots/").$img_correcto[0]."_miniatura.jpg";
   $imagen_propiedades = array(
    "src" => $img_correcto_enlace,
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
</div>  
<script>
 
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
  
  
  


  

</script>  
</body>	
</html>
