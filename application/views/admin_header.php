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
    <!-- CSS PARA MAQUETAR TODO EL MUNDO UTILIZAR ESTOS STILOS DESDE AHORA
    <link rel="stylesheet" href="<?php echo base_url("assets/css/style.css"); ?>">

     CSS SLICK -->
    <script>
        base_url = '<?php echo base_url() ?>';
	</script>
	
    <!-- <link href="<?php // base_url("assets/css/admin_style.css"); ?>" rel="stylesheet">-->
     
    <!-- <link rel="shortcut_icon" href="<?php //base_url("assets/imagenes/portada/icono.ico"); ?>">-->
    
    <link rel="stylesheet" href="<?php echo base_url("assets/css/estilos_mapa_escenas.css");?>">
    <!--<link rel="stylesheet" href="<?php //echo base_url("assets/css/cssDavidMora.css");?>">-->
    <script src="<?php echo base_url("assets/js/jquery.js"); ?>"></script>
    <script src="<?php echo base_url("assets/js/jqueryui/jquery-ui.min.js"); ?>"></script>
    
    <!--ATENCIÓN LOLI  PARA PAGINACIÓN (varias funcionalidades)-->
   <!-- <link rel="stylesheet" href="<?php //echo base_url("assets/css/jquery.dataTables.min.css"); ?>"> -->
    <link rel="stylesheet" href="<?php echo base_url("assets/css/dataTables.bootstrap.min.css"); ?>">
    
    
   <!-- <script src="<?php //echo base_url("assets/js/dataTables.bootstrap.min.js"); ?>"></script>-->
	<!--FIN LOLI-->

	<!-- QUILL Library -->
	<link rel="stylesheet" href="<?php echo base_url('assets/js/quill/css/quill.core.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/js/quill/css/quill.bubble.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/js/quill/css/quill.snow.css'); ?>">
	<script src="<?php echo base_url('assets/js/quill/js/quill.core.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/quill/js/quill.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/quill/js/quill.min.js'); ?>"></script>
	<!-- ./FIN QUILL Library -->

	<!-- style.css -->
	<link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">


	<?php 
            if(isset($mapa)){
                echo "<script>";
                echo "piso_maximo = ".count($mapa).";";
                echo "piso_maximo--";
                echo "</script>";
                echo "<script src='".base_url('assets/js/mapa_escena.js')."' defer></script>";
            }
        ?>
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel='stylesheet' href=https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />

		<link rel="stylesheet" href="<?php echo base_url('assets/css/BOOTSTRAP_FINAL.min.css'); ?>">
       
    <!-- CSS CMS -->
    
    <!-- <link rel="stylesheet" type="text/css" href="<?php //echo base_url("assets/css/admin_style.css"); ?>"/> -->
	<style>
		    .sidenav {
		height: 100%;
		width: 0;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background-color: #262626;
        overflow-x: hidden;
        transition: 0.5s;
        padding-top: 60px;
		z-index: 3;
    }
    
    .sidenav a {
        padding: 8px 8px 8px 32px;
        text-decoration: none;
        font-size: 20px;
        color:#c1c1c1;
        display: block;
        transition: 0.3s;
        text-align: center;
    }

        
    .sidenav a:hover {
        color: orange;
    }

    .sidenav .closebtn {
        position: absolute;
        top: 0;
        right: 25px;
        font-size: 36px;
        margin-left: 50px;
    }

    .sidenav .closebtn:hover{
    
        color: orange;
    }

    .sidenav .cerrarsesionbtn:hover{
    
        color: orange;
    }

    
    @media screen and (max-height: 450px) {
        .sidenav {padding-top: 15px;}
        .sidenav a {font-size: 18px;}
    }
        
    .sidenavmenu {
        font-size:auto;
        cursor:pointer;
        color:#ffffff;
        background:transparent;
        margin-top: 6px;
        transition:0.4s;
        margin-left: 8px;
        float: left;
    }
        
    .sidenavmenu:hover{
        color:darkorange;
    }
        
    .sidenav input{
        background-color: grey;
        border: 3px solid white;
        color: white;
        border-radius: 50px;
        position: absolute;
        right: 54px;
        top: 68px;
        height: 30px;
        transition: 1s;
        color: black;
        font-size: 25px;
        max-width: 180px;
    }
    
    .sidenav input::placeholder{
        color: black;
    }
	</style>
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
                <?php  if (isset($mensaje)) echo "<div class='alert alert-success ' role='alert' id='mensaje_cabecera'>
                                                        <h7 class='mr-2'> $mensaje</h7><i class='far fa-check-circle'></i>
                                                        </div>"; ?>
				<?php  if (isset($error)) echo "<div class='alert alert-danger ' role='alert' id='error_cabecera'>
                                                        <h7 class='mr-2'>$error</h7><i class='fas fa-exclamation-circle'></i>
                                                        </div>";  ?>
                </div>
				
				
        	</div>
				<div id="logueo" >    
					<span id="sesion" >Estás logueado como <span id="usuario"> <?php echo $this->session->nombreusr;?></span></span>
				</div>
			</div>
    </div>



    
