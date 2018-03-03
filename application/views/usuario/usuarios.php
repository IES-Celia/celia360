
<style type="text/css">
    
    
    #modificar{
        display:none;
        z-index: 1;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        border: 3px solid ;
        background-color:rgb(0,0,0); 
        background-color:rgba(0,0,0,0.4);
    }


    #insertar{
        display:none;
        z-index: 1;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        border: 3px solid ;
        background-color:rgb(0,0,0); 
        background-color:rgba(0,0,0,0.4);

    }


    

</style>

<?php
//Tabla usuarios
 echo"<a class='insert' onclick='insertar()' > Insertar Usuario</a>";
 echo "</div>";
echo "<h1 class='cabecera'>Usuario</h1>";
echo "<table id='cont'>
       <tr id='cabecera'> 
        <th>Nick</th>
        <th>Contraseña</th>
        <th>Correo</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Tipo</th>
        <th>Modificar</th>
        <th>Borrar</th>
       </tr>     
        ";
        
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
                <a href='#' onclick='modusuario(".$usu["id_usuario"].")'><i class='fas fa-edit'></i></a>
            </td>
            <td>
                <a href='#' onclick='borrarusuario(".$usu["id_usuario"].")'><i class='far fa-trash-alt'></i></a>
            </td>
        </tr>";
}
echo "</table>";

//Capa formulario modificar
echo "
<div id='modificar'>
    <div class='caja'>
    <h1>Modificar usuario</h1>
    <form action='".site_url("usuario/modUsuario")."' method='get'>

        <label for='form_modif_nick'>Nombre de usuario</label><br/>
        <input type='text' name='username' id='form_modif_nick'><br/><br/>
        <label for='pass'>Password</label>
        <input type='text' name='pass' required><br/><br/>
        <label for='form_modif_email'>Email</label><br/>
        <input type='text' name='email' id='form_modif_email'><br/><br/>
        <label for='form_modif_nombre'>Nombre</label>
        <input type='text' name='nombre' id='form_modif_nombre' ><br/><br/>
        <label for='form_modif_ape'>Apellidos</label>
        <input type='text' name='apellidos' id='form_modif_ape'><br/><br/>

        Tipo<br/>
        <select>
            <option value='1'>Admin</option>
            <option value='2'>Mapero</option>
            <option value='3'>Bibliotecario</option>
            
        </select>
        </br>
        <input type='hidden' name='id' id='form_modif_id'><br/>
        <input type=submit value='Modificar'>
            <br/>
            <br/>
        <input type='button' onclick='cerrar()' value='Cerrar'>
            <br/>
            <br/>
    </form>
    </div>
</div>";

//Capa formulario insertar
echo"
<div id='insertar'>
    <div class='caja'>
<h1>Registro de usuarios</h1>
<form action='".site_url("usuario/processregisterform")."' method='get'>

    <label for='username'>Nombre de usuario</label>
    <input type='text' name='username' id='username'><br/><br/>
    <label for='pass'>Password</label>
    <input type='password' id='pass' name='pass'><br/><br/>
    <label for='email'>Email</label><br/>
    <input type='text' name='email' id='email'><br/><br/>
    <label for='name'>Nombre</label>
    <input type='text' name='nombre' id='nombre'><br/><br/>
    <label for='subname'>Apellidos</label>
    <input type='text' name='subname' id='subname'><br/><br/>
    </select>
        <br/>
    <input type='submit'>
        <br/>
        <br/>
    <input type='button' onclick='cerrar()' value='Cerrar'>
    <br/>
    <br/>
   
</form> 
    </div>   
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
            
            $("#modificar").css('display','block');
        }

        function insertar(){
            $("#insertar").css('display','block');
        }

        function cerrar(){
            $("#insertar").css('display','none');
             $("#modificar").css('display','none');
        }    
       
</script>
