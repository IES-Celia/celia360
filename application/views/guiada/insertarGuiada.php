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


<div id='caja2'>
<h1>Insertar escena guiada</h1>
<form action='<?php echo site_url("guiada/insertarEscenaGuiada"); ?>' method="post">
   
    <label for='titulo_escena'>Nombre escena</label>
    <input id='titulo_escena' type='text' name='tituloGuiada' value=''>
    <br>
    <button type="button" id="btn-subir-piso">Subir zona</button>
    <button type="button" id="btn-bajar-piso">Bajar zona</button>
    <h2>Selecciona una escena</h2>
    <div id="mapa_escena_hotspot">
    <?php
    
    $indice = 0;

    foreach ($mapa as $imagen) {
        echo "<div id='zona".$indice."' class='pisos pisos_guiada' style='display: none;'>";
        echo "<img src='".base_url($imagen['url_img'])."' style='width:100%;'>";
      
        foreach ($puntos as $punto) {
          if($punto['piso']==$indice){
          
            echo "<div id='punto".$punto['id_punto_mapa']."' class='puntos' style='left: ".$punto['left_mapa']."%; top: ".$punto['top_mapa']."%;' escena='".$punto['id_escena']."'>
            <span class='tooltip'>".$punto['id_escena']."</span>
            </div>";
          
          }
          
        }
      echo "</div>";
      $indice++;
    }

    ?>
    </div>
    <br><br>
    <input type="hidden" id='escenaGuiada' name="escenaGuiada" required>
    
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
                    //$("#titulo_escena").val($(this).val());
                });
            });

</script>