<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">  
<title>Celia Tour</title>
    <script>
        piso = <?php echo $config_mapa["piso_inicial"]?>;
        piso_maximo = <?php echo count($mapa)?>;
        piso_maximo--;
        base_titulo = '<?php echo $portada[0]["tituloweb"]  ?>';

    </script>
    <!-- CSS SLICK -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/js/slick/slick/slick.css"); ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/js/slick/slick/slick-theme.css"); ?>"/>
    <!-- Javascript de pannellum framework -->
    <script src="<?php echo base_url("assets/js/pannellum/src/js/pannellum.js"); ?>"></script>
	<script src="<?php echo base_url("assets/js/pannellum/src/js/libpannellum.js"); ?>"></script>
    <!-- Css de pannellum framework -->
    <link rel="stylesheet" href="<?php echo base_url("assets/js/pannellum/src/css/pannellum.css");?>"/>
    <!-- Css de pannellum -->
    <link rel="stylesheet" href="<?php echo base_url("assets/css/estilos_pannellum.css");?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/css/estilos_mapa_panellum.css");?>">
    <!--librerias JQuery & JQuery ui-->
    <script src="<?php echo base_url("assets/js/jquery.js"); ?>"></script>
    <script src="<?php echo base_url("assets/js/jqueryui/jquery-ui.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/js/mapa.js"); ?>"></script>
    <!-- Css y JS de la portada -->
    <link rel="stylesheet" href="<?php echo base_url("assets/css/estilos_portada.css"); ?>"/>
    <script src="<?php echo base_url("assets/js/efectos_portada.js"); ?>"></script>

 
    
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Calligraffitti" rel="stylesheet">
    <link rel="shortcut icon" href="<?php echo base_url("assets/imagenes/portada/icono.ico"); ?>">

     <!-- CSS Biblioteca -->
    <link href="assets/css/hover.css" rel="stylesheet" media="all"/>
    <link rel="stylesheet" href="assets/css/animate.css"/>
    <link rel="stylesheet" href="<?php echo base_url("assets/css/ultimo-estilo.css"); ?>"/>
 

</head>
	
<body>