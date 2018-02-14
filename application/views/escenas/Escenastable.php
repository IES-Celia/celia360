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
                    
                 $(document).ready(function(){
                     
                            $(".imagenes").click(function(){
                                
                                var enlace = "assets/imagenes/escenas/"+$(this).parent().prev().find(".cod").text()+".JPG"
                                $(this).html("<img src='"+enlace+"' width='1250' height='470' align='center'>");
                            
                            });
                    
                            $(".imagenes").contextmenu(function(){
                    
                                event.preventDefault();
                                $(this).html("<i class='fa fa-eye' style='font-size:40px;'></i>");
                            
                            });
                 });
                    
                
                    
                
                </script>
                <style>
                    .oculto {display:none;}
                </style>

<?php

    echo"<a class='insert' href='".site_url("escenas/showinsert")."'> Insertar Nueva Escena </a>";
	echo "<table align='center' id='cont'>";
	echo "<tr> 
		  <th> IdEscena</th>
		  <th> Nombre del lugar </th>
		  <th> Codigo Escena </th>
		  <th> hfov </th> 
		  <th> Pitch </th>
		  <th> Yaw </th>
		  <th> Tipo </th>
		  <th> Eliminar </th>
		  <th> Modificar </th>
		  </tr>";
	
	foreach ($tablaEscenas as $escenas){
		
		echo "<tr>
            
            <td align='center'>". $escenas['id_escena']."</td>
            <td align='center'>".$escenas['Nombre']."</td>
            <td align='center' class='cod'>".$escenas['cod_escena']."</td>
            <td align='center'>".$escenas['hfov']." </td>
            <td align='center'>".$escenas['pitch']."</td>
            <td align='center'>".$escenas['yaw']."</td>
            <td align='center'>".$escenas['tipo']."</td>
            
            <td align='center'>
            <a href= '".site_url("/escenas/deletescene/".$escenas['id_escena'])."'> <i class='fa fa-trash-alt' style='font-size:30px;'></i> </a></td>
            
            <td align='center'>
            <a href= '".site_url("/escenas/showUpdateScene/".$escenas['cod_escena'])."'> <i class='fa fa-edit' style='font-size:30px;'></i> </a></td>
            </tr>";
?>
            <tr><th colspan='9' class="imagenes"><i class="fa fa-eye" style="font-size:40px;"></i></th></tr>
<?php
	}
	echo "</table>";
?>
    <div id="mapa" style="width: 45%; bottom: 10px;" class="cerrado">
<?php
      $indice = 0;

       $pisos = array('0' => "sotano", '1' => "primer_piso", "2" => "segundo_piso", "3" => "tercer_piso", "4" => "tejado" );

      foreach ($mapa as $imagen) {
        if($pisos[$indice]=="primer_piso"){
          echo "<div id='".$pisos[$indice]."' class='piso_abierto pisos' style='background-image: url(".base_url($imagen['url_img']).");'>";
        }else{
          echo "<div id='".$pisos[$indice]."' class='piso_cerrado pisos' style='background-image: url(".base_url($imagen['url_img']).");'>"; 
        }
        
          foreach ($puntos as $punto) {
            if($punto['piso']==$indice){
            
                echo "<a href='".site_url('welcome/cargar_escena/'.$punto['id_escena'].'')."'><div id='".$punto['nombre']."' class='puntos' style='left: ".$punto['left']."%; top: ".$punto['top']."%;' onclick='puntosMapa(\"".$punto['nombre']."\");'></div></a>";
              
              
            }
            
          }
        echo "</div>";
        $indice++;
      }
?>
</div>
      <div id="boton_mapa" style="transition: left 0.5s ease 0s;left:0.5%;" class="cerrado_boton boton" onclick="mover(document.getElementById('mapa')); mover(document.getElementById('boton_mapa'));mover(document.getElementById('subir_piso')); mover(document.getElementById('bajar_piso'));"></div>

        <div id="subir_piso" style="transition: left 0.5s ease 0s;left:0.5%; visibility:hidden;" class="cerrado_boton boton" onclick="cambiar_piso(10)"></div>

        <div id="bajar_piso" style="transition: left 0.5s ease 0s;left:0.5%; visibility:hidden;" class="cerrado_boton boton" onclick="cambiar_piso(-10); this.style"></div>
      
