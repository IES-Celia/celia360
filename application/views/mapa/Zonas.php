<!--
    Eso con visual basic lo hago en dos lineas!
-->
<style>
    .mapa_zona{
        overflow: visible;
        position: relative;
        display: inline-grid;
    }
</style>
<script>
$(document).ready(function(){

    /* Eliminar puntos en el mapa */
    $(".mapa_zona").on("click", ".puntos", function(event){//Utilizamos el metodo .on para poder eliminar elementos HTML creados dinamicamente
        var punto =  $(this);//Guardamos el punto seleccionado en una variable
        var id_punto_eliminar = $(this).attr("id");
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
                            //Mostramos la zona eliminada en el select option
                            $("#select_pisos option[value="+ id_punto_eliminar +"]").css({
                                "display" : "block"
                            });
                            $("#select_pisos option[value=nada]").prop("disabled", true);
                            console.log("Punto eliminado correctamente");
                        }else{
                            console.log("Error al eliminar punto");
                        }
                    }
            });
        }
    });

    //Deshabilitar click derecho del raton
    $(document).bind("contextmenu",function(e){
        return false; //Deshabilita el click derecho del raton
    });

    var left = null; //Variable global, posicion left relativa del punto en el mapa 
    var top = null; //Variable global, posicion top relativa del punto en el mapa

    // Posicon relativa del punto en la imagen del mapa. Colocar puntos en el mapa
    $(".mapa_zona").mousedown(function(event){
        if(event.which == 3){//Solo se cumple la condicion al realizar click derecho
            //Calculamos la posicion relativa donde se ha hecho click derecho
            if(event.offsetX == undefined){ // para firefox
                left = event.pageX - $(this).offset().left;
                top = event.pageY - $(this).offset().top;
            }else{ // chrome
                left = event.offsetX;
                top = event.offsetY;
            }
            let anchura = $(this).width();
            let altura = $(this).height();
            left = (100*left)/anchura;
            top = (100*top)/altura;
            left = left.toFixed(2);
            top = top.toFixed(2);

            //Mostrar ventana modal del select option
            $("#zona_modal").modal();
        }
    /* Fin del evento mousedown en mapa_zona */
    });

    //Insertar punto en el mapa mediante ajax
    $("#aceptar_insertar_punto").click(function(){
        //Value del select option
        var piso = $("#select_pisos").val();
        //Texto del select option seleccionado
        var nombre_span = $("#select_pisos option:selected").text();
        //URL para eliminar el punto
        var url = '<?php echo base_url("Zonas/insertarZonas/")?>'+top+"/"+left+"/"+piso;

        //Insertar puntos en el mapa mediante ajax
        $.ajax({
            url: url, //archivo que recibe la peticion
            type:  'post', //método de envio
            success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                if(response == 0){
                //Insertado el punto seleccionado
                    $(".mapa_zona").append('<div id='+piso+' class="puntos" style="left: '+left+'%; top: '+top+'%;"><span class="tooltip">'+nombre_span+'</span>');
                    //Ocultar punto que has puesto en el mapa del select option
                    $("#select_pisos option[value="+ piso +"]").css({
                        "display" : "none"
                    });
                    $("#select_pisos option[value='288']").prop("selected", true);
                    let color = $("#color_punto").val();
                    $(".puntos").css({
                        "background-color" : color
                    });
                    console.log("Punto insertado correctamente");
                }else{
                    console.log("Error al insertar punto");
                }
            }
        });

        //Ocultar ventana modal, despues de ejecutarse el ajax
        $("#zona_modal").modal("hide");
    })//Final del evento aceptar_insertar_punto

    $("#cancelar_insertar_punto").click(function(){
        $("#insertar").css({
            "display" : "none"
        })            
    })

    $("#color_punto").change(function(){
        let color = $(this).val();
        $(".puntos").css({
            "background-color" : color
        });
    })

/* Fin del document ready */
});
</script>
<div class="container">

    <h1 class="text-center">Mapa de zonas</h1>
    <div class="row text-center">
        <div class="col-md-7 mx-auto mb-3 bg-secondary" id="caja2">
            <p>Utiliza el click izquierdo para eliminar un punto en el mapa.</p>
            <p>Utiliza el doble click derecho para insertar un punto en el mapa.</p>
            <p>En caso de que los puntos no se visualicen correctamente, cambie el color de los puntos.</p>
            <div class="form-group">
              <input type='color' id="color_punto" name='color_fuente'>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Imagen del mapa de la zona -->
        <div class="mapa_zona col-md-7 mx-auto" style="height: 400px;">
            <img src="<?php echo base_url("assets/imagenes/mapa/").$opcionesPortada[12]['opcion_valor']?>" style="width:100%; height:100%" alt="mapa de zona">
            <?php
            /* Coloca los puntos en la imagen del mapa */ 
            foreach ($pisos as $piso) {
                if($piso["top_zona"] != "null") echo "<div id='".$piso['piso']."' class='puntos' style='left: ".$piso['left_zona']."%; top: ".$piso['top_zona']."%;' data-toggle='tooltip' data-placement='top' title='".$piso["piso"]."-".$piso["titulo_piso"]."'></div>";
            }
            ?>
        </div>
    </div>
    
</div>

<!-- Ventana modal -->
<div class="modal fade" id="zona_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Zonas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div class="form-group">
                <select name="piso" class="form-control" id="select_pisos">
                    <option value="288"> - Selecciona Zona - </option>
                    <?php  
                        foreach ($pisos as $piso) {
                            if($piso["top_zona"] == "null") echo "<option style='display : block' value='".$piso["piso"]."'>".$piso["piso"]." - ".$piso["titulo_piso"]."</option>";
                            if($piso["top_zona"] != "null") echo "<option style='display : none' value='".$piso["piso"]."'>".$piso["piso"]." - ".$piso["titulo_piso"]."</option>";
                        }
                        ?>
                </select>
            </div>
        <div class="row">
            <div class="col-md-12">
                <a name="" id="aceptar_insertar_punto" class="btn btn-primary float-right" href="#" role="button">Insertar</a>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
