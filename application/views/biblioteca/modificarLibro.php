<?php echo "<link rel='stylesheet' type='text/css' href='".base_url("assets/bibliocss/adminestilo.css")."' media='screen'>"; ?>
<?php echo "<link rel='stylesheet' type='text/css' href='".base_url("assets/bibliocss/inserlibro.css")."' media='screen'>"; ?>


<meta charset="UTF-8">
<?php  
	echo" <a href='".site_url("/biblioteca/showIntAdmin")."'>Volver a la interfaz de administracion</a>";
	print_r($libros[0]['id_libro']);
			echo "
			<h1>Modificar Libro</h1>
				<div id='caja'>
					<form action='".site_url("biblioteca/modifiedLibro/".$libros[0]['id_libro'])."' method='get'>
						<div class='group'>      
					      <input type='text' name='titulo' value='".$libros[0]['titulo']."' required>
					      <span class='highlight'></span>
					      <span class='bar'></span>
					      <label>Titulo</label>
					    </div>
						<div class='group'>      
					      <input type='text' name='autor' value='".$libros[0]['autor']."' required>
					      <span class='highlight'></span>
					      <span class='bar'></span>
					      <label>Autor</label>
					    </div>
						<div class='group'>      
					      <input type='text' name='editorial' value='".$libros[0]['editorial']."' required>
					      <span class='highlight'></span>
					      <span class='bar'></span>
					      <label>Editorial</label>
					    </div>
						<div class='group'>      
					      <input type='text' name='lugar_edicion' value='".$libros[0]['lugar_edicion']."' required>
					      <span class='highlight'></span>
					      <span class='bar'></span>
					      <label>Lugar de Edición</label>
					    </div>
						<div class='group'>      
					      <input type='date' name='fecha_edicion' value='".$libros[0]['fecha_edicion']."' required>
					      <span class='highlight'></span>
					      <span class='bar'></span>
					      <label>Fecha de Edicion</label>
					    </div>
						<div class='group'>      
					      <input type='text' name='ISBN' value='".$libros[0]['ISBN']."' required>
					      <span class='highlight'></span>
					      <span class='bar'></span>
					      <label>I S B N </label>
					    </div>
						<div class='group'>      
					      <input type='text' name='tipo' value='".$libros[0]['tipo']."' required>
					      <span class='highlight'></span>
					      <span class='bar'></span>
					      <label>Tipo</label>
					    </div>
					
					<input type='submit' class='enviar'>
				</form>
			</div>
			
	";		
			
?>