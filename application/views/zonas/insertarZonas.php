<style>
    #panorama{
        height: auto;
    }
</style>

    <div id='caja'>
		<h1 class="text-center">Insercion de zonas</h1>
		<?php
	    echo"<form action='".site_url("escenas/processinsertscene")."' method='post' enctype='multipart/form-data'>";
            echo "<input type='hidden' value='$piso_mapa' name='piso_mapa'>";
            echo "<input type='hidden' value='$leftZona' name='leftZona'>";
            echo "<input type='hidden' value='$topZona' name='topZona'>";
            ?>
            Nombre de la zona:  <input type='text' name='name'> <br/>
            <input type="hidden" name="MAX_FILE_SIZE" value="20000000"/>
            Zona:  <input type='file' name='panorama' id='panorama' placeholder='Seleccione la escena'> <br/>
            <input type='submit'>
		</form>
    </div>