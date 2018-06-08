	<h1 align="center">Opciones de portada</h1>
	<br>
	<fieldset>
        <div id="caja2">

	<?php
            $datosPortada=$opcionesPortada[0];

            echo"<form action='".site_url("tour/modificar_portada")."' method='post' enctype='multipart/form-data'>";
        ?>
            Titulo de la web:<br/>  <input type='text' name='titulo_web' value='<?php echo $datosPortada['titulo_web'];?>'><br/>
	    Imagen de portada:<br/> <img src='<?php echo base_url("assets/imagenes/portada/").$datosPortada['imagen_web'];?>' width='200'><br/><input type='file' name='nueva_imagen_web' ><br/><br/>
            Texto visita libre:<br/>  <input type='text' name='subtitulo_visita_libre' value='<?php echo $datosPortada['subtitulo_visita_libre'];?>'><br/>
            Texto visita guiada:<br/>  <input type='text' name='subtitulo_visita_guiada' value='<?php echo $datosPortada['subtitulo_visita_guiada'];?>'><br/>
            Texto puntos destacados:<br/>  <input type='text' name='subtitulo_puntos_destacados' value='<?php echo $datosPortada['subtitulo_puntos_destacados'];?>'><br/>
            Texto biblioteca:<br/> <input type='text' name='subtitulo_biblioteca' value='<?php echo $datosPortada['subtitulo_biblioteca'];?>'><br/>
            Fuente:<br/>  <input type='text' name='nombre_fuente' value='<?php echo $datosPortada['nombre_fuente'];?>'><br/>
            Color fuente:<br/>  <input type='text' name='color_fuente' value='<?php echo $datosPortada['color_fuente'];?>'><br/>
            <p>
            Mostrar opción "Biblioteca": 
            <select name='show_biblioteca'>
                <option value='1'>Mostrar</option>
                <option value='0' <?php if ($datosPortada['show_biblioteca'] == 0) echo "selected";?> >Ocultar</option>
            </select>
            </p>
            <p>
            Mostrar botón "Historia":  
            <select name='show_historia'>
                <option value='1'>Mostrar</option>
                <option value='0' <?php if ($datosPortada['show_historia'] == 0) echo "selected";?> >Ocultar</option>
            </select>
            </p>
            <input type='submit' value='Enviar'><br><br>
            </form>  
        </div>
	</fieldset>