<script>
    $(document).ready(function(){

          /*********************/
         /*     ASCENSOR      */
        /*********************/

        //Comprobamos si el select ascensor_mapa tiene seleccionado el mapa
        if($("#ascensor_mapa").val() == "mapa"){
            $(".ascensor_mapa").show();//Si esta seleccionado el mapa lo mostramos
        }else{
            $(".ascensor_mapa").hide();//Si no esta seleccionado el mapa lo ocultamos
        }
        //Comprobamos si se a producido algun cambio en el select ascensor_mapa
        $("#ascensor_mapa").change(function(){
            let ascensor_mapa = $("#ascensor_mapa").val();
            if($("#ascensor_mapa").val() == "mapa"){
                $(".ascensor_mapa").show();//Si esta seleccionado el mapa lo mostramos                
            }else{
                $(".ascensor_mapa").hide();//Si no esta seleccionado el mapa lo ocultamos 
            }
        });

          /*********************/
         /*     HISTORIA      */
        /*********************/

        //Comprobamos si el select show_historia tiene seleccionado el mostrar
        if($("#show_historia").val() == "1"){
            $(".show_historia").show();//Si esta seleccionado el mostrar historia mostramos el editor  
        }else{
            $(".show_historia").hide();//Si no esta seleccionado el ocultar historia ocultamos el editor 
        }
        //Comprobamos si se a producido algun cambio en el select show_historia
        $("#show_historia").change(function(){
            let show_historia = $("#show_historia").val();
            if($("#show_historia").val() == "1"){
                $(".show_historia").show();//Si esta seleccionado el mostrar historia mostramos el editor                
            }else{
                $(".show_historia").hide();//Si no esta seleccionado el ocultar historia ocultamos el editor 
            }
        });
    });
</script>
<style>
    label{
        display: block;
    }
    .form-control-file, .form-control-range {
        margin: auto!important;
        display: block;
        width: auto!important;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <h1 class="text-center">Opciones de portada</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 mx-auto text-center bg-secondary" id="caja2">
            <?php
            echo"<form action='".site_url("tour/modificar_portada")."' method='post' enctype='multipart/form-data'>";
            ?>
            <div class="form-group">
              <label for=""><h4>Meta titulo:</h4></label>
              <input type='text' class='form-control' name='meta_titulo' value='<?php echo $opcionesPortada[15]['opcion_valor'];?>'>
            </div>
            <div class="form-group">
              <label for=""><h4>Meta descripción :</h4></label>
              <textarea maxlength="120" class="form-control" name="meta_descripcion" id="" rows="3"><?php echo $opcionesPortada[14]['opcion_valor'];?></textarea>
            </div>
            <hr>
            <div class="form-group">
              <label for=""><h4>Imagen de icono</h4></label>
              <div class="m-3">
                <img src='<?php echo base_url("assets/imagenes/portada/").$opcionesPortada[10]['opcion_valor'];?>' width='100'>
              </div>
              <input type="file" class="form-control-file" name="nuevo_logo_web" id="" placeholder="" aria-describedby="fileHelpId">
            </div>
            <div class="form-group">
              <label for=""><h4>Imagen de portada</h4></label>
              <div class="m-3">
                <img src='<?php echo base_url("assets/imagenes/portada/").$opcionesPortada[1]['opcion_valor'];?>' width='200'>
              </div>
              <input type='file' class="form-control-file" name='nueva_imagen_web'>
            </div>
            <div class="form-group">
              <label for=""><h4>Titulo de la web:</h4></label>
              <input type='text' class='form-control' name='titulo_web' value='<?php echo $opcionesPortada[0]['opcion_valor'];?>'>
            </div>
            <div class="form-group">
              <label for=""><h4>Texto visita libre:</h4></label>
              <input type='text' class='form-control' name='subtitulo_visita_libre' value='<?php echo $opcionesPortada[2]['opcion_valor'];?>'>
            </div>
            <div class="form-group">
              <label for=""><h4>Texto visita guiada:</h4></label>
              <input type='text' class='form-control' name='subtitulo_visita_guiada' value='<?php echo $opcionesPortada[3]['opcion_valor'];?>'>
            </div>
            <div class="form-group">
              <label for=""><h4>Texto puntos destacados:</h4></label>
              <input type='text' class='form-control' name='subtitulo_puntos_destacados' value='<?php echo $opcionesPortada[4]['opcion_valor'];?>'>
            </div>
            <div class="form-group">
              <label for=""><h4>Texto biblioteca:</h4></label>
              <input type='text' class='form-control' name='subtitulo_biblioteca' value='<?php echo $opcionesPortada[5]['opcion_valor'];?>'>
            </div>
            <div class="form-group">
              <label for=""><h4>Cambiar tipo de Fuente:</h4></label>
              <select class="form-control" name="nombre_fuente" id="">
                    <option value='Oswald' <?php if ($opcionesPortada[8]['opcion_valor'] == "Oswald") echo "selected";?> style="font-family:Oswald">Oswald</option>
                    <option value='Ubuntu' <?php if ($opcionesPortada[8]['opcion_valor'] == "Ubuntu") echo "selected";?> style="font-family:Ubuntu">Ubuntu</option>
                    <option value='Aleo' <?php if ($opcionesPortada[8]['opcion_valor'] == "Aleo") echo "selected";?> style="font-family:Aleo">Aleo</option>
                    <option value='Comfortaa' <?php if ($opcionesPortada[8]['opcion_valor'] == "Comfortaa") echo "selected";?> style="font-family:Comfortaa">Comfortaa</option>
                    <option value='PatrickHand' <?php if ($opcionesPortada[8]['opcion_valor'] == "PatrickHand") echo "selected";?> style="font-family:PatrickHand">PatrickHand</option>
                    <option value='Roboto' <?php if ($opcionesPortada[8]['opcion_valor'] == "Roboto") echo "selected";?> style="font-family:Roboto">Roboto</option>
              </select>
            </div>
            <div class="form-group">
              <label for=""><h4>Color fuente:</h4></label>
              <input type='color' name='color_fuente' value='<?php echo $opcionesPortada[9]['opcion_valor'];?>'>
            </div>
            <div class="form-group">
              <label for=""><h4>Mostrar opción "Biblioteca":</h4></label>
              <select class="form-control" name="show_biblioteca" id="show_biblioteca">
                    <option value='1'>Mostrar</option>
                    <option value='0' <?php if ($opcionesPortada[6]['opcion_valor'] == 0) echo "selected";?> >Ocultar</option>
              </select>
            </div>            
            <div class="form-group">
              <label for=""><h4>Mostrar botón "Historia": </h4></label>
              <select class="form-control" name="show_historia" id="show_historia">
                    <option value='1'>Mostrar</option>
                    <option value='0' <?php if ($opcionesPortada[7]['opcion_valor'] == 0) echo "selected";?> >Ocultar</option>
              </select>
            </div>
            <div class='form-group show_historia'>
	            <label for='text'><h4>Texto panel historia</h4></label>
	            <input type='hidden' id='texto_panel_historia' value='' name='texto_panel_historia'>
	            <div id='editor'>
                <?php echo $opcionesPortada[13]['opcion_valor']; ?>
		          </div>
            </div> 

                <!--    Dora la exploradora
                    Si a un lugar quieres llegar 
                    a mi deben consultar 
                    soy el mapa 
                    soy el mapa soy el mapa 
                    yo los puedo ayudar 
                    a los sitios encontrar 
                    soy el mapa 
                    soy el mapa soy el mapa soy el mapa... 
                    soy el mapa!  
                -->

            <div class="form-group">
              <label for=""><h4>Seleccionar ascensor o mapa:</h4></label>
              <select class="form-control" name="ascensor_mapa" id="ascensor_mapa">
                    <option value="ascensor" <?php if ($opcionesPortada[11]['opcion_valor'] == "ascensor") echo "selected";?>>Ascensor</option>
                    <option value="mapa" <?php if ($opcionesPortada[11]['opcion_valor'] == "mapa") echo "selected";?>>Mapa</option>
              </select>
            </div>
            <!-- Div que ocultamos o mostramos segun el select option de ascensor_mapa --> 
            <div class="ascensor_mapa form-group">
              <label for=""><h4>Imagen de mapa</h4></label>
              <div class="m-3">
                <img src='<?php echo base_url("assets/imagenes/mapa/").$opcionesPortada[12]['opcion_valor'];?>' width='200'>
              </div>
              <input type="file" class="form-control-file" name="nueva_imagen_mapa" aria-describedby="fileHelpId">
            </div>
            <button type="submit" class="btn btn-primary mb-3">Enviar</button>
            </form>  
        </div>
    </div>
</div>
<script>
        var quill = new Quill('#editor', {
            modules: {
        toolbar: [
           ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
           ['blockquote', 'code-block', 'link'],

           [{ 'header': 1 }, { 'header': 2 }],               // custom button values
           [{ 'list': 'ordered'}, { 'list': 'bullet' }],
           [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
           [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
           [{ 'direction': 'rtl' }],                         // text direction

           [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
           [{ 'font': [] }],
           [{ 'align': [] }],

           ['clean']                                         // remove formatting button
       ]
    },
  theme: 'snow'
});

        Quill.prototype.getHtml = function() {
            return this.container.firstChild.innerHTML;
        };

		window.addEventListener("load", function(event) {
    		document.getElementById('texto_panel_historia').value = quill.getHtml();
  		});

        quill.on('text-change',function(a,b,c){
            document.getElementById('texto_panel_historia').value = quill.getHtml();
        });

	  </script>