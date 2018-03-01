<!DOCTYPE html>
<html>
<body>

			<h1 align="center">Insercion de lugares</h1>
	
	<fieldset class='for'>

		<?php
			echo"<form action='".site_url("Puntos_destacados/processinsertdestacado")."' method='post' enctype='multipart/form-data'>";
        ?>
		    	
				Nombre de la zona:  <input type='text' name='name'> <br/>
				Imagen:  <input type='text' name='name'> <br/>
                Escena inicial: <input type='text' name='name'> <br/>
			    
			    
				<input type='submit'>
			   
			</form>
	
	</fieldset>

</body>
</html>
