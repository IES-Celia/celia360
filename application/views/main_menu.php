<!-- MENU PRINCIPAL DEL HOMEPAGE.
     Incluye enlaces a todas las funciones accesibles desde el homepage -->

        <header id="header_portada"  >
            <div class="contenedor_portada">
            <nav id="nav_portada">
             <ul>
                 <li><a href="<?php echo site_url();?>"><img src="<?php echo base_url("assets/imagenes/portada/logo.png"); ?>"/></a> </li>
                  <li><a id="opcionlibre_portada" href="<?php echo site_url("tour/visita/libre"); ?>" onclick="visita_opcion('get_json_libre')" >Visita libre</a></li>
                 <li><a id="opcionguiada_portada" href="<?php echo site_url("tour/visita/guiada"); ?>" onclick="visita_opcion('get_json_guiada')" >Visita Guiada</a></li>
                 <li><a id="opciondestacada_portada" href="<?php echo site_url("PuntosDestacados"); ?>">Destacados</a></li>
                 <?php 
                 // La opción de menú "biblioteca" solo se muestra si está configurado así en las opciones de portada
                 if ($con["show_biblioteca"]== "1") {  
                    echo "<li><a id='clickbiblio' href='".site_url("biblioteca/vertodosloslibros")."'>Biblioteca</a></li>";
                 }
                 ?>
                 <li><a id="creditos_portada" href="<?php echo site_url("tour/creditos"); ?>" >Créditos</a></li>
             </ul>
            </nav>
            </div>

        </header>


    
