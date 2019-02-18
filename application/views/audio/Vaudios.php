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
// a continuacion nos encontramos con el css de las ventanas modales de la vista audio.
?>

<style type="text/css">
		
	  #modificar{
        display:none;
        z-index: 1;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        border: 3px solid ;
        background-color:rgb(0,0,0); 
        background-color:rgba(0,0,0,0.4);
    }

    #insertar{
        display:none;
        z-index: 1;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        border: 3px solid ;
        background-color:rgb(0,0,0); 
        background-color:rgba(0,0,0,0.4);
    }
   

    .cerrar{
        position: relative;
    top:15px;
    left:44%;
    
    }
    .img-cerrar{
         width: 20px; height: 20px;
    }
 

</style>

<div class="container">
    <div class="row">
        <div class="col-md-12 mt-4">
            <a class="btn btn-primary float-right"  role="button" onclick='mostrar()' data-toggle="modal" data-target="#modalInsertarAud"><i class='fas fa-plus-circle'></i> Insertar audio</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
        <table class='table table-hover bg-secondary' id='cont'>
            <thead>
                <tr id='cabecera'>
                    <th>ID</th>
                    <th>URL</th>
                    <th>Descripcion</th>
                    <th>Tipo de audio</th>
                    <th>Reproducir</th>
                    <th>Modificar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tfoot>
                <tr id='cabecera'>
                    <th>ID</th>
                    <th>URL</th>
                    <th>Descripcion</th>
                    <th>Tipo de audio</th>
                    <th>Reproducir</th>
                    <th>Modificar</th>
                    <th>Eliminar</th>
                </tr>
            </tfoot>
            <tbody>
<?php
foreach ($tabla as $re) {
    $id=$re["id_aud"];
    echo'<tr id="contenidoaudio'.$id.'">
            <td id="id_aud'.$id.'">' . $re["id_aud"] . '</td>';
        echo'<td id="url_aud'.$id.'">' . $re["url_aud"] . '</td>';
        echo'<td id="desc_aud'.$id.'">' . $re["desc_aud"] . '</td>';
        echo'<td id="tipo_aud'.$id.'">' . $re["tipo_aud"] . '</td>';
        echo"<td><audio controls='controls' preload='auto'>
            <source src='" . base_url($re["url_aud"]) . "' type='audio/m4a'/>
            <source src='" . base_url($re["url_aud"]) . "' type='audio/mp3'/>
            </audio></td>";
   
    echo "<td class='text-center'><a class='text-primary ' data-toggle='modal' data-target='#modalModificarAud' role='button'  onclick='mostrarm(". $re["id_aud"] .")'><i class='fa fa-edit text-center' style='font-size:30px;'></i></a></td>";
      echo" <td class='text-center'><a class='text-primary'  role='button' onclick='borraraud(". $re["id_aud"] .")'><i class='fa fa-trash' style='font-size:30px;'></i></a></td></tr>";
}
?>
            </tbody>
        </table>
    </div>
</div>
<?php
/*echo "
<div id='modificar'>
	<div id='caja'>
        <a class='cerrar' href='#' onclick='cerrar()'><img class='img-cerrar' src='" . base_url("assets/css/cerrar_icon.png") . "'></img></a>
        <h1>Modificar Audio</h1>
        <form  action='" . site_url("audio/modificaraud/" . $id) . "' method='post' enctype='multipart/form-data'>
                URL audio:<input type='text' name='url_aud' id='url' readonly><br/>
                Descripcion:<input id='desc' type='text' name='desc_aud'  id='desc'><br/>    
                <input type='hidden' name='MAX_FILE_SIZE' value='500000000'> 					
                <input type='hidden' name='id'  id='id'><br/>
                Tipo
                <select name='tipo_aud' id='select'>
                    <option value='v-guiada'>visita guiada</option>
                    <option value='d-objeto'>definir objeto</option>
                </select><br/><br/>
                <input type='submit'> 
        </form>
	</div>
</div>";*/

//Capa (ventana modal) formulario insertar
/*echo"
<div id='insertar'>
<div id='caja'>
<a class='cerrar' href='#' onclick='cerrar()'><img class='img-cerrar' src='" .
                base_url("assets/css/cerrar_icon.png") . "'></img></a>
<h1>Insertar audio</h1>
<form action='". site_url("/audio/insertarAud") ."'  method='Post' enctype='multipart/form-data' >
    Descripcion:<input id='desc' type='text' name='desc'><br/>
	Inserte audio<input type='file' name ='audio[]' id='audio' multiple><br/>
	Tipo<select name='tipo_aud' id='tipo'>
  			<option value='v-guiada'>Visita guiada</option>
 			<option value='d-objeto' selected>Definir un objeto</option>
		</select><br/><br/>
    <input type='submit'>
    
      </form>
	  </div>
</div>";

        
/* A continuacion nos encontramos al script de javascript ayax, donde mostramos  las ventanas modales, borramos audio por ajax y al final del script incluimos un plugin para la paginacion y buscador */
?>


<!-- MODAL DE INSERCION -->
<div class="modal fade" id="modalInsertarAud" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?php
     echo" <form action='".site_url("/audio/insertarAud")."'  method='Post' enctype='multipart/form-data' >";
      ?>
    <div class='form-group'>
    <label for='descripcion'>Descripcion:</label>
    <input id='desc' type='text' name='desc' class="form-control">
    </div>
    <div class='form-group'>
    <label for='audio' >Inserte audio</label>
    <input type='file' class="form-control-file" name ='audio[]' id='audio' multiple>
    </div>
    <div class='form-group'>
    <label for='tipo'>Tipo</label>
    <select name='tipo_aud' id='tipo' class='form-control'>
  			<option value='v-guiada'>Visita guiada</option>
 			<option value='d-objeto' selected>Definir un objeto</option>
		</select>
    </div>
    <div class='form-group'>
    <input type='submit'  class='btn btn-success float-right'>
    </div>
    </div>
   
      </div>
      
    </div>
  </div>
</div>



<!-- FIN MODAL INSERCION -->
<!-- MODAL MODIFICAR -->
<div class="modal fade" id="modalModificarAud" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modificar Audio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?php
     echo"<form  action='".site_url("audio/modificaraud/".$id)."' method='post' enctype='multipart/form-data'>";
      ?>
      <div class='form-group'>
      <label for='urlAud'>URL audio:</label>
      <input type='text' class='form-control text-light' name='url_aud' id='url' readonly>
      </div>
      <div class='form-group'>
      <label for='Descripcion'>Descripcion:</label>
      <input id='descripcion' type='text' name='desc_aud'  class='form-control'>
      </div>
                <input type='hidden' name='MAX_FILE_SIZE' value='500000000'> 					
                <input type='hidden' name='id'  id='id'>
                <div class='form-group'>
                <label for='tipo'>Tipo</label>
                <select name='tipo_aud' id='select' class='form-control'>
                    <option value='v-guiada'>visita guiada</option>
                    <option value='d-objeto'>definir objeto</option>
                </select>
                </div>
                <div class='form-group'>
                <input type='submit' class=' btn btn-success float-right'> 
                </div>
        </form>
	
      </div>
      
    </div>
  </div>
</div>








<!-- FIN MODAL MODIFICAR -->
</div> <!-- cierre del container -->
<script>

    function mostrarm(id){
        url = "url_aud"+id;
        desc = "desc_aud"+id;
        tipo = "tipo_aud"+id;
        
        document.getElementById("url").value = document.getElementById(url).innerHTML;
        document.getElementById("descripcion").value = document.getElementById(desc).innerHTML;
        document.getElementById("select").value = document.getElementById(tipo).innerHTML;
        document.getElementById("id").value = id;
            
        $("#contenedor").show();
        $("#modificar").show();
    }

   
        
    //confirmacion al borrar
    function borraraud(id) {
        if (confirm("¿Estás seguro?")) {
            $.get("<?php echo site_url('audio/borraraud/'); ?>" + id, null, respuesta);
        }
    }

    function respuesta(r) {
        if (r.trim() == "-1") {
			document.getElementById("mensajemenu").innerHTML = "<span id='error_cabecera'>Error al borrar el audio</span>";
		} else if (r.trim() == "-2") {
			document.getElementById("mensajemenu").innerHTML = "<span id='error_cabecera'>Ese audio está en uso en un hotspot y no se puede borrar</span>";
            
        } else {
            
            document.getElementById("mensajemenu").innerHTML = "<span id='mensaje_cabecera'>Borrado con éxito</span>";
			
			selector = "#contenidoaudio"+parseInt(r);
			
            $(selector).remove();
			
        }
    }

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
    });
       
</script>
