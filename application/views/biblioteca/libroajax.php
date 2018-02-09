<script type="text/javascript" src="<?php echo base_url("assets/js/jquery-3.2.1.js"); ?>"></script>

<script type="text/javascript" src="<?php echo base_url("assets/js/turn.js"); ?>"></script>
<link rel='stylesheet' href=https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css>;
<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/ultimo-estilo.css"); ?>"/>
<meta charset="UTF-8">
		<script type="text/javascript">
			$(document).ready(function(){
				
				$("#flipbook").turn({
					width: 1000,
					height: 650,
					elevation: 50,
					autoCenter: true,
					duration:2500
				
				});
			//abrir libro
				setTimeout(function() {
					$('#flipbook').turn('page', 2);
					},1000);
				});
			//agrega la funcion para la accion del link pagina previa
				 $('.prev_page').click(function(){
				  $('#flipbook').turn('previous');
				 });
				 
			//agrega la funcion para la accion del link pagina siguiente
				 $('.next_page').click(function(){
				  $('#flipbook').turn('next');
				 });
				 
			
				
			//desaperecer libro
				/*setTimeout(function() {
				$('#flipbook').fadeOut(1500);
				},3000);*/
				
		</script>
 


		<div id="bloque" class="animate">
			
			<a href="#" class="next_page a"><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
			<a href="#" class="prev_page"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>
			
			<div id="flipbook" class="animated ">
				
				<?php
					$directorio = "assets/imgs/books/$id_libro";
					$arrayPag = scandir($directorio);
					$num_pag = count($arrayPag)-2;

					for($i = 0;$i<$num_pag;$i++){
						if((($i==0 || $i==1) || $i==$num_pag-1) || $i==$num_pag-2)
							echo"<div class='hard'> <img src='assets/imgs/books/$id_libro/$i.jpg' width='500' height='650' alt=''> </div>";
						else
							echo "<div class='pag'> <img src='assets/imgs/books/$id_libro/$i.jpg' width='500' height='650' alt='' /> </div>";
					}
				?>
				
			</div>
		</div>
