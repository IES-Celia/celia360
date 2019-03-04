<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=MedievalSharp" rel="stylesheet">
  <script>
      
    $(document).ready(function(){
      $('#open').click(function(){
        $('.modalita').toggle('slow');
        
      });
      
      $('.pie-ventana').click(function(){
        $('.modalita').css({display:"none"});
      });

      $('.efectBook').click(function(){
        $('.modalita2').toggle('slow');
          idlibro = $(this).attr("idlibro");
          apaisado = $(this).attr("apaisado");
          $('.modalita2').load('biblioteca/verLibroAjax/'+idlibro+'/'+apaisado);
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
  

#portadaLibros{
  width:20%;
  float:left;
}
#portadaLibros img{
   width: 90%;
    height: 350px;
}

</style>




<!-- VENTANA MODAL PARA SACAR LIBROS HISTORIA -->

    <div class="modalita" style="display: none;">
      <div class="contenido" style="background:url('assets/css/textura.jpg');width:600px;margin:0 auto;margin-top:40px;border-radius:15px;">
        <div class="cabecera-ventana" style="background:url('assets/css/textura.jpg');height:60px;border-radius:15px;">
          <h1 style="font-family: 'MedievalSharp', cursive; text-align:center;border-bottom:1px solid grey;color:black;font-size:55px;padding:10px;">I.E.S. Celia Viñas</h1>
        </div>
        <div class="pared" >
        <div class="cuerpo-ventana fondo" style="margin-top:19px;height:450px; ">
            <?php

                    
                    echo "<div class='estanteria' >"; 
                      echo "<div class='nuevecica'  >"   ;    
                        echo "<table >";  
                        echo "<tr>";

                        $i = 0;
                        foreach ($libros as $ides){
                          if($ides['tipo']==1){
                            $i++;
                            //Sacamos las portadas de los libros
                            
                              echo "<td class='columna'>";
                              echo "<a href='#' ><img id='verlibro' idlibro='".$ides['id_libro']."' apaisado='".$ides['apaisado']."' class='efectBook ocultar' src='".base_url("assets/imgs/books/$ides[id_libro]/0.jpg")."' ></a>";
                              echo "</td>";
                          }
                              if ($i%4 == 0)  echo "</tr><tr class='torre'>";
                                }
                                echo "</tr></table>";
                      echo "</div>";
                    echo "</div>";
        ?>
        </div>
        </div>
        <div class="pie-ventana" style="border-top:1px solid grey;border-radius:5px; height:50px;padding:18px;">
          <a href="#" class="btn-2" style="float:right;">Cerrar</a>
        </div>
    </div>
  </div>

            <!-- VENTANA BIBLIOTECA  AJAX -->

  <!-- VENTANA MODAL PARA SACAR LIBRO -->
      <div class="modalita2" style="display: none;" >
      <div class="contenido2" style="width:1000px;background-color:white;margin:0 auto;margin-top:40px;">
        <div class="cabecera-ventana" style="background-color:white;height:60px;">
          <h1 style="text-align:center;border-bottom:1px solid black;">Titulo Libro</h1>
        </div>
        <div class="cuerpo-ventana" id="cuerpo-ventana" style="margin-top:-100px;margin-bottom:100px; padding: 3%;margin-top: 80px;">
         
        </div>
        <div class="pie-ventana23" style="border-top:1px solid black;border-radius:5px; height:50px;padding:18px;">
          <a href="#" id="cerrarmodal" class="btn-2" style="float:right;">Cerrar</a>

        </div>
    </div>
  </div>
