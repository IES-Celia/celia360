<!DOCTYPE html>

<!-- HEADER DEL HOMEPAGE PRINCIPAL -->
<!-- Carga todo el CSS y JS común del frontend y prepara las variables del mapa y de la portada si están presentes -->

<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">  
<title>Visita Celia Tour</title>

<script>
        // Prepara las varibales JS para el mapa (si están presentes)
<?php
        if (isset($config_mapa)) {
?>
            piso = <?php echo $config_mapa["piso_inicial"]?>;
            piso_maximo = <?php echo count($mapa)?>;
            piso_maximo--;
  <?php
        }
  ?>

</script>

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
	<link rel="stylesheet" href="<?php echo base_url("assets/css/cssDavidMora.css"); ?>"/>
	<link rel="stylesheet" href="<?php echo base_url("assets/css/style.css"); ?>"/>
	 <!-- CSS SLICK -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/js/slick/slick/slick.css"); ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/js/slick/slick/slick-theme.css"); ?>"/>
</head>
<body>
<a class="nav-link" style='display:none;' id="opcionlibre_portada" href="<?php echo site_url("tour/visita/libre");?>" onclick="visita_opcion('get_json_libre')">Visita libre</a>
<a class="nav-link" style='display:none;' id="opcionguiada_portada" href="<?php echo site_url("tour/visita/guiada");?>" onclick="visita_opcion('get_json_guiada')">Visita Guiada</a>
