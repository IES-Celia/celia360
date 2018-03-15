    <style>
        #panorama{
            height: auto;
        }
    </style>";
    
    
  
    <div id='caja'>
	
			<h1 align="center">Insercion de lugares</h1>
   

		<?php
			echo"<form action='".site_url("escenas/processinsertscene")."' method='post' enctype='multipart/form-data'>";

			echo "<input type='hidden' value='$piso_mapa' name='piso_mapa'>";
			echo "<input type='hidden' value='$left_mapa' name='left_mapa'>";
			echo "<input type='hidden' value='$top_mapa' name='top_mapa'>";
        ?>
		    	
				Nombre del lugar:  <input type='text' name='name'> <br/>
                <input type="hidden" name="MAX_FILE_SIZE" value="20000000"/>
				Panorama:  <input type='file' name='panorama' id='panorama' placeholder='Seleccione la escena'> <br/>
			    
			    
				<input type='submit'>
			   

	
	

    </div>
  
