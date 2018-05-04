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
<!DOCTYPE html>
<html>
<head>
	<?php 
		echo "<script>";
		echo "piso_maximo = ".count($mapa).";";
        echo "piso_maximo--";
        echo "</script>";
	?>
	<script src="<?php echo base_url("assets/js/jquery.js"); ?>"></script>
	<script src='<?php echo base_url('assets/js/mapa_escena.js')?>'></script>
	<link rel="stylesheet" href="<?php echo base_url("assets/css/estilos_mapa_escenas.css");?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/admin_style.css"); ?>"/>

</head>
<body>

	<h1 align="center">Inserción de punto destacado</h1>
	<div id="caja2">
	<fieldset>

		<?php
			echo"<form action='".site_url("PuntosDestacados/processinsertdestacado")."' method='post' enctype='multipart/form-data'>";   
        ?>
		    	
		Nombre del punto destacado:  <input type='text' name='titulo_celda' required> <br>
                <input type="hidden" name="MAX_FILE_SIZE" value="20000000" /><br>
                Imagen destacada:  <input type='file' name='imagen_celda' required> <br><br><hr><br>
                Seleccione la escena en el mapa:<br>(se sombreará en amarillo) <input type='hidden' name='escena_celda' required> <br><br>
				<div id="mapa_escena_hotspot" class="insertar_pd">
				
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
				</div><br>
				<button id="btn-bajar-piso" type="button">Bajar piso</button>
				<button id="btn-subir-piso" type="button">Subir piso</button>
                                <input type='hidden' name='fila_asociada' value='<?php echo $id_fila ?>' readonly><br><br><br><hr><br>
			    
                            <input type='submit' value='Enviar'><br>
                <a href="<?php echo site_url("PuntosDestacados/cargar_admin_puntosdestacados"); ?>">Atrás</a><br>
			   
			</form>
	
	</fieldset>
        </div>

</body>
</html>
