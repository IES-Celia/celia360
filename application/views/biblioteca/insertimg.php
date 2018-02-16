<!DOCTYPE html>
<html>

	<head>
		<?php echo "<link rel='stylesheet' href='".base_url("assets/css/font-awesome-4.7.0/css/font-awesome.min.css")."'>"; ?>	
		<?php echo "<link rel='stylesheet' type='text/css' href='".base_url("assets/bibliocss/estilo_insert_libro.css")."' media='screen' />";?>	
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	</head>
<body>
	<div id="bimba">
		<div id="cualquiera">
			<?php  
			
			$directorio = "assets/imgs/books/$idlibro";
			$arrayPag = scandir($directorio);
			$num_pag = count($arrayPag)-2;
			echo" <a href='".site_url("/biblioteca/showintadmin")."'>Volver a la interfaz de administracion</a>";
				echo "<table>";
					echo "<tr>";
						for($i = 0;$i<$num_pag;$i++){
								if($i%4==0){
									echo "</tr>";
									echo "<tr>";
								}
									echo "<td>";
									echo "<form action='".site_url("/biblioteca/procesarinsertimg")."' method='post' enctype='multipart/form-data'>";
									echo "<img src='".base_url("assets/imgs/books/$idlibro/$i.jpg")."' height='200px' width='150px'>".
											
												"<input type='hidden' name='id' value='$idlibro'>".
												"<input type='hidden' name='num_pag' value='$num_pag'>".
												"<input type='hidden' name='pagina_ant' value='".($i-1)."'>".
												"<input type='file' class='file-input' name='fichero' accept='image/jpg'  id='input' onchange='handleFiles(this.files)'/>";
										
									
									echo "<a href='".site_url("/biblioteca/deletepag/$idlibro/$i/$num_pag")."' class='btnBorrar'>Borrar</a>";
									echo "<p class='numeroPagina'>$i</p>";
								echo "</td>";

								echo "
									<td><input class='btnenviar' type='submit'/>".
									"</td></form>";
							}
					echo "</tr>";
				echo "</table>";		
					
			?>
		</div>
	</div>	
</body>
