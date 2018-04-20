
<?php
//Tabla usuarios
 echo"<a class='insert' onclick='mostrar()' > <i class='fas fa-plus-circle'></i> Insertar Usuario </a>";
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
            echo "<td>  
                    <select name='tipo' id='tipo_usuario".$idusu."'>
                            <option value='0' style='color:red' selected='true' disabled='disabled'>Pendiente asignación</option>
                            <option value='1'>Admin</option>
                            <option value='2'>Mapero</option>
                            <option value='3'>Bibliotecario</option>
                    </select>
                    <a href='#' onclick='modTipo(".$usu["id_usuario"].")'><i class='far fa-arrow-alt-circle-up'></i></a>
                </td>";
        }elseif ($usu["tipo_usuario"]==1) {
            echo "<td>
                    <select name='tipo' id='tipo_usuario".$idusu."'>
                            <option value='0' style='color:red' >Pendiente asignación</option>
                            <option value='1' selected='true'>Admin</option>
                            <option value='2'>Mapero</option>
                            <option value='3'>Bibliotecario</option>
                    </select>
                    <a href='#' onclick='modTipo(".$usu["id_usuario"].")'><i class='far fa-arrow-alt-circle-up'></i></a>
                </td>";
        }elseif ($usu["tipo_usuario"]==2) {
           echo "<td> 
                    <select name='tipo' id='tipo_usuario".$idusu."'>
                            <option value='0' style='color:red'>Pendiente asignación</option>
                            <option value='1'>Admin</option>
                            <option value='2' selected='true'>Mapero</option>
                            <option value='3'>Bibliotecario</option>
                    </select>
                    <a href='#' onclick='modTipo(".$usu["id_usuario"].")'><i class='far fa-arrow-alt-circle-up'></i></a>
                </td>";
        }elseif ($usu["tipo_usuario"]==3) {
           echo "<td>
                    <select name='tipo' id='tipo_usuario".$idusu."'>
                            <option value='0' style='color:red'>Pendiente asignación</option>
                            <option value='1'>Admin</option>
                            <option value='2'>Mapero</option>
                            <option value='3' selected='true'>Bibliotecario</option>
                    </select>
                    <a href='#' onclick='modTipo(".$usu["id_usuario"].")'><i class='far fa-arrow-alt-circle-up'></i></a>
                </td>";
        }    
     
    

    echo"   <td>
                <a href='#' onclick='modusuario(".$usu["id_usuario"].")'><i class='fa fa-edit'></i></a>
            </td>
            <td>
                <a href='#' onclick='borrarusuario(".$usu["id_usuario"].")'><i class='fa fa-trash'></i></a>
            </td>
        </tr>";
}
echo "</table>";

//Capa formulario modificar
echo "
<div id='modificar'>
    <div id='caja'>
    <h1>Modificar usuario</h1>
    <form action='".site_url("usuario/modUsuario")."' method='post'>

        <label for='username'>Nombre de usuario</label>
        <input type='text' name='username' id='form_modif_nick' required>
        <label for='pass'>Password</label>
        <input type='password' name='pass' required>
        <label for='email'>Correo</label>
        <input type='text' name='email' id='form_modif_email' required>
        <label for='name'>Nombre</label>
        <input type='text' name='nombre' id='form_modif_nombre' required>
        <label for='subname'>Apellidos</label>
        <input type='text' name='apellidos' id='form_modif_ape' required>
        <label for='tipo'>Tipo de usuario</label>
        <select name='tipo' id='form_modif_tipo'>
                <option value='0' style='color:red'>Pendiente asignación</option>
                <option value='1'>Admin</option>
                <option value='2'>Mapero</option>
                <option value='3'>Bibliotecario</option>
        </select>
        <input type='hidden' name='id' id='form_modif_id'>
        <input type=submit value='Modificar'>
         <input type='button' onclick='cerrar()' value='Cerrar'>
    </form>
   
    </div>
</div>";

//Capa formulario insertar
echo"
<div id='insertar'>
    <div id='caja'>
<h1>Registro de usuarios</h1>
<form action='".site_url("usuario/processregisterform")."' method='post'>

    <label for='username'>Nombre de usuario</label>
    <input type='text' name='username' id='username' required>
    <label for='pass'>Password</label>
    <input type='password' id='pass' name='pass' required>
    <label for='email'>Correo</label>
    <input type='text' name='email' id='email' required>
    <label for='name'>Nombre</label>
    <input type='text' name='nombre' id='nombre' required>
    <label for='subname'>Apellidos</label>
    <input type='text' name='subname' id='subname' required>
    <input type='submit'>
    <input type='button' onclick='cerrar()' value='Cerrar'>
    
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

        function modTipo(idusu) {
            resultado=confirm("¿Desea modificar el tipo de usuario?");
            if(resultado){
                $.get("<?php echo base_url('usuario/modtipo/');?>"+idusu,null,respuesta);
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
            tipo = "tipo_usuario"+idusu;
            document.getElementById("form_modif_email").value = document.getElementById(email).innerHTML;
            document.getElementById("form_modif_nick").value = document.getElementById(nick).innerHTML;
            document.getElementById("form_modif_nombre").value = document.getElementById(nombre).innerHTML;
            document.getElementById("form_modif_ape").value = document.getElementById(ape).innerHTML;
            aux = document.getElementById(tipo).innerHTML;
            
            if(aux=='Admin'){
                document.getElementById("form_modif_tipo").selectedIndex='1';
            }else if(aux=='Mapero'){
                document.getElementById("form_modif_tipo").selectedIndex='2';
            }else if(aux=='Bibliotecario'){
                document.getElementById("form_modif_tipo").selectedIndex='3';
            }else{
                document.getElementById("form_modif_tipo").selectedIndex='0';
            }
            
            document.getElementById("form_modif_id").value = idusu;
            
            $("#modificar").css('display','block');
        }

        function mostrar(){
            $("#insertar").show();
        }

        function cerrar(){
            $("#insertar").hide();
             $("#modificar").hide();
        }    
       
</script>
