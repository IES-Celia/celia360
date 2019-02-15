<div class="container mt-2">
	<div class="row">
		<div class="col-md-12">
			<h1 class="text-center">
				Modificación de Hotspots Vídeo
			</h1>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
				<?php

$tabla = $tabla[0];

echo "

<form action=' ".site_url("hotspots/updateHotspotVideo/".$tipo_update)." ' method='get'>

	<div class='form-group'>
		<label for='text'>Coordenadas donde se situa el punto:</label>
		<a class='btn btn-primary' href='".site_url('escenas/cargar_escena_modificar/'.$codigo_escena.'/'."update_hotspot_pitchyaw/".$tabla['id_hotspot'])."'>Modificarlos</a>
	</div>
	
   
	
	<div id='puntoVideo'> 
       
			<input type='hidden' name='sceneId' id='sceneId' readonly='readonly' value='".$codigo_escena."'>
			<input type='hidden' name='id_scene'  readonly='readonly' value='".$tabla['id_hotspot']."'>
            <input type='hidden' name='pitch' value='".$tabla['pitch']."'>
            <input type='hidden' name='yaw 'value='".$tabla['yaw']."'>
            <input type='hidden' name='cssClass' value='custom-hotspot-video' readonly='readonly'>
            <input type='hidden' name='tipo' value='info' readonly='readonly'>
			<input type='hidden' name='clickHandlerFunc' value='video' readonly='readonly'>
    </div>
	<input type='hidden' name='id_hotspot' value='".$tabla['id_hotspot']."'>";
	echo '<div class="form-group">';
	echo "<label for='text1'>ID del video que se reproducirá al clickar: </label>";
	echo "<select id='idVideoForm' name='clickHandlerArgs' class='form-control'>";
			for($i=0;$i<count($allVideos);$i++){
				$info = $allVideos[$i];
				if($info['id_vid'] == $tabla['clickHandlerArgs']){
					echo '<option value="'.$info['id_vid'].'" selected>'.$info['desc_vid'].'</option>';
				}else{
					echo '<option value="'.$info['id_vid'].'">'.$info['desc_vid'].'</option>';
				}
			}
			
			echo "</select>";
			echo "</div>";
	
	echo "
	<div class='form-group'>
		<input type='submit' class='btn btn-success button' value='Acualizar Hotspot Vídeo'>
		<a class='rojo_borrar btn btn-danger' href='".site_url("/hotspots/delete_hotspot/".$tabla['id_hotspot']."/".$tipo_update)."'
    >Borrar Hotspot Vídeo</a>
	</div>
</form>

"; /**  Cierre echo **/

?>
				</div>
			</div>
		</div>
	</div>
	
</div>
   