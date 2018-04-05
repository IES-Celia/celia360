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
		<title> Modificar </title>
</head>
<body>

<?php

$tabla = $tabla[0];
echo "

<h1> Formulario para UPDATE HotspotsPanel </h1>

<fieldset id='caja6'>

<form action=' ".site_url("hotspots/process_update_hotspot")." ' method='get'>

	Coordenadas donde se situa el punto:<br> 
    <a href='".site_url('escenas/cargar_escena_modificar/'.$codigo_escena.'/'."update_hotspot_pitchyaw/".$tabla['id_hotspot'])."'>Modificarlos</a><br><br>
    
	titulo_panel : <input type='text' value='".$tabla['titulo_panel']."' name='titulo_panel'> </br> </br>
    texto_panel : <input type='text' value='".$tabla['texto_panel']."' name='texto_panel'> </br> </br>
	<input type='hidden' name='id_hotspot' value='".$tabla['id_hotspot']."'>
    <input type='hidden' name='cssClass' value='".$tabla['cssClass']."'>
    <input type='hidden' name='pitch' value='".$tabla['pitch']."'>
    <input type='hidden' name='yaw' value='".$tabla['yaw']."'>
    
	
    <input type='submit' class='button'>
    <a href=
    '".site_url("/hotspots/modify_panel_info/".$tabla['id_hotspot'])."'
    >Modificar imagenes de este hotspot</a><br>
	<a href=
    '".site_url("/hotspots/delete_hotspot/".$tabla['id_hotspot'])."'
    >BORRAR ESTE HOTSPOT (CUIDADO!)</a></td>
	
</form>
<form action=' ".site_url("hotspots/modify_panel_info/".$tabla['id_hotspot'])." ' method='post'>
<input type='hidden' name='id_scene' value='".$codigo_escena."'>
<input type='submit' class='button' value='modificar imagenes'>
</form>
</fieldset>

"; /**  Cierre echo **/

?>