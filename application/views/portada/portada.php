<!-- PORTADA PRINCIPAL DE HOMEPAGE -->
<!-- Crea la capa main y el slider de la portada con la imagen de portada de fondo-->
<!-- También se inserta aquí el botón para visualizar los libros de historia -->

        <main>
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
            </div>
        </main>
      
      
