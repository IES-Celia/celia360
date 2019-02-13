<script>
    $(document).ready(function () {

        //utilizamos el evento keyup para coger la información
        //cada vez que se pulsa alguna tecla con el foco en el buscador
        $("#autocompletar").keyup(function () {

            //en info tenemos lo que vamos escribiendo en el buscador
            var info = $(this).val();
            //hacemos la petición al método autocompletar del controlador home 
            //pasando la variable info
            $.post('<?php echo site_url("video/videosajax/");?>' + info, null, function (data) {

                //si el controlador nos devuelve algo
                if (data !== '') {

                    //en el div con clase contenedor mostramos la info
                    //$('.contenedor').show();
                    //$(".contenedor").html(data);
                    $('#cont').empty();
                    $('#cont').html(data);

                } else {

                    $('#cont').empty();
                    $('#cont').html("<strong>No hay datos</strong>");

                }
            })

        })

        //buscamos el elemento pulsado con live y mostramos un alert
        $(".contenedor").find("a").live('click', function (e) {
            e.defaultPrevented;
            $("input[name=autocompletar]").val($(this).text());
            //alert($(this).html());
        })

    });
</script>

<!-- A continuacion nos encontramos al script de javascript ayax, donde mostramos  las ventanas modales, 
    borramos audio por ajax y al final del script ncluimos un plugin para la paginacion y buscador -->

<style type="text/css">
    #modificar {
        display: none;
        z-index: 1;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        border: 3px solid;
        background-color: rgb(0, 0, 0);
        background-color: rgba(0, 0, 0, 0.4);
    }

    #insertar {
        display: none;
        z-index: 1;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        border: 3px solid;
        background-color: rgb(0, 0, 0);
        background-color: rgba(0, 0, 0, 0.4);
    }


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
    <div class="row mt-4">
        <div class="col-md-12">
            <button type="button" class="float-right btn btn-primary" data-toggle="modal" data-target="#insertar_video_modal">
                <i class='fas fa-plus-circle'></i> Insertar Video
            </button>   
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table display bg-secondary" id='cont'>
                <thead>
                    <tr id='cabecera'>
                        <th>ID</th>
                        <th>URL</th>
                        <th>Descripcion</th>
                        <th>Ver video</th>
                        <th>Modificar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
<?php
                foreach ($tabla as $re) {
                    $id=$re["id_vid"];
                    echo'<tr id="contenidovideo'.$id.'"><td id="id_vid'.$id.'">' . $re["id_vid"] . '</td>';
                    echo'<td id="url_vid'.$id.'">' . $re["url_vid"] . '</td>';
                    echo'<td id="desc_vid'.$id.'">' . $re["desc_vid"] . '</td>';
                    echo"<td><a target='_blank' href='". $re["url_vid"] ."'>visitar enlace</a></td>";
                    echo"<td><a onclick='mostrarm(". $re["id_vid"] .")'><i class='fa fa-edit' style='font-size:30px;'></i></a></td>";
                    echo"<td><a href='#' onclick='borrarvid(". $re["id_vid"] .")'><i class='fa fa-trash' style='font-size:30px;'></i></a></td></tr>";
                }
?>
                </tbody>
                <tfoot>
                    <tr id='cabecera'>
                        <th>ID</th>
                        <th>URL</th>
                        <th>Descripcion</th>
                        <th>Ver video</th>
                        <th>Modificar</th>
                        <th>Eliminar</th>
                    </tr>
                </tfoot>
            </table>            
        </div>
    </div>
</div><!-- Final del container -->

<!-- Modal modificar video -->
<div class="modal fade" id="modificar_video_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modificar usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo "<form action='".site_url("video/modificarvideo/" . $id)."' method='post' enctype='multipart/form-data'>"; ?>
            <div class="form-group">
              <label for="url_vid">URL Video</label>
              <input type="text" name="url_vid" id="url" class="form-control" placeholder="" aria-describedby="helpId">
            </div>
            <div class="form-group">
              <label for="desc_vid">Descripcion</label>
              <input type="text" name="desc_vid" id="desc" class="form-control" placeholder="" aria-describedby="helpId">
            </div>
            <input type='hidden' name='id'  id='id'>
            <button type="submit" class="btn btn-primary float-right">Modificar</button>
        </form>
      </div>
    </div>
  </div>
</div>   

<!-- Modal insertar video -->
<div class="modal fade" id="insertar_video_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Insertar Video</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo "<form action='".site_url('/video/insertarvideo')."' method='post' enctype='multipart/form-data'>"; ?>
            <div class="form-group">
              <label for="numeroVideos">Numero de videos</label>
              <input type="number" name="numeroVideos" id="numeroVideos" class="form-control" placeholder="" aria-describedby="helpId" min='0' value='0' onchange='crearCamposInsercion()'>
            </div>
            <div class="form-group">
              <label for="desc">Descripcion</label>
              <input type="text" name="desc" id="desc" class="form-control" placeholder="" aria-describedby="helpId">
            </div>
            <div id="camposInsercion">

            </div>
            <input type='hidden' name='MAX_FILE_SIZE' value='5000000000000'>
            <button type="submit" class="btn btn-primary float-right" id='enviar'>Modificar</button>
        </form>
      </div>
    </div>
  </div>
</div> 
</div><!-- Final del contenedor -->

<script>

    function mostrarm(id) {
        url = "url_vid" + id;
        desc = "desc_vid" + id;
        document.getElementById("url").value = document.getElementById(url).innerHTML;
        document.getElementById("desc").value = document.getElementById(desc).innerHTML;
        document.getElementById("id").value = id;

        $("#modificar_video_modal").modal();
    }

    //confirmacion al borrar
    function borrarvid(id) {
        if (confirm("¿Estás seguro?")) {
            $.get("<?php echo site_url('video/borrarvideo/'); ?>" + id, null, respuesta);
        }
    }

    function respuesta(r) {
        if (r.trim() == "-1") {
            document.getElementById("mensajemenu").innerHTML = "<span id='error_cabecera'>Error al borrar el video</span>";
        } else if (r.trim() == "-2") {
            document.getElementById("mensajemenu").innerHTML = "<span id='error_cabecera'>Ese video está en uso en un hotspot y no se puede borrar</span>";

        } else {

            document.getElementById("mensajemenu").innerHTML = "<span id='mensaje_cabecera'>Borrado con éxito</span>";

            selector = "#contenidovideo" + parseInt(r);

            $(selector).remove();

        }
    }
    function crearCamposInsercion() {
        numeroVideos = document.getElementById("numeroVideos").value;
        $("#camposInsercion").html("");
        
        // var textnode = document.createTextNode("Insertar Video ");
        for (i = 0; i < numeroVideos; i++) {
            //creamos el titulo del campo de insercion 
            var p = document.createElement("p");
            var textnode = document.createTextNode("Insertar Video ");
            p.setAttribute("id", "texto" + i);
            p.appendChild(textnode);
            document.getElementById("camposInsercion").appendChild(p);
            //fin de la creacion del campo de inserción 
            // creamos los campos de insercion de forma dinamica 

            var x = document.createElement("INPUT");
            x.setAttribute("type", "text");
            x.setAttribute("id", "video" + i);
            x.setAttribute("name", "video" + i);
            document.getElementById("camposInsercion").appendChild(x);
            //fin de creacion de campos de insercion

        }
    }

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