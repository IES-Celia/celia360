<html>
    <head>
        <title>Upload Multiple Files in Codeigniter using Ajax JQuery</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" /> 
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> -->
       
    </head>
    <body>
    	 <style>
    	 .text
        	.mensaje_final{
        		background: #000000bd !important;
			    width: 625px;
			    height: auto;
			    font-size: 45px;
			    border-radius: 5px;
			    margin: 0 auto;
			    padding: 10px;
		}
        </style>
        <div class="container">
            <br /><br /><br />
            <h3 align="center">Subida múltiple de imagenes para un libro</h3><br />
            
            <div class="col-md-6" align="right">
                <label>Subida múltiple de imagenes para un libro</label>
            </div>
            <div class="col-md-6">
                <input type="file" name="files" id="files" multiple />
            </div>
            <div style="clear:both"></div>
                <br />
                <br />
            <div style="display:none;" id="uploaded_images"></div>
            <div style="padding:20px;" id="mensaje"></div>
           
        </div>
    </body>
</html>

<script>
    $(document).ready(function(){

        $('#files').change(function(){
        var files = $('#files')[0].files;
        var error = '';
        var form_data = new FormData();
        for(var count = 0; count<files.length; count++){
            var name = files[count].name;
            var extension = name.split('.').pop().toLowerCase();
            if(jQuery.inArray(extension, ['jpg','jpeg']) == -1){
                error += "Archivo con extensión no válida ( solo jpg) " + count + " Image File"
            }else{
                form_data.append("files[]", files[count]);
            }
        }
        if(error == ''){
            $.ajax({
                url:"<?php echo base_url(); ?>biblioteca/upload/<?php echo $id_libro?>", 
                method:"POST",
                data:form_data,
                contentType:false,
                cache:false,
                processData:false,
                beforeSend:function()
                {
                	$('#uploaded_images').html("<label class='text-success'>Subiendo archivos...</label>");
                	
                },
                success:function(data)
                {
	                $('#uploaded_images').html(data);
	                $('#files').val('');
                },
		        error : function(){
		          $('#uploaded_images').html("<label class='text-success'> Se ha producido un error en la subida de tus ficheros </label>");
		        },
		        complete : function() {
		        	
			        $('#mensaje').html("<div class='text-success' style='background: #000000bd !important;text-align:center;width: 625px;height: auto;font-size: 45px;border-radius: 5px; margin: 0 auto;padding: 10px;'>Subida de archivos finalizada <?php echo "<a style='font-size:15px !important;' href='".site_url("/biblioteca/showintadmin")."'>Volver a la administracion</a> "?></div>");
			    }
            })
        }
        else{
            alert(error);
        }
        });
    });
</script>