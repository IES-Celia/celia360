<?php
if(isset($datos["nombreUsuario"])){
echo "Hola, ".$datos["nombreUsuario"];
}



echo "<table border='1' class='tabla' id='cont'>
        <tr>
        <td>Nick</td>
        <td>Contraseña</td>
        <td>Correo</td>
        <td>Nombre</td>
        <td>Apellido</td>";
        

foreach ($tablaUsuarios as $usu) {
   
    echo "<tr>
            <td>".$usu["nombre_usuario"]."</td>
            <td>".$usu["password"]."</td>
            <td>".$usu["email"]."</td>
            <td>".$usu["Nombre"]."</td>
            <td>".$usu["Apellido"]."</td>
            <td>
            <a href='".site_url("./usuario/borrarUsuario/".$usu["id_usuario"])."'>Borrar</a></td>
            <td>

            <a href='".site_url("./usuario/modificar/".$usu["id_usuario"])."'>Modificar</a>
          </td>
          </tr>";
}
echo "</table>";
?>
