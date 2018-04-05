<!--
    Este archivo es parte de la aplicación web Celia360. 

    Celia 360 es software libre: usted puede redistribuirlo y/o modificarlo
    bajo los términos de la GNU General Public License tal y como está publicada por
    la Free Software Foundation en su versión 3.
    Celia 360 se distribuye con el propósito de resultar útil,
    pero SIN NINGUNA GARANTÍA de ningún tipo. 
    Véase la GNU General Public License para más detalles.

    Puede obtener una copia de la licencia en <http://www.gnu.org/licenses/>.
-->


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
