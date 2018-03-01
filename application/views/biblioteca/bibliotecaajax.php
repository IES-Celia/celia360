  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=MedievalSharp" rel="stylesheet">
  <script src="<?php echo base_url("assets/js/jquery.js"); ?>"></script>
   <link rel="stylesheet" href="<?php echo base_url("assets/css/ultimo-estilo.css"); ?>"/>
<script >
	$(document).ready(function(){

 $('.efectBook').click(function(){
        $('.modalita2').toggle('slow');
          idlibro = $(this).attr("idlibro");
          apaisado = $(this).attr("apaisado");
          tipo = $(this).attr("tipo");
          $('.modalita2').load('<?php echo site_url("biblioteca/ver_biblioteca_ajax/");?>'+parseInt(idlibro)+'/'+apaisado+'/'+tipo);
      });
 $('#cerrarmodal').click(function(){
        $('.modalita2').css({display:"none"});
        $('.modalita').css({display:"block"});
      });

      $(document).keyup(function(e) {
          if (e.keyCode == 27) { // escape key maps to keycode `27`
            $('.modalita2').css({display:"none"});
          }
      });


	}); 
</script>

<style>


	td img{
		width:200px;
		height:250px;
	}
	td{
		margin-right:15px;
		margin-left:15px;
	}
	.tablatodo{
		width:200px !important;
		height:200px !important;
		padding:30px;
	}
	.headerbiblioteca{
		width:100%;
		height:115px;
		color:white;
		background:#000000d9;
	}
	.headerbiblioteca h1{
		width: 90%;
    	padding: 20px;
    	height:54px;
	}
	table{
		margin-top:30px;
	}
	.iniciologo{
		width:90px;
		height:110px;
		margin-left:30px;
		margin-top:-110px;
	}
	body{
		
	}
	#contenedorbiblioteca{
		background:url('../assets/imagenes/portada/portada5.jpg');
		 background-size: cover;
		width:100%;
		height:auto;
		
	}

</style>
<body>
	<div id="contenedorbiblioteca">
<?php 
	  echo "<div id='' style='width:100%; margin:0 auto;'"; 
            echo "<div class='headerbiblioteca' >"   ;   
            echo "<h1 style='text-align:center;'>BIBLIOTECA IES CELIA VIÑAS</h1>"; 
            echo "<img class='iniciologo' src='".base_url("assets/imagenes/portada/logo.png")."' >";
            echo "</div>";
            echo "<table style=''>";  
            echo "<tr>";  

		 	$i = 0;
		    foreach ($tabla as $ides){
		      if($ides['tipo']==0){
		        $i++;
		       
		                     
		          echo "<td class='tablatodo'>";
		          echo "<a href='#' ><img id='verlibro' idlibro='".$ides['id_libro']."' apaisado='".$ides['apaisado']."' tipo='".$ides['tipo']."' class='efectBook ocultar' src='".base_url("assets/imgs/books/$ides[id_libro]/0.jpg")."' ></a>";echo "<div style='text-align:center;background:#1a76a2;color:white;margin-top:20px;height:50px;padding:10px;'>'".$ides['titulo']."'";
		          echo "</td>";
		      }
		          if ($i%5 == 0)  echo "</tr><tr class=''>";
		            }
		            echo "</tr></table>";
		  
		echo "</div>";

?>

<div class="modalita2" style="display: none;" >
      <div class="contenido2" style="width:1000px;background-color:white;margin:0 auto;margin-top:40px;">
        <div class="cabecera-ventana" style="background-color:white;height:60px;">
          <h1 style="text-align:center;border-bottom:1px solid black;">Titulo Libro</h1>
        </div>
        <div class="cuerpo-ventana" id="cuerpo-ventana" style="margin-top:-100px;margin-bottom:100px; padding: 3%;margin-top: 80px;">
         
        </div>
        <div class="pie-ventana2" style="border-top:1px solid black;border-radius:5px; height:50px;padding:18px;">
          <a href="#" id="cerrarmodal" class="btn-2" style="float:right;">Cerrar</a>

        </div>
    </div>
  </div>
 </div>
</body>