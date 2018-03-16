<html>
    <head>
        <title> Insert Hotspot </title>

    </head>
    <style>
    #textoareaPanel{
    outline: none;
    display: block;
    width: 100%;
    padding: 7px;
    margin-bottom: 10px;
    height: 300px;
    overflow-y:scroll;
    font-family:"verdana";
    border: 1px solid grey;
    font-size:0.6rem;
   
    }

     textarea {
   font-family: inherit;
   font-size: inherit;
}
    
    
    </style>
<body>
<h1> Formulario para Insertar Hotspots </h1>
    <div id="botones">
     Pulse el botón correspondiente al hotspot que desea insertar:
        <button class="buttonfor" id="insertarEscena" >Escena</button>
        <button class="buttonfor" id="insertarPanel">Panel</button>
        <button class="buttonfor" id="insertarAudio">Audio</button>
        <button class="buttonfor" id="insertarVideo">Video</button>
        <button class="buttonfor" id="insertarEscaleras">Escaleras</button>
        <button class="buttonfor" id="modificarPitchYaw">Punto hacia donde estará dirigida la cámara al entrar en esta fotografía</button><br><br>
    </div>
<div id="formularios">
    <div id="puntoEscena"> 
        <?php
        echo "<form class='for' action='".   site_url("hotspots/process_insert_scene")   ."' method='get'>"; ?>
            <input type='hidden' name='id_scene'  readonly="readonly" value='<?php echo $id_scene ?>'>
            <input type='hidden' name='pitch'  readonly="readonly" value=' <?php echo $pitch ?> '> 
            <input type='hidden' name='yaw'  readonly="readonly" value=' <?php echo $yaw ?> '> 
            <input type='hidden' name='cssClass' value='custom-hotspot-salto' readonly="readonly">
            <input type='hidden' name='tipo' value='scene' readonly="readonly">
            <input type='hidden' name='clickHandlerFunc' value='puntos' readonly="readonly">
            <input type='hidden' name='clickHandlerArgs' readonly='readonly'>
            Escena de destino (en rojo donde estás, amarillo el seleccionado): <input type='text' name='sceneId' required><br>
            <button id="btn-bajar-piso" type="button">Bajar piso</button>
            <button id="btn-subir-piso" type="button">Subir piso</button>
            <div id="mapa_escena_hotspot" >
            
            <?php
                $indice = 0;

                foreach ($mapa as $imagen) {
                
                
                    
                    echo "<div id='p".$indice."' class='pisos pisos_hotspots' style='background-image: url(".base_url($imagen['url_img']).");'>";
                    
                    foreach ($puntos as $punto) {
                        if($punto['piso']==$indice){
                            if($punto['id_escena'] == $id_scene){
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
            <br>

            <input type='submit' class="button">
        </form>
    </div>

    <div id="puntoPanel"> 
        <?php
        echo "<form class='for' enctype='multipart/form-data' action='".site_url("hotspots/process_insert_panel")."' method='post'>"; ?>
            <input type='hidden' name='id_scene'  readonly="readonly" value='<?php echo $id_scene ?>'> 
            <input type='hidden' name='pitch' value='<?php echo $pitch ?>'>
            <input type='hidden' name='yaw' value='<?php echo $yaw ?>'> 
            <input type='hidden' name='cssClass' value='custom-hotspot-info' readonly="readonly">
            <input type='hidden' name='tipo' value='info' readonly="readonly">
            <input type='hidden' name='clickHandlerFunc' value='panelInformacion' readonly="readonly">
            <input type='hidden' name='clickHandlerArgs' value='<?php echo $id_hotspot ?>' readonly='readonly'> 
            Titulo del panel: <input type='text' name='titulo' required><br> 
            Texto del panel:  <textarea id='textoareaPanel' name="texto" rows="6" cols="50" required></textarea><br>
            <label>seleccionar documento (OPCIONAL)</label>
            <input type="file" name="documento" placeholder="Seleccionar la imagen" required><br>
            <input type="hidden" name="MAX_FILE_SIZE" value="200000000000" />
            <!--
            <select name="documentoPanel">
            <option value="ninguno">ninguno</option>
                <?php 
                    /*foreach ($documentos as $doc) {
                        $documento=$doc["documento_url"];
                        $documentoIdentificador= $doc["id_documento"];
                       
                            echo "<option value=$documento>$documento</option>";
                    }*/
                ?>
            </select>
            <br><br>-->
            <input type='submit' class="button">
        </form>
    </div>   
    
    <div id="puntoAudio"> 
        <?php
        echo "<form class='for' action='".   site_url("hotspots/process_insert_audio")   ."' method='get'>"; ?>
            <input type='hidden' name='id_scene'  readonly="readonly" value='<?php echo $id_scene ?>'>
            <input type='hidden' name='pitch' value='<?php echo $pitch ?>'>
            <input type='hidden' name='yaw' value='<?php echo $yaw ?>'>
            <input type='hidden' name='cssClass' value='custom-hotspot-audio' readonly="readonly">
            <input type='hidden' name='tipo' value='info' readonly="readonly">
            <input type='hidden' name='clickHandlerFunc' value='musica' readonly="readonly">
            ID del audio que se reproducirá al hacer click: <input type='text' name='clickHandlerArgs' id='idAudioForm' required><br> 


            <input type='submit' class="button">
        </form>
        
        <div id="listaAudios">Capa vacia</div>
    </div>

    <div id="puntoVideo"> 
        <?php
        echo "<form class='for' action='".   site_url("hotspots/process_insert_video")   ."' method='get'>"; ?>
			<input type='hidden' name='id_scene'  readonly="readonly" value='<?php echo $id_scene ?>'>
            <input type='hidden' name='pitch' value='<?php echo $pitch ?>'>
             <input type='hidden' name='yaw' value='<?php echo $yaw ?>'>
            <input type='hidden' name='cssClass' value='custom-hotspot-video' readonly="readonly"> 
            <input type='hidden' name='tipo' value='info' readonly="readonly">
            <input type='hidden' name='clickHandlerFunc' value='video' readonly="readonly"><br> 
            ID del video que se reproducirá: <input type='text' name='clickHandlerArgs' id='idVideoForm' required><br> 

            <input type='submit' class="button">
        </form>
        <div id="listaVideos">Capa vacia</div>
    </div>

    <div id="puntoEscaleras"> 
        <?php
        echo "<form class='for' action='".   site_url("hotspots/process_insert_escaleras")   ."' method='get'>"; ?>
            Esto creará un punto de tipo escalera, el cual conecta las distintas zonas
            <input type='hidden' name='id_scene'  readonly="readonly" value='<?php echo $id_scene ?>'><br> 
            <input type='hidden' name='pitch' value=' <?php echo $pitch ?> '><br> 
            <input type='hidden' name='yaw' value=' <?php echo $yaw ?> '><br> 
            <input type='hidden' name='cssClass' value='custom-hotspot-escaleras' readonly="readonly"><br> 
            <input type='hidden' name='tipo' value='info' readonly="readonly"> <br>
            <input type='hidden' name='clickHandlerFunc' value='escaleras' readonly="readonly"><br> 
            <input type='submit' class="button">
        </form>
    </div>

    
</div>

    <script>
      $( document ).ready(function() {
        $("#formularios").children().hide();
          
        $("#insertarEscena").click(function() {
            $("#formularios").children().hide();
            $("#puntoEscena").show();
        });
          
        $("#insertarPanel").click(function() {
            $("#formularios").children().hide();
            $("#puntoPanel").show();
        });
          
        $("#insertarAudio").click(function() {
            $("#formularios").children().hide();
            $("#puntoAudio").show();
            $("#listaAudios").load("<?php echo site_url("audio/obtenerListaAudiosAjax");?>");
        });

         $("#insertarVideo").click(function() {
            $("#formularios").children().hide();
            $("#puntoVideo").show();
            $("#listaVideos").load("<?php echo site_url("video/obtenerListaVideosAjax");?>");
        });
          
        $("#insertarEscaleras").click(function() {
            $("#formularios").children().hide();
            $("#puntoEscaleras").show();
        });
          
        $("#modificarPitchYaw").click(function(){
          var resp = confirm("¿Desea que al entrar en esta escena se mire hacia esta dirección?")
            if(resp)
                location.href= '<?php echo site_url("hotspots/") ?>' + "update_escena_pitchyaw/" + <?php echo $pitch ?> + "/" + <?php echo $yaw ?> + "/" + "<?php echo $id_scene ?>"; 
        });
          
      });
         
    </script> 