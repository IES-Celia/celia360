<?php
  /* PLANTILLA PARA EL HOMEPAGE.
   * Incluye header + menu + vista + footer.
   * La vista puede ser cualquiera del homepage (visita libre, guiada, puntos destacados, créditos...).
   * La vista main_biblioteca se incluye como un caso especial porque debe de estar dentro del div id="portadaca" para funcionar bien.
   */
	if($vista == 'portada/visita'){
		include("visita_header.php");
		include($vista.".php");
		include("visita_footer.php");
	}else{
		include("main_header.php");
		include("main_menu.php");
		if (isset($showBiblioteca))
				include("main_biblioteca.php");
		include($vista.".php");
	}
  
  
 