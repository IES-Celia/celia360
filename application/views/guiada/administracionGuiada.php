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

</style>

<h2 align='center'>Menu VISITA GUIADA</h2>

<form action='<?php echo site_url("guiada/mostrarFormularioGuiada"); ?>' method="post">
<input type="submit" value="crear Escena" />
</form>
<table align='center' id='cont'>
    <tr id='cabecera'>
        <th>id guiada</th>
        <th>cod escena</th>
        <th>audio escena</th>
        <th>titulo escena</th>
        <th>imagen preview</th>
        <th>borrar</th>
        <th>modificar</th>
    </tr>

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
        $urlFormulario = site_url('guiada/modificarEscena');

    echo "<tr class='filaEscena'>".
    "<td class='id_visita'>".$escena['id_visita']."</td>
    <td class='cod_escena'>".$escena['cod_escena']."</td>
    <td class='audio_escena'>".$escena['audio_escena']."</td>
    <td class='titulo_escena'>".$escena['titulo_escena']."</td>
    <td><img class='img_preview' style='height:100px; width:auto;' src='".$imagen."'></td>
    <td><a data-id='$idEscena' onclick='borrarGuiada(this);'>borrar</a></td>
    <td><a data-id='$idEscena' onclick='modificarGuiada(this);'>modificar</a></td>";


}
?>

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

$(".img_preview").on("click",function(){
    var codigo = $(this).closest(".filaEscena").find(".id_visita").text();
    $("#modalGuiadaImagen").css("display","block");
    $(".closeGuiada").click(function (e) {  
        $("#modalGuiadaImagen").css("display","none");
    });
    $("input[name='id_visita']").val(codigo);
    var urlCodeIgniter ="<?php echo site_url('guiada/asociarImagenPreview'); ?>";
    $("#guiadaImagen").attr("action",urlCodeIgniter);
    alert("AQUI HEMOS TERMINADO");
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

            $("#titulo_escena").val("");
            $("#escenaGuiada").val($("#escenaGuiada option:first").val());
            $("#audioGuiada").val($("#audioGuiada option:first").val());
            
        });
        
    });
   
}

function borrarGuiada(elemento){

    var idEscena = $(elemento).attr("data-id");
    var urlPeticion= "<?php echo base_url("guiada/borrarEscena");?>";
    var peticion = $.ajax({
        type: "post",
        url: urlPeticion,
        data: {id : idEscena }
    });

    peticion.done(function(resultado){
        alert("Borrado");
        $(elemento).closest(".filaEscena").remove();
    });

}

</script>