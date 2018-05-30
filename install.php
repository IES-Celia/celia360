

<!DOCTYPE html>
<html>
<head>
	<title>Install</title>

    <style type="text/css">
    
        #caja{
            position: relative;
            width: 50%;
            height: 100%;
            top: 25%;
            left: 25%; 
            border: 1px solid #000;
            border-radius: 5px;
        }

        input{
            display: block; 
            margin: 5px;
            border: none;
            border-bottom: 0.5px solid #000;
        }

        label{
            margin-left: 5px;
            margin-top: 10px;
        }

        h1{
            margin-left: 5px;
        }

    </style>
</head>
<body>

<?php
        ini_set("display_errors",0);
	if (isset($_REQUEST["host"])){
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

                // Creamos el usuario administrador
            $db->query("INSERT INTO `usuarios` (`id_usuario`, `nombre_usuario`, `nombre`, `apellido`, `password`, `email`, `tipo_usuario`) 
                            VALUES ('1', '$username', 'Administrador', '', '".md5($pass)."', '$emailadmin', '1')");

		// Creamos el archivo de configuración
		$nombre_archivo = ".env.development";

        		if(file_exists($nombre_archivo)){
        			$mensaje = "El Archivo ".$nombre_archivo." se ha modificado.";
    			}
    		   		else{
        			$mensaje = "El Archivo ".$nombre_archivo." se ha creado.";
    			}

    			if($archivo = fopen($nombre_archivo, "w")){
        			fwrite($archivo, "DB_HOSTNAME='".$host."'\n 
        								DB_USERNAME='".$userdb."'\n 
        								DB_PASSWORD='".$passdb."'\n 
        								DB_DATABASE='".$nombredb."'\n 
        								BASE_URL='".$baseurl."'\n 
        								SESSION_DIR='/tmp'");}	
        			
        			else{
                                    echo "El programa de instalación no ha podido crear el archivo de configuración. Debe crearlo usted manualmente en el directorio raíz de su aplicación.<br>"
                                            . "Se trata de un archivo de texto con el nombre .env.develpment que debe tener este contenido (copiélo y péguelo para evitar errores):<br><br>"
                                            . "DB_HOSTNAME='".$host."'<br> 
        								DB_USERNAME='".$userdb."'<br> 
        								DB_PASSWORD='".$passdb."'<br>
        								DB_DATABASE='".$nombredb."<br> 
        								BASE_URL='".$baseurl."'<br>
        								SESSION_DIR='/tmp'<br><br><br>
                                                                        Cuando haya creado el archivo puede visitar <a href='$baseurl/usuario'>$baseurl/usuario</a> para comenzar a administrar su visita virtual. Pida ayuda a su administrador de sistemas si no sabe cómo hacer todo esto.";
        			}
 
        			fclose($archivo);
        

            if(!file_exists('assets/biblio')){
                mkdir('assets/biblio');
            }
            
            if(!file_exists('assets/imagenes')){
                mkdir('assets/imagenes');    
            }  
              
            if(!file_exists('assets/imagenes/biblioteca')){
                mkdir('assets/imagenes/destacados');
            }    
            
            if(!file_exists('assets/imagenes/destacados')){
                mkdir('assets/imagenes/destacados');
            }    
            
            if(!file_exists('assets/imagenes/escenas')){
                mkdir('assets/imagenes/escenas');
            }    
            
             if(!file_exists('assets/imagenes/generales')){
                mkdir('assets/imagenes/generales');
            }    
            
            if(!file_exists('assets/imagenes/iconos')){
                mkdir('assets/imagenes/iconos');
            }    
            
            if(!file_exists('assets/imagenes/imagenes-hotspots')){
                mkdir('assets/imagenes/imagenes-hotspots');
            }    
            
             if(!file_exists('assets/imagenes/portada')){
                mkdir('assets/imagenes/portada');    
            }      
            
            if(!file_exists('assets/imagenes/mapa')){
                mkdir('assets/imagenes/mapa');    
            }      

            if(!file_exists('assets/imagenes/previews')){
                mkdir('assets/imagenes/previews');
            }    

            if(!file_exists('assets/imagenes/previews-guiada')){
                mkdir('assets/imagenes/previews-guiada');
            }                
             
            if(!file_exists('assets/imagenes/svg')){
                mkdir('assets/imagenes/svg');    
            }  
            
            if(!file_exists('assets/bibliocss')){
                mkdir('assets/bibliocss');    
            }          
            
            if(!file_exists('assets/css')){
                mkdir('assets/css');    
            }   
            
            if(!file_exists('assets/documentos-panel')){
                mkdir('assets/documentos-panel');    
            }  
            
            if(!file_exists('assets/extras')){
                mkdir('assets/extras');    
            }  
            
            if(!file_exists('assets/fonts')){
                mkdir('assets/fonts');    
            }  
            
            if(!file_exists('assets/js')){
                mkdir('assets/js');    
            }  
            
            if(!file_exists('assets/lib')){
                mkdir('assets/lib');    
            }  
            
            if(!file_exists('assets/php')){
                mkdir('assets/php');    
            }  
            echo "<br><br>La instalación ha finalizado. <strong>IMPORTANTE: elimine ahora el archivo de instalación (install.php) del servidor para evitar posibles ataques a su base de datos.</strong>.<br>"
                    . "Visite <a href='$baseurl/usuario'>$baseurl/usuario</a> para comenzar a introducir los datos de su visita virtual.<br>";
    } // fin del if
    else {
		// Mostramos formulario

?>
    <div id="caja">
	   <form action="install.php">
 	     <h1>Instalaci&oacute;n de Celia 360</h1>
             <p>Este programa de instalación le ayudará a desplegar la aplicación CeliaTour/Celia360 en su servidor. Si no sabe como proceder, le recomendamos que se ponga en contacto con su administrador de sistemas.</p>

             <h3>Configuración del host</h3>
            <label for="host">Nombre del host</label>
            <input type='text' name='host' id="host" required>
            <label for="namebd">Nombre de la base de datos</label>
            <input type='text' id="namebd" name='namebd' required>
            <label for="nameuse">Usuario de la base de datos</label>
            <input type='text' name='nameuse' id="nameuse" required>
            <label for="passbd">Contraseña de la base de datos</label>
            <input type='password' name='passbd' id="passbd">
            <label for="base">Base URL del sitio</label>
            <input type='text' name='base' id="base" placeholder="http://ejemplo.com" required>
            
            <h3>Configuración del usuario administrador</h3>
            <label for="username">Nombre de usuario administrador</label>
            <input type='text' name='username' id="username" required>
            <label for="pass">Password</label>
            <input type='password' id="pass" name='pass' required> 
            <label for="email">Correo</label>
            <input type='text' name='emailadmin' id="email" required> 
            <input type='submit' value='Aceptar' style="border: none;">
        </form>
    </div>


<?php
	}


?>


</body>
</html>