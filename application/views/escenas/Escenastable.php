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
                    
                            $(".imagenes").contextmenu(function(event){
                    
                                event.preventDefault();
                                $(this).html("<i class='fa fa-eye' style='font-size:40px;'></i>");
                            
                            });
                     
                            function confirmation() {
                                    if(confirm("Realmente desea eliminar?"))
                                    {
                                        return true;
                                        <?php
                                        echo"<a href= '".site_url("/escenas/deletescene/".$escenas['id_escena'])"";
                                        ?>
                                    }
                                        return false;
                                    });
    </script>
                <style>
                    .oculto {display:none;}
                </style>

<button id="btn-mapa">Abrir mapa</button>

<div id="mapa_escena">
<button id="btn-bajar-piso">Bajar piso</button>
<button id="btn-subir-piso">Subir piso</button>
<?php
      $indice = 0;

       $pisos = array('0' => "sotano", '1' => "primer_piso", "2" => "segundo_piso", "3" => "tercer_piso", "4" => "tejado" );

      foreach ($mapa as $imagen) {
        if($pisos[$indice]=="primer_piso"){
          echo "<div id='p".$indice."' class='pisos' style='background-image: url(".base_url($imagen['url_img']).");'>";
        }else{
          echo "<div id='p".$indice."' class='pisos' style='background-image: url(".base_url($imagen['url_img']).");'>"; 
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
<br>
<br>

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
            
            <td align='center' class='borrar'>
            <i class='fa fa-trash' style='font-size:30px;'></i></td>
            
            <td align='center'>
            <a href= '".site_url("/escenas/showUpdateScene/".$escenas['cod_escena'])."'> <i class='fa fa-edit' style='font-size:30px;'></i> </a></td>
            </tr>";
?>
            <tr><th colspan='9' class="imagenes"><i class="fa fa-eye" style="font-size:40px;"></i></th></tr>
<?php
	}
	echo "</table>";
?>
      
