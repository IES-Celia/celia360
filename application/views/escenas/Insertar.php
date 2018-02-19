<!DOCTYPE html>
<html>
<body>

			<h1 align="center">Insercion de lugares</h1>
	
	<fieldset class='for'>

		<?php
			echo"<form action='".site_url("escenas/processinsertscene")."' method='get' enctype='multipart/form-data'>";

			echo "<input type='hidden' value='$id_mapa' name='id_mapa'>";
			echo "<input type='hidden' value='$left_mapa' name='left_mapa'>";
			echo "<input type='hidden' value='$top_mapa' name='top_mapa'>";
        ?>
		    	
				Nombre del lugar:  <input type='text' name='name'> <br/>
        
				Panorama:  <input type='file' name='panorama' placeholder='Seleccione la escena'> <br/>
			    
			    
				<input type='submit'>
			   
			</form>
	
	</fieldset>

</body>
</html>
