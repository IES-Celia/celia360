<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Celia Tour</title>
 <!-- Javascript de pannellum framework -->
    <script src="<?php echo base_url("assets/js/pannellum/src/js/pannellum.php"); ?>"></script>
	<script src="<?php echo base_url("assets/js/pannellum/src/js/libpannellum.js"); ?>"></script>
    <!-- Css de pannellum framework -->
    <link rel="stylesheet" href="<?php echo base_url("assets/js/pannellum/src/css/pannellum.css");?>"/>
    <link rel="stylesheet" href="<?php echo base_url("assets/css/estilos_pannellum.css");?>">
    <!--librerias JQuery & JQuery ui-->
    <script src="<?php echo base_url("assets/js/jquery.js"); ?>"></script>
    <script src="<?php echo base_url("assets/js/jqueryui/jquery-ui.min.js"); ?>"></script>
    
	<style>
	
	</style>
</head>

<body>
	<div class="contenedor">
		<div id="panorama">   
         <div id="titulo">MODO INSERCCIÓN DE PUNTOS HOTSPOT</div> 
            <input id="escena"><button type="button" onclick="recargarJSON()">Enviar</button>
         <div class="ctrl" id="fullscreen"></div>
        </div>
	</div>
	
<script type="text/javascript">

// meter en json en un string para poder modificarlo   
function recargarJSON(){
   json_contenido='';
   var escena;
   escenaSeleccionada= document.getElementById("escena").value;
        $.ajax({
                url: "<?php echo site_url("conversorbd2json/get_json_plataforma"); ?>",
                dataType: 'json',
                success: function(data){
                  console.log(json_contenido);
                    $.each(data.scenes, function(i){
                        var escenas= data.scenes[i];
                        var enlace= data.scenes[i].panorama;
                        var prueba=enlace.split("/");
                        var cadena = prueba[7].split(".");
                     
                        
                        var nombreEscena = cadena[0];
                        data.scenes[i].panorama = "<?php echo base_url("assets/imagenes/escenas/");?>";
                        data.scenes[i].panorama = data.scenes[i].panorama+nombreEscena+".JPG";
            
                        $.each(escenas.hotSpots, function(j){
                            escenas.hotSpots[j].clickHandlerFunc= eval(escenas.hotSpots[j].clickHandlerFunc);
                            
                        })
                    })
                    
                 console.log(data);
                 viewer = pannellum.viewer('panorama', data );
                 alert("Procede a añadir o modificar puntos") 
                 viewer.loadScene(escenaSeleccionada); 
                },
               error: function(){
                 console.log("ERROR fallo del ajax rico rico");
               }
            });
   /* function cosa(hotspotDiv,args){
        alert(args);
    }
    */
    function modificarHotspot(hotspotDiv, idjotpoch){
        alert("Abrir la vetana de modificación de jotpoch para el jotpoch "+idjotpoch);
        location.href= "<?php echo site_url("/hotspots/show_update_hotspot/"); ?>"+idjotpoch;
        
        //.site_url("/hotspots/show_update_hotspot/".$hotspots['id_hotspot'])

    }

  //boton fullscreen.
  document.getElementById('fullscreen').addEventListener('click', function(e) {
        viewer.toggleFullscreen();
  });
}
</script>
    </body>
</html>