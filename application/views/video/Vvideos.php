  <link rel='stylesheet' href=https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css>
  <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js'></script>
<script>
    //buscador con ajax
    $(document).ready(function(){
		
	//utilizamos el evento keyup para coger la información
	//cada vez que se pulsa alguna tecla con el foco en el buscador
	$("#autocompletar").keyup(function(){
		
		//en info tenemos lo que vamos escribiendo en el buscador
		var info = $(this).val();
		//hacemos la petición al método autocompletar del controlador home 
		//pasando la variable info
                $.post('<?php echo site_url("video/videosajax/");?>' + info, null, function(data){
						
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
	})
			
});
</script> 
 <style type="text/css">
   
     #modificar{
        display:none;
        z-index: 1;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        border: 3px solid ;
        background-color:rgb(0,0,0); 
        background-color:rgba(0,0,0,0.4);
    }

    #insertar{
        display:none;
        z-index: 1;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        border: 3px solid ;
        background-color:rgb(0,0,0); 
        background-color:rgba(0,0,0,0.4);
    }
   

    .cerrar{
        position: relative;
    top:15px;
    left:44%;
    
    }
    .img-cerrar{
         width: 20px; height: 20px;
    }

</style>

<?php
echo"<a class='insert' onclick='mostrar()'><i class='fas fa-plus-circle'></i> Insertar Video</a>";
echo'<input class="buscador" id="autocompletar" type="text" name="autocompletar" maxlength="15" onpaste="return false" class="autocompletar" placeholder="Escribe tu búsqueda" />';
echo"<table  id='cont'><tr id='cabecera'>
<th>ID</th>
<th>URL</th>
<th>Descripcion</th>
<th>Ver video</th>
<th>Modificar</th>
<th>Eliminar</th></tr>
";

foreach ($tabla as $re) {
    $id=$re["id_vid"];
    echo'<tr id="contenido"><td id="id_vid'.$id.'">' . $re["id_vid"] . '</td>';
    echo'<td id="url_vid'.$id.'">' . $re["url_vid"] . '</td>';
    echo'<td id="desc_vid'.$id.'">' . $re["desc_vid"] . '</td>';
    echo"<td><a target='_blank' href='". $re["url_vid"] ."'>visitar enlace</a></td>";
    echo"<td><a onclick='mostrarm(". $re["id_vid"] .")'><i class='fa fa-edit' style='font-size:30px;'></i></a></td>";
    echo"<td><a href='#' onclick='borrarvid(". $re["id_vid"] .")'><i class='fa fa-trash' style='font-size:30px;'></i></a></td></tr>";
}
echo "</table>";
$ant = $primero - $cantidad;
if($ant<0)$ant=0;
$sig = $primero + $cantidad;
if($sig>$total) $sig=$total-1;
echo "<div id='div_pag'><a class='paginacion' href='". site_url("video/mostrarvideo/") ."$ant'>Anterior</a> - <a class='paginacion' href='". site_url("video/mostrarvideo/") ."$sig'>Siguiente</a></div></br></br>";
//Capa formulario modificar
echo "
<div id='modificar'>
<div id='caja'>
<a class='cerrar' href='#' onclick='cerrar()'><img class='img-cerrar' src='" .
                base_url("assets/css/cerrar_icon.png") . "'></img></a>
    <h1>Modificar Audio</h1>
    <form action='" . site_url("video/modificarvideo/" . $id) . "' method='post' enctype='multipart/form-data'>
                    URL Video:<input type='text' name='url_vid' id='url'><br/>
                    Descripcion:<input type='text' name='desc_vid'  id='desc'><br/>  					
                    <input type='text' name='id'  id='id'<br/>
                    
                    <input type='submit'>
                </form>
	</div>
</div>";

//Capa formulario insertar
echo"
<div id='insertar'>
<div id='caja'>
<a class='cerrar' href='#' onclick='cerrar()'><img class='img-cerrar' src='" .
                base_url("assets/css/cerrar_icon.png") . "'></img></a>
<h1>Insertar Video</h1>
    <form action='". site_url('/video/insertarvideo') ."' method='Post' enctype='multipart/form-data' >
        Desc:<input type='text' name='desc'><br/>
        Inserte video<input type='text' name ='video' id='video'></br>
        <input type='hidden' name='MAX_FILE_SIZE' value='5000000000000'> 

        <input type='submit'>
    </form>
    </div>
</div>";


?>

<script>

        function mostrarm(id){
            url = "url_vid"+id;
            desc = "desc_vid"+id;
            document.getElementById("url").value = document.getElementById(url).innerHTML;
            document.getElementById("desc").value = document.getElementById(desc).innerHTML;
            document.getElementById("id").value = id;
            
            $("#modificar").css('display','block');
        }

        function mostrar(){
            $("#insertar").show();
            
        }

        function cerrar(){
            $("#insertar").hide();
             $("#modificar").hide();
        }    
		
		  //confirmacion al borrar
        function borrarvid(id) {
        if (confirm("¿Estás seguro?")) {
            $.get("<?php echo site_url('video/borrarvideo/'); ?>" + id, null, respuesta);
        }
    }

    function respuesta(r) {
        if (r == '0') {
            alert("Error al borrar el audio");
        } else {
            
            alert("Audio borrado con éxito");
            $('#contenido').remove();
        }
    }
	
       
</script>