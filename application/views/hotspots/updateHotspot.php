<html>
	<head>
	<style type="text/css">

.button {
    background-color: #555555; /* Black	*/
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
	
	}
	
div.centrado {
	margin-left:25%;
	margin-right:25%;
	
}


</style>
		<title> Insert Hotspot </title>
</head>
<body>

<?php

$tabla = $tabla[0];

echo "

<h1> Formulario para actualizar un hotspot de tipo salto </h1>

<fieldset id='caja2'>

<form action=' ".site_url("hotspots/process_update_hotspot")." ' method='get'>

	Coordenadas en las que se situa el hotspot en la imagen 360:<br>
    <a href='".site_url('welcome/cargar_escena_modificar/'.$codigo_escena.'/'."update_hotspot_pitchyaw/".$tabla['id_hotspot'])."'><button>Modificarlos</button></a><br><br>
    
	Hacia donde se orientará la vista en la imagen 360 a la que se salta:<br> 
    <a href='".site_url('welcome/cargar_escena_modificar/'.$tabla['sceneId'].'/'."update_hotspot_targets/".$tabla['id_hotspot'])."'><button>Modificarlos</button></a><br><br>
	
    Selecciona una escena (en rojo donde estás, amarillo donde se saltará): <input type='text' value='".$tabla['sceneId']."' name='sceneId'> </br> </br>";
    echo "<div id='mapa_escena_hotspot'>";
    ?>
            
            <?php
                $indice = $this->session->piso;

                
                
                    
                    echo "<div id='zona".$indice."' class='pisos pisos_update'>";
                    echo "<img src='".base_url($mapa[$indice]['url_img'])."' style='width:100%;'>";
                    foreach ($puntos as $punto) {
                        if($punto['piso']==$indice){
                            if($punto['id_escena'] == $escena_inicial){
                                echo "<div id='punto".$punto['id_punto_mapa']."' class='punto_inicial' style='left: ".$punto['left_mapa']."%; top: ".$punto['top_mapa']."%;' escena='".$punto['id_escena']."'></div>";
                            }else{
                                echo "<div id='punto".$punto['id_punto_mapa']."' class='puntos' style='";
                                if($punto['id_escena']==$tabla['sceneId']) echo "background-color: yellow;";
                                echo "left: ".$punto['left_mapa']."%; top: ".$punto['top_mapa']."%;' escena='".$punto['id_escena']."'></div>";
                            }
                        }
                    }
                    echo "</div>";
                    
                   
                
            ?>
            </div>
       
    
<?php
echo "</div><br><br><br>";
    
    if($tabla['cerrado_destacado']==0){
        echo "<input type='radio' name='cerrado_destacado' value='0' checked> Aparecerá en el apartado Puntos Destacados<br>
              <input type='radio' name='cerrado_destacado' value='1' > NO aparecerá en el apartado Puntos Destacados<br>";
    }else{
         echo "<input type='radio' name='cerrado_destacado' value='0' > Aparecerá en el apartado Puntos Destacados<br>
              <input type='radio' name='cerrado_destacado' value='1' checked> NO aparecerá en el apartado Puntos Destacados<br>";
    }
    
    
    echo "
	<input type='hidden' name='cssClass' value='".$tabla['cssClass']."'>
	<input type='hidden' name='id_hotspot' value='".$tabla['id_hotspot']."'>
	<input type='submit'>
	<a href='".site_url("/hotspots/delete_hotspot/".$tabla['id_hotspot'])."'><button>BORRAR HOTSPOT</button></a></td>
	
</form>
</fieldset>

"; /**  Cierre echo **/

?>