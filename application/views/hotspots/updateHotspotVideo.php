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

<h1> Formulario para UPDATE Hotspots Video </h1>

<fieldset id='caja6'>

<form action=' ".site_url("hotspots/updateHotspotVideo/".$tipo_update)." ' method='get'>

	Coordenadas donde se situa el punto:<br>
    <a href='".site_url('escenas/cargar_escena_modificar/'.$codigo_escena.'/'."update_hotspot_pitchyaw/".$tabla['id_hotspot'])."'>Modificarlos</a><br><br>
	
	<div id='puntoVideo'> 
       
			<input type='hidden' name='sceneId' id='sceneId' readonly='readonly' value='".$codigo_escena."'><br>
			<input type='hidden' name='id_scene'  readonly='readonly' value='".$tabla['id_hotspot']."'><br>
            <input type='hidden' name='pitch' value='".$tabla['pitch']."'><br> 
            <input type='hidden' name='yaw 'value='".$tabla['yaw']."'><br> 
            <input type='hidden' name='cssClass' value='custom-hotspot-video' readonly='readonly'><br> 
            <input type='hidden' name='tipo' value='info' readonly='readonly'> <br>
            <input type='hidden' name='clickHandlerFunc' value='video' readonly='readonly'><br> 
            ID del video que se reproducirá al clickar: 

    </div>
	<input type='hidden' name='id_hotspot' value='".$tabla['id_hotspot']."'>";
	echo "<select id='idVideoForm' name='clickHandlerArgs'>";
			for($i=0;$i<count($allVideos);$i++){
				$info = $allVideos[$i];
				if($info['id_vid'] == $tabla['clickHandlerArgs']){
					echo '<option value="'.$info['id_vid'].'" selected>'.$info['desc_vid'].'</option>';
				}else{
					echo '<option value="'.$info['id_vid'].'">'.$info['desc_vid'].'</option>';
				}
			}
			
			echo "</select>";
	
	echo "<input type='submit' class='button'>
    <br>
	<a class='rojo_borrar' href='".site_url("/hotspots/delete_hotspot/".$tabla['id_hotspot']."/".$tipo_update)."'
    >BORRAR ESTE HOTSPOT </a></td>
	
</form>
</fieldset>

"; /**  Cierre echo **/

?>
<div id='listaVideos'>Capa vacia</div>
	
<script>
 $(document).ready(function() {
             $("#listaVideos").children().show();
            $("#listaVideos").load("<?php echo site_url("video/obtenerListaVideosAjax");?>");
        });

</script>	
   