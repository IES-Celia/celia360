<?php
if(isset($datos["nombreUsuario"])){
echo "Hola, ".$datos["nombreUsuario"];
}

echo "<table border='1'>";
    echo "<tr>
			<td><a href='".site_url("Hotspot")."''>Hotspot</a></td>
		</tr>
		<tr>
			<td><a href='".site_url("Escenas")."'>Escenas</a></td>
		</tr>
		<tr>
			<td><a href='".site_url("Audio")."'>Audio</a></td>
		</tr>
		<tr>
			<td><a href='".site_url("Imagen")."'>Imagenes</a></td>
		</tr>
		<tr>
			<td><a href='".site_url("Video")."'>Video</a></td>
		</tr>";

echo "</table>";
?>
