<script type="text/javascript" src="<?php echo base_url("assets/js/jquery-3.2.1.js"); ?>"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/ultimo-estilo.css");?>"/>
<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
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

			//Abrir pagina libro especifica
			$("#numeropag").change(function() {
				var numpag=document.getElementById('numeropag').value;
				var numpag=$("#numeropag").val();
				$('#flipbook').turn('page', numpag);
			});
			

			//ABRIR LIBRO
				/*setTimeout(function() {
					$('#flipbook').turn('page', 2);
					},1000);*/
				


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

			//zoom

			/*$( "img.imagenpagina" ).on( "click", function() {
  				wheelzoom(document.getElementsByClassName('imagenpagina'));
  			});*/



			<?php
			$directorio = "assets/imgs/books/$id_libro";
					$arrayPag = scandir($directorio);
					$num_pag = count($arrayPag)-2;
					for($i = 0;$i<$num_pag;$i++){

						echo "
							$('#imglibro$i').on('click',function(){
					        $('#imglibro$i').css('height', '1300px');
					        $('#imglibro$i').css('width', '1000px');
					      });

					        $('#imglibro$i').draggable({
					           drag: function(evt,ui)
					                {
					                    var anchura = parseInt($('#imglibro$i').css('width').split('px')[0]);
					                    var altura =parseInt($('#imglibro$i').css('height').split('px')[0]);
					                    

					                    if (ui.position.left < 500 - $(this).width() )
					                         ui.position.left = 500 - $(this).width(); 
					                    if (ui.position.left + $(this).width()> anchura)
					                          ui.position.left = 0;
					                    if (ui.position.top < -altura+650 )
					                        ui.position.top = 650 - $(this).height();
					                    if (ui.position.top + $(this).height() > altura)
					                            ui.position.top = 0;

					                    $('html, body').scrollTop(280)
					                  
					                }  
					        });";
						}
			?>

			});
			
				


		</script>

 		<style>
			/* styles unrelated to zoom */
			* { border:0; margin:0; padding:0; }
			p { position:absolute; top:3px; right:28px; color:#555; font:bold 13px/1 sans-serif;}

			/* these styles are for the demo, but are not required for the plugin */
			/*.zoom {
				display:inline-block;
				position: relative;
			}
			
			// magnifying glass icon 
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

			.zoom img::selection { background-color: transparent; }*/

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

					$directorio_PDF ="assets/pdf/$id_libro";
					$arrayPDF = scandir($directorio_PDF);
					$num_pdf = count($arrayPDF)-1;

					if($apaisado==0){
						for($i = 0;$i<$num_pag;$i++){
							echo "<div class='pag imagenpagina'> <img class='imagenpagina' id='imglibro$i'  src='".base_url("assets/imgs/books/$id_libro/$i.jpg")."' 
						 width='500' height='650' alt=''/> </div>";
						}
					}else{
				?>
				<!-- <script type="text/javascript">
							ancho = 1076;
							alto = 404;
						</script> -->
						<?php
						for($i = 0;$i<$num_pag;$i++){
							echo "<div class='pag imagenpagina'><img class='imagenpagina' id='imglibro$i' src='".base_url("assets/imgs/books/$id_libro/$i.jpg")."' width='500' height='650'  alt=''/> </div>";
						}
					}

					
				?>
				
			</div>

			
			<div>
				<input type='text' id='numeropag'><?php echo "<input type='text' id='cantpag' value='/$num_pag' readonly>";?>
			</div>
			<?php 
			echo " 
				<div class='descargar'> 
					<a href='assets/pdf/$id_libro.pdf' style='text-decoration: none; background:#FF0000;padding:15px;color:white;border-radius:10px;float:right;' >Descargar PDF &nbsp;&nbsp;<i class='far fa-file-pdf'></i></a> 
				</div>"; 
			?>
		</div>

		
