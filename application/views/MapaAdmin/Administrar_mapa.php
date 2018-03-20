<div id="modalEditar" class="modalMapa" style="display: none;">
    <div id="caja">
        <form action='<?php echo site_url("MapaAdmin/editar_zona"); ?>' method="post" enctype='multipart/form-data'>
            <h1>Editar zona</h1>
            <label for="posicion">Nueva posición</label>
            <input type="number" name="posicion" min="0" max="<?php $maxZonas=count($mapa)-1; echo $maxZonas; ?>">
            <input type="hidden" name="MAX_FILE_SIZE" value="20000000"><br>
            <label for="posicion_inicial">Posición inicial</label>
            <input type="text" name="posicion_inicial" readonly><br>
            <input type="file" name="zona" id="zona" placeholder="Seleccionar la imagen"><br>
            <input type="submit" value="Modificar">
            <input type="button" value="Cerrar">
        </form>
    </div>
</div>
<div id="modalAnadir" class="modalMapa" style="display: none;">
    <div id="caja">
        <form action='<?php echo site_url("MapaAdmin/crear_zona"); ?>' method="post" enctype='multipart/form-data'>
            <h1>Añadir zona</h1>
            <label for="posicion">Posición:</label>
            <input type="number" name="posicion" min="0" max="<?php $maxZonas=count($mapa); echo $maxZonas; ?>">
            <input type="hidden" name="MAX_FILE_SIZE" value="20000000"><br>
            <input type="file" name="zona" id="zona" placeholder="Seleccionar la imagen"><br>
            <input type="submit" value="Añadir">
            <input type="button" value="Cerrar">
        </form>
    </div>
</div>
<div id="modalConfig" style="display: none;">
    <div id="caja">
        <form action='<?php echo site_url("MapaAdmin/update_config"); ?>' method="post" enctype='multipart/form-data'>
            <h1>Modificar Configuración</h1>
            <label for="piso_inicial">Piso inicial</label>
            <input type="number" name="piso_inicial" value="<?php echo $configuracion["piso_inicial"]; ?>" min="0" max="<?php $maxZonas=count($mapa); echo $maxZonas-1; ?>">
            <input type="hidden" name="punto_inicial">
            <input type="hidden" name="escena_inicial">
            <input type="submit" value="Añadir">
            <input type="button" value="Cerrar">
        </form>
        <?php
                echo '<div id="mapa_escena_hotspot">';
                        $indice = 0;
                
                        foreach ($mapa as $imagen) {
                            echo "<div id='zona".$indice."' class='pisos_config' style='display: none; background-image: url(".base_url($imagen['url_img']).");'>";
                        
                        
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
    </div>
</div>


<?php
   echo '<div id="mapa_escena">';
         $indice = 0;
   
         foreach ($mapa as $imagen) {
            echo "<div id='zona".$indice."' class='pisos' style='display: none;'>";
            echo "<img src='".base_url($imagen['url_img'])."'  style='width:100%;height:100%;'>";
           
             foreach ($puntos as $punto) {
               if($punto['piso']==$indice){
               
                 echo "<div id='".$punto['nombre']."' class='puntos' style='left: ".$punto['left_mapa']."%; top: ".$punto['top_mapa']."%;' escena='".$punto['id_escena']."'>
                 <span class='tooltip'>".$punto['id_escena']."</span>
                 </div>";
               
               }
               
             }
           echo "</div>";
           $indice++;
         }
   ?>
   </div>

<div class="botones_mapa">
    <p class="campomapa" id="piso_actual">zona <span>0</span></p>
    <button class="botonmapa" id="btn-subir-piso-admin" >Subir zona</button>
    <button class="botonmapa" id="btn-bajar-piso-admin">Bajar zona</button>
    <button class="botonmapa" id="btn-editar-mapa">Editar zona</button>
    <button class="botonmapa" id="btn-anadir-mapa">Añadir zona</button>
    <button class="botonmapa" id="btn-config-mapa">Config general</button>
    <button class="botonmapa" id="btn-eliminar-mapa">Eliminar zona</button>
</div>

