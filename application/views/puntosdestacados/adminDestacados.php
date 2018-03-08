<!--- por adaptar a codeigniter -->

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
                echo '<div class="slider">
                      <div id="opciones_fila">
                          <button onclick="mostrar_fila('.$contador.')">Mostrar</button>';
                          if($longitud!=0){ 
                              echo '<button onclick="ocultar_fila('.$contador.')">Ocultar</button>';
                              if($longitud<4) echo '<button onclick="anadir_celda('.$contador.')">Añadir celda</button>';
                              
                              }
                      echo '</div>';
                      $contador = $contador + 1;
                      foreach($fila as $celda){
                          echo '
                          <a class="grid-item">
                                 <div class="grid-item__image" style="background-image: url('.$celda["imagen_celda"].')"></div>
                                 <div class="grid-item__hover"></div>
                                 <div class="grid-item__name">'.$celda["titulo_celda"].'</div>
                                 <input type="hidden" value="'.$celda["id_celda"].'">
                          </a>';
                      }
               echo '</div>';
            }
        ?>    

        </div>
        <script src="<?php echo base_url("assets/js/jquery.js"); ?>"></script>

        <script>
            $(".grid-item").click(function(){
                location.href= "<?php echo site_url("Puntos_destacados/formulario_update/")?>"+$(this).children().last().val();
            });
            
            function mostrar_fila($id){
                location.href= "<?php echo site_url("Puntos_destacados/formulario_update/")?>"+$id
            }
            
            function ocultar_fila($id){
                location.href= "<?php echo site_url("Puntos_destacados/formulario_update/")?>"+$id
            }
            
            function anadir_celda($id){
                 location.href= "<?php echo site_url("Puntos_destacados/anadir_celda/")?>"+$id               
            }

        </script>
</body>
</html>