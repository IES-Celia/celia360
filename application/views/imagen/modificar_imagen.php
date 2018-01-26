<?php

defined('BASEPATH') OR exit('No se permite el acceso directo al script');
// Formulario para modificar la imagen
if (isset($mensaje)) {
    echo "<p style='color:green'>" . $mensaje . "</p>";
}
$du = $lista_imagenes[0];
?>
<h1 id="titulo">Modificar Imagen</h1>

<a class='insert' href='<?php echo site_url("imagen/lista_imagenes"); ?>'>Volver al listado</a>

<!-- CAMPOS DE LA TABLA : id_imagen,  titulo_imagen,  texto_imagen,  url_imagen , fecha -->
<form class="for" enctype="multipart/form-data"  action='<?php echo site_url("imagen/actualizar_imagen"); ?>' method='post'>
    <?php
    echo "<input type='hidden' name='id_imagen' value='" . $du['id_imagen'] . "'><br/>";
    echo "T&iacute;tulo:<input type='text' name='titulo_imagen' value='" . $du['titulo_imagen'] . "'><br/>";
    echo "<br>Texto:<input type='text' name='texto_imagen' value='" . $du['texto_imagen'] . "'><br/>";
    echo '<input type="hidden" name="MAX_FILE_SIZE" value="3000000" />';
    echo "<br>Fecha:<input type='date' name='fecha'  value='" . $du['fecha'] . "'><br/>";
    echo "<br>Imagen:<input type='file' id='imagen' name='imagen'value='" . $du['url_imagen'] . "'><br/>";
    echo "<input type='hidden' name='url_imagen' value='" . $du['url_imagen'] . "'>";
    echo "<img width='100px' src='".base_url("imagenes/" . $du['url_imagen']). "'><br><p>" . $du['url_imagen'] . "</p><br>";
    ?>   
    <input type='submit' name ='actualizar' value = 'Aceptar'>
</form>