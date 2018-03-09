var id;
var piso = 0;


$(document).ready(function() {
	/**
	 * Funcionamiento básico del mapa 
	 */
	
		$(".pisos").hide();
		$(".pisos:eq(" + piso + ")").show();
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
		location.href = base_url+"mapaadmin/"
	})
   	
   	$(".pisos").contextmenu(function(event){
   		
		if (!$(this).hasClass("pisos_hotspots")) {			
			var id =$(this).attr("id");
			id=id.substr(4);
			
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
		location.href=base_url+"escenas/showUpdateScene/"+$(this).attr("escena");
			//location.href=base_url+"escenas/deletescene/"+$(this).attr("escena");
		
		
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
		if($("#mapa").hasClass("insertar_pd")){

		}else{

		}
		if($(this).parent().hasClass("pisos_hotspots")){
			$(".puntos").css("background", "white");
			$(this).css("background", "yellow");
			$("#puntoEscena > form > input[name=sceneId]").val($(this).attr("escena"));
			$("#puntoEscena > form > input[name=clickHandlerArgs]").val($(this).attr("id"));
		} else if ($(this).parent().hasClass("pisos_pd")){
			$(".puntos").css("background", "white");
			$(this).css("background", "yellow");
			$(".for > form > input[name=escena_celda]").val($(this).attr("escena"));
		}else{
			location.href = base_url + "welcome/cargar_escena/" + $(this).attr("escena") + "/show_insert_hotspot/"
		}
		
	})
	/**
	 * 
	 */
	$("#btn-subir-piso-admin").click(function(event) {
		subir_piso();
		$("#piso_actual>span").text(piso)
    });

    $("#btn-bajar-piso-admin").click(function(event) {
		bajar_piso();
		$("#piso_actual>span").text(piso)
	});
	
	$("#btn-editar-mapa").click(function () {
		$("#modalEditar").toggle();
		$("#modalEditar").find("input[name=posicion]").val(piso);
		$("#modalEditar").find("input[name=posicion_inicial]").val(piso);
	})
	$("#btn-eliminar-mapa").click(function () {
		
	})
	$("#btn-anadir-mapa").click(function () {
		$("#modalAnadir").toggle();
		$("#modalAnadir").find("input[name=posicion]").val(piso);
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

	$("#mapa_escena").css({
		height: altura+'px',
		width: anchura+'px'
	});
}
	
/**
 * Subida y Bajada de piso.
 */
function subir_piso(){
	if(piso<piso_maximo){
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

/**
 * Administración mapa
 */

 
