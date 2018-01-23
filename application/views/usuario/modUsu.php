<?php
	$usu = $datos["DatosMod"][0];
	
echo "
<h1>Modificar usuario</h1>
<form action='".site_url("usuario/modUsuario")."' method='get'>
    Nombre de usuario:<input type='text' name='username' value='$usu[1]'><br/>
    Password:<input type='text' name='pass' value='$usu[2]'><br/>
    Email:<input type='text' name='email' value='$usu[3]'><br/>
    Nombre:<input type='text' name='nombre' value='$usu[4]'><br/>
    Apellidos:<input type='text' name='apellidos' value='$usu[5]'><br/>
    Foto Perfil:<input type='file' name='foto' value='$usu[6]'><br/>
    <input type='hidden' name='id' value='$usu[0]'><br/>
    <input type='submit'>
</form>";
?>

