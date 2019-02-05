<?php
/*
    Este archivo es parte de la aplicación web Celia360. 

    Celia 360 es software libre: usted puede redistribuirlo y/o modificarlo
    bajo los términos de la GNU General Public License tal y como está publicada por
    la Free Software Foundation en su versión 3.
 
    Celia 360 se distribuye con el propósito de resultar útil,
    pero SIN NINGUNA GARANTÍA de ningún tipo. 
    Véase la GNU General Public License para más detalles.

    Puede obtener una copia de la licencia en <http://www.gnu.org/licenses/>.
*/
// a continuacion nos encontramos con el css de las ventanas modales de la vista audio.
?>
<html>
    <head>
        <title> Insert Hotspot </title>
        <meta http-equiv="
            Este archivo es parte de la aplicación web Celia360. 

            Celia 360 es software libre: usted puede redistribuirlo y/o modificarlo
            bajo los términos de la GNU General Public License tal y como está publicada por
            la Free Software Foundation en su versión 3.

            Celia 360 se distribuye con el propósito de resultar útil,
            pero SIN NINGUNA GARANTÍA de ningún tipo. 
            Véase la GNU General Public License para más detalles.

            Puede obtener una copia de la licencia en http://www.gnu.org/licenses.">
    </head>
    <style>
        .panel-informacion-texto {
            font-size:0.65em;
            font-weight: lighter;
        }
    </style>
<body>
<h1> Formulario para insertar Hotspots</h1>
    <div id="botones">
    Un hotspot es un punto de una escena en el que al hacer click se activará una función, el tipo del hotspot determinará la acción resulante del click, las tipos de hotspot son los siguientes:<br><br>
        
    <div id="botonesderecha">
	<?php
		if($tabla == 1){
			echo '<button class="botondentromapa" id="btnInsertarPanel">Punto de panel informativo</button>
			<button class="botondentromapa" id="btnInsertarAudio">Punto audiodescrito</button>
			<button class="botondentromapa" id="btnInsertarVideo">Punto video</button>';
		}else{
			echo '<button class="botondentromapa" id="btnInsertarEscena" >Punto de salto a otra escena</button>
			<button class="botondentromapa" id="btnInsertarPanel">Punto de panel informativo</button>
			<button class="botondentromapa" id="btnInsertarAudio">Punto audiodescrito</button>
			<button class="botondentromapa" id="btnInsertarVideo">Punto video</button>
			<button class="botondentromapa" id="btnInsertarEscaleras">Conector entre planos (escaleras)</button><br>
			<button class="botondentromapa" id="btnModificarPitchYaw">Punto hacia donde estará dirigida la cámara al entrar en esta fotografía</button><br><br>';
		}
	?>
    </div>    
    </div>
<div id="formularios">
    <div id="puntoEscena"> 
    <div id="caja4">
        <?php
        echo "<form action='".   site_url("hotspots/process_insert_scene")   ."' method='get'>"; ?>
            <input type='hidden' name='id_scene'  readonly="readonly" value='<?php echo $id_scene ?>'>
            <input type='hidden' name='pitch'  readonly="readonly" value=' <?php echo $pitch ?> '> 
            <input type='hidden' name='yaw'  readonly="readonly" value=' <?php echo $yaw ?> '> 
            <input type='hidden' name='cssClass' value='custom-hotspot-salto' readonly="readonly">
            <input type='hidden' name='tipo' value='scene' readonly="readonly">
            <input type='hidden' name='clickHandlerFunc' value='puntos' readonly="readonly">
            <input type='hidden' name='clickHandlerArgs' readonly='readonly'>
            Selecciona una escena (en rojo donde estás, amarillo donde se saltará): <br>
            <div id="mapa_escena_hotspot" >
            
        
            <?php
                $indice = $this->session->piso;
                
                    
                    echo "<div id='zona".$indice."' class='pisos pisos_hotspots'>";
                    echo "<img src='".base_url($mapa[$indice]['url_img'])."' style='width:100%;'>";
                    foreach ($puntos as $punto) {
                        if($punto['piso']==$indice){
                            if($punto['id_escena'] == $id_scene){
                                echo "<div id='punto".$punto['id_punto_mapa']."' class='punto_inicial' style='left: ".$punto['left_mapa']."%; top: ".$punto['top_mapa']."%;' escena='".$punto['id_escena']."'></div>";
                            }else{
                                echo "<div id='punto".$punto['id_punto_mapa']."' class='puntos' style='left: ".$punto['left_mapa']."%; top: ".$punto['top_mapa']."%;' escena='".$punto['id_escena']."'></div>";
                            }
                        }
                    }
                    echo "</div>";
                
            ?>
            </div>
                
            <br>
            <input type='text' name='sceneId' required>
            <input type='submit' class="button">
        </form>
            </div>
    </div>

    <div id="puntoPanel"> 
    <div id="caja3">
        <?php
        echo "<form enctype='multipart/form-data' action='".site_url("hotspots/process_insert_panel/".$tabla)."' method='post'>"; ?>
            <input type='hidden' name='id_scene'  readonly="readonly" value='<?php echo $id_scene ?>'> 
			<?php  if(isset($escena_principal))
				echo "<input type='hidden' name='escena_principal'  readonly='readonly' value='$escena_principal'>"
			?>
            <input type='hidden' name='pitch' value='<?php echo $pitch ?>'>
            <input type='hidden' name='yaw' value='<?php echo $yaw ?>'> 
            <input type='hidden' name='cssClass' value='custom-hotspot-info' readonly="readonly">
            <input type='hidden' name='tipo' value='info' readonly="readonly">
            <input type='hidden' name='clickHandlerFunc' value='panelInformacion' readonly="readonly">
            <input type='hidden' name='clickHandlerArgs' value='<?php echo $id_hotspot ?>' readonly='readonly'> 
            Titulo del panel: <input type='text' name='titulo' required><br> 
            Texto del panel:  <textarea id='descripcion_texto'  name="texto" rows="6" cols="50" required></textarea><br>
            <label style='text-justify: auto;'>seleccionar PDF (OPCIONAL)<br><span class='panel-informacion-texto'>Permite visionar el documento PDF en el panel</span></label>
            <input type="file" name="documento" placeholder="Seleccionar la imagen"><br>
            
            <input type="hidden" name="MAX_FILE_SIZE" value="200000000000" />
            <!--
            <select name="documentoPanel">
            <option value="ninguno">ninguno</option>
                <?php 
                    /*foreach ($documentos as $doc) {
                        $documento=$doc["documento_url"];
                        $documentoIdentificador= $doc["id_documento"];
                       
                            echo "<option value=$documento>$documento</option>";
                    }*/
                ?>
            </select>
            <br><br>-->
            <input type='submit' class="button">
        </form>
    </div>
    </div>   
    
    <!-- Seccion hotspot de tipo audio -->
    <div id="puntoAudio"> 
    <div id="caja3">
        <!-- Formulario para insertar un hotspot de tipo audio -->
        <?php
        echo "<form action='".   site_url("hotspots/process_insert_audio/".$tabla)   ."' method='get'>"; ?>
            <input type='hidden' name='id_scene'  readonly="readonly" value='<?php echo $id_scene ?>'>
            <input type='hidden' name='pitch' value='<?php echo $pitch ?>'>
            <input type='hidden' name='yaw' value='<?php echo $yaw ?>'>
            <input type='hidden' name='cssClass' value='custom-hotspot-audio' readonly="readonly">
            <input type='hidden' name='tipo' value='info' readonly="readonly">
            <input type='hidden' name='clickHandlerFunc' value='musica' readonly="readonly">
            ID del audio que se reproducirá al hacer click: <input type='text' name='clickHandlerArgs' id='idAudioForm' required><br> 


            <input type='submit' class="button">
        </form>
    </div>
        
        <div id="listaAudios">
            <?php 
                echo"<table class='tabla_audio' class='display' id='cont'>
                        <thead>
                            <tr id='cabecera'>
                            <th>ID</th>
                            <th>URL</th>
                            <th>Descripcion</th>
                            <th>Tipo de audio</th>
                            <th>Reproducir</th>
                            <th>Seleccionar</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr id='cabecera'>
                            <th>ID</th>
                            <th>URL</th>
                            <th>Descripcion</th>
                            <th>Tipo de audio</th>
                            <th>Reproducir</th>
                            <th>Seleccionar</th>
                            </tr>
                        </tfoot>
                    <tbody>";

                    foreach ($listaAudios as $re) {

                        $id = $re["id_aud"];
                        echo'<tr id="contenidoaudio' . $id . '">';
                        echo'<td id="id_aud' . $id . '">' . $re["id_aud"] . '</td>';
                        echo'<td id="url_aud' . $id . '">' . $re["url_aud"] . '</td>';
                        echo'<td id="desc_aud' . $id . '">' . $re["desc_aud"] . '</td>';
                        echo'<td id="tipo_aud' . $id . '">' . $re["tipo_aud"] . '</td>';
                        echo"<td><audio controls='controls' preload='auto'>
                            <source src='" . base_url($re["url_aud"]) . "' type='audio/m4a'/>
                            <source src='" . base_url($re["url_aud"]) . "' type='audio/mp3'/>
                            </audio></td>".
                            '<td onClick="seleccionarAudio('.$id.')"><a href="#">Seleccionar</a></td>'.
                            "</tr>";
                    }
                    echo "</tbody>";
                echo "</table>";
            ?>
        </div>
    </div>
    <!-- FIN sección hotspot de tipo audio -->
    
    <div id="puntoVideo">
    <div id="caja3">
        <?php
        echo "<form action='".   site_url("hotspots/process_insert_video/").$tabla   ."' method='get'>"; ?>
			<input type='hidden' name='id_scene'  readonly="readonly" value='<?php echo $id_scene ?>'>
            <input type='hidden' name='pitch' value='<?php echo $pitch ?>'>
             <input type='hidden' name='yaw' value='<?php echo $yaw ?>'>
            <input type='hidden' name='cssClass' value='custom-hotspot-video' readonly="readonly"> 
            <input type='hidden' name='tipo' value='info' readonly="readonly">
            <input type='hidden' name='clickHandlerFunc' value='video' readonly="readonly"><br> 
            ID del video que se reproducirá: <input type='text' name='clickHandlerArgs' id='idVideoForm' required><br> 

            <input type='submit' class="button">
        </form>
    </div>
        
        <div id="listaVideos">
            <?php
                echo"<table class='tabla_audio' class='display' id='cont'>
                        <thead>
                            <tr id='cabecera'>
                            <th>ID</th>
                            <th>URL</th>
                            <th>Descripcion</th>
                            <th>Ver vídeo</th>
                            <th>Seleccionar</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr id='cabecera'>
                            <th>ID</th>
                            <th>URL</th>
                            <th>Descripcion</th>
                            <th>Ver vídeo</th>
                            <th>Seleccionar</th>
                            </tr>
                        </tfoot>
                    <tbody>";

                    foreach ($listaVideos as $re) {

                        $id = $re["id_vid"];
                        echo'<tr id="contenidovideo' . $id . '">';
                        echo'<td id="id_aud' . $id . '">' . $re["id_vid"] . '</td>';
                        echo'<td id="url_aud' . $id . '">' . $re["url_vid"] . '</td>';
                        echo'<td id="desc_aud' . $id . '">' . $re["desc_vid"] . '</td>';
                        echo'<td><a href="' . $re["url_vid"] . '" target="_blank">Visitar enlace</a></td>'.
                            '<td onClick="seleccionarVideo('.$id.')"><a href="#">Seleccionar</a></td>'.
                            '</tr>';
                    }
                    echo "</tbody>";
                echo "</table>";
            ?>
        </div>
    </div>

    <div id="puntoEscaleras">
    <div id="caja3">
        <?php
        echo "<form action='".   site_url("hotspots/process_insert_escaleras")   ."' method='get'>"; ?>
            Esto creará un punto de tipo escalera, el cual conecta las distintas zonas
            <input type='hidden' name='id_scene'  readonly="readonly" value='<?php echo $id_scene ?>'><br> 
            <input type='hidden' name='pitch' value=' <?php echo $pitch ?> '><br> 
            <input type='hidden' name='yaw' value=' <?php echo $yaw ?> '><br> 
            <input type='hidden' name='cssClass' value='custom-hotspot-escaleras' readonly="readonly"><br> 
            <input type='hidden' name='tipo' value='info' readonly="readonly"> <br>
            <input type='hidden' name='clickHandlerFunc' value='escaleras' readonly="readonly"><br> 
            <input type='submit' class="button">
        </form>
    </div>
    </div>
    

    
</div>

    <script>
      $( document ).ready(function() {
        $("#formularios").children().hide();
          
        $("#btnInsertarEscena").click(function() {
            $("#formularios").children().hide();
            $("#puntoEscena").show();
        });
          
        $("#btnInsertarPanel").click(function() {
            $("#formularios").children().hide();
            $("#puntoPanel").show();
        });
          
        $("#btnInsertarAudio").click(function() {
            $("#formularios").children().hide();
            $("#puntoAudio").show();
        });

         $("#btnInsertarVideo").click(function() {
            $("#formularios").children().hide();
            $("#puntoVideo").show();
        });
          
        $("#btnInsertarEscaleras").click(function() {
            $("#formularios").children().hide();
            $("#puntoEscaleras").show();
        });
          
        $("#btnModificarPitchYaw").click(function(){
          var resp = confirm("¿Desea que al entrar en esta escena se mire hacia esta dirección?")
            if(resp)
                location.href= '<?php echo site_url("hotspots/") ?>' + "update_escena_pitchyaw/" + <?php echo $pitch ?> + "/" + <?php echo $yaw ?> + "/" + "<?php echo $id_scene ?>"; 
        });

       // Activamos la paginación y la búsqueda en la tabla de audios/videos
       $(".tabla_audio,.tabla_video").dataTable({
            "language": {
                "lengthMenu": "Mostrar _MENU_ registros por página",
                "zeroRecords": "No se encontraron resultados en su búsqueda",
                "searchPlaceholder": "Buscar registros",
                "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
                "infoEmpty": "No existen registros",
                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                "search": "Buscar:",
                "paginate": {
                        "first":    "Primero",
                        "last":    "Último",
                        "next":    "Siguiente",
                        "previous": "Anterior"
                },
            }
            });



      }); // fin document.ready
         
         
        function seleccionarAudio(idAudio) {
            document.getElementById("idAudioForm").value = idAudio;
        }
        
        function seleccionarVideo(idVideo) {
            document.getElementById("idVideoForm").value = idVideo;
        }
         
         
         
    </script> 
