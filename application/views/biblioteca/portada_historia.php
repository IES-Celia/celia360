<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="<?php echo base_url("assets/css/ultimo-estilo.css"); ?>"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<link href="https://fonts.googleapis.com/css?family=MedievalSharp" rel="stylesheet">
  	<script src="<?php echo base_url("assets/js/jquery.js"); ?>"></script>
   	<link rel="stylesheet" href="<?php echo base_url("assets/css/ultimo-estilo.css"); ?>"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/biblio/css/default.css");?>" /> 
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/biblio/css/bookblock.css");?>" />
	<!-- custom demo style -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/biblio/css/demo1.css");?>" />
	<script src="<?php echo base_url("assets/biblio/js/modernizr.custom.js");?>"></script>

	<script type="text/javascript" src="<?php echo base_url("assets/biblio/js/jquery-3.2.1.js");?>"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 
	<script src="http://iescelia.org/carmen-de-burgos/mapa/js/libs/jquery-mousewheel/jquery.mousewheel.min.js" type="text/javascript"></script>
	

		<style type="text/css">
			.contenedor{
				/* width: 900px; */
				/* height: 550px; */
				/* margin-left: 15%; */
				position: relative;
				overflow: hidden;
			};
    		.mySlides, #persona{
    			position:absolute;
    		};
    		#numeropag{
				position: relative;
			    /*left: 45%;*/
			    height: 20px;
			    width: 51px;
			    text-align: right;
			    padding:10px;

			};
			#cantpag{
				position: relative;
			    /*left: 45%;*/
			    height: 20px;
			    width: 51px;
			    padding:10px;

			};
			.cerrarBook{
			  	width: 40px;
			    height: 40px;
			  	background:#208cbf;
			  	color:white;
			  	text-align:center;
			  	font-size:30px;
			  	top: 20px;
			    left: 96%;
			    position: absolute;
			    border-radius:5px;
			  }


		</style>

<script >
	$(document).ready(function(){

		$('.efectBook').click(function(){
		  //$('.modalita2').toggle('slow');
		    idlibro = $(this).attr("idlibro");
		    apaisado = $(this).attr("apaisado");
		    tipo = $(this).attr("tipo");
		    location.href = '<?php echo site_url("biblioteca/abrir_phistoria/");?>'+parseInt(idlibro)+'/'+apaisado+'/'+tipo;
		    //$('.modalita2').load('<?php //echo site_url("biblioteca/ver_biblioteca_ajax/");?>'+parseInt(idlibro)+'/'+apaisado+'/'+tipo);
		          
		});
		$('.cerrarBook').click(function(){
		  //$('.modalita2').toggle('slow');
		    idlibro = $(this).attr("idlibro");
		    apaisado = $(this).attr("apaisado");
		    tipo = $(this).attr("tipo");
		    location.href = '<?php echo site_url("biblioteca/abrir_phistoria");?>';
		  
		    //$('.modalita2').load('<?php //echo site_url("biblioteca/ver_biblioteca_ajax/");?>'+parseInt(idlibro)+'/'+apaisado+'/'+tipo);
		          
		});
		$(document).keyup(function(e) {
		    if (e.keyCode == 27) { // escape key maps to keycode `27`
		   	 location.href = '<?php echo site_url("biblioteca/abrir_phistoria");?>';
		    }
		});

		//Abrir pagina libro especifica
		$("#numeropag").change(function() {
			var numpag=document.getElementById('numeropag').value;
			var numpag=$("#numeropag").val();
			$('#flipbook').turn('page', numpag);
		});

		
		
	}); 
</script>
	<title>Celia Tour</title>

	<style type="text/css">
		.modalita{
			background: url('<?php echo base_url();?>assets/imagenes/portada/portada_historia.jpg');
			background-size: cover; 
			height: 100%;
			width: 100%;
		}
	</style>
</head>
<body style="width:100%;">
	<div id="tutorial">
		
	</div>
	<div>
		<div class="modalita" >
	      <div class="contenido" style="background:url('<?php echo base_url();?>assets/css/textura.jpg');width:600px;margin:0 auto;margin-top:40px;border-radius:15px;">
	        <div class="cabecera-ventana" style="background:url('<?php echo base_url();?>assets/css/textura.jpg');height:60px;border-radius:15px;">
	          <h1 style="font-family: 'MedievalSharp', cursive; text-align:center;border-bottom:1px solid grey;color:black;font-size:55px;padding:10px;">Biblioteca historia</h1>
	        </div>
	        <div class="pared" >
	        <div class="cuerpo-ventana fondo" style="margin-top:19px;height:450px; ">
	            <?php

	                    
	                    echo "<div class='estanteria' >"; 
	                      echo "<div class='nuevecica'  >"   ;    
	                        echo "<table >";  
	                        echo "<tr>";
	                        $i = 0;
	                        foreach ($tabla as $ides){
	                          if($ides['tipo']==1){
	                            $i++;
	                            //Sacamos las portadas de los libros
	                            
	                              echo "<td class='columna'>";
	                              if ($ides['id_libro'] == -1) {
	                              	// Ñapa para el libro sobre Celia Viñas con animaciones (caso particular que no va a existir en ningún otro tour virtual; se distingue porque el libro tiene id = -1)
	                              	echo "<a href='".base_url("libro-celia-vinas/index.php")."' ><img class='efectBook ocultar' src='".base_url("assets/libros/$ides[id_libro]/0.jpg")."' ></a>";
	                              }
	                              else {
	                              	// Caso general para TODOS los libros
	                              	echo "<a href='#' ><img id='verlibro' idlibro='".$ides['id_libro']."' apaisado='".$ides['apaisado']."' class='efectBook ocultar' src='".base_url("assets/libros/$ides[id_libro]/0.jpg")."' ></a>";
	                              }
	                              echo "</td>";
	                          }
	                              if ($i%4 == 0)  echo "</tr><tr class='torre'>";
	                                }
	                                echo "</tr></table>";
	                      echo "</div>";
	                    echo "</div>";
	        ?>
	        </div>
	        </div>
	        <div class="pie-ventana" style="border-top:1px solid grey;border-radius:5px; height:75px;padding:18px;">
	          <a href="<?php echo site_url("index.php"); ?>" class="btn-2" style="float:right;">Cerrar</a>
	        </div>
	    </div>
	  </div>
	 </div>
	
	<!-- ******************* Capa modal para mostrar el libro ****************** --> 

<?php
	if ($id_libro != -1) {	// Si id_libro = -1 significa que no hay ningún libro seleccionado, y no cargaremos nada en la modal
?>

<div class="modalita2"  >
		<div class="container">
			<!-- Top Navigation -->
			<a href="#" class="cerrarBook" style="width: 40px;height: 40px;background:#303031e0;color:white;text-align:center;font-size:30px;top: 20px;left: 85%;position: absolute;border-radius:5px;">x</a>
			<header>	
			</header>
			<div class="mainBiblioteca clearfix">
				<div class="bb-custom-wrapper">
					<div id="bb-bookblock" class="bb-bookblock contenedor" style="margin-top:5%;">
				<?php
					$directorio = "assets/libros/$id_libro";
					$arrayPag = scandir($directorio);
					$num_pag = count($arrayPag)-2;

					$directorio_PDF ="assets/pdf/$id_libro";
					$arrayPDF = scandir($directorio_PDF);
					$num_pdf = count($arrayPDF)-1;
					
					if($apaisado==1){
						?>
						<script type="text/javascript">
						$(".contenedor").css("width", "1200px");
						$(".contenedor").css("height", "450px");
						$(".contenedor").css("margin-left", "0%");
						</script>
						<?php
						for($i=0;$i<$num_pag;$i++){
							if($i==0){
								echo " <div class='bb-item' ><img class='' id='".($i+1)."' src='".base_url("assets/libros/$id_libro/$i.jpg")."' alt='image01'/ style='left: 300px;' width='600' height='450'></div> ";
							}else{
								echo " <div class='bb-item'><img class='mySlides'  id='".($i+1)."' src='".base_url("assets/libros/$id_libro/$i.jpg")."' alt='image01'/ style='' width='1200' height='450'></div> ";
							 }
						}
					}else{
						?>
						<script type="text/javascript">
						$(".contenedor").css("width", "900px");
						$(".contenedor").css("height", "550px");
						$(".contenedor").css("", "");
						</script>
						<?php
						for($i=0;$i<$num_pag;$i++){
							if($i==0 || $i==$num_pag){
								echo " <div class='bb-item' ><img class=''  id='".($i+1)."' src='".base_url("assets/libros/$id_libro/$i.jpg")."' alt='image01'/ style='left: 224px;' width='450' height='550'></div> ";
							}else if($i== $num_pag-1){
								echo " <div class='bb-item' ><img class=''  id='".($i+1)."' src='".base_url("assets/libros/$id_libro/$i.jpg")."' alt='image01'/ style='left: 224px;' width='450' height='550'></div> ";
						
						}else{
								echo " <div class='bb-item'><img class='mySlides' id='".($i+1)."' src='".base_url("assets/libros/$id_libro/$i.jpg")."' alt='image01'/ style='' width='900' height='550'></div> ";
							 }
						}
					}
							
				?>
					</div>
					<nav style="width:100%;">
						<a id="bb-nav-first" href="#" class="bb-custom-icon bb-custom-icon-first">Primera Pagina</a>
						<a id="bb-nav-prev" href="#" class="bb-custom-icon bb-custom-icon-arrow-left">Anterior</a>
						<!-- AQUI esta el numero de pagina -->
						<span style="position:relative; top:-10px;">
						<input type='text' id='numeropag' value="1" pattern="[0-9]" style="width:40px;padding:5px;background:#303031e0;border:none;color:white;"><?php echo "<input type='text'  style='width:40px;padding:5px;background:#303031e0;border:none;color:white;' id='cantpag' value=' $num_pag' readonly>";?> 
						</span>
						<a id="bb-nav-next" href="#" class="bb-custom-icon bb-custom-icon-arrow-right">Siguiente</a>
						<a id="bb-nav-last" href="#" class="bb-custom-icon bb-custom-icon-last">Ultima Pagina</a>
					</nav>
					
				</div>
				<?php 
				$nombre_fichero = "assets/pdf/$id_libro.pdf";
					print_r($nombre_fichero);
				if (file_exists($nombre_fichero)) {
					echo " 
					<div class='descargar' style=''> 
						<a href='".base_url("assets/pdf/$id_libro.pdf")."' target='_blank' style='text-decoration: none; background:#303031f5;padding:15px;color:white;border-radius:10px;float:right;position: absolute;left: 62%;top: 89%;' >Descargar PDF &nbsp;&nbsp;<i class='far fa-file-pdf'></i></a> 
					</div>"; 
				} else {
					echo " 
						<div class='descargar' style='display:none;'> 
							<a href='".base_url("assets/pdf/$id_libro.pdf")."' target='_blank' style='text-decoration: none; background:#303031f5;padding:15px;color:white;border-radius:10px;float:right;position: absolute;left: 62%;top: 89%;' >Descargar PDF &nbsp;&nbsp;<i class='far fa-file-pdf'></i></a> 
						</div>"; 
				}
					
				?>
			</div>

		</div>
		<!-- /container -->
		<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> -->
		<script src="<?php echo base_url("assets/biblio/js/jquerypp.custom.js");?>"></script>
		<script src="<?php echo base_url("assets/biblio/js/jquery.bookblock.js");?>"></script>
		<script>
			var Page = (function() {
				
				var config = {
						$bookBlock : $( '#bb-bookblock' ),
						$navNext : $( '#bb-nav-next' ),
						$navPrev : $( '#bb-nav-prev' ),
						$navFirst : $( '#bb-nav-first' ),
						$navLast : $( '#bb-nav-last' )
					},
					init = function() {
						config.$bookBlock.bookblock( {
							speed : 800,
							shadowSides : 0.8,
							shadowFlip : 0.7
						} );
						initEvents();
					},
					initEvents = function() {
						
						var $slides = config.$bookBlock.children();
						var guardado=1;
						// add navigation events
						config.$navNext.on( 'click touchstart', function() {
							var tpg =$("#cantpag").val();
							var pg = $("#numeropag").val();
							
							tpg = parseInt(tpg);
							pg = parseInt(pg);
							if(pg<tpg){
								var newpg = parseInt(pg)+1; 
								$("#numeropag").val(newpg); 
								guardado=newpg;								
							}else{
								$("#numeropag").val(tpg);
								guardado=tpg;
							}

							config.$bookBlock.bookblock( 'next' );
							
							$("#bb-nav-next").css("pointer-events", "none");

							setTimeout(function(){$("#bb-nav-next").css("pointer-events", "auto");}, 1000);
							return false;
						} );

						config.$navPrev.on( 'click touchstart', function() {
							var pg = $("#numeropag").val();

							if(pg!=1){
								var newpg = parseInt(pg)-1; 
								$("#numeropag").val(newpg);
								guardado=newpg;
							}else{
								$("#numeropag").val(1);
								guardado=1;
							}
							config.$bookBlock.bookblock( 'prev' );

							$("#bb-nav-prev").css("pointer-events", "none");

							setTimeout(function(){$("#bb-nav-prev").css("pointer-events", "auto");}, 1000);
							return false;
						} );

						config.$navFirst.on( 'click touchstart', function() {
							$("#numeropag").val(1);
							config.$bookBlock.bookblock( 'first' );
							guardado=1;
							return false;
						} );

						config.$navLast.on( 'click touchstart', function() {
							var ultpg = $("#cantpag").val();
							$("#numeropag").val(ultpg);
							guardado=ultpg;
							config.$bookBlock.bookblock( 'last' );
							return false;
						} );
						
						// // CAMBIAR DE PAGINA AL ARRASTRAR
						// $slides.on( {
						// 	'swipeleft' : function( event ) {
						// 		config.$bookBlock.bookblock( 'next' );
						// 		return false;
						// 	},
						// 	'swiperight' : function( event ) {
						// 		config.$bookBlock.bookblock( 'prev' );
						// 		return false;
						// 	}
						// } );

						// add keyboard events

						$( document ).keydown( function(e) {
							var keyCode = e.keyCode || e.which,
								arrow = {
									left : 37,
									up : 38,
									right : 39,
									down : 40,
									enter : 13
								};

							switch (keyCode) {
								case arrow.left:
									var pg = $("#numeropag").val();
									if(pg!=1){
										setTimeout(function(){$("#numeropag").val(parseInt(pg)-1);}, 800);
										guardado=parseInt(pg)-1;
									}else{
										$("#numeropag").val(1);
										guardado=1;
									}
									config.$bookBlock.bookblock( 'prev' );
								break;
								case arrow.right:
									var tpg =$("#cantpag").val();
									var pg = $("#numeropag").val();

									pg= parseInt(pg);
									tpg = parseInt(tpg);
									if(pg<tpg){

										setTimeout(function(){$("#numeropag").val(parseInt(pg)+1);}, 800);	
										guardado=parseInt(pg)+1;							
									}else{

										$("#numeropag").val(tpg);
										guardado=tpg;
									}
									config.$bookBlock.bookblock( 'next' );
								break;
								case arrow.enter:
									var pag = $("#numeropag").val();
									var maxpg = $("#cantpag").val();
									pag= parseInt(pag);
									maxpag = parseInt(maxpg);
									if(Number.isNaN(pag)){
										pag=guardado;
									}
									if(pag>maxpg){
										$("#numeropag").val(maxpg);
										config.$bookBlock.bookblock('jump',maxpg);
										guardado=maxpg;
									}else{
										$("#numeropag").val(pag);
										config.$bookBlock.bookblock('jump',pag);
										guardado=pag;
									}
								break;
							}
						} );
					};

					return { init : init };

			})();
		</script>
		<script>
				Page.init();
		</script>
		<script>

		      $(document).ready(function(){

			        $('.mySlides').draggable({

			           drag: function(evt,ui)
			                {
			                    var anchura = parseInt($('.mySlides').css('width').split('px')[0]);
			                    var altura =parseInt($('.mySlides').css('height').split('px')[0]);
			                    //anchura: 1000
			                    //altura: 600
			                    <?php 
			                    	if($apaisado==1){
			                    		echo"
						                    if (ui.position.left < 1200 - $(this).width() )
						                         ui.position.left = 1200 - $(this).width(); 
						                    if (ui.position.left + $(this).width()> anchura)
						                          ui.position.left = 0;
						                    if (ui.position.top < -altura+450 )
						                        ui.position.top = 450 - $(this).height();
						                    if (ui.position.top + $(this).height() > altura)
						                            ui.position.top = 0;

						                    $('html, body').scrollTop(280)";
			                    	}else{
			                    		echo"
						                    if (ui.position.left < 900 - $(this).width() )
						                         ui.position.left = 900 - $(this).width(); 
						                    if (ui.position.left + $(this).width()> anchura)
						                          ui.position.left = 0;
						                    if (ui.position.top < -altura+550 )
						                        ui.position.top = 550 - $(this).height();
						                    if (ui.position.top + $(this).height() > altura)
						                            ui.position.top = 0;

						                    $('html, body').scrollTop(280)";
			                    	}
			                    ?>
			                  
			                }  
			         });

		      });

		      $(function(){
                
              <?php 
                	if($apaisado==1){
                		echo" 
                			$('.mySlides').mousewheel(function(event, delta){
			                    x=event.pageX;
							    y=event.pageY;
								var anchura=parseInt($('.mySlides').css('width').split('px')[0]);
			                    var altura=parseInt($('.mySlides').css('height').split('px')[0]);
			                    var izquierda=parseInt($(this).css('left').split('px')[0]);
			                    var arriba=parseInt($(this).css('top').split('px')[0]);				 
								var aux1=anchura / (x-izquierda);
			                    var aux2=altura / (y-arriba);
			                    var contador=0;
							  if(delta>0){
			                      
								  anchura+=200*delta;
								  altura+=108*delta;
								  contador+=1*delta;
								  
								  if(anchura>7700 || altura>4179){
			                            anchura=7700;
			                          altura=4179;
			                        }else{
										izquierda=(izquierda-(200*delta/aux1));
			                            arriba=(arriba-(108*delta/aux2));
			                            }
			                      
			                     
								  
							  }else{
			                      anchura-=200
			                      altura-=108
			                      
								  if(anchura<1200 || altura<450){
			                          altura=450;
			                          anchura=1200;
			                      }else{
			                          
			                          izquierda=(izquierda+(200/aux1));
			                          arriba=(arriba+(108/aux2));
			                      }
							  }
							  if (izquierda < 1200 - anchura ){
								  		var antIz=izquierda	
			                            izquierda = 1200 - anchura; 
			                            console.log('primer left: '+antIz+' < '+izquierda);
			                        }
			                         
			                        if (izquierda + anchura > anchura){
										var antIz=izquierda+anchura
										console.log('segundo left : '+izquierda+' < '+anchura)
			                          	izquierda = 0;
			                          	console.log('segundo left despues: '+izquierda)
			                        }

			                        if (arriba < 450-altura ){
										var antAr = 450-altura;
			                            arriba = 450 - altura;
			                           console.log('primer top: '+arriba+' < '+antAr);
			                        }
			                        if (arriba + altura > altura){
										console.log(arriba+altura>altura);
										//console.log('arriba+altura: '+arriba+altura+' altura: '+altura);
			                            arriba = 0;
			                           console.log('segundo top: '+arriba)

			                        }
							  //, 
							  $('.mySlides').css({'width':anchura+'px', 'height': altura+'px','top': arriba+'px', 'left': izquierda+'px'})
							  
						  	});";
                	}else{
                		echo"
                			$('.mySlides').mousewheel(function(event, delta){
			                    x=event.pageX;
							    y=event.pageY;
								var anchura=parseInt($('.mySlides').css('width').split('px')[0]);
			                    var altura=parseInt($('.mySlides').css('height').split('px')[0]);
			                    var izquierda=parseInt($(this).css('left').split('px')[0]);
			                    var arriba=parseInt($(this).css('top').split('px')[0]);				 
								var aux1=anchura / (x-izquierda);
			                    var aux2=altura / (y-arriba);
			                    var contador=0;
							  if(delta>0){
			                      
								  anchura+=200*delta;
								  altura+=108*delta;
								  contador+=1*delta;
								  
								  if(anchura>7700 || altura>4179){
			                            anchura=7700;
			                          altura=4179;
			                        }else{
										izquierda=(izquierda-(200*delta/aux1));
			                            arriba=(arriba-(108*delta/aux2));
			                            }
			                      
			                     
								  
							  }else{
			                      anchura-=200
			                      altura-=108
			                      
								  if(anchura<900 || altura<550){
			                          altura=550;
			                          anchura=900;
			                      }else{
			                          
			                          izquierda=(izquierda+(200/aux1));
			                          arriba=(arriba+(108/aux2));
			                      }
							  }
							  if (izquierda < 900 - anchura ){
								  		var antIz=izquierda;
			                            izquierda = 900 - anchura; 
			                            console.log('primer left: '+antIz+' < '+izquierda);
			                        }
			                         
			                        if (izquierda + anchura > anchura){
										var antIz=izquierda+anchura;
										console.log('segundo left : '+izquierda+' < '+anchura)
			                          	izquierda = 0;
			                          	console.log('segundo left despues: '+izquierda)
			                        }

			                        if (arriba < 550-altura ){
										var antAr = 550-altura;
			                            arriba = 550 - altura;
			                           console.log('primer top: '+arriba+' < '+antAr);
			                        }
			                        if (arriba + altura > altura){
										console.log(arriba+altura>altura);
										//console.log('arriba+altura: '+arriba+altura+ altura: '+altura);
			                            arriba = 0;
			                           console.log('segundo top: '+arriba)

			                        }
							  //, 
							  $('.mySlides').css({'width':anchura+'px', 'height': altura+'px','top': arriba+'px', 'left': izquierda+'px'})
							  
						  	});
			                		";
                	}

                ?>
                
			  });

			  $( '.mySlides' ).on( 'mousewheel DOMMouseScroll', function ( e ) {
                var e0 = e.originalEvent,
                    delta = e0.wheelDelta || -e0.detail;

                this.scrollTop += ( delta < 0 ? 1 : -1 ) * 30;
                e.preventDefault();
            	});
			

  </script>   



</div>
<?php
}	// Fin del if (id_libro != -1)
?>
</body>
</html>