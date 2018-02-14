

<?php
	if (isset($error)) {
		echo "<p style='color:red'>".$error."</p>";
	}
	if (isset($mensaje)) {
		echo "<p style='color:green'>".$mensaje."</p>";
	}

?>

<style>


    body{
           background: -moz-radial-gradient(center, #ABCEBA 0%, #1C6EA4 100%, #C5C5C5 100%);
           background: -webkit-radial-gradient(center, #ABCEBA 0%, #1C6EA4 100%, #C5C5C5 100%);
           background: radial-gradient(ellipse at center, #ABCEBA 0%, #1C6EA4 100%, #C5C5C5 100%);
    
    }
    
</style>

<div id="caja">
    
       <legend> Login </legend>
        <fieldset>

            <br>
            
    
<?php
echo"<form action='".site_url("Usuario/checkLogin")."' method='get'>";
 ?>   
    <label for="user">Nick</label>
    <br>
    <input type='text' id="user" name='user'>
    <br><br>
    <label for="pass">Password</label>
    <br>
    <input type='password' id="pass" name='pass'>
    <br><br><br>
    <input type='submit'>
    
</form>

<?php  
	echo"<a href= '".site_url("Usuario/showRegisterForm")."'> Darse de alta </a>";
?>

    </fieldset>

</div>