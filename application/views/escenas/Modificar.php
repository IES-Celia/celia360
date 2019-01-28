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
    })

</script>
<?php
echo "
    <h1 align='center'>Modificar escenas</h1>
        <p></p>
        <div id='caja' style='margin-top:100px;'>
	<fieldset>
            <form action='" . site_url("escenas/processupdatescene/") . "' method='post' enctype='multipart/form-data'>
		Nombre de la Escena: <input type='text' name='name' value='" . $con['Nombre'] . "'> <br/>
                Panorama: <input type='file' name='panorama' value=" . $con['panorama'] . ">
                <input type='hidden' name='Id' value=" . $con['id_escena'] . ">
                <input type='hidden' name='cod' value=" . $con['cod_escena'] . ">
		<p align='center'><input type='submit' value='Enviar cambios'>
                <br><hr><br>
        <a href='" . site_url('Panoramas_Secundarios/show_panoramas_secundarios/' . $con['cod_escena']) . "'>Imágenes secundarias</a><br>
        <a href='" . site_url('escenas/cargar_escena/' . $con['cod_escena'] . '/' . "update_escena_pitchyaw/") . "'>Modificar pitch y yaw</a><br>
		<a href='#' id='eliminar' class='eliminar'>Eliminar esta escena</a>
            </form>
	</fieldset>
        </div>";
?>
