<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">  
<title>Celia Tour</title>
    <!-- CSS SLICK -->
    
        <?php 
            if(isset($mapa)){
                echo "<script>";
                echo "piso_maximo = ".count($mapa).";";
                echo "piso_maximo--";
                echo "</script>";
                echo "<script src='".base_url('assets/js/mapa_escena.js')."'></script>";
            }
        ?>
    
    <link href="<?php base_url("assets/css/admin_style.css"); ?>" rel="stylesheet">
     
    <link rel="shortcut icon" href="<?php base_url("assets/imagenes/portada/icono.ico"); ?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/css/estilos_pannellum.css");?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/css/estilos_mapa_escenas.css");?>">
    <script src="<?php echo base_url("assets/js/jquery.js"); ?>"></script>
    <script src="<?php echo base_url("assets/js/mapa_escena.js"); ?>"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel='stylesheet' href=https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />


       
    <!-- CSS CMS -->
    
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/admin_style.css"); ?>"/>
    </head>
    
    <body>
    
   
    <?php 
        error_reporting(7);
            if (!ini_get('display_errors')) {
                ini_set('display_errors', '0');
            }
    ?>
        <div id="menu">
    <span class="sidenavmenu" onclick="openNav()"><i class="fas fa-bars"></i> Menu </span>
    <p id="sesion" align="center">Estás logueado como <span id="usuario"> <?php echo $this->session->nombreusr;?></span></p>
        </div>



    
