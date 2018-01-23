
<h1>Registro de usuarios</h1>
<?php
echo"<form action='".site_url("usuario/processRegisterForm")."' method='get'>";
?>
<div id="caja">
    <label for="username">Nombre de usuario</label>
    <input type='text' name='username' id="username"><br/>
    <label for="pass">Password</label>
    <input type='password' id="pass" name='pass'><br/>
    <label for="email">Email</label>
    <input type='text' name='email' id="email"><br/>
    <label for="name">Nombre</label>
    <input type='text' name='nombre' id="nombre"><br/>
    <label for="subname">Apellidos</label>
    <input type='text' name='subname' id="subname"><br/>
    <label for="foto">Foto Perfil</label>
    <input type='file' name="Foto" id="foto" accept="image/*"><br/>
    <label for="tipo">Tipo</label>
    <select name="tipo" id="tipo">
    		<option value="1">Administrador</option>
    		<option value="2">Controlador recorrido</option>
    		<option value="3">Bibliotecario</option>
    </select>
        <br/>
    <input type='submit'>
</form>    
</div>
    
