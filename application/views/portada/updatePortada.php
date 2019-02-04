<script>
    $(document).ready(function(){
        $("select[name="ascensor_mapa"]").click(function(){
            alert($(this).val())
        })
    });
</script>

<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <h1 class="text-center">Opciones de portada</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 mx-auto" id="caja2">
            <?php
            echo"<form action='".site_url("tour/modificar_portada")."' method='post' enctype='multipart/form-data'>";
            ?>
                Imagen de icono:<br/><img src='<?php echo base_url("assets/imagenes/portada/").$opcionesPortada[10]['opcion_valor'];?>' width='200'><br/><input type='file' name='nuevo_logo_web' ><br/><br/>           
                Titulo de la web:<br/>  <input type='text' name='titulo_web' value='<?php echo $opcionesPortada[0]['opcion_valor'];?>'><br/>
                Imagen de portada:<br/> <img src='<?php echo base_url("assets/imagenes/portada/").$opcionesPortada[1]['opcion_valor'];?>' width='200'><br/><input type='file' name='nueva_imagen_web' ><br/><br/>         
                Texto visita libre:<br/>  <input type='text' name='subtitulo_visita_libre' value='<?php echo $opcionesPortada[2]['opcion_valor'];?>'><br/>
                Texto visita guiada:<br/>  <input type='text' name='subtitulo_visita_guiada' value='<?php echo $opcionesPortada[3]['opcion_valor'];?>'><br/>
                Texto puntos destacados:<br/>  <input type='text' name='subtitulo_puntos_destacados' value='<?php echo $opcionesPortada[4]['opcion_valor'];?>'><br/>
                Texto biblioteca:<br/> <input type='text' name='subtitulo_biblioteca' value='<?php echo $opcionesPortada[5]['opcion_valor'];?>'><br/>
                <p>
                Cambiar tipo de Fuente: 
                <select name='nombre_fuente'>
                    <option value='Oswald' <?php if ($opcionesPortada[8]['opcion_valor'] == "Oswald") echo "selected";?> style="font-family:Oswald">Oswald</option>
                    <option value='Ubuntu' <?php if ($opcionesPortada[8]['opcion_valor'] == "Ubuntu") echo "selected";?> style="font-family:Ubuntu">Ubuntu</option>
                    <option value='Aleo' <?php if ($opcionesPortada[8]['opcion_valor'] == "Aleo") echo "selected";?> style="font-family:Aleo">Aleo</option>
                    <option value='Comfortaa' <?php if ($opcionesPortada[8]['opcion_valor'] == "Comfortaa") echo "selected";?> style="font-family:Comfortaa">Comfortaa</option>
                    <option value='PatrickHand' <?php if ($opcionesPortada[8]['opcion_valor'] == "PatrickHand") echo "selected";?> style="font-family:PatrickHand">PatrickHand</option>
                    <option value='Roboto' <?php if ($opcionesPortada[8]['opcion_valor'] == "Roboto") echo "selected";?> style="font-family:Roboto">Roboto</option>
                </select>
                </p>
                </p>
                Color fuente:<br/>  <input type='color' name='color_fuente' value='<?php echo $opcionesPortada[9]['opcion_valor'];?>'><br/>
                <p>
                Mostrar opción "Biblioteca": 
                <select name='show_biblioteca'>
                    <option value='1'>Mostrar</option>
                    <option value='0' <?php if ($opcionesPortada[6]['opcion_valor'] == 0) echo "selected";?> >Ocultar</option>
                </select>
                </p>
                <p>
                Mostrar botón "Historia":  
                <select name='show_historia'>
                    <option value='1'>Mostrar</option>
                    <option value='0' <?php if ($opcionesPortada[7]['opcion_valor'] == 0) echo "selected";?> >Ocultar</option>
                </select>
                </p>
                <p>
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
                Seleccionar ascensor o mapa:  
                <select name='ascensor_mapa'>
                    <option value="ascensor" selected>Ascensor</option>
                    <option value="mapa">Mapa</option>
                </select>
                </p>
                <input type='submit' value='Enviar'><br><br>
            </form>  
        </div>
    </div>
</div>