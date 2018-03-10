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
</head>
<body>

	<h1 align="center">Insercion de celda</h1>
	
	<fieldset class='for'>

		<?php
			echo"<form action='".site_url("Puntos_destacados/processinsertdestacado")."' method='post' enctype='multipart/form-data'>";
        ?>
		    	
				Nombre de la zona:  <input type='text' name='titulo_celda' required> <br/>
                <input type="hidden" name="MAX_FILE_SIZE" value="20000000" />
				Imagen:  <input type='file' name='imagen_celda' required> <br/>
                Escena de pannellum: <input type='text' name='escena_celda' required readonly> <br/>
				<button id="btn-bajar-piso" type="button">Bajar piso</button>
				<button id="btn-subir-piso" type="button">Subir piso</button>
				<div id="mapa_escena" class="insertar_pd">
				
				<?php
					$indice = 0;

					foreach ($mapa as $imagen) {
						
						echo "<div id='zona".$indice."' class='pisos pisos_pd' style='background-image: url(".base_url($imagen['url_img']).");'>";
						
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
			    Fila a la que pertenece: <input type='text' name='fila_asociada' value='<?php echo $id_fila ?>' readonly><br>
			    
				<input type='submit'>
			   
			</form>
	
	</fieldset>

</body>
</html>
