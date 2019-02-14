<?php
if (!isset($permiso)) $permiso = false;
if($permiso){
  include("admin_header.php");
  include("admin_menu.php");
  include($vista.".php");
  include("admin_footer.php");
}else {
	include("login_header.php");
  include("usuario/formLogin.php");
	include("login_footer.php");
    
}
?>

