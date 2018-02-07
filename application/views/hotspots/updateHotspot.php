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

	Descripción:  <input type='text' value='".$tabla['descripcion']."' name='descripcion'> </br> </br>
	
	Coordenada Pitch: <input type='text' value='".$tabla['pitch']."' name='pitch'> </br> </br>
	
	Coordenada Yaw: <input type='text' value='".$tabla['yaw']."' name='yaw'> </br> </br>
	
	cssClass: <input type='text' value='".$tabla['cssClass']."' name='cssClass'> </br> </br>
	
	clickHandlerFunc: <input type='text' value='".$tabla['clickHandlerFunc']."' name='clickHandlerFunc'> </br> </br>
	
	clickHandlerArgs: <input type='text' value='".$tabla['clickHandlerArgs']."' name='clickHandlerArgs'> </br> </br>
	
	sceneId: <input type='text' value='".$tabla['sceneId']."' name='sceneId'> </br> </br>
	
	targetPitch: <input type='text'  value='".$tabla['targetPitch']."' name='targetPitch'> </br> </br>
	
	targetYaw: <input type='text' value='".$tabla['targetYaw']."' name='targetYaw'> </br> </br>
	
	Tipo: <input type='text' value='".$tabla['tipo']."' name='tipo'> </br> </br> 
	
	<input type='hidden' name='id_hotspot' value='".$tabla['id_hotspot']."'>

	
	<input type='submit' class='button'>
	
	
</form>
</fieldset>

"; /**  Cierre echo **/

?>