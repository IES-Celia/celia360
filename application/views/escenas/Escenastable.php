<?php 
	if (isset($datos["error"])) {
			echo "<p style='color:red'>".$datos["error"]."</p>";
	}
	
	if (isset($datos["mensaje"])) {
		echo "<p style='color:blue'>".$datos["mensaje"]."</p>";
	}



    echo"<a href='".site_url("escenas/showinsert")."'> Insertar Nueva Escena </a>";
	echo "<table border='2px solid' align='center'>";
	echo "<tr> 
		  <th> IdEscena</th>
		  <th> Nombre del lugar </th>
		  <th> Codigo Escena </th>
		  <th> hfov </th> 
		  <th> Pitch </th>
		  <th> Yaw </th>
		  <th> Tipo </th>
		  <th> Panorama </th>
		  <th> Eliminar </th>
		  <th> Modificar </th>
		  </tr>";
	
	foreach ($tablaEscenas as $escenas){
		
		echo "<tr>
            
            <td align='center'>". $escenas['id_escena']."</td>
            <td align='center'>".$escenas['Nombre']."</td>
            <td align='center'>".$escenas['cod_escena']."</td>
            <td align='center'>".$escenas['hfov']." </td>
            <td align='center'>".$escenas['pitch']."</td>
            <td align='center'>".$escenas['yaw']."</td>
            <td align='center'>".$escenas['tipo']."</td>
            <td align='center'><img src='".$escenas['panorama']."'/></td>
            
            <td align='center'>
            <a href= '".site_url("/escenas/deletescene/".$escenas['id_escena'])."'> Borrar </a></td>
            
            <td align='center'>
            <a href= '".site_url("/escenas/showUpdateScene/".$escenas['id_escena'])."'> Modificar la escena </a></td>";
	}
	echo"</tr>";
	echo "</table>";


?>
