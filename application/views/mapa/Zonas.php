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
    $(".mapa_zona").click(function(event){
        if(event.offsetX == undefined){ // para firefox
            x = event.pageX - $(this).offset().left;
            y = event.pageY - $(this).offset().top;
        }else{ // chrome
            x = event.offsetX;
            y = event.offsetY;
        }
        alert(x+" - "+y)
    });
});
</script>
<div class="container">
    <h1 class="text-center mb-3">Mapa de zonas</h1>
    <div class="mapa_zona">
        <img src="<?php echo base_url("assets/imagenes/mapa/").$opcionesPortada[12]['opcion_valor']?>" alt="">
    </div>
</div>