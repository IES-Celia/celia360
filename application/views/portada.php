  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=MedievalSharp" rel="stylesheet">
  <script>
    
    $(document).ready(function(){
      $('#open').click(function(){
        $('.modalita').toggle('slow');
      });
      
      $('.pie-ventana').click(function(){
        $('.modalita').css({display:"none"});
      });

      $('.efectBook').click(function(){
        $('.modalita2').toggle('slow');
          idlibro = $(this).attr("idlibro");
          apaisado = $(this).attr("apaisado");
          $('.modalita2').load('biblioteca/verLibroAjax/'+idlibro+'/'+apaisado);
      });

      $('#cerrarmodal').click(function(){
        $('.modalita2').css({display:"none"});
        $('.modalita').css({display:"block"});
      });

      $(document).keyup(function(e) {
          if (e.keyCode == 27) { // escape key maps to keycode `27`
            $('.modalita2').css({display:"none"});
          }
      });

    });



  </script>
<style>
  
tr.torre img {
    margin-top: 26px ;
} 

</style>

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
                  <li><a id="opcionlibre_portada" onclick='visita_opcion("get_json_libre");'>Modo Libre</a></li>
                 <li><a id="opcionguiada_portada" onclick='visita_opcion("get_json_guiada");'>Visita Guiada</a></li>
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
                    <button id="open" class="btn">HISTORIA</button>
                 </div> 
             </div> 

        </main>
      
      



<!-- VENTANA MODAL PARA SACAR LIBROS HISTORIA -->

    <div class="modalita" >
      <div class="contenido" style="background:url('assets/css/textura.jpg');width:600px;margin:0 auto;margin-top:40px;border-radius:15px;">
        <div class="cabecera-ventana" style="background:url('assets/css/textura.jpg');height:60px;border-radius:15px;">
          <h1 style="font-family: 'MedievalSharp', cursive; text-align:center;border-bottom:1px solid grey;color:black;font-size:55px;padding:10px;">Biblioteca</h1>
        </div>
        <div class="pared" >
        <div class="cuerpo-ventana fondo" style="margin-top:19px;height:450px; ">
            <?php

                    
                    echo "<div class='estanteria' >"; 
                      echo "<div class='nuevecica'  >"   ;    
                        echo "<table >";  
                        echo "<tr>";

                        $i = 0;
                        foreach ($libros as $ides){
                          $i++;
                          //Sacamos las portadas de los libros
                          
                            echo "<td class='columna'>";
                            echo "<a href='#' ><img id='verlibro' idlibro='".$ides['id_libro']."' apaisado='".$ides['apaisado']."' class='efectBook ocultar' src='".base_url("assets/imgs/books/$ides[id_libro]/0.jpg")."' ></a>";
                            echo "</td>";
                              if ($i%4 == 0)  echo "</tr><tr class='torre'>";
                                }
                                echo "</tr></table>";
                      echo "</div>";
                    echo "</div>";
        ?>
        </div>
        </div>
        <div class="pie-ventana" style="border-top:1px solid grey;border-radius:5px; height:50px;padding:18px;">
          <a href="#" class="btn-2" style="float:right;">Cerrar</a>
        </div>
    </div>
  </div>

  <!-- VENTANA MODAL PARA SACAR LIBRO -->
      <div class="modalita2" style="display: none;" >
      <div class="contenido2" style="width:1000px;background-color:white;margin:0 auto;margin-top:40px;">
        <div class="cabecera-ventana" style="background-color:white;height:60px;">
          <h1 style="text-align:center;border-bottom:1px solid black;">Titulo Libro</h1>
        </div>
        <div class="cuerpo-ventana" id="cuerpo-ventana" style="margin-top:-100px;margin-bottom:100px; padding: 3%;margin-top: 80px;">
         
        </div>
        <div class="pie-ventana23" style="border-top:1px solid black;border-radius:5px; height:50px;padding:18px;">
          <a href="#" id="cerrarmodal" class="btn-2" style="float:right;">Cerrar</a>

        </div>
    </div>
  </div>


  <!--FINALIZA BIBLIOTECA -->
  
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
          <h3 style="text-align: center;">Visita guiada</h3>
          <div class='mensaje_guiada_inicio_recomendacion'>
            <hr class="mensaje_separador"></hr>  
            <p>Consejos antes de empezar 👵🏻</p>
            
            <ol>
              <li>Revise y/o ponga en funcionamiento su sistema de audio.</li>
              <li>Cuando termine la descripción de una estancia, pasaremos automaticamente a la siguiente.</li>
              <li>En cualquier momento es posible trasladarse a la estancia deseada, mediante los botones de siguiente, anterior o por la utilidad del icono faro que nos permitirá elegir la estancia.</li>
              <li>Si desea permanecer en una estancia concreta indefinidamente, detenga el audio.</li>
            </ol>
            <hr class="mensaje_separador"></hr>
          </div>
          <h4 style='text-align: center; color:white;'>Para iniciar la visita, pulse el boton.</h4>
          <div id="boton_aceptar_guiada"></div>
        </div>
          <div id="menu_guiada_show">
          <div class="titulo_guiada"></div>
             
            <div class="main">
              <div class="slider-nav">
                <div class='titulo_slider'><img src=" <?php echo base_url("assets/imagenes/previews/foto1.JPG");?>" style='height:  130px; width:130px;' alt="foto0" title="Fachada principal"></div>
                <div class='titulo_slider'><img src=" <?php echo base_url("assets/imagenes/previews/foto2.JPG");?>" style='height:  130px; width:130px;' alt="foto1" title="Pórtico"></div>
                <div class='titulo_slider'><img src="<?php echo base_url("assets/imagenes/previews/foto3.JPG");?>" style='height:  130px; width:130px;' alt="foto2" title="Escalera de entrada"></div>
                <div class='titulo_slider'><img src="<?php echo base_url("assets/imagenes/previews/foto4.JPG");?>" style='height:  130px; width:130px;' alt="foto3" title="Conserjería"></div>
                <div class='titulo_slider'><img src="<?php echo base_url("assets/imagenes/previews/foto5.JPG");?>" style='height:  130px; width:130px;' alt="foto4" title="Puerta secretaría"></div>
                <div class='titulo_slider'><img src="<?php echo base_url("assets/imagenes/previews/foto6.JPG");?>" style='height:  130px; width:130px;' alt="foto4" title="Antesala"></div>
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
                <a class="Gprev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="Gnext" onclick="plusSlides(1)">&#10095;</a>
              </div>
          </div>
            
               <!-- Ventana Modal -->
              <div class="modal">
                <div class="overlay"></div>
                <div class="modal__contents">
                 <a class="modal__close" href="#">&times;</a>
                 <h2 id="titulo"></h2>
                 <div id="gallery" onclick="openModal();">
                   <img src="">
                 </div>
                 <div class='mas_imagenes'></div>
                <div id="texto">
                
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
          <!-- Audio para punto asdasdgooglsensibles, no confundir con el boton audio!!!!.
            <div class="ventanaAudio">-->
            <div id="panelAudioPrueba">
              <div id="botonPause"></div>
              <audio style="display:none;" id="musica1" src=""  controls> </audio>
              <audio id="audio_guiada" src=""  controls></audio>
              <div id="icono_audio"></div>
            </div>
          <div class="boton_menu"></div>
          
          <div class="overlay_menu" id="nav_menu">
          <div class="cerrar_menu" onclick="$('#nav_menu').hide();">&times;</div>
          <div class="contenido_menu">
            
            <div class="fila1">
            
            <div data-tilt data-tilt-transition="true" data-tilt-scale="1.2" class="js_tilt">
             <div class="container_imagen" id="boton_libre" onclick='visita_opcion("get_json_libre")'>
             <img src="<?php echo base_url("assets/imagenes/generales/vistalibre1.JPG");?>" class="imagen">
              <div class="overlay_imagen">
               <p class="texto">
               Visita Libre</p></div></div>
               </div>
            
          
             <div data-tilt data-tilt-transition="true" data-tilt-scale="1.2" class="js_tilt">
               <div class="container_imagen" id="boton_guiada" onclick='visita_opcion("get_json_guiada")'>
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
              <!--Provisional enlace para volver atras-->
                <a href="<?php echo site_url("index.php");?>"><div class="container_imagen">
            <img src="<?php echo base_url("assets/imagenes/generales/portada.png");?>" class="imagen">
              <div class="overlay_imagen">
               <p class="texto">
               Portada</p></div></div></a>
              </div>
            
            </div>
             
          </div>
          </div>
            
         <div id="myModal" class="modalEscaleras">
               <button class="plantas" id="p4" onclick="viewer.loadScene('p4p0')"> Tejado</button>
              <button class="plantas" id="p3" onclick="viewer.loadScene('p3p1'); piso_escalera(3); puntos('p3punto1')"> Segunda planta</button>
              <button class="plantas" id="p2" onclick="viewer.loadScene('p2p1'); piso_escalera(2); puntos('p2punto1')"> Primera planta</button>
              <button class="plantas" id="p1" onclick="viewer.loadScene('p1p1'); piso_escalera(1); puntos('p1punto1')"> Planta Baja</button>
              <button class="plantas" id="p0" onclick="viewer.loadScene('p0p0'); piso_escalera(0); puntos('pspunto1')"> Planta Inferior</button>
          </div>
          
          
         <div class="ctrl" id="fullscreen"></div>
         <div id="mapa" style="width: 614px; height: 350px;" class="cerrado">
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
              echo "<div id='".$punto['nombre']."' class='punto_seleccionado' style='left: ".$punto['left_mapa']."%; top: ".$punto['top_mapa']."%;' onclick='puntosMapa(\"".$punto['nombre']."\"); viewer.loadScene(\"".$punto['id_escena']."\")'></div>";
              }else{
                echo "<div id='".$punto['nombre']."' class='puntos' style='left: ".$punto['left_mapa']."%; top: ".$punto['top_mapa']."%;' onclick='puntosMapa(\"".$punto['nombre']."\"); viewer.loadScene(\"".$punto['id_escena']."\")'></div>";
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
      function visita_opcion(nombre){
        

        $.ajax({
              url: "<?php echo base_url("conversorbd2json/"); ?>"+nombre,
              type: 'GET',
              dataType: 'json',
            })
            .done(function(data) {
              $.each(data.scenes, function(i){
              var escenas = data.scenes[i];
               $.each(escenas.hotSpots, function(j){
                  escenas.hotSpots[j].clickHandlerFunc = eval(escenas.hotSpots[j].clickHandlerFunc);
                });
              });
              viewer = pannellum.viewer("panorama", data);

              if(nombre=="get_json_guiada"){
                $("#boton_mapa").hide();
                iniciar_visita_guiada();
              } else {
                $("#boton_mapa").show();
                iniciar_visita_libre();
              }
              console.log("success");
            })
            .fail(function() {
              console.log("error");
            })



        
        }
    
    // 
    // FIN DE CARGA DE JSON PANNELLUM
    //




   /////////////////////PRUEBAS AJAX////////////////////////////////
  
  
    function panelInformacion(hotspotDiv,args){
    
     $(".modal").css("visibility","visible");
     var peticion = $.ajax({
        url: "<?php echo base_url("hotspots/load_panel"); ?>",
        type:"post",
        data:{id_hotpost : args},
        beforeSend: function(){
        //Cambiar el valor del texto y titulo
        $("#titulo").html("Cargando...");
        $("#texto").html("Cargando...");
        //Borrar las tiras creadas en el punto anterior
          $(".GmySlides").each(function(){
            $(this).remove();
           
          });
        }
     });
    
    peticion.done(function(datos){
      var prueba = JSON.parse(datos);
      //Cargamos una vez los datos basicos
      $("#titulo").html(prueba[0].titulo_panel);
      $("#texto").html(prueba[0].texto_panel);
      //La primera imagen que sale al abrir el panel
      var enlace_img =  "<?php echo base_url("assets/imagenes/imagenes-hotspots/")?>"+prueba[0].url_imagen;
      $("#gallery").find("img").attr("src",enlace_img);
      //Por cada indice del array creamos la imagen de la galeria
      for(var i=0;i<prueba.length;i++){
        //Para poner bien el enlace con codeigniter guardamos en la variable la url y luego se la pasamos
        var enlace = "<?php echo base_url("assets/imagenes/imagenes-hotspots/")?>"+prueba[i].url_imagen;
        $(".Gmodal-content").append("<img class='GmySlides' src='"+enlace+"' style='width:100%'>");

        
      }
      //Pone el indice
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
  
  array_escenas = ["p1p2f3","p1p2f2","p1p2f1","p1p2","p1p11","p1p10"];
  array_audios = [
    "<?php echo base_url("assets/audio/audiobar.mp3");?>",
    "<?php echo base_url("assets/audio/audioportico.mp3");?>",
    "<?php echo base_url("assets/audio/audioescaleras.mp3");?>",
    "<?php echo base_url("assets/audio/musicadeespera.mp3");?>",
    "<?php echo base_url("assets/audio/musicadeespera.mp3");?>",
    "<?php echo base_url("assets/audio/musicadeespera.mp3");?>",
   ];
  array_titulo = ["Junto al bar","Portico","Escaleras","Conserjeria","puerta Secretaria","Antesala"];
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
  
    function iniciar_visita_guiada(){
      $("#nav_menu").hide();
      $("#mensaje_guiada").show();
      $("#boton_aceptar_guiada").click(function(){
      $("#mensaje_guiada").hide();
      $("#menu_guiada_show").show();
      $(".menu_libre_show").hide();
      $("#boton_mapa").hide();
      //Por ahora cada vez que lo inicias empieza en 0
      audio_guiada(0);
    });
    }
    
    function iniciar_visita_libre(){
      $("#nav_menu").hide();
      //Mensaje de bienvenida para modo libre.
      $("#menu_guiada_show").hide();
      $(".menu_libre_show").show();
      $("#boton_mapa").show();
      $("#panelAudioPrueba").hide();
      $('#audio_guiada').attr("src","");
      //Por ahora cada vez que lo inicias empieza en 0
    }
      
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
      
     <script src="<?php echo base_url("assets/js/tilt.js");?>"></script>
     <script type="text/javascript" src="<?php echo base_url("assets/js/slick/slick/slick.min.js");?>"></script>
  
