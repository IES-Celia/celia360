
<?php
	if (isset($datos["error"])) {
		echo "<p style='color:red'>".$datos["error"]."</p>";
	}
	if (isset($datos["mensaje"])) {
		echo "<p style='color:green'>".$datos["mensaje"]."</p>";
	}

?>
<div id="caja">
<div id="titulo-login"><h1>Login</h1></div>
<?php
echo"<form action='".site_url("Usuario/checkLogin")."' method='get'>";
 ?>   
    <label for="user">Nick</label>
    <input type='text' id="user" name='user'><br/>
    
    <label for="pass">Password</label>
    <input type='text' id="pass" name='pass'><br/>

    <input type='submit'>
</form>

<?php
 echo"<a href= '".site_url("Usuario/showRegisterForm")"'> Quiero darme de alta</a></td>"
 ?>
</div>