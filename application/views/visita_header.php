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

    // Prepara el título de la portada (extraído de la BD)
    var base_titulo = '<?php if (isset($portada)) echo $portada[0]["opcion_valor"]; else echo "''";  ?>';

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
</head>
<body>
	
