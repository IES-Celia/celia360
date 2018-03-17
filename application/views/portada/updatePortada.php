	<h1 align="center">Formulario para modificar la portada</h1>
	<br>
	<fieldset class='for'>

		<?php
        $tabla=$tabla[0];
			echo"
            <form action='".site_url("Conversorbd2json/modificar_titulo")."' method='post' enctype='multipart/form-data'>
                Titulo de la web:  <input type='text' name='tituloweb' value='".$tabla['tituloweb']."'><br/>
				<input type='submit'><br><br>
            </form>  
                
		        <br><br><br>
                <form action='".site_url("Conversorbd2json/modificar_imagen")."' method='post' enctype='multipart/form-data'>
                    Imagen de portada: <input type='file' name='imagenweb'><br>
			    
				    <input type='submit'><br><br>
                </form>";  
        ?>
	</fieldset>