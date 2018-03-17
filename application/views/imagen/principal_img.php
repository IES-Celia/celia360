<style>

    .cerrar{
        position: relative;
        top:15px;
        left:44%;

    }
    .img-cerrar{
        width: 20px; height: 20px;
    }

</style>

<?php
defined('BASEPATH') OR exit('No se permite el acceso directo al script');
//formulario para mostrar la tabla imagenes, con sus datos 
if (isset($mensaje)) {
    echo "<p style='color:green'>" . $mensaje . "</p>";
}
if (isset($error)) {
    echo "<p style='color:red'>" . $error . "</p>";
}
//título
//echo '<h1>IMAGEN</h1>';
// CAMPOS DE LA TABLA : id_imagen,  titulo_imagen,  texto_imagen,  url_imagen , fecha
echo"<a class='insert' onclick='mostrar(\"insertar\")' > <i class='fas fa-plus-circle'></i> Insertar imagen </a>";

//he quitado la columna texto de la vista, pero sigue en la bd 
//cabecera  <th>Texto</th>
//tabla <td>" . $ima["texto_imagen"] . "</td>
echo "<table id='cont' class='tabla' class='display'>";
//****************** PAGINACIÓN CON JQUERY LOLI************\\
echo "<thead>";
echo '<tr id="cabecera"><th>Id</th><th>T&iacute;tulo</th><th>Url</th><th>Miniatura</th><th>Fecha</th><th>Modificar Imagen</th><th>Borrar Imagen</th></tr>';
echo "</thead>";
echo "<tfoot>";
echo '<tr id="cabecera"><th>Id</th><th>T&iacute;tulo</th><th>Url</th><th>Miniatura</th><th>Fecha</th><th>Modificar Imagen</th><th>Borrar Imagen</th></tr>';
echo "</tfoot>";
echo "<tbody>";
foreach ($lista_imagenes as $ima) {
    $fila = $ima["id_imagen"];
    $nombre_archivo = $ima["id_imagen"]."_miniatura.jpg";
    $url_modificar = site_url("imagen/modificar_imagen/") . $ima["id_imagen"];
    $url_borrar = site_url("imagen/borrar_imagen/") . $ima["id_imagen"];
    echo "<tr id='imagen-" . $fila . "'><td>" . $ima["id_imagen"] . "</td><td>" . $ima["titulo_imagen"] . "</td><td>" . $ima["url_imagen"] . "</td><td align='center'><a href='".
    base_url("assets/imagenes/imagenes-hotspots/" . $ima["url_imagen"])."'><img src='" .
    base_url("assets/imagenes/imagenes-hotspots/" . $nombre_archivo) . "'></a></td><td>" .
    $ima["fecha"] . "</td>
        <td><a href='#' onclick='mostrar(\"modificar\")'><i class='fa fa-edit' style='font-size:30px;'></i></a></td>
    	<td><a class='delete' href='#' onclick='borrar_imagen($fila)'><i class='fa fa-trash' style='font-size:30px;'></i></a></td></tr>";
}
echo "</tbody>";
echo "</table><br>";
//FIN DEL LISTADO
?>

<?php

//Capa formulario modificar
// Formulario para modificar la imagen
if (isset($mensaje)) {
    echo "<p style='color:green'>" . $mensaje . "</p>";
}
$du = $lista_imagenes[0];
?>

<div id='modificar'>
    <div id='caja'>
        <?php
        echo"<a class='cerrar' href='#' onclick='cerrar()'><img class='img-cerrar' src='" .
        base_url("assets/css/cerrar_icon.png") . "'></img></a>";
        ?>
        <h1>Modificar Imagen</h1>
        <!-- CAMPOS DE LA TABLA : id_imagen,  titulo_imagen,  texto_imagen,  url_imagen , fecha -->
        <form enctype="multipart/form-data"  action='<?php echo site_url("imagen/actualizar_imagen"); ?>' method='post'>
            <?php
            echo "<input type='hidden' name='id_imagen' value='" . $du['id_imagen'] . "'><br/>";
            echo "T&iacute;tulo:<input type='text' name='titulo_imagen' value='" . $du['titulo_imagen'] . "'><br/>";
            echo "<br>Texto:<input type='text' name='texto_imagen' value='" . $du['texto_imagen'] . "'><br/>";
            echo '<input type="hidden" name="MAX_FILE_SIZE" value="20000000" />';
            echo "<br>Fecha:<input type='date' name='fecha'  value='" . $du['fecha'] . "'><br/>";
            echo "<br>Imagen:<input type='file' id='imagen' name='imagen'value='" . $du['url_imagen'] . "'><br/>";
            echo "<input type='hidden' name='url_imagen' value='" . $du['url_imagen'] . "'>";
            echo "<img width='100px' src='" . base_url("assets/imagenes/imagenes-hotspots/" . $du['url_imagen']) . "'><br><p>" . $du['url_imagen'] . "</p><br>";
            ?>   
            <input type='submit' name ='actualizar' value = 'Aceptar'>
        </form>
    </div>
</div>


<!--Capa formulario insertar-->
<div id='insertar'>
    <div id='caja'>
        <!-- CAMPOS DE LA TABLA : id_imagen,  titulo_imagen,  texto_imagen,  url_imagen , fecha -->
        <!-- AQUI EMPIEZA LA VISTA -->
        <?php
        echo"<a class='cerrar' href='#' onclick='cerrar()'><img class='img-cerrar' src='" .
        base_url("assets/css/cerrar_icon.png") . "'></img></a>";
        ?>
        <h1>Insertar imagen</h1>
        <form enctype="multipart/form-data" action='<?php echo site_url("imagen/insertar_imagen"); ?>' method="post">
            <input type='hidden' name='accion' value='insertar_imagen'>
            <input id= "id_imagen" name='id_imagen' type ="hidden"><br />
            <label id= "label_titulo" for="titulo">T&iacute;tulo:</label>
            <input type="text" name='titulo_imagen' placeholder="Introduzca el t&iacute;tulo" required><br />
            <label for="texto_imagen">Texto:</label>
            <textarea id="texto_imagen" name='texto_imagen' placeholder="Introduzca la descripci&oacute;n de la imagen"></textarea><br>
            <label for="fecha">Fecha:</label>
            <input type="date" id="fecha" name='fecha' placeholder="Introduzca la fecha" value="<?php echo date("Y-m-d"); ?>" required><br />
            <!-- MAX_FILE_SIZE debe preceder al campo de entrada del fichero -->
            <input type="hidden" name="MAX_FILE_SIZE" value="20000000" />
            <label for="imagen">Imagen:</label>
            <input type="file" name="imagen"  id="imagen" placeholder="Seleccionar la imagen" required><br />
            <input type="hidden" name="accion" value="insertar_imagen"><br>
            <input type="submit" name="enviar" value="Guardar imagen"/>
        </form>
    </div>
</div>

<script>
    function borrar_imagen(id_imagen) {
        if (confirm("¿Estás seguro?")) {
            $.get("<?php echo site_url('imagen/borrar_imagen/'); ?>" + id_imagen, null, respuesta);
        }
    }

    function respuesta(r) {
        if (r == '0') {
            alert("Error al borrar la imagen");
        } else {
            selector = "#imagen-" + r;
            alert("Imagen borrada con éxito");
            $(selector).remove();
        }
    }
    
    function mostrar(capa){
        if (capa == "insertar") {
            $("#insertar").show();     
        }
        if (capa == "modificar") {
            $("#modificar").show();     
        }    
    }



    function cerrar(){
        $("#insertar").hide();
        $("#modificar").hide();
    }  
 
//PAGINACIÓN CON JQUERY LOLI

    $(document).ready(function() {
        $('.tabla').dataTable({
    	"language": {
            "lengthMenu": "Mostrar _MENU_ registros por página",
            "zeroRecords": "No se encontraron resultados en su búsqueda",
            "searchPlaceholder": "Buscar registros",
            "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
            "infoEmpty": "No existen registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "search": "Buscar:",
            "paginate": {
	            "first":    "Primero",
	            "last":    "Último",
	            "next":    "Siguiente",
	            "previous": "Anterior"
	    },
        }
        });
    } );
</script>