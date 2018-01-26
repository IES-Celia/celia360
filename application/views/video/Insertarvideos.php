<?php

?>
<html>
<h1>Insertar Video</h1>
<form action='<?php echo site_url("/video/insertarvideo"); ?>' method='Post' enctype='multipart/form-data' >
    	Desc:<input type='text' name='desc'><br/>
	Inserte video<input type='text' name ='video' id='video'></br>
	<input type='hidden' name='MAX_FILE_SIZE' value='5000000000000'> 
    
    <input type='submit'>
</form>
</html>