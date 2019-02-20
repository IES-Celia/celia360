
<div class="container">
    <h1 class="text-center">Subida múltiple de imagenes</h1>
    <div class="row">
        <div class="col-md-7 mx-auto bg-secondary text-center">
            <div class="form-group">
              <label for="files"><h4 class="tex-center">Subida múltiple de imagenes para un libro</h4></label>
              <input type="file" class="form-control-file text-center" name="files" id="files" placeholder="" aria-describedby="fileHelpId" multiple>
            </div>
            <div class="row mb-3">
                <div class="col-md-12">
                    <input name="" id="enviar_f" class="btn btn-primary float-right" type="button" value="Enviar">
                </div>
            </div>
        </div>
    </div>
</div>
<div id="uploaded_images"></div>
<div style="padding:20px;" id="mensaje"></div>
           
<script>

	var enviando = 0;

    $(document).ready(function(){

        $('#enviar_f').click(function(){
        var files = $('#files')[0].files;
        var error = '';
        for(var count = 0; count<files.length; count++){
            var name = files[count].name;
            var extension = name.split('.').pop().toLowerCase();
            if(jQuery.inArray(extension, ['jpg','jpeg']) == -1){
                error += "Archivo con extensión no válida ( solo jpg) " + count + " Image File"
            }else{
            	//while (enviando == 1) {}
	            var form_data = new FormData();
	            form_data.append("files", files[count]);
	            //enviando = 1;
	            $('#uploaded_images').append("Subiendo imagen " + name + "...<br>");
	            enviar_fichero_por_ajax(form_data, name);
	            sleep(1000);
	            
            }
			$('#mensaje').html("<div class='text-success' style='background: #000000bd !important;text-align:center;width: 625px;height: auto;font-size: 45px;border-radius: 5px; margin: 0 auto;padding: 10px;'>Subida de archivos finalizada <?php echo "<a style='font-size:15px !important;' href='".site_url("/biblioteca/showintadmin")."'>Volver a la administracion</a> "?></div>");
        }
    });

    function enviar_fichero_por_ajax(form_data, name) {
            $.ajax({
                url:"<?php echo base_url(); ?>biblioteca/upload/<?php echo $id_libro?>", 
                method:"POST",
                data:form_data,
                contentType:false,
                cache:false,
                processData:false,
                beforeSend:function()
                {
                	$('#uploaded_images').html("<label class='text-success'>Subiendo archivo " + name + "...</label>");
                	
                },
		        error : function(){
		        	alert("ERROR");
		          $('#uploaded_images').html("<label class='text-success'> Se ha producido un error en la subida de tus ficheros </label>");
		        }
		       }).done(function( data ) {
	                $('#uploaded_images').html(data);
	                $('#files').val('');
	                //enviando = 0;
                })

     
   		 }
 
    });

    function sleep(milliseconds) {
	  var start = new Date().getTime();
	  for (var i = 0; i < 1e7; i++) {
	    if ((new Date().getTime() - start) > milliseconds){
	      break;
	    }
	  }
	}
</script>