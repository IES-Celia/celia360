 <link rel='stylesheet' href=https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css>
 <style type="text/css">
    #modificar{
        display:none;
        z-index: 1;
        position: fixed;
        top: 10%;
        left: 30%;
        width: 600px;
        height: 660px;
        background-color: #ffffff;
        border: 3px solid ;
    }

    #insertar{
        display:none;
        z-index: 1;
        position: fixed;
        top: 10%;
        left: 30%;
        width: 600px;
        height: 580px;
        background-color: #ffffff;
        border: 3px solid ;
    }

</style>
<?php
echo"<a class='insert' onclick='mostrar()'>Insertar audio</a><br>";
echo"<table align='center' id='cont'><tr>
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

//Capa formulario modificar
echo "
<div id='modificar'>
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
    <a href='#' onclick='cerrar()'>Cerrar</a>
</div>";

//Capa formulario insertar
echo"
<div id='insertar'>
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
    <a href='#' onclick='cerrar()'>Cerrar</a>
      
</div>";



?>

<script>

        function mostrarm(id){
            url = "url_aud"+id;
            desc = "desc_aud"+id;
            tipo = "tipo_aud"+id; 
            document.getElementById("url").value = document.getElementById(url).innerHTML;
            document.getElementById("desc").value = document.getElementById(desc).innerHTML;
            document.getElementById("select").value = document.getElementById(tipo).innerHTML;
            document.getElementById("id").value = id;
            
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