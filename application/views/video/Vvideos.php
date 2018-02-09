<?php
echo"<a class='insert' href='" . site_url("Video/frominsertarvideo") . "'>insertar</a>";
echo"<table align='center' border=1 id='cont'><tr>
<th>id</th>
<th>URL</th>
<th>descripcion</th>
<th>modificar</th>
<th>ver video</th>
<th>Eliminar</th></tr>
";

foreach ($tabla as $re) {
    echo'<tr><td>' . $re["id_vid"] . '</td>';
    echo'<td>' . $re["url_vid"] . '</td>';
    echo'<td>' . $re["desc_vid"] . '</td>';
    echo"<td><a href='" . site_url("video/formmodificarvideo/" . $re["id_vid"]) . "'>modificar</a></td>";
    echo"<td><a target='_blank' href='". $re["url_vid"] ."'>ver enlace</a></td>";
    echo"<td><a href='" . site_url("video/borrarvideo/" . $re["id_vid"]) . "'>Eliminar</a></td></tr>";
}
echo "</table>";

?>