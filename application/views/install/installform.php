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
    <input type='password' id="namebd" name='namebd' required>
    <label for="nameuse">Usuario de la base de datos</label>
    <input type='text' name='nameuse' id="nameuse" required>
    <label for="passbd">Contraseña de la base de datos</label>
    <input type='text' name='passbd' id="passbd" required>
    <input type='submit'>
</form>

</div>
