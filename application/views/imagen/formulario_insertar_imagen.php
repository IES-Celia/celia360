<?php
// Formulario de registro de imágenes
defined('BASEPATH') OR exit('No se permite el acceso directo al script');
if (isset($mensaje)) {
    echo "<p style='color:green'>" . $mensaje . "</p>";
}
if (isset($error)) {
    echo "<p style='color:red'>" . $error . "</p>";
}
?><!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Proyecto 360 CodeIgniter</title>
    </head>
    <body>
        <!-- CAMPOS DE LA TABLA : id_imagen,  titulo_imagen,  texto_imagen,  url_imagen , fecha -->
        <!-- AQUI EMPIEZA LA VISTA -->
        <section  id="ContenedorImagen">
            <header>
                <h1 id="titulo">Insertar imagen</h1>
            </header>
            <p>
                <a class='insert' href='<?php echo site_url("imagen/lista_imagenes"); ?>'>Volver al listado</a>
            <form class="for" enctype="multipart/form-data" action='<?php echo site_url("imagen/insertar_imagen"); ?>' method="post">
                <input type='hidden' name='accion' value='insertar_imagen'>
                <div>
                    <input id= "id_imagen" name='id_imagen' type ="hidden"><br />
                    <label id= "label_titulo" for="titulo">T&iacute;tulo:</label>
                    <input id="titulo" name='titulo_imagen' placeholder="Introduzca el t&iacute;tulo" required><br />
                </div>
                <div>
                    <label for="texto_imagen">Texto:</label>
                    <textarea id="texto_imagen" name='texto_imagen' placeholder="Introduzca la descripci&oacute;n de la imagen"></textarea><br>
                </div>
                <div>
                    <label for="fecha">Fecha:</label>
                    <input type="date" id="fecha" name='fecha' placeholder="Introduzca la fecha" required><br />
                </div>
                <div>
                    <!-- MAX_FILE_SIZE debe preceder al campo de entrada del fichero -->
                    <input type="hidden" name="MAX_FILE_SIZE" value="20000000" />
                    <label for="imagen">Imagen:</label>
                    <input type="file" name="imagen"  id="imagen" placeholder="Seleccionar la imagen" required><br />
                </div>
                <input type="hidden" name="accion" value="insertar_imagen"><br>
                <input type="submit" name="enviar" value="Guardar imagen"/>
            </form>
        </p>
    </section>
</body>
</html>