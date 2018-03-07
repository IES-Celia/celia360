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
            alert(enlace)
            $(this).html("<img src='"+enlace+"' width='1250' height='470' align='center'>");
        });
                    

        $(".imagenes").contextmenu(function(event){             
            event.preventDefault();
            $(this).html("<i class='fa fa-eye' style='font-size:40px;'></i>");
        });
        
           
    });
    
     function borrarscene(cod) {
                resultado = confirm("¿Esta seguro?");
                if (resultado) {
                    $.get("<?php echo base_url('/escenas/deletesceneajax/'); ?>" + cod, null, respuesta);
                }
            }
    
    function respuesta(r) {
        r = r.trim();
        if (r==" ") alert("Ha ocurrido algún error al borrar la escena.");
        else {
            selector = "#fila" + r;
            $(selector).next().remove();
            $(selector).remove();
        }
        
    }
                     
                            
</script>


<div id="mapa_escena">
<?php
      $indice = 0;

       $pisos = array('0' => "sotano", '1' => "primer_piso", "2" => "segundo_piso", "3" => "tercer_piso", "4" => "tejado" );

      foreach ($mapa as $imagen) {
          echo "<div id='p".$indice."' class='pisos' style='display: none; background-image: url(".base_url($imagen['url_img']).");'>";
        
        
          foreach ($puntos as $punto) {
            if($punto['piso']==$indice){
            
              echo "<div id='".$punto['nombre']."' class='puntos' style='left: ".$punto['left_mapa']."%; top: ".$punto['top_mapa']."%;' escena='".$punto['id_escena']."'>
              <span class='tooltip'>".$punto['id_escena']."</span>
              </div>";
            
            }
            
          }
        echo "</div>";
        $indice++;
      }
?>
</div>
<div class="botones_mapa">
    <button id="btn-bajar-piso">Bajar piso</button>
    <button id="btn-subir-piso">Subir piso</button>
    <button id="btn-admin-mapa">Admin mapa</button>
</div>
<br>
<br>

<?php

	echo "<table align='center' id='cont'>";
	echo "<tr id='cabecera'> 
		  <th> IdEscena</th>
		  <th> Nombre del lugar </th>
		  <th> Codigo Escena </th>
		  <th> Pitch </th>
		  <th> Yaw </th>
		  <th> Eliminar </th>
		  <th> Modificar </th>
		  </tr>";
	
	foreach ($tablaEscenas as $escenas){
		
        $id=$escenas["id_escena"];
        $cod=$escenas["cod_escena"];
		echo "<tr id='fila".$cod."'>
            
            <td align='center'>". $escenas['id_escena']."</td>
            <td align='center'>".$escenas['Nombre']."</td>
            <td align='center' class='cod'>".$escenas['cod_escena']."</td>
            <td align='center'>".$escenas['pitch']."</td>
            <td align='center'>".$escenas['yaw']."</td>
            
            <td align='center'>
            <a onclick='borrarscene(\"".$escenas["cod_escena"]."\")'><i class='fa fa-trash' style='font-size:30px;'></i></a>
            </td>
            
            <td align='center'>
            <a href= '".site_url("/escenas/showUpdateScene/".$escenas['cod_escena'])."'> <i class='fa fa-edit' style='font-size:30px;'></i> </a></td>
            </tr>";
?>
            <tr><th colspan='7' class="imagenes"><i class="fa fa-eye" style="font-size:40px;"></i></th></tr>
<?php
	}
	echo "</table>";
?>
      
