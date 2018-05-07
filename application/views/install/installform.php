<?php
echo"<p style='text-align:center; color:red;'>".$mensaje."</p>";
?>
<div id="caja">
<?php   
echo"<form action='".site_url("install/inserbd")."' method='post'>";
?>

 <h1>Instalaci&oacute;n: parte 1</h1>
    <label for="host">Nombre del host</label>
    <input type='text' name='host' id="host" required>
    <label for="namebd">Nombre de la base de datos</label>
    <input type='text' id="namebd" name='namebd' required>
    <label for="nameuse">Usuario de la base de datos</label>
    <input type='text' name='nameuse' id="nameuse" required>
    <label for="passbd">Contraseña de la base de datos</label>
    <input type='password' name='passbd' id="passbd" required>
    <label for="base">Base URL del sitio</label>
    <input type='text' name='base' id="base" required>
    <input type='submit' value='Aceptar'><input type='button' value='Cancelar' onclick='location.href="<?php echo site_url("install");?>"'>
</form>

</div>
