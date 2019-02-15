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
// a continuacion nos encontramos con el css de las ventanas modales de la vista audio.
?>


<div class="container mt-2">
	<div class="row">
		<div class="col-md-12">
			<h1 class="text-center">Modificiación de Hotspots de tipo salto</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-8 col-xs-12">
		<div id='mapa_escena_hotspot'>
            <?php
                $indice = $this->session->piso;
                    echo "<div id='zona".$indice."' class='pisos pisos_update'>";
                    echo "<img src='".base_url($mapa[$indice]['url_img'])."' style='width:100%;'>";
                    foreach ($puntos as $punto) {
                        if($punto['piso']==$indice){
                            if($punto['id_escena'] == $escena_inicial){
                                echo "<div id='punto".$punto['id_punto_mapa']."' class='punto_inicial' style='left: ".$punto['left_mapa']."%; top: ".$punto['top_mapa']."%;' escena='".$punto['id_escena']."'></div>";
                            }else{
                                echo "<div id='punto".$punto['id_punto_mapa']."' class='puntos' style='";
                                if($punto['id_escena']==$tabla['sceneId']) echo "background-color: yellow;";
                                echo "left: ".$punto['left_mapa']."%; top: ".$punto['top_mapa']."%;' escena='".$punto['id_escena']."'></div>";
                            }
                        }
                    }
                    echo "</div>";
            ?>
            </div>
		</div>

		<div class="col-md-4 col-xs-12">
		<?php

$tabla = $tabla[0];

echo "


<form action=' ".site_url("hotspots/process_update_hotspot")."/".$escena_inicial."/".$tipo_update." ' method='get'>

			<div class='card'>
				<div class='card-body'>
					<p>Coordenadas en las que se situa el hotspot en la imagen 360:</p>
					<a class='btn btn-primary' href='".site_url('escenas/cargar_escena_modificar/'.$codigo_escena.'/'."update_hotspot_pitchyaw/".$tabla['id_hotspot'])."'>Modificarlos</a>
				</div>
			</div>

			<div class='card mt-2'>
					<div class='card-body'>
					<p>Hacia donde se orientará la vista en la imagen 360 a la que se salta:</p>
					<a class='btn btn-primary' href='".site_url('escenas/cargar_escena_modificar/'.$tabla['sceneId'].'/'."update_hotspot_targets/".$tabla['id_hotspot'])."'>Modificarlos</a>
					</div>
			</div>

			<div class='card mt-2'>
					<div class='card-body'>
					<label>Selecciona una escena (en rojo donde estás, amarillo donde saltará)</label>
					<input type='text' class='form-control' value='".$tabla['sceneId']."' name='sceneId'>
					</div>
			</div>

			<div class='card mt-2'>
					<div class='card-body'>
					<label>Selecciona una escena (en rojo donde estás, amarillo donde saltará)</label>
					<input type='text' class='form-control' value='".$tabla['sceneId']."' name='sceneId'>
					</div>
			</div>
			";

			
   
    

    
	
     
   
    
    if($tabla['cerrado_destacado']==0){
		echo "
		<div class='card mt-2'>
			<div class='card-body'>
		<div>
			<input type='radio' name='cerrado_destacado' value='0' checked>
			<label for='txt'>Aparecerá en Puntos Destacados</label>
		</div>

		<div>
			<input type='radio' name='cerrado_destacado' value='1'>
			<label for='txt2'>NO aparecerá en Puntos Destacados</label>
		</div>
		</div>
		</div>
		
			 ";
    }else{
		 echo "
		 
		 <div class='card mt-2'>
	<div class='card-body'>
		<div>
			<input type='radio' name='cerrado_destacado' value='0' >
			<label> Aparecerá en Puntos Destacados</label>
		</div>
		<div>
		<input type='radio' name='cerrado_destacado' value='1' checked>
		<label> NO aparecerá en Puntos Destacados</label>
		</div>
	</div>
</div>
		 
        ";
    }
    
    
    echo "
	<input type='hidden' name='cssClass' value='".$tabla['cssClass']."'>
	<input type='hidden' name='id_hotspot' value='".$tabla['id_hotspot']."'>
	<div class='form-group m-2'>
	<input type='submit' class='btn btn-success'>
	<a class='rojo_borrar btn btn-danger' href='".site_url("/hotspots/delete_hotspot/".$tabla['id_hotspot'])."/".$tipo_update."'>Borrar Hotspot</a>
	</div>
	
	
	
</form>

"; /**  Cierre echo **/

?>
		</div>

		</div>
	</div>
</div>


