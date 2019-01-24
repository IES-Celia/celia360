<?php
/*
    Este archivo es parte de la aplicación web Celia360. 

    Celia 360 es software libre: usted puede redistribuirlo y/o modificarlo
    bajo los términos de la GNU General Public License tal y como está publicada por
    la Free Software Foundation en su versión 3.
 
    Celia 360 se distribuye con el propósito de resultar útil,
    pero SIN NINGUNA GARANTÍA de ningún tipo. 
    Véase la GNU General Public License para más detalles.

    Puede obtener una copia de la licencia en <http://www.gnu.org/licenses/>.
*/
// a continuacion nos encontramos con el css de las ventanas modales de la vista audio.
?>

<!-- PORTADA PRINCIPAL DE HOMEPAGE -->
<!-- Crea la capa main y el slider de la portada con la imagen de portada de fondo-->
<!-- También se inserta aquí el botón para visualizar los libros de historia -->

        <!-- FUENTES CONFIGURABLES -->
        <link rel="stylesheet" href="./assets/fonts/Ubuntu-Regular.ttf">
        <link rel="stylesheet" href="./assets/fonts/Oswald-Regular.ttf">
        
        <main>
            <div id="responsividad"> <!-- WIP. Su css está en estilos_portada.css -->
                <a href="<?php echo site_url();?>"><?php echo $con["titulo_web"] ?></a> 
                <a id="opcionlibre_portada" href="<?php echo site_url("tour/visita/libre"); ?>" onclick="visita_opcion('get_json_libre')" >Visita libre</a>
                <a id="opcionguiada_portada" href="<?php echo site_url("tour/visita/guiada"); ?>" onclick="visita_opcion('get_json_guiada')" >Visita Guiada</a>
                <a id="opciondestacada_portada" href="<?php echo site_url("PuntosDestacados"); ?>">Destacados</a>
                 <?php 
                 // La opción de menú "biblioteca" solo se muestra si está configurado así en las opciones de portada
                 if ($con["show_biblioteca"]== "1") {  
                    echo "<a id='clickbiblio' href='".site_url("biblioteca/vertodosloslibros")."'>Biblioteca</a>";
                 }
                 ?>
                 <a id="creditos_portada" href="<?php echo site_url("tour/creditos"); ?>" >Créditos</a>
            </div>
            <div id="slider1_portada" style="background-image:url('<?php echo site_url("assets/imagenes/portada/".$portada[0]["imagen_web"]); ?>')">
                 <div class="contenedor_portada">
                     <h1 style="color:<?php echo $portada[0]['color_fuente'];?>; font-family: <?php echo $portada[0]['nombre_fuente'] ;?>, sans-serif;" id="titulito"><?php echo  $con["titulo_web"] ?></h1>
                     <div id="parrafito">
                         <p style="color:<?php echo $portada[0]['color_fuente'];?>; font-family: <?php echo $portada[0]['nombre_fuente'] ;?>, sans-serif;" id="descripcion_portada"></p>
                        <div id="separador_portada"> </div>
                        <?php if ($con["show_historia"] == "1") {
                            // El botón "Historia" solo se muestra si está configurado así en las opciones de portada
                            echo "<a href='".site_url("biblioteca/abrir_phistoria")."' class='btn'>HISTORIA</a>";
                        }
                        ?>
                     </div>
                 </div> 
                 <div id="poweredBy">
                    <h1 style="color:<?php echo $portada[0]['color_fuente'];?>; font-family: <?php echo $portada[0]['nombre_fuente'] ;?>, sans-serif;">Powered by Celia Viñas 2ºDAW 17/18&nbsp;&nbsp;</h1>
                    <img src="<?php echo base_url("assets/imagenes/portada/logo.png"); ?>"/>
                 </div>
            </div>
        </main>
      
      
