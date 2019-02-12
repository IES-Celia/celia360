<html>
	<head>
	<style type="text/css">

.button {
    background-color: #555555; /* Black	*/
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
	
	}
	
div.centrado {
	margin-left:25%;
	margin-right:25%;
	
}


    #caja6{
        transform: translate(-50%, -42%);
       
        }
        
    #caja6 a{
        max-width: 580px !important;
        width: 580px !important;
    }
        


        .button{
            width: 580px !important;
            border: 3px solid white;
		}
		
		.blanco {
			color:white;
		}

</style>
		<title> Modificar </title>
</head>
<body>

<?php

$tabla = $tabla[0];
echo "

<h1 class='blanco'> Formulario para UPDATE HotspotsPanel </h1>

<fieldset id='caja6'>

<form action=' ".site_url("hotspots/process_update_hotspot/".$escena_inicial.'/'.$tipo_update)." ' method='get'>

	Coordenadas donde se situa el punto:<br> 
    <a class='link' href='".site_url('escenas/cargar_escena_modificar/'.$codigo_escena.'/'."update_hotspot_pitchyaw/".$tabla['id_hotspot'])."'>Modificarlos</a><br><br>
    
	Título panel:<br> <input style='margin-top:5px;' type='text' value='".$tabla['titulo_panel']."' name='titulo_panel'> </br> </br>
    Texto panel: <input type='hidden' id='texto_panel' value='' name='texto_panel'> </br> </br>
	<div id='editor'>
		".$tabla['texto_panel']."
	</div>
	<input type='hidden' name='id_hotspot' value='".$tabla['id_hotspot']."'>
    <input type='hidden' name='cssClass' value='".$tabla['cssClass']."'>
    <input type='hidden' name='pitch' value='".$tabla['pitch']."'>
    <input type='hidden' name='yaw' value='".$tabla['yaw']."'>
    
	
    <input type='submit' class='button'>
	<br>
    <a href=
    '".site_url("/hotspots/delete_hotspot/".$tabla['id_hotspot']."/".$tipo_update)."'
    class='rojo_borrar link' >BORRAR ESTE HOTSPOT (CUIDADO!)</a></td>
	
</form>
<form action=' ".site_url("hotspots/modify_panel_info/".$tabla['id_hotspot'].'/'.$tipo_update.'/'.$escena_inicial)." ' method='post'>
<input type='hidden' name='id_scene' value='".$codigo_escena."'>
<input type='submit' class='button' value='Modificar imagenes de este hotspot'>
</form>
</fieldset>

"; /**  Cierre echo **/

?>

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
