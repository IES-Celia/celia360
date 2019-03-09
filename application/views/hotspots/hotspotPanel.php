<?php 


$id_escena = $_POST["id_scene"];
$yaw = $this->input->post_get("yaw");
$pitch = $this->input->post_get("pitch");

if(isset($imagenes_seleccionadas)){
  foreach( $imagenes_seleccionadas as $img){
    $seleccionadas .=$img["id_imagen"]." ";
  }

  
}

$urlAtras = site_url('hotspots/show_insert_hotspot/').$pitch."/".$yaw."/".$id_escena."/vacio";

?>
	
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1 class="text-center">
				Modificación de imagenes panel de información
			</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 col-xs-12">
		<?php
echo "<div id='contenedor_img'>
<div id='imgHS'>";

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
		</div>
	</div>
	<div class="col-md-6 col-xs-12">
	<div id='panel'>

<input type="hidden" id='idhs' value="<?php echo $idhs; ?>" disabled/>
<?php
 if(isset($escena_principal)){
	 echo '<input type="hidden" id="escena_pr" value="'.$escena_principal.'" disabled/>';
 }
?>
<ul id='img_seleccionadas'>

</ul>
 <div style='color:white; font-weight:bold; font-size: 1.2rem;'>
	 Nota: Puedes ordenar las imagenes arrastrandolas en la lista. 
 </div>
 <a class='insert btn btn-success' onclick='add_img_to_hotspot()'>Enviar</a>
 <a class='insert btn btn-primary' data-toggle='modal' data-target='#exampleModal'> <i class='fas fa-plus-circle'></i> Insertar imagen </a>
 <!-- <form id='formulario_atras' action="<?php echo $urlAtras; ?>" method='get'>
		 <input id='panel_atras' type='button' value='volver atras'>
 </form> -->

	 <!--**************************LOLI Insertar más imágenes  -->
	          
</div>
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
       //console.log(enlace_final);
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
    //console.log(seleccionadas);
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

			<?php
				if(isset($escena)){
					echo "var escena = '$escena'";
				}else{
					echo "var escena = '$id_escena'";
				}
				?>
    
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
				//console.log(resultado);
				window.location = resultado;
      });
    }
  }
</script>  

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Inserción de imagenes</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

				<?php
					if(isset($id_escena)){
						$url = site_url("hotspots/insertar_imagen/".$tipo."/".$idhs."/".$id_escena);
					}else{
						$url = site_url("hotspots/insertar_imagen/".$tipo."/".$idhs."/".$escena);
					}
				?>

			<form enctype="multipart/form-data" action='<?php echo $url; ?>' method="post">
									 <input type='hidden' name='accion' value='insertar_imagen'>
									 <input id= "id_imagen" name='id_imagen' type ="hidden">

									 <div class="form-group">
									 <label id= "label_titulo" for="titulo">T&iacute;tulo:</label>
									 <input type="text" class="form-control" name='titulo_imagen' placeholder="Introduzca el t&iacute;tulo" required>
									 </div>
									 
									 <div class="form-group">
									 		<label for="texto_imagen">Descripción:</label>
									 		<textarea id="texto_imagen" class="form-control" name='texto_imagen' placeholder="Introduzca la descripci&oacute;n de la imagen"></textarea>
									 </div>

									 <div class="form-group">
									 <label for="fecha">Fecha:</label>
									 <input type="date" class="form-control" id="fecha" name='fecha' placeholder="Introduzca la fecha" value="<?php echo date("Y-m-d"); ?>" required>
									 </div>
									 
									 <!-- MAX_FILE_SIZE debe preceder al campo de entrada del fichero -->
									 <input type="hidden" name="MAX_FILE_SIZE" value="20000000" />
										<div class="form-group">
											<label for="imagen">Imágenes (puede seleccionar varias):</label>
									 		<input type="file" class="form-control-file" name="imagen[]"  id="imagen" placeholder="Seleccionar la(s) imagen(es)" required multiple>
										</div>
									
									 
									 <input type="hidden" name="accion" value="insertar_imagen">
									 <div class="form-group">
										 <input type="submit" name="enviar" class="btn btn-success" value="Guardar imagen"/>
									 </div>
							 </form>
      </div>

    </div>
  </div>
</div>
