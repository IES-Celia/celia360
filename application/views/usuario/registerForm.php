
<style>

    body{
        background: linear-gradient(rgba(0,255,255,0.4),rgba(255,255,255,0.7),rgba(0,255,255,0.4)),linear-gradient(to left,rgba(0, 16, 99,0.8),rgba(0,255,255,0.7),rgba(0, 16, 99,0.8)),radial-gradient(red,white 10%,red);
    }

</style>



<?php
echo"<p style='text-align:center; color:red;'>".$mensaje."</p>";   
echo"<form action='".site_url("usuario/processregisterform")."' method='get'>";
?>
<div id="caja">
    <h1>Registro de usuarios</h1>
    <label for="username">Nombre de usuario</label>
    <input type='text' name='username' id="username"><br/>
    <br/>
    <label for="pass">Password</label>
    <input type='password' id="pass" name='pass'><br/><br/>
    <label for="email">Email</label><br/>
    <input type='text' name='email' id="email"><br/>
    <br/>
    <label for="name">Nombre</label>
    <input type='text' name='nombre' id="nombre"><br/><br/>
    <label for="subname">Apellidos</label>
    <input type='text' name='subname' id="subname"><br/>
    </select>
        <br/>
    <input type='submit'>
    <br/>
    <br/>
</form>

</div>
    
