

<?php

echo "<table border='1' id='cont'>
        <tr>
        <th>Nick</th>
        <th>Contraseña</th>
        <th>Correo</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Tipo</th>
        <th>Borrar</th>
        <th>Modificar</th>";
        
foreach ($tablaUsuarios as $usu) {
   
    echo "<tr id='usu".$usu["id_usuario"]."'>
            <td>".$usu["nombre_usuario"]."</td>
            <td>".$usu["password"]."</td>
            <td>".$usu["email"]."</td>
            <td>".$usu["nombre"]."</td>
            <td>".$usu["apellido"]."</td>
            <td>".$usu["tipo_usuario"]."</td>
            <td>
            <a href='#' onclick='borrarusuario(".$usu["id_usuario"].")'>Borrar</a></td>
            <td>

            <a href='".site_url("./usuario/modificar/".$usu["id_usuario"])."'>Modificar</a>
          </td>
          </tr>";
}
echo "</table>";
?>


<script>

        function borrarusuario(idusu){
            resultado=confirm("¿Desea borrar el usuario?");
            if(resultado){ 
            $.get("<?php echo base_url('usuario/borrarusuario/'); ?>" + idusu, null, respuesta);
            }
        }

        function respuesta(r) {
            if (r == 0) {
                alert("Ha ocurrido un error al borrar");
            }
            else {
                selector = "#usu"+parseInt(r);
                $(selector).remove();
            }
        }

</script>
