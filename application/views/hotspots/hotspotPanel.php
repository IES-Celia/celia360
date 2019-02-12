<?php 

$id_escena = $_POST["id_scene"];
$yaw = $_REQUEST["yaw"];
$pitch = $_REQUEST["pitch"];

if(isset($imagenes_seleccionadas)){
  foreach( $imagenes_seleccionadas as $img){
    $seleccionadas .=$img["id_imagen"]." ";
  }

  
}

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

    .img-cerrar{
        width: 20px;
        height: 20px;
    }
    .cerrar{
        position: relative;
        top:15px;
        left:44%;
    }
    .derec{
        width:500px;
        float:left;
		}
		
		.blanco {
			color:white;
		}

  </style>
</head>

<script src="<?php echo base_url("assets/js/jquery.js"); ?>"></script>
<script src="<?php echo base_url("assets/js/jqueryui/jquery-ui.js"); ?>"></script>
  <body>
  <h1 class="blanco"> Formulario para insertar Hotspots</h1>
  <br>
  <?php



  
  echo "<div id='contenedor_img'>
  <br><div id='imgHS'>";
  
  foreach( $lista_imagenes as $img){
   $img_correcto = explode(".",$img["url_imagen"]);
   $img_correcto_enlace = base_url("assets/imagenes/imagenes-hotspots/").$img_correcto[0]."_miniatura.jpg";
   $imagen_propiedades = array(
    "src" => $img_correcto_enlace,
    "class" => "imgHS",
    "width" => "120",
    "height" => "120",
    "title" => $img["titulo_imagen"],
    "alt" => $img["titulo_imagen"],
    "data-id" => $img["id_imagen"]
    
  ); 
  echo "<a class='enlace_img' href='#'>"; 
  echo img($imagen_propiedades);
  echo "</a>";       
  
  }
 ?>
    </div>

<title> Insert Hotspot </title>
<div id='panel'>

 <input type="hidden" id='idhs' value="<?php echo $idhs; ?>" disabled/><br>
 <?php
	if(isset($escena_principal)){
		echo '<input type="hidden" id="escena_pr" value="'.$escena_principal.'" disabled/><br>';
	}
 ?>
 <ul id='img_seleccionadas'>
 
 </ul><br>
  <div style='color:white; font-weight:bold; font-size: 1.2rem;'>
    Nota: Puedes ordenar las imagenes arrastrandolas en la lista. 
  </div>
  <a class='insert' onclick='add_img_to_hotspot()'>Enviar</a>
  <br>
  <!-- <form id='formulario_atras' action="<?php echo $urlAtras; ?>" method='get'>
      <input id='panel_atras' type='button' value='volver atras'><br/><br/>
  </form> -->

    <!--**************************LOLI Insertar más imágenes  -->
    <div>
        <div class='derec'>
        <?php
        echo"<a class='insert' onclick='mostrar()' > <i class='fas fa-plus-circle'></i> Insertar imagen </a>";
        ?>
        </div>
        <!--Capa formulario insertar-->
        <div id='insertar'>
            <div id='caja'>
                <!-- CAMPOS DE LA TABLA : id_imagen,  titulo_imagen,  texto_imagen,  url_imagen , fecha -->
                <!-- AQUI EMPIEZA LA VISTA -->
                <?php
                echo"<a class='cerrar' href='#' onclick='cerrar()'><img class='img-cerrar' src='" .
                base_url("assets/css/cerrar_icon.png") . "'></img></a>";
                ?>
                <h1>Insertar imagen</h1>
                <form enctype="multipart/form-data" action='<?php echo site_url("hotspots/insertar_imagen"); ?>' method="post">
                    <input type='hidden' name='accion' value='insertar_imagen'>
                    <input id= "id_imagen" name='id_imagen' type ="hidden"><br />
                    <label id= "label_titulo" for="titulo">T&iacute;tulo:</label>
                    <input type="text" name='titulo_imagen' placeholder="Introduzca el t&iacute;tulo" required><br />
                    <label for="texto_imagen">Descripción:</label>
                    <textarea id="texto_imagen" name='texto_imagen' placeholder="Introduzca la descripci&oacute;n de la imagen"></textarea><br>
                    <label for="fecha">Fecha:</label>
                    <input type="date" id="fecha" name='fecha' placeholder="Introduzca la fecha" value="<?php echo date("Y-m-d"); ?>" required><br />
                    <!-- MAX_FILE_SIZE debe preceder al campo de entrada del fichero -->
                    <input type="hidden" name="MAX_FILE_SIZE" value="20000000" />
                    <label for="imagen">Imágenes (puede seleccionar varias):</label>
                    <input type="file" name="imagen[]"  id="imagen" placeholder="Seleccionar la(s) imagen(es)" required multiple><br />
                    <input type="hidden" name="accion" value="insertar_imagen"><br>
                    <input type="submit" name="enviar" value="Guardar imagen"/>
                </form>
            </div>
        </div>
        <!--    fin insertar más imágenes-->       
    </div>           
</div>

<script>
  
  $("#panel_atras").on("click",function(){

    var confirmar = confirm("¿Quieres volver atras?");
    var modificar = "<?php if(isset($imagenes_seleccionadas))echo 'modificar';else echo 'nomodificar'; ?>;";
			
    if(confirmar){
      if(modificar=="nomodificar"){
        var url = "<?php echo site_url('hotspots/borrarUltimo'); ?>";
        var peticion = $.ajax({
          type: "get",
          url: url
        });
      } else{
        window.location.href = "<?php echo base_url("hotspots/show_update_hotspot/$idhs/$id_escena"); ?>";
      }
     
    }

    peticion.done(function(resultado){
      if(resultado>0){
        console.log("Se ha borrado el ultimo hotspot");
        $("#formulario_atras").submit();
      } else {
        console.log("Error al volver atras");
      }

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
         if(enlace_final==$(this).find("span").text()){
           $(this).remove();
         }
       });
     } else {
      var imagen = $(this).find("img");
      //Aqui guardaria el data-id y el src
      var attr_idimg = imagen.attr("data-id");
      var attr_img = imagen.attr("src");
      var attr_title = imagen.attr("title");
      var cortado_enlace = attr_img.split("/");

      var dirrecion = "<?php echo base_url("assets/imagenes/imagenes-hotspots/") ?>"+cortado_enlace[cortado_enlace.length-1];
      var img_min = "<img style='height:120px; width:120px' src='"+dirrecion+"'>";

      imagen.addClass("borderojo");
      $("#img_seleccionadas").append("<li class='seleccionado ui-state-default' data-id="+attr_idimg+"> "+img_min+" "+attr_title+" <span style='display:none;'>"+cortado_enlace[cortado_enlace.length-1]+"</span></li>");

     }
    });

     $(document).ready(function () {
      $("#img_seleccionadas").sortable();
      $("#img_seleccionadas").disableSelection();
      check_imgs_selected();
     });  
     
  function check_imgs_selected(){

    //ID DEL HOTSPOT ACTUAL
    var id_hotspot = $("#idhs").val();
    //GET LOS ID'S DE IMAGEN ASOCIADOS A HOTSPOT ID
    var seleccionadas = "<?php echo $seleccionadas; ?>";
    
    seleccionadas = seleccionadas.split(" ");
    console.log(seleccionadas);
    seleccionadas.forEach(element => {
      var imagen = $('.enlace_img .imgHS[data-id='+element+']');
      var attr_idimg = imagen.attr("data-id");
      var attr_img = imagen.attr("src");
      var attr_title = imagen.attr("title");
      var cortado_enlace = attr_img.split("/");

      var dirrecion = "<?php echo base_url("assets/imagenes/imagenes-hotspots/") ?>"+cortado_enlace[cortado_enlace.length-1];
      var img_min = "<img style='height:120px; width:120px' src='"+dirrecion+"'>";

      imagen.addClass("borderojo");
          $("#img_seleccionadas")
          .append("<li class='seleccionado ui-state-default' data-id="+
          attr_idimg+"> "+img_min+" "+attr_title+" <span style='display:none;'>"+cortado_enlace[cortado_enlace.length-1]+"</span></li>");
    });
    
  }
  
  function add_img_to_hotspot(){


    if($("#img_seleccionadas").has("li").length == 0) {
      alert("Debes seleccionar alguna imagen!");
    } else {

      var escena = "<?php echo $id_escena;?>";
    
      var prueba = [];
      var orden = [];
      //Valor temporal para probar si funciona
      var hotspot = $("#idhs").val();
			if($('#escena_pr') != null){
				var escena_principal = $('#escena_pr').val();
			}
      $("#img_seleccionadas li").each(function(i){
        prueba.push($(this).attr("data-id"));
        orden.push(i);

        
      });

      //alert(escena); //este es el alert que te dice la escena cuando le das a enviar 

      var urlCorrecta = "<?php echo base_url("hotspots/add_imgs_hotspot") ?>";
      var peticion = $.ajax({
        url: urlCorrecta,
        type: "POST",
        data:{listaimg : prueba, idhs : hotspot, idescena : escena, listaorden : orden, escena_pr: escena_principal  }
      });
      
      peticion.done(function(resultado){


        //http://localhost/celia360/escenas/cargar_escena/p0p8f3/show_insert_hotspot/null
				console.log(resultado);
				window.location = resultado;
      });
    }
  }
    /* 
    * Mostrar el formulario para insertar nuevas imágenes en una modal
    * 
    * */
    function mostrar(){
        $("#insertar").show();      
    }
    /*
    * Cerrar la ventana modal de insertar nuevas imágenes
    * 
    */
    function cerrar(){
        $("#insertar").hide();
    }  
</script>  
</body>	
</html>
