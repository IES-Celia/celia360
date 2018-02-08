<?php
if (!isset($permiso)) $permiso = false;

if($permiso){
  include("admin_header.php");
  include("admin_menu.php");
  include($vista.".php");
  include("admin_footer.php");
}else {
    include("usuario/formLogin.php");
}
?>