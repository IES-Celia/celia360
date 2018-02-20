 <link rel='stylesheet' href=https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css>
<?php
echo"<a class='insert'href='" . site_url("audio/forminsertaraudio") . "'>Insertar audio</a><br>";
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

    echo'<tr id="contenido"><td>' . $re["id_aud"] . '</td>';
    echo'<td>' . $re["url_aud"] . '</td>';
    echo'<td>' . $re["desc_aud"] . '</td>';
    echo'<td>' . $re["tipo_aud"] . '</td>';
    echo"<td><audio controls='controls' preload='auto'>
	<source src='" . base_url($re["url_aud"]) . "' type='audio/m4a'/>
	<source src='" . base_url($re["url_aud"]) . "' type='audio/mp3'/>
	</audio></td>";
    echo"<td><a href='" . site_url("audio/formmodificaraud/" . $re["id_aud"]) . "'><i class='fa fa-edit' style='font-size:30px;'></a></td>";
    echo"<td><a href='" . site_url("audio/borraraud/" . $re["id_aud"]) . "'><i class='fa fa-trash' style='font-size:30px;'></i></a></td></tr>";
    
}
echo "</table>";

?>