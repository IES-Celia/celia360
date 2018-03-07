<div id="modalEditar" class="modalMapa" style="display: none;">
    <form action='<?php echo site_url("MapaAdmin/editar_zona"); ?>' method="post" enctype='multipart/form-data'>
        Nueva posicion<input type="number" name="posicion" min="0" max="<?php $maxZonas=count($mapa)-1; echo $maxZonas; ?>">
        <input type="hidden" name="MAX_FILE_SIZE" value="20000000"><br>
        Posicion inicial<input type="text" name="posicion_inicial" readonly><br>
        <input type="file" name="zona" id="zona" placeholder="Seleccionar la imagen"><br>
        <button type="submit">Actualizar</button>
    </form>
</div>
<div id="modalAnadir" class="modalMapa" style="display: none;">
    <form action='<?php echo site_url("MapaAdmin/editar_zona"); ?>' method="post" enctype='multipart/form-data'>
        Posición:<input type="number" name="posicion" min="0" max="<?php $maxZonas=count($mapa); echo $maxZonas; ?>">
        <input type="hidden" name="MAX_FILE_SIZE" value="20000000"><br>
        <input type="file" name="zona" id="zona" placeholder="Seleccionar la imagen"><br>
        <button type="submit">Añadir</button>
    </form>
</div>
<?php
   echo '<div id="mapa_escena">';
         $indice = 0;
   
          $pisos = array('0' => "sotano", '1' => "primer_piso", "2" => "segundo_piso", "3" => "tercer_piso", "4" => "tejado" );
   
         foreach ($mapa as $imagen) {
             echo "<div id='p".$indice."' class='pisos' style='display: none; background-image: url(".base_url($imagen['url_img']).");'>";
           
           
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
    <p id="piso_actual" style="background: white;">zona <span>0</span></p>
    <button id="btn-subir-piso-admin" >Subir zona</button>
    <button id="btn-bajar-piso-admin">Bajar zona</button>
    <button id="btn-editar-mapa">Editar zona</button>
    <button id="btn-anadir-mapa">Añadir zona</button>
    <button id="btn-eliminar-mapa">Eliminar zona</button>
</div>

