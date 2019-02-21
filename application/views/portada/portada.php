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

<style>
    /* Eliminar el scroll de la portada */
    body{
        overflow-x: hidden;
        overFlow-y: hidden;
    }
    /* Centrar vertical y horizontalmente el div que contiene el h1, los parrafos y en boton*/
    .centrado-porcentual {
        text-align: center;
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        -webkit-transform: translate(-50%, -50%);
        width: 90%;
        /*
        padding: 20px;
        background-color: rgba(0, 0, 0, 0.4);
        border-radius: 10px;
        */
    }
    h1{
        font-size: 6vw; 
        width: 100%;
        text-shadow: 3px 3px 0px rgba(0,0,0,0.5);
    }
    /* Posicionar el pie de pagina al final */
    #footer{
        position: absolute;
        top: 85%;
    }
    /* Boton fantasma */
    .echenique{
        font-size: 20px;
        border: 3px solid;
        border-radius: 10px;
        background-color: rgba(0, 0, 0, 0.5); 
    }
    #descripcion_portada{
        text-shadow: 3px 3px 0px rgba(0,0,0,0.5);
    }
</style>
<?php
    $color = $portada[9]['opcion_valor'];
    $fuente = $portada[8]['opcion_valor'];
?>
<div id="slider1_portada" class="container-fluid">

    <div class="centrado-porcentual">

        <h1 style="color:<?php echo $portada[9]['opcion_valor'];?>; font-family: <?php echo $portada[8]['opcion_valor'] ;?>, sans-serif;" id="titulito"><?php echo  $portada[0]["opcion_valor"] ?></h1>

        <div id="parrafito">
            <p style="color:<?php echo $portada[9]['opcion_valor'];?>; font-family: <?php echo $portada[8]['opcion_valor'] ;?>, sans-serif; font-size: 3vw;" id="descripcion_portada"></p>
        </div>

        <div>
        <?php 
            if ($portada[7]["opcion_valor"] == "1") {
                // El botón "Historia" solo se muestra si está configurado así en las opciones de portada
                echo "<a style='border-color:$color; color:$color; font-family: $fuente, sans-serif' class='btn echenique mb-3' id='echenique' href='".site_url("biblioteca/abrir_phistoria")."' role='button'>HISTORIA</a>";
            }
        ?>
        </div>

    </div>

</div>

<div class="container-fluid" id="footer">

    <p class="text-center">
        <span><a style="color:<?php echo $portada[9]['opcion_valor'];?>; font-family: <?php echo $portada[8]['opcion_valor'] ;?>, sans-serif;" href="<?php echo site_url("tour/creditos");?>">Créditos |</a></span>                    
        <span style="color:<?php echo $portada[9]['opcion_valor'];?>; font-family: <?php echo $portada[8]['opcion_valor'] ;?>, sans-serif;">Política de Privacidad |</span>
        <span style="color:<?php echo $portada[9]['opcion_valor'];?>; font-family: <?php echo $portada[8]['opcion_valor'] ;?>, sans-serif;">Cookies</span>
    </p>
    <p class="text-center">
        <span style="color:<?php echo $portada[9]['opcion_valor'];?>; font-family: <?php echo $portada[8]['opcion_valor'] ;?>, sans-serif;">Powered by Celia Viñas 2ºDAW 17/19&nbsp;&nbsp;</span>
        <img src="<?php echo base_url("assets/imagenes/portada/logo.png");?>" width="20px"/>
    </p>

</div>
