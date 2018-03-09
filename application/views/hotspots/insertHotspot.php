<html>
    <head>
        <title> Insert Hotspot </title>

    </head>
<body>
<h1> Formulario para Insertar Hotspots </h1>
    <div id="botones">
     Pulse el botón correspondiente al hotspot que desea insertar:
        <button class="buttonfor" id="insertarEscena" >Escena</button>
        <button class="buttonfor" id="insertarPanel">Panel</button>
        <button class="buttonfor" id="insertarAudio">Audio</button>
        <button class="buttonfor" id="insertarVideo">Video</button>
        <button class="buttonfor" id="insertarEscaleras">Escaleras</button>
        <button class="buttonfor" id="modificarPitchYaw">Modificar Pitch y Yaw (de esta escena)</button><br><br>
    </div>
<div id="formularios">
    <div id="puntoEscena"> 
        <?php
        echo "<form class='for' action='".   site_url("hotspots/process_insert_scene")   ."' method='get'>"; ?>
            Escena: <input type='text' name='id_scene'  readonly="readonly" value='<?php echo $id_scene ?>'><br> 
            Coordenada Pitch: <input type='text' name='pitch'  readonly="readonly" value=' <?php echo $pitch ?> '><br> 
            Coordenada Yaw: <input type='text' name='yaw'  readonly="readonly" value=' <?php echo $yaw ?> '><br> 
            <input type='hidden' name='cssClass' value='custom-hotspot-salto' readonly="readonly">
            <input type='hidden' name='tipo' value='scene' readonly="readonly">
            <input type='hidden' name='clickHandlerFunc' value='puntos' readonly="readonly">
            <input type='hidden' name='clickHandlerArgs' readonly='readonly'>
            Escena de destino: <input type='text' name='sceneId' readonly='readonly'><br>
            <button id="btn-bajar-piso" type="button">Bajar piso</button>
            <button id="btn-subir-piso" type="button">Subir piso</button>
            <div id="mapa_escena" >
            
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
        echo "<form class='for' action='".site_url("hotspots/process_insert_panel")."' method='get'>"; ?>
            Escena: <input type='text' name='id_scene'  readonly="readonly" value='<?php echo $id_scene ?>'><br> 
            Coordenada Pitch: <input type='text' name='pitch' value='<?php echo $pitch ?>'><br> 
            Coordenada Yaw: <input type='text' name='yaw' value='<?php echo $yaw ?>'><br> 
            cssClass: <input type='text' name='cssClass' value='custom-hotspot-info' readonly="readonly"><br> 
            Tipo: <input type='text' name='tipo' value='info' readonly="readonly"> <br>
            clickHandlerFunc: <input type='text' name='clickHandlerFunc' value='panelInformacion' readonly="readonly"><br> 
            clickHandlerArgs: <input type='text' name='clickHandlerArgs' value='<?php echo $id_hotspot ?>' readonly='readonly'><br> 
            Titulo: <input type='text' name='titulo'><br> 
            Texto:  <input type='text' name='texto'><br> 

            <input type='submit' class="button">
        </form>
    </div>   
    
    <div id="puntoAudio"> 
        <?php
        echo "<form class='for' action='".   site_url("hotspots/process_insert_audio")   ."' method='get'>"; ?>
            Escena: <input type='text' name='id_scene'  readonly="readonly" value='<?php echo $id_scene ?>'><br> 
            Coordenada Pitch: <input type='text' name='pitch' value='<?php echo $pitch ?>'><br> 
            Coordenada Yaw: <input type='text' name='yaw 'value='<?php echo $yaw ?>'><br> 
            cssClass: <input type='text' name='cssClass' value='custom-hotspot-audio' readonly="readonly"><br> 
            Tipo: <input type='text' name='tipo' value='info' readonly="readonly"> <br>
            clickHandlerFunc: <input type='text' name='clickHandlerFunc' value='musica' readonly="readonly"><br> 
            clickHandlerArgs: <input type='text' name='clickHandlerArgs' id='idAudioForm'><br> 


            <input type='submit' class="button">
        </form>
        
        <div id="listaAudios">Capa vacia</div>
    </div>

    <div id="puntoVideo"> 
        <?php
        echo "<form class='for' action='".   site_url("hotspots/process_insert_video")   ."' method='get'>"; ?>
			Escena: <input type='text' name='id_scene'  readonly="readonly" value='<?php echo $id_scene ?>'><br>
            Coordenada Pitch: <input type='text' name='pitch' value='<?php echo $pitch ?>'><br> 
            Coordenada Yaw: <input type='text' name='yaw 'value='<?php echo $yaw ?>'><br> 
            cssClass: <input type='text' name='cssClass' value='custom-hotspot-video' readonly="readonly"><br> 
            Tipo: <input type='text' name='tipo' value='info' readonly="readonly"> <br>
            clickHandlerFunc: <input type='text' name='clickHandlerFunc' value='video' readonly="readonly"><br> 
            clickHandlerArgs: <input type='text' name='clickHandlerArgs' id='idVideoForm'><br> 


            <input type='submit' class="button">
        </form>
        <div id="listaVideos">Capa vacia</div>
    </div>

    <div id="puntoEscaleras"> 
        <?php
        echo "<form class='for' action='".   site_url("hotspots/process_insert_escaleras")   ."' method='get'>"; ?>
            Escena: <input type='text' name='id_scene'  readonly="readonly" value='<?php echo $id_scene ?>'><br> 
            Coordenada Pitch: <input type='text' name='pitch' value=' <?php echo $pitch ?> '><br> 
            Coordenada Yaw: <input type='text' name='yaw' value=' <?php echo $yaw ?> '><br> 
            cssClass: <input type='text' name='cssClass' value='custom-hotspot-escaleras' readonly="readonly"><br> 
            Tipo: <input type='text' name='tipo' value='info' readonly="readonly"> <br>
            clickHandlerFunc: <input type='text' name='clickHandlerFunc' value='escaleras' readonly="readonly"><br> 
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
          location.href= '<?php echo site_url("hotspots/") ?>' + "update_escena_pitchyaw/" + <?php echo $pitch ?> + "/" + <?php echo $yaw ?> + "/" + "<?php echo $id_scene ?>"; 
        });
          
      });
         
    </script> 