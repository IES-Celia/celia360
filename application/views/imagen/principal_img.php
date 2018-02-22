<link rel='stylesheet' href=https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css>
<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js'></script>
<script>
    //buscador con ajax
    $(document).ready(function(){
	//utilizamos el evento keyup para coger la información
	//cada vez que se pulsa alguna tecla con el foco en el buscador
	$(".autocompletar").keyup(function(){
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
<style>
        /*MODAL*/
/* Z-index de #mask debe ser menor que #boxes.window*/
#mask #mask2 {
  position:absolute;
  z-index:9000;
  background-color:#000;
  display:none;
}
 
#boxes .window, #boxes2 .window {
  position:absolute;
  width:440px;
  height:200px;
  display:none;
  z-index:9999;
  padding:20px;
}
 
 
/* Personaliza tu ventana modal aquí, puedes agregar una imagen de fondo también */
#boxes #dialog, #boxes2 #dialog2 {
  width:375px;
  height:203px;
}
</style>

<?php
            //LISTADO DE IMÁGENES\\
defined('BASEPATH') OR exit('No se permite el acceso directo al script');
//formulario para mostrar la tabla imagenes, con sus datos 
if (isset($mensaje)) {
    echo "<p style='color:green'>" . $mensaje . "</p>";
}
if (isset($error)) {
    echo "<p style='color:red'>" . $error . "</p>";
}
    //TÍTULO
echo '<h1 id="titulo">IMAGEN</h1>';

//El evento onpaste se produce cuando el usuario pega algo de contenido en un elemento.
        //BUSCADOR AJAX
?>
<div class="wrapper">
    <input type="text" name="autocompletar" maxlength="15" onpaste="return false" class="autocompletar" placeholder="Escribe tu búsqueda" />
    
    <div class="contenedor"></div>
</div>
<!-- #dialog es el id de un DIV definido en el código que está a continuación -->

    <a href="#dialog" name="modal">Modal Insertar</a>
    &nbsp;&nbsp;&nbsp;
    <a href="#dialog2" name="modal2">Modal Modificar</a>
<?php

//he quitada la columna texto de la vista, pero sigue en la bd 
//cabecera  <th>Texto</th>
//tabla <td>" . $ima["texto_imagen"] . "</td>
echo "<br><table id='cont'>";
echo '<tr><th>Id</th><th>T&iacute;tulo</th><th>Url</th><th>Miniatura</th><th>Fecha</th><th>Modificar Imagen</th><th>Borrar Imagen</th></tr>';

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


            <!--MODAL PARA INSERTAR IMAGEN-->
<!-- #dialog es el id de un DIV definido en el código que está a continuación -->
<a href="#dialog" name="modal">Modal Insertar</a>
 
<div id="boxes">
 
    <!-- #Aqui personalizas tu ventana modal -->
 
    <div id="dialog" class="window">
    
    <?php
        // Formulario de registro de imágenes
        defined('BASEPATH') OR exit('No se permite el acceso directo al script');
        if (isset($mensaje)) {
            echo "<p style='color:green'>" . $mensaje . "</p>";
        }
        if (isset($error)) {
            echo "<p style='color:red'>" . $error . "</p>";
        }
    ?>
    <!-- AQUI EMPIEZA LA VISTA DE INSERTAR IMAGEN -->
    <section  id="ContenedorImagen">

        <form class="for" enctype="multipart/form-data" action='<?php echo site_url("imagen/insertar_imagen"); ?>' method="post">

            <h1>Insertar imagen</h1> 
            <a href="#" class="close">Cerrar</a>

            <input type='hidden' name='accion' value='insertar_imagen'>
            <div>
                <input id= "id_imagen" name='id_imagen' type ="hidden"><br />
                <label id= "label_titulo" for="titulo">T&iacute;tulo:</label>
                <input id="titulo" name='titulo_imagen' placeholder="Introduzca el t&iacute;tulo" required><br />
            </div>
            <div>
                <label for="texto_imagen">Texto:</label>
                <textarea id="texto_imagen" name='texto_imagen' placeholder="Introduzca la descripci&oacute;n de la imagen"></textarea><br>
            </div>
            <div>
                <label for="fecha">Fecha:</label>
                <input type="date" id="fecha" name='fecha' placeholder="Introduzca la fecha" value="<?php echo date("Y-m-d"); ?>" required><br />
            </div>
            <div>
                <!-- MAX_FILE_SIZE debe preceder al campo de entrada del fichero -->
                <input type="hidden" name="MAX_FILE_SIZE" value="20000000" />
                <label for="imagen">Imagen:</label>
                <input type="file" name="imagen"  id="imagen" placeholder="Seleccionar la imagen" required><br />
            </div>
            <input type="hidden" name="accion" value="insertar_imagen"><br>
            <input type="submit" name="enviar" value="Guardar imagen"/>
        </form>
    </section>
 
   </div>
 
   <!-- No elimines el div#mask, porque lo necesitarás para rellenar la pantalla -->
    <div id="mask"></div>
</div>

        <!--MODAL PARA MODIFICAR IMAGEN-->

<!-- #dialog es el id de un DIV definido en el código que está a continuación -->

    <a href="#dialog2" name="modal2">Modal Modificar</a>
    
<div id="boxes2">
 
    <!-- #Aqui personalizas tu ventana modal -->
 
    <div id="dialog2" class="window">

    <?php
        defined('BASEPATH') OR exit('No se permite el acceso directo al script');
        // Formulario para modificar la imagen
        if (isset($mensaje)) {
            echo "<p style='color:green'>" . $mensaje . "</p>";
        }
        $du = $lista_imagenes[0];
        ?>

        <form class="for" enctype="multipart/form-data"  action='<?php echo site_url("imagen/actualizar_imagen"); ?>' method='post'>
            <h1>Modificar Imagen</h1>
            <a href="#" class="close">Cerrar</a>
            <?php
            echo "<input type='hidden' name='id_imagen' value='" . $du['id_imagen'] . "'><br/>";
            echo "T&iacute;tulo:<input type='text' name='titulo_imagen' value='" . $du['titulo_imagen'] . "'><br/>";
            echo "<br>Texto:<input type='text' name='texto_imagen' value='" . $du['texto_imagen'] . "'><br/>";
            echo '<input type="hidden" name="MAX_FILE_SIZE" value="20000000" />';
            echo "<br>Fecha:<input type='date' name='fecha'  value='" . $du['fecha'] . "'><br/>";
            echo "<br>Imagen:<input type='file' id='imagen' name='imagen'value='" . $du['url_imagen'] . "'><br/>";
            echo "<input type='hidden' name='url_imagen' value='" . $du['url_imagen'] . "'>";
            echo "<img width='100px' src='" . base_url("assets/imagenes/imagenes-hotspots/" . $du['url_imagen']) . "'><br><p>" . $du['url_imagen'] . "</p><br>";
            ?>   
            <input type='submit' name ='actualizar' value = 'Aceptar'>
        </form>

    </div>
 
   <!-- No elimines el div#mask2, porque lo necesitarás para rellenar la pantalla -->
    <div id="mask2"></div>
</div>
 
<script>  
        //MODAL\\
 
$(document).ready(function() {    
    
    //insertar---------
    if($('div #dialog .window')){
         
        //selecciona toda la etiqueta con nombre igual a modal  
        $('a[name = modal]').click(function(e) {  
            //Cancelar el comportamiento del enlace 
            e.preventDefault();  
            //Obtener la etiqueta A  
            var id = $(this).attr('href');         
        
            //Obtenga la altura y el ancho de la pantalla 
            var maskHeight = $(document).height();  
            var maskWidth = $(window).width();  
     
            //Configure la altura y el ancho para enmascarar para llenar toda la pantalla 
            $('#mask').css({'width':maskWidth,'height':maskHeight});  
         
            //efecto de transición      
            $('#mask').fadeIn(1000);      
            $('#mask').fadeTo("slow",0.8);    
     
            //Obtener la altura y el ancho de la ventana
            var winH = $(window).height();  
            var winW = $(window).width();  
               
            //Establecer la ventana emergente al centro
            $(id).css('top',  winH/2-$(id).height()/2);  
            $(id).css('left', winW/2-$(id).width()/2);  
     
            //efecto de transición  
            $(id).fadeIn(2000);  
     
        });  

    }  
    if($('div #dialog2 .window')){ 

        //modificar----------------------
        $('a[name = modal2]').click(function(e) {  
            //Cancelar el comportamiento del enlace 
            e.preventDefault();  
            //Obtener la etiqueta A  
            var id = $(this).attr('href'); 
        
            //Obtenga la altura y el ancho de la pantalla 
            var maskHeight = $(document).height();  
            var maskWidth = $(window).width();  
     
            //Configure la altura y el ancho para enmascarar para llenar toda la pantalla 
            $('#mask2').css({'width':maskWidth,'height':maskHeight});  
         
            //efecto de transición      
            $('#mask2').fadeIn(1000);      
            $('#mask2').fadeTo("slow",0.8);    
     
            //Obtener la altura y el ancho de la ventana
            var winH = $(window).height();  
            var winW = $(window).width();  
               
            //Establecer la ventana emergente al centro
            $(id).css('top',  winH/2-$(id).height()/2);  
            $(id).css('left', winW/2-$(id).width()/2);  
     
            //efecto de transición  
            $(id).fadeIn(2000);  
     
        });  
    }
    //si se hace clic en el botón Cerrar 
    $('.window .close').click(function (e) {  
        //Cancelar el comportamiento del enlace  
        e.preventDefault();  
        $('#mask, .window').hide();
        $('#mask2, .window').hide(); 
    });      
     
    //si se hace clic en la máscara 
    $('#mask').click(function () {  
        $(this).hide();  
        $('.window').hide();  
    }); 
    //si se hace clic en la máscara 
    $('#mask2').click(function () {  
        $(this).hide();  
        $('.window').hide();  
    });  

});  
 
</script>    

<script>
    //confirmación para borrar
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
