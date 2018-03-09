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
        $tabla=$celda[0];
			echo"<form action='".site_url("Puntos_destacados/processupdatedestacado")."' method='get'>
                    Id de la zona:  <input type='text' name='id_celda' value='".$tabla['id_celda']."' readonly> <br/>
                    Nombre de la zona:  <input type='text' name='titulo_celda' value='".$tabla['titulo_celda']."'> <br/>
                    Imagen:  <input type='text' name='imagen_celda' value='".$tabla['imagen_celda']."'> <br/>
                    Escena de pannellum: <input type='text' name='escena_celda' value='".$tabla['escena_celda']."'> <br/>";
                    ?>

                    <button id="btn-bajar-piso" type="button">Bajar piso</button>
                    <button id="btn-subir-piso" type="button">Subir piso</button>
                    <div id="mapa_escena" class="insertar_pd">
                    
                    <?php
                        $indice = 0;

                        foreach ($mapa as $imagen) {
                            
                            echo "<div id='zona".$indice."' class='pisos pisos_pd' style='background-image: url(".base_url($imagen['url_img']).");'>";
                            
                            foreach ($puntos as $punto) {
                                if($punto['piso']==$indice){
                                    
                                        echo "<div id='punto".$punto['id_punto_mapa']."' class='puntos' style='left: ".$punto['left_mapa']."%; top: ".$punto['top_mapa']."%;' escena='".$punto['id_escena']."'></div>";
                                
                                }
                                
                            }
                            echo "</div>";
                            $indice++;
                        }
                    ?>
                    </div><br>

                    <?php
                    echo "Fila a la que pertenece: <input type='number' min='0' max='4' name='fila_asociada' value='".$tabla['fila_asociada']."'><br>
			    
				    <input type='submit'>
                    <a href='".site_url("/puntos_destacados/borrar_celda/".$tabla['id_celda'])."'
    >BORRAR ESTA CELDA (CUIDADO)</a>
            ";
        ?>
		    	
				
			   
			</form>
	
	</fieldset>

</body>
</html>
