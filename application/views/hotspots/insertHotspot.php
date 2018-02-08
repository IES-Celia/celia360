<html>
	<head>

     <script>
        
        
        
         
    </script>   
        
<title> Insert Hotspot </title>
</head>
<body>
    
    
<h1> Formulario para Insertar Hotspots </h1>

<div id="puntoScene"> 
    <?php
    echo "<form action='".   site_url("hotspots/process_insert_hotspot")   ."' method='get'>"; ?>
        Descradasdasdasipción:  <input type='text' name='descripcion'   ><br> 
        Coordenada Pitch: <input type='text' name='pitch' value=' <?php echo $pitch ?> '><br> 
        Coordenada Yaw: <input type='text' name='yaw 'value=' <?php echo $yaw ?> '><br> 
        cssClass: <input type='text' name='cssClass' value='custom-hotspot-salto' readonly="readonly"><br> 
        Tipo: <input type='text' name='tipo' value='scene' readonly="readonly"> <br>
        clickHandlerFunc: <input type='text' name='clickHandlerFunc' value='puntos' readonly="readonly"><br> 
        clickHandlerArgs: <input type='text' name='clickHandlerArgs'><br> 
        sceneId: <input type='text' name='sceneId'><br>
        targetPitch: <input type='text' name='targetPitch' ><br>
        targetYaw: <input type='text' name='targetYaw'><br>
        <input type='submit' class="button">
    </form>
</div>
    
    