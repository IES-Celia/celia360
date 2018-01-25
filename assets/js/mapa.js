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
    if(identificador=="pspunto12"){
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
      switch(option){
          case 0:
            document.getElementsByClassName("piso_abierto pisos")[0].className="piso_cerrado pisos";
            document.getElementById("sotano").className="piso_abierto pisos";
              break;
          case 1:
            document.getElementsByClassName("piso_abierto pisos")[0].className="piso_cerrado pisos";
            document.getElementById("primer_piso").className="piso_abierto pisos";
              break;
          case 2:
            document.getElementsByClassName("piso_abierto pisos")[0].className="piso_cerrado pisos";
            document.getElementById("segundo_piso").className="piso_abierto pisos";
              break;
          case 3:
            document.getElementsByClassName("piso_abierto pisos")[0].className="piso_cerrado pisos";
            document.getElementById("tercer_piso").className="piso_abierto pisos";
              break;
             }
      variable_piso(option);
}
/*función de botones subir y bajar piso mapa*/
function cambiar_piso(opcion){
    if (opcion==10) {
        if (piso==4) {
            // aqui puedes poner algo y saltará cuando intentas pasar más allá del tejado
        }else{
            piso++;
            switch (piso){
                case 1:
                    document.getElementById("sotano").className="piso_cerrado pisos";
                    document.getElementById("primer_piso").className="piso_abierto pisos";
                    break;
                case 2:
                    document.getElementById("primer_piso").className="piso_cerrado pisos";
                    document.getElementById("segundo_piso").className="piso_abierto pisos";
                    break;
                case 3:
                    document.getElementById("segundo_piso").className="piso_cerrado pisos";
                    document.getElementById("tercer_piso").className="piso_abierto pisos";
                    break;
                case 4:
                    document.getElementById("tercer_piso").className="piso_cerrado pisos";
                    document.getElementById("tejado").className="piso_abierto pisos";
                    break;
            }
        }
    }else if (opcion==-10) {
        if(piso==0){
    // aqui puedes poner algo y saltará cuando intentas pasar más allá del sotano
        }else{
            piso--;
            switch (piso){
            case 3:
                document.getElementById("tejado").className      ="piso_cerrado pisos";
                document.getElementById("tercer_piso").className ="piso_abierto pisos";
                break;
            case 2:
                document.getElementById("tercer_piso").className  ="piso_cerrado pisos";
                document.getElementById("segundo_piso").className ="piso_abierto pisos";
                break;
            case 1:
                document.getElementById("segundo_piso").className ="piso_cerrado pisos";
                document.getElementById("primer_piso").className  ="piso_abierto pisos";
                break;
            case 0:
                document.getElementById("primer_piso").className ="piso_cerrado pisos";
                document.getElementById("sotano").className      ="piso_abierto pisos";
                break;
            }
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
                    
    document.getElementById("mapa").style.top=window.innerHeight-altura+"px";
    document.getElementById("mapa").style.height=altura+"px";
    document.getElementById("mapa").style.width=anchura+"px"; 
    distancia_top=window.innerHeight*0.92;
}