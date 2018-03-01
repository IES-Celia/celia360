var id;
var piso = 0;


$(document).ready(function() {
	/**
	 * Funcionamiento básico del mapa 
	 */
	$(".pisos:eq(" + piso + ")").show();
	mapa_responsivo();
	
    $("#btn-subir-piso").click(function(event) {
    	subir_piso();
    });

    $("#btn-bajar-piso").click(function(event) {
    	bajar_piso();
    });
/**
 * Administración del mapa.
 */
	$("#btn-admin-mapa").click(function(){
		location.href = base_url+"mapa/"
	})
   	
   	$(".pisos").contextmenu(function(event){
   		
		if (!$(this).hasClass("pisos_hotspots")) {
			var id = $(this).children().last().attr('id');

			var prefijo = parseInt(id.split("punto")[1]) + 1;
			
			id = $(this).attr('id')+"punto"+prefijo;
			
			

			var izquierda = $(this).offset();
			var anchura = $(this).width();
			var altura = $(this).height();
			var left = event.pageX-izquierda.left;
			left = (100*left)/anchura;
			var top = event.pageY-izquierda.top;
			top = (100*top)/altura;
			location.href=base_url+"escenas/showinsert/"+id+"/"+left.toFixed(2)+"/"+top.toFixed(2);


			event.preventDefault();
		}
	});
	$(".puntos").contextmenu(function(event) {
		event.stopImmediatePropagation();
		if(confirm("¿Quieres borrar el punto seleccionado?")){
			location.href=base_url+"escenas/deletescene/"+$(this).attr("escena");
		}
		
		event.preventDefault();
	})

	$(".puntos").hover(function(){
		$(this).children().css("visibility", "visible");
	},function(){
		$(this).children().css("visibility", "hidden");
	});
	/**
	 * Marcar punto de destino en creación hotspot de tipo salto.
	 */
	$(".puntos").click(function() {
		if($(this).parent().hasClass("pisos_hotspots")){
			$(".puntos").css("background", "white");
			$(this).css("background", "yellow");
			$("#puntoEscena > form > input[name=sceneId]").val($(this).attr("escena"));
			$("#puntoEscena > form > input[name=clickHandlerArgs]").val($(this).attr("id"));
		}else{
			location.href=base_url+"welcome/cargar_escena/"+$(this).attr("escena")+"/show_insert_hotspot/"
		}
		
	})
});






/**
 * Responsibidad del mapa.
 */
$(window).resize(function() {
	mapa_responsivo();
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
	
/**
 * Subida y Bajada de piso.
 */
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

