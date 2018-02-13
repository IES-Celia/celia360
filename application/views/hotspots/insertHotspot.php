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
        <button id="insertarEscaleras">Escaleras</button><br><br>
    </div>
<div id="formularios">
    <div id="puntoEscena"> 
        <?php
        echo "<form action='".   site_url("hotspots/process_insert_scene")   ."' method='get'>"; ?>
            Coordenada Pitch: <input type='text' name='pitch' value=' <?php echo $pitch ?> '><br> 
            Coordenada Yaw: <input type='text' name='yaw' value=' <?php echo $yaw ?> '><br> 
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
        echo "<form action='".   site_url("hotspots/process_insert_hotspot")   ."' method='get'>"; ?>
            Coordenada Pitch: <input type='text' name='pitch' value=' <?php echo $pitch ?> '><br> 
            Coordenada Yaw: <input type='text' name='yaw 'value=' <?php echo $yaw ?> '><br> 
            cssClass: <input type='text' name='cssClass' value='custom-hotspot-info' readonly="readonly"><br> 
            Tipo: <input type='text' name='tipo' value='info' readonly="readonly"> <br>
            clickHandlerFunc: <input type='text' name='clickHandlerFunc' value='baseDatos' readonly="readonly"><br> 
            clickHandlerArgs: <input type='text' name='clickHandlerArgs' value='aqui un boton para seleccionar las imagenes'><br> 
            Titulo: <input type='text' name='titulo'><br>  // OJEAR
            Descripción:  <input type='text' name='descripcion'   ><br> 

            <input type='submit' class="button">
        </form>
    </div>   
    
    <div id="puntoAudio"> 
        <?php
        echo "<form action='".   site_url("hotspots/process_insert_hotspot")   ."' method='get'>"; ?>
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
            clickHandlerArgs: <input type='text' name='clickHandlerArgs'><br> 


            <input type='submit' class="button">
        </form>
    </div>

    <div id="puntoEscaleras"> 
        <?php
        echo "<form action='".   site_url("hotspots/process_insert_hotspot")   ."' method='get'>"; ?>
            Coordenada Pitch: <input type='text' name='pitch' value=' <?php echo $pitch ?> '><br> 
            Coordenada Yaw: <input type='text' name='yaw 'value=' <?php echo $yaw ?> '><br> 
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
        });
          
        $("#insertarEscaleras").click(function() {
            $("#formularios").children().hide();
            $("#puntoEscaleras").show();
        });
          
        
          
          
      });
         
    </script> 