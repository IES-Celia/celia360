  <link rel='stylesheet' href=https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css>
 <style type="text/css">
    #modificar{
        display:none;
        z-index: 1;
        position: fixed;
        top: 10%;
        left: 30%;
        width: 600px;
        height: 200px;
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
        height: 200px;
        background-color: #ffffff;
        border: 3px solid ;
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

<?php
echo"<a class='insert' onclick='mostrar()'>Insertar</a>";
echo"<table align='center'  id='cont'><tr>
<th>ID</th>
<th>URL</th>
<th>Descripcion</th>
<th>Ver video</th>
<th>Modificar</th>
<th>Eliminar</th></tr>
";

foreach ($tabla as $re) {
    $id=$re["id_vid"];
    echo'<tr><td id="id_vid'.$id.'">' . $re["id_vid"] . '</td>';
    echo'<td id="url_vid'.$id.'">' . $re["url_vid"] . '</td>';
    echo'<td id="desc_vid'.$id.'">' . $re["desc_vid"] . '</td>';
    echo"<td><a target='_blank' href='". $re["url_vid"] ."'>visitar enlace</a></td>";
    echo"<td><a onclick='mostrarm(". $re["id_vid"] .")'><i class='fa fa-edit' style='font-size:30px;'></i></a></td>";
    echo"<td><a href='" . site_url("video/borrarvideo/" . $re["id_vid"]) . "'><i class='fa fa-trash' style='font-size:30px;'></i></a></td></tr>";
}
echo "</table>";
$ant = $primero - $cantidad;
if($ant<0)$ant=0;
$sig = $primero + $cantidad;
if($sig>$total) $sig=$total;
echo "<div id='div_pag'><a class='paginacion' href='". site_url("video/mostrarvideos/") ."$ant'>Anterior</a> - <a class='paginacion' href='". site_url("audio/mostrarvideos/") ."$sig'>Siguiente</a></div>";
//Capa formulario modificar
echo "
<div id='modificar'>
<a class='cerrar' href='#' onclick='cerrar()'><img class='img-cerrar' src='" .
                base_url("assets/css/cerrar_icon.png") . "'></img></a>
    <h1>Modificar Audio</h1>
    <form action='" . site_url("video/modificarvideo/" . $id) . "' method='post' enctype='multipart/form-data'>
                    URL Video:<input type='text' name='url_vid' id='url'><br/>
                    Descripcion:<input type='text' name='desc_vid'  id='desc'><br/>  					
                    <input type='text' name='id'  id='id'<br/>
                    
                    <input type='submit'>
                </form>
</div>";

//Capa formulario insertar
echo"
<div id='insertar'>
<a class='cerrar' href='#' onclick='cerrar()'><img class='img-cerrar' src='" .
                base_url("assets/css/cerrar_icon.png") . "'></img></a>
<h1>Insertar Video</h1>
    <form action='". site_url('/video/insertarvideo') ."' method='Post' enctype='multipart/form-data' >
        Desc:<input type='text' name='desc'><br/>
        Inserte video<input type='text' name ='video' id='video'></br>
        <input type='hidden' name='MAX_FILE_SIZE' value='5000000000000'> 

        <input type='submit'>
    </form>
    
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
       
</script>