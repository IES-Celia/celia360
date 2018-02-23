<style>

	td img{
		width:200px;
		height:250px;
	}
	td{
		margin-right:15px;
		margin-left:15px;
	}
</style>
<?php 
	  echo "<div style='width:90%; margin:0 auto; ' "; 
            echo "<div class='' >"   ;    
            echo "<table style=''>";  
            echo "<tr>";  

 	$i = 0;
    foreach ($tabla as $ides){
      if($ides['tipo']==1){
        $i++;
       
                     
          echo "<td class=''>";
          echo "<a href='#' ><img id='verlibro' idlibro='".$ides['id_libro']."' apaisado='".$ides['apaisado']."' class='efectBook ocultar' src='".base_url("assets/imgs/books/$ides[id_libro]/0.jpg")."' ></a>";echo "<div style='text-align:center;background:black;color:white;margin-top:20px;height:65px;'>'".$ides['titulo']."'";
          echo "</td>";
      }
          if ($i%5 == 0)  echo "</tr><tr class=''>";
            }
            echo "</tr></table>";
  echo "</div>";
echo "</div>";

?>