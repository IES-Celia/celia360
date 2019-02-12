<?php
/*
    Este archivo es parte de la aplicación web Celia360. 

    Celia 360 es software libre: usted puede redistribuirlo y/o modificarlo
    bajo los términos de la GNU General Public License tal y como está publicada por
    la Free Software Foundation en su versión 3.
 
    Celia 360 se distribuye con el propósito de resultar útil,
    pero SIN NINGUNA GARANTÍA de ningún tipo. 
    Véase la GNU General Public License para más detalles.

    Puede obtener una copia de la licencia en <http://www.gnu.org/licenses/>.
*/
// a continuacion nos encontramos con el css de las ventanas modales de la vista audio.
?>
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

    #caja6{
        transform: translate(-50%, -45%);
        background: red;
        }
        
   /*#caja2 a{
        background-color:rgba(0,0,0,0) !important;
        width: 300px !important;
        border-color: rgba(0,0,0,0) !important;
    }*/
        
        button{
            width: 400px;
        }
        #caja2{
            margin : 0 auto ;
        }
        
</style>
		<title> Insert Hotspot </title>
</head>
<body>

<?php

$tabla = $tabla[0];

echo "

<h1> Modificar hotspot de tipo salto a otra escena </h1>

<fieldset id='caja2'>

<form action=' ".site_url("hotspots/process_update_hotspot")." ' method='get'>

	Coordenadas en las que se situa el hotspot en la imagen 360:<br>
    <a href='".site_url('escenas/cargar_escena_modificar/'.$codigo_escena.'/'."update_hotspot_pitchyaw/".$tabla['id_hotspot'])."'>Modificarlos</a><br><br>
    
	Hacia donde se orientará la vista en la imagen 360 a la que se salta:<br> 
    <a href='".site_url('escenas/cargar_escena_modificar/'.$tabla['sceneId'].'/'."update_hotspot_targets/".$tabla['id_hotspot'])."'>Modificarlos</a><br><br>
	
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
	<a class='rojo_borrar' href='".site_url("/hotspots/delete_hotspot/".$tabla['id_hotspot'])."/".$tipo_update."'>BORRAR HOTSPOT</a></td>
	
</form>
</fieldset>

"; /**  Cierre echo **/

?>
