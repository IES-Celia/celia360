<div class="container mt-4">
	<div class="row">
		<div class="col-md-8 col-xs-12">
		<?php
   echo '<div id="mapa_escena">';
         $indice = 0;
   
         if (count($mapa) == 0) {
             // No hay aún ningún mapa
             echo "<div class='pisos' style='display: block; align: center; color: white'>Aún no se ha creado ningún mapa.</div>";
         }
         else {
            // Ya existe uno o varios mapas. Vamos a crear cada uno en una capa individual
            foreach ($mapa as $imagen) {
               echo "<div id='zona".$indice."' class='pisos-admin' style='display: none;'>";
               echo "<img src='".base_url($imagen['url_img'])."'  style='width:100%;height:100%;'>";

                foreach ($puntos as $punto) {
                  if($punto['piso']==$indice){

                    echo "<div id='".$punto['id_punto_mapa']."' class='puntos' style='left: ".$punto['left_mapa']."%; top: ".$punto['top_mapa']."%;' escena='".$punto['id_escena']."'>
                    
                    </div>";
                    //<span class='tooltip'>".$punto['id_escena']."</span>                    
                  }

                }
              echo "</div>";
              $indice++;
            } // foreach
         } // else
   ?>
   </div>
		</div>
		<div class="col-md-4 col-xs-12">
			<div class="card">
				<div class="card-body">
				<?php 
    if(count($mapa)==0){
        ?>
        <div class="botones_mapa">
				<div class="row m-3">
				<div class="col-12 text-center">
            <button class="botonmapa btn btn-primary" data-toggle="modal" data-target="#addZona" id="btn-anadir-mapa">Añadir zona</button>
            <a href="<?php echo base_url('escenas') ?>"><button class="botonmapa btn btn-primary">Volver atras</button></a>
        </div>
				</div>
				</div>
        <?php
    }else{
        ?>
        <div class="botones_mapa">
			<div class="card">
				<div class="card-body text-center">
				<h4 class="campomapa" id="piso_actual">Zona <span>0</span></h4>
				</div>
			</div>
			<div class="row m-3">
				<div class="col-12 text-center">
				<button class="botonmapa btn btn-primary w-75" id="btn-subir-piso-admin" >Subir zona</button>
				</div>
			</div>
			<div class="row m-3">
				<div class="col-12 text-center">
				<button class="botonmapa btn btn-primary w-75" id="btn-bajar-piso-admin">Bajar zona</button>
				</div>
			</div>
			<div class="row m-3">
				<div class="col-12 text-center">
				<button class="botonmapa btn btn-primary w-75" id="btn-editar-mapa" data-toggle="modal" data-target="#editZona">Editar zona</button>
				</div>
			</div>
			<div class="row m-3">
				<div class="col-12 text-center">
				<button class="botonmapa btn btn-primary w-75" id="btn-anadir-mapa" data-toggle="modal" data-target="#addZona">Añadir zona</button>
				</div>
			</div>
			<div class="row m-3">
				<div class="col-12 text-center">
				<button class="botonmapa btn btn-primary w-75" id="btn-config-mapa" data-toggle="modal" data-target="#config">Config general</button>
				</div>
			</div>

			<div class="row m-3">
				<div class="col-12 text-center">
				<button class="botonmapa btn btn-primary w-75" id="btn-eliminar-mapa">Eliminar zona</button>
				</div>
			</div>

			<div class="row m-3">
				<div class="col-12 text-center">
				<button class="botonmapa btn btn-primary w-75" id="btn-mover-puntos">Mover escenas</button>
				</div>
			</div>

			<div class="row m-3">
				<div class="col-12 text-center">
				<a href="<?php echo base_url('escenas') ?>"><button class="botonmapa btn btn-primary w-75">Volver atras</button></a>
				</div>
			</div>
        </div>
        <?php
    }
?>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- Modal -->
<div class="modal fade" id="editZona" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar zona</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <div id="modalEditar" class="modalMapa">
    <div id="caja">
        <form action='<?php echo site_url("mapa/editar_zona"); ?>' method="post" enctype='multipart/form-data'>
			
		<div class="form-group">
			<label for="posicion">Nueva posición</label>
        	<input type="number" class="form-control" name="posicion" min="0" max="<?php $maxZonas=count($mapa)-1; echo $maxZonas; ?>">
		</div>

			
			<input type="hidden" name="MAX_FILE_SIZE" value="20000000">
			<div class="form-group">
				<label for="posicion_inicial">Posición inicial</label>
            	<input type="text" class="form-control text-info" name="posicion_inicial" readonly>
			</div>

			<div class="form-group">
				<label for="mod">Modificar imagen de zona</label>
				<input type="file"  class="form-control-file" name="zona" id="zona" placeholder="Seleccionar la imagen">
			</div>
            <input type="submit" class="btn btn-success float-right" value="Modificar">
        </form>
    </div>
</div>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="addZona" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Añadir zona</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
<div id="modalAnadir" class="modalMapa" style="display: none;">
    <div id="caja">
        <form action='<?php echo site_url("mapa/crear_zona"); ?>' method="post" enctype='multipart/form-data'>
			
		<div class="form-group">
			<label for="nombre">Nombre de zona</label>
            <input type="text" name="nombre" class="form-control">
		</div>

		<div class="form-group">
		<label for="posicion">Posición:</label>
            <input type="number" name="posicion" class="form-control" min="0" max="<?php $maxZonas=count($mapa); echo $maxZonas; ?>">
		</div>
           <div class="form-group">
			   <label for="add">Imagen zona</label>
			   <input type="file" name="zona" id="zona" class="form-control-file" placeholder="Seleccionar la imagen">
		   </div>
            <input type="submit" class="btn btn-success" value="Añadir">
        </form>
    </div>
</div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="config" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modificar configuración</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
<div id="modalConfig" style="display: none;">
    <div id="caja">
        <form action='<?php echo site_url("mapa/update_config"); ?>' method="post" enctype='multipart/form-data'>
            <?php
            if($configuracion!=null){
                
				?>
				
				<label for="piso">Piso inicial</label>
				<input type="number" class="form-control mb-1" name="piso_inicial" value="<?php echo $configuracion["piso_inicial"]; ?>" min="0" max="<?php $maxZonas=count($mapa); echo $maxZonas-1; ?>">
				
                <input type="hidden" name="punto_inicial" value="<?php echo $configuracion["punto_inicial"]; ?>">
                <input type="hidden" name="escena_inicial" value="<?php echo $configuracion["escena_inicial"]; ?>">
                <div id="mapa_config_mapa" >
            <?php
            }else{
				?>    
				<label for="piso_inicial1">Piso inicial</label>            
                <input type="number" class="form-control" name="piso_inicial" value="0" min="0" max="<?php $maxZonas=count($mapa); echo $maxZonas-1; ?>">
                <input type="hidden" name="punto_inicial">
                <input type="hidden" name="escena_inicial">
                <div id="mapa_config_mapa" >
                <?php
            }
                 $indice = 0;

                 foreach ($mapa as $imagen) {
                        echo "<div id='zona".$indice."' class='pisos pisos_config' style='display: none'>";
                    
                    echo "<img src='".base_url($imagen['url_img'])."' style='width:100%;'>";
                    foreach ($puntos as $punto) {
                        if($punto['piso']==$indice){
                            if($punto['id_escena'] == $configuracion['escena_inicial']){
                                echo "<div id='punto".$punto['id_punto_mapa']."' class='punto_inicial' style='left: ".$punto['left_mapa']."%; top: ".$punto['top_mapa']."%;' escena='".$punto['id_escena']."'></div>";
                            }else{
                                echo "<div id='punto".$punto['id_punto_mapa']."' class='puntos' style='left: ".$punto['left_mapa']."%; top: ".$punto['top_mapa']."%;' escena='".$punto['id_escena']."'></div>";
                            }
                        }
                    }
                    echo "</div>";
                    $indice++;
                }
                
            ?>
            </div>
            <input type="submit" class="btn btn-success mt-2 float-right" value="Modificar">
        </form>
    </div>
</div>
      </div>
    </div>
  </div>
</div>
