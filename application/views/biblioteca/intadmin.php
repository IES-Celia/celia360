 <link rel='stylesheet' href=https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css>
    

    <style type="text/css">
           
        label{
        
            margin-left: 10px;
        
        }
        
        #caja input[type=text]{
            
            width:70%;            
        }
        
        .img-cerrar{
         
            width: 20px; height: 20px;
        }
 
        .cerrar{
            
            position:relative;
            top:-428px;
            left:45%;
        }
        
        .cerrar1{
            position:relative;
            top:-388px;
            left:45%;
        }
        .cerrarBorrar{
            position:relative;
            top:-192px;
            left:47%;
        }
    </style>
    <div>
        <?php

          
            echo"<a class='insert' onclick='mostrar()' > <i class='fas fa-plus-circle'></i> Insertar Libro</a>"; 
            echo "<table id='cont' class='display' style='margin-top:10px;'>";
                    echo "<thead><tr id='cabecera'>
                            <th>Id</th>
                            <th>Titulo</th>
                            <th>Autor</th>
                            <th>Editorial</th>
                            <th>Lugar de edicion</th>
                            <th>Fecha de edicion</th>
                            <th>ISBN</th>
                            <th>Tipo</th>
                            <th>Apaisado</th>
                            <th>Modificar</th>
                            <th>Páginas</th>
                            <th>Eliminar</th>
                            <th>Subir</th>
                            
                           </tr></thead>";


               
                /*echo "<a href='index.php?accion=showinsertlibro'><i class='fa fa-plus' aria-hidden='true'></i><i title='Insertar libro' class='fa fa-book' aria-hidden='true'></i></a>";*/
                foreach ($tabla as $usu) {
                    $id = $usu['id_libro'];
                    echo "<tr id='libro".$id."'>
                            <td >".$usu["id_libro"]."</td>
                            <td id='titulo_libro_".$id."'>".$usu["titulo"]."</td>
                            <td id='autor_libro_".$id."'>".$usu["autor"]."</td>
                            <td id='editorial_libro_".$id."'>".$usu["editorial"]."</td>
                            <td id='lugar_edicion_".$id."'>".$usu["lugar_edicion"]."</td>
                            <td id='fecha_edicion_".$id."'>".$usu["fecha_edicion"]."</td>
                            <td id='isbn_libro_".$id."'>".$usu["ISBN"]."</td>";
                            if($usu["tipo"]==0){
                                echo "<td>Biblioteca</td>";
                              }else{
                                echo "<td>Historia</td>";
                              }
                              if($usu["apaisado"]==0){
                                echo "<td>Normal</td>";
                              }else{
                                echo "<td>Apaisado</td>";
                              }                            
                            echo" <td>
                            <a onclick='mostrarm(".$usu['id_libro'].")'> <i class='fa fa-edit' style='font-size:20px;'></i></a>
                            <td><a href='".site_url("/biblioteca/showinsertimg/".$usu["id_libro"])."'><i class='fas fa-file-alt' style='font-size:20px;'></i></a></td>
                            <td><a href='#' onclick='mostrarborrar(".$usu['id_libro'].")'><i title='Eliminar' class='fa fa-trash' aria-hidden='true'></i></a></td>
                            <td><a href='".site_url("/biblioteca/showsubida/".$usu["id_libro"])."'><i class='fas fa-file-alt' style='font-size:20px;'></i></a></td>
                            

                           </tr>";
                }
                echo "</table>";

                //Modal confirmacion eliminar libro
                echo"<div id='eliminarLibro'>
                      <div id='caja'>
                          <h1>Procede a eliminar el libro: <span id='idlibroborrar' ></span> </h1>
                          <form action='".site_url("biblioteca/deletelibro")."' method='get'>

                          <label>¿Desea eliminar el directorio que contiene las imagenes?</label>
                            <select name = 'bcarpeta'>
                              <option value='0'selected>No</option>
                              <option value='1'>Si</option>
                            </select>
                            <span class='highlight'></span>
                            <span class='bar'></span>

                            <input id='borrar_id_libro' type='hidden' name='id_libro'>
                            <input class='boton' type='submit' value='Eliminar'>
                          </form>

                        <a class='cerrarBorrar' href='#' onclick='cerrar()'><img class='img-cerrar' src='" .
                        base_url("assets/css/cerrar_icon.png") . "'></img></a>
                      </div>
                    </div>";
                //MODAL MODIFICAR LIBROS
                echo "<div id='modificar'>";
                echo "<div id='caja'>";
                    echo "
                    <h1>Modificar Libro</h1>
                        <div >
                            <form id='xxx' action='".site_url("biblioteca/modifiedLibro/")."' method='get'>
                                <div class='group'>      
                                  <input type='text' name='titulo' id='modif_titulo'  required>
                                  <span class='highlight'></span>
                                  <span class='bar'></span>
                                  <label>Titulo</label>
                                </div>
                                <div class='group'>      
                                  <input type='text' name='autor' id='modif_autor' required>
                                  <span class='highlight'></span>
                                  <span class='bar'></span>
                                  <label>Autor</label>
                                </div>
                                <div class='group'>      
                                  <input type='text' name='editorial' id='modif_editorial' required>
                                  <span class='highlight'></span>
                                  <span class='bar'></span>
                                  <label>Editorial</label>
                                </div>
                                <div class='group'>      
                                  <input type='text' name='lugar_edicion' id='modif_lugar_edicion' required>
                                  <span class='highlight'></span>
                                  <span class='bar'></span>
                                  <label>Lugar de Edición</label>
                                </div>
                                <div class='group'>      
                                  <input type='date' name='fecha_edicion' id='modif_fecha_edicion' required>
                                  <span class='highlight'></span>
                                  <span class='bar'></span>
                                  <label>Fecha de Edicion</label>
                                </div>
                                <div class='group'>      
                                  <input type='text' name='ISBN' id='modif_isbn' >
                                  <span class='highlight'></span>
                                  <span class='bar'></span>
                                  <label>I S B N </label>
                                </div>";

                                if($usu["tipo"]==0){
                                  echo"
                                  <div class='group'>      
                                    <select name='tipo'>
                                      <option value='0'selected>Biblioteca</option>
                                      <option value='1'>Historia</option>
                                    </select>
                                    <span class='highlight'></span>
                                    <span class='bar'></span>
                                    <label>Tipo</label>
                                  </div>";
                                }else{
                                  echo"
                                  <div class='group'>      
                                    <select name='tipo'>
                                      <option value='0'>Biblioteca</option>
                                      <option value='1'selected>Historia</option>
                                    </select>
                                    <span class='highlight'></span>
                                    <span class='bar'></span>
                                    <label>Tipo</label>
                                  </div>";
                                }
                                if ($usu["apaisado"]==0) {
                                   echo"
                                  <div class='group'>      
                                    <select name='apaisado'>
                                      <option value='0' selected>No</option>
                                      <option value='1'>Si</option>
                                    </select>
                                    <span class='highlight'></span>
                                    <span class='bar'></span>
                                    <label>Apaisado</label>
                                  </div>";
                                }else{
                                    echo"
                                    <div class='group'>      
                                      <select name='apaisado'>
                                        <option value='0'>No</option>
                                        <option value='1' selected>Si</option>
                                      </select>
                                      <span class='highlight'></span>
                                      <span class='bar'></span>
                                      <label>Apaisado</label>
                                    </div>";
                                  }
                                echo"
                            <input type='hidden' id='modif_id_libro' name='id_libro'>
                            <input type='submit' class='enviar'>
                        </form>
                        <a class='cerrar1' href='#' onclick='cerrar()'><img class='img-cerrar' src='" .
                        base_url("assets/css/cerrar_icon.png") . "'></img></a>
                    </div> ";
                 echo "</div>";
                 echo "</div>";


                 //MODAL INSERTAR LIBROS

                 echo "<div id='insertar'>";
                 echo "<div id='caja'>";
                 echo"

                    <h1>Insertar libro</h1>
                    <div >
                        <form action='".site_url("biblioteca/insertlibro")."' method='get'>
                            <div class='group'>      
                              <input type='text' name='titulo' required>
                              <span class='highlight'></span>
                              <span class='bar'></span>
                              <label>Titulo</label>
                            </div>
                            <div class='group'>      
                              <input type='text' name='autor' required>
                              <span class='highlight'></span>
                              <span class='bar'></span>
                              <label>Autor</label>
                            </div>
                            <div class='group'>      
                              <input type='text' name='editorial' required>
                              <span class='highlight'></span>
                              <span class='bar'></span>
                              <label>Editorial</label>
                            </div>
                            <div class='group'>      
                              <input type='text' name='lugar' required>
                              <span class='highlight'></span>
                              <span class='bar'></span>
                              <label>Lugar de Edición</label>
                            </div>
                            <div class='group'>      
                              <input type='date' name='fecha' value='Fecha de Edición' required>
                              <span class='highlight'></span>
                              <span class='bar'></span>
                              <label>Fecha de Edición</label>
                            </div>
                            <div class='group'>      
                              <input type='text' name='isbn' required>
                              <span class='highlight'></span>
                              <span class='bar'></span>
                              <label>I S B N </label>
                            </div>
                            <div class='group'>      
                              <select name='tipo'>
                                <option value='0' selected>Biblioteca</options>
                                <option value='1'>Historia</options>
                              </select>
                              <span class='highlight'></span>
                              <span class='bar'></span>
                              <label>Tipo</label>
                            </div>
                            <div class='group'>      
                              <select name='apaisado'>
                                <option value='0'selected >No</options>
                                <option value='1' >Si</options>
                              </select>
                              <span class='highlight'></span>
                              <span class='bar'></span>
                              <label>Apaisado</label>
                            </div>

                           <br/><br/>
                            <input class='boton' type='submit'>
                        </form>
                        <a class='cerrar' href='#' onclick='cerrar()'><img class='img-cerrar' src='" .
                        base_url("assets/css/cerrar_icon.png") . "'></img></a>
                    </div>
                ";
                 echo "</div>";
                 echo "</div>";

    ?>

     <script >


            function respuesta(r){
                if(r==0){
                    alert("Error");
                }else{
                    selector = "#libro"+parseInt(r);
                    $(selector).remove();
                }
            }

            function mostrarm(id_libro){
                titulo = document.getElementById("titulo_libro_"+id_libro).innerHTML;
                autor = document.getElementById("autor_libro_"+id_libro).innerHTML;
                editorial = document.getElementById("editorial_libro_"+id_libro).innerHTML;
                lugar_edicion = document.getElementById("lugar_edicion_"+id_libro).innerHTML;
                fecha_edicion = document.getElementById("fecha_edicion_"+id_libro).innerHTML;
                isbn = document.getElementById("isbn_libro_"+id_libro).innerHTML;
                pasar_id=id_libro;

                $("#modif_titulo").val(titulo);
                $("#modif_autor").val(autor);
                $("#modif_editorial").val(editorial);
                $("#modif_lugar_edicion").val(lugar_edicion);
                $("#modif_fecha_edicion").val(fecha_edicion);
                $("#modif_isbn").val(isbn);
                $("#modif_id_libro").val(pasar_id);

                $("#modificar").show();
            }

            function mostrarborrar(id_libro){

                b_idlibro=id_libro;
                $("#borrar_id_libro").val(b_idlibro);
                $("#idlibroborrar").text(b_idlibro);

                $("#eliminarLibro").show();
            }

            function borrarlibro(){
                id_libro=$("borrar_id_libro").val();
                alert(id_libro);
                confirmacion=confirm("¿Estas seguro que desea borrar el libro?");

                if(confirmacion==true)
                  $.get("<?php echo base_url('biblioteca/deletelibro/');?>"+id_libro,null,respuesta);

            }

            function mostrar(){
                $("#insertar").show();
                
            }

            function alertid(id_libro){
               alert("EL nombre de la carpeta que contenga el libro debera ser: "+id_libro);
            }
            function cerrar(){
              
                $("#insertar").hide();
                $("#modificar").hide();
                $("#eliminarLibro").hide();

            }  

            $(document).ready(function() {
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
            } );
        
    </script>

</div>




