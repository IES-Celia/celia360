<!DOCTYPE html>

<!-- HEADER DEL HOMEPAGE PRINCIPAL -->
<!-- Carga todo el CSS y JS común del frontend y prepara las variables del mapa y de la portada si están presentes -->

<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">  
<title>Celia Tour</title>

<script>
        // Prepara las varibales JS para el mapa (si están presentes)
<?php
        if (isset($config_mapa)) {
?>
            var piso = <?php echo $config_mapa["piso_inicial"]?>;
            var piso_maximo = <?php echo count($mapa)?>;
            piso_maximo--;
  <?php
        }
  ?>

    // Prepara el título de la portada (extraído de la BD)
    var base_titulo = '<?php if (isset($portada)) echo $portada[0]["opcion_valor"]; else echo "''";  ?>';

</script>

    <!-- CSS SLICK -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/js/slick/slick/slick.css"); ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/js/slick/slick/slick-theme.css"); ?>"/>
    <!-- Javascript de pannellum framework
    <script src="<?php echo base_url("assets/js/pannellum/src/js/pannellum.js"); ?>"></script>
	<script src="<?php echo base_url("assets/js/pannellum/src/js/libpannellum.js"); ?>"></script>
     -->
    <!-- Css de pannellum framework
    <link rel="stylesheet" href="<?php echo base_url("assets/js/pannellum/src/css/pannellum.css");?>"/>
     -->
    <!-- Css de pannellum
    <link rel="stylesheet" href="<?php echo base_url("assets/css/estilos_pannellum.css");?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/css/estilos_mapa_panellum.css");?>">
     -->
    <!--librerias JQuery & JQuery ui-->
    <script src="<?php echo base_url("assets/js/jquery.js"); ?>"></script>
    <script src="<?php echo base_url("assets/js/jqueryui/jquery-ui.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/js/mapa.js"); ?>"></script>

    <!-- Css y JS de la portada -->

    <!--<link rel="stylesheet" href="<?php echo base_url("assets/css/estilos_portada.css"); ?>"/>-->
	<link rel="stylesheet" href="<?php echo base_url("assets/css/cssDavidMora.css"); ?>"/>
	<link rel="stylesheet" href="<?php echo base_url("assets/css/style.css"); ?>"/>

    <!-- Fuentes externas -->
    <!--<link rel="shortcut icon" href="<?php echo base_url("assets/imagenes/portada/icono.ico"); ?>">-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">	

    <!-- CSS Biblioteca -->
    <link href="assets/css/hover.css" rel="stylesheet" media="all"/>
    <link rel="stylesheet" href="assets/css/animate.css"/>
    <link rel="stylesheet" href="<?php echo base_url("assets/css/ultimo-estilo.css"); ?>"/>

	<!-- Efectos CSS y JS de la portada -->
	
	<!-- QUILL Library CSS -->
	<link rel="stylesheet" href="<?php echo base_url('assets/js/quill/css/quill.snow.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/js/quill/css/quill.core.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/js/quill/css/quill.bubble.css'); ?>">

	<!-- QUILL Library JS -->
	<script src="<?php echo base_url('assets/js/quill/js/quill.core.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/quill/js/quill.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/quill/js/quill.min.js'); ?>"></script>
	<!-- FIN QUILL Library -->
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/BOOTSTRAP_FINAL.min.css'); ?>">
    
    <!-- Bootstrap JS -->
    <script src="<?php echo base_url('assets/js/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap/js/popper.min.js'); ?>"></script>
    <script src="<?php echo base_url("assets/js/jquery.dataTables.min.js"); ?>"></script>

    <script>
    
        /* EFECTOS DEL MENÚ SOBRE LA PORTADA */    

        $(document).ready(function(){
        
            $("#descripcion_portada").fadeOut('fast');
            
            // para que cambie el background a INICIO al hacer hover

            $('#header_portada img').mouseenter(function(){
                $("#titulito").text(base_titulo);
                $("#descripcion_portada").text("");
                $("#descripcion_portada").siblings().fadeIn('fast');
            });

            // para que cambie el background a LIBRE al hacer hover

            $('#opcionlibre_portada').mouseenter(function(){
                $("#titulito").text("Visita Libre");
                $("#echenique").css({
                    "display" : "none"
                })
                $("#descripcion_portada").text("<?php echo $portada[2]["opcion_valor"];?>");
                $("#descripcion_portada").fadeIn('fast');
                $("#descripcion_portada").siblings().fadeOut('fast');
            });

            // para que cambie el background a GUIADA al hacer hover

            $('#opcionguiada_portada').mouseenter(function(){
                $("#titulito").text("Visita Guiada");
                $("#echenique").css({
                    "display" : "none"
                })
                $("#descripcion_portada").text("<?php echo $portada[3]["opcion_valor"];?>");
                $("#descripcion_portada").fadeIn('fast');
                $("#descripcion_portada").siblings().fadeOut();

            });

            // para que cambie el background a PUNTOS DESTACADOS al hacer hover

            $('#opciondestacada_portada').mouseenter(function(){
                $("#titulito").text("Zonas Destacadas");
                $("#echenique").css({
                    "display" : "none"
                })
                $("#descripcion_portada").text("<?php echo $portada[4]["opcion_valor"];?>");
                $("#descripcion_portada").fadeIn('fast');
                $("#descripcion_portada").siblings().fadeOut();

            });

            // para que cambie el background a BIBLIOTECA al hacer hover

            $('#clickbiblio').mouseenter(function(){
                $("#titulito").text("Biblioteca");
                $("#echenique").css({
                    "display" : "none"
                })
                $("#descripcion_portada").text("<?php echo $portada[5]["opcion_valor"];?>");
                $("#descripcion_portada").fadeIn('fast');
                $("#descripcion_portada").siblings().fadeOut();

            });    

            // para que cambie el background a creditos al hacer hover

            $('#creditos_portada').mouseenter(function(){
                $("#titulito").text("Créditos");
                $("#echenique").css({
                    "display" : "none"
                })
                $("#descripcion_portada").text("Conoce al equipo de desarrollo que hizo posible este tour virtual");
                $("#descripcion_portada").fadeIn('fast');
                $("#descripcion_portada").siblings().fadeOut();

            });  

            //Al perder el foco los elementos del menu, se restablece el nombre de titulo por defecto
            $("ul li a").mouseleave(function(){
                $("#titulito").text(base_titulo);
                $("#echenique").fadeIn();
                $("#descripcion_portada").text("");
                $("#descripcion_portada").siblings().fadeIn();
            })

            ////// PRUEBA PARA MOSTRAR BIBLIO AYAX
            $('#clickbiblio').on("click",function(){
                $('#bibliotecaajax').css("display","block");
            });

            $

        });

    </script>    

</head>
    
<!-- Cargamos en el body la imagen de fondo -->
<body style="background-image:url('<?php echo site_url("assets/imagenes/portada/".$portada[1]['opcion_valor']); ?>')">
