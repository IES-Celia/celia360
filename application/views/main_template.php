<?php
  /* PLANTILLA PARA EL HOMEPAGE.
   * Incluye header + menu + vista + footer.
   * La vista puede ser cualquiera del homepage (visita libre, guiada, puntos destacados, créditos...).
   * La vista main_biblioteca se incluye como un caso especial porque debe de estar dentro del div id="portadaca" para funcionar bien.
   */
  include("main_header.php");
  /*echo '<div id="portadaca" style="z-index:100"; >';*/
  include("main_menu.php");
  if (isset($showBiblioteca))
      include("main_biblioteca.php");
  /*echo '</div>';*/
  include($vista.".php");
  include("main_footer.php");
  
  
 