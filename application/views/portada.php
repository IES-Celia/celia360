    <div id="portadaca" style='z-index:100'; >
     <div id="cambio_portada">
         <img id="libre_portada" src="<?php echo base_url("assets/imagenes/portada/portadalibremini2.png");?>">
         <img id="destacado_portada" src="<?php echo base_url("assets/imagenes/portada/portadadestacadamini.png"); ?>">
         <img id="guiada_portada" src="<?php echo base_url("assets/imagenes/portada/portadaguiadamini.png"); ?>">
     </div>
        
        <header id="header_portada">
            <div class="contenedor_portada">
            <nav id="nav_portada">
             <ul>
                 <li><img src="<?php echo base_url("assets/imagenes/portada/logo.png"); ?>"/> </li>
                  <li><a id="opcionlibre_portada" onclick='visita_libre("get_json_libre");'>Modo Libre</a></li>
                 <li><a id="opcionguiada_portada" onclick='visita_libre("get_json_guiada");'>Visita Guiada</a></li>
                 <li><a  id="opciondestacada_portada">Puntos D</a></li>
				 <li><a>Biblioteca</a></li>
                 <li><a href="" >Glosario</a></li>
                 <li><a href="" >Creditos</a></li>
             </ul>
            </nav>
            </div>
        </header>
        <main>
             <div id="slider1_portada">
                 <div class="contenedor_portada">
                     <h1>Celia Tour</h1>
                     <div id="separador_portada"> </div>
                     <div id="lazo_portada"></div>
                    <h2 aling="center">Historia</h2>
                 </div> 
             </div> 
        </main>
      <script>
        
         
   
    
    
        
      </script>
        <footer>
            <div id="elamo_portada">Celia Tour 360</div>
        </footer>
        
        <script src="<?php echo base_url("assets/js/jquery.js"); ?>"></script>
        <script src="<?php echo base_url("assets/js/efectos_portada.js"); ?>"></script>
     
        
</div>


	<div class="contenedor">
		<div id="panorama">
          
          <!-- CONTROLES VISITA GUIADA -->
          <div id="mensaje_guiada">
          <h3 style="text-align: center;">Bienvenido a la Visita guiada</h3>
          <div id="boton_mensaje">&times;</div></div>
          <div id="menu_guiada_show">
          <div class="titulo_guiada"></div>
             
            <div class="main">
              <div class="slider-nav">
                <div class='titulo_slider'><img src=" <?php echo base_url("assets/imagenes/previews/p0p1f1.JPG");?>" style='height:  130px; width:130px;' alt="foto0" title="PATIO"></div>
                <div class='titulo_slider'><img src=" <?php echo base_url("assets/imagenes/previews/p4p3.JPG");?>" style='height:  130px; width:130px;' alt="foto1" title="SALON"></div>
                <div class='titulo_slider'><img src="<?php echo base_url("assets/imagenes/previews/p4p2.JPG");?>" style='height:  130px; width:130px;' alt="foto2" title="COCINA"></div>
                <div class='titulo_slider'><img src="<?php echo base_url("assets/imagenes/previews/p0p5f2.JPG");?>" style='height:  130px; width:130px;' alt="foto3" title="GARAJE"></div>
                <div class='titulo_slider'><img src="<?php echo base_url("assets/imagenes/previews/p1p5.JPG");?>" style='height:  130px; width:130px;' alt="foto4" title="DORMITORIO"></div>
                <div class='titulo_slider'><img src="<?php echo base_url("assets/imagenes/previews/p1p32f1.JPG");?>" style='height:  130px; width:130px;' alt="foto5" title="DORMITORIO2"></div>
                <div class='titulo_slider'><img src="<?php echo base_url("assets/imagenes/previews/p1p3.JPG");?>" style='height:  130px; width:130px;' alt="foto6" title="TEJADO"></div>
                <div class='titulo_slider'><img src="<?php echo base_url("assets/imagenes/previews/p2p2f1.JPG");?>" style='height:  130px; width:130px;' alt="foto7" title="BAÑO"></div>
                <div class='titulo_slider'><img src="<?php echo base_url("assets/imagenes/previews/p0p2.JPG");?>" style='height:  130px; width:130px;' alt="foto8" title="COMEDOR"></div>
                <div class='titulo_slider'><img src="<?php echo base_url("assets/imagenes/previews/p3p7.JPG");?>" style='height:  130px; width:130px;' alt="foto9" title="PATIO TRASERO"></div>
              </div>
            </div>
       
          
          <div class="menu_vguiada">
          <ul>
            <li>
              <div class='icono_left' onclick="anterior();"></div>
            </li>
            <li>
              <div  class='icono_pp' onclick="estado_audio();"></div>
            </li>
            <li>
              <div  class='icono_menu menu_slider'></div>
            </li>
            <li>
              <div  class='icono_right' onclick="siguiente();"></div>
            </li>
          </ul>
          </div>
        
          
           
            </div>
          
          <!-- Galeria -->
            <div id="GmyModal" class="Gmodal">
              <span class="Gclose cursor" onclick="closeModal()">&times;</span>
              <div class="Gmodal-content">
                <img class="GmySlides" src="<?php echo base_url("assets/imagenes/generales/escudo.JPG");?>" style="width:100%">
                <img class="GmySlides" src="<?php echo base_url("assets/imagenes/generales/escudo1.JPG");?>" style="width:100%">
                <a class="Gprev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="Gnext" onclick="plusSlides(1)">&#10095;</a>
              </div>
          </div>
            
               <!-- Ventana Modal -->
              <div class="modal">
                <div class="overlay"></div>
                <div class="modal__contents">
                 <a class="modal__close" href="#">&times;</a>
                 <h2 id="titulo">Escudo de Armas</h2>
                 <div id="gallery" onclick="openModal();">
                   <img src="<?php echo base_url("assets/imagenes/generales/escudo1.JPG");?>">
                 </div>
                <div id="texto">
                 <p>Gran escudo de armas de grandes dimensiones, finalmente modelado, que constituye el blasón de Alfonso XIII, en esencia, el mismo escudo que para su dinastía organizó su cuarto abuelo el rey Carlos III: los cinco cuarteles pertenecientes a la Nación (Castilla-Castilla, León-León y Granada), uno a su linaje de Borbón-Anjou, y diez a sus demás antepasados. 
En 1931 el fervor republicano le cambia la corona real cerrada por la mural de la Republica que, muda, se presta a acoger alrededor del de Castilla y León, los escudos de las principales casas reinantes de Europa, ancestros de nuestros reyes. Las iras contra el "Sr. Borbón" - que así nombraba la prensa de la época al exilado Alfonso XIII- se dirigen al primero de sus linajes y por eso caen del escusón las tres lises borbónicas, también las mismas florecillas de los cuarteles de las casas de Borgoña (IV), de Parma (V), y Médicis-Toscana (VI), mientras deja intactos los palos de Aragón (I), los palos y Águilas de Aragón-Sicilia (II), la faja de Austria (III), el bandeado de Borgoña viejo (VII), el León rampante de Brabante (VIII) y el de Flandes (IX) y el águila del Tirol (X); así como las de Castilla y León y Granada. Es todo un enigma la relación que entre el Toisón de Oro y las lises que vio el cincelador para borrarlo.</p>
                </div>
              </div>
            </div>
            <!-- Boton audio arriba con toggle.
            <div id="botonAudio1"></div>
            <div id="botonAudio">
            <div id="panelAudio">
              <audio id="musica" src="pinkfloyd.mp3"  controls> </audio>
            </div>
            </div>-->
          <!-- Audio para punto sensibles, no confundir con el boton audio!!!!.
            <div class="ventanaAudio">-->
            <div id="panelAudioPrueba">
              <div id="botonPause">&times;</div>
              <audio style="display:none;" id="musica1" src=""  controls> </audio>
              <audio id="audio_guiada" src=""  controls></audio>
              <div id="icono_audio"></div>
            </div>
          <div class="boton_menu"></div>
          
          <div class="overlay_menu" id="nav_menu">
          <div class="cerrar" onclick="$('#nav_menu').hide();">&times;</div>
          <div class="contenido_menu">
            
            <div class="fila1">
            
            <div data-tilt data-tilt-transition="true" data-tilt-scale="1.2" class="js_tilt">
             <div class="container_imagen" id="boton_libre">
             <img src="<?php echo base_url("assets/imagenes/generales/vistalibre1.JPG");?>" class="imagen">
              <div class="overlay_imagen">
               <p class="texto">
               Visita Libre</p></div></div>
               </div>
            
          
             <div data-tilt data-tilt-transition="true" data-tilt-scale="1.2" class="js_tilt">
               <div class="container_imagen" id="boton_guiada">
             <img src="<?php echo base_url("assets/imagenes/generales/visitaguiada.JPG");?>" class="imagen">
              <div class="overlay_imagen">
               <p class="texto">
               Visita Guiada</p></div></div>
              </div>
            
            
            <div data-tilt data-tilt-transition="true" data-tilt-scale="1.2" class="js_tilt">
               <div class="container_imagen">
             <img src="<?php echo base_url("assets/imagenes/generales/puntosd.JPG");?>" class="imagen">
              <div class="overlay_imagen">
               <p class="texto">
               Puntos D</p></div></div>
              </div>
            
            </div>
            
            <div class="fila2">
            
            <div data-tilt data-tilt-transition="true" data-tilt-scale="1.2" class="js_tilt">
               <div class="container_imagen">
             <img src="<?php echo base_url("assets/imagenes/generales/biblioteca.jpg");?>" class="imagen">
              <div class="overlay_imagen">
               <p class="texto">
               Biblioteca</p></div></div>
              </div>
            
 
            
            <div data-tilt data-tilt-transition="true" data-tilt-scale="1.2" class="js_tilt">
               <div class="container_imagen">
             <img src="<?php echo base_url("assets/imagenes/generales/glosario1.jpg");?>" class="imagen">
              <div class="overlay_imagen">
               <p class="texto">
               Glosario</p></div></div>
              </div>
            
            <div data-tilt data-tilt-transition="true" data-tilt-scale="1.2" class="js_tilt">
                <a href='index.html'><div class="container_imagen">
            <img src="<?php echo base_url("assets/imagenes/generales/portada.png");?>" class="imagen">
              <div class="overlay_imagen">
               <p class="texto">
               Portada</p></div></div></a>
              </div>
            
            </div>
             
          </div>
          </div>
              <!--https://codepen.io/JacobStone/pen/GfLEn https://gijsroge.github.io/tilt.js/
            <div id="contenedorAudio">
              <audio id="musica1" src="" autoplay controls> </audio>
            </div>
          </div>-->
          
         <div id="myModal" class="modalEscaleras">
               <button class="plantas" id="p4" onclick="viewer.loadScene('p4p0')"> Tejado</button>
              <button class="plantas" id="p3" onclick="viewer.loadScene('p3p1'); piso_escalera(3); puntos('p3punto1')"> Segunda planta</button>
              <button class="plantas" id="p2" onclick="viewer.loadScene('p2p1'); piso_escalera(2); puntos('p2punto1')"> Primera planta</button>
              <button class="plantas" id="p1" onclick="viewer.loadScene('p1p1'); piso_escalera(1); puntos('p1punto1')"> Planta Baja</button>
              <button class="plantas" id="p0" onclick="viewer.loadScene('p0p0'); piso_escalera(0); puntos('pspunto1')"> Planta Inferior</button>
          </div>
          
          
         <div class="ctrl" id="fullscreen"></div>
         <div id="mapa" style="width: 614px; height: 350px; top: 280px;" class="cerrado">
    <?php
      $indice = 0;

       $pisos = array('0' => "sotano", '1' => "primer_piso", "2" => "segundo_piso", "3" => "tercer_piso", "4" => "tejado" );

      foreach ($mapa as $imagen) {
        if($pisos[$indice]=="primer_piso"){
          echo "<div id='".$pisos[$indice]."' class='piso_abierto pisos' style='background-image: url(".base_url($imagen['url_img']).");'>";
        }else{
          echo "<div id='".$pisos[$indice]."' class='piso_cerrado pisos' style='background-image: url(".base_url($imagen['url_img']).");'>"; 
        }
        
          foreach ($puntos as $punto) {
            if($punto['piso']==$indice){
              if ($punto['nombre']=='p1punto15') {
              echo "<div id='".$punto['nombre']."' class='punto_seleccionado' style='left: ".$punto['left']."%; top: ".$punto['top']."%;' onclick='puntosMapa(\"".$punto['nombre']."\"); viewer.loadScene(\"".$punto['id_escena']."\")'></div>";
              }else{
                echo "<div id='".$punto['nombre']."' class='puntos' style='left: ".$punto['left']."%; top: ".$punto['top']."%;' onclick='puntosMapa(\"".$punto['nombre']."\"); viewer.loadScene(\"".$punto['id_escena']."\")'></div>";
              }
              
            }
            
          }
        echo "</div>";
        $indice++;
      }
      
    ?>

  </div>
  <div id="boton_mapa" style="transition: left 0.5s ease 0s;left:0.5%;" class="cerrado_boton boton" onclick="mover(document.getElementById('mapa')); mover(document.getElementById('boton_mapa'));mover(document.getElementById('subir_piso')); mover(document.getElementById('bajar_piso'));"></div>

        <div id="subir_piso" style="transition: left 0.5s ease 0s;left:0.5%; visibility:hidden;" class="cerrado_boton boton" onclick="cambiar_piso(10)"></div>

        <div id="bajar_piso" style="transition: left 0.5s ease 0s;left:0.5%; visibility:hidden;" class="cerrado_boton boton" onclick="cambiar_piso(-10); this.style"></div>
        </div>

	</div>
	
<script type="text/javascript" src="<?php echo base_url("assets/js/slick/slick/slick.min.js");?>"></script>
	
<script type="text/javascript">
  
    $( document ).ready(function() {
      

$( ".menu_slider" ).click(function() {
  
  if($(".main").css("display")=="none"){
    
     $(".main")
    .fadeIn()
    .css("display","block");
   
     var currentSlide = $('.slider-nav').slick('slickCurrentSlide');
     $('.slider-nav').slick('setPosition',currentSlide);
    
  }else if($(".main").css("display")=="block"){
          
     $(".main").css("display","none")
     var currentSlide = $('.slider-nav').slick('slickCurrentSlide');
     $('.slider-nav').slick('setPosition',currentSlide);
    
    }
 
});
      
  /*    // setPosition
      $('.slider-nav').on('setPosition', function(event, slick){
        console.log(event);
      });*/
      //Al hacer click cargar esa escena.
      $('.titulo_slider').click(function(e) {
        if($(this).hasClass("titulo_planta")){
          
        } else {
          var clickedIndex = $(this).data("slick-index");
            if(clickedIndex==array_escenas.length){
              indice_escenas=0;
              audio_guiada(indice_escenas);  
            } else {
              indice_escenas=clickedIndex
              audio_guiada(clickedIndex);  
            }  
        }  
        // Manually refresh positioning of slick
        //$('.slider-nav').slick('setPosition',clickedIndex);
      });
   

 $('.slider-nav').slick({
   centerMode: false,
   infinite: false,
   slidesToShow: 6,
   slidesToScroll: 6,
   touchMove:false,
   //focusOnSelect: true,
 });
      

    
      

	
  
      
    });  
  
    //
    // INICIO DE CARGA DE JSON PANNELLUM
    //
  
      json_contenido='';
      function visita_libre(nombre){
        
        $.ajax({
                url: "<?php echo site_url("conversorbd2json/"); ?>"+nombre,
                dataType: 'json',
                success: function(data){
                  console.log(json_contenido);
                    $.each(data.scenes, function(i){
                        var escenas= data.scenes[i];
                        var enlace= data.scenes[i].panorama;
                        var prueba=enlace.split("/");
                        var cadena = prueba[3].split(".");
                     
                        
                        var nombreEscena = cadena[0];
                        data.scenes[i].panorama = "<?php echo base_url("assets/imagenes/escenas/");?>";
                        data.scenes[i].panorama = data.scenes[i].panorama+nombreEscena+".JPG";
            
                        $.each(escenas.hotSpots, function(j){
                            escenas.hotSpots[j].clickHandlerFunc= eval(escenas.hotSpots[j].clickHandlerFunc);
                            
                        })
                    })
                    
                 console.log(data);
                 viewer = pannellum.viewer('panorama', data );

                },
               error: function(){
                 console.log("ERROR444");
               }
            });
        }
    
    // 
    // FIN DE CARGA DE JSON PANNELLUM
    //




   /////////////////////PRUEBAS AJAX////////////////////////////////
  function baseDatos(hotspotDiv,args){
    //Al clikear el ojo del salon de actos.
     $(".modal").css("visibility","visible");
         /*$.ajax({
              type: 'POST',
              url: 'baseDatos.php',
              data: {idnombre:args},
              beforeSend: function() {
                $('#titulo').html("Cargando...");
                $('#imagen').attr("src","");
                $('#imagen2').attr("src","");
                $('#imagen3').attr("src","");
                 $('#wrapper').html("Cargando...");
              },
              success: function(resultado) {
                var json = JSON.parse(resultado);
                $('#titulo').html(json[0]);
                $('#imagen').attr("src",json[1]);
                $('#imagen2').attr("src",json[2]);
                $('#imagen3').attr("src",json[3]);
                $('#wrapper').html(json[4]);
          },
           error: function(xhr, status) {
            // check if xhr.status is defined in $.ajax.statusCode
            // if true, return false to stop this function
            if(typeof this.statusCode[xhr.status] != 'undefined'){
            	 return false;
            }
            // else continue
            console.log('ajax.error');
          },
            statusCode: {
                    200: function(response) {
                        console.log('ajax.statusCode: 200');
                    },
                    404: function(response) {
                        console.log('ajax.statusCode: 404');
                    },
                    500: function(response) {
                        console.log('ajax.statusCode: 500');
                    }
                }           
          });
            $('.modal').css('display','block');
            $(window).click(function(event){
              if($(event.target).hasClass("modal")){ 
                $('.modal').css('display','none');
              }
            })
            $('#close').click(function(event){
            $('.modal').css('display','none');
            })*/
            
  }
  
  
  
  /////////////////////PANEL y GALERIA dentro del PANEL//////////////////////////////
  ///////////////////////////////////////////////////
  
  //Abrir la galeria y poner la primera imagen.
  function openModal() {
  $("#GmyModal").show();
  currentSlide(1);
}
//Cerrar galeria
function closeModal() {
  $("#GmyModal").hide();
}
//Pone el indice
var slideIndex = 1;
showSlides(slideIndex);
//Suma mas uno al indice
function plusSlides(n) {
  showSlides(slideIndex += n);
}
//Pone el indice actual.
function currentSlide(n) {
  showSlides(slideIndex = n);
}
//Muestra el numero de imagenes que hay con la clase gmyslide y va poniendo cada vez que cambiamos con las flechas.
function showSlides(n) {
  var i;
  var slides = $(".GmySlides");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  slides[slideIndex-1].style.display = "block";
}
  //Si le das click fuera de la ventana quitarlo.
$( ".overlay" ).on( "click", function() {
  $( ".modal" ).css('visibility',"hidden");
});
  //Si el das click a la X se cierra.
$( ".modal__close" ).on( "click", function() {
  $( ".modal" ).css('visibility',"hidden");
});  
  

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
      
  }
    
    window.onclick = function(event) {
      if ($(event.target).hasClass("modalEscaleras")) {
          $("#myModal").css("display","none");
      }
    } 
  
  //boton fullscreen.
  document.getElementById('fullscreen').addEventListener('click', function(e) {
    viewer.toggleFullscreen();
});
    
    
    //Toggle Audio boton.
    $("#botonAudio1").toggle(function()
    {$("#botonAudio").show();},
    function()
    {$("#botonAudio").hide();
    });
   
  
  /////////////PRUEBA AUDIO//////////////////
  //////////////////PARA PUNTOS SENSIBLES.////////////////////////////
  
   function musica(hotspotDiv,args){
       $('#musica1').attr("src",args);
       var pantalleo = $("#panelAudioPrueba").css("display");
      if(pantalleo == "block"){
        $('#panelAudioPrueba').hide();
      }else {
        $('#panelAudioPrueba').show();
        
      }
        
       /*$('.ventanaAudio').css('display','block');
            $(window).click(function(event){
              if($(event.target).hasClass("ventanaAudio")){ 
                $('.ventanaAudio').css('display','none');
                $('#musica1').trigger("pause");
                $('#musica').prop("pause");
              }
            })*/
  }
  
 /* $("#panelAudioPrueba #botonPause").click(function(){
    $('#musica1').trigger("pause");
    $('#panelAudioPrueba').hide();
  });*/
  
 
  $("#panelAudioPrueba #botonPause").click(function(){
      if($("#audio_guiada").css("display") == "block"){
        $("#botonPause").hide();
        $("#audio_guiada").hide();
        $("#icono_audio").show();
      }                  
  });
  
    $("#panelAudioPrueba #icono_audio").click(function(){
        $("#botonPause").show();
        $("#audio_guiada").show();
        $("#icono_audio").hide();
                        
  });
  
       
  
  /*
    $(".boton_menu").toggle(function()
    {$("#nav_menu").show();},
    function()
    {$("#nav_menu").hide();
    });
  */
  //boton menu toggle hidden y visible
  $(".boton_menu").click(function(){
    if($("#nav_menu").is(":hidden")){
      $("#nav_menu").fadeIn("fast");
    } else {
       $("#nav_menu").fadeOut("fast");
    }
  });

  ////////////////////////////////////////////////
  //VISITA GUIADA MENU
  //Al terminar el audio de la escena saldra un mensaje de cuenta atras para el salto a la siguiente
  //Pausa > el audio, 
  //debe tener un boton que dice en que sitio te encuentras.
  //Automatizar todo.
  
  
  array_escenas = ["p0p1f1","p4p3","p4p2","p0p5f2","p1p5","p1p32f1","p1p3","p2p2f1","p0p2","p3p7"];
  array_audios = ["audio1.mp3","audio2.mp3","audio3.mp3","audio4.mp3","audio5.mp3","audio6.mp3","audio7.mp3","audio8.mp3","audio9.mp3","audio10.mp3"];
  array_titulo = ["Titulo 1","Titulo 2","Titulo 3","Titulo 4","Titulo 5","Titulo 6","Titulo 7","Titulo 8","Titulo 9","Titulo 10"];
  indice_escenas = 0;
 
  function audio_guiada(indice){
      $('#audio_guiada').attr("src",array_audios[indice]);
      viewer.loadScene(array_escenas[indice]);
    
      $(".titulo_slider").each(function(){
        $(this).removeClass("highlight_slider");
      });
    
      $('.slider-nav').slick('slickGoTo',indice,true);
      //var currentSlide = $('.slider-nav').slick('slickCurrentSlide');
      //alert(currentSlide);
      
      //$('.slider-nav').slick('setPosition',indice);
    
      var prueba =$('.titulo_slider').get(indice);
      $(prueba).addClass("highlight_slider");
        //.addClass("highlight_slider");
      //$(".slick-current").addClass("highlight_slider");
    
      // var pantalleo = $("#panelAudioPrueba").css("display");
      //if(pantalleo == "block")
      $(".titulo_guiada").text(array_titulo[indice]);
      $('#panelAudioPrueba').show();
      $("#audio_guiada")[0].play();
  }
  
   function estado_audio(){
    var audio_boton = document.getElementById("audio_guiada");
    if(audio_boton.paused){
        $("#audio_guiada")[0].play();
      //Aqui cambiar imagen a pause
    } else {
        $("#audio_guiada")[0].pause();
       //Aqui cambiar imagen a play
    }         
  }
  
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
  
    //boton para iniciar visitaguiada/quitar visitaguiada   
    $("#boton_guiada").click(function(){
    if($("#menu_guiada_show").is(":hidden")){
      //viewer.loadScene(array_escenas[indice_escenas]);
        $("#nav_menu").hide();
        $("#mensaje_guiada").show();
        $("#boton_mensaje").click(function(){
        $("#mensaje_guiada").hide();
        $("#menu_guiada_show").show();
        $(".menu_libre_show").hide();
        audio_guiada(indice_escenas);
      });
     
    } else {
       $("#menu_guiada_show").hide();
       viewer.loadScene("p1p2f3");
       $(".menu_libre_show").show();
       $("#nav_menu").hide();
    }
    });
    
   
    
  
  /*$("#boton_libre").click(function(){
    
    if($(".menu_libre_show").is(":hidden")){
      viewer.loadScene("p1p2f3");
      $(".menu_libre_show").show();
      $("#nav_menu").hide();
    } else {
       $("#menu_libre_show").hide();
       viewer.loadScene("p1p2f3");
      $("#nav_menu").hide();
    }
    });*/
    
  
  
  
  function anterior(){
    indice_escenas--;
    if(indice_escenas<0){
      indice_escenas= 0;
    } else {
      audio_guiada(indice_escenas);  
    } 
    }
  
   function siguiente(){
     indice_escenas++;
    if(indice_escenas==array_escenas.length){
      indice_escenas=0;
      audio_guiada(indice_escenas);  
    } else {
      audio_guiada(indice_escenas);  
    } 
    }
  
  
  
  ///////////FIN VISITA GUIADA  
    
</script>
      
     <script src="https://unpkg.com/tilt.js@1.2.1/dest/tilt.jquery.min.js"></script>
     <script type="text/javascript" src="<?php echo base_url("assets/js/slick/slick/slick.min.js");?>"></script>
  
