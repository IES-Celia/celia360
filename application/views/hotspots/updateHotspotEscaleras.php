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
        <title> Modificar hotspot tipo Escalera </title>
    </head>
    <body>

        <?php
        $tabla = $tabla[0];

        echo "

        <h1> Actualizar hotspot tipo Escalera </h1>

        <fieldset id='caja5'>

        <form class='for'>

        <a href='" . site_url('escenas/cargar_escena_modificar/' . $codigo_escena . '/' . "update_hotspot_pitchyaw/" . $tabla['id_hotspot']) . "'>Modificar coordenadas</a><br><br>
	
            <a href='" . site_url("/hotspots/delete_hotspot/" . $tabla['id_hotspot']) . "'
        >Borrar hotspot (CUIDADO)</a></td>
	
        </form>
    </fieldset>

";/**  Cierre echo * */
        ?>
