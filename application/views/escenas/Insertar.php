<style>
	#panorama{
		height: auto;
	}
</style>

<div class="container mt-2">
	<div class="row">
		<div class="col-md-12">
			<h1 class="text-center">
				Inserción de Escenas
			</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
				<div id='caja'>
	
		
	<?php
		echo"<form action='".site_url("escenas/processinsertscene")."' method='post' enctype='multipart/form-data'>";
		echo "<input type='hidden' value='$piso_mapa' name='piso_mapa'>";
		echo "<input type='hidden' value='$left_mapa' name='left_mapa'>";
		echo "<input type='hidden' value='$top_mapa' name='top_mapa'>";
	?>	
			<div class="form-group">
			<label for="nombreL">Nombre de la escena</label>
			<input type='text' class="form-control" name='name' placeholder="Nombre del lugar">
		</div>
		<div class="form-group">
			<label for="img">Imagen 360</label>
			<input type='file' class="form-control-file" name='panorama' id='panorama' placeholder='Seleccione la escena'>
		</div>
		<div class="form-group">
			<input type='submit' class="btn btn-success" value="Insertar escena">
		</div>    
			
</div>
				</div>
			</div>
		</div>
	</div>
</div>
