//alert("la base url es: "+baseurl);
// buena suerte, promoción 18/19

/*
 * Video visita libre
 */

function video(hotspotDiv,args){
  $.ajax({
    type: "post",
    url: baseurl+"hotspots/load_video",
    data: {idVideo : args},
    beforeSend: function(){
      $("#vimeo_video").attr("src","");
    }
  }).done(function(resultado){
      console.log(resultado);
      $("#vimeo_video").attr("src",resultado);
      var pantalleo = $("#modal_video").css("display");
      if(pantalleo=="block")
        $('#modal_video').hide();
        //PAUSE
      else
        $('#modal_video').fadeIn();
    }).fail(function(){
      console.log("Error en cargar el video")
    });

} // function video()

/*
 * Ajax audio visita libre
 */
function musica(hotspotDiv,args){
  var peticion = $.ajax({
  type: "post",
  url: baseurl+"hotspots/load_audio",
  data: {id_hotspot : args}
});

peticion.done(function(resultado){
  var enlace_audio = resultado;
  enlace_audio=enlace_audio.trim(enlace_audio);
  var enlace_audio_correcto = baseurl+enlace_audio;
  $("#audio_libre").attr("src",enlace_audio_correcto);
  var pantalleo = $("#panel_audio_libre").css("display");
  $("#audio_libre")[0].play();
  if(pantalleo=="block")
    $('#panel_audio_libre').hide();
  else
    $('#panel_audio_libre').show();
});
} // fin function musica()
