<div id="drop_file_zone" ondrop="upload_file(event)" ondragover="return false">
        <div id="drag_upload_file">
        <?php 
         if(isset($resultado))
             echo "<h1>". $resultado."</h1>"; 

         ?>
            <p>Arrastra los archivos</p>
            <p>o</p>
            <p><input type="button" class="btn btn-primary" value="Selecciona archivos" onclick="file_explorer();"></p>
            <div id="imagenesView">

            </div>

            <input type="file" id="selectfile" name="file[]" multiple accept="image/jpeg">
            <p><button id="btnEnvio" class="btn btn-primary" type="button">Subir imágenes</button></p>
           
        </div>
    </div>

    <script>

    var fileobj = [];
    function upload_file(e) {
        e.preventDefault();
          for(i=0;i<e.dataTransfer.files.length;i++){
            fileobj.push(e.dataTransfer.files[i]);
          }
          previewfile(fileobj);
          ajax_file_upload(fileobj);
        }

 
    function file_explorer() {
        document.getElementById('selectfile').click();
        itemPadre = document.getElementById("drag_upload_file");
        document.getElementById('selectfile').onchange = function() {

          for(i=0;i<document.getElementById('selectfile').files.length;i++){
            fileobj.push(document.getElementById('selectfile').files[i]);
          }
          previewfile(fileobj);
          ajax_file_upload(fileobj);
        };
    }
    var contador = 1;
    var acumulable = 0;

    function previewfile(file) {
      for(i = 0;i<file.length;i++){
        if(file[i].name.includes("jpg")){
          var reader = new FileReader();
          reader.onload = function (event) {
						var image = new Image();
						image.setAttribute("class","imagenesDragDrop");
            var inputName = document.createElement("input");
            var label = document.createElement("label");
            var label2 = document.createElement("label");
            var fecna = document.createElement("input");
            fecna.setAttribute("type",'date');
            fecna.setAttribute('name','fecha'+contador);
            fecna.setAttribute("id","fecha"+contador);
            var contentLabel = document.createTextNode("Título de imágen "+contador+": ");
            var contentLabelFecna = document.createTextNode("Fecha de imágen "+contador+": ");
            label.setAttribute("for","nombre"+contador);
            label.appendChild(contentLabel);
            label2.setAttribute("for","fecha"+contador);
            label2.appendChild(contentLabelFecna);
            inputName.setAttribute("type","text");
            inputName.setAttribute("name","nombre"+contador);
            inputName.setAttribute("id","nombre"+contador);
            contador++;
            image.src = event.target.result;
            image.width = 250; // a fake resize
            image.height = 250;
            document.getElementById("imagenesView").appendChild(label);
            document.getElementById("imagenesView").appendChild(inputName);
            document.getElementById("imagenesView").appendChild(label2);
            document.getElementById("imagenesView").appendChild(fecna);
            document.getElementById("imagenesView").appendChild(image);
            acumulable++;
          }
          reader.readAsDataURL(file[i]);
        }

        
      }
    }
 
    function ajax_file_upload(file_obj) {
      document.getElementById("btnEnvio").addEventListener('click',function(){
            var form_data = new FormData();
            for(var i = 0;i<file_obj.length;i++){                 
              form_data.append('file[]', file_obj[i]);
            }

            for(var j = 1;j<=acumulable;j++){
              form_data.append('nombre'+j,document.getElementById("nombre"+j).value);
              form_data.append('fecha'+j,document.getElementById("fecha"+j).value);
            }
            var myNode = document.getElementById("imagenesView");
            while (myNode.firstChild) {
                myNode.removeChild(myNode.firstChild);
            }
            $.ajax({
                type: 'POST',
                url: '<?php echo site_url('Panoramas_Secundarios/insertSecondaryPanorama/'.$datos_escena[0]['id_escena']); ?>',
                contentType: false,
                processData: false,
                data: form_data,
                success:function(result){
                  console.log(result);

                  if(result == 0){
                    document.getElementById("mensaje_cabecera").innerHTML = "Imágenes subidas con éxito";
                   
                  }else{
                    document.getElementById("error_cabecera").innerHTML = "Error al insertar todas las imágenes";
                   
                  }
                }
            });
        });
        fileobj = [];
        contador = 1;
        acumulable = 0;
        form_data = "";
    }

    
    </script>
