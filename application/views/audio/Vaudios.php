 <link rel='stylesheet' href=https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css>
 

 <style type="text/css">
     #contenedor {
         display:none;
         width:100%;
         height:100%;
         z-index: 1; 
     }
     #modificar{
        display:none;
        z-index: 2;
        position: absolute;
        top: 5%;
        left: 30%;
        width: 600px;
        height: 650px;
        background-color: #ffffff;
        border: 3px solid ;
        overflow: auto;
    }

    #insertar{
        display:none;
        z-index: 1;
        position: absolute;
        top: 5%;
        left: 30%;
        width: 600px;
        height: 580px;
        background-color: #ffffff;
        border: 3px solid ;
        overflow: auto;
    }
   
    .paginacion{
        border: 4px solid #ddd;
        font-family: verdana, arial, sans-serif; 
        font-size: 10pt; 
        font-weight: bold; 
        padding: 4px; 
        background-color: #ffffcc; 
        color: #666666; 
        text-decoration: none;
        padding: 8px 16px;
        position: relative;
        top:25px;
        left:40%;
    }
    .cerrar{
        position: relative;
    top:15px;
    left:90%;
    
    }
    .img-cerrar{
         width: 20px; height: 20px;
    }
 

</style>
<div class="wrapper">
    <input type="text" name="autocompletar" maxlength="15" onpaste="return false" class="autocompletar" placeholder="Escribe tu búsqueda" />
    
    <div class="contenedor"></div>
</div>
<?php
echo"<a class='insert' onclick='mostrar()'>Insertar audio</a><br>";
echo"</div>";
echo"<table align='center' id='cont'><tr id='cabecera'>
<th>ID</th>
<th>URL</th>
<th>Descripcion</th>
<th>Tipo de audio</th>
<th>Reproducir</th>
<th>Modificar</th>
<th>Eliminar</th>
</tr>

";

foreach ($tabla as $re) {
    $id=$re["id_aud"];
    echo'<tr id="contenido"><td id="id_aud'.$id.'">' . $re["id_aud"] . '</td>';
    echo'<td id="url_aud'.$id.'">' . $re["url_aud"] . '</td>';
    echo'<td id="desc_aud'.$id.'">' . $re["desc_aud"] . '</td>';
    echo'<td id="tipo_aud'.$id.'">' . $re["tipo_aud"] . '</td>';
    echo"<td><audio controls='controls' preload='auto'>
	<source src='" . base_url($re["url_aud"]) . "' type='audio/m4a'/>
	<source src='" . base_url($re["url_aud"]) . "' type='audio/mp3'/>
	</audio></td>";
    echo"<td><a onclick='mostrarm(". $re["id_aud"] .")'><i class='fa fa-edit' style='font-size:30px;'></i></a></td>";
    echo"<td><a href='" . site_url("audio/borraraud/" . $re["id_aud"]) . "'><i class='fa fa-trash' style='font-size:30px;'></i></a></td></tr>";
  
}
echo "</table>";
$ant = $primero - $cantidad;
if($ant<0)$ant=0;
$sig = $primero + $cantidad;
if($sig>$total) $sig=$total;
echo "<div id='div_pag'><a class='paginacion' href='". site_url("audio/mostraraudios/") ."$ant'>Anterior</a> - <a class='paginacion' href='". site_url("audio/mostraraudios/") ."$sig'>Siguiente</a></div>";

//Capa formulario modificar
echo "
<div id='contenedor'>
<div id='modificar'>
<a class='cerrar' href='#' onclick='cerrar()'><img class='img-cerrar' src='" .
                base_url("assets/css/cerrar_icon.png") . "'></img></a>
    <h1>Modificar Audio</h1>
    <form  class='for' action='" . site_url("audio/modificaraud/" . $id) . "' method='post' enctype='multipart/form-data'>
                    URL audio:<input type='text' name='url_aud' id='url'><br/>
                    Descripcion:<input id='desc' type='text' name='desc_aud'  id='desc'><br/>    
					<input type='hidden' name='MAX_FILE_SIZE' value='500000000'> 					
                    <input type='text' name='id'  id='id'><br/>
                       Tipo<select name='tipo_aud' id='select'>
  			<option value='v-guiada'>visita guiada</option>
 			<option value='d-objeto'>definir objeto</option>
		</select><br/><br/>
                    <input type='submit'>
                    
                </form>
</div></div>";

//Capa formulario insertar
echo"
<div id='insertar'>
<a class='cerrar' href='#' onclick='cerrar()'>Cerrar</a>
<h1>Modificar audio</h1>
<form action='". site_url("/audio/insertarAud") ."' class='for' method='Post' enctype='multipart/form-data' >
    Descripcion:<input id='desc' type='text' name='desc'><br/>
	Inserte audio<input type='file' name ='audio' id='audio'><br/>
	Tipo<select name='tipo_aud' id='tipo'>
  			<option value='v-guiada'>Visita guiada</option>
 			<option value='d-objeto' selected>Definir un objeto</option>
		</select><br/><br/>
		<input type='hidden' name='MAX_FILE_SIZE' value='5000000000000'> 
    <input type='submit'>
    
      </form>
</div>";

        

?>

<script>
        
        function mostrarm(id){
            url = "url_aud"+id;
            desc = "desc_aud"+id;
            tipo = "tipo_aud"+id; 
            url1=document.getElementById(url).innerHTML;
            u=url1.substring(13, url1.length-4);
            
            document.getElementById("url").value = document.getElementById(url).innerHTML;
            document.getElementById("desc").value = document.getElementById(desc).innerHTML;
            document.getElementById("select").value = document.getElementById(tipo).innerHTML;
            document.getElementById("id").value = id;
            
            $("#contenedor").show();
            $("#modificar").show();
        }

        function mostrar(){
            $("#insertar").show();
            
        }

        function cerrar(){
            $("#insertar").hide();
             $("#modificar").hide();
        }    
        
       
</script>