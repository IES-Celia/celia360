

<?php
	if (isset($error)) {
		echo "<p style='color:red'>".$error."</p>";
	}
	if (isset($mensaje)) {
		echo "<p style='color:green'>".$mensaje."</p>";
	}

?>



<div id="caja">
    
       <legend> 

       Login

      </legend>
        

          
            
    
<?php
echo"<form action='".site_url("Usuario/checkLogin")."' method='get'>";
 ?> <br/>
    <label for="user"><i class="far fa-user"></i> Nick</label>
    
    <br/>
    <input type='text' id="user" name='user' required>
    <br/><br/>
    <label for="pass"><i class="fas fa-lock"></i> Password</label>
  
    <br/>
    <input type='password' id="pass" name='pass' required>
    <br/><br/>
    <input type='submit' value="Entrar"/>
    <br/>
    <br/>
<?php
  echo "<input type='button' onclick='location.href=\"".site_url("Usuario/showRegisterForm")."\";' value='Darse de alta'";
?> 
<br/>
<br/>
<br/>

 </form>
  

</div>