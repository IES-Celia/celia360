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
  .form-control-tipo{
    display : inline!important;
    width: auto;
  }
</style>
<!-- script para las ventanas modales -->
<script>

    function borrarusuario(idusu) {
        resultado = confirm("¿Desea borrar el usuario?");

        if (resultado) {
            $.get("<?php echo base_url('usuario/borrarusuario/'); ?>" + idusu, null, respuestaBorrado);
        }
    }

    function respuestaBorrado(r) {
        if (r == 0) {
            document.getElementById("mensajemenu").innerHTML = "<span id='mensaje_cabecera'>Ha ocurrido un error en la eliminación</span>";
        }
        else {
            selector = "#usu" + parseInt(r);
            $(selector).remove();
        }
    }

    function modTipo(idusu) {
        nuevoTipo = $("select#tipo_usuario" + idusu).val();
        resultado = confirm("¿Está seguro de que desea modificar el tipo de usuario?");
        if (resultado) {
            //alert("<?php //echo base_url('usuario/modtipo/');?>" + idusu + '/' + nuevoTipo);
            $.get("<?php echo base_url('usuario/modtipo/');?>" + idusu + '/' + nuevoTipo, null, respuestaModtipo);
        }
    }

    function respuestaModtipo(r) {
        if (r == "0") {
            document.getElementById("mensajemenu").innerHTML = "<span id='error_cabecera'>Usuario no modificado</span>";
        }
        else {
            document.getElementById("mensajemenu").innerHTML = "<span id='mensaje_cabecera'>Usuario modificado con éxito</span>";
        }
    }

    function show_modusuario(idusu) {
        email = "email_usuario_" + idusu;
        nick = "nick_usuario_" + idusu;
        nombre = "name_usuario_" + idusu;
        ape = "ape_usuario_" + idusu;
        tipo = "tipo_usuario" + idusu;
        document.getElementById("form_modif_email").value = document.getElementById(email).innerHTML;
        document.getElementById("form_modif_nick").value = document.getElementById(nick).innerHTML;
        document.getElementById("form_modif_nombre").value = document.getElementById(nombre).innerHTML;
        document.getElementById("form_modif_ape").value = document.getElementById(ape).innerHTML;
        aux = document.getElementById(tipo).value;

        if (aux == 1) {
            document.getElementById("form_modif_tipo").selectedIndex = '1';
        } else if (aux == 2) {
            document.getElementById("form_modif_tipo").selectedIndex = '2';
        } else if (aux == 3) {
            document.getElementById("form_modif_tipo").selectedIndex = '3';
        } else {
            document.getElementById("form_modif_tipo").selectedIndex = '0';
        }

        document.getElementById("form_modif_id").value = idusu;

        $('#modificar_usuario_modal').modal();
    }
</script>
<div class="container">
    <div class="row mt-4 mb-4">
        <div class="col-md-12">
            <button type="button" class="float-right btn btn-primary" data-toggle="modal" data-target="#insertar_usuario_modal">
                <i class='fas fa-plus-circle'></i> Insertar Usuario
            </button>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table bg-secondary table-hover" id='cont'>
                <thead class='text-center'>
                    <tr id='cabecera'>
                        <th>Nick</th>
                        <th>Correo</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Tipo</th>
                        <th>Modificar</th>
                        <th>Borrar</th>
                    </tr>
                </thead>
                <tbody>
<?php
foreach ($tablaUsuarios as $usu) {
   $idusu = $usu["id_usuario"];
    echo"<tr id='usu".$idusu."'>
            <td class='align-middle' id='nick_usuario_".$idusu."'>".$usu["nombre_usuario"]."</td>
            <td class='align-middle' id='email_usuario_".$idusu."'>".$usu["email"]."</td>
            <td class='align-middle' id='name_usuario_".$idusu."'>".$usu["nombre"]."</td>
            <td class='align-middle' id='ape_usuario_".$idusu."'>".$usu["apellido"]."</td>";
        if($usu["tipo_usuario"]==0){
            echo "<td class='text-center align-middle'>
                    <div class='form-group'>  
                    <select name='tipo' class='form-control form-control-tipo' id='tipo_usuario".$idusu."'>
                            <option value='0' style='color:red' selected='true' disabled='disabled'>Pendiente asignación</option>
                            <option value='1'>Admin</option>
                            <option value='2'>Mapero</option>
                            <option value='3'>Bibliotecario</option>
                    </select>
                    <a href='#' onclick='modTipo(".$usu["id_usuario"].")'><i class='far fa-arrow-alt-circle-up'></i></a>
                    </div>
                </td>";
        }elseif ($usu["tipo_usuario"]==1) {
            echo "<td class='text-center align-middle'>
                    <div class='form-group'>
                      <select name='tipo' class='form-control form-control-tipo' id='tipo_usuario".$idusu."'>
                              <option value='0' style='color:red' >Pendiente asignación</option>
                              <option value='1' selected='true'>Admin</option>
                              <option value='2'>Mapero</option>
                              <option value='3'>Bibliotecario</option>
                      </select>
                      <a href='#' onclick='modTipo(".$usu["id_usuario"].")'><i class='far fa-arrow-alt-circle-up'></i></a>
                    </div>
                </td>";
        }elseif ($usu["tipo_usuario"]==2) {
           echo "<td class='text-center align-middle'>
                  <div class='form-group'> 
                    <select name='tipo' class='form-control form-control-tipo' id='tipo_usuario".$idusu."'>
                            <option value='0' style='color:red'>Pendiente asignación</option>
                            <option value='1'>Admin</option>
                            <option value='2' selected='true'>Mapero</option>
                            <option value='3'>Bibliotecario</option>
                    </select>
                    <a href='#' onclick='modTipo(".$usu["id_usuario"].")'><i class='far fa-arrow-alt-circle-up'></i></a>
                    </div>
                </td>";
        }elseif ($usu["tipo_usuario"]==3) {
           echo "<td class='text-center align-middle'>
                  <div class='form-group'>
                    <select name='tipo' class='form-control form-control-tipo' id='tipo_usuario".$idusu."'>
                            <option value='0' style='color:red'>Pendiente asignación</option>
                            <option value='1'>Admin</option>
                            <option value='2'>Mapero</option>
                            <option value='3' selected='true'>Bibliotecario</option>
                    </select>
                    <a href='#' onclick='modTipo(".$usu["id_usuario"].")'><i class='far fa-arrow-alt-circle-up fa-2x'></i></a>
                    </div>
                </td>";
        }    
     
    echo"   <td class='text-center align-middle'>
                <a href='#' class='text-primary' onclick='show_modusuario(".$usu["id_usuario"].")'><i class='fa fa-edit fa-2x'></i></a>
            </td>
            <td class='text-center align-middle'>
                <a href='#' class='text-primary' onclick='borrarusuario(".$usu["id_usuario"].")'><i class='fa fa-trash fa-2x'></i></a>
            </td>
        </tr>";
}

?>
                </tbody>
                <tfoot class="text-center">
                    <tr id='cabecera'>
                        <th>Nick</th>
                        <th>Correo</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Tipo</th>
                        <th>Modificar</th>
                        <th>Borrar</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div><!-- Final del container -->

<!-- 

                    VENTANAS MODALES

-->

<!-- Modal modificar -->
<div class="modal fade" id="modificar_usuario_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modificar usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo "<form action='".site_url("usuario/modUsuario")."' method='post'>"; ?>
            <div class="form-group">
              <label for="username">Nombre de usuario</label>
              <input type="text" name="username" id="form_modif_nick" class="form-control" placeholder="" aria-describedby="helpId">
            </div>
            <div class="form-group">
              <label for="pass">Password (en blanco para no modificar)</label>
              <input type="password" name="pass" id="" class="form-control" placeholder="" aria-describedby="helpId">
            </div>
            <div class="form-group">
              <label for="email">Correo</label>
              <input type="text" name="email" id="form_modif_email" class="form-control" placeholder="" aria-describedby="helpId">
            </div>
            <div class="form-group">
              <label for="name">Nombre</label>
              <input type="text" name="nombre" id="form_modif_nombre" class="form-control" placeholder="" aria-describedby="helpId">
            </div>
            <div class="form-group">
              <label for="subname">Apellidos</label>
              <input type="text" name="apellidos" id="form_modif_ape" class="form-control" placeholder="" aria-describedby="helpId">
            </div>
            <div class="form-group">
              <label for="tipo">Tipo de usuario</label>
              <select class="form-control" name="tipo" id="form_modif_tipo">
                    <option value='0' style='color:red'>Pendiente asignación</option>
                    <option value='1'>Admin</option>
                    <option value='2'>Mapero</option>
                    <option value='3'>Bibliotecario</option>
              </select>
            </div>
            <input type='hidden' name='id' id='form_modif_id'>
            <button type="submit" class="btn btn-success float-right">Modificar</button>
        </form>
      </div>
    </div>
  </div>
</div>    

<!-- Modal insertar -->
<div class="modal fade" id="insertar_usuario_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registro de usuarios</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo "<form action='".site_url("usuario/processregisterform")."' method='post'>"; ?>
            <div class="form-group">
              <label for="username">Nombre de usuario</label>
              <input type="text" name="username" id="username" class="form-control" placeholder="" aria-describedby="helpId" required>
            </div>
            <div class="form-group">
              <label for="pass">Password</label>
              <input type="password" name="pass" id="pass" class="form-control" required placeholder="" aria-describedby="helpId">
            </div>
            <div class="form-group">
              <label for="email">Correo</label>
              <input type="text" name="email" id="email" class="form-control" required placeholder="" aria-describedby="helpId">
            </div>
            <div class="form-group">
              <label for="name">Nombre</label>
              <input type="text" name="nombre" id="nombre" class="form-control" required placeholder="" aria-describedby="helpId">
            </div>
            <div class="form-group">
              <label for="subname">Apellidos</label>
              <input type="text" name="apellidos" id="subname" class="form-control" required placeholder="" aria-describedby="helpId">
            </div>
            <div class="form-group">
              <label for="tipo">Tipo de usuario</label>
              <select class="form-control" name="tipo" id="form_modif_tipo">
                    <option value='0' style='color:red'>Pendiente asignación</option>
                    <option value='1'>Admin</option>
                    <option value='2'>Mapero</option>
                    <option value='3'>Bibliotecario</option>
              </select>
            </div>
            <input type='hidden' name='id' id='form_modif_id'>
            <button type="submit" class="btn btn-primary float-right">Insertar</button>
        </form>
      </div>
    </div>
  </div>
</div>    



