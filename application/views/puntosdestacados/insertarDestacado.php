<!DOCTYPE html>
<html>
<body>

	<h1 align="center">Insercion de celda</h1>
	
	<fieldset class='for'>

		<?php
			echo"<form action='".site_url("Puntos_destacados/processinsertdestacado")."' method='post' enctype='multipart/form-data'>";
        ?>
		    	
				Nombre de la zona:  <input type='text' name='titulo_celda'> <br/>
				Imagen:  <input type='text' name='imagen_celda'> <br/>
                Escena de pannellum: <input type='text' name='escena_celda'> <br/>
			    Fila a la que pertenece: <input type='text' name='fila_asociada' value='<?php echo '$idfila' ?>' readonly><br>
			    
				<input type='submit'>
			   
			</form>
	
	</fieldset>

</body>
</html>
