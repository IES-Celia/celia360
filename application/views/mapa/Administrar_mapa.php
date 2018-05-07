<div id="modalEditar" class="modalMapa" style="display: none;">
    <div id="caja">
        <form action='<?php echo site_url("mapa/editar_zona"); ?>' method="post" enctype='multipart/form-data'>
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
        <form action='<?php echo site_url("mapa/crear_zona"); ?>' method="post" enctype='multipart/form-data'>
            <h1>Añadir zona</h1>
            <label for="nombre">Nombre de zona</label>
            <input type="text" name="nombre">
            <label for="posicion">Posición:</label>
            <input type="number" name="posicion" min="0" max="<?php $maxZonas=count($mapa); echo $maxZonas; ?>">
            <input type="file" name="zona" id="zona" placeholder="Seleccionar la imagen"><br>
            <input type="submit" value="Añadir">
            <input type="button" value="Cerrar">
        </form>
    </div>
</div>
<div id="modalConfig" style="display: none;">
    <div id="caja">
        <form action='<?php echo site_url("mapa/update_config"); ?>' method="post" enctype='multipart/form-data'>
            <h1>Modificar Configuración</h1>
            <label for="piso_inicial">Zona inicial</label>
            <?php
            if($configuracion!=null){
                
                ?>
                <input type="number" name="piso_inicial" value="<?php echo $configuracion["piso_inicial"]; ?>" min="0" max="<?php $maxZonas=count($mapa); echo $maxZonas-1; ?>">
                <input type="hidden" name="punto_inicial" value="<?php echo $configuracion["punto_inicial"]; ?>">
                <input type="hidden" name="escena_inicial" value="<?php echo $configuracion["escena_inicial"]; ?>">
                <div id="mapa_config_mapa" >
            <?php
            }else{
                ?>                
                <input type="number" name="piso_inicial" value="0" min="0" max="<?php $maxZonas=count($mapa); echo $maxZonas-1; ?>">
                <input type="hidden" name="punto_inicial">
                <input type="hidden" name="escena_inicial">
                <div id="mapa_config_mapa" >
                <?php
            }
                 $indice = 0;

                 foreach ($mapa as $imagen) {
                        echo "<div id='zona".$indice."' class='pisos pisos_config' style='display: none'>";
                    
                    echo "<img src='".base_url($imagen['url_img'])."' style='width:100%;'>";
                    foreach ($puntos as $punto) {
                        if($punto['piso']==$indice){
                            if($punto['id_escena'] == $configuracion['escena_inicial']){
                                echo "<div id='punto".$punto['id_punto_mapa']."' class='punto_inicial' style='left: ".$punto['left_mapa']."%; top: ".$punto['top_mapa']."%;' escena='".$punto['id_escena']."'></div>";
                            }else{
                                echo "<div id='punto".$punto['id_punto_mapa']."' class='puntos' style='left: ".$punto['left_mapa']."%; top: ".$punto['top_mapa']."%;' escena='".$punto['id_escena']."'></div>";
                            }
                        }
                    }
                    echo "</div>";
                    $indice++;
                }
                
            ?>
            </div>
            <input type="submit" value="Añadir">
            <input type="button" value="Cerrar">
        </form>
    </div>
</div>
<?php
   echo '<div id="mapa_escena">';
         $indice = 0;
   
         if (count($mapa) == 0) {
             // No hay aún ningún mapa
             echo "<div class='pisos' style='display: block; align: center; color: white'>Aún no se ha creado ningún mapa.</div>";
         }
         else {
            // Ya existe uno o varios mapas. Vamos a crear cada uno en una capa individual
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
            } // foreach
         } // else
   ?>
   </div>
<?php 
    if(count($mapa)==0){
        ?>
        <div class="botones_mapa">
            <button class="botonmapa" id="btn-anadir-mapa">Añadir zona</button>
            <a href="<?php echo base_url('escenas') ?>"><button class="botonmapa">Volver atras</button></a>
        </div>
        <?php
    }else{
        ?>
        <div class="botones_mapa">
            <p class="campomapa" id="piso_actual">zona <span>0</span></p>
            <button class="botonmapa" id="btn-subir-piso-admin" >Subir zona</button>
            <button class="botonmapa" id="btn-bajar-piso-admin">Bajar zona</button>
            <button class="botonmapa" id="btn-editar-mapa">Editar zona</button>
            <button class="botonmapa" id="btn-anadir-mapa">Añadir zona</button>
            <button class="botonmapa" id="btn-config-mapa">Config general</button>
            <button class="botonmapa" id="btn-eliminar-mapa">Eliminar zona</button>
            <a href="<?php echo base_url('escenas') ?>"><button class="botonmapa">Volver atras</button></a>
        </div>
        <?php
    }
?>


