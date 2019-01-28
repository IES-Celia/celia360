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
            piso = <?php echo $config_mapa["piso_inicial"]?>;
            piso_maximo = <?php echo count($mapa)?>;
            piso_maximo--;
  <?php
        }
  ?>
        // Prepara el título de la portada (extraído de la BD)
        base_titulo = '<?php if (isset($portada)) echo $portada[0]["titulo_web"]; else echo "''";  ?>';

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
	<link rel="stylesheet" href="<?php echo base_url("assets/css/cssDavidMora.css"); ?>"/>
    <!-- Fuentes externas -->
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Calligraffitti" rel="stylesheet">
    <link rel="shortcut icon" href="<?php echo base_url("assets/imagenes/portada/icono.ico"); ?>">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">	
    <!-- CSS Biblioteca -->
    <link href="assets/css/hover.css" rel="stylesheet" media="all"/>
    <link rel="stylesheet" href="assets/css/animate.css"/>
    <link rel="stylesheet" href="<?php echo base_url("assets/css/ultimo-estilo.css"); ?>"/>
 
	<!-- Efectos JS de la portada -->
	
	
    
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

        $('html, body').css({
            overflow: 'auto',
            height: '100%'
        });

        // para que cambie el background a LIBRE al hacer hover

        $('#opcionlibre_portada').mouseenter(function(){
            $("#titulito").text("Visita Libre");
            $("#descripcion_portada").text("<?php echo $portada[0]["subtitulo_visita_libre"];?>");
            $("#descripcion_portada").fadeIn('fast');
            $("#descripcion_portada").siblings().fadeOut('fast');
            // $("#descripcion_portada").siblings().css('visibility', 'hidden');; con mantiene el mismo flujo pero no tiene animación
        });

        $('#opcionlibre_portada').click(function(){
          $('#portadaca').fadeOut();
        }); 

        $('#opcionguiada_portada').click(function(){
          $('#portadaca').fadeOut();
        }); 

        // para que cambie el background a GUIADA al hacer hover

        $('#opcionguiada_portada').mouseenter(function(){
            $("#titulito").text("Visita Guiada");
            $("#descripcion_portada").text("<?php echo $portada[0]["subtitulo_visita_guiada"];?>");
            $("#descripcion_portada").fadeIn('fast');
            $("#descripcion_portada").siblings().fadeOut();

        });

        // para que cambie el background a PUNTOS DESTACADOS al hacer hover

        $('#opciondestacada_portada').mouseenter(function(){
            $("#titulito").text("Zonas Destacadas");
            $("#descripcion_portada").text("<?php echo $portada[0]["subtitulo_puntos_destacados"];?>");
            $("#descripcion_portada").fadeIn('fast');
            $("#descripcion_portada").siblings().fadeOut();

        });


        // para que cambie el background a BIBLIOTECA al hacer hover

        $('#clickbiblio').mouseenter(function(){
            $("#titulito").text("Biblioteca");
            $("#descripcion_portada").text("<?php echo $portada[0]["subtitulo_biblioteca"];?>");
            $("#descripcion_portada").fadeIn('fast');
            $("#descripcion_portada").siblings().fadeOut();

        });    

        // para que cambie el background a creditos al hacer hover

        $('#creditos_portada').mouseenter(function(){
            $("#titulito").text("Créditos");
            $("#descripcion_portada").text("Conoce al equipo de desarrollo que hizo posible este tour virtual");
            $("#descripcion_portada").fadeIn('fast');
            $("#descripcion_portada").siblings().fadeOut();

        });  


        $("#slider1_portada").mouseenter(function(){
            $("#titulito").text(base_titulo);
            $("#descripcion_portada").text("");
            $("#descripcion_portada").siblings().fadeIn();
        });    



        ////// PRUEBA PARA MOSTRAR BIBLIO AYAX
        $('#clickbiblio').on("click",function(){
            $('#bibliotecaajax').css("display","block");
        });
            // para desactivar el scroll cuando la pantalla sea grande 
        //if ($(window).width()<800){


            // para activar el scroll    
            /*$('#lazo_portada').on('click',function(){
              $('html, body').css({
                overflow: 'auto',
                height: 'auto'
            });  
            });*/

            // para darle efecto al historia
            /*
            $('#lazo_portada').on('click', function(e){
                e.preventDefault();
               $('html,body').animate({
                   scrollTop: 1000
               }, 800); 
            });*/

        //}
        });

    </script>    

</head>
	
<body>
    

<?php 
    // Contenido de la portada (extraído de la BD)
    if (isset($portada)) $con = $portada[0]; 
    else $con = "";
?>
