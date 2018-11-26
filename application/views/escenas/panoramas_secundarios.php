<div id="drop_file_zone" ondrop="upload_file(event)" ondragover="return false">
        <div id="drag_upload_file">
            <p>Arrastra los archivos</p>
            <p>o</p>
            <p><input type="button" class="btn btn-primary" value="Selecciona archivos" onclick="file_explorer();"></p>
            <div id="imagenesView">

            </div>
            <p><button id="btnEnvio" class="btn btn-primary">Enviar</button></p>
            <input type="file" id="selectfile" name="imagenes[]" multiple>
        </div>
    </div>

    <script>
        var fileobj;
    function upload_file(e) {
        e.preventDefault();
          for(i=0;i<e.dataTransfer.files.length;i++){
            fileobj = e.dataTransfer.files[i];
            previewfile(fileobj);
            ajax_file_upload(fileobj);
          }
        }

 
    function file_explorer() {
        document.getElementById('selectfile').click();
        itemPadre = document.getElementById("drag_upload_file");
        document.getElementById('selectfile').onchange = function() {
          for(i=0;i<document.getElementById('selectfile').files.length;i++){
            fileobj = document.getElementById('selectfile').files[i];
            fileobj.name = i+".jpg"
            previewfile(fileobj);
            ajax_file_upload(fileobj);
          }
        };
    }
    var contador = 1;
    function previewfile(file) {
        var reader = new FileReader();
        reader.onload = function (event) {
          var image = new Image();
          var inputName = document.createElement("input");
          var label = document.createElement("label");
          var label2 = document.createElement("label");
          var fecna = document.createElement("input");
          fecna.setAttribute("type",'date');
          fecna.setAttribute('name','fecha'+contador);
          var contentLabel = document.createTextNode("Título de imágen "+contador+": ");
          var contentLabelFecna = document.createTextNode("Fecha de imágen "+contador+": ");
          label.setAttribute("for","nombre"+contador);
          label.appendChild(contentLabel);
          label2.setAttribute("for","fecha"+contador);
          label2.appendChild(contentLabelFecna);
          inputName.setAttribute("type","text");
          inputName.setAttribute("name","nombre"+contador);
          contador++;
          image.src = event.target.result;
          image.width = 250; // a fake resize
          image.height = 250;
          document.getElementById("imagenesView").appendChild(label);
          document.getElementById("imagenesView").appendChild(inputName);
          document.getElementById("imagenesView").appendChild(label2);
          document.getElementById("imagenesView").appendChild(fecna);
          document.getElementById("imagenesView").appendChild(image);
        };
        reader.readAsDataURL(file);
      }
 
    function ajax_file_upload(file_obj) {
      document.getElementById("btnEnvio").addEventListener('click',function(){
        if(file_obj != undefined) {
            var form_data = new FormData();                  
            form_data.append('file', file_obj);
            $.ajax({
                type: 'POST',
                url: '<?php base_url("Escenas/insertSecondaryPanorama") ?>',
                contentType: false,
                processData: false,
                data: form_data
            });
        }
      });
    }
    </script>