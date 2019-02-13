<?php
if (isset($datos["error"])) {
    echo "<p style='color:red'>" . $datos["error"] . "</p>";
}

if (isset($datos["mensaje"])) {
    echo "<p style='color:blue'>" . $datos["mensaje"] . "</p>";
}

$con = $tabla[0];

echo "
            <style>
                #panorama{
                height: auto;
                }
			</style>";
?>
<script>
    $(document).ready(function () {
        $("#eliminar").click(function () {
            if (confirm("¿Seguro que desea eliminar la escena? Se perderán todos los hotspots asociados.\n\n¡CUIDADO! Esta acción no se puede deshacer."))
                location.href = '<?php echo base_url("escenas/deletescene/" . $con['cod_escena']) ?>';
        });
    });
</script>

<div class="container">
	<div class="row">
		<div class="col-12">
			<h1 class="text-center mt-3">Modificar escenas</h1>
		</div>	
	</div>
	<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">

			<?php echo "<form action='" . site_url("escenas/processupdatescene/") . "' method='post' enctype='multipart/form-data'>
		<div class='form-group'>
		<label>Nombre de la Escena: </label>
		<input type='text' name='name' value='" . $con['Nombre'] . "' class='form-control'> <br/>
			</div>
				<div class='form-group'>
				<label>Panorama:</label>
				<input type='file' name='panorama' class='form-control-file' value=" . $con['panorama'] . ">
				</div>
                <input type='hidden' name='Id' value=" . $con['id_escena'] . ">
                <input type='hidden' name='cod' value=" . $con['cod_escena'] . ">
		<p align='center'><input type='submit' class='btn btn-success d-block mb-4' value='Enviar cambios'>

        <a href='" . site_url('Panoramas_Secundarios/show_panoramas_secundarios/' . $con['cod_escena']) . "' class='btn btn-primary'>Imágenes secundarias</a>
        <a href='" . site_url('escenas/cargar_escena/' . $con['cod_escena'] . '/' . "update_escena_pitchyaw/") . "' class='btn btn-primary'>Modificar pitch y yaw</a>
		<a href='#' id='eliminar' class='eliminar btn btn-danger'>Eliminar esta escena</a>
            </form>"; ?>

			</div>
		</div>
	</div>
	</div>
</div>
