<?php // Formulario de rmodificacion de usuarios
$datos=$aud[0];
$tipo=$datos["tipo_aud"];
$da1=basename($datos["url_aud"],".mp3");
$da2=$datos["desc_aud"];
$id=$datos["id_aud"];

 echo "
    
                <form  class='for' action='". site_url("audio/modificarAud/".$id)."' method='post' enctype='multipart/form-data'>
                    URL audio:<input type='text' name='url_aud' value='$da1'><br/>
                    Descripcion:<input type='text' name='desc_aud'  value='$da2'><br/>    
					<input type='hidden' name='MAX_FILE_SIZE' value='500000000'> 					
                    <input type='hidden' name='id'  value='$id'><br/>
                       Tipo<select name='tipo_aud' selected='$tipo'>
  			<option value='v-guiada'>visita guiada</option>
 			<option value='d-objeto'>definir objeto</option>
		</select><br/><br/>
                    <input type='submit'>
                </form>";
?>
