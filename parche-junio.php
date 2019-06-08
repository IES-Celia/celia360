
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Parches</title>
	<style>
	<style>
            .container{
                margin: auto;
                max-width: 1300px;
            }
            .bg-secondary {
                background-color: #4E5D6C;
            }
            .col-md-6{
                width: 50%;
            }
            .col-md-12{
                width: 100%;
            }
            .mx-auto{
                margin: auto!important;
            }
            h1, h4, p, label{
                color: white;
                font-family:"Lato";
            }
            input, label{
                display: block;
            }
            .text-center{
                text-align: center;
            }
            label{
                margin-bottom: 10px;
                font-size: 1.25rem;
                margin-top: 10px;
            }
            .form-group{
                margin-bottom: 1rem;
                margin: auto;
                width: 90%;
            }
            .btn-primary {
                color: #fff;
                background-color: #DF691A;
                border: none;
                width: auto;
                padding: 0.375rem 0.75rem;
                font-size: 1rem;
            }
            .mt-3{
                margin-top: 15px; 
            }
            .pb-3{
                padding-bottom: 15px; 
            }
            body{
                background-color: #2B3E50;
            }
            .text-justify{
                text-align: justify;
            }
            p{
                margin: 20px;
            }
            input {
                width: 100%;
                display: block;
                margin: auto;
                padding: 0.375rem;
            }
            h1{
                font-size: 2.5rem;
            }
            h4{
                font-size: 1.5rem;
            }

            .text-white {
                color: white;
            }
        </style>     
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1>Actualización CMS Celia Tour</h1>
			<p>Si estás aquí es porque quieres actualizar el CMS Celia Tour</p>
			<form method="POST">
			<div class="form-group">
				<label for="host">Hostname</label>
				<input type="text" name="hostname" class="form-control">
			</div>
			<div class="form-group">
				<label for="user">Usuario de la base de datos</label>
				<input type="text" name="user" class="form-control">
			</div>
			<div class="form-group">
				<label for="host">Contraseña de la base de datos</label>
				<input type="password" name="pass" class="form-control">
			</div>
			<div class="form-group">
				<label for="host">Nombre de la base de datos</label>
				<input type="text" name="namedb" class="form-control">
			</div>

			<div class="form-group mt-3">
				<button class="btn btn-primary" id="update" name="update" type="submit">Actualizar CMS</button>
			</div>
			</form>
		</div>
	</div>
</div>

<?php
	if(isset($_POST['update'])) {
		$host = $_POST['hostname'];
		$userdb = $_POST['user'];
		$passdb = $_POST['pass'];
		$namedb =$_POST['namedb'];

		$db = new mysqli('localhost', 'root','','celialimpio');
		
		if ($db->connect_error) {
			die('Error de conexión: ' . $mysqli->connect_error);
		}

		$db->query("ALTER TABLE 
		panoramas_secundarios ADD preview 
		VARCHAR(200) DEFAULT NULL");

		$db->query("ALTER TABLE visita_guiada RENAME TO estancias_guiada");
		$db->query("ALTER TABLE estancias_guiada ADD id_visita_guiada INT NOT NULL");
		$db->query("ALTER TABLE estancias_guiada CHANGE id_visita id_estancia INT NOT NULL AUTO_INCREMENT");

		
		// compruebo si la tabla antigua (visita_guiada) contiene
		// valores. De ser así tenemos que crear la visita guiada 1
		// en la tabla nueva (visitas_guiadas);


		$res = $db->query("SELECT COUNT(*) as 'all' FROM estancias_guiada");
		$row=mysqli_fetch_array($res,MYSQLI_NUM);

		$db->query("CREATE TABLE visitas_guiadas (
			id INT PRIMARY KEY AUTO_INCREMENT,
			nombre VARCHAR(75) NOT NULL,
			descripcion VARCHAR(1000)
		);");

		if ($row[0] > 0) {
			$db->query("INSERT INTO visitas_guiadas VALUES (1, 'Nombre visita', 'defult description')");
			$db->query("UPDATE estancias_guiada SET id_visita_guiada = 1");
		}
	}
?>

</body>
</html>




