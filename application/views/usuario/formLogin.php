

<?php
	if (isset($error)) {
		echo "<p style='color:red'>".$error."</p>";
	}
	if (isset($mensaje)) {
		echo "<p style='color:green'>".$mensaje."</p>";
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
    <input type='password' id="pass" name='pass'><br/>

    <input type='submit'>
</form>
<?php  
	echo"<a href= '".site_url("Usuario/showRegisterForm")."'> Darse de alta </a>";
?>


</div>