  <div class="container mt-2">
		  <div class="row">
			  <div class="col-md-12">
				  <h1 class="text-center">Modificación de panel de información</h1>
			  </div>
		  </div>
		  <div class="row">

		<div class="col-md-12">

		  <div class="card">
			  <div class="card-body">
				  <div class="col-md-12">

				  
				  <?php
$tabla = $tabla[0];
echo "

<form action=' ".site_url("hotspots/process_update_hotspot/".$escena_inicial.'/'.$tipo_update)." ' method='get'>

<div class='form-group'>
  	<label for='coords'>Coordenadas donde se situa el punto</label>
	<a class='link btn btn-primary' href='".site_url('escenas/cargar_escena_modificar/'.$codigo_escena.'/'."update_hotspot_pitchyaw/".$tabla['id_hotspot'])."'>Modificarlos</a>
</div>

  <div class='form-group'>
  <label for='title'>Título panel</label>
	 <input class='form-control' type='text' value='".$tabla['titulo_panel']."' name='titulo_panel'>
  </div>
	 
  <div class='form-group'>
	  <label for='text'>Texto panel</label>
	  <input type='hidden' id='texto_panel' value='' name='texto_panel'>
	  <div id='editor'>
		".$tabla['texto_panel']."
	</div>
  </div>

     
	
	<input type='hidden' name='id_hotspot' value='".$tabla['id_hotspot']."'>
    <input type='hidden' name='cssClass' value='".$tabla['cssClass']."'>
    <input type='hidden' name='pitch' value='".$tabla['pitch']."'>
    <input type='hidden' name='yaw' value='".$tabla['yaw']."'>
    
	<div class='form-group'>
	<input type='submit' class='button btn btn-success'>
	<a href=
    '".site_url("/hotspots/delete_hotspot/".$tabla['id_hotspot']."/".$tipo_update)."'
    class='rojo_borrar btn btn-danger link' >BORRAR ESTE HOTSPOT (CUIDADO!)</a>
	</div>

	<div class='form-group'>
	
	</div>
	
	
</form>
<form action=' ".site_url("hotspots/modify_panel_info/".$tabla['id_hotspot'].'/'.$tipo_update.'/'.$escena_inicial)." ' method='post'>
<input type='hidden' name='id_scene' value='".$codigo_escena."'>
<div class='form-group'><input type='submit' class='button btn btn-info' value='Modificar imagenes de este hotspot'></div>

</form>

"; /**  Cierre echo **/

?>
				  </div>
			  </div>
		  </div>

		  </div>
	  </div>
	</div>

	<script>
        var quill = new Quill('#editor', {
            modules: {
        toolbar: [
           ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
           ['blockquote', 'code-block', 'link'],

           [{ 'header': 1 }, { 'header': 2 }],               // custom button values
           [{ 'list': 'ordered'}, { 'list': 'bullet' }],
           [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
           [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
           [{ 'direction': 'rtl' }],                         // text direction

           [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
           [{ 'font': [] }],
           [{ 'align': [] }],

           ['clean']                                         // remove formatting button
       ]
    },
  theme: 'snow'
});

        Quill.prototype.getHtml = function() {
            return this.container.firstChild.innerHTML;
        };

		window.addEventListener("load", function(event) {
    		document.getElementById('texto_panel').value = quill.getHtml();
  		});

        quill.on('text-change',function(a,b,c){
            document.getElementById('texto_panel').value = quill.getHtml();
        });

	  </script>
