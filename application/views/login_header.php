<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">  
<title>Celia Tour Login</title>

<!-- CSS SLICK -->
<link href="<?php base_url("assets/css/admin_style.css"); ?>" rel="stylesheet">
<link rel="shortcut icon" href="<?php base_url("assets/imagenes/portada/icono.ico"); ?>">
<link rel="stylesheet" href="<?php echo base_url("assets/css/estilos_pannellum.css");?>">
<script src="<?php echo base_url("assets/js/jquery.js"); ?>"></script>
<script src="<?php echo base_url("assets/js/mapa.js"); ?>"></script>

<!-- Fuentes externas -->
<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="<?php echo base_url('assets/css/BOOTSTRAP_FINAL.min.css'); ?>">
    
<!-- Bootstrap JS -->
<script src="<?php echo base_url('assets/js/bootstrap/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap/js/popper.min.js'); ?>"></script>
<script src="<?php echo base_url("assets/js/jquery.dataTables.min.js"); ?>"></script>
 
<?php 
    error_reporting(7);
    if (!ini_get('display_errors')) {
        ini_set('display_errors', '0');
    }
?>
</head>
<body>

<?php
if (isset($error)) {
	echo "<p class='text-center' style='color:red:'>".$error."</p>";
}
if (isset($mensaje)) {
	echo "<p class='text-center' style='color:green'>".$mensaje."</p>";
}
?>
