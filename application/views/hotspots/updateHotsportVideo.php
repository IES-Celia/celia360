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
print_r($tabla);
echo "

<h1> Formulario para UPDATE Hotspots Video </h1>

<fieldset class='for'>

<form action=' ".site_url("hotspots/updateHotspotVideo")." ' method='get'>

	Coordenada Pitch y Yaw:<br> 
    <a href='".site_url('welcome/cargar_escena_modificar/'.$codigo_escena.'/'."update_hotspot_pitchyaw/".$tabla['id_hotspot'])."'>Modificarlos</a><br><br>
	
	<div id='puntoVideo'> 
       
        
			Escena: <input type='text' name='id_scene'  readonly='readonly' value='".$tabla['id_hotspot']."'><br>
            Coordenada Pitch: <input type='text' name='pitch' value='".$tabla['pitch']."'><br> 
            Coordenada Yaw: <input type='text' name='yaw 'value='".$tabla['yaw']."'><br> 
            cssClass: <input type='text' name='cssClass' value='custom-hotspot-video' readonly='readonly'><br> 
            Tipo: <input type='text' name='tipo' value='info' readonly='readonly'> <br>
            clickHandlerFunc: <input type='text' name='clickHandlerFunc' value='video' readonly='readonly'><br> 
			<button id='insertarVideo'>CambiarVideo</button>
            clickHandlerArgs: <input type='text' name='clickHandlerArgs' id='idVideoForm' value='".$tabla['clickHandlerArgs']."'><br> 


            
        
        
    </div>
	<input type='hidden' name='id_hotspot' value='".$tabla['id_hotspot']."'>
	
	
	<input type='submit' class='button'>
	<a href=
    '".site_url("/hotspots/delete_hotspot/".$tabla['id_hotspot'])."'
    >BORRAR ESTE HOTSPOT (CUIDADO)</a></td>
	
</form>
</fieldset>

"; /**  Cierre echo **/

?>
<div id='listaVideos'>Capa vacia</div>
	
<script>
 $("#insertarVideo").click(function() {
             $("#puntoVideo").children().hide();
            $("#listaVideos").load("<?php echo site_url("video/obtenerListaVideosAjax");?>");
        });

</script>	
   