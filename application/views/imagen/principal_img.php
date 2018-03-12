<link rel='stylesheet' href=https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css>
<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js'></script>
<script>
    
     $(document).ready(function(){
	//utilizamos el evento keyup para coger la información
	//cada vez que se pulsa alguna tecla con el foco en el buscador
	$("#autocompletar").keyup(function(){
		//en info tenemos lo que vamos escribiendo en el buscador
		var info = $(this).val();
		//hacemos la petición al método autocompletar del controlador home 
		//pasando la variable info
                $.post('<?php echo site_url("imagen/busqueda_ajax/");?>' + info, null, function(data){
						
			//si el controlador nos devuelve algo
			if(data !== ''){
	
				//en el div con clase contenedor mostramos la info
				//$('.contenedor').show();
				//$(".contenedor").html(data);
                                $('#cont').empty();
                                $('#cont').html(data);
								
			}else{
								
				$('#cont').empty();
                                $('#cont').html("<strong>No hay datos</strong>");
								
			}
	    })
					
    })
				
	//buscamos el elemento pulsado con live y mostramos un alert
	$(".contenedor").find("a").live('click',function(e){
		e.defaultPrevented;
                $("input[name=autocompletar]").val($(this).text());
		//alert($(this).html());
	});
			
})
      
    
</script>

<?php
defined('BASEPATH') OR exit('No se permite el acceso directo al script');
//formulario para mostrar la tabla imagenes, con sus datos 
if (isset($mensaje)) {
    echo "<p style='color:green'>" . $mensaje . "</p>";
}
if (isset($error)) {
    echo "<p style='color:red'>" . $error . "</p>";
}
//título
//echo '<h1>IMAGEN</h1>';
// CAMPOS DE LA TABLA : id_imagen,  titulo_imagen,  texto_imagen,  url_imagen , fecha
echo "<a class='insert' href='" . site_url("imagen/formulario_insertar_imagen") . "'>Insertar imagen</a>";

//El evento onpaste se produce cuando el usuario pega algo de contenido en un elemento.
?>
<div class="wrapper">
    <input type="text" class="buscador" id="autocompletar" name="autocompletar" maxlength="15" onpaste="return false" class="autocompletar" placeholder="Escribe tu búsqueda" />
    
    <div class="contenedor"></div>
</div>
<?php

//he quitada la columna texto de la vista, pero sigue en la bd 
//cabecera  <th>Texto</th>
//tabla <td>" . $ima["texto_imagen"] . "</td>
echo "<table id='cont'>";
echo '<tr id="cabecera"><th>Id</th><th>T&iacute;tulo</th><th>Url</th><th>Miniatura</th><th>Fecha</th><th>Modificar Imagen</th><th>Borrar Imagen</th></tr>';

foreach ($lista_imagenes as $ima) {
    $fila = $ima["id_imagen"];
    $nombre_archivo = $ima["id_imagen"]."_miniatura.jpg";
    $url_modificar = site_url("imagen/modificar_imagen/") . $ima["id_imagen"];
    $url_borrar = site_url("imagen/borrar_imagen/") . $ima["id_imagen"];
    echo "<tr id='imagen-" . $fila . "'><td>" . $ima["id_imagen"] . "</td><td>" . $ima["titulo_imagen"] . "</td><td>" . $ima["url_imagen"] . "</td><td align='center'><a href='".
    base_url("assets/imagenes/imagenes-hotspots/" . $ima["url_imagen"])."'><img src='" .
    base_url("assets/imagenes/imagenes-hotspots/" . $nombre_archivo) . "'></a></td><td>" .
    $ima["fecha"] . "</td>
        <td><a href='" . $url_modificar . "'><i class='fa fa-edit' style='font-size:30px;'></i></a></td>
    	<td><a class='delete' href='#' onclick='borrar_imagen($fila)'><i class='fa fa-trash' style='font-size:30px;'></i></a></td></tr>";
}
echo "</table><br>";
?>

<script>
    function borrar_imagen(id_imagen) {
        if (confirm("¿Estás seguro?")) {
            $.get("<?php echo site_url('imagen/borrar_imagen/'); ?>" + id_imagen, null, respuesta);
        }
    }

    function respuesta(r) {
        if (r == '0') {
            alert("Error al borrar la imagen");
        } else {
            selector = "#imagen-" + r;
            alert("Imagen borrada con éxito");
            $(selector).remove();
        }
    }
</script>
