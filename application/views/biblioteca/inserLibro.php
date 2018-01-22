<!DOCTYPE html>
<html>
	<head>
		<?php echo "<link rel='stylesheet' type='text/css' href='".base_url("assets/bibliocss/inserlibro.css")."' media='screen' /> "; ?>
		<style type="text/css">
			.file-input {
			  visibility: hidden;
			  width: 0;
			  float: left;
			}
			.file-input::before {
			  content: 'Insertar paginas';
			  display: inline-block;
			  background: -webkit-linear-gradient(top, #f9f9f9, #e3e3e3);
			  border: 1px solid #999;
			  border-radius: 3px;
			  padding: 5px 8px;
			  outline: none;
			  white-space: nowrap;
			  -webkit-user-select: none;
			  cursor: pointer;
			  text-shadow: 1px 1px #fff;
			  font-weight: 700;
			  font-size: 10pt;
			  visibility: visible;
			  position: absolute;
			}
			.file-input:hover::before {
			  border-color: black;
			}
			.file-input:active::before {
			  background: -webkit-linear-gradient(top, #e3e3e3, #f9f9f9);
			}
			.enviar{
				top: 1500px;
			}

		</style>
		
	</head>

<?php // Formulario de registro de libros
echo" <a href='".site_url("/biblioteca/showIntAdmin")."'>Volver a la interfaz de administracion</a>";
echo"

		<h1>Insertar libro</h1>
		<div id='caja'>
			<form action='".base_url("biblioteca/insertLibro")."' method='get'>
				<div class='group'>      
			      <input type='text' name='titulo' required>
			      <span class='highlight'></span>
			      <span class='bar'></span>
			      <label>Titulo</label>
			    </div>
				<div class='group'>      
			      <input type='text' name='autor' required>
			      <span class='highlight'></span>
			      <span class='bar'></span>
			      <label>Autor</label>
			    </div>
				<div class='group'>      
			      <input type='text' name='editorial' required>
			      <span class='highlight'></span>
			      <span class='bar'></span>
			      <label>Editorial</label>
			    </div>
				<div class='group'>      
			      <input type='text' name='lugar' required>
			      <span class='highlight'></span>
			      <span class='bar'></span>
			      <label>Lugar de Edición</label>
			    </div>
				<div class='group'>      
			      <input type='date' name='fecha' value='Fecha de Edición'required>
			      <span class='highlight'></span>
			      <span class='bar'></span>
			      <label>Fecha de Edicion</label>
			    </div>
				<div class='group'>      
			      <input type='text' name='isbn' required>
			      <span class='highlight'></span>
			      <span class='bar'></span>
			      <label>I S B N </label>
			    </div>
				<div class='group'>      
			      <input type='text' name='tipo' required>
			      <span class='highlight'></span>
			      <span class='bar'></span>
			      <label>Tipo</label>
			    </div>

		    	<input type='file' class='file-input' name='fichero' accept='image/jpg'  id='input' multiple='true' onchange='handleFiles(this.files)'/><br/><br/>
				<input class='boton' type='submit'>
			</form>
		</div>
"
?>

