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
		echo "piso_maximo = ".count($mapa).";";
        echo "piso_maximo--";
        echo "</script>";
	?>

		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1 class="text-center">
						Inserción de punto destacado
					</h1>
				</div>
			</div>
			<div class="row">
				<div class="col-md-8 mx-auto">
					<div class="card">
						<div class="card-body">
						<div id="caja2">
		<?php
			echo"<form action='".site_url("PuntosDestacados/processinsertdestacado")."' method='post' enctype='multipart/form-data'>";   
        ?>
		    	<div class="form-group">
					<label for="namepd">Nombre del punto destacado</label>
					<input type='text' name='titulo_celda' required class="form-control">
				</div>
		
                <input type="hidden" name="MAX_FILE_SIZE" value="20000000" />
				<div class="form-group">
					<label for="imgdest">Imagen destacada</label>
					<input type='file' name='imagen_celda' required class="form-control-file">
				</div>
                <hr>

				<div class="card">
					<div class="card-body">
						Seleccione la escena en el mapa:<br>(se sombreará en amarillo) 
					</div>
				</div>

                <input type='hidden' name='escena_celda' required>
				<div id="mapa_escena_hotspot" class="insertar_pd mt-4 mb-4">
				
				<?php
					$indice = 0;

					foreach ($mapa as $imagen) {
						
						echo "<div id='zona".$indice."' class='pisos pisos_pd'>";
						echo "<img src='".base_url($imagen['url_img'])."' style='width:100%;'>";
						
						foreach ($puntos as $punto) {
							if($punto['piso']==$indice){
								
									echo "<div id='punto".$punto['id_punto_mapa']."' class='puntos' style='left: ".$punto['left_mapa']."%; top: ".$punto['top_mapa']."%;' escena='".$punto['id_escena']."'></div>";
							
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
				
				<input type='hidden' name='fila_asociada' value='<?php echo $id_fila ?>' readonly><br><br><br><hr><br>
				<div class="form-group">
					<input type='submit' class="btn btn-success" value='Insertar punto destacado'>
				</div>
                            
                
			   
			</form>
        </div>
						</div>
					</div>
				</div>
			</div>
		</div>

