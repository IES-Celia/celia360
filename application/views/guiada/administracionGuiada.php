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
    #modalGuiada {
        z-index: 100;
    }

    #modalGuiadaImagen {
        z-index: 100;
    }

    .modalFondoGuiada {
        display: none;
        position: fixed;
        z-index: 99;
        padding-top: 100px;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0, 0, 0);
        background-color: rgba(0, 0, 0, 0.4);
    }

    .modal-contenidoGuiada {
        background-color: #fefefe;
        margin: auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
    }


    .closeGuiada {
        color: #aaaaaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .closeGuiada:hover,
    .closeGuiada:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }

    .ordernar {
        padding-left: 4px;
        font-size: 1.3rem;
        color: black;
    }
</style>

<div class="container">
    <div class="row mt-4 mb-4">
        <div class="col-md-12">
            <form action='<?php echo site_url("guiada/mostrarFormularioGuiada"); ?>' method="post">
                <input id='orden' type='hidden' value='asc' name='orden'>
                <button type="submit" class="btn btn-primary float-right"><i class='fa fa-plus-circle'></i>Crear nuevo</button>
            </form>
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
                        <th>Posición</th>
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

        echo "<tr class='filaEscena'>".
        "<td class='id_visita align-middle'>".$escena['id_visita']."</td>
        <td class='cod_escena align-middle'> <a href='".base_url()."escenas/cargar_escena/".$escena['cod_escena']."/show_insert_hotspot/0"."'>".$escena['cod_escena']."</a></td> 
        <td class='audio_escena align-middle'>
            <audio controls='controls' preload='auto'>
                <source src='" . base_url().$escena['audio_escena'] . "' type='audio/m4a'/>
                <source src='" . base_url().$escena['audio_escena'] . "' type='audio/mp3'/>
            </audio>
        <p class='text-center'>".$escena['audio_escena']."</p>
        </td>
        <td class='titulo_escena text-center align-middle'>".$escena['titulo_escena']."</td>
        <td><img class='img_preview' style='height:100px; width:auto;' src='".$imagen."'></td>
        <td class='align-middle'><a name='' id='boton_guiada' class='btn btn-primary change_img' href='#' role='button'>Cambiar</a></td>
        <td class='text-center align-middle'><a data-id='$idEscena' onclick='borrarGuiada(this);'><span class='fa fa-trash'></span></a></td>
        <td class='text-center align-middle'><a data-id='$idEscena' onclick='modificarGuiada(this);'><span class='fa fa-edit'></span></a></td>
        <td class='orden align-middle text-center'><span class='flecha' onclick='moverFila(this);'><i class='fas fa-angle-up'></i></span><br><span class='flecha' onclick='moverFila(this);'><i class='fas fa-angle-down'></i></span></td>
        <td class='posicion text-midle align-middle text-center'>".$escena['orden']."</td>";

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
                        <th>Mover</th>
                        <th>Posición</th>
                    </tr> 
                </tfoot>
            </table>
        </div>
    </div>
</div>

<div id='modalGuiada' class='modalFondoGuiada'>
    <div id='caja4' class="modal-contenidoGuiada">
        <span class="closeGuiada">&times;</span>
        <h2>Modificar</h2>
        Selecciona una escena:
        <input type="text" id='escenaGuiada' name="escenaGuiada">


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
        <button id="boton_guiada_modificar" id="btn-bajar-piso" type="button">Bajar piso</button>
        <button id="boton_guiada_modificar" id="btn-subir-piso" type="button">Subir piso</button>
        <br><br>
        Titulo escena:<input id='titulo_escena' type='text' name='tituloGuiada' value=''>
        <br><br>
        Selecciona un audio:
        <select id='audioGuiada' name="audioGuiada">
            <?php 
                foreach ($audios as $audio) {
                    $nombreAudio=$audio["url_aud"];
                    echo "<option value=$nombreAudio>$nombreAudio</option>";
                }
            ?>
        </select>
        <br><br>
        <button id='actualizarGuiada' type="button">Enviar</button>
    </div>
</div>


<div id='modalGuiadaImagen' class='modalFondoGuiada'>
    <div id='caja' class="modal-contenidoGuiada">
        <span class="closeGuiada">&times;</span>
        <h2>Modificar Imagen</h2>
        Selecciona una imagen:
        <form id='guiadaImagen' id='caja' enctype="multipart/form-data" action='' method="post">
            <input type="file" name="imagenPreview" placeholder="Seleccionar la imagen" required><br>
            <input type="hidden" name="MAX_FILE_SIZE" value="20000000" />
            <input type="hidden" name="id_visita" value="" />
            <input type="submit" value='Enviar' />
        </form>
        <br><br>

    </div>
</div>


<script>

    $(".change_img").on("click", function () {
        var codigo = $(this).closest(".filaEscena").find(".id_visita").text();
        $("#modalGuiadaImagen").css("display", "block");
        $(".closeGuiada").click(function (e) {
            $("#modalGuiadaImagen").css("display", "none");
        });
        $("input[name='id_visita']").val(codigo);
        var urlCodeIgniter = "<?php echo site_url('guiada/asociarImagenPreview'); ?>";
        $("#guiadaImagen").attr("action", urlCodeIgniter);
    });


    function modificarGuiada(elemento) {

        //TODO:Cargar la tabla aqui.
        $("#escenaGuiada");
        $("#audioGuiada");
        $("#tituloGuiada");

        $("#modalGuiada").css("display", "block");
        $(".closeGuiada").click(function (e) {
            $("#modalGuiada").css("display", "none");
        });
        /*
        window.onclick = function(event) {
            if (event.target == $(".modalFondoGuiada")) {
                $("#modalGuiada").css("display","none");
            }
        }
        */

        $("#actualizarGuiada").on("click", function () {
            var confirmar = confirm("¿Estas seguro que quieres modificarlo?");
            if (confirmar) {
                var idEscena = $(elemento).attr("data-id");
                codEscena = $("#escenaGuiada").find(":selected").text();
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
                    $("#modalGuiada").css("display", "none");
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

    //Boton activar cambios de orden
    //Se actica el sortable
    //Los mueves todos
    //Al finalizar le das a un boton y envia el orden a MYSQL
    //Se quita el sortable

    function moverFila(elemento) {

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

            var urlPeticion = "<?php echo base_url("guiada/cambiarFilas");?>";

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

    }

</script>