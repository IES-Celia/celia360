<?php 
/*
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * Video visita libre
 */
/*if ( ! function_exists('video'))
{
    ?>
<script>
function video(hotspotDiv,args){
  $.ajax({
    type: "post",
    url: "<?php echo site_url('hotspots/load_video'); ?>",
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
      else
        $('#modal_video').fadeIn();
    }).fail(function(){
      console.log("Error en carga de video ;)")
    });

} // function video()
</script>
<?php 
}*/
?>