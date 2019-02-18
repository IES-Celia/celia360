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
<style>
    /* Centrar vertical y horizontalmente el div que contiene el h1, los parrafos y en boton*/
    .centrado-porcentual {
        text-align: center;
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        -webkit-transform: translate(-50%, -50%);
    }
    /* Posicionar el pie de pagina al final */
    #footer{
        position: absolute;
        top: 92%;
    }
</style>

<div id="slider1_portada" class="container-fluid fondo-portada">

    <div id="slider1_portada" class="centrado-porcentual">

        <h1 style="color:<?php echo $portada[9]['opcion_valor'];?>; font-family: <?php echo $portada[8]['opcion_valor'] ;?>, sans-serif;" id="titulito"><?php echo  $portada[0]["opcion_valor"] ?></h1>

        <div id="parrafito">
            <p style="color:<?php echo $portada[9]['opcion_valor'];?>; font-family: <?php echo $portada[8]['opcion_valor'] ;?>, sans-serif;" id="descripcion_portada"></p>
        </div>

        <?php 
            if ($portada[7]["opcion_valor"] == "1") {
                // El botón "Historia" solo se muestra si está configurado así en las opciones de portada
                echo "<a class='btn btn-primary' href='".site_url("biblioteca/abrir_phistoria")."' role='button'>HISTORIA</a>";
            }
        ?>

    </div>

</div>

<div class="container-fluid" id="footer">

    <p class="text-center">
        <span style="color:<?php echo $portada[9]['opcion_valor'];?>; font-family: <?php echo $portada[8]['opcion_valor'] ;?>, sans-serif;" >Powered by Celia Viñas 2ºDAW 17/18&nbsp;&nbsp;</span>
        <img src="<?php echo base_url("assets/imagenes/portada/logo.png");?>" width="20px"/>
    </p>

</div>

