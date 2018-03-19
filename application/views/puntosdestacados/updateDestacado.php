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
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/admin_style.css"); ?>"/>

</head>
<body>

	<h1 align="center">Modificación de punto destacado</h1>
	
	<fieldset class='for'>

		<?php
        $tabla=$celda[0];
			echo"<form action='".site_url("Puntos_destacados/processupdatedestacado")."' method='post' enctype='multipart/form-data'>
            <input type='hidden' name='id_celda' value='".$tabla['id_celda']."' readonly> <br>
            Nombre del punto destacado:  <input type='text' name='titulo_celda' value='".$tabla['titulo_celda']."'> <br>
            Seleccione un archivo de imagen JPG para sustituir el actual:<br>
            <input type='file' name='panorama'> <br/>
            Seleccione un punto del mapa, que será donde salte al hacer click:
            <input type='text' name='escena_celda' readonly value='".$tabla['escena_celda']."'> <br><br>
            
            
            ";
                    ?>

                    <button id="btn-bajar-piso" type="button">Bajar piso</button>
                    <button id="btn-subir-piso" type="button">Subir piso</button>
                    <div id="mapa_escena_hotspot" class="insertar_pd">
                    
                    <?php
                        $indice = 0;

                        foreach ($mapa as $imagen) {
                            
                            echo "<div id='zona".$indice."' class='pisos pisos_pd'>";
                            echo "<img src='".base_url($imagen['url_img'])."' style='width:100%;'>";
                            
                            foreach ($puntos as $punto) {
                                if($punto['piso']==$indice){
                                    
                                        echo "<div id='punto".$punto['id_punto_mapa']."' class='puntos' style='left: ".$punto['left_mapa']."%; top: ".$punto['top_mapa']."%;' escena='".$punto['id_escena']."'></div>";
                                
                                }
                                
                            }
                            echo "</div>";
                            $indice++;
                        }
                    ?>
                    </div><br><br>

                    <?php
                    echo "Fila en la que se encuentra la celda (modifica el valor para cambiarla) : <input type='number' min='0' max='4' name='fila_asociada' value='".$tabla['fila_asociada']."'><br>
			    
				    <input type='submit'><br><br>";  ?>
		    	     <br><br>
				    <a href="<?php echo site_url("Puntos_destacados/cargar_admin_puntosdestacados"); ?>">Atrás</a>
			   
			</form>
	
	</fieldset>

</body>
</html>
