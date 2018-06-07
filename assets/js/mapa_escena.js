var id;
var piso = 0;


$(document).ready(function() {
	/**
	 * Funcionamiento básico del mapa 
	 */
	
		$(".pisos").hide();
		$("#mapa_escena > .pisos:eq(" + piso + ")").show();
		$(".pisos:eq(" + piso + ")").show();
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
			console.log("Hello || altura : " + altura + " |tipo anchura: " + typeof (anchura) + " |anchura: " + anchura+" |piso"+piso)
		} else {
			altura = altura_maxima
			anchura = anchura_natural * altura / altura_natural;
		}
		console.log("altura natural : " + altura_natural + " |anchura natural: " + anchura_natural + " |piso" + piso)
		$("#mapa_escena").css({
			height: altura + 'px',
			width: anchura + 'px'
		});
	}
	if ($("#mapa_escena_hotspot").length){
		
		anchura = $("#mapa_escena_hotspot > #zona"+piso+" > img ").width();
		altura = $("#mapa_escena_hotspot > #zona"+piso+" > img ").height();;
		console.log(anchura+"|"+altura)

		/*$("#mapa_escena_hotspot").css({
			height: altura + 'px',
			width: anchura + 'px'
		});*/
	}

	/*
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
	 */
	
	
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
		piso++;
		$("#mapa_escena > .pisos:eq("+piso+")").show('fast');
		$("#mapa_escena_hotspot > .pisos:eq("+piso+")").show('fast');	
		$("#mapa_guiada > .pisos:eq(" + piso + ")").show('fast');
	}
}

function bajar_piso(){
	if(piso>0){
		$("#mapa_escena > .pisos:eq("+piso+")").hide('fast');
		$("#mapa_escena_hotspot > .pisos:eq("+piso+")").hide('fast');	
		$("#mapa_guiada > .pisos:eq(" + piso + ")").hide('fast');
		piso--;
		$("#mapa_escena > .pisos:eq("+piso+")").show('fast');
		$("#mapa_escena_hotspot > .pisos:eq("+piso+")").show('fast');	
		$("#mapa_guiada > .pisos:eq(" + piso + ")").show('fast');	
	}
}

/**
 * Administración mapa
 */



 
