<?php
defined('BASEPATH') OR exit('No se permite el acceso directo al script');
?>


<div id='caja2'>
<h1>Insertar escena guiada</h1>
<form action='<?php echo site_url("guiada/insertarEscenaGuiada"); ?>' method="post">
   
    <label for='escenaGuiada'>Selecciona una escena</label>
    <input type="text" id='escenaGuiada' name="escenaGuiada">
    <br>
    <button type="button" id="btn-subir-piso">Subir zona</button>
    <button type="button" id="btn-bajar-piso">Bajar zona</button>
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
                    //$("#titulo_escena").val($(this).val());
                });
            });

</script>