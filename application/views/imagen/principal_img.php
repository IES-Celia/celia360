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
echo"<a class='insert' onclick='mostrar(\"insertar\",0)' > <i class='fas fa-plus-circle'></i> Insertar imagen </a>";

//he quitado la columna texto de la vista, pero sigue en la bd 
//cabecera  <th>Texto</th>
//tabla <td>" . $ima["texto_imagen"] . "</td>
//****************** PAGINACIÓN CON JQUERY LOLI************\\
echo "<table id='cont' class='display'>";
echo "<thead>";
echo '<tr id="cabecera"><th>Id</th><th>T&iacute;tulo</th><th>Descripción</th><th>Url</th><th>Miniatura</th><th>Fecha</th><th>Modificar Imagen</th><th>Borrar Imagen</th></tr>';
echo "</thead>";
echo "<tfoot>";
echo '<tr id="cabecera"><th>Id</th><th>T&iacute;tulo</th><th>Descripción</th><th>Url</th><th>Miniatura</th><th>Fecha</th><th>Modificar Imagen</th><th>Borrar Imagen</th></tr>';
echo "</tfoot>";
echo "<tbody>";
foreach ($lista_imagenes as $ima) {
    $fila = $ima["id_imagen"];
    $nombre_archivo = $ima["id_imagen"] . "_miniatura.jpg";
    $url_modificar = site_url("imagen/modificar_imagen/") . $ima["id_imagen"];
    $url_borrar = site_url("imagen/borrar_imagen/") . $ima["id_imagen"];

    echo "<tr id='imagen-" . $fila . "'>";
    echo "<td class='nombre-img'>" . $ima["id_imagen"] . "</td>";
    echo "<td class='titulo-img'>" . $ima["titulo_imagen"] . "</td>";
    echo "<td class='texto-img'>" . $ima["texto_imagen"] . "</td>";
    echo "<td class='url-img'>" . $ima["url_imagen"] . "</td>";
    echo "<td class='miniatura' align='center'><a href='" .
    base_url('assets/imagenes/imagenes-hotspots/' . $ima['url_imagen']) . "'><img class='imagen-img' src=\"" .
    base_url('assets/imagenes/imagenes-hotspots/' . $nombre_archivo) . "\"></a></td>";
    echo "<td class='fecha-img'>" . $ima["fecha"] . "</td>";
    
    echo "<td><a href='#' onclick='mostrar(\"modificar\", " . $fila . ")'><i class='fa fa-edit' style='font-size:30px;'></i></a></td>";
    echo "<td><a class='delete' href='#' onclick='borrar_imagen($fila)'><i class='fa fa-trash' style='font-size:30px;'></i></a></td>";
    echo "</tr>";
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
if (isset($error)) {
    echo "<p style='color:red'>" . $error . "</p>";
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
            echo "<input type='hidden' name='id_imagen' id='id_modificar' value=''><br/>";
            echo "T&iacute;tulo:<input type='text' id='titulo_modificar' name='titulo_imagen' value=''><br/>";
            echo "<br>Descripción:<input type='text' id='texto_imagen_modificar' name='texto_imagen' value=''><br/>";
            echo '<input type="hidden" name="MAX_FILE_SIZE" value="20000000" />';
            echo "<br>Fecha:<input type='date' id='fecha_modificar' name='fecha'  value=''><br/>";
            echo "<br>Imagen:<input type='file' id='imagen' name='imagen'value=''><br/>";
            echo "<input type='hidden' name='url_imagen' id='url_modificar' value=''>";
            echo "<img id='foto_modificar' width='100px' src=''><br><p class='parrafo_modificar'></p><br>";
            echo "<div id='nombre-archivo-imagen'></div>";
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
            <label for="texto_imagen">Descripción:</label>
            <textarea id="texto_imagen" name='texto_imagen' placeholder="Introduzca la descripci&oacute;n de la imagen"></textarea><br>
            <label for="fecha">Fecha:</label>
            <input type="date" id="fecha" name='fecha' placeholder="Introduzca la fecha" value="<?php echo date("Y-m-d"); ?>" required><br />
            <!-- MAX_FILE_SIZE debe preceder al campo de entrada del fichero -->
            <input type="hidden" name="MAX_FILE_SIZE" value="20000000" />
            <label for="imagen">Imágenes (puede seleccionar varias):</label>
            <input type="file" name="imagen[]"  id="imagen" placeholder="Seleccionar la(s) imagen(es)" required multiple><br />
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
        if (r == 0) {
            alert("Error al borrar la imagen");
        } else {
            alert("Imagen borrada con éxito");
            selector = "#imagen-" + parseInt(r);
            $(selector).remove();
        }
    }
  
    function mostrar(capa, id){
        if (capa == "insertar") {
            $("#insertar").show();     
        }
        if (capa == "modificar") {
            
           titulo = $("#imagen-"+id).find(".titulo-img").text();
           fecha  = $("#imagen-"+id).find(".fecha-img").text();
           url = $("#imagen-"+id).find(".url-img").text();
           nombre = $("#imagen-"+id).find(".nombre-img").text();
           imagen = $("#imagen-"+id).find(".imagen-img").attr("src");//la imagen

            $("#titulo_modificar").val(titulo);
            $("#fecha_modificar").val(fecha);
            $("#url_modificar").val(url);
            $("#foto_modificar").attr("src",imagen); //la imagen
            $("#nombre-archivo-imagen").html(url);
            $("#id_modificar").val(nombre);
            
            $("#modificar").show();     
        }    
    }

    function cerrar(){
        $("#insertar").hide();
        $("#modificar").hide();
    }  
 
//PAGINACIÓN CON JQUERY LOLI
    $(document).ready(function() {
        $('#cont').dataTable({
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