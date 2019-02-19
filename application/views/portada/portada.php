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
?>
<!-- Bootstrap -->
<link rel="stylesheet" href="<?php echo base_url('assets/css/BOOTSTRAP_FINAL.min.css'); ?>">

<style>
    /* Centrar vertical y horizontalmente el div que contiene el h1, los parrafos y en boton*/
    .centrado-porcentual {
        text-align: center;
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        -webkit-transform: translate(-50%, -50%);
        width: 80%;
    }
    h1{
        font-size: 6vw; 
    }
    /* Posicionar el pie de pagina al final */
    #footer{
        position: absolute;
        top: 85%;
    }
    /* Boton fantasma */
    .echenique{
        font-size: 20px;
        border: 3px solid white;
        border-radius: 10px;
        background-color: rgba(0, 0, 0, 0.5); 
    }
</style>

<div id="slider1_portada" class="container-fluid fondo-portada">

    <div class="centrado-porcentual">

        <h1 style="color:<?php echo $portada[9]['opcion_valor'];?>; font-family: <?php echo $portada[8]['opcion_valor'] ;?>, sans-serif;" id="titulito"><?php echo  $portada[0]["opcion_valor"] ?></h1>

        <div id="parrafito">
            <p style="color:<?php echo $portada[9]['opcion_valor'];?>; font-family: <?php echo $portada[8]['opcion_valor'] ;?>, sans-serif; font-size: 3vw;" id="descripcion_portada"></p>
        </div>

        <?php 
            if ($portada[7]["opcion_valor"] == "1") {
                // El botón "Historia" solo se muestra si está configurado así en las opciones de portada
                echo "<a class='btn echenique' href='".site_url("biblioteca/abrir_phistoria")."' role='button'>HISTORIA</a>";
            }
        ?>

    </div>

</div>

<div class="container-fluid" id="footer">

    <p class="text-center">
        <span style="color:<?php echo $portada[9]['opcion_valor'];?>; font-family: <?php echo $portada[8]['opcion_valor'] ;?>, sans-serif;">Creditos |</span>
        <span style="color:<?php echo $portada[9]['opcion_valor'];?>; font-family: <?php echo $portada[8]['opcion_valor'] ;?>, sans-serif;">Politica de privacidad |</span>
        <span style="color:<?php echo $portada[9]['opcion_valor'];?>; font-family: <?php echo $portada[8]['opcion_valor'] ;?>, sans-serif;">Cookies</span>
    </p>
    <p class="text-center">
        <span style="color:<?php echo $portada[9]['opcion_valor'];?>; font-family: <?php echo $portada[8]['opcion_valor'] ;?>, sans-serif;">Powered by Celia Viñas 2ºDAW 17/19&nbsp;&nbsp;</span>
        <img src="<?php echo base_url("assets/imagenes/portada/logo.png");?>" width="20px"/>
    </p>

</div>
