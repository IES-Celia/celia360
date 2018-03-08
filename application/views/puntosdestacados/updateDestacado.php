<!DOCTYPE html>
<html>
<body>

	<h1 align="center">Update de celda</h1>
	
	<fieldset class='for'>

		<?php
        $tabla=$celda[0];
			echo"<form action='".site_url("Puntos_destacados/processupdatedestacado")."' method='get'>
                    Id de la zona:  <input type='text' name='id_celda' value='".$tabla['id_celda']."' readonly> <br/>
                    Nombre de la zona:  <input type='text' name='titulo_celda' value='".$tabla['titulo_celda']."'> <br/>
                    Imagen:  <input type='text' name='imagen_celda' value='".$tabla['imagen_celda']."'> <br/>
                    Escena de pannellum: <input type='text' name='escena_celda' value='".$tabla['escena_celda']."'> <br/>
                    Fila a la que pertenece: <input type='number' min='0' max='4' name='fila_asociada' value='".$tabla['fila_asociada']."'><br>
			    
				    <input type='submit'>
                    <a href='".site_url("/puntos_destacados/borrar_celda/".$tabla['id_celda'])."'
    >BORRAR ESTA CELDA (CUIDADO)</a>
            ";
        ?>
		    	
				
			   
			</form>
	
	</fieldset>

</body>
</html>
