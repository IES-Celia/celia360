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
<h1> Formulario para Insertar Hotspots </h1>

<fieldset class="for">

<?php
echo "<form action='".   site_url("hotspots/process_insert_hotspot")   ."' method='get'>";
?>
	Descripción:  <input type='text' name='descripcion'> </br> </br>
	
	Coordenada Pitch: <input type='text' name='pitch'> </br> </br>
	
	Coordenada Yaw: <input type='text' name='yaw'> </br> </br>
	
	cssClass: <input type='text' name='cssClass'> </br> </br>
	
	clickHandlerFunc: <input type='text' name='clickHandlerFunc'> </br> </br>
	
	clickHandlerArgs: <input type='text' name='clickHandlerArgs'> </br> </br>
	
	sceneId: <input type='text' name='sceneId'> </br> </br>
	
	targetPitch: <input type='text' name='targetPitch'> </br> </br>
	
	targetYaw: <input type='text' name='targetYaw'> </br> </br>
	
	Tipo: <input type='text' name='tipo'> </br> </br> 
	

	<input type='submit' class="button">
	
</fieldset>