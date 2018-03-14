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
        <title> Modificar Hotspot </title>
    </head>
    <body>

        <?php
        $tabla = $tabla[0];

        echo "

        <h1> Formulario para UPDATE Hotspots Audio </h1>

        <fieldset class='for'>

        <form action=' " . site_url("hotspots/updateHotspotAudio") . " ' method='get'>

	Coordenadas donde se situa el punto:<br>
        <a href='" . site_url('welcome/cargar_escena_modificar/' . $codigo_escena . '/' . "update_hotspot_pitchyaw/" . $tabla['id_hotspot']) . "'>Modificarlos</a><br><br>
	
	<div id='puntoAudio'> 
       
            <input type='hidden' name='sceneId' id='sceneId' readonly='readonly' value='" . $codigo_escena . "'><br>
            <input type='hidden' name='id_scene'  readonly='readonly' value='" . $tabla['id_hotspot'] . "'><br>
            <input type='hidden' name='pitch' value='" . $tabla['pitch'] . "'><br> 
            <input type='hidden' name='yaw 'value='" . $tabla['yaw'] . "'><br> 
            <input type='hidden' name='cssClass' value='custom-hotspot-audio' readonly='readonly'><br> 
            <input type='hidden' name='tipo' value='info' readonly='readonly'> <br>
            <input type='hidden' name='clickHandlerFunc' value='audio' readonly='readonly'><br> 
			
            Audio que se reproducirá al clickar en el punto: <input type='text' name='clickHandlerArgs' id='idAudioForm' value='" . $tabla['clickHandlerArgs'] . "'><br> 
        
        
        </div>
            <input type='hidden' name='id_hotspot' value='" . $tabla['id_hotspot'] . "'>
	
	
            <input type='submit' class='button'>
            <a href='" . site_url("/hotspots/delete_hotspot/" . $tabla['id_hotspot']) . "'
        >BORRAR ESTE HOTSPOT (CUIDADO)</a></td>
	
        </form>
    </fieldset>

";/**  Cierre echo * */
        ?>
        <div id='listaAudios'>Capa vacia</div>

        <script>
            $(document).ready(function () {
                $("#listaAudios").children().show();
                $("#listaAudios").load("<?php echo site_url("audio/obtenerListaAudiosAjax"); ?>");
            });

        </script>	

