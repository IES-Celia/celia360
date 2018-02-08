 
<?php
if(isset($datos["nombreUsuario"])){
echo "Hola, ".$datos["nombreUsuario"];
}

echo "<table border='1' id='menu'>";
    echo "<tr>
			<td><a href= '".site_url("Usuario/usuarios")."'> Usuarios</a></td>
		</tr>
		<tr>
			<td><a href= '".site_url("Usuario/mapero")."'> Mapa</a></td>
		</tr>
		<tr>
			<td><a href= '".site_url("Biblioteca/showIntAdmin")."'> Biblioteca</a></td>
		</tr>";

echo "</table>";
?>

