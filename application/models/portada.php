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
                <div class='titulo_slider'><img src=" <?php echo base_url("assets/imagenes/previews/p0p1f1.jpg");?>" style='height: : 130px; width:130px;' alt="foto0" title="PATIO"></div>
                <div class='titulo_slider'><img src=" <?php echo base_url("assets/imagenes/previews/p4p3.JPG");?>" style='height: : 130px; width:130px;' alt="foto1" title="SALON"></div>
                <div class='titulo_slider'><img src="<?php echo base_url("assets/imagenes/previews/p4p2.JPG");?>" style='height: : 130px; width:130px;' alt="foto2" title="COCINA"></div>
                <div class='titulo_slider'><img src="<?php echo base_url("assets/imagenes/previews/p0p5f2.JPG");?>" style='height: : 130px; width:130px;' alt="foto3" title="GARAJE"></div>
                <div class='titulo_slider'><img src="<?php echo base_url("assets/imagenes/previews/p1p5.JPG");?>" style='height: : 130px; width:130px;' alt="foto4" title="DORMITORIO"></div>
                <div class='titulo_slider'><img src="<?php echo base_url("assets/imagenes/previews/p1p32f1.JPG");?>" style='height: : 130px; width:130px;' alt="foto5" title="DORMITORIO2"></div>
                <div class='titulo_slider'><img src="<?php echo base_url("assets/imagenes/previews/p1p3.JPG");?>" style='height: : 130px; width:130px;' alt="foto6" title="TEJADO"></div>
                <div class='titulo_slider'><img src="<?php echo base_url("assets/imagenes/previews/p2p2f1.JPG");?>" style='height: : 130px; width:130px;' alt="foto7" title="BAÑO"></div>
                <div class='titulo_slider'><img src="<?php echo base_url("assets/imagenes/previews/p0p2.JPG");?>" style='height: : 130px; width:130px;' alt="foto8" title="COMEDOR"></div>
                <div class='titulo_slider'><img src="<?php echo base_url("assets/imagenes/previews/p3p7.JPG");?>" style='height: : 130px; width:130px;' alt="foto9" title="PATIO TRASERO"></div>
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
               <button class="plantas"id="p4" onclick="viewer.loadScene('p4p0')"> Tejado</button>
              <button class="plantas" id="p3" onclick="viewer.loadScene('p3p1'); piso_escalera(3); puntos('p3punto1')"> Segunda planta</button>
              <button class="plantas" id="p2" onclick="viewer.loadScene('p2p1'); piso_escalera(2); puntos('p2punto1')"> Primera planta</button>
              <button class="plantas" id="p1" onclick="viewer.loadScene('p1p1'); piso_escalera(1); puntos('p1punto1')"> Planta Baja</button>
              <button class="plantas" id="p0" onclick="viewer.loadScene('p0p0'); piso_escalera(0); puntos('pspunto1')"> Planta Inferior</button>
          </div>
          
          
         <div class="ctrl" id="fullscreen"></div>
         <div id="mapa" class="cerrado">

            <!-- sotano -->
            <div id="sotano" class="piso_cerrado pisos">
                <div id="pspunto1" class="puntos" style="left: 59%;top: 62%;" onclick="puntosMapa('pspunto1'); viewer.loadScene('p0p0');"></div>
                <div id="pspunto2" class="puntos" style="left: 50%;top: 67.5%;" onclick="puntosMapa('pspunto2'); viewer.loadScene('p0p1');"></div>
                <div id="pspunto3" class="puntos" style="left: 50%;top: 73.5%;" onclick="puntosMapa('pspunto3'); viewer.loadScene('p0p2');"></div>
                <div id="pspunto4" class="puntos" style="left: 31.5%;top: 73.5%;" onclick="puntosMapa('pspunto4'); viewer.loadScene('p0p3');"></div>
                <div id="pspunto5" class="puntos" style="left: 16.5%;top: 73.5%;" onclick="puntosMapa('pspunto5'); viewer.loadScene('p0p4');"></div>
                <div id="pspunto6" class="puntos" style="left: 7.5%;top: 88%;" onclick="puntosMapa('pspunto6'); viewer.loadScene('p0p4f2');"></div>
                <div id="pspunto7" class="puntos" style="left: 16.5%;top: 48.5%;" onclick="puntosMapa('pspunto7'); viewer.loadScene('p0p5');"></div>
                <div id="pspunto8" class="puntos" style="left: 23.5%;top: 61.5%;" onclick="puntosMapa('pspunto8'); viewer.loadScene('p0p1f2');"></div>
                <div id="pspunto9" class="puntos" style="left: 41.5%;top: 61%;" onclick="puntosMapa('pspunto9'); viewer.loadScene('p0p1f1');"></div>
                <div id="pspunto10" class="puntos" style="left: 0%;top: 50.5%;" onclick="puntosMapa('pspunto10'); viewer.loadScene('p0p5f1');"></div>
                <div id="pspunto11" class="puntos" style="left: 0%;top: 46.5%;" onclick="puntosMapa('pspunto11'); viewer.loadScene('p0p5f2');"></div>
                <div id="pspunto12" class="puntos" style="left: 25%;top: 26%;" onclick="puntosMapa('pspunto12'); viewer.loadScene('p1p9f2');"></div>
            </div>  
            <!-- primer piso -->
            <div id="primer_piso" class="piso_abierto pisos">
                <div id="p1punto1" class="puntos" style="left: 53%;top: 62%;" onclick="puntosMapa('p1punto1'); viewer.loadScene('p1p1');"></div>
                <div id="p1punto2" class="puntos" style="left: 48%;top: 73.5%;" onclick="puntosMapa('p1punto2');  viewer.loadScene('p1p2');"></div>
                <div id="p1punto3" class="puntos" style="left: 34%;top: 73.5%;" onclick="puntosMapa('p1punto3'); viewer.loadScene('p1p3');"></div>
                <div id="p1punto4" class="puntos" style="left: 16.5%;top: 73.5%;" onclick="puntosMapa('p1punto4'); viewer.loadScene('p1p4');"></div>
                <div id="p1punto5" class="puntos" style="left: 16.5%;top: 50.5%;" onclick="puntosMapa('p1punto5');  viewer.loadScene('p1p5');"></div>
                <div id="p1punto6" class="puntos" style="left: 17%;top: 34%;" onclick="puntosMapa('p1punto6');  viewer.loadScene('p1p6');"></div>
                <div id="p1punto7" class="puntos" style="left: 34.5%;top: 43.5%;" onclick="puntosMapa('p1punto7'); viewer.loadScene('p1p7');"></div>
                <div id="p1punto8" class="puntos" style="left: 50%;top: 53.5%;" onclick="puntosMapa('p1punto8');  viewer.loadScene('p1p8');"></div>
                <div id="p1punto9" class="puntos" style="left: 64%;top: 73.5%;" onclick="puntosMapa('p1punto9');  viewer.loadScene('p1p11');"></div>
                <div id="p1punto10" class="puntos" style="left: 75%;top: 71.5%;" onclick="puntosMapa('p1punto10');  viewer.loadScene('p1p10');"></div>
                <div id="p1punto11" class="puntos" style="left: 25.5%;top: 80.5%;" onclick="puntosMapa('p1punto11'); viewer.loadScene('p1p32f1');"></div>
                <div id="p1punto12" class="puntos" style="left: 34.3%;top: 86.5%;" onclick="puntosMapa('p1punto12');  viewer.loadScene('p1p32f2');"></div>
                <div id="p1punto13" class="puntos" style="left: 48.5%;top: 86%;" onclick="puntosMapa('p1punto13');  viewer.loadScene('p1p2f1');"></div>
                <div id="p1punto14" class="puntos" style="left: 48.5%;top: 91%;" onclick="puntosMapa('p1punto14');  viewer.loadScene('p1p2f2');"></div>
                <div id="p1punto15" class="punto_seleccionado" style="left: 48.5%;top: 96%;" onclick="puntos('p1punto15');  viewer.loadScene('p1p2f3');"></div>
               <!-- <div id="p1punto16" class="puntos" style="left: 8%;top: 52%;" onclick="puntos('p1punto16');  viewer.loadScene('p1p5f1');"></div>-->
                <div id="p1punto17" class="puntos" style="left: 18%;top: 26%;" onclick="puntosMapa('p1punto17');  viewer.loadScene('p1p9');"></div>
                <div id="p1punto18" class="puntos" style="left: 25%;top: 30%;" onclick="puntosMapa('p1punto18');  viewer.loadScene('p1p9f1');"></div>
                <div id="p1punto19" class="puntos" style="left: 41%;top: 48%;" onclick="puntosMapa('p1punto19');  viewer.loadScene('p1p72');"></div>
                <div id="p1punto20" class="puntos" style="left: 80%;top: 72%;" onclick="puntosMapa('p1punto20');  viewer.loadScene('p1p12');"></div>
                <div id="p1punto21" class="puntos" style="left: 25.8%;top: 73.5%;" onclick="puntosMapa('p1punto21');  viewer.loadScene('p1p32');"></div>
                <div id="p1punto22" class="puntos" style="left: 42%;top: 73.5%;" onclick="puntosMapa('p1punto22');  viewer.loadScene('p1p22');"></div>
            </div> 
            <!-- segundo piso -->
            <div id="segundo_piso" class="piso_cerrado pisos">
                <div id="p2punto1" class="puntos" style="left: 53%;top: 62%;" onclick="puntosMapa('p2punto1'); viewer.loadScene('p2p1');"></div>
                <div id="p2punto2" class="puntos" style="left: 49%;top: 73.5%;" onclick="puntosMapa('p2punto2'); viewer.loadScene('p2p2');"></div>
                <div id="p2punto3" class="puntos" style="left: 34%;top: 73.5%;" onclick="puntosMapa('p2punto3'); viewer.loadScene('p2p3');"></div>
                <div id="p2punto4" class="puntos" style="left: 16.5%;top: 73.5%;" onclick="puntosMapa('p2punto4');  viewer.loadScene('p2p4');"></div>
                <div id="p2punto5" class="puntos" style="left: 16.5%;top: 53.5%;" onclick="puntosMapa('p2punto5'); viewer.loadScene('p2p5');"></div>
                <div id="p2punto6" class="puntos" style="left: 17%;top: 34%;" onclick="puntosMapa('p2punto6'); viewer.loadScene('p2p6');"></div>
                <div id="p2punto7" class="puntos" style="left: 24%;top: 37.5%;" onclick="puntosMapa('p2punto7');  viewer.loadScene('p2p7');"></div>
                <div id="p2punto8" class="puntos" style="left: 34.5%;top: 43.5%;" onclick="puntosMapa('p2punto8'); viewer.loadScene('p2p72');"></div>
                <div id="p2punto9" class="puntos" style="left: 49.5%;top: 53%;" onclick="puntosMapa('p2punto9');  viewer.loadScene('p2p8');"></div>
                <div id="p2punto10" class="puntos" style="left: 79%;top: 71.5%;" onclick="puntosMapa('p2punto10');  viewer.loadScene('p2p10');"></div>
                <div id="p2punto11" class="puntos" style="left: 49%;top: 86.5%;" onclick="puntosMapa('p2punto11');  viewer.loadScene('p2p2f1');"></div>
                <div id="p2punto12" class="puntos" style="left: 42%;top: 86.5%;" onclick="puntosMapa('p2punto12');  viewer.loadScene('p2p2f3');"></div>
                <div id="p2punto13" class="puntos" style="left: 64%;top: 86.5%;" onclick="puntosMapa('p2punto13');  viewer.loadScene('p2p2f2');"></div>
                

                

            </div>
                <!-- tercer piso -->
            <div id="tercer_piso" class="piso_cerrado pisos">
                <div id="p3punto1" class="puntos" style="left: 50%;top: 62%;" onclick="puntosMapa('p3punto1'); viewer.loadScene('p3p1')"></div>
                <div id="p3punto2" class="puntos" style="left: 50%;top: 73%;" onclick="puntosMapa('p3punto2'); viewer.loadScene('p3p2')"></div>
                <!--<div id="p3punto3" class="puntos" style="left: 55%;top: 83%;" onclick="puntos('p3punto3'); viewer.loadScene('p3p2f1')"></div>-->
                <div id="p3punto4" class="puntos" style="left: 43%;top: 83%;" onclick="puntosMapa('p3punto4'); viewer.loadScene('p3p2f2')"></div>
                <div id="p3punto5" class="puntos" style="left: 35%;top: 73%;" onclick="puntosMapa('p3punto5'); viewer.loadScene('p3p3')"></div>
                <div id="p3punto6" class="puntos" style="left: 17%;top: 73%;" onclick="puntosMapa('p3punto6'); viewer.loadScene('p3p4')"></div>
               <!--<div id="p3punto7" class="puntos" style="left: 17%;top: 83%;" onclick="puntos('p3punto7'); viewer.loadScene('p3p4f1')"></div>-->
                <div id="p3punto8" class="puntos" style="left: 8%;top: 78%;" onclick="puntosMapa('p3punto8'); viewer.loadScene('p3p4f2')"></div>
                <div id="p3punto9" class="puntos" style="left: 8%;top: 69%;" onclick="puntosMapa('p3punto9'); viewer.loadScene('p3p4f3')"></div>
                <div id="p3punto10" class="puntos" style="left: 17%;top: 49%;" onclick="puntosMapa('p3punto10'); viewer.loadScene('p3p5')"></div>
                <div id="p3punto11" class="puntos" style="left: 8%;top: 50%;" onclick="puntosMapa('p3punto11'); viewer.loadScene('p3p5f1')"></div>
                <div id="p3punto12" class="puntos" style="left: 17%;top: 33%;" onclick="puntosMapa('p3punto12'); viewer.loadScene('p3p6')"></div>
                <div id="p3punto13" class="puntos" style="left: 8%;top: 34%;" onclick="puntosMapa('p3punto13'); viewer.loadScene('p3p6f1')"></div>
                <div id="p3punto14" class="puntos" style="left: 32%;top: 42%;" onclick="puntosMapa('p3punto14'); viewer.loadScene('p3p7')"></div>
                <div id="p3punto15" class="puntos" style="left: 50%;top: 53%;" onclick="puntosMapa('p3punto15'); viewer.loadScene('p3p8')"></div>
                <!--<div id="p3punto16" class="puntos" style="left: 19%;top: 18%;" onclick="puntos('p3punto16'); viewer.loadScene('p3p9')"></div>-->
                <div id="p3punto17" class="puntos" style="left: 75%;top: 72%;" onclick="puntosMapa('p3punto17'); viewer.loadScene('p3p10')"></div>
            </div>
             
             <div id="tejado" class="piso_cerrado pisos">
                <div id="ptpunto0" class="puntos" style="left: 58%;top: 62%;" onclick="puntosMapa('ptpunto0'); viewer.loadScene('p4p0')"></div>
                <div id="ptpunto1" class="puntos" style="left: 79%;top: 74%;" onclick="puntosMapa('ptpunto1'); viewer.loadScene('p4p1')"></div>
                <div id="ptpunto2" class="puntos" style="left: 6%;top: 85%;" onclick="puntosMapa('ptpunto2'); viewer.loadScene('p4p2')"></div>
                <div id="ptpunto3" class="puntos" style="left: 6%;top: 15%;" onclick="puntosMapa('ptpunto3'); viewer.loadScene('p4p3')"></div>
                <div id="ptpunto4" class="puntos" style="left: 94%;top: 61%;" onclick="puntosMapa('ptpunto4'); viewer.loadScene('p4p4')"></div>
                <div id="ptpunto5" class="puntos" style="left: 94%;top: 91%;" onclick="puntosMapa('ptpunto5'); viewer.loadScene('p4p5')"></div>
             </div>

         </div>
         <div id="boton_mapa" style="transition: left 0.5s ease 0s;left:0.5%;" class="cerrado_boton boton" onclick="mover(document.getElementById('mapa')); mover(document.getElementById('boton_mapa'));mover(document.getElementById('subir_piso')); mover(document.getElementById('bajar_piso'));">
             
        </div>

        <div id="subir_piso" style="transition: left 0.5s ease 0s;left:0.5%; visibility:hidden;" class="cerrado_boton boton" onclick="cambiar_piso(10)">
            
        </div>

        <div id="bajar_piso" style="transition: left 0.5s ease 0s;left:0.5%; visibility:hidden;" class="cerrado_boton boton" onclick="cambiar_piso(-10); this.style">
            
        </div>
         <script type="text/javascript">
           
        
                mapa_responsivo();
                var piso=1;
                /*evento de resize*/
                var id;
                function variable_piso(x){
                    piso=x;
                }
             
                $(window).resize(function() {
                    clearTimeout(id);
                    alert
                    id = setTimeout(mapa_responsivo, 100);
                });

                /*movimiento del mapa y botones*/
                function mapa_responsivo(){
                    var distancia_top=window.innerHeight*0.57;
                    var anchura=window.innerWidth*0.45;
                    var altura=anchura*0.57;
                    
                    document.getElementById("mapa").style.top=window.innerHeight-altura+"px";
                    document.getElementById("mapa").style.height=altura+"px";
                    document.getElementById("mapa").style.width=anchura+"px"; 
                        distancia_top=window.innerHeight*0.92;
                }
                
                function cambiar_piso(opcion){
                    if (opcion==10) {
                        if (piso==4) {
                            // aqui puedes poner algo y saltará cuando intentas pasar más allá del tejado
                        }else{
                            piso++;
                            switch (piso){
                                case 1:
                                    document.getElementById("sotano").className="piso_cerrado pisos";
                                    document.getElementById("primer_piso").className="piso_abierto pisos";
                                     
                                    break;
                                case 2:
                                    document.getElementById("primer_piso").className="piso_cerrado pisos";
                                    document.getElementById("segundo_piso").className="piso_abierto pisos";
                                    
                                    break;
                                case 3:
                                    document.getElementById("segundo_piso").className="piso_cerrado pisos";
                                    document.getElementById("tercer_piso").className="piso_abierto pisos";
                                    break;
                                case 4:
                                    document.getElementById("tercer_piso").className="piso_cerrado pisos";
                                    document.getElementById("tejado").className="piso_abierto pisos";
                                    break;
                            }
                          }
                    }else if (opcion==-10) {
                        if(piso==0){
                            // aqui puedes poner algo y saltará cuando intentas pasar más allá del sotano
                        }else{
                            piso--;
                            switch (piso){
                                case 3:
                                    document.getElementById("tejado").className="piso_cerrado pisos";
                                    document.getElementById("tercer_piso").className="piso_abierto pisos";
                                    break;
                                case 2:
                                    document.getElementById("tercer_piso").className="piso_cerrado pisos";
                                    document.getElementById("segundo_piso").className="piso_abierto pisos";
                                    
                                    break;
                                case 1:
                                    document.getElementById("segundo_piso").className="piso_cerrado pisos";
                                    document.getElementById("primer_piso").className="piso_abierto pisos";
                                    
                                    break;
                                case 0:
                                    document.getElementById("primer_piso").className="piso_cerrado pisos";
                                    document.getElementById("sotano").className="piso_abierto pisos";
                                    break;
                            }
                        }

                    }else{
                        switch (piso){
                                case 4:
                                
                                case 3:
                                    
                                    break;
                                case 2:
                                    
                                    
                                    break;
                                case 1:
                                    
                                    
                                    break;
                                case 0:
                                    
                                    break;
                            }
                    }
                    
                    
                    
                }

                function mover(opcion){               
                    switch (opcion.className){
                        case "cerrado":
                            opcion.className="abierto";
                            break;
                        case "abierto":
                            opcion.className="cerrado";
                            break;
                        case "cerrado_boton boton":
                            if(opcion.id=="subir_piso" || opcion.id=="bajar_piso"){
                                opcion.style.visibility="visible";
                            }
                            opcion.className="abierto_boton boton";
                            opcion.style.left="46.5%";
                            break;
                        case "abierto_boton boton":
                            if(opcion.id=="subir_piso" || opcion.id=="bajar_piso"){
                                opcion.style.visibility="hidden";
                            }
                            opcion.className="cerrado_boton boton";
                            opcion.style.left="0.5%";
                            break;
                    }
                    
                }
            </script>
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
      
      
$('.slider-nav').on('swipe', function(event, slick, direction){
  //console.log(direction);
  //console.log(slick);
   //console.log(event);
  
});
      //Get current slide 
      //Add class Hightlight
      //do this every time when changes
      //var currentSlide = $('.slider-nav').slick('slickCurrentSlide');
    
      

	
  
      
    });  
  
    //
    // INICIO DE CARGA DE JSON PANNELLUM
    //
  
      json_contenido='';
      function visita_libre(nombre){
        
        $.ajax({
                url: 'index.php/conversorbd2json/'+nombre,
                dataType: 'json',
                success: function(data){
                  console.log(json_contenido);
                    $.each(data.scenes, function(i){
                        var escenas= data.scenes[i];
                        var enlace= data.scenes[i].panorama;
                        var prueba=enlace.split("/");
                        console.log(prueba);
                        if(prueba.length==2)
                          var cadena = prueba[1].split(".");
                        else 
                          var cadena = prueba[2].split(".");
                        
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
        //json_contenido.scenes["p1p2f3"].panorama = "<?php //echo base_url("assets/imagenes/bajaplanta/p1p2f3.JPG");?>";
        
          //return json_contenido;
        }
   // viewer = pannellum.viewer('panorama', json_contenido );
    
    // 
    // FIN DE CARGA DE JSON PANNELLUM
    //
  

function puntos(hotspotDiv,identificador){
            if(identificador=="pspunto12"){
               piso_escalera(0);
            }
            if(identificador=="p1punto18"){
                piso_escalera(1);
            }
            document.getElementsByClassName("punto_seleccionado")[0].className="puntos";
            document.getElementById(identificador).className="punto_seleccionado";
            document.getElementsByClassName("punto_seleccionado")[0].className="puntos";
            document.getElementById(identificador).className="punto_seleccionado";
            
        }

   /////////////////////PRUEBAS AJAX////////////////////////////////
  ///////////////////////////////////////////////////////////////
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
  ///////////////////////////////////////////////////
  ///////////////////////////////////////////////////
  
  
  /////////////////////////PRUEBAS AJAX////////////////////////////
  ////////////////////////////////////////////////////////////////
    
  /*cambio de mapa con las escaleras*/
  function piso_escalera(option){
      switch(option){
          case 0:
            document.getElementsByClassName("piso_abierto pisos")[0].className="piso_cerrado pisos";
            document.getElementById("sotano").className="piso_abierto pisos";
              break;
          case 1:
            document.getElementsByClassName("piso_abierto pisos")[0].className="piso_cerrado pisos";
            document.getElementById("primer_piso").className="piso_abierto pisos";
              break;
          case 2:
            document.getElementsByClassName("piso_abierto pisos")[0].className="piso_cerrado pisos";
            document.getElementById("segundo_piso").className="piso_abierto pisos";
              break;
          case 3:
            document.getElementsByClassName("piso_abierto pisos")[0].className="piso_cerrado pisos";
            document.getElementById("tercer_piso").className="piso_abierto pisos";
              break;
             }
      variable_piso(option);
  }
    
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
    
    ////////////////////
    // Pruebas Juego////
   /////////////////////
   
   var solucion = [4, 5];
    var prueba = [0,0];
    
    function juego1(){
        alert("Has encontrado la primera pieza, enhorabuena");
        prueba[0]=4;
    }
    
    function juego2(){
        alert("Has encontrado la segunda pieza, enhorabuena");
        prueba[1]=5;
    }
    
    function juego3(){
        if(prueba[0]==4 && prueba[1]==5){
            alert("Has encontrado las dos piezas, puedes entrar");
			viewer.loadScene('premio')
        }else{
            alert("algo te falta, sigue buscando");
        }
    }
    //Toggle Audio boton.
    
    $("#botonAudio1").toggle(function()
    {$("#botonAudio").show();},
    function()
    {$("#botonAudio").hide();
    });
   
  /*//Toggle fullscren icono.
   $("#fullscreen").toggle(function()
    {$(".ctrl").css("background-image","url('css/svg/fsnormal.svg')");},
    function()
    {$(".ctrl").css("background-image","url('css/svg/fullscreenblanco.svg')");
    });
  */
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

    <script>
        function puntosMapa(identificador){
            
            document.getElementsByClassName("punto_seleccionado")[0].className="puntos";
            document.getElementById(identificador).className="punto_seleccionado";
        }
    </script> 
      
     <script src="https://unpkg.com/tilt.js@1.2.1/dest/tilt.jquery.min.js"></script>
     <script type="text/javascript" src="<?php echo base_url("assets/js/slick/slick/slick.min.js");?>"></script>
  
