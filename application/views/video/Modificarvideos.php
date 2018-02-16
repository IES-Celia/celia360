<?php

// Formulario de rmodificacion de usuarios

$da1 = $vid[0]["url_vid"];
$da2 = $vid[0]["desc_vid"];
$id = $vid[0]["id_vid"];

echo "
    
                <form action='" . site_url("video/modificarvideo/" . $id) . "' method='post' enctype='multipart/form-data'>
                    URL Video:<input type='text' name='url_vid' value='$da1'><br/>
                    Descripcion:<input type='text' name='desc_vid'  value='$da2'><br/>    
			<input type='hidden' name='MAX_FILE_SIZE' value='500000000'> 					
                    <input type='text' name='id'  value='$id'><br/>
                    
                    <input type='submit'>
                </form>";
?>
