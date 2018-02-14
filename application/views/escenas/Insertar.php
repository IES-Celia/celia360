<!DOCTYPE html>
<html>
<body>

			<h1 align="center">Insercion de lugares</h1>
	
	<fieldset class='for'>

		<?php
			echo"<form action='".site_url("escenas/processinsertscene")."' method='get'>";
        ?>
		    	Nombre del lugar:  <input type='text' name='name'> <br/>
				
			    
				panorama:  <input type='text' name='panorama'> <br/>
			    
			    
				<input type='submit'>
			   
			</form>
	
	</fieldset>

</body>
</html>
