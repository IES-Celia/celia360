	<h1 align="center">Opciones de portada</h1>
	<br>
	<fieldset class='for'>

	<?php
            $datosPortada=$opcionesPortada[0];

            echo"<form action='".site_url("tour/modificar_portada")."' method='post' enctype='multipart/form-data'>";
        ?>
            Titulo de la web:  <input type='text' name='titulo_web' value='<?php echo $datosPortada['titulo_web'];?>'><br/>
	    Imagen de portada: <img src='<?php echo base_url("assets/imagenes/portada/portada.jpg");?>' width='200'><input type='file' name='imagen_web'><br>
            Texto visita libre:  <input type='text' name='subtitulo_visita_libre' value='<?php echo $datosPortada['subtitulo_visita_libre'];?>'><br/>
            Texto visita guiada:  <input type='text' name='subtitulo_visita_guiada' value='<?php echo $datosPortada['subtitulo_visita_guiada'];?>'><br/>
            Texto puntos destacados:  <input type='text' name='subtitulo_puntos_destacados' value='<?php echo $datosPortada['subtitulo_puntos_destacados'];?>'><br/>
            Texto biblioteca: <input type='text' name='subtitulo_biblioteca' value='<?php echo $datosPortada['subtitulo_biblioteca'];?>'><br/>
            Fuente:  <input type='text' name='nombre_fuente' value='<?php echo $datosPortada['nombre_fuente'];?>'><br/>
            Color fuente:  <input type='text' name='color_fuente' value='<?php echo $datosPortada['color_fuente'];?>'><br/>
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
            <input type='submit'><br><br>
            </form>  
	</fieldset>