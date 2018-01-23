<?php
if(isset($datos["nombreUsuario"])){
echo "Hola, ".$datos["nombreUsuario"];
}

echo "<table border='1'>";
    echo "<tr>
			<td><a href='Hotspot/'>Hotspot</a></td>
		</tr>
		<tr>
			<td><a href='Escenas/'>Escenas</a></td>
		</tr>
		<tr>
			<td><a href='Audio/'>Audio</a></td>
		</tr>
		<tr>
			<td><a href=''>Imagenes</a></td>
		</tr>
		<tr>
			<td><a href=''>Video</a></td>
		</tr>";

echo "</table>";
?>