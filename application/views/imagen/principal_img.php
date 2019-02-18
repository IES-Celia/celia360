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
    .cerrar {
        position: relative;
        top: 15px;
        left: 44%;

    }

    .img-cerrar {
        width: 20px;
        height: 20px;
    }
    
</style>
<div class="container">
<div class='row mt-4'>
    <div class='col-md-12'>
<?php
defined('BASEPATH') OR exit('No se permite el acceso directo al script');
//formulario para mostrar la tabla imagenes, con sus datos 

//título
//echo '<h1>IMAGEN</h1>';
// CAMPOS DE LA TABLA : id_imagen,  titulo_imagen,  texto_imagen,  url_imagen , fecha
//echo"<a class='insert' onclick='mostrar(\"insertar\",0)' > <i class='fas fa-plus-circle'></i> Insertar imagen </a>"

echo "<a  id='insertarImagen'  class='btn btn-primary   float-right  mb-2'  role='button' data-toggle='modal' data-target='#modalInsertar' onclick='mostrar(\"insertar\",0)'><i class='fas fa-plus-circle'></i>Insertar Imagen</a>";

echo "</div>";
 echo "</div>";
//he quitado la columna texto de la vista, pero sigue en la bd 
//cabecera  <th>Texto</th>
//tabla <td>" . $ima["texto_imagen"] . "</td>
//****************** PAGINACIÓN CON JQUERY LOLI************\\
echo"  
<div class='row '>
<div class='col-md-12 '>";


echo "<table id='cont' class=' table table-hover w-100 bg-secondary'>";
    echo "<thead>";
        echo '<tr id="cabecera">
                <th>Id</th>
                <th>T&iacute;tulo</th>
                <th>Descripción</th>
                <th>Url</th>
                <th>Miniatura</th>
                <th>Fecha</th>
                <th>Modificar Imagen</th>
                <th>Borrar Imagen</th>
            </tr>';
    echo "</thead>";
    echo "<tfoot>";
        echo '<tr id="cabecera">
                <th>Id</th>
                <th>T&iacute;tulo</th>
                <th>Descripción</th>
                <th>Url</th>
                <th>Miniatura</th>
                <th>Fecha</th>
                <th>Modificar Imagen</th>
                <th>Borrar Imagen</th>
            </tr>';
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
                
                echo "<td class='text-center'><a class='text-primary' role='button' onclick='mostrar(\"modificar\", " . $fila . ")' data-toggle='modal' data-target='#modalModificar'><i class='fa fa-edit  ' style='font-size:30px;'></i></a></td>";
 // echo "<td><a class='delete' href='#' onclick='borrar_imagen($fila)'><i class='fa fa-trash' style='font-size:30px;'></i></a></td>";
                echo "<td class='text-center'><a  class='text-primary delete'  role='button' onclick='borrar_imagen($fila)'><i class='fa fa-trash' style='font-size:30px;'></i></a></td>";
            echo "</tr>";
        }
    echo "</tbody>";
echo "</table><br>";
//FIN DEL LISTADO
?>
</div>
</div>
</div>
<?php

//Capa formulario modificar
// Formulario para modificar la imagen
$du = $lista_imagenes[0];
?>

<div id='modificar'>
    <div id='caja'>
        <?php
       
       
       ?>
       <!-- <h1>Modificar Imagen</h1> -->
        <!-- CAMPOS DE LA TABLA : id_imagen,  titulo_imagen,  texto_imagen,  url_imagen , fecha -->
        <form enctype="multipart/form-data" action='<?php echo site_url("imagen/actualizar_imagen"); ?>' method='post'>
           
          
        </form>
        <!-- MODAL MODIFICAR -->
<div class="modal fade" id="modalModificar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modificar Imagen</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form enctype="multipart/form-data" action='<?php  echo site_url("imagen/actualizar_imagen"); ?>' method="post">
        <div class=form-group>
        <input type='hidden' name='id_imagen' id='id_modificar' value=''>
        <label for='titulo'>Título:</label>
        <input type='text' class='form-control' id='titulo_modificar' name='titulo_imagen' value=''>
        </div>
        <div class='form-group'>
        <label for='descripcion'> Descripción: </label>
        <input type='text' class='form-control' id='texto_imagen_modificar' name='descripcion' value=''>
        </div>
        <div class='form-group'>
        <input type="hidden" name="MAX_FILE_SIZE" value="20000000" />
        <label for='fecha'> Fecha: </label>
        <input type='date' class='form-control' id='fecha_modificar' name='fecha'  value=''>
        </div>
        <div class='form-group'>
        <label for='imagen'>Imagen:</label>
        <input type='file' class='form-control-file' id='imagen' name='imagen'value=''>
        </div>
        <div class='form-group'>
        <input type='hidden' name='url_imagen' id='url_modificar' value=''>
            <div class='row mx-auto mt-4'>
                <div class='col-md-8 mx-auto'>
                    <img id='foto_modificar' class='' width='100%' src=''><br><p class='parrafo_modificar'></p>
                    <div id='nombre-archivo-imagen' class='text-center'></div>
                </div>
            </div>
            <input type='submit' name='actualizar' class='btn-success float-right' value='Aceptar'>
        
      </div>
      </form>
    </div>
  </div>
</div>
<!-- FIN MODAL MODIFICAR-->
    </div>
</div>


<!--Capa formulario insertar-->
<div id='insertar'>
    <div id='caja'>
        <!-- CAMPOS DE LA TABLA : id_imagen,  titulo_imagen,  texto_imagen,  url_imagen , fecha -->
        <!-- AQUI EMPIEZA LA VISTA -->
        <?php
      /*  echo"<a class='cerrar' href='#' onclick='cerrar()'><img class='img-cerrar' src='" .
        base_url("assets/css/cerrar_icon.png") . "'></img></a>";*/
        ?>

 <!-- MODAL INSERCION -->
 <div class="modal fade" id="modalInsertar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Insertar Imagen</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form enctype="multipart/form-data" action='<?php  echo site_url("imagen/insertar_imagen"); ?>' method="post">
      <div class=form-group>
      <input type='hidden' name='accion' value='insertar_imagen'>
            <input id="id_imagen" name='id_imagen' type="hidden">
            <label id="label_titulo" for="titulo">T&iacute;tulo:</label>
            <input type="text" class='form-control' name='titulo_imagen' placeholder="Introduzca el t&iacute;tulo" required><br />
            <label for="texto_imagen">Descripción:</label>
           
            <textarea id="texto_imagen" name='texto_imagen'  class='form-control'
                placeholder="Introduzca la descripci&oacute;n de la imagen"></textarea>
            <label for="fecha">Fecha:</label>
            <input type="date" class='form-control' id="fecha" name='fecha' placeholder="Introduzca la fecha"
                value="<?php //echo date("Y-m-d"); ?>" required><br /> 
            <!-- MAX_FILE_SIZE debe preceder al campo de entrada del fichero -->
         
            <input type="hidden" name="MAX_FILE_SIZE" value="20000000" />
            <label for="imagen">Imágenes (puede seleccionar varias):</label>
            <input type="file"  class='form-control-file' name="imagen[]" id="imagen" placeholder="Seleccionar la(s) imagen(es)" required
                multiple><br />
            <input type="hidden" name="accion" value="insertar_imagen"><br>
            <input type="submit" class='btn btn-success float-right' name="enviar" value="Guardar imagen" />
        </form>
       
      </div>
     
    </div>
  </div>
</div>


<!-- FIN MODAL INSERCION -->

            
<script>
    function borrar_imagen(id_imagen) {
        if (confirm("¿Estás seguro?")) {
            $.get("<?php echo site_url('imagen/borrar_imagen/'); ?>" + id_imagen, null, respuesta);
        }
    }

    function respuesta(r) {
        if (r.trim() == "0") {
            document.getElementById("mensajemenu").innerHTML = "<span id='error_cabecera'>Error al borrar la imagen.</span>";
        } else if (r.trim() == "-1") {
            document.getElementById("mensajemenu").innerHTML = "<span id='error_cabecera'>Ésta imagen está en uso en un hotspot y no se puede borrar.</span>";

        } else {

            document.getElementById("mensajemenu").innerHTML = "<span id='mensaje_cabecera'>Imagen borrada con éxito.</span>";

            selector = "#imagen-" + parseInt(r);

            $(selector).remove();

        }
    }
 

    function mostrar(capa, id) {
     

            titulo = $("#imagen-" + id).find(".titulo-img").text();
            texto = $("#imagen-" + id).find(".texto-img").text();
            fecha = $("#imagen-" + id).find(".fecha-img").text();
            url = $("#imagen-" + id).find(".url-img").text();
            nombre = $("#imagen-" + id).find(".nombre-img").text();
            imagen = $("#imagen-" + id).find(".imagen-img").attr("src");//la imagen
           

            $("#titulo_modificar").val(titulo);
            $("#texto_imagen_modificar").val(texto);
            $("#fecha_modificar").val(fecha);
            $("#url_modificar").val(url);
            $("#foto_modificar").attr("src", imagen); //la imagen
            $("#nombre-archivo-imagen").html(url);
            $("#id_modificar").val(nombre);

            
      
    }

  

    //PAGINACIÓN CON JQUERY LOLI
    $(document).ready(function () {
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
                    "first": "Primero",
                    "last": "Último",
                    "next": "Siguiente",
                    "previous": "Anterior"
                },
            }
        });
    });

    
</script>
</div>