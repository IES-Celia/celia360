<!DOCTYPE html>
<html>
<body>

			<h1 align="center">Insercion de lugares</h1>
	
	<fieldset class='for'>

		<?php
			echo"<form action='".site_url("escenas/processinsertscene")."' method='get'>";
        ?>
		    	Nombre del lugar:  <input type='text' name='name'> <br/>
        
				Panorama:  <input type='file' name='panorama' placeholder="Seleccione la escena"> <br/>
			    
			    
				<input type='submit'>
			   
			</form>
	
	</fieldset>

</body>
</html>
