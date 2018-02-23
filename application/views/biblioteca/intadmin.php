<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel='stylesheet' href=https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />

    <style type="text/css">
            #modificar{
                display:none;
                z-index: 1;
                position: fixed;
                top: 10%;
                left: 30%;
                width: 600px;
                height: 660px;
                background-color: #ffffff;
                border: 3px solid ;
            }

            #insertar{
                display:none;
                z-index: 1;
                position: fixed;
                top: 10%;
                left: 30%;
                width: 600px;
                height: 580px;
                background-color: #ffffff;
                border: 3px solid ;
            }

            .file-input {
              visibility: hidden;
              width: 0;
              float: left;
            }
            .file-input::before {
              content: 'Insertar paginas';
              display: inline-block;
              background: -webkit-linear-gradient(top, #f9f9f9, #e3e3e3);
              border: 1px solid #999;
              border-radius: 3px;
              padding: 5px 8px;
              outline: none;
              white-space: nowrap;
              -webkit-user-select: none;
              cursor: pointer;
              text-shadow: 1px 1px #fff;
              font-weight: 700;
              font-size: 10pt;
              visibility: visible;
              position: absolute;
            }
            .file-input:hover::before {
              border-color: black;
            }
            .file-input:active::before {
              background: -webkit-linear-gradient(top, #e3e3e3, #f9f9f9);
            }
            .enviar{
                top: 1500px;
            }

    </style>
</head>
<body>
    <div>
        <?php
            echo "<table id='contenido'>";
                    echo "<tr>
                            <th>Id</th>
                            <th>Titulo</th>
                            <th>Autor</th>
                            <th>Editorial</th>
                            <th>Lugar de edicion</th>
                            <th>Fecha de edicion</th>
                            <th>ISBN</th>
                            <th>Tipo</th>
                            <th>Apaisado</th>
                            <td colspan='3'><a onclick='mostrar()'><i class='fa fa-plus' aria-hidden='true'></i><i title='Insertar libro' class='fa fa-book' aria-hidden='true'></i></a></td>
                           </tr>";


               
                /*echo "<a href='index.php?accion=showinsertlibro'><i class='fa fa-plus' aria-hidden='true'></i><i title='Insertar libro' class='fa fa-book' aria-hidden='true'></i></a>";*/
                foreach ($tabla as $usu) {
                    echo "<tr id='libro".$usu['id_libro']."'>
                            <td>".$usu["id_libro"]."</td>
                            <td>".$usu["titulo"]."</td>
                            <td>".$usu["autor"]."</td>
                            <td>".$usu["editorial"]."</td>
                            <td>".$usu["lugar_edicion"]."</td>
                            <td>".$usu["fecha_edicion"]."</td>
                            <td>".$usu["ISBN"]."</td>
                            <td>".$usu["tipo"]."</td>
                            <td>".$usu["apaisado"]."</td>
                            <td></td>
                            <td>
                            <a onclick='mostrarm()'> <i title='Modificar' class='fa fa-pencil-square-o' aria-hidden='true'></i></a>
                            <td><a href='".site_url("/biblioteca/showinsertimg/".$usu["id_libro"])."'><i title='Insertar Páginas' class='fa fa-file-image-o' aria-hidden='true'></i></a></td>
                            <td><a href='#' onClick='borrarlibro(".$usu['id_libro'].")'><i title='Eliminar' class='fa fa-trash' aria-hidden='true'></i></a></td>
                            <td><a href=".site_url("/biblioteca/verLibro/".$usu["id_libro"])."'>Ver libro</a></td>

                           </tr>";
                }
                echo "</table>";

                //MODAL MODIFICAR LIBROS

                echo "<div id='modificar'>";
                    echo "
                    <h1>Modificar Libro</h1>
                        <div >
                            <form action='".site_url("biblioteca/modifiedLibro/".$libros[0]['id_libro'])."' method='get'>
                                <div class='group'>      
                                  <input type='text' name='titulo' value='".$libros[0]['titulo']."' required>
                                  <span class='highlight'></span>
                                  <span class='bar'></span>
                                  <label>Titulo</label>
                                </div>
                                <div class='group'>      
                                  <input type='text' name='autor' value='".$libros[0]['autor']."' required>
                                  <span class='highlight'></span>
                                  <span class='bar'></span>
                                  <label>Autor</label>
                                </div>
                                <div class='group'>      
                                  <input type='text' name='editorial' value='".$libros[0]['editorial']."' required>
                                  <span class='highlight'></span>
                                  <span class='bar'></span>
                                  <label>Editorial</label>
                                </div>
                                <div class='group'>      
                                  <input type='text' name='lugar_edicion' value='".$libros[0]['lugar_edicion']."' required>
                                  <span class='highlight'></span>
                                  <span class='bar'></span>
                                  <label>Lugar de Edición</label>
                                </div>
                                <div class='group'>      
                                  <input type='date' name='fecha_edicion' value='".$libros[0]['fecha_edicion']."' required>
                                  <span class='highlight'></span>
                                  <span class='bar'></span>
                                  <label>Fecha de Edicion</label>
                                </div>
                                <div class='group'>      
                                  <input type='text' name='ISBN' value='".$libros[0]['ISBN']."' >
                                  <span class='highlight'></span>
                                  <span class='bar'></span>
                                  <label>I S B N </label>
                                </div>
                                <div class='group'>      
                                  <input type='text' name='tipo' value='".$libros[0]['tipo']."' pattern='[0-1]{1}' maxlength='1' required>
                                  <span class='highlight'></span>
                                  <span class='bar'></span>
                                  <label>Tipo</label>
                                </div>
                                <div class='group'>      
                                  <input type='text' name='apaisado' value='".$libros[0]['apaisado']."' required>
                                  <span class='highlight'></span>
                                  <span class='bar'></span>
                                  <label>Apaisado</label>
                                </div>
                            
                            <input type='submit' class='enviar'>
                        </form>
                        <a href='#' onclick='cerrar()'>Cerrar</a>
                    </div> ";
                 echo "</div>";


                 //MODAL INSERTAR LIBROS

                 echo "<div id='insertar'>";
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
                              <input type='text' name='tipo' pattern='[0-1]{1}' min='1' maxlength='1' required>
                              <span class='highlight'></span>
                              <span class='bar'></span>
                              <label>Tipo</label>
                            </div>
                            <div class='group'>      
                              <input type='text' name='apaisado' pattern='[0-1]{1}' min='1' maxlength='1' required>
                              <span class='highlight'></span>
                              <span class='bar'></span>
                              <label>Apaisado</label>
                            </div>

                            <input type='file' class='file-input' name='fichero' accept='image/jpg'  id='input' multiple='true' onchange='handleFiles(this.files)'/><br/><br/>
                            <input class='boton' type='submit'>
                        </form>
                        <a href='#' onclick='cerrar()'>Cerrar</a>
                    </div>
                ";
                 echo "</div>";

    ?>

     <script >
            function borrarlibro(id_libro){
                confirmacion=confirm("¿Estas seguro que desea borrar el libro?");

                if(confirmacion==true)
                  $.get("<?php echo base_url('biblioteca/deletelibro/');?>"+id_libro,null,respuesta);

            }

            function respuesta(r){
                if(r==0){
                    alert("Error");
                }else{
                    selector = "#libro"+parseInt(r);
                    $(selector).remove();
                }
            }
            function mostrarm(){
                $("#modificar").show();
            }

            function mostrar(){
                $("#insertar").show();
                
            }

            function cerrar(){
                $("#insertar").hide();
                $("#modificar").hide();
            }  
        
    </script>

</div>

</body>
</html>



