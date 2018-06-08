var id;
var piso = 0;
var draggable = 0;


$(document).ready(function() {
	/**
	 * Funcionamiento básico del mapa 
	 */
	
		$(".pisos").hide();
		$("#mapa_escena > .pisos:eq(" + piso + ")").show();
		$(".pisos:eq(" + piso + ")").show();
		$(".pisos-admin:eq(" + piso + ")").show();
		var piso_config = $("#modalConfig > #caja > form > input[name=piso_inicial]").val();
		$("#modalConfig > #caja > #mapa_escena_hotspot > .pisos_config:eq("+piso_config+")").show();	
		$("#mapa_config_mapa > .pisos_config").hide();	
		$("#mapa_config_mapa > .pisos_config:eq("+piso_config+")").show();	
	
	
    $("#btn-subir-piso").click(function(event) {
		subir_piso();
		mapa_responsivo();
    });

    $("#btn-bajar-piso").click(function(event) {
		bajar_piso();
		mapa_responsivo();
    });
/**
 * Administración del mapa.
 */
	$("#btn-admin-mapa").click(function(){
		location.href = base_url+"mapa/"
	})
   	
   	$("#mapa_escena .pisos").contextmenu(function(event){
   		
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
	$("#mapa_escena .puntos").contextmenu(function(event) {
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
		
		if($(this).parent().hasClass("pisos_hotspots")){
			$(".puntos").css("background", "white");
			$(this).css("background", "yellow");
			$("#caja4 > form > input[name=sceneId]").val($(this).attr("escena"));
			$("#puntoEscena input[name=clickHandlerArgs]").val($(this).attr("id"));
		} else if ($(this).parent().hasClass("pisos_pd")){
			$(".puntos").css("background", "white");
			$(this).css("background", "yellow");
			$("input[name=escena_celda]").val($(this).attr("escena"));
		} else if ($(this).parent().hasClass("pisos_config")){
			$("#modalConfig > #caja > form > #mapa_config_mapa > .pisos_config > .puntos").css("background", "white")
			$("#modalConfig > #caja > form > input[name=punto_inicial]").val($(this).attr("id"))
			$("#modalConfig > #caja > form > input[name=escena_inicial]").val($(this).attr("escena"))
			$(this).css("background", "yellow");
		}else if($(this).parent().hasClass("pisos_update")){
			$("#caja2 > form > input[name=sceneId]").val($(this).attr("escena"));
			$(".puntos").css("background-color","white");
			$(this).css("background-color","yellow");
		}else if($(this).parent().hasClass("pisos_guiada")){
			$(this).parent().parent().parent().find("#escenaGuiada").val($(this).attr("escena"))
			$(".puntos").css("background-color", "white");
			$(this).css("background-color","yellow");
		
		}else {
			location.href = base_url + "escenas/cargar_escena/" + $(this).attr("escena") + "/show_insert_hotspot/"+piso;
		}
		
	})
	/**
	 * 
	 */
	$("#btn-subir-piso-admin").click(function(event) {
		subir_piso();
		$("#piso_actual>span").text(piso)
		mapa_responsivo();
    });

    $("#btn-bajar-piso-admin").click(function(event) {
		bajar_piso();
		$("#piso_actual>span").text(piso)
		mapa_responsivo();
	});
	
	$("#btn-editar-mapa").click(function () {
		$("#modalEditar").show();
		$("#modalEditar").find("input[name=posicion]").val(piso);
		$("#modalEditar").find("input[name=posicion_inicial]").val(piso);
	});
	$("#btn-eliminar-mapa").click(function () {
		if(confirm("Desea eliminar la zona, tambien se eliminara cualquier escena y hotspot relacionado.")){
			location.href=base_url+"mapa/eliminar_zona/"+piso+"/"+piso_maximo;
		}
	});
	$("#btn-anadir-mapa").click(function () {
		$("#modalAnadir").show();
		$("#modalAnadir").find("input[name=posicion]").val(piso);
	});

	$("#btn-config-mapa").click(function () {
		$("#modalConfig").show();
		
	});

	$("#modalConfig > #caja > form > input[name=piso_inicial]").change(function(){
		var piso_config = $(this).val();
		$("#mapa_escena_hotspot > .pisos_config").hide();
		$("#mapa_escena_hotspot > .pisos_config:eq(" + piso_config + ")").show();
	});

	$("#caja > form > input[value='Cerrar']").click(function(){
		$(this).parent().parent().parent().hide();
	});
	setTimeout(() => {
		mapa_responsivo()
	}, 100);
	
	$("input[name=piso_inicial]").change(function(){
		$("#mapa_config_mapa > .pisos_config").hide();
		$("#zona"+$(this).val()).show();
		
	})

	$("#btn-mover-puntos").click(function(){
		if(draggable==0){
			draggable = 1;
			$(".puntos").off("click");
			$(".puntos").off("contextmenu");
			$(".puntos").attr("class","puntos-draggables");
			$(".puntos-draggables").draggable({
				stop: function(event, ui){
					var posicion = $(this).position();
					var identificador = $(this).attr("id");
					
					var left = (posicion.left*100)/$(this).parent().width() ;
					var top = (posicion.top*100)/$(this).parent().height() ;
					$(this).css({
						"left": left+"%",
						"top": top+"%"
					})


					$.ajax({
						type: "post",
						url: base_url + "mapa/update_punto",
						data: { id_punto: identificador , left: left , top: top }
					})
				},
				containment: "parent"
			})

		}else{
			draggable = 0;
			$(".puntos-draggables").draggable("destroy")
			$(".puntos-draggables").attr("class","puntos")
			$(".puntos").click(function(){
				location.href = base_url + "escenas/cargar_escena/" + $(this).attr("escena") + "/show_insert_hotspot/"+piso;
			})
			$("#mapa_escena .puntos").contextmenu(function(event) {
				event.stopImmediatePropagation();
				location.href=base_url+"escenas/showUpdateScene/"+$(this).attr("escena");
				event.preventDefault();
			})
		}
	});
});






/**
 * Responsibidad del mapa.
 */
$(window).resize(function() {
	mapa_responsivo();
});
function mapa_responsivo(){
	var anchura,altura,anchura_maxima,altura_maxima;
	var altura_natural = $("#zona" + piso + " > img").get(0).naturalHeight;
	var anchura_natural = $("#zona" + piso + " > img").get(0).naturalWidth;
	if ($("#mapa_escena").length){
		

		anchura_maxima = window.innerWidth * 0.70;
		altura_maxima = window.innerHeight*0.9;

		if (anchura_natural > altura_natural) {
			anchura = anchura_maxima
			altura = altura_natural * anchura / anchura_natural;
		
		} else {
			altura = altura_maxima
			anchura = anchura_natural * altura / altura_natural;
		}
		
		$("#mapa_escena").css({
			height: altura + 'px',
			width: anchura + 'px'
		});
	}
	if ($("#mapa_escena_hotspot").length){
		
		anchura = $("#mapa_escena_hotspot > #zona"+piso+" > img ").width();
		altura = $("#mapa_escena_hotspot > #zona"+piso+" > img ").height();		
	}	
}
	
/**
 * Subida y Bajada de piso.
 */
function subir_piso(){
	console.log(piso);
	if(piso<piso_maximo){
		$("#mapa_escena > .pisos:eq("+piso+")").hide('fast');
		$("#mapa_escena_hotspot > .pisos:eq("+piso+")").hide('fast');
		$("#mapa_guiada > .pisos:eq(" + piso + ")").hide('fast');
		$("#mapa_escena > .pisos-admin:eq(" + piso + ")").hide('fast');
		piso++;
		$("#mapa_escena > .pisos:eq("+piso+")").show('fast');
		$("#mapa_escena_hotspot > .pisos:eq("+piso+")").show('fast');	
		$("#mapa_guiada > .pisos:eq(" + piso + ")").show('fast');
		$("#mapa_escena > .pisos-admin:eq(" + piso + ")").show('fast');
	}
}

function bajar_piso(){
	if(piso>0){
		$("#mapa_escena > .pisos:eq("+piso+")").hide('fast');
		$("#mapa_escena_hotspot > .pisos:eq("+piso+")").hide('fast');	
		$("#mapa_guiada > .pisos:eq(" + piso + ")").hide('fast');
		$("#mapa_escena > .pisos-admin:eq(" + piso + ")").hide('fast');
		piso--;
		$("#mapa_escena > .pisos:eq("+piso+")").show('fast');
		$("#mapa_escena_hotspot > .pisos:eq("+piso+")").show('fast');	
		$("#mapa_guiada > .pisos:eq(" + piso + ")").show('fast');	
		$("#mapa_escena > .pisos-admin:eq(" + piso + ")").show('fast');
	}
}

/**
 * Administración mapa
 */



 
