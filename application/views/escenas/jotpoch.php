<?php
/*
    Este archivo es parte de la aplicación web Celia360. 

    Celia 360 es software libre: usted puede redistribuirlo y/o modificarlo
    bajo los términos de la GNU General Public License tal y como está publicada por
    la Free Software Foundation en su versión 3.
 
    Celia 360 se distribuye con el propósito de resultar útil,
    pero SIN NINGUNA GARANTÍA de ningún tipo. 
    Véase la GNU General Public License para más detalles.

    Puede obtener una copia de la licencia en <http://www.gnu.org/licenses/>.
*/
// a continuacion nos encontramos con el css de las ventanas modales de la vista audio.
?>
<!DOCTYPE html>
<!-- Esta vista es la que carga el modo especial para introducir hotspots, cambiar pitch/yaw... la joya de la corona -->
<html>
<head>
<meta charset="UTF-8">
<title>Celia Tour</title>
 <!-- Javascript de pannellum framework -->
    <script>
      ruta_base = '<?php echo $redireccion_joptoch; ?>';
	  hotspot_base = "<?php echo $idhotspot; ?>"; 
	  pan_secundario = "<?php echo $panorama_secundario; ?>";
	  cod_escena = "<?php if(isset($cod_escena)) echo $cod_escena[0]['cod_escena']; ?>";

    </script>
    <script src="<?php echo base_url("assets/js/pannellum/src/js/pannellum2.js"); ?>"></script>
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
           <div class="boton_menu" id="botoncico"></div> <!--boton menu --> 
         <div id="titulo_insercion">MODO INSERCIÓN DE HOTSPOT / MODIFICADOR DE COORDENADAS (click derecho para generar una acción)</div> 
         <div class="ctrl" id="fullscreen"></div>
        </div>
	</div>
	
<script type="text/javascript">
escena_base="";


    
$(document).ready(function() {
    // boton de la esquina superior izquierda que nos manda para atrás, posiblemente de algún problema cuando no accedamos aqui desde escenas (hola visita guiada), pero bueno, gl
$("#botoncico").click(function(){
    location.href="<?php echo site_url("escenas");?>"
}); 
    
    // carga el json por ajax y lo prepara para pannellum
  function ayax(){ 
	  var ruta = '';
	  if (pan_secundario != 1){
		  	ruta = '<?php echo base_url("tour/get_json_plataforma/0/".$escenaInicial) ?>';
	  }else{
			ruta = '<?php echo base_url("tour/get_json_plataforma/1/".$escenaInicial) ?>';
		}
		  //es una escena
		$.ajax({
			url: ruta, 
			type: 'GET',
			dataType: 'json',
		}).done(function(data) {
					
			$.each(data.scenes, function(i){
			var escenas = data.scenes[i];
			$.each(escenas.hotSpots, function(j){
				escenas.hotSpots[j].clickHandlerFunc = eval(escenas.hotSpots[j].clickHandlerFunc);
			});
			});
			viewer = pannellum.viewer("panorama", data);
			escena_base = data.default.firstScene;
		}).fail(function() {
			console.log("error");
		})
	}
    // este metodo es el que se le mete a todos los hotspots en este modo especial. Gracias a él cuando clickeemos en un jotpoch en esta vista se abrirá una vista para modificar susodicho hotspot
    function modificarHotspot(hotspotDiv, idjotpoch){
        location.href= "<?php echo site_url("/hotspots/show_update_hotspot/"); ?>"+idjotpoch+"/"+escena_base;
    }

  //boton fullscreen.
  document.getElementById('fullscreen').addEventListener('click', function(e) {
        viewer.toggleFullscreen();
  });
  ayax();
});
    
</script>
    </body>
</html>
