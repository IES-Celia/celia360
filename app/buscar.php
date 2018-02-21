<style>
	table {
	    border-collapse: collapse;
	    border-spacing: 0;
	    width: 100%;
	    border: 1px solid #ddd;
	}

	th, td {
	    text-align: left;
	    padding: 10px;
	}
	th{
		background-color:#31a3dd;
	}
	tr:nth-child(even) {
	    background-color: #f2f2f2
	}
</style>
 <link rel='stylesheet' href=https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css>
<?php 

	$mysqli = new mysqli("localhost", "root", "", "celiatour");

	$salida = "";
	$query = "Select * from libros order by titulo";

	if(isset($_POST['consulta'])){
		$q = $mysqli->real_escape_string($_POST['consulta']);

		$query = "Select * from libros where id_libro LIKE '%".$q."%' OR titulo LIKE '%".$q."%' OR autor LIKE '%".$q."%' OR editorial LIKE '%".$q."' ";
	}

	$resultado = $mysqli->query($query);

	if($resultado->num_rows > 0){
		$salida.="
			<table border='1px solid black' style='border-spacing: 0;' class='tabla_datos'>
				<thead>
				<tr>
					<th>IDLIBRO</th>
					<th>TITULO</th>
					<th>AUTOR</th>
					<th>EDITORIAL</th>
					<th>LUGAR EDICION</th>
					<th>FECHA EDICION</th>
					<th>ISBN</th>
					<th>TIPO</th>
					<th>APAISADO</th>
				</tr>
				</thead>
				<tbody>
		";

		
		while ($fila = $resultado->fetch_assoc()){

			$salida.="<tr>
				<td >".$fila['id_libro']."</td>
				<td >".$fila['titulo']."</td>
				<td >".$fila['autor']."</td>
				<td >".$fila['editorial']."</td>
				<td >".$fila['lugar_edicion']."</td>
				<td >".$fila['fecha_edicion']."</td>
				<td >".$fila['ISBN']."</td>
				<td >".$fila['tipo']."</td>
				<td >".$fila['apaisado']."</td>
				<td> 
					<a href='#'> <i title='Modificar' class='fa fa-pencil-square-o' aria-hidden='true'></i></a>
				</td>
				<td>
					<a href=''><i title='Insertar Páginas' class='fa fa-file-image-o' aria-hidden='true'></i></a>
				</td>
				<td>
					<a href='#' onClick='borrarlibro('')'><i title='Eliminar' class='fa fa-trash' aria-hidden='true'></i></a>
				</td>
			</tr>";
			 
		}
		$salida.="</tbody></table>";

	} else{
		$salida.= "no hay datos MEN :(";
	}

	echo $salida;
	$mysqli->close();

?>



