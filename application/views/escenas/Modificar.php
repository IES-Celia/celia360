<?php 
	if (isset($datos["error"])) {
			echo "<p style='color:red'>".$datos["error"]."</p>";
	}
	
	if (isset($datos["mensaje"])) {
		echo "<p style='color:blue'>".$datos["mensaje"]."</p>";
	}
	
	$con = $tabla[0];
		
    echo "
        <head>
            <style>
                #panorama{
                height: auto;
                }
			</style>";
			?>
			<script>
			$(document).ready(function() {
				$("#eliminar").click(function(){
					alert("hola");
					if(confirm("Seguro que desea eliminar la escena?")) location.href='<?php echo base_url("escenas/deletescene/".$con['cod_escena'])?>';
				});
			})
				
			</script>
			<?php
       echo "</head>
    <h1 align='center'>Modificar escenas</h1>
        <p></p>
        <div id='caja'>
			<fieldset>
				<form action='".site_url("escenas/processupdatescene/")."' method='post' enctype='multipart/form-data'>
		
					Nombre de la Escena: <input type='text' name='name' value=" . $con['Nombre'] . "> <br/>
				
			Coordenada Pitch y Yaw:<br> 
    <a href='".site_url('welcome/cargar_escena/'.$con['cod_escena'].'/'."update_escena_pitchyaw/")."'>Modificarlos</a><br><br>
				
                panorama: <input type='file' name='panorama' value=" . $con['panorama'] . "> <br/>
					    
				    <input type='hidden' name='Id' value=". $con['id_escena'].">
                    <input type='hidden' name='cod' value=". $con['cod_escena'].">
					    
						<p align='center'><input type='submit'>
						<a href='#' id='eliminar'>Eliminar este punto</a>
					    
					</form>
				</fieldset>
                </div>
		</table>";
?>
