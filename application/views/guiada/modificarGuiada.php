<?php
defined('BASEPATH') OR exit('No se permite el acceso directo al script');

?>

<h2>Modificar escena guiada</h2>

<form action='<?php echo site_url("guiada/actualizarEscena"); ?>' method="post">

     
    Selecciona una escena:
    <select name="escena">
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
    Nombre escena:<input id='titulo_escena' type='text' name='titulo' value=''>
    <br><br>
    Selecciona un audio:
    <select name="audio">
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
