<?php

    
    
echo "
<h1>Modificar usuario</h1>
<form action='".site_url("usuario/modUsuario")."' method='get'>
    Nombre de usuario:<input type='text' name='username' value='".$DatosMod[0]["nombre_usuario"]."'><br/>
    Password:<input type='text' name='pass' value='".$DatosMod[0]["password"]."'><br/>
    Email:<input type='text' name='email' value='".$DatosMod[0]["email"]."'><br/>
    Nombre:<input type='text' name='nombre' value='".$DatosMod[0]["nombre"]."'><br/>
    Apellidos:<input type='text' name='apellidos' value='".$DatosMod[0]["apellido"]."'><br/>
    <input type='hidden' name='id' value='".$DatosMod[0]["id_usuario"]."'><br/>
    <input type='submit'>
</form>";
?>
