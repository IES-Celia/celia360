<!--
    Eso con visual basic lo hago en dos lineas!
-->
<style>
    .mapa_zona{
        z-index: 2;
        overflow: visible;
        position: relative;
        display: inline-grid;
    }
</style>
<script>
$(document).ready(function(){ 
    //Deshabilitar select option
    $("#select_pisos").prop("disabled", true);
    $("#eliminarPunto").prop("disabled", true);

    /* Eliminar puntos en el mapa */
    $(".puntos").click(function(event){
        $("#eliminarPunto").prop("disabled", false);
        var id = $(this).attr("id");
    })

    //Deshabilitar click derecho
    $(document).bind("contextmenu",function(e){

        /* Posicon relativa del punto en la imagen del mapa. Colocar puntos en el mapa*/
        $(".mapa_zona").mousedown(function(event){
            if(event.which == 3){//Solo se cumple la condicion al realizar click derecho
                //Calculamos la posicion relativa donde se ha hecho click derecho
                if(event.offsetX == undefined){ // para firefox
                    var left = event.pageX - $(this).offset().left;
                    var top = event.pageY - $(this).offset().top;
                }else{ // chrome
                    var left = event.offsetX;
                    var top = event.offsetY;
                }
                var anchura = $(this).width();
                var altura = $(this).height();
                left = (100*left)/anchura;
                top = (100*top)/altura;
                $("#leftZona").val(left.toFixed(2));
                $("#topZona").val(top.toFixed(2));
                $("#select_pisos").prop("disabled", false);
            }
        });
        return false; //Deshabilita el click derecho del raton
    });

});
</script>
<div class="container">
    <h1 class="text-center mb-3">Mapa de zonas</h1>
    <div class="row">
        <!-- Imagen del mapa de la zona -->
        <div class="mapa_zona col-md-8">
            <img src="<?php echo base_url("assets/imagenes/mapa/").$opcionesPortada[12]['opcion_valor']?>" alt="mapa de zona">
            <?php
            /* Coloca los puntos en la imagen del mapa */ 
            foreach ($pisos as $piso) {
                echo "<div id='".$piso['titulo_piso']."' class='puntos' style='left: ".$piso['left_zona']."%; top: ".$piso['top_zona']."%;' escena='".$piso['piso']."'></div>";                  
            }
            ?>
        </div>
        <div class="titulo_piso col-md-4">
        <!-- Formulario oculto para mandar la posicion relativa del top y el left a la vista de insercion -->
            <?php echo '<form id="formZona" action="'.base_url("zonas/insertarZonas").'" method="post" name="formZona">'; ?>
                <input type="hidden" id="leftZona" name="leftZona" value="0">
                <input type="hidden" id="topZona" name="topZona" value="0">
                <div class="row">
                    <select name="piso" id="select_pisos">
                    <?php  
                        foreach ($pisos as $piso) {
                            echo "<option value='".$piso["piso"]."'>".$piso["titulo_piso"]."</option>";
                        }
                    ?>
                    </select>
                </div>
                <div class="row">
                    <label for="Eliminar">Eliminar punto:</label>
                    <input type="button" id="eliminarPunto" value="Eliminar">
                </div>
                <input type="submit" value="Enviar">
            </form>
        </div>
    </div>
</div>