
/////////////////////PAQUILLO/////////////////////////
var id;
$(document).ready(function() {
    $("#boton_libre").click(function (){
        mapa_responsivo();
    })
    $("#boton_mapa").click(function(){
        mover();
    })
    mapa_responsivo()
});

/*evento de resize*/
function variable_piso(x){
    piso=x;
}
/*cambio de punto seleccionado, mediante los puntos del mapa*/
function puntos(hotspotDiv,identificador){
    /*if(identificador=="p0punto12"){
        piso_escalera(0);
    }
    if(identificador=="p1punto18"){
        piso_escalera(1);
    }*/
    document.getElementsByClassName("punto_seleccionado")[0].className="puntos";
    document.getElementById(identificador).className="punto_seleccionado";            
}
/*cambio de punto seleccionado mediante jotpoch*/
function puntosMapa(identificador){          
    document.getElementsByClassName("punto_seleccionado")[0].className="puntos";
    document.getElementById(identificador).className="punto_seleccionado";
}
 /*cambio de mapa con las escaleras*/
function piso_escalera(option){
    $("#mapa > div.piso_abierto").attr("class", "piso_cerrado pisos");
    $("#mapa > div:eq("+option+")").attr("class", "piso_abierto pisos");
    piso=option;
}
/*función de botones subir y bajar piso mapa*/
function cambiar_piso(opcion){
    if (opcion=="arriba") {
        if (piso==piso_maximo) {
            // aqui puedes poner algo y saltará cuando intentas pasar más allá del tejado
        }else{
            $("#mapa > div:eq(" + piso + ")").attr("class", "piso_cerrado pisos");
            piso++;
            $("#mapa > div:eq(" + piso + ")").attr("class", "piso_abierto pisos"); 
        }
    }else if (opcion=="abajo") {
        if(piso==0){
            // aqui puedes poner algo y saltará cuando intentas pasar más allá del sotano
        }else{
            $("#mapa > div:eq("+piso+")").attr("class", "piso_cerrado pisos");
            piso--;
            $("#mapa > div:eq("+piso+")").attr("class", "piso_abierto pisos");
        }
    }
    mapa_responsivo();  
}
/*Movimiento del mapa*/
function mover(){               
    if($("#mapa").hasClass("cerrado")){
        $("#mapa").attr("class","abierto");
        
        $(".cerrado_boton").attr("class","abierto_boton");
        mapa_responsivo();
    }else{
        $("#mapa").attr("class","cerrado");
        $(".abierto_boton").animate({left: "0.5%"},200);
        $(".abierto_boton").attr("class","cerrado_boton");
    }
    $("#bajar_piso, #subir_piso").toggle("fast")

}
/*responsividad del mapa*/
$(window).resize(function() {
    mapa_responsivo();
});

/*definición del tamaño del mapa y botones*/
function mapa_responsivo(){
    var altura_natural = $("#mapa > div.piso_abierto > img").get(0).naturalHeight
    var anchura_natural =$("#mapa > div.piso_abierto > img").get(0).naturalWidth
    var anchura, altura, anchura_ventana, altura_ventana;

    anchura_maxima = window.innerWidth*0.45;
    altura_maxima = window.innerHeight*0.80;

    if(anchura_natural > altura_natural){
        anchura=window.innerWidth*0.45;
        altura = altura_natural*anchura/anchura_natural;
        $(".abierto_boton").animate({left: "46.5%"},200);
    }else{
        altura=window.innerHeight*0.80;
        anchura = anchura_natural*altura/altura_natural;
        $(".abierto_boton").animate({left: anchura+20+"px"},200);
    }

    $("#mapa").css({
        bottom: "10px",
        height: altura+"px",
        width: anchura+"px"
    });

    $("#mapa > div.piso_abierto > img").css({
        width: "100%",
        height: "100%"
    });


}