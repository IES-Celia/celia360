<!DOCTYPE html>
<html lang="es">
 <head>
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
     <title>Destacados</title>
     <link rel="stylesheet" href="<?php echo base_url("assets/css/estilo_pd.css");?>">
     <meta name="viewport" content="width=device-width, user-scalable=no ,initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
     <link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">

</head>
    <body>
        <div id="contenedor">
        <?php 
            $contador = 0 ;
            foreach($puntos_d as $fila){ 
                $longitud = count($fila);
                if($longitud!=0){
                    echo '<div class="slider">';
                          $contador = $contador + 1;
                          foreach($fila as $celda){
                              echo '
                              <a class="grid-item" onclick="saltarEscena("'.$celda["escena_celda"].'")">
                                     <div class="grid-item__image" style="background-image: url('.base_url($celda["imagen_celda"]).')"></div>
                                     <div class="grid-item__hover"></div>
                                     <div class="grid-item__name">'.$celda["titulo_celda"].'</div>
                                     <input type="hidden" value="'.$celda["id_celda"].'">
                              </a>';
                          }
                   echo '</div>';
                }
            }
        ?>    
        </div>
        
            
        
        <div class="contenedor">
          <div id="panorama"> <!--div donde se carga pannellum -->
            <div class="boton_menu"></div> <!--boton menu --> 
            <div class="ctrl" id="fullscreen"></div> <!--boton full screen-->
          </div> 
        </div>

        <script src="<?php echo base_url("assets/js/jquery.js"); ?>"></script>

        <script>
            function saltarEscena(codscene){
                viewer.loadScene(codscene);
            }
            
            $.ajax({
                url: "<?php echo base_url("conversorbd2json/get_json_destacados"); ?>",
                type: 'GET',
                dataType: 'json',
                beforeSend: function(){
                   //Si esta definido, lo destruimos y creamos uno nuevo
                  if (typeof viewer !== 'undefined') {
                    viewer.destroy();
                    $("#panorama").append(panorama_html);          
                  } 
                  cargarPannellum();
                }
              }).done(function(data) {
                  $.each(data.scenes, function(i){
                    var escenas = data.scenes[i];
                    $.each(escenas.hotSpots, function(j){
                      escenas.hotSpots[j].clickHandlerFunc = eval(escenas.hotSpots[j].clickHandlerFunc);
                    });
                  });
                  viewer = pannellum.viewer("panorama", data);
            })

        </script>
</body>
</html>