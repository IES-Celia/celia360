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
	var fila = "#fila"+cod;
	if (resultado) {
		url = "<?php echo base_url('/escenas/deletesceneAjax/'); ?>" +cod;
		$.ajax(url)
		.done(function(data){
			if(data.trim() > 0){
				$('#error_cabecera').html('');
				$('#mensaje_cabecera').html("<div class='alert alert-success ' role='alert' ><h7 class='mr-2'>Escena eliminada con éxito</h7><i class='far fa-check-circle'></i></div>");
				$(fila).remove();
			}else{
				$('#error_cabecera').html("<div class='alert alert-danger ' role='alert' ><h7 class='mr-2'>Error al eliminar la escena</h7><i class='fas fa-exclamation-circle'></i></div>")
				$('#mensaje_cabecera').html('');
			}
		});		
	}
}
            
              
                            
</script>

<div class="container mt-5">

	<div class="row">
		<div class="col-md-8 col-xs-12">
            <div id="mapa_escena">
<?php
	  $indice = 0;


      foreach ($mapa as $imagen) {

            echo "<div id='zona".$indice."' class='pisos' style='display: none;'>";
			echo "<img class='img-fluid' src='".base_url($imagen['url_img'])."' alt='zona$indice'>";
			
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
				<span class='tooltipi'>Punto: ".$punto['id_punto_mapa']." - Escena: ".$nombre_punto."</span>
				</div>";
			  }else{

				echo "<div id='punto".$punto['id_punto_mapa']."' class='puntos' style='left: ".$punto['left_mapa']."%; top: ".$punto['top_mapa']."%;' escena='".$punto['id_escena']."'>
				<span class='tooltipi'>Punto: ".$punto['id_punto_mapa']." - Escena: ".$nombre_punto."</span>
				</div>";
			  }
			
              
            }
          }
		echo "</div>";
		
        $indice++;
	  }
?>
    </div>
</div>

<div class="col-md-4">
	<div class="card">
		<div class="card-body text-center">
		<?php
 if(count($mapa)==0){
     ?>
        <button class="botonmapa btn btn-primary m-3 w-75 text-center" id="btn-admin-mapa">Añadir mapa</button>
     <?php
 }else{
    ?>
        <div class="row">
            <div class="col-md-12">
                <button class="botonmapa btn btn-primary m-3 w-75 text-center" id="btn-subir-piso">Subir zona</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <button class="botonmapa btn btn-primary m-3 w-75 text-center" id="btn-bajar-piso">Bajar zona</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <button class="botonmapa btn btn-primary m-3 w-75 text-center" id="btn-admin-mapa">Admin mapa</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <button class="botonmapa btn btn-primary m-3 w-75 text-center" id="btn-admin-selector-zonas">Admin selector de zonas</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <button class="botonmapa btn btn-primary m-3 w-75 text-center" id="btn-show-pan-sec">Ver panoramas asociados</button>
            </div>
        </div>
		<div class="row">
            <div class="col-md-12">
                <button class="botonmapa btn btn-primary m-3 w-75 text-center" data-toggle="modal" data-target="#ascensorAdmin" id="btn-show-admin-ascensor">Admin Ascensor</button>
            </div>
        </div>

     <?php
 }

?>
		</div>
	</div>

</div>
</div> <!-- cierre .row -->

    <div class="row mt-3">
        <div class="col-md-12">
<?php
if(count($mapa)!=0){
	echo "<table class='table table-hover bg-secondary' id='cont'>";
	echo "<thead><tr id='cabecera'> 
		  <th> IdEscena</th>
		  <th>Previsualizar</th>
		  <th> Nombre del lugar </th>
		  <th> Codigo Escena </th>
		  <th> Pitch </th>
		  <th> Yaw </th>
		  <th> Eliminar </th>
		  <th> Modificar </th>
		  </tr></thead>";
	echo "<tfoot><tr id='cabecera'> 
		  <th> IdEscena</th>
		  <th>Previsualizar</th>
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
				<th>
				<div class='custom-hotspot-info' id='".$escenas['cod_escena']."'> 
					<span class='oculto'>".base_url($escenas['panorama'])."</span>
				</div>

				<div id='panorama-".$escenas['cod_escena']."' class='panoramas oculto'>
				</div>
				</th>
                <td align='center'>".$escenas['Nombre']."</td>
                <td align='center' class='cod'>".$escenas['cod_escena']."</td>
                <td align='center'>".$escenas['pitch']."</td>
                <td align='center'>".$escenas['yaw']."</td>

                <td align='center'>
                <a onclick='borrarscene(".$escenas["id_escena"].")'><img class='svg' src='". site_url('assets/imagenes/svg/trash.svg')."'></a>
                </td>

                <td align='center'>
                <a href= '".site_url("/escenas/showUpdateScene/".$escenas['cod_escena'])."'><img class='svg' src='". site_url('assets/imagenes/svg/edit.svg')."'></a></td>
                </tr>";
    ?>
    <?php
            }
        } // else
        echo "</tbody></table>";
    }
?>

        </div><!-- Final de col-->
    </div><!-- Final de row -->
</div><!-- Final de container -->

<div class="modal fade mt-5" id="ascensorAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Administrar Ascensor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
<div id="modalConfig">
    <div id="caja">
        <form action='<?php echo site_url("mapa/update_config"); ?>' method="post" enctype='multipart/form-data'>
            <?php
            if($configuracion!=null){
                
				?>
				
				<label for="piso">Piso inicial</label>
				<input type="number" class="form-control mb-1" name="piso_inicial" value="<?php echo $configuracion["piso_inicial"]; ?>" min="0" max="<?php $maxZonas=count($mapa); echo $maxZonas-1; ?>">
				
                <input type="hidden" name="punto_inicial" value="<?php echo $configuracion["punto_inicial"]; ?>">
                <input type="hidden" name="escena_inicial" value="<?php echo $configuracion["escena_inicial"]; ?>">
                <div id="mapa_config_mapa" >
            <?php
            }else{
				?>    
				<label for="piso_inicial1">Piso inicial</label>            
                <input type="number" class="form-control" name="piso_inicial" value="0" min="0" max="<?php $maxZonas=count($mapa); echo $maxZonas-1; ?>">
                <input type="hidden" name="punto_inicial">
                <input type="hidden" name="escena_inicial">
                <div id="mapa_config_mapa" >
                <?php
            }
                 $indice = 0;

                 foreach ($mapa as $imagen) {
                        echo "<div id='zona".$indice."' class='pisos pisos_config' style='display: none'>";
                    
                    echo "<img src='".base_url($imagen['url_img'])."' style='width:100%;'>";
                    foreach ($puntos as $punto) {
                        if($punto['piso']==$indice){
                            if($punto['id_escena'] == $config_ascensor[$indice]['escena_inicial']){
                                echo "<div id='punto".$punto['id_punto_mapa']."' class='punto_inicial' style='left: ".$punto['left_mapa']."%; top: ".$punto['top_mapa']."%;' escena='".$punto['id_escena']."'></div>";
                            }else{
                                echo "<div id='punto".$punto['id_punto_mapa']."' class='puntosAscensor' style='left: ".$punto['left_mapa']."%; top: ".$punto['top_mapa']."%;' escena='".$punto['id_escena']."'></div>";
                            }
                        }
                    }
                    echo "</div>";
                    $indice++;
                }
                
            ?>
            </div>
        </form>
    </div>
</div>
      </div>
    </div>
  </div>
</div>
<script>

$(document).ready(function() {
	$.fn.dataTable.ext.errMode = 'throw';
        $('#cont').dataTable({

    	"language": {
            "lengthMenu": "Mostrar _MENU_ registros por página",
            "zeroRecords": "No se encontraron resultados en su búsqueda",
            "searchPlaceholder": "Buscar registros",
            "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
            "infoEmpty": "No existen registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "search": "Buscar:",
            "paginate": {
	            "first":    "Primero",
	            "last":    "Último",
	            "next":    "Siguiente",
	            "previous": "Anterior"
	    },
        }
        });
    });

	$(document).ready(function(){
		$("#btn-show-pan-sec").click(function(){
			if ($('.puntos.tienePanoramas').css('background-color') == 'rgb(255, 255, 255)'){
				$('.puntos.tienePanoramas').css('background','red');
				$(this).css('background-color','#c38107');
			}else{
				$('.puntos.tienePanoramas').css('background','white');
				$('.puntos.tienePanoramas').css('color','rgb(0, 0, 0)');
				$(this).css('background-color','#DF691A');
			}
		});
	});
</script>

<script>

    $(document).ready(function(){
		$("#cont").on("click", ".custom-hotspot-info", function(){
            id = $(this).attr('id');
            img = $(this).find('span').text();

            pannellum.viewer('panorama-'+id, {
                "type": "equirectangular",
                "panorama": img,
                "autoLoad": true
            });
            $('#panorama-'+id).toggleClass('oculto');
        });

		$(document.body).on('click','.puntosAscensor', function(){
			id = $(this).attr('id');
			escena = $(this).attr('escena');
			zona = $(this).parent().attr('id');
			piso = $('input[name="piso_inicial"]').val();
			$('#'+zona+' .punto_inicial').removeClass('punto_inicial').addClass('puntosAscensor');
			$(this).removeClass('puntosAscensor').addClass('punto_inicial');

			base_url = "<?php echo base_url('mapa/updateAscensor'); ?>";

			$.ajax({
				type: "post",
				url: base_url,
				data: { piso: piso , escena: escena , punto: id },
				success:function(result){
					if(result == 1){
						$('#error_cabecera').html('');
						$("#mensaje_cabecera").html("<div class='alert alert-success ' role='alert' ><h7 class='mr-2'>Punto de entrada de ascensor modificado con éxito</h7><i class='far fa-check-circle'></i></div>");
					}else{
						$('#mensaje_cabecera').html('');
						$("#error_cabecera").html("<div class='alert alert-danger ' role='alert' ><h7 class='mr-2'>Error al modificar el punto de entrada del ascensor</h7><i class='fas fa-exclamation-circle'></i></div>");
					}
				}
			});

		});


    });


</script>


      
