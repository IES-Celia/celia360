<div class="container-fluid">

  <div class="row mt-4">
    <div class="col-md-12">
        <a name="" id="" class="float-right btn btn-primary" href="#" role="button" onclick="mostrar()"><i class='fas fa-plus-circle'></i> Insertar Libro</a>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <table class="table display bg-secondary" id='cont'>
        <thead class="text-center">
          <tr id='cabecera'>
            <th class="align-middle text-center">Id</th>
            <th class="align-middle text-center">Titulo</th>
            <th class="align-middle text-center">Autor</th>
            <th class="align-middle text-center">Editorial</th>
            <th class="align-middle text-center">Lugar de edicion</th>
            <th class="align-middle text-center">Fecha de edicion</th>
            <th class="align-middle text-center">ISBN</th>
            <th class="align-middle text-center">Tipo</th>
            <th class="align-middle text-center">Apaisado</th>
            <th class="align-middle text-center">Modificar</th>
            <th class="align-middle text-center">Páginas</th>
            <th class="align-middle text-center">Eliminar</th>
            <th class="align-middle">Subir</th>
          </tr>
        </thead>
        <tbody>
          <?php
                foreach ($tabla as $usu) {
                    $id = $usu['id_libro'];
                    echo "<tr id='libro".$id."'>
                            <td class='align-middle'>".$usu["id_libro"]."</td>
                            <td class='align-middle' id='titulo_libro_".$id."'>".$usu["titulo"]."</td>
                            <td class='align-middle' id='autor_libro_".$id."'>".$usu["autor"]."</td>
                            <td class='align-middle' id='editorial_libro_".$id."'>".$usu["editorial"]."</td>
                            <td class='align-middle' id='lugar_edicion_".$id."'>".$usu["lugar_edicion"]."</td>
                            <td class='align-middle' id='fecha_edicion_".$id."'>".$usu["fecha_edicion"]."</td>
                            <td class='align-middle' id='isbn_libro_".$id."'>".$usu["ISBN"]."</td>";
                            if($usu["tipo"]==0){
                                echo "<td class='align-middle'>Biblioteca</td>";
                              }else{
                                echo "<td class='align-middle'>Historia</td>";
                              }
                              if($usu["apaisado"]==0){
                                echo "<td class='align-middle'>Normal</td>";
                              }else{
                                echo "<td class='align-middle'>Apaisado</td>";
                              }                            
echo      "<td class='align-middle text-center'>
              <a onclick='mostrarm(".$usu['id_libro'].")'><i class='fa fa-edit text-primary' style='font-size:20px;'></i></a>
            </td>
            <td class='align-middle'>
              <a href='".site_url("/biblioteca/showinsertimg/".$usu["id_libro"])."'><i class='fas fa-file-alt' style='font-size:20px;'></i></a>
            </td>
            <td class='align-middle'>
              <a href='#' onclick='mostrarborrar(".$usu['id_libro'].")'><i title='Eliminar' class='fa fa-trash' aria-hidden='true'></i></a>
            </td>
            <td class='align-middle'>
              <a href='".site_url("/biblioteca/showsubida/".$usu["id_libro"])."'><i class='fa fa-upload' aria-hidden='true'></i></a>
            </td>
          </tr>";
                }
?>
                    </tbody>
                    <tfoot class="text-center">
                        <tr id='cabecera'>
                            <th class='align-middle'>Id</th>
                            <th class='align-middle'>Titulo</th>
                            <th class='align-middle'>Autor</th>
                            <th class='align-middle'>Editorial</th>
                            <th class='align-middle'>Lugar de edicion</th>
                            <th class='align-middle'>Fecha de edicion</th>
                            <th class='align-middle'>ISBN</th>
                            <th class='align-middle'>Tipo</th>
                            <th class='align-middle'>Apaisado</th>
                            <th class='align-middle'>Modificar</th>
                            <th class='align-middle'>Páginas</th>
                            <th class='align-middle'>Eliminar</th>
                            <th class='align-middle'>Subir</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

    </div><!-- Final de container -->

<!--

        Ventanas modales

-->

<!-- Modal modificar -->
<div class="modal fade" id="modificar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modificar libro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo "<form action='".site_url("biblioteca/modifiedLibro/")."' method='post'>"; ?>
            <div class="form-group">
              <label for="titulo">Titulo</label>
              <input type="text" name="titulo" id="modif_titulo" class="form-control" placeholder="" aria-describedby="helpId">
            </div>
            <div class="form-group">
              <label for="autor">Autor</label>
              <input type="text"
                class="form-control" name="autor" id="modif_autor" aria-describedby="helpId" placeholder="" required>
            </div>
            <div class="form-group">
              <label for="editorial">Editorial</label>
              <input type="text"
                class="form-control" name="editorial" id="modif_editorial" aria-describedby="helpId" placeholder="">
            </div>
            <div class="form-group">
              <label for="">Lugar de Edición</label>
              <input type="text"
                class="form-control" name="lugar_edicion" id="modif_lugar_edicion" aria-describedby="helpId" placeholder="">
            </div>
            <div class="form-group">
              <label for="">Fecha de Edicion</label>
              <input type="text"
                class="form-control" name="fecha_edicion" id="modif_fecha_edicion" aria-describedby="helpId" placeholder="">
            </div>
            <div class="form-group">
              <label for="">I S B N</label>
              <input type="text"
                class="form-control" name="ISBN" id="modif_isbn" aria-describedby="helpId" placeholder="">
            </div>
<?php

if($usu["tipo"]==0){
?>
            <div class="form-group">
              <label for="tipo">Tipo</label>
              <select class="form-control" name="tipo" id="form_modif_tipo">
                <option value='0'selected>Biblioteca</option>
                <option value='1'>Historia</option>
              </select>
            </div>
<?php
}else{
?>
            <div class="form-group">
              <label for="tipo">Tipo</label>
              <select class="form-control" name="tipo" id="form_modif_tipo">
                <option value='0'>Biblioteca</option>
                <option value='1'selected>Historia</option>
              </select>
            </div>
<?php
}
if ($usu["apaisado"]==0) {
?>
            <div class="form-group">
              <label for="apaisado">Apaisado</label>
              <select class="form-control" name="apaisado" id="form_modif_tipo">
                <option value='0' selected>No</option>
                <option value='1'>Si</option>
              </select>
            </div>
<?php
}else{
?>
            <div class="form-group">
              <label for="apaisado">Apaisado</label>
              <select class="form-control" name="apaisado" id="form_modif_tipo">
                <option value='0'>No</option>
                <option value='1' selected>Si</option>
              </select>
            </div>
<?php
  }
?>
            <input type='hidden' id='modif_id_libro' name='id_libro'>
            <button type="submit" class="btn btn-success float-right">Enviar</button>
        </form>
      </div>
    </div>
  </div>
</div>   

<!-- Modal eliminar libro -->
<div class="modal fade" id="eliminarLibro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar libro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo "<form action='".site_url("biblioteca/deletelibro")."' method='post'>"; ?>
            <div class="form-group">
              <label for="">¿Desea eliminar el directorio que contiene las imagenes?</label>
              <select class="form-control" name="bcarpeta" id="">
                <option value='0'selected>No</option>
                <option value='1'>Si</option>
              </select>
            </div>
            <input type='hidden' name='id_libro' id='borrar_id_libro'>
            <button type="submit" class="btn btn-success float-right">Eliminar</button>
        </form>
      </div>
    </div>
  </div>
</div>   

<!-- Modal insertar libros -->
<div class="modal fade" id="insertar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar libro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo "<form action='".site_url("biblioteca/insertlibro")."' method='post'>"; ?>
            <div class="form-group">
              <label for="titulo">Titulo</label>
              <input type="text" name="titulo" class="form-control" placeholder="" aria-describedby="helpId">
            </div>
            <div class="form-group">
              <label for="autor">Autor</label>
              <input type="text"
                class="form-control" name="autor" aria-describedby="helpId" placeholder="" required>
            </div>
            <div class="form-group">
              <label for="editorial">Editorial</label>
              <input type="text"
                class="form-control" name="editorial" aria-describedby="helpId" placeholder="">
            </div>
            <div class="form-group">
              <label for="">Lugar de Edición</label>
              <input type="text"
                class="form-control" name="lugar" aria-describedby="helpId" placeholder="">
            </div>
            <div class="form-group">
              <label for="">Fecha de Edicion</label>
              <input type="text"
                class="form-control" name="fecha"aria-describedby="helpId" placeholder="">
            </div>
            <div class="form-group">
              <label for="">I S B N</label>
              <input type="text"
                class="form-control" name="isbn" aria-describedby="helpId" placeholder="">
            </div>
            <div class="form-group">
              <label for="tipo">Tipo</label>
              <select class="form-control" name="tipo" id="">
                <option value='0' selected>Biblioteca</option>
                <option value='1'>Historia</option>
              </select>
            </div>
            <div class="form-group">
              <label for="apaisado">Apaisado</label>
              <select class="form-control" name="apaisado" id="">
                <option value='0'selected >No</option>
                <option value='1'>Si</option>
              </select>
            </div>
            <button type="submit" class="btn btn-success float-right">Insertar</button>
        </form>
      </div>
    </div>
  </div>
</div>   

<script>
        function respuesta(r) {
            if (r == 0) {
                alert("Error");
            } else {
                selector = "#libro" + parseInt(r);
                $(selector).remove();
            }
        }

        //Modificar libro
        function mostrarm(id_libro) {
            titulo = document.getElementById("titulo_libro_" + id_libro).innerHTML;
            autor = document.getElementById("autor_libro_" + id_libro).innerHTML;
            editorial = document.getElementById("editorial_libro_" + id_libro).innerHTML;
            lugar_edicion = document.getElementById("lugar_edicion_" + id_libro).innerHTML;
            fecha_edicion = document.getElementById("fecha_edicion_" + id_libro).innerHTML;
            isbn = document.getElementById("isbn_libro_" + id_libro).innerHTML;
            pasar_id = id_libro;

            $("#modif_titulo").val(titulo);
            $("#modif_autor").val(autor);
            $("#modif_editorial").val(editorial);
            $("#modif_lugar_edicion").val(lugar_edicion);
            $("#modif_fecha_edicion").val(fecha_edicion);
            $("#modif_isbn").val(isbn);
            $("#modif_id_libro").val(pasar_id);

            $("#modificar").modal();
        }

        //Eliminar libro
        function mostrarborrar(id_libro) {
            b_idlibro = id_libro;
            $("#borrar_id_libro").val(b_idlibro);
            $("#idlibroborrar").text(b_idlibro);
            $("#eliminarLibro").modal();
        }

        /*
        function borrarlibro() {
            id_libro = $("borrar_id_libro").val();
            alert(id_libro);
            confirmacion = confirm("¿Estas seguro que desea borrar el libro?");

            if (confirmacion == true)
                $.get("<?php echo base_url('biblioteca/deletelibro/');?>" + id_libro, null, respuesta);

        }
        */

        //Insertar libro
        function mostrar() {
          $("#insertar").modal();
        }

        function alertid(id_libro) {
          alert("EL nombre de la carpeta que contenga el libro debera ser: " + id_libro);
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