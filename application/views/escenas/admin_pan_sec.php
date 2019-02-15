<style>

    .cerrar{
        position: relative;
        top:15px;
        left:44%;

    }
    .img-cerrar{
        width: 20px;
        height: 20px;
	}
	
	.blanco{
		color:white;
	}

    #panorama {
        width: 300px;
        height: 250px;
    }

    .panoramas{
        width: 500px;
        height: 300px;
				margin: 0 auto;

    }

    .oculto{
        display: none;
    }

    .activo {
        display: block;
    }

    

</style>

<!-- NUEVOOOOOOO -->

<div class="container mt-3">
 <div class="row">
 	<div class="col-12">
 		<h1 class="text-center">Panel de administración Imágenes Secundarias</h1>
	 </div>
 </div>
 <div class="row">
 <div class="col-2 offset-10">
 	<a class="btn btn-primary" onclick="mostrar('insertar',0)" data-toggle='modal' data-target='#insert'><i class='fas fa-plus-circle'></i> Nueva imagen</a>
 </div>
</div>
<div class="row">
 
 	<div class="col-12">
 		<table class="table table-striped table-hover" id="cont">
		 <thead>
	<tr id="cabecera">
		<th>Título</th>
		<th>Fecha</th>
		<th>Imagen</th>
		<th>Modificar</th>
		<th>Eliminar</th>
	</tr>
	</thead>
	<tfoot>
		<tr id="cabecera">
			<th>Título</th>
			<th>Fecha</th>
			<th>Imagen</th>
			<th>Modificar</th>
			<th>Eliminar</th>
		</tr>
	</tfoot>
	<tbody>
	<?php 
		if(isset($tabla_escena_secundaria)){
		for($i=0;$i<count($tabla_escena_secundaria);$i++){
			$info = $tabla_escena_secundaria[$i];
			echo "<tr id='imagen-".$info['id_panorama_secundario']."'>
				<td class='titulo-img'>".$info['titulo']."</td>
				<td class='fecha-img'>".$info['fecha_acontecimiento']."</td>
				<td class='text-center'>
				<div class='custom-hotspot-info mx-auto' id='".$info['id_panorama_secundario']."'> 
					<span class='oculto'>".base_url($info['panorama'])."</span>
				</div>

				<div id='panorama-".$info['id_panorama_secundario']."' class='panoramas oculto'>
				</div>
				<div class='form-group mt-3'>
				<button class='admin btn btn-primary mr-3 col-xs-12'>Pitch-Yaw</button></a>
				<a href='".base_url('Panoramas_Secundarios/cargar_escena/'.$info['id_panorama_secundario'])."/show_insert_hotspot/'><button class='admin btn btn-primary col-xs-12'>Hotspots</button></a>
				</div>
			
				</td>
				
				
				
				</div></div></td>
				<td><i class='fa fa-edit edit text-primary' data-toggle='modal' data-target='#exampleModal' style='font-size:30px;' onclick='mostrar(\"modificar\", \"".$info['id_panorama_secundario']."\");'></i></td>
				<td><i class='fa fa-trash delete del text-primary' id='".$info['id_panorama_secundario']."' style='font-size:30px;'></i></td>
			</tr>";
		}
	}
	?>
	</tbody>
</table>
	 </div>
 </div>
</div>



<script>
	 function borrar_imagen(id_imagen) {
        if (confirm("¿Estás seguro?")) {
            $.get("<?php echo site_url('imagen/borrar_imagen/'); ?>" + id_imagen, null, respuesta);
        }
    }

    function respuesta(r) {
        if (r.trim() == "0") {
			document.getElementById("mensajemenu").innerHTML = "<span id='error_cabecera'>Error al borrar la imagen.</span>";
		} else if (r.trim() == "-1") {
			document.getElementById("mensajemenu").innerHTML = "<span id='error_cabecera'>Ésta imagen está en uso en un hotspot y no se puede borrar.</span>";
            
        } else {
            
            document.getElementById("mensajemenu").innerHTML = "<span id='mensaje_cabecera'>Imagen borrada con éxito.</span>";
			
			selector = "#imagen-"+parseInt(r);
			
            $(selector).remove();
			
        }
    }
  
    function mostrar(capa,id){
        if (capa == "insertar") {
            $("#insertar").show();     
        }
        if (capa == "modificar") {
            
           titulo = $("#imagen-"+id).find(".titulo-img").text();
           fecha  = $("#imagen-"+id).find(".fecha-img").text();
           url = $("#imagen-"+id).find(".url-img").text();
		   imagen = $("#imagen-"+id).find(".imagen-img").attr("src");//la imagen
		   id_pan_sec = $("#imagen-"+id).find(".delete").attr("id");

		   cod_escena = '<?php echo $tabla_escena_secundaria[0]['cod_escena'] ?>';

            $("#titulo_modificar").val(titulo);
            $("#fecha_modificar").val(fecha);
			$("#id_modificar").val(id_pan_sec);
			$("#id_escena_principal").val(cod_escena);
            
            $("#modificar").show();     
        }    
    }

    function cerrar(){
        $("#insertar").hide();
        $("#modificar").hide();
    }  
 
//PAGINACIÓN CON JQUERY LOLI
    $(document).ready(function() {

        $('#cont').dataTable({
    	"language": {
            "lengthMenu": "Mostrar _MENU_ registros por página",
            "zeroRecords": "No se encontraron resultados en su búsqueda",
            "searchPlaceholder": "Buscar registros",
            "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
            "infoEmpty": "No existen registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "search": "Buscar:",
            "paginate": {
	            "first":    "Primero",
	            "last":    "Último",
	            "next":    "Siguiente",
	            "previous": "Anterior"
	    },
        }
        });
    });


	    var fileobj = [];
    function upload_file(e) {
        e.preventDefault();
          for(i=0;i<e.dataTransfer.files.length;i++){
            fileobj.push(e.dataTransfer.files[i]);
          }
		  previewfile(fileobj);
          ajax_file_upload(fileobj);
		}

 
    function file_explorer() {
		salir = false;
		document.getElementById('selectfile').click();
        itemPadre = document.getElementById("drag_upload_file");
        document.getElementById('selectfile').onchange = function() {

          for(i=0;i<document.getElementById('selectfile').files.length;i++){
            fileobj.push(document.getElementById('selectfile').files[i]);

			if(fileobj[i].name.includes('png')){
				salir = true;
			}
          }

		  if(salir){
			fileobj = [];
			document.getElementById("error_cabecera").innerHTML = "Solo se aceptan formatos jpg";

		  }else{
          	previewfile(fileobj);
          	ajax_file_upload(fileobj);
		  }
        };
    }
    var contador = 1;
    var acumulable = 0;

    function previewfile(file) {
      for(i = 0;i<file.length;i++){
        if(file[i].name.includes("JPG") || file[i].name.includes('jpg')){
          var reader = new FileReader();
          reader.onload = function (event) {
			var image = new Image();
			image.setAttribute("class","imagenesDragDrop");
            var inputName = document.createElement("input");
            var label = document.createElement("label");
            var label2 = document.createElement("label");
            var fecna = document.createElement("input");
            fecna.setAttribute("type",'date');
            fecna.setAttribute('name','fecha'+contador);
            fecna.setAttribute("id","fecha"+contador);
						fecna.setAttribute("class",'form-control');
						fecna.className += " inputsClass";
						fecna.value = '<?php echo date('Y-m-d'); ?>';
            var contentLabel = document.createTextNode("Título de imágen "+contador+": ");
            var contentLabelFecna = document.createTextNode("Fecha de imágen "+contador+": ");
            label.setAttribute("for","nombre"+contador);
            label.appendChild(contentLabel);
            label2.setAttribute("for","fecha"+contador);
            label2.appendChild(contentLabelFecna);
            inputName.setAttribute("type","text");
            inputName.setAttribute("name","nombre"+contador);
						inputName.setAttribute("id","nombre"+contador);
						inputName.setAttribute("class","form-control");
						inputName.className += " inputsClass";
	
            contador++;
            image.src = event.target.result;
            image.width = 250; // a fake resize
            image.height = 250;
            document.getElementById("imagenesView").appendChild(label);
            document.getElementById("imagenesView").appendChild(inputName);
            document.getElementById("imagenesView").appendChild(label2);
            document.getElementById("imagenesView").appendChild(fecna);
            document.getElementById("imagenesView").appendChild(image);
            acumulable++;
          }
		  reader.readAsDataURL(file[i]);
        }
      }
	}

	function compruebaCampo(){
		for(i=0;i<$("input.inputsClass").length/2;i++){
			longitudNombre = document.getElementById('nombre'+(i+1)).value.length;
			longitudFecha = document.getElementById('fecha'+(i+1)).value.length;

			valorNombre = $("#nombre"+(i+1));
			valorFecha = $("#fecha"+(i+1));

			if(longitudNombre == 0){
				valorNombre.css('border-color','red');
				valorNombre.focus();
				return false;

			} else if(longitudFecha == 0){
				valorFecha.css('border-color','red');
				valorFecha.focus();
				return false;
			}
		}
		return true;
	}

 
    function ajax_file_upload(file_obj) {

      document.getElementById("btnEnvio").addEventListener('click',function(){
		if(compruebaCampo()){
			var form_data = new FormData();
            for(var i = 0;i<file_obj.length;i++){                 
              form_data.append('file[]', file_obj[i]);
            }

            for(var j = 1;j<=acumulable;j++){
              form_data.append('nombre'+j,document.getElementById("nombre"+j).value);
              form_data.append('fecha'+j,document.getElementById("fecha"+j).value);
            }
            var myNode = document.getElementById("imagenesView");
            while (myNode.firstChild) {
                myNode.removeChild(myNode.firstChild);
            }
            $.ajax({
                type: 'POST',
                url: '<?php echo site_url('Panoramas_Secundarios/insertSecondaryPanorama/'.$datos_escena[0]['cod_escena']); ?>',
                contentType: false,
                processData: false,
                data: form_data,
                success:function(result){

                  if(result == 0){
										$("#error_cabecera").html('');
                    $("#mensaje_cabecera").html("<div class='alert alert-success ' role='alert' ><h7 class='mr-2'>Imágenes insertadas correctamente</h7><i class='far fa-check-circle'></i></div>");
                  }else{
                    $("#error_cabecera").html("<div class='alert alert-danger ' role='alert' ><h7 class='mr-2'>Error al insertar todas las imágenes</h7><i class='far fa-check-circle'></i></div>");
										$("mensaje_cabecera").html("");
                  }

				  cod_escena = '<?php echo $cod_escena; ?>';
				  setTimeout(function(){
					window.location = '<?php echo base_url("Panoramas_Secundarios/show_panoramas_secundarios/'+cod_escena+'"); ?>';
				   }, 1500);
				  
				}
            });
		}else{
			alert("Rellene todos los inputs");
		}   
		});
		fileobj = [];
		contador = 1;
		acumulable = 0;
		form_data = "";
	}

 //DELETE POR AJAX

 $(document).ready(function(){
	 $(".delete").click(function(){
		respuesta = confirm("¿Estás seguro?");
		if(respuesta == true){
		fila = $(this).parent().parent();
		id = $(this).attr("id");
		url = "<?php echo base_url('Panoramas_Secundarios/deletePanorama/');?>"+id;
		$.get( url, function( data ) {
			if (data.trim() < "0") {
				$("#error_cabecera").html("<div class='alert alert-danger' role='alert' ><h7 class='mr-2'>Hubo un error al eliminar la imagen</h7><i class='far fa-check-circle'></i></div>");

			}else if(data.trim() > "0"){
				$("#mensaje_cabecera").html("<div class='alert alert-success' role='alert' ><h7 class='mr-2'>Imagen eliminada con éxito</h7><i class='far fa-check-circle'></i></div>");
				fila.remove();
			}
			});
		}
	 });
 });
</script>


<!-- Modal -->
<div class="modal fade mt-5" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal de actualización</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <form enctype="multipart/form-data"  action='<?php echo site_url("Panoramas_Secundarios/updatePanorama"); ?>' method='post'>
            <?php
			echo "<input type='hidden' name='id_escena_principal' id='id_escena_principal' value=''><br/>";
            echo "<input type='hidden' name='id_imagen' id='id_modificar' value=''><br/>";
			   echo "<div class='form-group'>
			   T&iacute;tulo:<input type='text' id='titulo_modificar' name='titulo_imagen' value='' class='form-control'>
			   </div>";
            //echo "<br>Descripción:<input type='text' id='texto_imagen_modificar' name='texto_imagen' value=''><br/>";
			echo "<div class='form-group'>
			Fecha:<input type='date' class='form-control' id='fecha_modificar' name='fecha'  value=''>
			</div>";
            echo '<input type="hidden" name="MAX_FILE_SIZE" value="20000000" />';
            ?>   
            <input type='submit' class='btn btn-success float-right' name ='actualizar' value = 'Actualizar'>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade mt-5" id="insert" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal de actualización</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
	  <div id="drop_file_zone" ondrop="upload_file(event)" ondragover="return false">
	  <div id="drag_upload_file">
            <p>Arrastra los archivos</p>
            <p>o</p>
            <p><button class="btn btn-primary" value="Selecciona archivos" onclick="file_explorer();">Selecciona las imágenes</button></p>
            <div id="imagenesView">

            </div>

            <input type="file" id="selectfile" name="file[]" multiple accept="image/jpeg">
            <p><button id="btnEnvio" class="btn btn-primary" type="button">Subir imágenes</button></p>
           
        </div>
    </div>
      </div>
    </div>
  </div>
</div>

<script>
	$(document).ready(function(){
		$("#cont").on("click", ".custom-hotspot-info", function(){
            id = $(this).attr('id');
            img = $(this).find('span').text();


            pannellum.viewer('panorama-'+id, {
                "type": "equirectangular",
                "panorama": img,
                "autoLoad": true
            });
            $('#panorama-'+id).toggleClass('oculto');
        });
    });
</script>

