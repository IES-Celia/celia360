
<script>
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
<?php
/** a continuacion nos encontramos al script de javascript ayax, donde mostramos  las ventanas modales, borramos audio por ajax y al final del script ncluimos un plugin para la paginacion y buscador */
?>
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
// aqui cojemos el array entregado por el controlador y mostramops en una tabla todos los videos de la base de datos
echo"<a class='insert' onclick='mostrar()'><i class='fas fa-plus-circle'></i> Insertar Video</a>";

echo"<table class='tabla' class='display' id='cont'>
<thead>
<tr id='cabecera'>
<th>ID</th>
<th>URL</th>
<th>Descripcion</th>
<th>Ver video</th>
<th>Modificar</th>
<th>Eliminar</th></tr>
</thead>
<tfoot>
<tr id='cabecera'>
<th>ID</th>
<th>URL</th>
<th>Descripcion</th>
<th>Ver video</th>
<th>Modificar</th>
<th>Eliminar</th></tr>
</tfoot>
<tbody>";
foreach ($tabla as $re) {
    $id=$re["id_vid"];
    echo'<tr id="contenidovideo'.$id.'"><td id="id_vid'.$id.'">' . $re["id_vid"] . '</td>';
    echo'<td id="url_vid'.$id.'">' . $re["url_vid"] . '</td>';
    echo'<td id="desc_vid'.$id.'">' . $re["desc_vid"] . '</td>';
    echo"<td><a target='_blank' href='". $re["url_vid"] ."'>visitar enlace</a></td>";
    echo"<td><a onclick='mostrarm(". $re["id_vid"] .")'><i class='fa fa-edit' style='font-size:30px;'></i></a></td>";
    echo"<td><a href='#' onclick='borrarvid(". $re["id_vid"] .")'><i class='fa fa-trash' style='font-size:30px;'></i></a></td></tr>";
}
echo "</tbody>";
echo "</table>";

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
                    <input type='hidden' name='id'  id='id'<br/>
                    
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

/** a continuacion nos encontramos al script de javascript ayax, donde mostramos  las ventanas modales, borramos video por ajax y al final del script ncluimos un plugin para la paginacion y buscador */
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
        if (r.trim() == "-1") {
			document.getElementById("mensajemenu").innerHTML = "<span id='error_cabecera'>Error al borrar el video</span>";
		} else if (r.trim() == "-2") {
			document.getElementById("mensajemenu").innerHTML = "<span id='error_cabecera'>Ese video está en uso en un hotspot y no se puede borrar</span>";
            
        } else {
            
            document.getElementById("mensajemenu").innerHTML = "<span id='mensaje_cabecera'>Borrado con éxito</span>";
			
			selector = "#contenidovideo"+parseInt(r);
			
            $(selector).remove();
			
        }
    }
	 
	$(document).ready(function() {
        $('#cont').dataTable({
    	"language": {
            "lengthMenu": "Mostrar _MENU_ registros por página",
            "zeroRecords": "No se encontraron resultados en su búsqueda",
            "searchPlaceholder": "Buscar registros",
            "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
            "infoEmpty": "No existen registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "search": "Buscar:",
            "paginate": {
	            "first":    "Primero",
	            "last":    "Último",
	            "next":    "Siguiente",
	            "previous": "Anterior"
	    },
        }
        });
    } );
	
       
</script>