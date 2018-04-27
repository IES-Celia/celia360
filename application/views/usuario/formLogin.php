





<div id="caja">
    
       <legend> 

       Login

      </legend>
        

          
            
    
<?php
echo"<form action='".site_url("Usuario/checkLogin")."' method='post'>";
 ?> <br/>
    <label for="user"><i class="far fa-user"></i> Nick</label>
    
    <br/>
    <input type='text' id="user" name='user' required>
    <br/><br/>
    <label for="pass"><i class="fas fa-lock"></i> Password</label>
  
    <br/>
    <input type='password' id="pass" name='pass' required>
    <input type='submit' value="Entrar"/>

<?php
  echo "<input type='button' onclick='location.href=\"".site_url("Usuario/showRegisterForm")."\";' value='Darse de alta'>";
?> 


 </form>
  

</div>
