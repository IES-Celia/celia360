<!--
    Eso con visual basic lo hago en dos lineas!
-->
<style>
    .mapa_zona{
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
    .insert {
        color: white;
        font-size: 28px;
        text-decoration: none;
        width: 250px;
        transition: 0.4s;
        background: #1C6EA4;
        text-align: center;
        margin-bottom: 15px;
        box-shadow: inset 0px 0px 2px 1px rgba(255,255,255,1);
        margin-right: 28px;
        display: inline!important;
        float: none!important;
        border-radius: 5px;
    }
    /* CSS ventanas modales */
    #insertar{
        display: none;
        z-index: 1;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        border: 3px solid;
        background-color: rgb(0,0,0);
        background-color: rgba(0,0,0,0.4);
    }
    #caja {
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        -webkit-transform: translate(-50%, -50%);
        font-family: comic;
        color: white;
        width: 500px;
        height: auto;
        min-height: 150px;
        text-align: center;
        border: 2px solid grey;
        border-radius: 10px;
        box-shadow: 3px 3px 10px grey;
        background: rgb(90,163,237);
        background: -moz-linear-gradient(to bottom, rgba(90,163,237,1) 1%, rgba(35,101,132,1) 100%);
        background: -webkit-linear-gradient(to bottom, rgba(90,163,237,1) 1%,rgba(35,101,132,1) 100%);
        background: linear-gradient(to bottom, rgba(90,163,237,1) 1%,rgba(35,101,132,1) 100%);
    }
    .cerrar {
        position: relative;
        top: 15px;
        left: 44%;
    }
</style>
<script>
$(document).ready(function(){

    //Mostrar el id del punto, cuando el raton se posiciona encima de un punto
    $(".mapa_zona").on("mouseenter", ".puntos", function(){
        $(this).children("span").css({
            "visibility" : "visible"
        });
    });
    //Ocultar el id del punto, cuando el raton se quita de encima de un punto
    $(".mapa_zona").on("mouseleave", ".puntos", function(){
        $(this).children("span").css({
            "visibility" : "hidden"
        });
    })

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
                    $("#select_pisos option[value=nada]").prop("disabled", true);
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

/* Fin del document ready */
});
</script>
<div class="container">
    <h1 class="text-center">Mapa de zonas</h1>
    <div class="row text-center">
        <div class="col-md-7 mx-auto mb-3 bg-secondary" id="caja2">
            <p>Utiliza el click izquierdo para eliminar un punto en el mapa</p>
            <p>Utiliza el doble click derecho para insertar un punto en el mapa</p>
        </div>
    </div>
    <div class="row">
        <!-- Imagen del mapa de la zona -->
        <div class="mapa_zona col-md-7 mx-auto" style="height: 400px;">
            <img src="<?php echo base_url("assets/imagenes/mapa/").$opcionesPortada[12]['opcion_valor']?>" style="width:100%; height:100%" alt="mapa de zona">
            <?php
            /* Coloca los puntos en la imagen del mapa */ 
            foreach ($pisos as $piso) {
                if($piso["top_zona"] == null) echo "<div id='".$piso['piso']."' class='puntos' style='displaye: none; left: ".$piso['left_zona']."%; top: ".$piso['top_zona']."%;'><span class='tooltip'>".$piso["piso"]."-".$piso["titulo_piso"]."</span></div>";
                if($piso["top_zona"] != "null") echo "<div id='".$piso['piso']."' class='puntos' style='left: ".$piso['left_zona']."%; top: ".$piso['top_zona']."%;'><span class='tooltip'>".$piso["piso"]."-".$piso["titulo_piso"]."</span></div>";
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
                    <option value="nada" selected="true" disabled="disabled"> - Selecciona Zona - </option>
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
