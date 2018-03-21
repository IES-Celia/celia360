



<?php
echo"<p style='text-align:center; color:red;'>".$mensaje."</p>";   
echo"<form action='".site_url("usuario/processregisterform")."' method='post'>";
?>
<div id="caja">
    <h1>Registro de usuarios</h1>
    <label for="username">Nombre de usuario</label>
    <input type='text' name='username' id="username" required>
    <label for="pass">Password</label>
    <input type='password' id="pass" name='pass' required>
    <label for="email">Correo</label>
    <input type='text' name='email' id="email" required>
    <label for="name">Nombre</label>
    <input type='text' name='nombre' id="nombre" required>
    <label for="subname">Apellidos</label>
    <input type='text' name='subname' id="subname" required>
    </select>
    <input type='submit'>
</form>

</div>
    
