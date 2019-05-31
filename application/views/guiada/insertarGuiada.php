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
<div class="container">
    <h1 class="text-center">Insertar escena guiada</h1>
    <div class="row">
        <div class="col-md-8 mx-auto bg-secondary">
            <form action='<?php echo site_url("guiada/insertarEscenaGuiada/").$id_visita_guiada; ?>' method="post">
                <div class="form-group">
                  <label for="titulo_escena"><h4>Nombre escena</h4></label>
                  <input type="text"
                    class="form-control" name="tituloGuiada" id="titulo_escena" aria-describedby="helpId" placeholder="Nombre de la escena">
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <button type="button" id="btn-subir-piso" class="btn btn-primary">Subir zona</button>
                        <button type="button" id="btn-bajar-piso" class="btn btn-primary">Bajar zona</button>
                    </div>
                </div>
                <h2 class="text-center">Selecciona una escena</h2>
                <div class="row">
                    <div class="col-md-12">
                        <div id="mapa_escena_hotspot">
                        <?php
                            
                            $indice = 0;

                            foreach ($mapa as $imagen) {
                                echo "<div id='zona".$indice."' class='pisos pisos_guiada' style='display: none;'>";
                                echo "<img src='".base_url($imagen['url_img'])."' style='width:100%;'>";
                            
                                foreach ($puntos as $punto) {
                                if($punto['piso']==$indice){
                                
                                    echo "<div id='punto".$punto['id_punto_mapa']."' class='puntos puntos-guiada' style='left: ".$punto['left_mapa']."%; top: ".$punto['top_mapa']."%;' escena='".$punto['id_escena']."'>
                                    <span class='tooltip'>".$punto['id_escena']."</span>
                                    </div>";
                                
                                }
                                
                                }
                            echo "</div>";
                            $indice++;
                            }
                        ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="hidden" id='escenaGuiada' name="escenaGuiada" required>
                            <div class="form-group">
                              <label for="audioGuiada"><h4>Selecciona un audio</h4></label>
                              <select class="form-control" name="audioGuiada">
                                <?php 
                                foreach ($audios as $audio) {
                                    $nombreAudio=$audio["url_aud"];
                                    echo "<option value=$nombreAudio>$nombreAudio</option>";
                                }
                                ?>
                              </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <button type="submit" class="btn btn-success float-right">Enviar</button>
                    </div>
                </div>
            </form>
        </div>
    
    </div><!-- Final de row -->
</div><!-- Final de container -->
