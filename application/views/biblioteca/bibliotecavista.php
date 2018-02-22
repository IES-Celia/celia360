<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div>
		<?php 
		echo "<div class='nuevecica'  >"   ;    
            echo "<table >";  
            echo "<tr>";

            $i = 0;
            foreach ($libros as $ides){
              $i++;
              //Sacamos las portadas de los libros
              
                echo "<td class='columna'>";
                echo "<a href='#' ><img id='verlibro' idlibro='".$ides['id_libro']."' apaisado='".$ides['apaisado']."' class='efectBook ocultar' src='".base_url("assets/imgs/books/$ides[id_libro]/0.jpg")."' ></a>";
                echo "</td>";
                  if ($i%4 == 0)  echo "</tr><tr class='torre'>";
                    }
                    echo "</tr></table>";
          echo "</div>";
		?>
	</div>
</body>
</html>