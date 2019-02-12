<!-- Estilos para el mapa de zona -->
<style>
  /* Posicion relativa de los puntos en el mapa de zona */
  .mapa_zona{
    float: none;
    z-index: 2;
    overflow: visible;
    position: relative;
  }
</style>
<!-- Script para el mapa de zona -->
<script>
  $(document).ready(function(){
    //Al seleccionar un punto en el mapa de zona, nos lleva a esa zona y oculta el mapa. PD: Lo siento Dora, adios mapa.
    $(".punto_mapa_zona").click(function(){
      $("#myModal").hide();
    })
  });
</script>

<div class="contenedor">
    <!--div donde se carga pannellum --> 

  <div id="panorama">

	<!-- carga de panoramas secundarios -->
	<div id="addBoton">
		
		</div>

		<div id="btnVolver">
		</div>
			<div class='nav oculto'>

			</div>


<!-- </fin carga panorama secundarios -->


    <!-- Botón menú --> 
    <div class="boton_menu">
        
    </div>
          <!-- Boton Versiones -->
          <div class='version-icono'></div>
          <ul class='version-lista'></ul>
          <!-- Botón full screen-->
          <div class="ctrl" id="fullscreen"></div>

           <!-- Vídeo visita libre -->
		
          <div id="modal_video" class="video">  
            <div class="overlay">
              <a class="cerrarVideo" href="#">&times;</a>
            </div>
            <div id='video_visita_libre'>
              <iframe id='vimeo_video' src="" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
              
            </div>
          </div>
          <!-- Fin vídeo visita libre -->
          
          <!-- Inicio visita guiada -->
          <div id="mensaje_guiada">
          <h3 style="text-align: center;">Visita guiada</h3>
          <div class='mensaje_guiada_inicio_recomendacion'>
            <hr class="mensaje_separador"> 
            <p>Consejos antes de empezar 👵🏻</p>
            
            <ol>
              <li>Revise y/o ponga en funcionamiento su sistema de audio.</li>
              <li>Cuando termine la descripción de una estancia, pasaremos automáticamente a la siguiente.</li>
              <li>En cualquier momento es posible trasladarse a la estancia deseada mediante los botones de siguiente y anterior. El faro le permite seleccionar la estancia.</li>
              <li>Si desea permanecer en una estancia indefinidamente, detenga el audio.</li>
            </ol>
            <hr class="mensaje_separador">
          </div>
          <h4 style='text-align: center; color:white;'>Para iniciar la visita, pulse el botón.</h4>
          <div id="boton_aceptar_guiada"></div>
        </div>
          <div id="menu_guiada_show">
          <div class="titulo_guiada"></div>
             
            <div class="main">
              <div class="slider-nav">
              </div>
            </div>
       
          
          <div class="menu_vguiada">
            <ul>
              <li><div class='icono_left' onclick="anterior();"></div></li>
              <li><div class='icono_pp' onclick="estado_audio();"></div></li>
              <li><div class='icono_menu menu_slider'></div></li>
              <li><div class='icono_right' onclick="siguiente();"></div></li>
            </ul>
          </div>

          </div>
          <!-- Fin visita guiada -->
          
          <!-- Inicio Galería -->
            <div id="GmyModal" class="Gmodal">
              <span class="Gclose cursor" onclick="closeModal()">&times;</span>
              <div class="Gmodal-content">
                <a class="Gprev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="Gnext" onclick="plusSlides(1)">&#10095;</a>
                
              </div>
              <p id=descripcion></p>
          </div>
          <!-- Fin galería -->
            
          <!-- Ventana Modal Galería -->
              <div class="modal">
                <div class="overlay"></div>
                <div id='documentoPanel'>
                  <a class="cerrarDocumento" href="#">&times;</a>            
                    <object id='mostrarDocumento' data="" type="application/pdf">
                      Su navegador no soporta esta función, intente abrirlo con el enlace.</a>
                    </object>   
                </div>
                <div class="modal__contents">
                  <a class="modal__close" href="#">&times;</a>
                  <p id="titulo"></p>
                  <hr class='mensaje_separador_negro'></hr>
                  <div id="gallery">
                    <div class='mas_img_div' onclick="openModal();">
                      <div class='mas_imagenes'></div>
                      <p style="text-align:center;">&plus; Imágenes</p>
                    </div>
                    <img src="">
                  </div>
                  <hr class='mensaje_separador_negro'></hr>
                
                  <div id="texto">
                
                  </div> 
                  <button id='botonDoc'>Ver mas</button>
                </div>
              </div>
          <!-- Fin Ventana modal galería -->
        
          <!-- Inicio Audio punto sensible LIBRE y GUIADA -->
            <div id="panel_audio_guiada">
              <div class="botonPause"></div>
              <audio id="audio_guiada" src="" controls></audio>
              <div class="icono_audio"></div>
            </div>                          
            <div id="panel_audio_libre">
              <div class="botonPause" title="Ocultar Audio"></div>
              <div class='icono_audio_cerrar' title="Cerrar Audio"></div>
              <audio id="audio_libre" src=""  controls></audio>
              <div class="icono_audio" title="Mostrar Audio"></div>
            </div>
          <!-- Fin Audio punto sensible LIBRE y GUIADA -->
        
          <!-- Inicio mapa -->
        <?php
          $mapa = array_reverse($mapa);
          echo "<div id='myModal' class='modalEscaleras mx-auto'>";

          /*
              Si en la portada tienes seleccionado el mapa, aparece un mapa, si tienes seleccionado el ascensor, aparece un ascensor.
              Si no entiendes esto eres mas tonto que Echenique         
          */

          if($portada[11]["opcion_valor"] == "mapa"){
            //Como diria Dora la exploradora, soy un MAPA!!
            echo '<div class="mapa_zona col-md-7 mx-auto" style="height: 400px;">';
            echo "<img src='".base_url("assets/imagenes/mapa/".$portada[12]['opcion_valor'])."' alt='imagen del mapa de zona' style='width:100%; height:100%'>";
            /* Coloca los puntos en la imagen del mapa */ 
            foreach ($mapa as $piso) {
              echo '<div id="'.$piso["piso"].'" class="puntos punto_mapa_zona" style="left: '.$piso["left_zona"].'%; top: '.$piso["top_zona"].'%;" escena="'.$piso["piso"].'" onclick="viewer.loadScene(&#039;'.$piso["escena_inicial"].'&#039;); piso_escalera(&#039;'.$piso["piso"].'&#039;); puntosMapa(&#039;'.$piso["punto_inicial"].'&#039;);"></div>';                
            }
            echo '</div>';
          }else{
            //Ascensor
            foreach ($mapa as $imagen) {
              $piso = $imagen["piso"];
              $escena_inicial = $imagen["escena_inicial"];
              $punto_inicial = $imagen["punto_inicial"];
              $titulo_piso = $imagen["titulo_piso"];
              echo '<button id="p'.$piso.'" class="plantas" onclick="viewer.loadScene(&#039;'.$escena_inicial.'&#039;); piso_escalera(&#039;'.$piso.'&#039;); puntosMapa(&#039;'.$punto_inicial.'&#039;);">'.$titulo_piso.'</button>';
            }
          }
          echo "</div>";//div final de myModal
        ?>
        
        <div id="mapa" style="width: 614px; height: 350px;" class="cerrado">
    <?php
      $mapa = array_reverse($mapa);
      $indice = 0;
    
      foreach ($mapa as $imagen) {
        if($config_mapa["piso_inicial"]==$indice){
          echo "<div id='zona$indice' class='piso_abierto pisos'>";
          echo "<img src='".base_url($imagen['url_img'])."' alt='Zona$indice' style='max-width: 100%;'>";
        }else{
          echo "<div id='zona$indice' class='piso_cerrado pisos'>"; 
          echo "<img src='".base_url($imagen['url_img'])."' alt='Zona$indice'>";
        }
        
          foreach ($puntos as $punto) {
            if($punto['piso']==$indice){
              
              if ("punto".$punto['id_punto_mapa']==$config_mapa["punto_inicial"]) {
              echo "<div id='punto".$punto['id_punto_mapa']."' class='punto_seleccionado' style='left: ".$punto['left_mapa']."%; top: calc(".$punto['top_mapa']."% - 1.57%);' onclick='puntosMapa(\"punto".$punto['id_punto_mapa']."\"); viewer.loadScene(\"".$punto['id_escena']."\")'></div>";
              }else{
                echo "<div id='punto".$punto['id_punto_mapa']."' class='puntos' style='left: ".$punto['left_mapa']."%; top: calc(".$punto['top_mapa']."% - 1.57%);' onclick='puntosMapa(\"punto".$punto['id_punto_mapa']."\"); viewer.loadScene(\"".$punto['id_escena']."\")'></div>";
              }
              
            }
            
          }
        echo "</div>";
        $indice++;
      }
    ?>

  </div>
  <div id="boton_mapa"class="cerrado_boton boton"></div>

        <div id="subir_piso" style="display:none" class="cerrado_boton boton" onclick="cambiar_piso('arriba')"></div>

        <div id="bajar_piso" style="display:none" class="cerrado_boton boton" onclick="cambiar_piso('abajo'); this.style"></div>
        </div>

	</div>
	<!-- Fin mapa -->

        
        
<script type="text/javascript" src="<?php echo base_url("assets/js/slick/slick/slick.min.js");?>"></script>
<script type="text/javascript">

/*
 * Funciones para cargar el JSON de Pannellum mediante petición Ajax y para ponerlo en marcha.
 */

json_contenido=''; // JSON con el contenido para Pannellum
panorama_html = $("#panorama").html();  // HTML que hay dentro de la capa reservada para el panorama

/*
 * Pide por Ajax el JSON necesario para la visita (libre, guiada o de puntos destacados)
 * @param String nombre Tipo de visita. Los valores válidos son "get_json_libre" y "get_json_guiada"
 */
function visita_opcion(nombre){
  $.ajax({
    url: "<?php echo site_url("tour/"); ?>"+nombre,
    type: 'GET',
    dataType: 'json',
    beforeSend: function(){
      //Si el visor está indefinido, lo destruimos y creamos uno nuevo
      if (typeof viewer !== 'undefined') {
        viewer.destroy();
        $("#panorama").append(panorama_html);          
      } 
      cargarPannellum();
    }
  }).done(function(data) {
			// ¡Hecho! El JSON completo está en data. Vamos a hacerle un par de transformaciones necesarias para que funcione OK.
			$.each(data.scenes, function(i){
        // En la BD tenemos rutas relativas a la imagen del panorama. Las sutituimos por rutas absolutas con base_url()
        data.scenes[i].panorama = "<?php echo base_url();?>"+data.scenes[i].panorama;
				var escenas = data.scenes[i];
        
				
        // Convertimos las funciones manejadoras (clickHandlerFunc) de String a función javascript con eval()
        $.each(escenas.hotSpots, function(j){
          escenas.hotSpots[j].clickHandlerFunc = eval(escenas.hotSpots[j].clickHandlerFunc);
          console.log( escenas.hotSpots[j].clickHandlerFunc);
        });
			});
		
			viewer = pannellum.viewer("panorama", data);

			//console.log(data);


if(nombre=="get_json_guiada"){          // Arrancar la visita guiada
        $("#boton_mapa").hide();        // Esta visita no tiene mapa.
        iniciar_visita_guiada();
        $("#panel_audio_libre").hide(); 
        $('#audio_libre').attr("src","");
			} else {// Arrancar visita libre.
				
        $("#boton_mapa").show();        // Esta visita sí tiene mapa.
        $("#panel_audio_guiada").hide();
        $('#audio_guiada').attr("src","");
        iniciar_visita_libre();
        //Event listener del pannellum, ejecuta codigo dentro del bloque cada vez que cambia de escena.
        viewer.on('load',function(){
					var idEscena = viewer.getScene();

					audio = document.getElementById('audio_libre');
					if(audio.paused == false){
						$("#panel_audio_libre").hide();
    				$("#audio_libre")[0].pause();
    				$('#audio_libre').attr("src","");
						$('#icono_audio').hide();
					}

					if(idEscena.includes('pan_sec')){
						$.ajax({
						url: "<?php echo site_url('Panoramas_Secundarios/getCodEscena/'); ?>"+idEscena,
						type: 'GET',
						dataType: 'json',
  				}).done(function(data) { 

						arrowId = $('#btnVolver');
						arrowId.html('');
						arrowId.removeClass('oculto');

						arrow = "<img src='<?php echo base_url('assets/imagenes/svg/back-arrow.svg'); ?>' class='btnVolver' onclick='viewer.loadScene(\""+data[0].cod_escena+"\");'>";

						arrowId.append(arrow);



					});
				}

					$.ajax({
						url: "<?php echo site_url('Panoramas_Secundarios/consultaPanoramas/'); ?>"+idEscena,
						type: 'GET',
						dataType: 'json',
  				}).done(function(data) { // cuando la escena cambia consulto si la escena tiene panoramas_secundarios

						if(data.length > 0){ //si tiene...
							$('#btnVolver').addClass('oculto');
							divBtn = $('#addBoton');
							navContent = $('.nav');
							divBtn.removeClass('oculto');
							navContent.html('');
							divBtn.html('');
							divBtn.append('<img src="<?php echo base_url("assets/imagenes/svg/menu.svg"); ?>" class="spanImgs">');
							for(i=0;i<data.length;i++){
									loc_imagen = data[i].panorama;
									id_pan_sec = data[i].id_panorama_secundario;
									titulo = data[i].titulo;
									
									navContent.append("<div class='contentNav' onclick='viewer.loadScene(\""+id_pan_sec+"\")'><button class='pan_sec_button'>"+titulo+"</button></div>");
								}	
								
								$('.spanImgs').click(function(){
                	$('.nav').toggle('oculto');
            		});

						}else{
							$('#addBoton').addClass('oculto')
							$('.nav').css('display','none');
						}
						
					});
				});
      }
        console.log("success");
      })
      .fail(function(err) {
        console.log(err.responseText);
      })
} //fin function visita_opcion()



 /*
  * Asigna eventos necesarios al html del id panorama
  */


function cargarPannellum(){

// Si pulsamos en el botón del menú regresamos al homepage
$(".boton_menu").click(function(){
    location.href = "<?php echo site_url(); ?>";
});


//Toggle Audio boton tanto visita libre como guiada.

$("#panel_audio_guiada .botonPause").click(function(){
  if($("#panel_audio_guiada").css("display") == "block"){
    $(".botonPause").hide();
    $("#audio_guiada").hide();
    $(".icono_audio").show();
  }                  
});
  
$("#panel_audio_guiada .icono_audio").click(function(){
    $(".botonPause").show();
    $("#audio_guiada").show();
    $(".icono_audio").hide();
                        
});

$("#panel_audio_libre .botonPause").click(function(){
  if($("#panel_audio_libre").css("display") == "block"){
    $(".botonPause").hide();
    $("#audio_libre").hide();
    $(".icono_audio").show();
    $(".icono_audio_cerrar").hide();
  }                  
});
  
$("#panel_audio_libre .icono_audio").click(function(){
    $(".botonPause").show();
    $("#audio_libre").show();
    $(".icono_audio").hide();
    $(".icono_audio_cerrar").show();
                        
});

$("#panel_audio_libre .icono_audio_cerrar").click(function(){
    $("#panel_audio_libre").hide();
    $("#audio_libre")[0].pause();
    $('#audio_libre').attr("src","");
                        
});

//Variables "globales" de la visita guiada
array_escenas =[];
array_audios =[];
array_titulo = [];
array_previews = [];
indice_escenas = 0;

//Al terminar el audio cambiar a siguiente escena
var audio_terminado = document.getElementById("audio_guiada");
  audio_terminado.onended = function() {
    indice_escenas++;
    if(indice_escenas==array_escenas.length){
      indice_escenas=0;
      audio_guiada(indice_escenas);  
    } else {
      audio_guiada(indice_escenas);  
    } 
  };

//Cambio de escena al clickear en el "slider" de la visita guiada
$( ".menu_slider" ).click(function() {
  if($(".main").css("display")=="none"){
    $(".main").fadeIn().css("display","block");
    var currentSlide = $('.slider-nav').slick('slickCurrentSlide');
    $('.slider-nav').slick('setPosition',currentSlide);
  }else if($(".main").css("display")=="block"){    
    $(".main").css("display","none");
    var currentSlide = $('.slider-nav').slick('slickCurrentSlide');
    $('.slider-nav').slick('setPosition',currentSlide);
  }
});     
  
} // fin function cargar_panellum()


/*
 * Metodo que pone a visible el panel de información de los hotspots de este tipo, cargando además la información correspondiente * al punto pulsado. 
 */
function panelInformacion(hotspotDiv,args){
    
  $(".modal").css("visibility","visible");
  var peticion = $.ajax({
    url: "<?php echo site_url("hotspots/load_panel"); ?>",
    type:"post",
    data:{id_hotspot : args},
    beforeSend: function(){
      //Cambiar el valor del texto y titulo
      $("#titulo").html("Cargando...");
      $("#texto").html("Cargando...");
      //Borrar las tiras creadas en el punto anterior
      $(".GmySlides").each(function(){
        $(this).remove();
      });
      //Quitamos la foto
      $("#gallery").find("img").attr("src","");
      //Quitamos el boton de ver mas
      $("#botonDoc").hide();
    }
  });
    
peticion.done(function(datos){
  var resultado = JSON.parse(datos);
  //Cargamos una vez los datos basicos
  $("#titulo").html(resultado[0].titulo_panel);
  $("#texto").html(resultado[0].texto_panel);
  //La primera imagen que sale al abrir el panel
  var enlace_img =  "<?php echo base_url("assets/imagenes/imagenes-hotspots/")?>"+resultado[0].id_imagen+"_miniatura.jpg";
  $("#gallery").find("img").attr("src",enlace_img);
  //Por cada indice del array creamos la imagen de la galeria
  for(var i=0;i<resultado.length;i++){
    //Para poner bien el enlace con codeigniter guardamos en la variable la url y luego se la pasamos
    var enlace = "<?php echo base_url("assets/imagenes/imagenes-hotspots/")?>"+resultado[i].url_imagen;
    $(".Gmodal-content").append("<img class='GmySlides' src='"+enlace+"' style='width:100%' textoImagen='"+resultado[i].texto_imagen+"'>");
    $(".Gmodal-content").append("<div class='GmyDescr' id='textoImagenGaleria' style='text-align: center; color: #444444; padding: 15px'>"+resultado[i].texto_imagen+"</div>");
  }
   // $(".Gmodal-content").append("<div id='textoImagenGaleria' style='text-align: center; color: #444444; padding: 15px'>"+resultado[i].texto_imagen+"</div>");

  //Si tiene un pdf asociado, mostramos el boton "ver mas"
  if(resultado[0].documento_url!="ninguno"){
    var urlDocumento = "<?php echo base_url("assets/documentos-panel/");?>"+resultado[0].documento_url;
    $("#mostrarDocumento").attr("data",urlDocumento);
    $("#botonDoc").show();

  } else {
    $("#botonDoc").hide();
  }
  
  
  //Poner el indice
  var slideIndex = 1;
  showSlides(slideIndex);  
});
    
  $('.modal').css('display','block');
  $(window).click(function(event){
    if($(event.target).hasClass("modal")){ 
     $('.modal').css('display','none');
    }
  });
    
  $('#close').click(function(event){
    $('.modal').css('display','none');
  });
} //fin function panelInformacion()
  
/*
 * Metodo que activa la ventana modal de las escaleras al clickar en un hotspot de tipo escalera. 
 */
function escaleras(){
  nombreEscena = viewer.getScene();
  pisoActual = nombreEscena.substring(0,2);
  largo = $(".plantas").length;
  nombre = $(".plantas").attr("id");
  $('.plantas').each(function(){
    $(this).removeClass("plantaElegida");
  });
  nombreBuscado = $("#"+pisoActual).addClass("plantaElegida");
   
     
  $("#myModal").css("display","block");
  $(window).click(function(event){
    if($(event.target).hasClass("plantas")){ 
      $('#myModal').css('display','none');
    }
  });     
  } // fin function escaleras()
    
  window.onclick = function(event) {
    if ($(event.target).hasClass("modalEscaleras")) {
      $("#myModal").css("display","none");
    }
  } 
  
  //boton fullscreen.
document.getElementById('fullscreen').addEventListener('click', function(e) {
  viewer.toggleFullscreen();
});
    
function openModal() {
    $("#GmyModal").show();
    currentSlide(1);
}

function closeModal() {
  $("#GmyModal").hide();
}

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}
//Muestra el numero de imagenes que hay con la clase gmyslide y va poniendo cada vez que cambiamos con las flechas.
function showSlides(n) {
  var i;
  var slides = $(".GmySlides");
  var descr = $(".GmyDescr");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  slides[slideIndex-1].style.display = "block";
  //$("#textoImagenGaleria").empty();
  // $("#textoImagenGaleria").html(slides[slideIndex-1].getAttribute("textoImagen"));
  
  for (i = 0; i < descr.length; i++) {
      descr[i].style.display = "none";
  }
  descr[slideIndex-1].style.display = "block";
  
  

}
  //Si le das click fuera de la ventana quitarlo.
$( ".overlay" ).on( "click", function() {
  $( ".modal" ).css('visibility',"hidden");
});
  //Si el das click a la X se cierra.
$( ".modal__close" ).on( "click", function() {
  $( ".modal" ).css('visibility',"hidden");
});  


/*
 * Inicia la carga del audio con su correspondiente audio 
 */
function audio_guiada(indice){

  $("#panel_audio_libre").hide();
  $('#audio_libre').attr("src","");
  $('#audio_guiada').attr("src",array_audios[indice]);
  viewer.loadScene(array_escenas[indice]);
  //Deseleccionar el hightlight  
  $(".titulo_slider").each(function(){
    $(this).removeClass("highlight_slider");
  });
  //Añadir borde al carrusel
  $('.slider-nav').slick('slickGoTo',indice,true);    
  var prueba =$('.titulo_slider').get(indice);
  $(prueba).addClass("highlight_slider");
  //Cargar titulo, mostrar panel y iniciar audio.
  $(".titulo_guiada").text(array_titulo[indice]);
  $('#panel_audio_guiada').show();
  $("#audio_guiada")[0].play();
} // fin function audio_guiada()
  
/*
 * Metodo que sirve de toggle/accionador del audio de la visita guiada, si está el audio pausado pasa a reproducirlo y viceversa
 */
function estado_audio(){
  var audio_boton = document.getElementById("audio_guiada");
  if(audio_boton.paused){
    $("#audio_guiada")[0].play();
    //Aqui cambiar imagen a pause
  } else {
    $("#audio_guiada")[0].pause();
    //Aqui cambiar imagen a play
  }
} // fin function estado_audio()
  
/*
 * Inicia la carga de los elementos necesarios para la visita guiada
 */
function iniciar_visita_guiada(){
  var peticion = $.ajax({
  type: "get",
  url: "<?php echo site_url('guiada/getGuiada');?>",
  dataType: "json",
});

peticion.done(function(datos){
  var largo = datos.length;

  for(var i=0;i<largo;i++){

    var enlace_audio_correcto = "<?php echo base_url();?>"+datos[i].audio_escena;
    array_escenas.push(datos[i].cod_escena);
    array_titulo.push(datos[i].titulo_escena);
    array_audios.push(enlace_audio_correcto);
    array_previews.push(datos[i].img_preview);
    var urlPreview ="<?php echo base_url("assets/imagenes/previews-guiada/") ?>"+array_previews[i];
    var crearSliderPreview = "<div class='titulo_slider'><img src='"+urlPreview+"' style='height:130px; width:130px;'></div>";
    $(".slider-nav").append(crearSliderPreview);
}

$('.slider-nav').slick({
  centerMode: false,
  infinite: false,
  slidesToShow: 6,
  slidesToScroll: 6,
  touchMove:false,
  vertical:false
});


//Al hacer click cargar esa escena.
$('.titulo_slider').click(function(e) {
  var clickedIndex = $(this).data("slick-index");
  if(clickedIndex==array_escenas.length){
    indice_escenas=0;
    audio_guiada(indice_escenas);  
  } else {
    indice_escenas=clickedIndex
    audio_guiada(clickedIndex);  
  }  

// Manually refresh positioning of slick
//$('.slider-nav').slick('setPosition',clickedIndex);
});
});

$("#nav_menu").hide();
$("#mensaje_guiada").show();
$("#boton_aceptar_guiada").click(function(){
  $("#mensaje_guiada").hide();
  $("#menu_guiada_show").show();
  $(".menu_libre_show").hide();
  $("#boton_mapa").hide();
  audio_guiada(0);
});
} // fin function iniciar_visita_guiada()

/*
 * Inicia los elementos necesarios de la visita libre
 */
function iniciar_visita_libre(){

$("#panel_audio_guiada").hide();
$('#audio_guiada').attr("src","");
$("#nav_menu").hide();
$("#menu_guiada_show").hide();
$(".menu_libre_show").show();
$("#boton_mapa").show();
//versiones();

} // fin function iniciar_visita_libre()

/*
 * Metodo anterior para la visita guiada. Carga la anterior escena respecto a la escena en la que estes situado.
 */
function anterior(){
  indice_escenas--;
  if(indice_escenas<0){
    indice_escenas= 0;
  } else {
    audio_guiada(indice_escenas);  
  } 
} // fin function anterior()

/*
 * Metodo siguiente para la visita guiada. Carga la siguiente escena respecto a la escena en la que estes situado.
 */
function siguiente(){
  indice_escenas++;
  if(indice_escenas==array_escenas.length){
    indice_escenas=0;
    audio_guiada(indice_escenas);  
  } else {  
    audio_guiada(indice_escenas);  
  } 
} // fin function siguiente();





$("#botonDoc").click(function (e) { 
    $("#documentoPanel").show();
});

$(".cerrarVideo").click(function (e) {
    $(this).parent().parent().hide("fast")
    $(this).parent().next().children("iframe").attr("src","")
});

$(".cerrarDocumento").click(function (e) {
    $(this).parent().hide()
});


$(".version-icono").click(function (e) {
    if($(".version-lista").css("display")=="none"){
        $(".version-lista").show();
    }else {
        $(".version-lista").hide();
    }
    
});


function versiones(){

    var cod_escena = viewer.getScene();
    $(".version-lista").hide();

    var peticion = $.ajax({
        url: "<?php echo site_url("Escenas/cargar_versiones_escena"); ?>",
        type:"post",
        data:{codigo_escena : cod_escena},
    });
    
    peticion.done(function(datos){
        var resultado = JSON.parse(datos);
        $(".version-lista").empty();
        if (resultado.length != 0){
            
            for(var i = 0; i<resultado.length; i++){
                var cadena_cargar = "'"+resultado[i].cod_escena_version+"'";
                $(".version-lista").append("<li onclick=viewer.loadScene("+cadena_cargar+")>"+resultado[i].titulo_version+"</li>");
            }

            $(".version-icono").show();

            
        } else {
            $(".version-icono").hide();
        }
    
    
    });
}
    
</script>      
<script src="<?php echo base_url("assets/js/tilt.js");?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/js/slick/slick/slick.min.js");?>"></script>

<script>
var baseurl = '<?php echo base_url("");?>';
//alert(baseurl);
</script>

<script src="<?php echo base_url("assets/js/metodosHotspots.js");?>"></script>




<script>
// SCRIPT PRINCIPAL DE LA VISTA. Se ejecutará lo primero al entrar.
// Según el valor de $tipo_visita, llamará a la funcion de visita libre o a la de visita guiada.
$(document).ready(function(){
<?php
    if ($tipo_visita == "libre") {
        echo '$("#opcionlibre_portada").click()';
    }
    else if ($tipo_visita == "guiada") {
        echo '$("#opcionguiada_portada").click()';
    }
    else {
        echo site_url();    // Si no es libre ni guiada, volvemos la homepage
    }
?>
    });
</script>

