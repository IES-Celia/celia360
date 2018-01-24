<?php

?>
<html>
<h1>insertar audio</h1>
<form action='<?php echo site_url("/audio/insertaraud"); ?>' class='for' method='Post' enctype='multipart/form-data' >
    Descripcion:<input type='text' name='desc'><br/>
	Inserte audio<input type='file' name ='audio' id='audio'><br/>
	Tipo<select name="tipo_aud">
  			<option value="v-guiada">Visita guiada</option>
 			<option value="d-objeto" selected>Definir un objeto</option>
		</select><br/><br/>
		<input type='hidden' name='MAX_FILE_SIZE' value='5000000000000'> 
    <input type='submit'>
</form>
</html>