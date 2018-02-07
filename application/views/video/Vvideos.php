<?php

echo"<table align='center' border=1 id='cont'><tr>
<th>id</th>
<th>URL</th>
<th>descrepcion</th>
<th>modificar</th>
<th>Eleminar</th></tr>
";

foreach ($tabla as $re){
	echo'<tr><td>'.$re["id_vid"].'</td>';
	echo'<td>'.$re["url_vid"].'</td>';
	echo'<td>'.$re["desc_vid"].'</td>';
	echo"<td><a href='".site_url("video/formmodificarvideo/".$re["id_vid"])."'>modificar</a></td>";
	echo"<td><a href='".site_url("video/borrarvideo/".$re["id_vid"])."'>Eleminar</a></td></tr>";

	
}
echo "</table>";
echo"<a class='insert' href='".site_url("Video/frominsertarvideo")."'>insertar</a>";
?>