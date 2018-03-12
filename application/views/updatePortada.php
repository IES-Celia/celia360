<!DOCTYPE html>
<html>
<head>
	<?php 
		echo "<script>";
		echo "piso_maximo = ".count($mapa).";";
        echo "piso_maximo--";
        echo "</script>";
	?>
	<script src="<?php echo base_url("assets/js/jquery.js"); ?>"></script>
	<script src='<?php echo base_url('assets/js/mapa_escena.js')?>'></script>
	<link rel="stylesheet" href="<?php echo base_url("assets/css/estilos_mapa_escenas.css");?>">
</head>
<body>

	<h1 align="center">Update de celda</h1>
	
	<fieldset class='for'>

		<?php
        $tabla=$tabla[0];
			echo"<form action='".site_url("Conversorbd2json/modificar_titulo")."' method='get'>
                    Titulo de la web:  <input type='text' name='tituloweb' value='".$tabla['tituloweb']."'> <br/>
				    <input type='submit'><br><br>
                </form>  
                
		        <br><br><br>
                <form action='".site_url("Conversorbd2json/modificar_imagen")."' method='get'>
                    Imagen de portada: <input type='file' name='imagenweb'><br>
			    
				    <input type='submit'><br><br>
                </form>";  
        ?>
	</fieldset>

</body>
</html>
