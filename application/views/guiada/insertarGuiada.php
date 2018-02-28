<?php
defined('BASEPATH') OR exit('No se permite el acceso directo al script');



//GetAllscenes
//GetSceneTitle
//GetAllaudios
//El orden lo hago en la pantalla principal.

?>

<h2>Insertar escena guiada</h2>

<form action='<?php echo site_url("guiada/insertarEscenaGuiada"); ?>' method="post">
    <!--<input type='hidden' name='accion' value='insertarEscenaGuiada'>-->

     
    Selecciona una escena:
    <select id='escenaGuiada' name="escenaGuiada">
        <?php 
            foreach ($escenas as $escena) {
                $codEscena=$escena["cod_escena"];
                $nombreEscena=$escena["Nombre"];
                echo "<option value=$codEscena>$codEscena</option>";
            }
        ?>
    </select>
    <br><br>
    Nombre escena:<input id='titulo_escena' type='text' name='tituloGuiada' value='' >
    <br><br>
    Selecciona un audio:
    <select name="audioGuiada">
        <?php 
            foreach ($audios as $audio) {
                $nombreAudio=$audio["url_aud"];
                echo "<option value=$nombreAudio>$nombreAudio</option>";
            }
        ?>
    </select>
    <br><br>
    <input type="submit" name="enviar"/>
</form>

<script>

            $(document).ready(function () {
                $("#escenaGuiada").change(function (e) { 
                    $("#titulo_escena").val($(this).val());
                });
            });

</script>