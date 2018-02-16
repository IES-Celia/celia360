
<style type="text/css">
    #oculto{
        display:none;
        z-index: 1;
        position: fixed;
        top: 30%;
        left: 30%;
        width: 600px;
        height: 300px;
        background-color: #ffffff;
        border: 3px solid ;
    }

    #mostrar{
        display:none;
        z-index: 1;
        position: fixed;
        top: 30%;
        left: 30%;
        width: 600px;
        height: 300px;
        background-color: #ffffff;
        border: 3px solid ;
    }

</style>

<?php
//Tabla usuarios
 echo"<a class='insert' onclick='mostrar()' > Insertar Usuario</a>";
echo "<table id='cont'>
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
   
   $idusu = $usu["id_usuario"];
    echo"<tr id='usu".$idusu."'>
            <td id='nick_usuario_".$idusu."'>".$usu["nombre_usuario"]."</td>
            <td>".$usu["password"]."</td>
            <td id='email_usuario_".$idusu."'>".$usu["email"]."</td>
            <td id='name_usuario_".$idusu."'>".$usu["nombre"]."</td>
            <td id='ape_usuario_".$idusu."'>".$usu["apellido"]."</td>";
        if($usu["tipo_usuario"]==0){
            echo "<td style='color:red;'>Usuario pendiente de asignacion</td>";
        }elseif ($usu["tipo_usuario"]==1) {
            echo "<td>Admin</td>";
        }elseif ($usu["tipo_usuario"]==2) {
            echo "<td>Mapero</td>";
        }elseif ($usu["tipo_usuario"]==3) {
            echo "<td>Bibliotecario</td>";
        }    
     
    

    echo"   <td>
                <a href='#' onclick='modusuario(".$usu["id_usuario"].")'>Modificar</a>
            </td>
            <td>
                <a href='#' onclick='borrarusuario(".$usu["id_usuario"].")'>Borrar</a>
            </td>
        </tr>";
}
echo "</table>";

//Capa formulario modificar
echo "
<div id='oculto'>
    <h1>Modificar usuario</h1>
    <form action='".site_url("usuario/modUsuario")."' method='get'>
        Nombre de usuario:<input type='text' name='username' id='form_modif_nick'><br/>
        Password:<input type='text' name='pass'><br/>
        Email:<input type='text' name='email' id='form_modif_email'><br/>
        Nombre:<input type='text' name='nombre' id='form_modif_nombre' ><br/>
        Apellidos:<input type='text' name='apellidos' id='form_modif_ape'><br/>
        Tipo:<input type='number' name='tipo' min='0' max='3' id='form_modif_tipo'><br/>
        <input type='hidden' name='id' id='form_modif_id'><br/>
        <input type=submit value='Modificar'>
    </form>
    <a href='#' onclick='cerrar()'>Cerrar</a>
</div>";

//Capa formulario insertar
echo"
<div id='mostrar'>
<h1>Registro de usuarios</h1>
<form action='".site_url("usuario/processregisterform")."' method='get'>

    <label for='username'>Nombre de usuario</label>
    <input type='text' name='username' id='username'><br/>
    <label for='pass'>Password</label>
    <input type='password' id='pass' name='pass'><br/>
    <label for='email'>Email</label>
    <input type='text' name='email' id='email'><br/>
    <label for='name'>Nombre</label>
    <input type='text' name='nombre' id='nombre'><br/>
    <label for='subname'>Apellidos</label>
    <input type='text' name='subname' id='subname'><br/>
    </select>
        <br/>
    <input type='submit'>
    <a href='#' onclick='cerrar()'>Cerrar</a>
   
</form>    
</div>";

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

        function modusuario(idusu){
            email = "email_usuario_"+idusu;
            nick = "nick_usuario_"+idusu;
            nombre = "name_usuario_"+idusu;
            ape = "ape_usuario_"+idusu;
            document.getElementById("form_modif_email").value = document.getElementById(email).innerHTML;
            document.getElementById("form_modif_nick").value = document.getElementById(nick).innerHTML;
            document.getElementById("form_modif_nombre").value = document.getElementById(nombre).innerHTML;
            document.getElementById("form_modif_ape").value = document.getElementById(ape).innerHTML;
            document.getElementById("form_modif_id").value = idusu;
            $("#oculto").show();
        }

        function mostrar(){
            $("#mostrar").show();
        }

        function cerrar(){
            $("#oculto").hide();
             $("#mostrar").hide();
        }    
       
</script>
