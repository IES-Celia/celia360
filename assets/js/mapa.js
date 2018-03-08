/////////////////////PAQUILLO/////////////////////////
$(document).ready(function($) {
    mapa_responsivo();
});
var piso=1;
/*evento de resize*/
    var id;
function variable_piso(x){
    piso=x;
}
/*cambio de punto seleccionado, mediante los puntos del mapa*/
function puntos(hotspotDiv,identificador){
    if(identificador=="p0punto12"){
        piso_escalera(0);
    }
    if(identificador=="p1punto18"){
        piso_escalera(1);
    }
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
}
/*Movimiento del mapa*/
function mover(opcion){               
    switch (opcion.className){
        case "cerrado":
            opcion.className="abierto";
        break;
        case "abierto":
            opcion.className="cerrado";
        break;
            case "cerrado_boton boton":
            if(opcion.id=="subir_piso" || opcion.id=="bajar_piso"){
            opcion.style.visibility="visible";
            }
            opcion.className="abierto_boton boton";
            opcion.style.left="46.5%";
        break;
        case "abierto_boton boton":
            if(opcion.id=="subir_piso" || opcion.id=="bajar_piso"){
            opcion.style.visibility="hidden";
            }
            opcion.className="cerrado_boton boton";
            opcion.style.left="0.5%";
        break;
    }                    
}
/*responsividad del mapa*/
$(window).resize(function() {
    clearTimeout(id);
    id = setTimeout(mapa_responsivo, 100);
});

/*definición del tamaño del mapa y botones*/
function mapa_responsivo(){
    var distancia_top=window.innerHeight*0.57;
    var anchura=window.innerWidth*0.45;
    var altura=anchura*0.57;
                    
    document.getElementById("mapa").style.bottom=10+"px";
    document.getElementById("mapa").style.height=altura+"px";
    document.getElementById("mapa").style.width=anchura+"px"; 
    distancia_top=window.innerHeight*0.92;
}