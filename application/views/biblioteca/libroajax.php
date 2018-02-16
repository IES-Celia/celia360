
<script type="text/javascript" src="<?php echo base_url("assets/js/jquery-3.2.1.js"); ?>"></script>
<script type='text/javascript' src='<?php echo base_url("assets/js/zoom/jquery.zoom.min.js");?>'></script>
<script type="text/javascript" src="<?php echo base_url("assets/js/turn.js"); ?>"></script>
<link rel='stylesheet' href=https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css>
<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/ultimo-estilo.css");?>"/>
<meta charset="UTF-8">
		<script type="text/javascript">
			// var ancho = 1000;
			// var alto = 650;

			$(document).ready(function(){
				
				$("#flipbook").turn({
					width: 1000,
					height: 650,
					elevation: 50,
					autoCenter: true,
					duration:2500
				
				});
			//abrir libro
			$("#numeropag").change(function() {
				var numpag=document.getElementById('numeropag').value;
				var numpag=$("#numeropag").val();
				$('#flipbook').turn('page', numpag);
			});
			
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
				 
			//nuevo
			 $('.closeBook').click(function(){
		        $('.modalita2').css({display:"none"});
		      });	

			$('.zoomimg').zoom({ on:'click' });	
			
				
		</script>
 		
 		<style>
			/* styles unrelated to zoom */
			* { border:0; margin:0; padding:0; }
			p { position:absolute; top:3px; right:28px; color:#555; font:bold 13px/1 sans-serif;}

			/* these styles are for the demo, but are not required for the plugin */
			.zoom {
				display:inline-block;
				position: relative;
			}
			
			/* magnifying glass icon */
			.zoom:after {
				content:'';
				display:block; 
				width:33px; 
				height:33px; 
				position:absolute; 
				top:0;
				right:0;
			}

			.zoom img {
				display: block;
			}

			.zoom img::selection { background-color: transparent; }

			#numeropag{
				position: relative;
			    left: 45%;
			    height: 20px;
			    width: 30px;
			    text-align: right;
			}
			#cantpag{
				position: relative;
			    left: 45%;
			    height: 20px;
			    width: 30px;
			}
			
		</style>


		<div id="bloque" class="animate">
			
			<a href="#" class="next_page a"><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
			<a href="#" class="prev_page"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>
			<!-- NUEVO -->
			<a href="#" class="closeBook"><i class="fa fa-times-circle"></i></a>
			
			<div id="flipbook" class="animated ">
				
				<?php
					$directorio = "assets/imgs/books/$id_libro";
					$arrayPag = scandir($directorio);
					$num_pag = count($arrayPag)-2;

					if($apaisado==0){
						for($i = 0;$i<$num_pag;$i++){
							if((($i==0 || $i==1) || $i==$num_pag-1) || $i==$num_pag-2)
								echo"<div class='hard zoom zoomimg'> <img  src='".base_url("assets/imgs/books/$id_libro/$i.jpg")."'  width='500' height='650' alt=''> </div>";
							else
								echo "<div class='pag zoom zoomimg'> <img src='".base_url("assets/imgs/books/$id_libro/$i.jpg")."' 
						 width='500' height='650' alt='' /> </div>";
						}
					}else{
				?>
<!-- 						<script type="text/javascript">
							ancho = 1076;
							alto = 404;
						</script> -->
						<?php
						for($i = 0;$i<$num_pag;$i++){
							if((($i==0 || $i==1) || $i==$num_pag-1) || $i==$num_pag-2)
								echo"<div class='hard zoom zoomimg'> <img  src='".base_url("assets/imgs/books/$id_libro/$i.jpg")."'  width='800' height='650' alt=''> </div>";
							else
								echo "<div class='pag zoom zoomimg'><img  src='".base_url("assets/imgs/books/$id_libro/$i.jpg")."' width='800' height='650' alt='' /> </div>";
						}
					}

					
				?>
			</div>
			<div>
				<input type='text' id='numeropag'><?php echo "<input type='text' id='cantpag' value='/$num_pag' readonly>";?>
			</div>
		</div>
