<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">  
<title>Celia Tour</title>
    <!-- CSS SLICK -->
    <script>
        base_url = '<?php echo base_url() ?>';
        piso = <?php echo $configuracion["piso_inicial"] ?>
    </script>
    <link href="<?php base_url("assets/css/admin_style.css"); ?>" rel="stylesheet">
     
    <link rel="shortcut icon" href="<?php base_url("assets/imagenes/portada/icono.ico"); ?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/css/estilos_pannellum.css");?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/css/estilos_mapa_escenas.css");?>">
    <script src="<?php echo base_url("assets/js/jquery.js"); ?>"></script>
    
    <!--ATENCIÓN LOLI  PARA PAGINACIÓN (varias funcionalidades)-->
   <link rel="stylesheet" href="<?php echo base_url("assets/css/jquery.dataTables.min.css"); ?>">
     <!--<link rel="stylesheet" href="<?php //echo base_url("assets/css/jquery.dataTables.bootstrap.min.css"); ?>">-->
    
    <script src="<?php echo base_url("assets/js/jquery.dataTables.min.js"); ?>"></script>
   <!-- <script src="<?php //echo base_url("assets/js/dataTables.bootstrap.min.js"); ?>"></script>-->
    <!--FIN LOLI-->
    
    <?php 
            if(isset($mapa)){
                echo "<script>";
                echo "piso_maximo = ".count($mapa).";";
                echo "piso_maximo--";
                echo "</script>";
                echo "<script src='".base_url('assets/js/mapa_escena.js')."'></script>";
            }
        ?>
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
        <div id="hamburguesa">    
        <span class="sidenavmenu" onclick="openNav()"><i class="fas fa-bars"></i> Menu </span>
        </div>
        <div id="mensajemenu">
            <?php  if (isset($mensaje)) echo "<span id='mensaje_cabecera'>$mensaje</span>"; ?>
            <?php  if (isset($error)) echo "<span id='error_cabecera'>$error</span>"; ?>
        </div>
        <div id="logueo">    
        <p id="sesion" align="center">Estás logueado como <span id="usuario"> <?php echo $this->session->nombreusr;?></span></p>
        </div>
        </div>



    
