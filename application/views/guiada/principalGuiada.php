<?php

/*
    Este archivo es parte de la aplicación web Celia360. 

    Celia 360 es software libre: usted puede redistribuirlo y/o modificarlo
    bajo los términos de la GNU General Public License tal y como está publicada por
    la Free Software Foundation en su versión 3.
    Celia 360 se distribuye con el propósito de resultar útil,
    pero SIN NINGUNA GARANTÍA de ningún tipo. 
    Véase la GNU General Public License para más detalles.

    Puede obtener una copia de la licencia en <http://www.gnu.org/licenses/>.
*/


$urlFormulario = site_url('guiada/modificarEscena');
    
?>
<script src="<?php echo base_url("assets/js/jqueryui/jquery-ui.js"); ?>"></script>
<style>
    #modalGuiada{
        display : none;
	}
	
	.placeholder{
		height: 100px;
		background-color:black;
		opacity: 0.5;
		border: 3px dotted white;
	}
</style>
<div class="container">
    <div class="row mt-4 mb-4">
        <div class="col-md-12">
        
			<button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
			<i class='fa fa-plus-circle'></i>
				Crear nueva visita guiada
			</button>
		</div>
    </div>
    <div class="row">    
        <div class="col-md-12">
            <table class="table bg-secondary" id='cont'>
                <thead class="text-center">
                    <tr id='cabecera'>
                        <th>
                            <!--onclick='ordenarTabla("id_visita")'-->ID
                            <!--<span class='ordernar'>&#8645;</span>-->
                        </th>
                        <th>
                            <!--onclick='ordenarTabla("cod_escena")'-->Nombre
                            <!--<span class='ordernar'>&#8645;</span>-->
                        </th>
                        <th>
                            <!--onclick='ordenarTabla("audio_escena")'-->Descripción
                            <!--<span class='ordernar'>&#8645;</span>-->
                        </th>
                        <th>Borrar</th>
                        <th>Modificar</th>
                    </tr>
                </thead>
                <tbody>
<?php
if (count($escenas) == 0) {
    echo "<tr><td colspan='10'>No hay registros para mostrar.</td></tr>";
}
else {
    foreach ($escenas as $escena) {
        
        $idEscena =$escena['id'];

echo "<tr class='filaEscena'>
        <td class='id_visita align-middle'>".$escena['id']."</td>
        <td class='text-center align-middle nombre_visita'>".$escena['nombre']."</td>
        <td class='descr_visita text-center align-middle'>".$escena['descripcion']."</td>
        <td class='text-center align-middle'>
            <a data-id='$idEscena' class='text-primary' onclick='borrarGuiada(this)'><img class='svg' src='".base_url('assets/imagenes/svg/trash.svg')."'></a>
        </td>
        <td class='text-center align-middle'>
            <a data-id='$idEscena' onclick='modificarGuiada(this)' class='text-primary'>
			<img class='svg' src='".base_url('assets/imagenes/svg/edit.svg')."' data-target='#updateModal' data-toggle='modal'>
            </a>
        </td>";
    }
} // else
?>

                </tbody>
                <tfoot class="text-center">
                    <tr id='cabecera'>
                        <th>
                            <!--onclick='ordenarTabla("id_visita")'-->ID
                            <!--<span class='ordernar'>&#8645;</span>-->
                        </th>
                        <th>
                            <!--onclick='ordenarTabla("cod_escena")'-->Nombre
                            <!--<span class='ordernar'>&#8645;</span>-->
                        </th>
                        <th>
                            <!--onclick='ordenarTabla("audio_escena")'-->Descripción
                            <!--<span class='ordernar'>&#8645;</span>-->
                        </th>
                        <th>Borrar</th>
						<th>Modificar</th>
                    </tr> 
                </tfoot>
            </table>
        </div>
    </div>
</div>

<!-- Modal modificar -->

<div class="modal fade" id="modalGuiada" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modificar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="escenaGuiada">Selecciona una escena:</label>
          <input type="text"
            class="form-control bg-white" readOnly name="escenaGuiada" id="escenaGuiada" aria-describedby="helpId" placeholder="">
        </div>
        <div id="mapa_guiada">
            <?php
            
                 $indice = 0;

                 foreach ($mapa as $imagen) {
                    if($indice == 0)
                        echo "<div id='zona".$indice."' class='pisos pisos_guiada'>";
                    else 
                        echo "<div id='zona".$indice."' class='pisos pisos_guiada' style='display: none'>";
                    
                    echo "<img src='".base_url($imagen['url_img'])."' style='width:100%;'>";
                    foreach ($puntos as $punto) {
                        if($punto['piso']==$indice){
                            if($punto['id_escena'] == $configuracion['escena_inicial']){
                                echo "<div id='punto".$punto['id_punto_mapa']."' class='punto_inicial' style='left: ".$punto['left_mapa']."%; top: ".$punto['top_mapa']."%;' escena='".$punto['id_escena']."'></div>";
                            }else{
                                echo "<div id='punto".$punto['id_punto_mapa']."' class='puntos' style='left: ".$punto['left_mapa']."%; top: ".$punto['top_mapa']."%;' escena='".$punto['id_escena']."'></div>";
                            }
                        }
                    }
                    echo "</div>";
                    $indice++;
                }
                
            ?>
        </div>
        <div class="row mt-4">
            <div class="col-md-12 text-center">
                <button id="btn-bajar-piso" class="btn btn-primary">Bajar piso</button>
                <button id="btn-subir-piso" class="btn btn-primary">Subir piso</button>
            </div>
        </div>
        <div class="form-group">
          <label for="tituloGuiada">Titulo escena</label>
          <input type="text"
            class="form-control" name="tituloGuiada" id="titulo_escena" aria-describedby="helpId" placeholder="">
        </div>
        <div class="form-group">
          <label for="">Selecciona un audio</label>
          <select class="form-control" name="audioGuiada" id="audioGuiada">
            <?php 
                foreach ($audios as $audio) {
                    $nombreAudio=$audio["url_aud"];
                    echo "<option value= \"$nombreAudio\" >$nombreAudio</option>";
                }
            ?>
          </select>
        </div>
        <div class="row">
            <div class="col-md-12">
                <button id='actualizarGuiada' type="button" class="btn btn-primary float-right">Enviar</button>
            </div>
        </div>
      </div>
    </div>
  </div>
</div> 

<!-- Modal modificar imagen-->

<div class="modal fade" id="modalGuiadaImagen" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modificar Imagen</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id='guiadaImagen' id='caja' enctype="multipart/form-data" action='' method="post">
            <div class="form-group">
                <label for=""><h4>Selecciona una imagen</h4></label>
                <input type="file" class="form-control-file" name="imagenPreview" aria-describedby="fileHelpId" required>
            </div>
			<input type="hidden" name="id_visita" value="">
            <input type="hidden" name="MAX_FILE_SIZE" value="20000000" />
            <button type="submit" class="btn btn-success float-right">Enviar</button>
        </form>
      </div>
    </div>
  </div>
</div> 

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Creación de visita guiada</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url('Guiada/insertarVisitaGuiada') ?>" method="post">
		
		<div class="form-group">
				<label for="name">Nombre</label>
				<input type="text" class="form-control" name="nombre" placeholder="Nombre de la visita">
		</div>
		<div class="form-group">
				<label for="name">Descripción</label>
				<textarea name="descripcion" class="form-control" cols="30" rows="5" placeholder="Descripción de la visita"></textarea>
		</div>

		<div class="form-group">
			<button class="btn btn-success float-right" type="submit">Insertar visita guiada</button>
		</div>

		</form>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modificación de visita guiada</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url('Guiada/proccessUpdateVisitaGuiada') ?>" method="post">
		
		<div class="form-group">
				<label for="name">Nombre</label>
				<input type="text" class="form-control" name="nombre" id="nombre_visita" placeholder="Nombre de la visita">
				<input type="hidden" id="id_visita" name="id">
		</div>
		<div class="form-group">
				<label for="name">Descripción</label>
				<textarea name="descripcion" class="form-control" id="descr_visita" cols="30" rows="5" placeholder="Descripción de la visita"></textarea>
		</div>

		<div class="form-group">
			<button class="btn btn-success float-right" type="submit">Guardar Cambios</button>
			<a href='' id="mod_visita_guiada" class="btn btn-primary mr-2">Modificar visita guiada</a>
		</div>

		</form>
      </div>
    </div>
  </div>
</div>

<script>
function borrarGuiada(elemento) {
        var confirmar = confirm("¿Estas seguro que quieres borrar esta visita?");
        if (confirmar) {
            var idEscena = $(elemento).attr("data-id");
            var urlPeticion = "<?php echo base_url("Guiada/borrarVisitaGuiada");?>";
            var peticion = $.ajax({
                type: "post",
                url: urlPeticion,
                data: { id: idEscena }
            });

        peticion.done(function (resultado) {
					
					console.log(resultado.trim());

						switch (resultado.trim()) {
							case '-1': 
								$('#mensaje_cabecera').html('');
								$('#error_cabecera').html("<div class='alert alert-danger' role='alert' ><h7 class='mr-2'>La visita que deseas borrar contiene estancias.</h7><i class='fas fa-exclamation-circle'></i></div>");
							break;
							case '1': 
									$(elemento).closest(".filaEscena").remove();
									$('#error_cabecera').html('');
									$('#mensaje_cabecera').html("<div class='alert alert-success' role='alert' ><h7 class='mr-2'>Escena guiada eliminada con éxito</h7><i class='far fa-check-circle'></i></div>");
							break;
							case '0': 
									$('#mensaje_cabecera').html('');
									$('#error_cabecera').html("<div class='alert alert-danger' role='alert' ><h7 class='mr-2'>Error al eliminar la visita guiada</h7><i class='fas fa-exclamation-circle'></i></div>");
							break;
						}  
        });
      }
  }

	function modificarGuiada(elemento) {

		$("#id_visita").val($(elemento).parent().parent().find('.id_visita').text()); 
		$('#nombre_visita').val($(elemento).parent().parent().find('.nombre_visita').text());
		$('#descr_visita').val($(elemento).parent().parent().find('.descr_visita').text());

		base_url = "<?php echo base_url('Guiada/showUpdateStayGuiada/');?>"+$("#id_visita").val();

		$("#mod_visita_guiada").attr('href',base_url);
	}


</script>

