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

<h1> Formulario para UPDATE Hotspots </h1>

<fieldset class='for'>

<form action=' ".site_url("hotspots/process_update_hotspot")." ' method='get'>

	Coordenadas donde se situa el punto:<br>
    <a href='".site_url('welcome/cargar_escena_modificar/'.$codigo_escena.'/'."update_hotspot_pitchyaw/".$tabla['id_hotspot'])."'>Modificarlos</a><br><br>
    
	Hacia donde estará orientada la vista en la imagen 360 a la que se salta:<br> 
    <a href='".site_url('welcome/cargar_escena_modificar/'.$tabla['sceneId'].'/'."update_hotspot_targets/".$tabla['id_hotspot'])."'>Modificarlos</a><br><br>
	
    Escena destino: <input type='text' value='".$tabla['sceneId']."' name='sceneId'> </br> </br>";

    echo "<div id='mapa_escena_hotspot'>";
    

    
        
    echo "<div id='p".$piso."' class='pisos pisos_update' style='background-image: url(".base_url($mapa[$piso]['url_img']).");'>";
        
        foreach ($puntos as $punto) {
            if($punto['piso']==$piso){
                if($punto['id_escena'] == $escena_inicial){
                    echo "<div id='punto".$punto['id_punto_mapa']."' class='punto_inicial' style='left: ".$punto['left_mapa']."%; top: ".$punto['top_mapa']."%;' escena='".$punto['id_escena']."'></div>";
                }else if($punto['id_escena'] == $tabla['sceneId']){
                    echo "<div id='punto".$punto['id_punto_mapa']."' class='puntos' style='left: ".$punto['left_mapa']."%; top: ".$punto['top_mapa']."%; background-color: yellow;' escena='".$punto['id_escena']."'></div>";
                }else{
                    echo "<div id='punto".$punto['id_punto_mapa']."' class='puntos' style='left: ".$punto['left_mapa']."%; top: ".$punto['top_mapa']."%;' escena='".$punto['id_escena']."'></div>";
                }
            }
        }
        echo "</div>";
       
    

echo "</div>";

    echo "Pon esto a 1 sino quieres que aparezca en Puntos Destacados (para delimitar zonas)<br><input type='number' max='1' min='0' value='".$tabla['cerrado_destacado']."' name='cerrado_destacado'>

	<input type='hidden' name='cssClass' value='".$tabla['cssClass']."'>
	<input type='hidden' name='id_hotspot' value='".$tabla['id_hotspot']."'>
	<input type='submit' class='button'>
	<a href='".site_url("/hotspots/delete_hotspot/".$tabla['id_hotspot'])."'
    >BORRAR ESTE HOTSPOT (CUIDADO)</a></td>
	
</form>
</fieldset>

"; /**  Cierre echo **/

?>