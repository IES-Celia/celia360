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
	    <link rel="stylesheet" href="<?php echo base_url("assets/css/estilos_portada.css"); ?>"/>
    <script src="<?php echo base_url("assets/js/efectos_portada.js"); ?>"></script>

		<style type="text/css">
			.contenedor{
				width:900px;
				height:550px;
				position:relative;
				overflow:hidden;
			};
    		.mySlides, #persona{
    			position:absolute;
    		};

		</style>

<script >
	$(document).ready(function(){

		$('.efectBook').click(function(){
		  //$('.modalita2').toggle('slow');
		    idlibro = $(this).attr("idlibro");
		    apaisado = $(this).attr("apaisado");
		    tipo = $(this).attr("tipo");
		    location.href = '<?php echo site_url("biblioteca/vertodosloslibros/");?>'+parseInt(idlibro)+'/'+apaisado+'/'+tipo;
		    //$('.modalita2').load('<?php //echo site_url("biblioteca/ver_biblioteca_ajax/");?>'+parseInt(idlibro)+'/'+apaisado+'/'+tipo);
		          
		});
		$('.cerrarBook').click(function(){
		  //$('.modalita2').toggle('slow');
		    idlibro = $(this).attr("idlibro");
		    apaisado = $(this).attr("apaisado");
		    tipo = $(this).attr("tipo");
		    location.href = '<?php echo site_url("biblioteca/vertodosloslibros/");?>';
		    //$('.modalita2').load('<?php //echo site_url("biblioteca/ver_biblioteca_ajax/");?>'+parseInt(idlibro)+'/'+apaisado+'/'+tipo);
		          
		});
		$(document).keyup(function(e) {
		    if (e.keyCode == 27) { // escape key maps to keycode `27`
		   	 location.href = '<?php echo site_url("biblioteca/vertodosloslibros/");?>';
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

<style>


	td img{
		width:200px;
		height:250px;
	}
	td{
		margin-right:15px;
		margin-left:15px;
	}
	.tablatodo{
		width:200px !important;
		height:200px !important;
		padding:30px;
	}
	.headerbiblioteca{
		width:100%;
		height:115px;
		color:white;
		background:#000000d9;
	}
	.headerbiblioteca h1{
		width: 90%;
    	padding: 20px;
    	height:54px;
	}
	table{
		margin-top:30px;
	}

	.iniciologo{
		width:90px;
		height:110px;
		margin-left:30px;
		margin-top:-75px;
	}

	#contenedorbiblioteca{
	    background: url('<?php echo base_url();?>assets/imagenes/portada/portada5.jpg');
	    background-size: cover;
	    width:100%;
	    height:auto;
	    margin-top: 109px;
 	} 

  .cerrarBook{
  	width: 40px;
    height: 40px;
  	background:#208cbf;
  	color:white;
  	text-align:center;
  	font-size:30px;
  	top: 20px;
    left: 85%;
    position: absolute;
    border-radius:5px;
  }
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



<body>
	 <header id="header_portada" style="margin-top:-110px;"  >
            <div class="contenedor_portada">
            <nav id="nav_portada">
             <ul>
                 <li><img src="<?php echo base_url("assets/imagenes/portada/logo.png"); ?>"/> </li>
                  <li><a id="opcionlibre_portada" onclick='visita_opcion("get_json_libre");'>Modo Libre</a></li>
                 <li><a id="opcionguiada_portada" onclick='visita_opcion("get_json_guiada");'>Visita Guiada</a></li>
                 <li><a href="<?php echo site_url("Puntos_destacados"); ?>" id="opciondestacada_portada">Destacados</a></li>
                  <li><a id="clickbiblio" href="<?php echo site_url("biblioteca/vertodosloslibros"); ?>">Biblioteca</a></li>
                 <li><a id="creditos_portada" href="<?php echo site_url("welcome"); ?>" >Creditos</a></li>
             </ul>
            </nav>
            </div>

        </header>
	<div id="contenedorbiblioteca">

	<?php 
	 
            echo "<table style=''>";  
            echo "<tr>";  

		 	$i = 0;
		    foreach ($tabla as $ides){
		      if($ides['tipo']==0){
		        $i++;
		       
		                     
		          echo "<td class='tablatodo'>";
		          echo "<a href='#' ><img id='verlibro' idlibro='".$ides['id_libro']."' apaisado='".$ides['apaisado']."' tipo='".$ides['tipo']."' class='efectBook ocultar' src='".base_url("assets/libros/$ides[id_libro]/0.jpg")."' ></a>";echo "<div style='text-align:center;background:#1a76a2;color:white;margin-top:20px;height:auto;overflow:hidden;padding:10px;'>'".$ides['titulo']."'";
		          echo "</div></td>";
		      }
		          if ($i%5 == 0)  echo "</tr><tr class=''>";
		            }
		            echo "</tr></table>";
		  //otro cambio
		echo "</div></div>";

?>

<!-- ******************* Capa modal para mostrar el libro ****************** --> 

<?php
	if ($id_libro != -1) {	// Si id_libro = -1 significa que no hay ningún libro seleccionado, y no cargaremos nada en la modal
?>

<div class="modalita2"  >
		<div class="container">
			<!-- Top Navigation -->
			<a href="#" class="cerrarBook">x</a>
			<header>	
			</header>
			<div class="main clearfix">
				<div class="bb-custom-wrapper">
					<div id="bb-bookblock" class="bb-bookblock contenedor" style="margin-top:5%;margin-left:15%;">
				<?php
					$directorio = "assets/libros/$id_libro";
					$arrayPag = scandir($directorio);
					$num_pag = count($arrayPag)-2;

					$directorio_PDF ="assets/pdf/$id_libro";
					$arrayPDF = scandir($directorio_PDF);
					$num_pdf = count($arrayPDF)-1;
					
				echo"<script>alert(".$apaisado.");</script>";
					for($i=0;$i<$num_pag;$i++){
						if($i==0){
							echo " <div class='bb-item' ><img class='mySlides'  src='".base_url("assets/libros/$id_libro/$i.jpg")."' alt='image01'/ style='float:right;' width='450' height='550'></div> ";
						}else{
							echo " <div class='bb-item'><img class='mySlides'  src='".base_url("assets/libros/$id_libro/$i.jpg")."' alt='image01'/ style='float:right;' width='900' height='550'></div> ";
						 }
					}
							
				?>
					</div>
					<nav style="width:250%;">
						<a id="bb-nav-first" href="#" class="bb-custom-icon bb-custom-icon-first">Primera Pagina</a>
						<a id="bb-nav-prev" href="#" class="bb-custom-icon bb-custom-icon-arrow-left">Anterior</a>
						<!-- AQUI HAY CANTIDAD -->
						<!-- <div>
							<input type='text' id='numeropag'><?php echo "<input type='text' id='cantpag' value='/$num_pag' readonly>";?>
						</div> -->
						<a id="bb-nav-next" href="#" class="bb-custom-icon bb-custom-icon-arrow-right">Siguiente</a>
						<a id="bb-nav-last" href="#" class="bb-custom-icon bb-custom-icon-last">Ultima Pagina</a>
					</nav>
				</div>
				<?php 
					echo " 
						<div class='descargar' style=''> 
							<a href='assets/pdf/$id_libro.pdf' style='text-decoration: none; background:#31a3dd;padding:15px;color:white;border-radius:10px;float:right;position: absolute;left: 62%;top: 580px;' >Descargar PDF &nbsp;&nbsp;<i class='far fa-file-pdf'></i></a> 
						</div>"; 
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

						// add navigation events
						config.$navNext.on( 'click touchstart', function() {
							config.$bookBlock.bookblock( 'next' );
							return false;
						} );

						config.$navPrev.on( 'click touchstart', function() {
							config.$bookBlock.bookblock( 'prev' );
							return false;
						} );

						config.$navFirst.on( 'click touchstart', function() {
							config.$bookBlock.bookblock( 'first' );
							return false;
						} );

						config.$navLast.on( 'click touchstart', function() {
							config.$bookBlock.bookblock( 'last' );
							return false;
						} );
						
						// // add swipe events
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
									down : 40
								};

							switch (keyCode) {
								case arrow.left:
									config.$bookBlock.bookblock( 'prev' );
									break;
								case arrow.right:
									config.$bookBlock.bookblock( 'next' );
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

			                    if (ui.position.left < 900 - $(this).width() )
			                         ui.position.left = 900 - $(this).width(); 
			                    if (ui.position.left + $(this).width()> anchura)
			                          ui.position.left = 0;
			                    if (ui.position.top < -altura+550 )
			                        ui.position.top = 550 - $(this).height();
			                    if (ui.position.top + $(this).height() > altura)
			                            ui.position.top = 0;

			                    $('html, body').scrollTop(280)
			                  
			                }  
			         });
/*
			        $(".mySlides").draggable({
			              revert: true
			             });

			         $(".contenedor").mouseleave(function(e){
			           $(".mySlides").css({
			                  "height": "650px",
			                  "width": "1000px"
			              });
			         });

*/
		      });

		      $(function(){
                
               
                
                
                
			  $('.mySlides').mousewheel(function(event, delta){
                    x=event.pageX - $('.mySlides').offset().left;
				    y=event.pageY - $('.mySlides').offset().top;
					var anchura=parseInt($('.mySlides').css('width').split('px')[0]);
                    var altura=parseInt($('.mySlides').css('height').split('px')[0]);
                    var izquierda=parseInt($('.mySlides').css('left').split('px')[0]);
                    var arriba=parseInt($('.mySlides').css('top').split('px')[0]);				 
					var aux1=anchura / (500-izquierda);
                    var aux2=altura / (325-arriba);
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
					  		var antIz=izquierda	
                            izquierda = 900 - anchura; 
                            console.log("primer left: "+antIz+" < "+izquierda);
                        }
                         
                        if (izquierda + anchura > anchura){
							var antIz=izquierda+anchura
							console.log("segundo left : "+izquierda+" < "+anchura)
                          	izquierda = 0;
                          	console.log("segundo left despues: "+izquierda)
                        }

                        if (arriba < 550-altura ){
							var antAr = 550-altura;
                            arriba = 550 - altura;
                           console.log("primer top: "+arriba+" < "+antAr);
                        }
                        if (arriba + altura > altura){
							console.log(arriba+altura>altura);
							//console.log("arriba+altura: "+arriba+altura+" altura: "+altura);
                            arriba = 0;
                           console.log("segundo top: "+arriba)

                        }
				  //, 
				  $('.mySlides').css({'width':anchura+"px", 'height': altura+"px",'top': arriba+"px", 'left': izquierda+"px"})
				  
			  	});

			  	
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