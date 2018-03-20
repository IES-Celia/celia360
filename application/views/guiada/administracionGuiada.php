<?php
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
 z-index:100;
}

#modalGuiadaImagen{
z-index:100;
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
    background-color: rgb(0,0,0); 
    background-color: rgba(0,0,0,0.4); 
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

.ordernar{
    padding-left:4px;
    font-size:1.3rem;
    color:black;
}



</style>

<form action='<?php echo site_url("guiada/mostrarFormularioGuiada"); ?>' method="post">
<button class='insert' type='submit'><span class='fa fa-plus-circle'></span>crear Nuevo</button>
<input id='orden' type='hidden' value='asc' name='orden'>
</form>
<table align='center' id='cont'>
    <tr id='cabecera'>
        <th onclick='ordenarTabla("id_visita")'>id_visita<span class='ordernar'>&#8645;</span></th>
        <th onclick='ordenarTabla("cod_escena")'>cod_escena<span class='ordernar'>&#8645;</span></th>
        <th onclick='ordenarTabla("audio_escena")'>audio_escena<span class='ordernar'>&#8645;</span></th>
        <th onclick='ordenarTabla("titulo_escena")'>titulo_escena<span class='ordernar'>&#8645;</span></th>
        <th >imagen preview</th>
        <th>cambiar Imagen</th>
        <th>borrar</th>
        <th>modificar</th>
        <th>Mover</th>
        <th>Posicion</th>
    </tr>
<tbody>
<?php
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
    "<td class='id_visita'>".$escena['id_visita']."</td>
    <td class='cod_escena'>".$escena['cod_escena']."</td>
    <td class='audio_escena'>".$escena['audio_escena']."</td>
    <td class='titulo_escena'>".$escena['titulo_escena']."</td>
    <td><img class='img_preview' style='height:100px; width:auto;' src='".$imagen."'></td>
    <td><button class='change_img'>Cambiar</button></td>
    <td><a data-id='$idEscena' onclick='borrarGuiada(this);'><span class='fa fa-trash'></span></a></td>
    <td><a data-id='$idEscena' onclick='modificarGuiada(this);'><span class='fa fa-edit'></span></a></td>
    <td class='orden'><span onclick='moverFila(this);'>&uarr;</span><br><span onclick='moverFila(this);'>&darr;</span></td>
    <td class='posicion'>".$escena['orden']."</td>";


}
?>
</tbody>
</table>

<div id='modalGuiada' class='modalFondoGuiada'>
    <div class="modal-contenidoGuiada">
        <span class="closeGuiada">&times;</span>
        <h2>Modificar</h2>
        Selecciona una escena:
        <select id='escenaGuiada' name="escenaGuiada">
            <?php 
                foreach ($escenasGuiada as $escena) {
                    $codEscena=$escena["cod_escena"];
                    $nombreEscena=$escena["Nombre"];
                    if(empty($nombreEscena)){
                        echo "<option value=$codEscena>$codEscena</option>";
                    } else {
                        echo "<option value=$codEscena>$nombreEscena</option>";
                    }
                }
            ?>
        </select>
        <br><br>
        Nombre escena:<input id='titulo_escena' type='text' name='tituloGuiada' value='' >
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
    <div class="modal-contenidoGuiada">
        <span class="closeGuiada">&times;</span>
        <h2>Modificar Imagen</h2>
        Selecciona una imagen:
        <form id='guiadaImagen' class="for" enctype="multipart/form-data" action='' method="post">
            <input type="file" name="imagenPreview" placeholder="Seleccionar la imagen" required><br>
            <input type="hidden" name="MAX_FILE_SIZE" value="20000000"/>
            <input type="hidden" name="id_visita" value=""/>
            <input type="submit" value='Enviar'/>
        </form>
        <br><br>
        
    </div>
</div>


<script>

$(".change_img").on("click",function(){
    var codigo = $(this).closest(".filaEscena").find(".id_visita").text();
    $("#modalGuiadaImagen").css("display","block");
    $(".closeGuiada").click(function (e) {  
        $("#modalGuiadaImagen").css("display","none");
    });
    $("input[name='id_visita']").val(codigo);
    var urlCodeIgniter ="<?php echo site_url('guiada/asociarImagenPreview'); ?>";
    $("#guiadaImagen").attr("action",urlCodeIgniter);
});


function modificarGuiada(elemento){

    $("#modalGuiada").css("display","block");
    $(".closeGuiada").click(function (e) {  
        $("#modalGuiada").css("display","none");
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
        if(confirmar){
            var idEscena = $(elemento).attr("data-id");
            codEscena = $("#escenaGuiada").find(":selected").text();
            audioEscena = $("#audioGuiada").find(":selected").text();
            tituloEscena = $("#titulo_escena").val();
            var urlPeticion= "<?php echo base_url("guiada/actualizarEscena");?>";
            var peticion = $.ajax({
                type: "post",
                url: urlPeticion,
                data: {id : idEscena, escena : codEscena , audio : audioEscena , titulo : tituloEscena  }
            });

            peticion.done(function(resultado){
                if(resultado==1){
                    alert("Se ha modificado correctamente");
                    $(elemento).closest(".filaEscena").find(".cod_escena").html(codEscena);
                    $(elemento).closest(".filaEscena").find(".titulo_escena").html(tituloEscena);
                    $(elemento).closest(".filaEscena").find(".audio_escena").html(audioEscena);
                    $("#modalGuiada").css("display","none");
                } else {
                    alert("Error al intentar modificar");
                }
            }); 
        

            $("#titulo_escena").val("");
            $("#escenaGuiada").val($("#escenaGuiada option:first").val());
            $("#audioGuiada").val($("#audioGuiada option:first").val());
        }   
        });
}


function borrarGuiada(elemento){
    var confirmar = confirm("¿Estas seguro que quieres borrar este elemento?");
    if(confirmar){
        var idEscena = $(elemento).attr("data-id");
    var urlPeticion= "<?php echo base_url("guiada/borrarEscena");?>";
    var peticion = $.ajax({
        type: "post",
        url: urlPeticion,
        data: {id : idEscena }
    });

    peticion.done(function(resultado){
        $(elemento).closest(".filaEscena").remove();
    });
    } 
   
}

function ordenarTabla(elemento){
    var valor = $("#orden").val();
    var urlPeticion= "<?php echo base_url("guiada/ordenarTabla");?>";
    var peticion = $.ajax({
        type: "post",
        url: urlPeticion,
        data: {nombreColumna : elemento, orden : valor},
        dataType: "json"
    });

    peticion.done(function(resultado){
        $(".filaEscena").each(function (i, e) {
            $(this).remove();
            
        });    
        
        $.each(resultado, function (i, e) {

            var id_visita = resultado[i]["id_visita"];
            var audio_escena = resultado[i]["audio_escena"];
            var titulo_escena = resultado[i]["titulo_escena"];
            var cod_escena = resultado[i]["cod_escena"];
            var img_preview = resultado[i]["img_preview"];
            img_preview = "<?php echo base_url('assets/imagenes/previews-guiada/');?>"+img_preview;
            
            var filaTabla ="<tr class='filaEscena'><td class='id_visita'>"+
            id_visita+"</td><td class='cod_escena'>"+
            cod_escena+"</td><td class='audio_escena'>"+
            audio_escena+"</td><td class='titulo_escena'>"+
            titulo_escena+"</td><td><img class='img_preview' style='height:100px; width:auto;' src='"+img_preview+"'></td><td><button class='change_img'>Cambiar</button></td><td><a data-id='"+id_visita+"' onclick='borrarGuiada(this);'><span class='fa fa-trash'></span></a></td><td><a data-id='"+id_visita+"' onclick='modificarGuiada(this);'><span class='fa fa-edit'></span></a></td></tr>";
            var htmlTabla = $("#cont").append(filaTabla);

            console.log(htmlTabla);
            
        });


    if(valor == "asc"){
        $("#orden").val("desc");
    }else{
        $("#orden").val("asc");
   }
    });
}

//Boton activar cambios de orden
//Se actica el sortable
//Los mueves todos
//Al finalizar le das a un boton y envia el orden a MYSQL
//Se quita el sortable

function moverFila(elemento){

    var filaA = $(elemento).parent().parent();
    var filaA_identificacion = $(filaA).find(".id_visita").text();
    var filaA_posicion = $(filaA).find(".posicion").text();

        if($(elemento).text()=="↑"){
            //Buscamos el previous filaEscena!
            var filaB = $(filaA).prev();
        } else if($(elemento).text()=="↓"){
            //Buscamos el next filaEscena!
            var filaB = $(filaA).next();
        }

        var filaB_identificacion = $(filaB).find(".id_visita").text();
        var filaB_posicion = $(filaB).find(".posicion").text();
        console.log("1.Antes de hacer nada FILA A(SELECCIONADA) ID Y POSICION "+filaA_identificacion+" / "+filaA_posicion+" |||| FILA B(SUPERIOR O ANTERIOR) ID Y POSICION "+filaB_identificacion+" / "+filaB_posicion);
        if(filaB_identificacion){

            var urlPeticion= "<?php echo base_url("guiada/cambiarFilas");?>";

            var peticion = $.ajax({
                type: "post",
                url: urlPeticion,
                data: {filaAID : filaA_identificacion, filaAPOS : filaA_posicion, filaBID : filaB_identificacion, filaBPOS : filaB_posicion }
            });

            peticion.done(function(resultado){
               
                if(resultado > 0){
                    //Se ha movido con exito, actualizacion visual del cambio
                    var filaA_html = $(filaA).html();
                    var filaB_html = $(filaB).html();
                    $(filaA).empty();
                    $(filaA).append(filaB_html);
                    $(filaB).empty();
                    $(filaB).append(filaA_html);
                    //Cambiar posicion en la tabla
                    var filaAID_cambiada=$(filaA).find(".id_visita").text();
                    var filaAPOS_cambiada=$(filaA).find(".posicion").text();
                    var filaBID_cambiada=$(filaB).find(".id_visita").text();
                    var filaBPOS_cambiada=$(filaB).find(".posicion").text();
                    $(filaA).find(".posicion").text(filaBPOS_cambiada);
                    $(filaB).find(".posicion").text(filaAPOS_cambiada);

                }else {
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