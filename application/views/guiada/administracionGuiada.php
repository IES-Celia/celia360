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

if (isset($error)) {
	echo "<p style='color:red'>".$error."</p>";
}
if (isset($mensaje)) {
	echo "<p style='color:blue'>".$mensaje."</p>";
}

$urlFormulario = site_url('guiada/modificarEscena');
    
?>
<script src="<?php echo base_url("assets/js/jqueryui/jquery-ui.js"); ?>"></script>
<style>
    #modalGuiada{
        display : none;
	}
	
	.placeholder{
		height: 100px;
		background-color:black;
		opacity: 0.5;
		border: 3px dotted white;
	}
</style>
<div class="container">
    <div class="row mt-4 mb-4">
        <div class="col-md-12">
            <form action='<?php echo site_url("guiada/mostrarFormularioGuiada"); ?>' method="post">
				<input id='orden' type='hidden' value='asc' name='orden'>
                <button type="submit" class="btn btn-primary float-right"><i class='fa fa-plus-circle'></i> Crear nuevo</button>
			</form>
			<button class=" mr-2 btn btn-success btnEnviar float-right" style='display:none;'>Aceptar los cambios</button>
        </div>
    </div>
    <div class="row">    
        <div class="col-md-12">
            <table class="table bg-secondary" id='cont'>
                <thead class="text-center">
                    <tr id='cabecera'>
                        <th>
                            <!--onclick='ordenarTabla("id_visita")'-->ID
                            <!--<span class='ordernar'>&#8645;</span>-->
                        </th>
                        <th>
                            <!--onclick='ordenarTabla("cod_escena")'-->Cod Escena
                            <!--<span class='ordernar'>&#8645;</span>-->
                        </th>
                        <th>
                            <!--onclick='ordenarTabla("audio_escena")'-->Audio asociado
                            <!--<span class='ordernar'>&#8645;</span>-->
                        </th>
                        <th>
                            <!--onclick='ordenarTabla("titulo_escena")'-->Título escena
                            <!--<span class='ordernar'>&#8645;</span>-->
                        </th>
                        <th>Imagen</th>
                        <th>Cambiar imagen</th>
                        <th>Borrar</th>
                        <th>Modificar</th>
                        <th>Mover</th>
                    </tr>
                </thead>
                <tbody>
<?php
if (count($escenas) == 0) {
    echo "<tr><td colspan='10'>No hay registros para mostrar.</td></tr>";
}
else {
    foreach ($escenas as $escena) {
        if(empty($escena["img_preview"])){
            //Quitarlo en un futuro no muy lejano
            $imagen="vacio";
        } else{
            $imagen=$escena["img_preview"];
            $imagen = base_url('assets/imagenes/previews-guiada/').$imagen;
        }
        
        $idEscena =$escena['id_visita'];

echo "<tr class='filaEscena'>
        <td class='id_visita align-middle'>".$escena['id_visita']."</td>
        <td class='cod_escena align-middle'> 
            <a href='".base_url()."escenas/cargar_escena/".$escena['cod_escena']."/show_insert_hotspot/0"."'>".$escena['cod_escena']."</a>
        </td> 
        <td class='audio_escena align-middle'>
            <audio controls='controls' preload='auto'>
                <source src='" . base_url().$escena['audio_escena'] . "' type='audio/m4a'/>
                <source src='" . base_url().$escena['audio_escena'] . "' type='audio/mp3'/>
            </audio>
            <p class='text-center'>".$escena['audio_escena']."</p>
        </td>
        <td class='titulo_escena text-center align-middle'>".$escena['titulo_escena']."</td>
        <td>
            <img class='img_preview' style='height:100px; width:auto;' src='".$imagen."'>
        </td>
        <td class='align-middle'>
            <a name='' id='boton_guiada' class='btn btn-primary change_img' href='#' role='button' data-toggle='modal' data-target='#modalGuiadaImagen'>Cambiar</a>
        </td>
        <td class='text-center align-middle'>
            <a data-id='$idEscena' onclick='borrarGuiada(this)' class='text-primary'><i class='fa fa-trash fa-2x'></i></a>
        </td>
        <td class='text-center align-middle'>
            <a data-id='$idEscena' onclick='modificarGuiada(this)' class='text-primary'>
                <i class='fa fa-edit fa-2x'></i>
            </a>
        </td>
        <td class='orden align-middle text-center'>
            MOVER
        <td class='posicion text-midle align-middle text-center' style='display:none;'>".$escena['orden']."</td>";
    }
} // else
?>

                </tbody>
                <tfoot class="text-center">
                    <tr id='cabecera'>
                        <th>
                            <!--onclick='ordenarTabla("id_visita")'-->ID
                            <!--<span class='ordernar'>&#8645;</span>-->
                        </th>
                        <th>
                            <!--onclick='ordenarTabla("cod_escena")'-->Cod Escena
                            <!--<span class='ordernar'>&#8645;</span>-->
                        </th>
                        <th>
                            <!--onclick='ordenarTabla("audio_escena")'-->Audio asociado
                            <!--<span class='ordernar'>&#8645;</span>-->
                        </th>
                        <th>
                            <!--onclick='ordenarTabla("titulo_escena")'-->Título escena
                            <!--<span class='ordernar'>&#8645;</span>-->
                        </th>
                        <th>Imagen</th>
                        <th>Cambiar imagen</th>
                        <th>Borrar</th>
                        <th>Modificar</th>
                    </tr> 
                </tfoot>
            </table>
        </div>
    </div>
</div>

<!-- Modal modificar -->

<div class="modal fade" id="modalGuiada" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modificar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="escenaGuiada">Selecciona una escena:</label>
          <input type="text"
            class="form-control bg-white" readOnly name="escenaGuiada" id="escenaGuiada" aria-describedby="helpId" placeholder="">
        </div>
        <div id="mapa_guiada">
            <?php
            
                 $indice = 0;

                 foreach ($mapa as $imagen) {
                    if($indice == 0)
                        echo "<div id='zona".$indice."' class='pisos pisos_guiada'>";
                    else 
                        echo "<div id='zona".$indice."' class='pisos pisos_guiada' style='display: none'>";
                    
                    echo "<img src='".base_url($imagen['url_img'])."' style='width:100%;'>";
                    foreach ($puntos as $punto) {
                        if($punto['piso']==$indice){
                            if($punto['id_escena'] == $configuracion['escena_inicial']){
                                echo "<div id='punto".$punto['id_punto_mapa']."' class='punto_inicial' style='left: ".$punto['left_mapa']."%; top: ".$punto['top_mapa']."%;' escena='".$punto['id_escena']."'></div>";
                            }else{
                                echo "<div id='punto".$punto['id_punto_mapa']."' class='puntos' style='left: ".$punto['left_mapa']."%; top: ".$punto['top_mapa']."%;' escena='".$punto['id_escena']."'></div>";
                            }
                        }
                    }
                    echo "</div>";
                    $indice++;
                }
                
            ?>
        </div>
        <div class="row mt-4">
            <div class="col-md-12 text-center">
                <button id="btn-bajar-piso" class="btn btn-primary">Bajar piso</button>
                <button id="btn-subir-piso" class="btn btn-primary">Subir piso</button>
            </div>
        </div>
        <div class="form-group">
          <label for="tituloGuiada">Titulo escena</label>
          <input type="text"
            class="form-control" name="tituloGuiada" id="titulo_escena" aria-describedby="helpId" placeholder="">
        </div>
        <div class="form-group">
          <label for="">Selecciona un audio</label>
          <select class="form-control" name="audioGuiada" id="audioGuiada">
            <?php 
                foreach ($audios as $audio) {
                    $nombreAudio=$audio["url_aud"];
                    echo "<option value=$nombreAudio>$nombreAudio</option>";
                }
            ?>
          </select>
        </div>
        <div class="row">
            <div class="col-md-12">
                <button id='actualizarGuiada' type="button" class="btn btn-primary float-right">Enviar</button>
            </div>
        </div>
      </div>
    </div>
  </div>
</div> 

<!-- Modal modificar imagen-->

<div class="modal fade" id="modalGuiadaImagen" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modificar Imagen</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id='guiadaImagen' id='caja' enctype="multipart/form-data" action='' method="post">
            <div class="form-group">
                <label for=""><h4>Selecciona una imagen</h4></label>
                <input type="file" class="form-control-file" name="imagenPreview" id="" placeholder="" aria-describedby="fileHelpId" required>
            </div>
            <input type="hidden" name="MAX_FILE_SIZE" value="20000000" />
            <button type="submit" class="btn btn-primary float-right">Enviar</button>
        </form>
      </div>
    </div>
  </div>
</div>    

<script>

    $(".change_img").on("click", function () {
        var codigo = $(this).closest(".filaEscena").find(".id_visita").text();
        $("#modalGuiadaImagen").modal()
        $(".closeGuiada").click(function (e) {
            $("#modalGuiadaImagen").modal("hide");
        });
        $("input[name='id_visita']").val(codigo);
        var urlCodeIgniter = "<?php echo site_url('guiada/asociarImagenPreview'); ?>";
        $("#guiadaImagen").attr("action", urlCodeIgniter);
    });


    function modificarGuiada(elemento) {

        $("#modalGuiada").modal();

		$("#titulo_escena").val($(elemento).parent().parent().find('.titulo_escena').text()); 
		$('#escenaGuiada').val($(elemento).parent().parent().find('.cod_escena').children().text())
        
		
		$("#actualizarGuiada").on("click", function () {
            var confirmar = confirm("¿Estas seguro que quieres modificarlo?");
            if (confirmar) {
                var idEscena = $(elemento).attr("data-id");
                codEscena = $("#escenaGuiada").val();
                audioEscena = $("#audioGuiada").find(":selected").text();
                tituloEscena = $("#titulo_escena").val();
                var urlPeticion = "<?php echo base_url("guiada/actualizarEscena");?>";
                var peticion = $.ajax({
                    type: "post",
                    url: urlPeticion,
                    data: { id: idEscena, escena: codEscena, audio: audioEscena, titulo: tituloEscena }
                });
            }

            peticion.done(function (resultado) {
                if (resultado == 1) {
                    alert("Se ha modificado correctamente");
                    $(elemento).closest(".filaEscena").find(".cod_escena").html(codEscena);
                    $(elemento).closest(".filaEscena").find(".titulo_escena").html(tituloEscena);
                    $(elemento).closest(".filaEscena").find(".audio_escena").html(audioEscena);
                    $("#modalGuiada").modal("hide");
                } else {
                    alert("Error al intentar modificar");
                }
            });


            $("#titulo_escena").val("");
            $("#escenaGuiada").val($("#escenaGuiada option:first").val());
            $("#audioGuiada").val($("#audioGuiada option:first").val());

        });
    }


    function borrarGuiada(elemento) {
        var confirmar = confirm("¿Estas seguro que quieres borrar este elemento?");
        if (confirmar) {
            var idEscena = $(elemento).attr("data-id");
            var urlPeticion = "<?php echo base_url("guiada/borrarEscena");?>";
            var peticion = $.ajax({
                type: "post",
                url: urlPeticion,
                data: { id: idEscena }
            });

            peticion.done(function (resultado) {
                $(elemento).closest(".filaEscena").remove();
            });
        }

    }

    function ordenarTabla(elemento) {
        var valor = $("#orden").val();
        var urlPeticion = "<?php echo base_url("guiada/ordenarTabla");?>";
        var peticion = $.ajax({
            type: "post",
            url: urlPeticion,
            data: { nombreColumna: elemento, orden: valor },
            dataType: "json"
        });

        peticion.done(function (resultado) {
            $(".filaEscena").each(function (i, e) {
                $(this).remove();

            });

            $.each(resultado, function (i, e) {

                var id_visita = resultado[i]["id_visita"];
                var audio_escena = resultado[i]["audio_escena"];
                var titulo_escena = resultado[i]["titulo_escena"];
                var cod_escena = resultado[i]["cod_escena"];
                var img_preview = resultado[i]["img_preview"];
                img_preview = "<?php echo base_url('assets/imagenes/previews-guiada/');?>" + img_preview;

                var filaTabla = "<tr class='filaEscena'><td class='id_visita'>" +
                    id_visita + "</td><td class='cod_escena'>" +
                    cod_escena + "</td><td class='audio_escena'>" +
                    audio_escena + "</td><td class='titulo_escena'>" +
                    titulo_escena + "</td><td><img class='img_preview' style='height:100px; width:auto;' src='" + img_preview + "'></td><td><button class='change_img'>Cambiar</button></td><td><a data-id='" + id_visita + "' onclick='borrarGuiada(this);'><span class='fa fa-trash'></span></a></td><td><a data-id='" + id_visita + "' onclick='modificarGuiada(this);'><span class='fa fa-edit'></span></a></td></tr>";
                var htmlTabla = $("#cont").append(filaTabla);

                console.log(htmlTabla);

            });


            if (valor == "asc") {
                $("#orden").val("desc");
            } else {
                $("#orden").val("asc");
            }
        });
    }

	/* DRAG DROP */

	$(document).ready(e => {
		var ordenArray = []; //guardo el orden
            $('td.posicion').each(function(index) {
               ordenArray[index] = index;
        	});

			console.log(ordenArray);

		
			$( "table tbody" ).sortable({
			placeholder: "placeholder"
		});

		$( "table tbody" ).disableSelection();



  

  $( "tbody" ).droppable({
        drop: function( event, ui ) {
            $('.btnEnviar').css('display','block');
        }
    });
		var arrayDatos = []; // guardo el idvisita
		$('.btnEnviar').click(function(){
                $('td.id_visita').each(function(index){
                    arrayDatos[index] = $(this).text();
                });

                ordenArray.sort(function(a, b){
					return a-b;
					});

                $('td.posicion').each(function(index) {
                    $(this).text(ordenArray[index]);
                });


				url = "<?php echo base_url('guiada/cambiarFilas'); ?>";
				
				$.post(url, {idArray: arrayDatos, orden: ordenArray},function(data){
					if (data > 0){
						$('#error_cabecera').html('');
						$('#mensaje_cabecera').html("<div class='alert alert-success' role='alert' ><h7 class='mr-2'>Orden modificado</h7><i class='far fa-check-circle'></i></div>");
						$('.btnEnviar').css('display','none');

					}else{
						$('#mensaje_cabecera').html('');
						$('#error_cabecera').html("<div class='alert alert-danger' role='alert' ><h7 class='mr-2'>Error al modificar el orden</h7><i class='far fa-check-circle'></i></div>");
						$('.btnEnviar').css('display','none');
					}
				});
        	});


		});



				/* FIN DRAG DROP */

    //Boton activar cambios de orden
    //Se actica el sortable
    //Los mueves todos
    //Al finalizar le das a un boton y envia el orden a MYSQL
    //Se quita el sortable

    /*function moverFila(elemento) {

        var filaA = $(elemento).parent().parent();
        var filaA_identificacion = $(filaA).find(".id_visita").text();
        var filaA_posicion = $(filaA).find(".posicion").text();
        var prueba = $(elemento).find("svg").attr("data-icon");
        if ($(elemento).find("svg").attr("data-icon") == "angle-up") {
            //Buscamos el previous filaEscena!
            var filaB = $(filaA).prev();
        } else if ($(elemento).find("svg").attr("data-icon") == "angle-down") {
            //Buscamos el next filaEscena!
            var filaB = $(filaA).next();
        }

        var filaB_identificacion = $(filaB).find(".id_visita").text();
        var filaB_posicion = $(filaB).find(".posicion").text();

        if (filaB_identificacion) {

            var urlPeticion = "<?php // echo base_url("guiada/cambiarFilas");?>";

            var peticion = $.ajax({
                type: "post",
                url: urlPeticion,
                data: { filaAID: filaA_identificacion, filaAPOS: filaA_posicion, filaBID: filaB_identificacion, filaBPOS: filaB_posicion }
            });

            peticion.done(function (resultado) {

                if (resultado > 0) {
                    //Se ha movido con exito, actualizacion visual del cambio
                    var filaA_html = $(filaA).html();
                    var filaB_html = $(filaB).html();
                    $(filaA).empty();
                    $(filaA).append(filaB_html);
                    $(filaB).empty();
                    $(filaB).append(filaA_html);
                    //Cambiar posicion en la tabla
                    var filaAID_cambiada = $(filaA).find(".id_visita").text();
                    var filaAPOS_cambiada = $(filaA).find(".posicion").text();
                    var filaBID_cambiada = $(filaB).find(".id_visita").text();
                    var filaBPOS_cambiada = $(filaB).find(".posicion").text();
                    $(filaA).find(".posicion").text(filaBPOS_cambiada);
                    $(filaB).find(".posicion").text(filaAPOS_cambiada);

                } else {
                    //Error, comunicar de forma visual que no se ha podido mover
                    console.log("Error al intentar mover la fila");
                }
            });
        } else {
            //No se puede mover en esa direccion por que no hay nada.
            console.log("there is nothing there, sorry bud!");
        }

        //&uarr;
        //&darr;

    }*/

</script>
