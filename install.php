

<!DOCTYPE html>
<html>
<head>
	<title>Install</title>
</head>
<body>

<?php
	if (isset($_REQUEST["host"])) {
		// Procesar el formulario
		$host = $_REQUEST["host"];
		$userdb = $_REQUEST["nameuse"];
		$passdb = $_REQUEST["passbd"];
		$nombredb = $_REQUEST["namebd"];
		$baseurl = $_REQUEST["base"];
		
		// Creamos la estructura de la BD
		$db = new mysqli($host, $userdb, $passdb, $nombredb);
		$result = $db->query("CREATE TABLE ");
		$db->query("CREATE TABLE `audio` (
                            `id_aud` int(11) NOT NULL,
                            `url_aud` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
                            `desc_aud` text COLLATE utf8_spanish_ci NOT NULL,
                            `tipo_aud` varchar(20) COLLATE utf8_spanish_ci NOT NULL
                            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;");

            $db->query("CREATE TABLE `celda_pd` (
                            `id_celda` int(11) NOT NULL,
                            `escena_celda` varchar(100) NOT NULL,
                            `imagen_celda` varchar(100) NOT NULL,
                            `titulo_celda` varchar(100) NOT NULL,
                            `fila_asociada` int(11) NOT NULL
                            ) ENGINE=MyISAM DEFAULT CHARSET=utf8;");

            $db->query("CREATE TABLE `config_mapa` (
                            `piso_inicial` int(11) NOT NULL,
                            `punto_inicial` varchar(40) NOT NULL,
                            `escena_inicial` varchar(100) NOT NULL
                            ) ENGINE=MyISAM DEFAULT CHARSET=utf8;");
            
            $db->query("CREATE TABLE `escenas` (
                            `id_escena` int(11) NOT NULL,
                            `Nombre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
                            `cod_escena` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
                            `hfov` int(11) NOT NULL,
                            `pitch` int(11) NOT NULL,
                            `yaw` int(11) NOT NULL,
                            `tipo` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
                            `panorama` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL
                            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;");
            
            $db->query("CREATE TABLE `escenas_hotspots` (
                            `id_escena` int(11) NOT NULL,
                            `id_hotspot` int(11) NOT NULL
                            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;");
            
            $db->query("CREATE TABLE `hotspots` (
                            `id_hotspot` int(11) NOT NULL,
                            `titulo_panel` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
                            `texto_panel` varchar(2999) COLLATE utf8_spanish_ci DEFAULT NULL,
                            `descripcion` varchar(1000) CHARACTER SET latin1 NOT NULL,
                            `pitch` int(11) NOT NULL,
                            `yaw` int(11) NOT NULL,
                            `cssClass` varchar(100) CHARACTER SET latin1 NOT NULL,
                            `clickHandlerFunc` varchar(100) CHARACTER SET latin1 NOT NULL,
                            `clickHandlerArgs` varchar(100) CHARACTER SET latin1 NOT NULL,
                            `sceneId` varchar(100) CHARACTER SET latin1 NOT NULL,
                            `targetPitch` int(11) NOT NULL,
                            `targetYaw` int(11) NOT NULL,
                            `tipo` varchar(10) CHARACTER SET latin1 NOT NULL,
                            `cerrado_destacado` int(11) NOT NULL DEFAULT '0',
                            `documento_url` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL
                            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;");
            
            $db->query("CREATE TABLE `imagenes` (
                            `id_imagen` int(11) NOT NULL,
                            `titulo_imagen` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
                            `texto_imagen` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
                            `url_imagen` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
                            `fecha` date NOT NULL
                            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;");
            
            $db->query("CREATE TABLE `libros` (
                            `id_libro` int(11) NOT NULL,
                            `titulo` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
                            `autor` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
                            `editorial` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
                            `lugar_edicion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
                            `fecha_edicion` date NOT NULL,
                            `ISBN` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
                            `tipo` int(2) NOT NULL,
                            `apaisado` int(2) DEFAULT NULL
                            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;");
            
            $db->query("CREATE TABLE `opciones_portada` (
                            `titulo_web` varchar(200) NOT NULL,
                            `imagen_web` varchar(200) NOT NULL,
                            `subtitulo_visita_libre` varchar(200) NOT NULL,
                            `subtitulo_visita_guiada` varchar(200) NOT NULL,
                            `subtitulo_puntos_destacados` varchar(200) NOT NULL,
                            `subtitulo_biblioteca` varchar(200) NOT NULL,
                            `show_biblioteca` varchar(1) NOT NULL,
                            `show_historia` varchar(1) NOT NULL,
                            `nombre_fuente` varchar(100) NOT NULL,
                            `color_fuente` varchar(10) NOT NULL,
                            `logo_web` varchar(100) NOT NULL
                            ) ENGINE=MyISAM DEFAULT CHARSET=utf8;");

            $db->query("CREATE TABLE `panel_imagenes` (
                            `id_hotspot` int(11) NOT NULL,
                            `id_imagen` int(11) NOT NULL,
                            `orden` int(11) NULL
                            ) ENGINE=MyISAM DEFAULT CHARSET=utf8;");

            $db->query("CREATE TABLE `panel_informacion` (
                            `id_documento` int(11) NOT NULL,
                            `documento_url` varchar(255) NOT NULL
                            ) ENGINE=MyISAM DEFAULT CHARSET=utf8;");

            $db->query("CREATE TABLE `pisos` (
                            `piso` int(1) NOT NULL,
                            `url_img` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
                            `punto_inicial` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
                            `titulo_piso` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
                            `escena_inicial` varchar(30) COLLATE utf8_spanish_ci NOT NULL
                            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;");

            $db->query("CREATE TABLE `puntos_mapa` (
                            `id_punto_mapa` int(11) NOT NULL,
                            `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
                            `left_mapa` double NOT NULL,
                            `top_mapa` double NOT NULL,
                            `id_escena` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
                            `piso` int(1) NOT NULL
                            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;");

            $db->query("CREATE TABLE `usuarios` (
                            `id_usuario` int(11) NOT NULL,
                            `nombre_usuario` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
                            `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
                            `apellido` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
                            `password` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
                            `email` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
                            `tipo_usuario` int(255) NOT NULL
                            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;");

            $db->query("CREATE TABLE `video` (
                            `id_vid` int(11) NOT NULL,
                            `url_vid` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
                            `desc_vid` text COLLATE utf8_spanish_ci NOT NULL
                            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;");

            $db->query("CREATE TABLE `visita_guiada` (
                            `id_visita` int(11) NOT NULL,
                            `cod_escena` varchar(10) NOT NULL,
                            `titulo_escena` varchar(100) NOT NULL,
                            `audio_escena` varchar(100) NOT NULL,
                            `img_preview` varchar(100) NOT NULL,
                            `orden` int(11) NOT NULL
                            ) ENGINE=MyISAM DEFAULT CHARSET=utf8;");


		// Creamos el archivo de configuración
		$nombre_archivo = ".env.development";

        		if(file_exists($nombre_archivo)){
        			$mensaje = "El Archivo ".$nombre_archivo." se ha modificado.";
    			}
    		   		else{
        			$mensaje = "El Archivo ".$nombre_archivo." se ha creado.";
    			}

    			if($archivo = fopen($nombre_archivo, "w")){
        			if(fwrite($archivo, "DB_HOSTNAME='".$host."'\n 
        								DB_USERNAME='".$userdb."'\n 
        								DB_PASSWORD='".$passdb."'\n 
        								DB_DATABASE='".$nombredb."'\n 
        								BASE_URL='".$baseurl."'\n 
        								SESSION_DIR='/tmp'")){
            				
            			echo "Se ha ejecutado correctamente";
        			}
        			else{
            			echo "Ha habido un problema al crear el archivo";
        			}
 
        			fclose($archivo);
    }

		// Mensaje de resultado


	}
	else {
		// Mostramos formulario

?>
<div id="caja">
	<form action="install.php">
 	<h1>Instalaci&oacute;n: parte 1</h1>
    <label for="host">Nombre del host</label>
    <input type='text' name='host' id="host" required>
    <label for="namebd">Nombre de la base de datos</label>
    <input type='text' id="namebd" name='namebd' required>
    <label for="nameuse">Usuario de la base de datos</label>
    <input type='text' name='nameuse' id="nameuse" required>
    <label for="passbd">Contraseña de la base de datos</label>
    <input type='password' name='passbd' id="passbd">
    <label for="base">Base URL del sitio</label>
    <input type='text' name='base' id="base" required>
    <input type='submit' value='Aceptar'>
</form>

</div>


<?php
	}


?>


</body>
</html>