<?php 

$id_escena = $_REQUEST["id_scene"];
$yaw = $_REQUEST["yaw"];
$pitch = $_REQUEST["pitch"];


$urlAtras = site_url('hotspots/show_insert_hotspot/').$pitch."/".$yaw."/".$id_escena."/vacio";

?>
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
  width: 50%;
  height: 70%;
  background-color:rgba(0,0,0,0.2);
  border-radius:20px;
  padding:20px;
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
  background-color:rgba(0,0,0,0.2);
  border-radius:20px;
  padding:20px;
  font-family:"verdana";
}
  .borderojo{
   border: 2px solid white;
}

  #img_seleccionadas { 
    list-style-type: none;
    margin: 0;
    padding: 0;
    }
  #img_seleccionadas li { 
    background-color:  grey;
    font-size: 1.2em;
    padding: 12px;
    border-radius: 10px;
    color:white;
    margin: 5px 0; 
    }

   

  </style>
</head>
<script src="<?php echo base_url("assets/js/jquery.js"); ?>"></script>
<script src="<?php echo base_url("assets/js/jqueryui/jquery-ui.js"); ?>"></script>
  <body>
  <?php



  
  echo "<h2 align='left' style='color:white;font-family:verdana; margin-left:10px;'>Imagenes disponibles</h2>
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
  echo "<a class='enlace_img' href='#'>"; 
  echo img($imagen_propiedades);
  echo "</a>";       
  
  }
 ?>
    </div>
<div id='panel'>
 <h2 style='color:white'>Imagenes Seleccionadas</h2><br>
 <div style='color:white'>HotSpot ID</div>
 <input type="text" id='idhs' value="<?php echo $idhs; ?>" disabled/><br>
 <ul id='img_seleccionadas'>
 
 </ul><br>
  <div style='color:white; font-weight:bold; font-size: 1.2rem;'>
    Nota: Puedes ordenar las imagenes arrastrandolas en la lista.
  </div>
  <button onclick='add_img_to_hotspot()'>Enviar</button>
  <br>
  <form id='formulario_atras' action="<?php echo $urlAtras; ?>" method='get'>
    <input id='panel_atras' type='button' value='volver atras'>
  </form>
</div>
</div>  
<script>

  $("#panel_atras").on("click",function(){
    var url = "<?php echo site_url('hotspots/borrarUltimo'); ?>";
    console.log(url);
    var peticion = $.ajax({
      type: "get",
      url: url
    });

    peticion.done(function(){
      console.log("Se ha borrado el ultimo hotspot");
      $("#formulario_atras").submit();

    });
  });
 
   $(".enlace_img").on('click', function(evento){
     evento.preventDefault();
     if($(this).find("img").hasClass("borderojo")){
       $(this).find("img").removeClass("borderojo");
       //Remove el elemento de la lista.
       var imagen_buscar =$(this).find("img").attr("src");
       var cortado_enlace = imagen_buscar.split("/");
       var enlace_final = cortado_enlace[cortado_enlace.length-1];
       console.log(enlace_final);
       $(".seleccionado").each(function(){
         if(enlace_final==$(this).text()){
           $(this).remove();
         }
       });
     } else {
       
      var imagen = $(this).find("img");
      //Aqui guardaria el data-id y el src
      var attr_idimg = imagen.attr("data-id");
      var attr_img = imagen.attr("src");
      var cortado_enlace = attr_img.split("/");
      imagen.addClass("borderojo");
      $("#img_seleccionadas").append("<li class='seleccionado ui-state-default' data-id="+attr_idimg+">"+cortado_enlace[cortado_enlace.length-1]+"</li>");

      //TODO:confirm
     }
    });

     $(document).ready(function () {
      $("#img_seleccionadas").sortable();
      $("#img_seleccionadas").disableSelection();
     });  
     


  
  function add_img_to_hotspot(){

    var escena = "<?php echo $escena_actual;?>";
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
      data:{listaimg : prueba, idhs : hotspot, idescena : escena }
    });
    
    peticion.done(function(resultado){
      
      window.location.href = resultado;
     //current_url()
    });
    

    
    
  }
  
  
  


  

</script>  
</body>	
</html>
