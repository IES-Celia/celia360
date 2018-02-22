<?php

	if (isset($error)) {
		echo "<p style='color:red'>".$error."</p>";
	}
	if (isset($mensaje)) {
		echo "<p style='color:blue'>".$mensaje."</p>";
	}

	
echo "<a class='insert' href='".site_url("hotspots/show_insert_hotspot")."'> Insertar Nuevo HotSpot </a>";

echo "<table id='cont'>";
echo "<tr> 
	  <th> Id Hotspot </th>
	  <th> Descripcion </th> 
	  <th> Pitch </th>
	  <th> Yaw </th>
	  <th> cssClass </th>
	  <th> clickHandlerFunc </th>
	  <th> clickHandlerArgs </th>
	  <th> sceneId </th>
	  <th> targetPitch </th>
	  <th> targetYaw </th>
	  <th> tipo</th>
	  <th> Borrar Hotspot </th>
	  <th> Modificar Hotspot </th>
	  </tr>";
	  
	  
foreach ($tablaHotspots as $hotspots){
	echo "<tr>
	<td align='center'>".$hotspots['id_hotspot']." </td>
	<td align='center'>".$hotspots['descripcion']."</td>
	<td align='center'>".$hotspots['pitch']." </td>
	<td align='center'>".$hotspots['yaw']."</td>
	<td align='center'>".$hotspots['cssClass']."</td>
	<td align='center'>".$hotspots['clickHandlerFunc']."</td>
	<td align='center'>".$hotspots['clickHandlerArgs']."</td>
	<td align='center'>".$hotspots['sceneId']. " </td>
	<td align='center'>".$hotspots['targetPitch']. " </td>
	<td align='center'>".$hotspots['targetYaw']. " </td>
	<td align='center'>".$hotspots['tipo']. " </td>
	
	<td align='center'>
    <a href=
    '".site_url("/hotspots/delete_hotspot/".$hotspots['id_hotspot'])."'
    >Borrar</a></td>
	
	<td align='center'>
	<a href=	
    '".site_url("/hotspots/show_update_hotspot/".$hotspots['id_hotspot'])."'
	> Modificar el Hotspot </a></td></tr>";
}
echo "</table>";

?>