 <link rel='stylesheet' href=https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css>
<?php
echo"<a class='insert' href='" . site_url("Video/frominsertarvideo") . "'>Insertar</a>";
echo"<table align='center'  id='cont'><tr>
<th>ID</th>
<th>URL</th>
<th>Descripcion</th>
<th>Ver video</th>
<th>Modificar</th>
<th>Eliminar</th></tr>
";

foreach ($tabla as $re) {
    echo'<tr><td>' . $re["id_vid"] . '</td>';
    echo'<td>' . $re["url_vid"] . '</td>';
    echo'<td>' . $re["desc_vid"] . '</td>';
    echo"<td><a target='_blank' href='". $re["url_vid"] ."'>visitar enlace</a></td>";
    echo"<td><a href='" . site_url("video/formmodificarvideo/" . $re["id_vid"]) . "'><i class='fa fa-edit' style='font-size:30px;'></i</a></td>";
    echo"<td><a href='" . site_url("video/borrarvideo/" . $re["id_vid"]) . "'><i class='fa fa-trash' style='font-size:30px;'></i></a></td></tr>";
}
echo "</table>";

?>