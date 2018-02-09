<?php
echo"<a class='insert'href='" . site_url("audio/forminsertaraudio") . "'>Insertar audio</a><br>";
echo"<table align='center' id='cont'><tr>
<th>id</th>
<th>URL</th>
<th>Descripcion</th>
<th>Tipo de audio</th>
<th>Modificar</th>
<th>Eliminar</th>
<th>Reproducir</th></tr>
";

foreach ($tabla as $re) {

    echo'<tr id="contenido"><td>' . $re["id_aud"] . '</td>';
    echo'<td>' . $re["url_aud"] . '</td>';
    echo'<td>' . $re["desc_aud"] . '</td>';
    echo'<td>' . $re["tipo_aud"] . '</td>';
    echo"<td><a href='" . site_url("audio/formmodificaraud/" . $re["id_aud"]) . "'>Modificar</a></td>";
    echo"<td><a href='" . site_url("audio/borraraud/" . $re["id_aud"]) . "'>Eliminar</a></td>";
    echo"<td><audio controls='controls' preload='auto'>
	<source src='" . base_url($re["url_aud"]) . "' type='audio/m4a'/>
	<source src='" . base_url($re["url_aud"]) . "' type='audio/mp3'/>
	</audio></td></tr>";
}
echo "</table>";

?>