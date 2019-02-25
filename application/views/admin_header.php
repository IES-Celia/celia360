<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">  
<title>Celia Tour</title>

    <!-- Javascript de pannellum framework -->
    <script src="<?php echo base_url("assets/js/pannellum/src/js/pannellum.js"); ?>"></script>
	<script src="<?php echo base_url("assets/js/pannellum/src/js/libpannellum.js"); ?>"></script>
    <!-- Css de pannellum framework -->
    <link rel="stylesheet" href="<?php echo base_url("assets/js/pannellum/src/css/pannellum.css");?>"/>
    <link rel="stylesheet" href="<?php echo base_url("assets/css/estilos_pannellum.css");?>">
    <!-- CSS propio -->
    <link rel="stylesheet" href="<?php echo base_url("assets/css/style.css"); ?>">
    <!-- Script -->
    <script>
        base_url = '<?php echo base_url() ?>';
	</script>
	<!-- CSS mapa escenas -->
    <link rel="stylesheet" href="<?php echo base_url("assets/css/estilos_mapa_escenas.css");?>">
    <!-- Jquery -->
    <script src="<?php echo base_url("assets/js/jquery.js"); ?>"></script>
    <script src="<?php echo base_url("assets/js/jqueryui/jquery-ui.min.js"); ?>"></script>
    <!-- Jquery table -->
    <link rel="stylesheet" href="<?php echo base_url("assets/css/dataTables.bootstrap.min.css"); ?>">
	<!-- QUILL Library -->
	<link rel="stylesheet" href="<?php echo base_url('assets/js/quill/css/quill.core.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/js/quill/css/quill.bubble.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/js/quill/css/quill.snow.css'); ?>">
	<script src="<?php echo base_url('assets/js/quill/js/quill.core.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/quill/js/quill.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/quill/js/quill.min.js'); ?>"></script>
	<!-- FIN QUILL Library -->
    <!-- CSS Botstrap -->
	<link rel="stylesheet" href="<?php echo base_url('assets/css/BOOTSTRAP_FINAL.min.css'); ?>">

	<?php 
        if(isset($mapa)){
            echo "<script>";
            echo "piso_maximo = ".count($mapa).";";
            echo "piso_maximo--";
            echo "</script>";
            echo "<script src='".base_url('assets/js/mapa_escena.js')."' defer></script>";
        }
    ?>

    <!-- Fuentes externas -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <!--<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />-->
    <link rel='stylesheet' href=https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css>
    <!--<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />-->
    
</head>
    
    <body>
    
    <?php 
        error_reporting(7);
            if (!ini_get('display_errors')) {
                ini_set('display_errors', '0');
            }
    ?>
        <div id="menu" class="navbar navbar-expand-lg bg-dark">

			<div class="navbar-brand">
			<div id="hamburguesa">    
				<span class="sidenavmenu" onclick="openNav()"><i class="fas fa-bars"></i> Menú </span>
				
			</div>
			</div>
			
			<style>
                .alert{
                    margin-bottom: 0!important;
                    width: auto!important;
                }
            </style>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<div id="mensajemenu" class='col-md-10'>
                <div class='col-md-6 text-center mx-auto' >
                <div id="mensaje_cabecera">
                <?php  if (isset($mensaje)) echo "<div class='alert alert-success ' role='alert' >
                                                        <h7 class='mr-2'> $mensaje</h7><i class='far fa-check-circle'></i>
                                                        </div>"; ?>
                </div>
                <div id="error_cabecera">
				<?php  if (isset($error)) echo "<div class='alert alert-danger ' role='alert' >
                                                        <h7 class='mr-2'>$error</h7><i class='fas fa-exclamation-circle'></i>
                                                        </div>";  ?>
                </div>
                </div>
				
				
        	</div>
				<div id="logueo" >    
					<span id="sesion" >Estás logueado como <span id="usuario"> <?php echo $this->session->nombreusr;?></span></span>
				</div>
			</div>
    </div>



    
