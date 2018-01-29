<?php
if(isset($datos["nombreUsuario"])){
echo "Hola, ".$datos["nombreUsuario"];
}

echo "<table border='1'>";
    echo "<tr>
			<td><a href='".site_url("hotspot")."''>Hotspot</a></td>
		</tr>
		<tr>
			<td><a href='".site_url("escenas")."'>Escenas</a></td>
		</tr>
		<tr>
			<td><a href='".site_url("audio")."'>Audio</a></td>
		</tr>
		<tr>
			<td><a href='".site_url("imagen")."'>Imagenes</a></td>
		</tr>
		<tr>
			<td><a href='".site_url("video")."'>Video</a></td>
		</tr>";

echo "</table>";
?>
