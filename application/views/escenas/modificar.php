<?php 
	if (isset($datos["error"])) {
			echo "<p style='color:red'>".$datos["error"]."</p>";
	}
	
	if (isset($datos["mensaje"])) {
		echo "<p style='color:blue'>".$datos["mensaje"]."</p>";
	}
	
	$con = $tabla[0];
		
    echo "<h1 align='center'>Modificar escenas</h1>
			<fieldset>
				<form action='".site_url("escenas/processUpdateScene")."' method='get'>
		
					Nombre de la Escena: <input type='text' name='name' value=" . $con['Nombre'] . "> <br/>
					
					Codigo Escena: <input type='text' name='hfov' value=" . $con['cod_escena'] . "> <br/>
				
					hfov: <input type='text' name='hfov' value=" . $con['hfov'] . "> <br/>
				
					Pitch: <input type='text' name='pitch' value=" . $con['pitch'] . "> <br/>
				
					Yaw: <input type='text' name='yaw' value= ". $con['yaw'] . "> <br/>
				
					type: <input type='text' name='type' value=" . $con['tipo'] . "> <br/>
				
					panorama: <input type='text' name='panorama' value=" . $con['panorama'] . "> <br/>
					    
				    <input type='hidden' name='Id' value=". $con['id_escena'].">
					    
					    <p align='center'><input type='submit'>
					    
					</form>
				</fieldset>
		</table>";
?>