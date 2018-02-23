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
</style>
<?php 
	  echo "<div style='width:100%; margin:0 auto; ' "; 
	  echo "<div>";
            echo "<div class='headerbiblioteca' >"   ;   
            	echo "<h1 style='text-align:center;'>BIBLIOTECA IES CELIA VIÑAS</h1>"; 
            	echo "<img class='iniciologo' src='".base_url("assets/imagenes/portada/logo.png")."' >";
            echo "</div>";	
            echo "<table style=''>";  
            echo "<tr>";  

		 	$i = 0;
		    foreach ($tabla as $ides){
		      if($ides['tipo']==1){
		        $i++;
		       
		                     
		          echo "<td class='tablatodo'>";
		          echo "<a href='#' ><img id='verlibro' idlibro='".$ides['id_libro']."' apaisado='".$ides['apaisado']."' class='efectBook ocultar' src='".base_url("assets/imgs/books/$ides[id_libro]/0.jpg")."' ></a>";echo "<div style='text-align:center;background:#1a76a2;color:white;margin-top:20px;height:50px;padding:10px;'>'".$ides['titulo']."'";
		          echo "</td>";
		      }
		          if ($i%5 == 0)  echo "</tr><tr class=''>";
		            }
		            echo "</tr></table>";
		  echo "</div>";
		echo "</div>";

?>