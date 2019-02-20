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

        <?php
        echo "<script>";
        echo "piso_maximo = " . count($mapa) . ";";
        echo "piso_maximo--";
        echo "</script>";
        ?>

		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1 class="text-center">
						Modificación de punto destacado
					</h1>
				</div>
			</div>
			<div class="col-md-8 mx-auto">
				<div class="card">
					<div class="card-body">
        <div id='caja2'>
                <?php
                $tabla = $celda[0];
                echo"<form action='" . site_url("PuntosDestacados/processupdatedestacado") . "' method='post' enctype='multipart/form-data'>
                <input type='hidden' name='id_celda' value='" . $tabla['id_celda'] . "' readonly>
				
				<div class='form-group'>
					<label for='nombrepd'>Nombre del punto destacado</label>
					<input type='text' class='form-control' name='titulo_celda' value='" . $tabla['titulo_celda'] . "'>
				</div>

				<div class='form-group'>
					<label for='nuevaimg'>Nueva imagen</label>
					<input type='file' name='imagen_celda' class='form-control-file'>
				</div>

				
				<div class='form-group'>
					<label for='escenaselec'>Escena seleccionada</label>
					<input type='text' name='escena_celda' class='form-control bg-white' readonly value='" . $tabla['escena_celda'] . "'>
				</div>
                 
				 <div class='form-group'>
					 <label for='fila-celda'>Fila de la celda</label>
					 <input type='number' min='0' max='4' name='fila_asociada' value='" . $tabla['fila_asociada'] . "'>
				 </div>
				 <div class='card'>
					<div class='card-body'>
						Seleccione la escena en el mapa:<br>(se sombreará en amarillo)
					</div>
				</div>";
                
                ?>

                <div id="mapa_escena_hotspot" class="insertar_pd m-4">
                    <?php
                    $indice = 0;

                    foreach ($mapa as $imagen) {

                        echo "<div id='zona" . $indice . "' class='pisos pisos_pd'>";
                        echo "<img src='" . base_url($imagen['url_img']) . "' style='width:100%;'>";

                        foreach ($puntos as $punto) {
                            if ($punto['piso'] == $indice) {

                                echo "<div id='punto" . $punto['id_punto_mapa'] . "' class='puntos' style='left: " . $punto['left_mapa'] . "%; top: " . $punto['top_mapa'] . "%;' escena='" . $punto['id_escena'] . "'></div>";
                            }
                        }
                        echo "</div>";
                        $indice++;
                    }
                    ?>
                </div>
				<div class="form-group">
				<button id="btn-bajar-piso" type="button" class="btn btn-primary">Bajar piso</button>
                <button id="btn-subir-piso" type="button" class="btn btn-primary">Subir piso</button>
				</div>
                <hr>
				<div class="form-group">
				<input type='submit' class='btn btn-success' value='Guardar cambios'>
				</div>
                
        
                </form>
        </div>
					</div>
				</div>
			</div>
		</div>
