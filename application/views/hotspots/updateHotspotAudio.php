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
?>




		<div class="container mt-2">
			<div class="row">
				<div class="col-md-12">
					<h1 class="text-center">Modificación de Hotspot Audio</h1>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-body">
						<?php
        $tabla = $tabla[0];

        echo "

        <form action=' " . site_url("hotspots/updateHotspotAudio/".$tipo_update) . " ' method='get'>
			<div class='form-group'>
				<label for='coords'>Coordenadas donde se situa el punto:</label>
				<a class='btn btn-primary' href='" . site_url('escenas/cargar_escena_modificar/' . $codigo_escena . '/' . "update_hotspot_pitchyaw/" . $tabla['id_hotspot']) . "'>Modificarlos</a>
			</div>
	
        
	<div id='puntoAudio'> 
       
            <input type='hidden' name='sceneId' id='sceneId' readonly='readonly' value='" . $codigo_escena . "'>
            <input type='hidden' name='id_scene'  readonly='readonly' value='" . $tabla['id_hotspot'] . "'>
            <input type='hidden' name='pitch' value='" . $tabla['pitch'] . "'>
            <input type='hidden' name='yaw 'value='" . $tabla['yaw'] . "'>
            <input type='hidden' name='cssClass' value='custom-hotspot-audio' readonly='readonly'>
            <input type='hidden' name='tipo' value='info' readonly='readonly'>
            <input type='hidden' name='clickHandlerFunc' value='audio' readonly='readonly'>
			
			<div class='form-group'>
				<label for='audio'>Audio que se reproducirá al clickar en el punto:</label>
			
			
			
			<select id='idAudioForm' name='clickHandlerArgs' class='form-control'>";
			for($i=0;$i<count($allAudios);$i++){
				$info = $allAudios[$i];
				if($info['id_aud'] == $tabla['clickHandlerArgs']){
					echo '<option value="'.$info['id_aud'].'" selected>'.$info['desc_aud'].'</option>';
				}else{
					echo '<option value="'.$info['id_aud'].'">'.$info['desc_aud'].'</option>';
				}
			}
			
			echo "</select>";
			echo "</div>";
        
        
        echo "</div>
            <input type='hidden' name='id_hotspot' value='" . $tabla['id_hotspot'] . "'>
	
			<div class='form-group'>
				<input type='submit' class='btn btn-success ml-2' value='Actualizar Hotspot'>
				<a class='rojo_borrar btn btn-danger' href='" . site_url("/hotspots/delete_hotspot/".$tabla['id_hotspot']."/".$tipo_update) . "'
				>Eliminar Hotspot Audio </a>
			</div>
            
            
           
	
        </form>

";/**  Cierre echo * */
        ?>
						</div>
					</div>
				</div>
			</div>
		</div>


        

        <script>
            $(document).ready(function () {
                $("#listaAudios").children().show();
                $("#listaAudios").load("<?php echo site_url("audio/obtenerListaAudiosAjax"); ?>");
            });

        </script>	
