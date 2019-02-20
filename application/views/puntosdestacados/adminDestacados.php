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
<style>

#contenedor{
    position: relative;
    width: 100%;
    display:flex;
    flex-direction:column;
    height: 100%;  
    align-items: center;
    background: black;
}

.slider_admin {
    width: 100%;
    height: 100vh;
    background: grey;
    display:flex;
    flex-direction: row;
    padding: 2px;
    border: 1px dotted red;
    bottom: 0%;

}

.slider_admin div{
    width: 100%;
    height: 100%;
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
    opacity: 0.9;
    overflow: hidden;
}

#opcion_celda{
    z-index: 1000;
	position: relative;
	padding:10px;

}

.slider{
    width: 100%;
    height: 50%;
    background: grey;
    display:flex;
    flex-direction: row;
}

.slider div{
    width: 100%;
    height: 100%;
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
    opacity: 0.9;
    overflow: hidden;
}

#opciones_fila{
	width: 15%;
	position:relative;
	text-align: left;
	margin: 10px
}


/*EFECTO*/


.image-grid {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: horizontal;
  -webkit-box-direction: normal;
      -ms-flex-direction: row;
          flex-direction: row;
  -ms-flex-wrap: wrap;
      flex-wrap: wrap;
  -ms-flex-line-pack: center;
      align-content: center;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  -webkit-box-pack: center;
      -ms-flex-pack: center;
          justify-content: center;

  margin: 0 auto;
  padding: 0;
  list-style: none;
}

.image-grid__item {
  display: -webkit-box;
  display: -ms-flexbox;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
      -ms-flex-direction: column;
          flex-direction: column;
  -webkit-box-flex: 0;
      -ms-flex-positive: 0;
          flex-grow: 0;
  -ms-flex-negative: 0;
      flex-shrink: 0;
  -ms-flex-preferred-size: 360px;
      flex-basis: 360px;
  -webkit-box-align: stretch;
      -ms-flex-align: stretch;
          align-items: stretch;
  -webkit-box-pack: center;
      -ms-flex-pack: center;
          justify-content: center;
  position: relative;
    width: 33%;
 
  -webkit-transition: text-shadow 0.1s ease-in;
  -webkit-transform: 0.14s ease-in;
  transition: text-shadow 0.1s ease-in, -webkit-transform 0.14s ease-in;
  transition: transform 0.14s ease-in, text-shadow 0.1s ease-in;
  transition: transform 0.14s ease-in, text-shadow 0.1s ease-in, -webkit-transform 0.14s ease-in;
}
.image-grid__item:before {
  content: "";
  visibility: hidden;
  position: relative;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: none;
  border-radius: 3px;
  box-shadow: 0 10px 24px 0px rgba(0, 0, 0, 0.06), 0 8px 20px -2px rgba(0, 0, 0, 0.1), 0 6px 10px -6px rgba(0, 0, 0, 0.2);
  -webkit-transition: visibility 0.1s ease-out, opacity 0.1s ease-out;
  transition: visibility 0.1s ease-out, opacity 0.1s ease-out;
  opacity: 0;
}
.image-grid__item:hover:before {
  visibility: visible;
  opacity: 1;
}

.grid-item {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  position: relative;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
      -ms-flex-direction: column;
          flex-direction: column;
  -webkit-box-flex: 1;
      -ms-flex-positive: 1;
          flex-grow: 1;
  -ms-flex-negative: 1;
      flex-shrink: 1;
  -webkit-box-align: stretch;
      -ms-flex-align: stretch;
          align-items: stretch;
  -webkit-box-pack: center;
      -ms-flex-pack: center;
          justify-content: center;
  text-decoration: none;
  color: #eeeeee;
  overflow: hidden;
}
.grid-item:hover .grid-item__image {
  -webkit-transform: scale(1.2);
          transform: scale(1.2);
}
.grid-item:hover .grid-item__hover {
  visibility: visible;
  opacity: 1;
}
.grid-item:hover .grid-item__name {
  visibility: visible;
  -webkit-transform: scale(1);
          transform: scale(1);
  opacity: 1;
}

.grid-item__image {
        background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-size: cover;
  background-position: center center;
  -webkit-transform: scale(1);
          transform: scale(1);
  will-change: transform;
  -webkit-transition: -webkit-transform 0.35s cubic-bezier(0.25, 0.46, 0.45, 0.94);
  transition: -webkit-transform 0.35s cubic-bezier(0.25, 0.46, 0.45, 0.94);
  transition: transform 0.35s cubic-bezier(0.25, 0.46, 0.45, 0.94);
  transition: transform 0.35s cubic-bezier(0.25, 0.46, 0.45, 0.94), -webkit-transform 0.35s cubic-bezier(0.25, 0.46, 0.45, 0.94);
  z-index: 0;
}

.grid-item__hover {
  visibility: hidden;
  display: block;
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: -webkit-radial-gradient(rgba(47, 48, 50, 0.2), rgba(47, 48, 50, 0.7));
  background: radial-gradient(rgba(47, 48, 50, 0.2), rgba(47, 48, 50, 0.7));
  box-shadow: inset 0 0 50px rgba(0, 0, 0, 0.15);
  border-radius: 0;
  -webkit-transition: visibility 0.35s cubic-bezier(0.25, 0.46, 0.45, 0.94), opacity 0.35s cubic-bezier(0.25, 0.46, 0.45, 0.94);
  transition: visibility 0.35s cubic-bezier(0.25, 0.46, 0.45, 0.94), opacity 0.35s cubic-bezier(0.25, 0.46, 0.45, 0.94);
  opacity: 0;
}

.grid-item__name {
  visibility: hidden;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
      -ms-flex-direction: column;
          flex-direction: column;
  -webkit-box-flex: 1;
      -ms-flex-positive: 1;
          flex-grow: 1;
  -ms-flex-negative: 1;
      flex-shrink: 1;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  font-size: 2rem;
  font-weight: 300;
  text-shadow: 0px 0px 30px rgba(0, 0, 0, 0.4), 2px 2px 6px rgba(0, 0, 0, 0.3);
  -webkit-box-pack: center;
      -ms-flex-pack: center;
          justify-content: center;
  letter-spacing: 1px;
  -webkit-transform: scale(0.6);
          transform: scale(0.6);
  -webkit-transform-origin: center center;
          transform-origin: center center;
  -webkit-transition: visibility 0.14s ease-out, opacity 0.14s ease-out, -webkit-transform 0.24s ease;
  transition: visibility 0.14s ease-out, opacity 0.14s ease-out, -webkit-transform 0.24s ease;
  transition: visibility 0.14s ease-out, opacity 0.14s ease-out, transform 0.24s ease;
  transition: visibility 0.14s ease-out, opacity 0.14s ease-out, transform 0.24s ease, -webkit-transform 0.24s ease;
  opacity: 0;
}

</style>
        <div id="contenedor">
        
        <?php 
            $contador = 0 ;
            
            foreach($puntos_d as $fila){
                
                $longitud = count($fila);
                echo '<div class="slider_admin">
                        <div id="opciones_fila">';
                            echo '<button class="btn btn-primary" onclick="anadir_celda('.$contador.')">Añadir celda</button>';
                        echo '</div>';
                      $contador = $contador + 1;
                      foreach($fila as $celda){
                          echo '
                          <a class="grid-item">
                                <div id="opcion_celda">
                                    <button class="btn btn-danger float-right ml-1" onclick="borrar_celda('.$celda["id_celda"].')">Borrar</button>
                                    <button class="btn btn-info float-right" onclick="update_celda('.$celda["id_celda"].')">Actualizar</button>
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



