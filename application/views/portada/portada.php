<!-- PORTADA PRINCIPAL DE HOMEPAGE -->
<!-- Crea la capa main y el slider de la portada con la imagen de portada de fondo-->
<!-- También se inserta aquí el botón para visualizar los libros de historia -->

        <main>
            <div id="responsividad"> <!-- WIP. Su css está en estilos_portada.css -->
                <a href="<?php echo site_url();?>">Home</a> 
                <a id="opcionlibre_portada" href="<?php echo site_url("tour/visita/libre"); ?>" onclick="visita_opcion('get_json_libre')" >Visita libre</a>
                <a id="opcionguiada_portada" href="<?php echo site_url("tour/visita/guiada"); ?>" onclick="visita_opcion('get_json_guiada')" >Visita Guiada</a>
                <a id="opciondestacada_portada" href="<?php echo site_url("PuntosDestacados"); ?>">Destacados</a>
                 <?php 
                 // La opción de menú "biblioteca" solo se muestra si está configurado así en las opciones de portada
                 if ($con["show_biblioteca"]== "1") {  
                    echo "<a id='clickbiblio' href='".site_url("biblioteca/vertodosloslibros")."'>Biblioteca</a>";
                 }
                 ?>
                 <a id="creditos_portada" href="<?php echo site_url("tour/creditos"); ?>" >Créditos</a>
            </div>
            <div id="slider1_portada" style="background-image:url('<?php echo site_url("assets/imagenes/portada/portada.jpg"); ?>')">
                 <div class="contenedor_portada">
                     <h1 id="titulito"><?php echo $con["titulo_web"] ?></h1>
                     <div id="parrafito">
                         <p id="descripcion_portada"></p>
                        <div id="separador_portada"> </div>
                        <?php if ($con["show_historia"] == "1") {
                            // El botón "Historia" solo se muestra si está configurado así en las opciones de portada
                            echo "<a href='".site_url("biblioteca/abrir_phistoria")."' class='btn'>HISTORIA</a>";
                        }
                        ?>
                     </div>
                 </div> 
                 <div id="poweredBy">
                    <h1>Powered by Celia Viñas 2ºDAW 17/18&nbsp;&nbsp;</h1>
                    <img src="<?php echo base_url("assets/imagenes/portada/logo.png"); ?>"/>
                 </div>
            </div>
        </main>
      
      
