<?php 
	if (isset($datos["error"])) {
			echo "<p style='color:red'>".$datos["error"]."</p>";
	}
	
	if (isset($datos["mensaje"])) {
		echo "<p style='color:blue'>".$datos["mensaje"]."</p>";
	}
	
	$con = $tabla[0];
		
    echo "<h1 align='center'>Modificar escenas</h1>
			<fieldset class='for'>
				<form action='".site_url("escenas/processUpdateScene")."' method='get'>
		
					Nombre de la Escena: <input type='text' name='name' value=" . $con['Nombre'] . "> <br/>
				
					Coordenada Pitch y Yaw:<br> 
    <a href='".site_url('welcome/cargar_escena/'.$con['cod_escena'].'/'."update_escena_pitchyaw/")."'>Modificarlos</a><br><br>
				
					type: <input type='text' name='type' value=" . $con['tipo'] . "> <br/>
				
					panorama: <input type='file' name='panorama' value=" . $con['panorama'] . "> <br/>
					    
				    <input type='hidden' name='Id' value=". $con['id_escena'].">
					    
					    <p align='center'><input type='submit'>
					    
					</form>
				</fieldset>
		</table>";
?>
