 
<?php
if(isset($datos["nombreUsuario"])){
echo "Hola, ".$datos["nombreUsuario"];
}

$tablaUsuarios = $datos["tablaUsuarios"];

echo "<table border='1' class='tabla' id='cont'>
		<tr>
		<td>Nick</td>
		<td>Contraseña</td>
		<td>Correo</td>
		<td>Nombre</td>
		<td>Apellido</td>";

foreach ($tablaUsuarios as $usu) {
   
    echo "<tr>
    		<td>".$usu[1]."</td>
    		<td>".$usu[2]."</td>
    		<td>".$usu[3]."</td>
    		<td>".$usu[4]."</td>
    		<td>".$usu[5]."</td>
    		<td>
            <a href='".site_url("./usuario/borrarUsuario/".$usu[0])."'>Borrar</a></td>
    		<td>

            <a href='".site_url("./usuario/modificar/".$usu[0])."'>Modificar</a>
          </td>
          </tr>";
}
echo "</table>";
?>

