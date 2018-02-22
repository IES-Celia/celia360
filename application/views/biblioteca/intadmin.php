<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Buscador</title>
		<!-- <link rel="stylesheet" href="css/buscador.css"> -->
		 <link rel='stylesheet' href=https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css>
		<style>
			/*#caja_busqueda{
				padding: 10px;
			    width: 230px;
			    background-color: #c1bcbc;
			    color: white;
			    border: none;
			    margin-right:50px;
			}
			input.empty {
			    font-family: FontAwesome;
			    font-style: normal;
			    font-weight: normal;
			    text-decoration: inherit;

			}*/
			input[class=empty] {
			    width: 130px;
			    /*box-sizing: border-box;*/
			    border: 2px solid #ccc;
			    border-radius: 4px;
			    font-size: 16px;
			    background-color: white;
			    background-image: url('searchicon.png');
			    /*background-position: 10px 10px; */
			    background-repeat: no-repeat;
			    padding: 12px 20px 12px 40px;
			    -webkit-transition: width 0.4s ease-in-out;
			    transition: width 0.4s ease-in-out;
			}

			input[class=empty]:focus {
			    width: 25%;
			}
		</style>
		
	</head>
	<body>
		<section>

			<div class="form-1-2" style="margin-top:15px;">
					<!-- <label for="caja_busqueda">Buscar:</label> -->
					<input type="text" class="empty" name="caja_busqueda" id="caja_busqueda" placeholder="Buscar... &#xF002;"> </input>
			</div>
			
			</br></br>
			<div id="datos">
				
			</div>

		</section> 
		<script src="<?php echo base_url("assets/js/jquery-3.2.1.js"); ?>"></script>
		<script src="<?php echo base_url("assets/js/main.js"); ?>"></script>
		
	</body>
</html>