var id;
var piso = 1;

/*=============================
=            ready            =
=============================*/
$(document).ready(function() {
	mapa_responsivo();
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

   	/*===========================================
   	=            Inserción de puntos            =
   	===========================================*/
   	
   	$(".pisos").contextmenu(function(event){
   		

   		var id = $(this).children().last().children().attr('id')

   		var prefijo = parseInt(id.split("punto")[1]) + 1;
   		
   		id = $(this).attr('id')+"punto"+prefijo;
   		
   		

   		var izquierda = $(this).offset();
   		var anchura = $(this).width()
   		var altura = $(this).height()
   		var left = event.pageX-izquierda.left;
   		left = (100*left)/anchura
   		var top = event.pageY-izquierda.top;
   		top = (100*top)/altura
   		location.href=base_url+"escenas/showinsert/"+id+"/"+left.toFixed(2)+"/"+top.toFixed(2);


   		event.preventDefault();
   		

   		
   	})
   	
   	/*=====  End of Inserción de puntos  ======*/
   	

    
});

/*=====  End of ready  ======*/




/*==============================================
=            responsividad del mapa            =
==============================================*/
$(window).resize(function() {
    mapa_responsivo()
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
	
	
/*=====  End of responsividad del mapa  ======*/
	

/*===============================================
=            Subida y bajada de piso            =
===============================================*/
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


/*=====  End of Subida y bajada de piso  ======*/


function punto_mapa(identificador) {
	$("#puntoEscena > form > input[name=sceneId]").val(identificador);
}
