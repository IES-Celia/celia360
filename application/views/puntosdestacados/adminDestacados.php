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
?>
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
        <a href="<?php echo site_url("escenas");?>" class="enlacesidenav">Atrás</a>
        <div id="contenedor">
        
        <?php 
            $contador = 0 ;
            
            foreach($puntos_d as $fila){
                
                $longitud = count($fila);
                echo '<div class="slider_admin">
                        <div id="opciones_fila">';
                            echo '<button onclick="anadir_celda('.$contador.')">Añadir celda</button>';
                        echo '</div>';
                      $contador = $contador + 1;
                      foreach($fila as $celda){
                          echo '
                          <a class="grid-item">
                                <div id="opcion_celda">
                                    <button onclick="borrar_celda('.$celda["id_celda"].')">Borrar</button>
                                    <button onclick="update_celda('.$celda["id_celda"].')">Actualizar</button>
                                 </div>
                                 <div class="grid-item__image" style="background-image: url('.base_url($celda["imagen_celda"]).')"></div>
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
            // metodo que borra un correspondiente punto destacado
            function borrar_celda(id){
                var result = confirm("¿Desea borrar la celda?");
                if(result == true){
                    location.href= "<?php echo site_url("PuntosDestacados/borrar_celda/")?>"+id  
                }
            }
            
            // metodo que actualiza un correspondiente punto destacado, redireccionando a la vista que carga el formulario de update
            function update_celda(id){
                location.href= "<?php echo site_url("PuntosDestacados/formulario_update/")?>"+id  
            }

            // metodo que añade un punto destacado, redireccionando a la vista que carga el formulario de insercción
            function anadir_celda($id){
                 location.href= "<?php echo site_url("PuntosDestacados/anadir_celda/")?>"+$id               
            }

        </script>
</body>
</html>