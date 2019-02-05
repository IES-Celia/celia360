<!--
    Palabra de Felix: Eso con visual basic lo hago en dos lineas!
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
    /* Posicon relativa del punto en la imagen del mapa*/
    $(".mapa_zona").mousedown(function(event){
        if(event.which == 3){//Solo se cumple la condicion al realizar click derecho
            //Calculamos la posicion relativa donde se ha hecho click derecho
            if(event.offsetX == undefined){ // para firefox
                x = event.pageX - $(this).offset().left;
                y = event.pageY - $(this).offset().top;
            }else{ // chrome
                x = event.offsetX;
                y = event.offsetY;
            }
            $("#leftZona").val(x);
            $("#topZona").val(y);
            document.formZona.submit();
        }
    });
});
</script>
<div class="container">
    <!-- Formulario oculto para mandar la posicion relativa del top y el left a la vista de insercion -->
    <?php echo '<form id="formZona" action="'.base_url("zonas/insertarZonas").'" method="post" name="formZona">'; ?>
        <input type="hidden" id="leftZona" name="leftZona" value="0">
        <input type="hidden" id="topZona" name="topZona" value="0">
    </form>
    <!-- Imagen del mapa de la zona -->
    <h1 class="text-center mb-3">Mapa de zonas</h1>
    <div class="mapa_zona">
        <img src="<?php echo base_url("assets/imagenes/mapa/").$opcionesPortada[12]['opcion_valor']?>" alt="">
    </div>
</div>