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
         <div class="ctrl" id="fullscreen"></div>
        </div>
	</div>
	
<script type="text/javascript">
$(document).ready(function() {
  function ayax(){
    $.ajax({
        url: '<?php echo base_url("conversorbd2json/get_json_plataforma/".$escenaInicial) ?>',
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
        
    }).fail(function() {
        console.log("error");
    })

    /*$.ajax({
      url: "<?php echo base_url("conversorbd2json/get_json_plataforma/p1p4") ?>",
      dataType: 'json',
      success: function(data){
        viewer = pannellum.viewer("panorama", data);
        viewer.loadScene(data.default.firstScene);
      },
      error: function(){
        console.log("ERROR fallo del ajax rico rico");
      }
    });*/
} 
        
        
   /* function cosa(hotspotDiv,args){
        alert(args);
    }
    */
    function modificarHotspot(hotspotDiv, idjotpoch){
        alert("Abrir la vetana de modificación de jotpoch para el jotpoch "+idjotpoch+"");
        location.href= "<?php echo site_url("/hotspots/show_update_hotspot/"); ?>"+idjotpoch;
        
        //.site_url("/hotspots/show_update_hotspot/".$hotspots['id_hotspot'])

    }

  //boton fullscreen.
  document.getElementById('fullscreen').addEventListener('click', function(e) {
        viewer.toggleFullscreen();
  });
  ayax();
});
// meter en json en un string para poder modificarlo   

  
</script>
<div><p><?php echo base_url("conversorbd2json/get_json_plataforma/".$escenaInicial); ?></p></div>
    </body>
</html>