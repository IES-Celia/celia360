
		
		<div class="container mt-2">
			<div class="row">
				<div class="col-md-12">
					<h1 class='text-center'>Modificación Hotspot Ascensor</h1>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-body">
						<?php
        $tabla = $tabla[0];

		echo "
		<div class='form-group'>
		<a class='btn btn-primary' href='" . site_url('escenas/cargar_escena_modificar/' . $codigo_escena . '/' . "update_hotspot_pitchyaw/" . $tabla['id_hotspot']) . "'>Modificar coordenadas </a>
	
		<a class='rojo_borrar btn btn-danger' href='" . site_url("/hotspots/delete_hotspot/" . $tabla['id_hotspot']."/".$tipo_update) . "'
	>Borrar Hotspot Ascensor</a>
		</div>
        
	
       

";/**  Cierre echo * */
		?>
						</div>
					</div>
				</div>
			</div>
		</div>
