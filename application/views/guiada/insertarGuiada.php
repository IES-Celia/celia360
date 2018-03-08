<?php
defined('BASEPATH') OR exit('No se permite el acceso directo al script');
?>


<div id='caja'>
<h1>Insertar escena guiada</h1>
<form action='<?php echo site_url("guiada/insertarEscenaGuiada"); ?>' method="post">
   
    <label for='escenaGuiada'>Selecciona una escena</label>
    <select id='escenaGuiada' name="escenaGuiada">
        <?php 
            foreach ($escenas as $escena) {
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
    <label for='titulo_escena'>Nombre escena</label>
    <input id='titulo_escena' type='text' name='tituloGuiada' value='' >
    <br><br>
    <label for='audioGuiada'>Selecciona un audio</label>
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
</div>


<script>

            $(document).ready(function () {
                $("#escenaGuiada").change(function (e) { 
                    $("#titulo_escena").val($(this).val());
                });
            });

</script>