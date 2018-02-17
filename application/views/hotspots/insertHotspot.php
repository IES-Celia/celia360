<html>
    <head>
        <title> Insert Hotspot </title>

    </head>
<body>
<h1> Formulario para Insertar Hotspots </h1>
    <div id="botones">
     Pulse el botón correspondiente al hotspot que desea insertar:
        <button id="insertarEscena" >Escena</button>
        <button id="insertarPanel">Panel</button>
        <button id="insertarAudio">Audio</button>
        <button id="insertarVideo">Video</button>
        <button id="insertarEscaleras">Escaleras</button>
        <button id="modificarPitchYaw">Modificar Pitch y Yaw (de esta escena)</button><br><br>
    </div>
<div id="formularios">
    <div id="puntoEscena"> 
        <?php
        echo "<form action='".   site_url("hotspots/process_insert_scene")   ."' method='get'>"; ?>
            Escena: <input type='text' name='id_scene'  readonly="readonly" value='<?php echo $id_scene ?>'><br> 
            Coordenada Pitch: <input type='text' name='pitch'  readonly="readonly" value=' <?php echo $pitch ?> '><br> 
            Coordenada Yaw: <input type='text' name='yaw'  readonly="readonly" value=' <?php echo $yaw ?> '><br> 
            cssClass: <input type='text' name='cssClass' value='custom-hotspot-salto' readonly="readonly"><br> 
            Tipo: <input type='text' name='tipo' value='scene' readonly="readonly"> <br>
            clickHandlerFunc: <input type='text' name='clickHandlerFunc' value='puntos' readonly="readonly"><br> 
            clickHandlerArgs: <input type='text' name='clickHandlerArgs'><br> 
            sceneId: <input type='text' name='sceneId' value='aqui para seleccionar la imagen, un listado o como se vea'><br>
            targetPitch: <input type='text' name='targetPitch' ><br>
            targetYaw: <input type='text' name='targetYaw'><br>
            
            <input type='submit' class="button">
        </form>
    </div>

    <div id="puntoPanel"> 
        <?php
        echo "<form action='".site_url("hotspots/process_insert_panel")."' method='get'>"; ?>
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
        echo "<form action='".   site_url("hotspots/process_insert_audio")   ."' method='get'>"; ?>
            Escena: <input type='text' name='id_scene'  readonly="readonly" value='<?php echo $id_scene ?>'><br> 
            Coordenada Pitch: <input type='text' name='pitch' value=' <?php echo $pitch ?> '><br> 
            Coordenada Yaw: <input type='text' name='yaw 'value=' <?php echo $yaw ?> '><br> 
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
        echo "<form action='".   site_url("hotspots/process_insert_hotspot")   ."' method='get'>"; ?>
            Coordenada Pitch: <input type='text' name='pitch' value=' <?php echo $pitch ?> '><br> 
            Coordenada Yaw: <input type='text' name='yaw 'value=' <?php echo $yaw ?> '><br> 
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
        echo "<form action='".   site_url("hotspots/process_insert_escaleras")   ."' method='get'>"; ?>
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
          
        $("modificarPitchYaw").click(function(){
          // location.href= <?php echo site_url("/hotspots/") ?> + "update_escena_pitchyaw/" + <?php echo $pitch ?> + "/" + <?php echo $yaw ?> + "/"; 
        });
          
      });
         
    </script> 