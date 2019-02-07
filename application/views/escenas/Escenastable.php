 <link rel='stylesheet' href=https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css>
<?php 
	if (isset($datos["error"])) {
			echo "<p style='color:red'>".$datos["error"]."</p>";
	}
	
	if (isset($datos["mensaje"])) {
		echo "<p style='color:blue'>".$datos["mensaje"]."</p>";
	}
	
?>

<script type="text/javascript">
  base_url = "<?php echo base_url();?>";
    
    $(document).ready(function(){                   
        
        $(".imagenes").click(function(){
            var enlace = base_url+"assets/imagenes/escenas/"+$(this).parent().prev().find(".cod").text()+".JPG";
            $(this).html("<img src='"+enlace+"' width='1250' height='470' align='center'>");
        });
                    

        $(".imagenes").contextmenu(function(event){             
            event.preventDefault();
            $(this).html("<i class='fa fa-eye' style='font-size:40px;'></i>");
        });
        
        $("#btn-admin-selector-zonas").click(function(){
		    location.href = base_url+"zonas/"
	    })
           
    });
    
/**
 * Esta función se ejecuta al pulsar el boton "Papelera" (borrar) de una escena de la tabla.
 * Lanza el borrado en el servidor mediante Ajax.
 * @param {String} cod Código de la escena que se va a borrar.
 **/    
function borrarscene(cod) {
                resultado = confirm("¿Está seguro de que quiere borrar esta escena?\n\nCUIDADO: esta acción no se puede deshacer.");
                if (resultado) {
                    $.get("<?php echo base_url('/escenas/deletesceneajax/'); ?>" + cod, null, respuesta);
                }
            }
    
/**
 * Esta función procesa la respuesta del borrado por Ajax de la escena.
 * @param {String} cod Código de la escena que se va a borrar.
 **/
function respuesta(r) {
        r = r.trim();
        if (r==" ") {
            document.getElementById("mensajemenu").innerHTML = "<span id='error_cabecera'>Ha ocurrido un error al borrar la escena</span>";
        }
        else {
            document.getElementById("mensajemenu").innerHTML = "<span id='mensaje_cabecera'>Escena borrada con éxito.</span>";
            selector = "#fila" + r;
            $(selector).next().remove();
            $(selector).remove();
        }
        
    }
                     
                            
</script>


<div id="mapa_escena">
<?php
	  $indice = 0;


      foreach ($mapa as $imagen) {

            echo "<div id='zona".$indice."' class='pisos' style='display: none;'>";
			echo "<img src='".base_url($imagen['url_img'])."' alt='zona$indice' style='width:100%;height:100%;'>";
			
          foreach ($puntos as $punto) {

            if($punto['piso']==$indice){

			  $nombre_punto = $punto["id_escena"];
			  $salida = false;
			  foreach ($escenas_secundarias as $pan_sec){
				if($pan_sec['id_punto_mapa'] == $punto['id_punto_mapa']){
					$salida = true;
				}
			  }
			  
			  if($salida){
				echo "<div id='punto".$punto['id_punto_mapa']."' class='puntos tienePanoramas' style='left: ".$punto['left_mapa']."%; top: ".$punto['top_mapa']."%;' escena='".$punto['id_escena']."'>
				<span class='tooltip'>".$punto['id_punto_mapa']." - ".$nombre_punto."</span>
				</div>";
			  }else{

				echo "<div id='punto".$punto['id_punto_mapa']."' class='puntos' style='left: ".$punto['left_mapa']."%; top: ".$punto['top_mapa']."%;' escena='".$punto['id_escena']."'>
				<span class='tooltip'>".$punto['id_punto_mapa']." - ".$nombre_punto."</span>
				</div>";
			  }
			
              
            }
          }
        echo "</div>";
        $indice++;
	  }
?>
</div>
<?php
 if(count($mapa)==0){
     ?>
    <div class="botones_mapa">
        <button class="botonmapa" id="btn-admin-mapa">Añadir mapa</button>
    </div>
     <?php
 }else{
    ?>
    <div class="botones_mapa">
        <button class="botonmapa" id="btn-subir-piso">Subir zona</button>
        <button class="botonmapa" id="btn-bajar-piso">Bajar zona</button>
        <button class="botonmapa" id="btn-admin-mapa">Admin mapa</button>
		<button class="botonmapa" id="btn-admin-selector-zonas">Admin selector de zonas</button>
		<button class="botonmapa" id="btn-show-pan-sec">Ver panoramas asociados</button>
    </div>
     <?php
 }

?>
<br>
<br>

<?php
if(count($mapa)!=0){
	echo "<table align='center' class='display' id='cont'>";
	echo "<thead><tr id='cabecera'> 
		  <th> IdEscena</th>
		  <th> Nombre del lugar </th>
		  <th> Codigo Escena </th>
		  <th> Pitch </th>
		  <th> Yaw </th>
		  <th> Eliminar </th>
		  <th> Modificar </th>
		  </tr></thead>";
	echo "<tfoot><tr id='cabecera'> 
		  <th> IdEscena</th>
		  <th> Nombre del lugar </th>
		  <th> Codigo Escena </th>
		  <th> Pitch </th>
		  <th> Yaw </th>
		  <th> Eliminar </th>
		  <th> Modificar </th>
		  </tr></tfoot><tbody>";
	
        if (count($tablaEscenas) == 0) {
            echo "<tr><td align='center' colspan='7'>No hay registros para mostrar.</td></tr>";
        }
        else {

            foreach ($tablaEscenas as $escenas){

            $id=$escenas["id_escena"];
            $cod=$escenas["cod_escena"];
                    echo "<tr id='fila".$cod."'>

                <td align='center'>".$escenas['id_escena']."</td>
                <td align='center'>".$escenas['Nombre']."</td>
                <td align='center' class='cod'>".$escenas['cod_escena']."</td>
                <td align='center'>".$escenas['pitch']."</td>
                <td align='center'>".$escenas['yaw']."</td>

                <td align='center'>
                <a onclick='borrarscene(".$escenas["id_escena"].")'><i class='fa fa-trash' style='font-size:30px;'></i></a>
                </td>

                <td align='center'>
                <a href= '".site_url("/escenas/showUpdateScene/".$escenas['cod_escena'])."'> <i class='fa fa-edit' style='font-size:30px;'></i> </a></td>
                </tr>";
    ?>
               <tr><th colspan='7' class="imagenes"><i class="fa fa-eye" style="font-size:40px;"></i></th></tr>
    <?php
            }
        } // else
        echo "</tbody></table>";
    }
?>

<script>
	$(document).ready(function(){
		$("#btn-show-pan-sec").click(function(){
			if ($('.puntos.tienePanoramas').css('color') == 'rgb(0, 0, 0)'){
				$('.puntos.tienePanoramas').css('color','gray');
				$('.puntos.tienePanoramas').css('background','red');
				$(this).css('background-color','rgba(0,0,0,0.8)');
			}else{
				$('.puntos.tienePanoramas').css('background','white');
				$('.puntos.tienePanoramas').css('color','rgb(0, 0, 0)');
				$(this).css('background-color','rgba(0,0,0,0.2)');
			}
		});
	});
</script>
      
