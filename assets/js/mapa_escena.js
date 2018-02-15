var id;
var piso = 1;

$(document).ready(function() {

	$(".pisos").hide('0');
	$("#mapa_escena").slideUp(0);

	$("#btn-mapa").click(function(event) {
		$(".pisos:eq("+piso+")").toggle('0');
        $("#mapa_escena").slideToggle(400);
    });
    $("#btn-subir-piso").click(function(event) {
    	subir_piso();
    });

    $("#btn-bajar-piso").click(function(event) {
    	bajar_piso();
    });

    mapa_responsivo();
});

$(window).resize(function() {
    clearTimeout(id);
    id = setTimeout(mapa_responsivo, 100);
});
	
function mapa_responsivo(){

	var anchura= window.innerWidth*0.7
	var altura=anchura*0.57

	var pisos = $(".pisos")

	$("#mapa_escena").css({
		height: altura+'px',
		width: anchura+'px'
	});
}

function subir_piso(){
	if(piso<4){
		$(".pisos:eq("+piso+")").hide('fast');
		piso++;
		$(".pisos:eq("+piso+")").show('fast');	
	}
}

function bajar_piso(){
	if(piso>0){
		$(".pisos:eq("+piso+")").hide('fast');
		piso--;
		$(".pisos:eq("+piso+")").show('fast');	
	}
}