<?php
/*
  Este archivo es parte de la aplicación web Celia360.

  Celia 360 es software libre: usted puede redistribuirlo y/o modificarlo
  bajo los términos de la GNU General Public License tal y como está publicada por
  la Free Software Foundation en su versión 3.

  Celia 360 se distribuye con el propósito de resultar útil,
  pero SIN NINGUNA GARANTÍA de ningún tipo.
  Véase la GNU General Public License para más detalles.

  Puede obtener una copia de la licencia en <http://www.gnu.org/licenses/>.
 */
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Install CMS Celia Tour</title>
        <!-- Fuente externa -->
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
        <!-- Estilos del formulario de instalación -->
        <style>
            .container{
                margin: auto;
                max-width: 1300px;
            }
            .bg-secondary {
                background-color: #4E5D6C;
            }
            .col-md-6{
                width: 50%;
            }
            .col-md-12{
                width: 100%;
            }
            .mx-auto{
                margin: auto!important;
            }
            h1, h4, p, label{
                color: white;
                font-family:"Lato";
            }
            input, label{
                display: block;
            }
            .text-center{
                text-align: center;
            }
            label{
                margin-bottom: 10px;
                font-size: 1.25rem;
                margin-top: 10px;
            }
            .form-group{
                margin-bottom: 1rem;
                margin: auto;
                width: 90%;
            }
            .btn-primary {
                color: #fff;
                background-color: #DF691A;
                border: none;
                width: auto;
                padding: 0.375rem 0.75rem;
                font-size: 1rem;
            }
            .mt-3{
                margin-top: 15px; 
            }
            .pb-3{
                padding-bottom: 15px; 
            }
            body{
                background-color: #2B3E50;
            }
            .text-justify{
                text-align: justify;
            }
            p{
                margin: 20px;
            }
            input {
                width: 100%;
                display: block;
                margin: auto;
                padding: 0.375rem;
            }
            h1{
                font-size: 2.5rem;
            }
            h4{
                font-size: 1.5rem;
            }

            .text-white {
                color: white;
            }
        </style>         
    </head>
    <body>

        <?php
        ini_set("display_errors", 0);
       
      if (isset($_REQUEST["host"])) {
            // Procesar el formulario
            $host = $_REQUEST["host"];
            $userdb = $_REQUEST["nameuse"];
            $passdb = $_REQUEST["passbd"];
            $nombredb = $_REQUEST["namebd"];
            $baseurl = $_REQUEST["base"];
            $username = $_REQUEST["username"];
            $pass = $_REQUEST["pass"];
            $pass2 = $_REQUEST["pass2"];
            $emailadmin = $_REQUEST["emailadmin"];
            //Comprobamos que las dos contraseñas sean iguales
            if (strcmp($pass, $pass2) !== 0) {
            echo 'Las dos contraseñas no son iguales, son consideradas mayúsculas y minúsculas';
            }else{

            // Creamos la estructura de la BD
			$db = new mysqli($host, $userdb, $passdb, $nombredb);
	
            $db->query("CREATE TABLE `audio` (
                            `id_aud` int(11) NOT NULL,
                            `url_aud` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
                            `desc_aud` text COLLATE utf8_spanish_ci NOT NULL,
                            `tipo_aud` varchar(20) COLLATE utf8_spanish_ci NOT NULL
                            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;");
            $db->query("ALTER TABLE `audio`
                        ADD PRIMARY KEY (`id_aud`),
						ADD KEY `id_aud` (`id_aud`);");

						$db->query("ALTER TABLE `audio` MODIFY COLUMN `id_aud` INT(11) AUTO_INCREMENT;");
    



            $db->query("CREATE TABLE `celda_pd` (
                            `id_celda` int(11) NOT NULL,
                            `escena_celda` varchar(100) NOT NULL,
                            `imagen_celda` varchar(100) NOT NULL,
                            `titulo_celda` varchar(100) NOT NULL,
                            `fila_asociada` int(11) NOT NULL
                            ) ENGINE=MyISAM DEFAULT CHARSET=utf8;");
            $db->query("ALTER TABLE `celda_pd`
                        ADD PRIMARY KEY (`id_celda`);");

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
			  ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
			  ");
            $db->query("ALTER TABLE `escenas`ADD PRIMARY KEY (`id_escena`);");

			$db->query("ALTER TABLE `escenas` MODIFY COLUMN `id_escena` int(11) AUTO_INCREMENT;");
            

            $db->query("CREATE TABLE `escenas_hotspots` (
                            `id_escena` int(11) NOT NULL,
                            `id_hotspot` int(11) NOT NULL,
							`id_panorama_secundario` VARCHAR(100)
                            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;");
            $db->query("ALTER TABLE `escenas_hotspots`
                        ADD PRIMARY KEY (`id_escena`,`id_hotspot`);");

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
				`documento_url` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
				`plantaDestino` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL
			  ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
			  
			  --");
            $db->query("ALTER TABLE `hotspots`
                        ADD PRIMARY KEY (`id_hotspot`);");

            $db->query("CREATE TABLE `imagenes` (
                            `id_imagen` int(11) NOT NULL,
                            `titulo_imagen` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
                            `texto_imagen` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
                            `url_imagen` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
                            `fecha` date NOT NULL
                            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;");
            $db->query("ALTER TABLE `imagenes`
						ADD PRIMARY KEY (`id_imagen`);");

			$db->query("ALTER TABLE `imagenes` MODIFY COLUMN `id_imagen` INT(11) AUTO_INCREMENT;");
            

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
            $db->query("ALTER TABLE `libros`
                        ADD PRIMARY KEY (`id_libro`),
						ADD UNIQUE KEY `ISBN` (`ISBN`);");

			$db->query("ALTER TABLE `libros` MODIFY COLUMN `id_libro` INT(11) AUTO_INCREMENT;");

            $db->query("CREATE TABLE `opciones_portada` (
				`id_opcion` int(11) NOT NULL,
				`opcion` varchar(200) NOT NULL,
				`opcion_valor` varchar(200) DEFAULT NULL
			  ) ENGINE=MyISAM DEFAULT CHARSET=utf8;
			  ");

            $db->query("CREATE TABLE `panel_imagenes` (
                            `id_hotspot` int(11) NOT NULL,
                            `id_imagen` int(11) NOT NULL,
                            `orden` int(11) NULL
                            ) ENGINE=MyISAM DEFAULT CHARSET=utf8;");
            $db->query("ALTER TABLE `panel_imagenes`
                        ADD PRIMARY KEY (`id_escena`,`id_hotspot`);");

            $db->query("CREATE TABLE `panel_informacion` (
                            `id_documento` int(11) NOT NULL,
                            `documento_url` varchar(255) NOT NULL
                            ) ENGINE=MyISAM DEFAULT CHARSET=utf8;");
            $db->query("ALTER TABLE `panel_informacion`
						ADD PRIMARY KEY (`id_documento`);");

			$db->query("ALTER TABLE `panel_informacion` MODIFY COLUMN `id_documento` INT(11) AUTO_INCREMENT;");
            

            $db->query("CREATE TABLE `pisos` (
				`piso` int(1) NOT NULL,
				`url_img` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
				`punto_inicial` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
				`titulo_piso` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
				`escena_inicial` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
				`top_zona` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
				`left_zona` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL
			  ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;");
            $db->query("ALTER TABLE `pisos`
                        ADD PRIMARY KEY (`piso`),
                        ADD KEY `piso` (`piso`);");

            $db->query("CREATE TABLE `puntos_mapa` (
                            `id_punto_mapa` int(11) NOT NULL,
                            `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
                            `left_mapa` double NOT NULL,
                            `top_mapa` double NOT NULL,
                            `id_escena` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
                            `piso` int(1) NOT NULL
                            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;");
            $db->query("ALTER TABLE `puntos_mapa`
                        ADD PRIMARY KEY (`id_punto_mapa`),
						ADD KEY `piso` (`piso`);");

			$db->query("ALTER TABLE `puntos_mapa` MODIFY COLUMN `id_punto_mapa` INT(11) AUTO_INCREMENT;");
           

            $db->query("CREATE TABLE `usuarios` (
                            `id_usuario` int(11) NOT NULL,
                            `nombre_usuario` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
                            `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
                            `apellido` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
                            `password` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
                            `email` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
                            `tipo_usuario` int(255) NOT NULL
                            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;");
            $db->query("ALTER TABLE `usuarios`
						ADD PRIMARY KEY (`id_usuario`);");

			$db->query("ALTER TABLE `usuarios` MODIFY COLUMN `id_usuario` INT(11) AUTO_INCREMENT;");
            

            $db->query("CREATE TABLE `video` (
                            `id_vid` int(11) NOT NULL,
                            `url_vid` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
                            `desc_vid` text COLLATE utf8_spanish_ci NOT NULL
                            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;");
            $db->query("ALTER TABLE `video`
						ADD PRIMARY KEY (`id_vid`);");

			$db->query("ALTER TABLE `video` MODIFY COLUMN `id_vid` INT(11) AUTO_INCREMENT;");
            

            $db->query("CREATE TABLE `visita_guiada` (
                            `id_visita` int(11) NOT NULL,
                            `cod_escena` varchar(10) NOT NULL,
                            `titulo_escena` varchar(100) NOT NULL,
                            `audio_escena` varchar(100) NOT NULL,
                            `img_preview` varchar(100) NOT NULL,
                            `orden` int(11) NOT NULL
                            ) ENGINE=MyISAM DEFAULT CHARSET=utf8;");
            $db->query("ALTER TABLE `visita_guiada`
						ADD PRIMARY KEY (`id_visita`);");

			$db->query("ALTER TABLE `visita_guiada` MODIFY COLUMN `id_visita` INT(11) AUTO_INCREMENT;");
           

  $db->query('CREATE TABLE `panoramas_secundarios` (
	`id_panorama_secundario` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
	`cod_escena` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
	`titulo` varchar(75) DEFAULT NULL,
	`fecha_acontecimiento` date DEFAULT NULL,
	`panorama` varchar(250) DEFAULT NULL,
	`hfov` int(11) DEFAULT NULL,
	`pitch` int(11) DEFAULT NULL,
	`yaw` int(11) DEFAULT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;');
          

            // Creamos el usuario administrador
            $db->query("INSERT INTO `usuarios` (`id_usuario`, `nombre_usuario`, `nombre`, `apellido`, `password`, `email`, `tipo_usuario`) 
                            VALUES ('1', '$username', 'Administrador', '', '" . md5($pass) . "', '$emailadmin', '1')");
            // Creamos una entrada genérica en la tabla opciones_portada
            $db->query("INSERT INTO `opciones_portada` (`id_opcion`, `opcion`, `opcion_valor`) VALUES
			(0, 'titulo_web', 'Celia tour'),
			(1, 'imagen_web', 'portada.jpg'),
			(2, 'subtitulo_visita_libre', 'Texto de prueba 1'),
			(3, 'subtitulo_visita_guiada', 'Texto de prueba 2'),
			(4, 'subtitulo_puntos_destacados', 'Texto de prueba 3'),
			(5, 'subtitulo_biblioteca', 'Texto de prueba 4'),
			(6, 'show_biblioteca', '1'),
			(7, 'show_historia', '1'),
			(8, 'nombre_fuente', 'Ubuntu'),
			(9, 'color_fuente', '#ffffff'),
			(10, 'logo_web', 'logo.png'),
			(11, 'ascensor_mapa', 'ascensor'),
			(12, 'url_mapa', 'mapa.jpg'),
			(13,'text_historia','');");
        


            // Creamos el archivo de configuración
            $nombre_archivo = ".env.development";

            if (file_exists($nombre_archivo)) {
                $mensaje = "El Archivo " . $nombre_archivo . " se ha modificado.";
            } else {
                $mensaje = "El Archivo " . $nombre_archivo . " se ha creado.";
            }

            if ($archivo = fopen($nombre_archivo, "w")) {
                fwrite($archivo, "DB_HOSTNAME='" . $host . "'\n 
        								DB_USERNAME='" . $userdb . "'\n 
        								DB_PASSWORD='" . $passdb . "'\n 
        								DB_DATABASE='" . $nombredb . "'\n 
        								BASE_URL='" . $baseurl . "'\n 
        								SESSION_DIR='/tmp'");
            } else {
                echo "El programa de instalación no ha podido crear el archivo de configuración. Debe crearlo usted manualmente en el directorio raíz de su aplicación.<br>"
                . "El archivo debe ser de texto plano y tener el nombre .env.develpment. Su contenido debe ser el siguiente (cópielo y péguelo para evitar errores):<br><br>"
                . "DB_HOSTNAME='" . $host . "'<br> 
        								DB_USERNAME='" . $userdb . "'<br> 
        								DB_PASSWORD='" . $passdb . "'<br>
        								DB_DATABASE='" . $nombredb . "<br> 
        								BASE_URL='" . $baseurl . "'<br>
        								SESSION_DIR='/tmp'<br><br><br>
                                                                        Cuando haya creado el archivo puede visitar <a href='$baseurl/usuario'>$baseurl/usuario</a> para comenzar a administrar su visita virtual. Pida ayuda a su administrador de sistemas si no sabe cómo hacer todo esto.";
            }

            fclose($archivo);

			//creación de directorios 
			
			if (!file_exists('assets/audio')) {
                mkdir('assets/audio');
            }

            if (!file_exists('assets/biblio')) {
                mkdir('assets/biblio');
            }

            if (!file_exists('assets/imagenes')) {
                mkdir('assets/imagenes');
            }

            if (!file_exists('assets/imagenes/biblioteca')) {
                mkdir('assets/imagenes/destacados');
            }

            if (!file_exists('assets/imagenes/destacados')) {
                mkdir('assets/imagenes/destacados');
            }

            if (!file_exists('assets/imagenes/escenas')) {
                mkdir('assets/imagenes/escenas');
            }

            if (!file_exists('assets/imagenes/generales')) {
                mkdir('assets/imagenes/generales');
            }

            if (!file_exists('assets/imagenes/iconos')) {
                mkdir('assets/imagenes/iconos');
            }

            if (!file_exists('assets/imagenes/imagenes-hotspots')) {
                mkdir('assets/imagenes/imagenes-hotspots');
            }

            if (!file_exists('assets/imagenes/portada')) {
                mkdir('assets/imagenes/portada');
            }

            if (!file_exists('assets/imagenes/mapa')) {
                mkdir('assets/imagenes/mapa');
            }

            if (!file_exists('assets/imagenes/previews')) {
                mkdir('assets/imagenes/previews');
            }

            if (!file_exists('assets/imagenes/previews-guiada')) {
                mkdir('assets/imagenes/previews-guiada');
            }

            if (!file_exists('assets/imagenes/svg')) {
                mkdir('assets/imagenes/svg');
			}
			
			if (!file_exists('assets/imagenes/panoramasSecundarios')) {
                mkdir('assets/imagenes/panoramasSecundarios');
            }

            if (!file_exists('assets/bibliocss')) {
                mkdir('assets/bibliocss');
            }

            if (!file_exists('assets/css')) {
                mkdir('assets/css');
            }

            if (!file_exists('assets/documentos-panel')) {
                mkdir('assets/documentos-panel');
            }

            if (!file_exists('assets/extras')) {
                mkdir('assets/extras');
            }

            if (!file_exists('assets/fonts')) {
                mkdir('assets/fonts');
            }

            if (!file_exists('assets/js')) {
                mkdir('assets/js');
            }

            if (!file_exists('assets/lib')) {
                mkdir('assets/lib');
            }

            if (!file_exists('assets/php')) {
                mkdir('assets/php');
			}
			
            echo "<br><br><span class='text-white'>La instalación ha finalizado. <strong>IMPORTANTE: elimine ahora el archivo de instalación (install.php) del servidor para evitar posibles ataques a su base de datos.</strong>.<br>"
            . "Visite <a href='$baseurl/usuario'>$baseurl/usuario</a> para comenzar a introducir los datos de su visita virtual.</span><br>";
         }
     }
         // fin del if
        else {
            // Mostramos formulario
            ?>

<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto bg-secondary">
            <form action="install.php">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="text-center">Instalaci&oacute;n de Celia 360</h1>
                        <p class="text-justify">
                        Este programa de instalación le ayudará a desplegar la aplicación CeliaTour/Celia360 en su servidor. Si no sabe como proceder, le recomendamos que se ponga en contacto con su administrador de sistemas.
                        </p>
                        <h4 class="text-center">Configuración del host</h4>
                        <div class="form-group">
                            <label for="host">Nombre del host</label>
                            <input type='text' name='host' id="host" required>
                        </div>
                        <div class="form-group">
                            <label for="namebd">Nombre de la base de datos</label>
                            <input type='text' id="namebd" name='namebd' required>
                        </div>
                        <div class="form-group">
                            <label for="nameuse">Usuario de la base de datos</label>
                            <input type='text' name='nameuse' id="nameuse" required>
                        </div>
                        <div class="form-group">
                            <label for="passbd">Contraseña de la base de datos</label>
                            <input type='password' name='passbd' id="passbd">            
                        </div>
                        <div class="form-group">
                            <label for="base">Base URL del sitio</label>
                            <input type='text' name='base' id="base" placeholder="http://ejemplo.com" required>            
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="text-center">Configuración del usuario administrador</h4>
                        <div class="form-group">
                            <label for="username">Nombre de usuario administrador</label>
                            <input type='text' name='username' id="username" required>
                        </div>
                        <div class="form-group">
                            <label for="pass">Contrase&ntilde;a</label>
                            <input type='password' id="pass" name='pass' required>
                        </div>
                        <div class="form-group">
                            <label for="pass2">Repita Contrase&ntilde;a</label>
                            <input type='password' id="pass2" name='pass2' required>  
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type='text' name='emailadmin' id="email" required>
                        <div>
                    </div>
                </div>
                <div class="row mt-3 pb-3">
                    <div class="col-md-12">
                        <input type='submit' value='Aceptar' class="btn-primary">
                    </div>
                </div>
            </form>
        </div>
    </div>

</div><!-- Final de container -->

            <?php
        }
        ?>

    </body>
</html>
