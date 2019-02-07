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
    .botonFormulario{
        width: 300px;
        margin: 10px;
        height: auto;
        cursor: pointer;
        border-radius: 10px;
        border-color: white;
        font-family: comic;
        font-size: 30px;
        color: white;
        background-color: rgba(0,0,0,0.2);
        transition: 0.4s;
    }
</style>
<script>
$(document).ready(function(){ 
    //Deshabilitar select option
    $("#select_pisos").prop("disabled", true);

    /* Eliminar puntos en el mapa */
    $(".puntos").click(function(event){
        var punto =  $(this);//Guardamos el punto seleccionado en una variable
        var titulo
        if(confirm("¿Deseas eliminar el punto seleccionado?") == true){
            var id = $(this).attr("id");

            //URL para eliminar el punto
            var url = '<?php echo base_url("Zonas/deletePunto/")?>'+id;

            //Eliminar puntos en el mapa mediante ajax
            $.ajax({
                    url:   url, //archivo que recibe la peticion
                    type:  'post', //método de envio
                    success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                        if(response == 0){
                            $(punto).remove();//Eliminamos el punto cuando seleccionado
                            console.log("Punto eliminado correctamente");
                        }else{
                            console.log("Error al eliminar punto");
                        }
                    }
            });
        }
    })

    //Deshabilitar click derecho del raton
    $(document).bind("contextmenu",function(e){

        // Posicon relativa del punto en la imagen del mapa. Colocar puntos en el mapa
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
        return true; //Deshabilita el click derecho del raton
    });

});
</script>
<div class="container">
    <h1 class="text-center mb-3">Mapa de zonas</h1>
    <div class="row">
        <!-- Imagen del mapa de la zona -->
        <div class="mapa_zona col-md-7" style="height: 400px;">
            <img src="<?php echo base_url("assets/imagenes/mapa/").$opcionesPortada[12]['opcion_valor']?>" style="width:100%; height:100%" alt="mapa de zona">
            <?php
            /* Coloca los puntos en la imagen del mapa */ 
            foreach ($pisos as $piso) {
                echo "<div id='".$piso['piso']."' class='puntos' style='left: ".$piso['left_zona']."%; top: ".$piso['top_zona']."%;' escena='".$piso['piso']."'></div>";                  
            }
            ?>
        </div>
        <div class="titulo_piso col-md-4 text-center">
            <h2 class="text-center">Zonas</h2>
        <!-- Formulario oculto para mandar la posicion relativa del top y el left a la vista de insercion -->
            <?php echo '<form id="formZona" action="'.base_url("zonas/insertarZonas").'" method="post" name="formZona">'; ?>
                <input type="hidden" id="leftZona" name="leftZona" value="0">
                <input type="hidden" id="topZona" name="topZona" value="0">
                <select name="piso" id="select_pisos">
                    <?php  
                        foreach ($pisos as $piso) {
                            echo "<option value='".$piso["piso"]."'>".$piso["titulo_piso"]."</option>";
                        }
                    ?>
                </select>
                <input class="botonFormulario" type="submit" value="Enviar">
            </form>
        </div>
    </div>
</div>