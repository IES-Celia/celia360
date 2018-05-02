
$( ".slider" ).on( "mouseup",function() {
  	$("#modal").show();
	$("#foto").attr("src",$(this).attr('src'));
});

$( ".slider1" ).on( "mouseup",function() {
  	$("#modal").show();
	$("#foto").attr("src",$(this).attr('src'));
});

$("#novena").ready(function() {
$("#colorado").mouseup(function() {

	$("#colorado").css('background-color','red');

})
});

function cerrar() {
	$("#modal").hide();
}

$("#primera").parent().one('mouseup',function() {
  if($("#segunda").parent().css("z-index") != 0){
		
		$("#tinta1").delay(500).animate({
			opacity: "1"
		},1500);
		$("#tinta2").delay(800).animate({
			opacity: "1"
		},2000);
		$("#tinta3").delay(1000).animate({
			opacity: "1"
		},2000);
		$("#tinta4").delay(1200).animate({
			opacity: "1"
		},3000);
		
		
   }
  
});

$("#tercera").parent().mouseup(function() {
  if($("#cuarta").parent().parent().css("z-index") != 0){
		 // $(".marco").animate({
		 // width: '80%',
  		 // height: '60%'
  			// left: '10%',
  			// top: '20%'
		// },4000);
		$('.title1').delay(7000).animate({
			opacity: "1"
		},2000);
		$('.title1').textillate();
  }
  
});

var sliderIndex = 1;
mostrar(sliderIndex);

function pasar(n) {
  mostrar(sliderIndex += n);
}

function cambio(n) {
  mostrar(sliderIndex = n);
}

function mostrar(n) {
  var i;
  var x = document.getElementsByClassName("slider");
  var dots = document.getElementsByClassName("circulo");
  if (n > x.length) {sliderIndex = 1}    
  if (n < 1) {sliderIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }
   for (i = 0; i < dots.length; i++) {
     dots[i].className = dots[i].className.replace("relleno", "");
   }
  x[sliderIndex-1].style.display = "block";  
 	
  dots[sliderIndex-1].className += " relleno";

}

var Index = 0;
seguido();

function seguido() {
   	var i;
    var z= document.getElementsByClassName("carrusel");
    for (i = 0; i < z.length; i++) {
      z[i].style.display = "none"; 
    }
    Index++;
    if (Index > z.length) {Index = 1} 
    z[Index-1].style.display = "block"; 
    setTimeout(seguido, 2000); // Change image every 2 seconds

}

// $('#fuente').hover( function() {
	// $(this).find('img').attr("src",'img/fuente2.jpg');
// });


