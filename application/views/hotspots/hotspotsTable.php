<?php

	if (isset($error)) {
		echo "<p style='color:red'>".$error."</p>";
	}
	if (isset($mensaje)) {
		echo "<p style='color:blue'>".$mensaje."</p>";
	}

	
echo "<a href='".site_url("hotspots/showinsertHotspot")."'> Insertar Nuevo HotSpot </a>";

echo "<table border='2px solid' align='center'>";
echo "<tr> 
	  <td> Id Hotspot </td>
	  <td> Descripcion </td> 
	  <td> Pitch </td>
	  <td> Yaw </td>
	  <td> cssClass </td>
	  <td> clickHandlerFunc </td>
	  <td> clickHandlerArgs </td>
	  <td> sceneId </td>
	  <td> targetPitch </td>
	  <td> targetYaw </td>
	  <td> tipo</td>
	  <td> Borrar Hotspot </td>
	  <td> Modificar Hotspot </td>
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
    '".site_url("/hotspots/deleteHotspot/".$hotspots['id_hotspot'])."'
    >Borrar</a></td>
	
	<td align='center'>
	<a href=	
    '".site_url("/hotspots/showUpdateHotspot/".$hotspots['id_hotspot'])."'
	> Modificar el Hotspot </a></td></tr>";
}
echo "</table>";

?>