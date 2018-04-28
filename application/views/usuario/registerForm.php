<style>
    .escondida {
        display: none;
    }
</style>



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
    <label class="escondida">Dejar esto en blanco (para detectar bots)</label>
    <input class="escondida" type="text" id="dejarenblanco" name="dejarenblanco" />
    </select>
    <input type='submit' value='Aceptar'><input type='button' value='Cancelar' onclick='location.href="<?php echo site_url("usuario");?>"'>
</form>

</div>
    
