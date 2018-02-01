<?php

defined('BASEPATH') OR exit('No se permite el acceso directo al script');
//formulario para mostrar la tabla imagenes, con sus datos 
if (isset($mensaje)) {
    echo "<p style='color:green'>" . $mensaje . "</p>";
}
// CAMPOS DE LA TABLA : id_imagen,  titulo_imagen,  texto_imagen,  url_imagen , fecha
echo "<br><a class='insert' href='" . site_url("imagen/formulario_insertar_imagen") . "'>Insertar imagen</a><br>";
echo "<a class='insert' href='" . site_url("imagen/imagen") . "'>Volver al Men&uacute;</a><br>";
echo "<br><table id='cont' border='1'>";
echo '<tr><th>Id</th><th>T&iacute;tulo</th><th>Texto</th><th>Url</th><th>Miniatura</th><th>Fecha</th><th>Borrar Imagen</th><th>Modificar Imagen</th></tr>';

foreach ($lista_imagenes as $ima) {
    $url_modificar = site_url("imagen/modificar_imagen/") . $ima["id_imagen"];
    $url_borrar = site_url("imagen/borrar_imagen/") . $ima["id_imagen"];
    echo "<tr><td>" . $ima["id_imagen"] . "</td><td>" . $ima["titulo_imagen"] . "</td><td>" . 
	      $ima["texto_imagen"] . "</td><td>" . $ima["url_imagen"] . "</td><td align='center'><img src='" . 
		  base_url("assets/imagenes/imagenes-hotspots" . $ima["url_imagen"]) . "' height='100px'></td><td>" . 
		  $ima["fecha"] . "</td>
    	<td><a onclick = 'return confirm(\"¿Estás seguro que deseas eliminar el registro\");' href='".$url_borrar."'>Borrar</a></td>
    	<td><a href='" . $url_modificar . "'>Modificar</a></td></tr>";
}
echo "</table><br>";