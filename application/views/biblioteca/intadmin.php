
    

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

    <script>
	<?php
	    //echo "var tabla_json = '".json_encode($tabla)."';";
	?>
	    var tabla_json = '[{"id_libro":"5","titulo":"Apuntes para una historia del Instituto Celia Viñas de Almera","autor":"D.Trino Gomez Ruiz","editorial":"I.E.S Celia Viñs","lugar_edicion":"Almeria","fecha_edicion":"2013-10-01","ISBN":"565989","tipo":"1","apaisado":"0"},{"id_libro":"6","titulo":"Nacimiento y primeros pasos de un edificio: el I.E.S Celia Viñas","autor":"D.Jose Luis Ruz Marquez","editorial":"I.E.S Celia Viñas","lugar_edicion":"Almeria","fecha_edicion":"2000-10-08","ISBN":"0","tipo":"1","apaisado":"0"},{"id_libro":"7","titulo":"Gramática elemental de la lengua castellana","autor":"D.Hilario del Olmo Minguez","editorial":"almeria","lugar_edicion":"Almeríaa","fecha_edicion":"1808-05-01","ISBN":"2","tipo":"1","apaisado":"0"},{"id_libro":"8","titulo":"Sumario de psicología","autor":"D.Agustín Arredondo Garcíaa","editorial":"a","lugar_edicion":"Valladolid","fecha_edicion":"2018-01-14","ISBN":"46","tipo":"1","apaisado":"0"},{"id_libro":"9","titulo":"El esplendor de Almería en el siglo XI","autor":"E. Castro Guisola","editorial":"Caja Rural Intermediterránea, Cajama.","lugar_edicion":"Almeria","fecha_edicion":"2018-01-28","ISBN":"8495531186","tipo":"1","apaisado":"1"},{"id_libro":"10","titulo":"Exposición y critica de la doctrina transformista","autor":"Agustin Arredondo","editorial":"D. Mariano Alvares y Robles","lugar_edicion":"Almería","fecha_edicion":"2018-01-05","ISBN":"7","tipo":"1","apaisado":"0"}]';

		var tabla = JSON.parse(tabla_json);
	    var id_columna = 'titulo';


	    function ordenarCampo(campo) {
	        id_columna = campo;
	        tabla.sort(ordenacion);
	        html = "<table id='contenido'><tr><th>Id<a href='#' onClick='ordenarCampo(\"id_libro\")'><i title='Ordenar' class='fa fa-trash' aria-hidden='true'></i></a></th><th>Titulo<a href='#' onClick='ordenarCampo(\"titulo\")'><i title='Ordenar' class='fa fa-trash' aria-hidden='true'></i></a></th><th>Autor<a href='#' onClick='ordenarCampo(\"autor\")'><i title='Ordenar' class='fa fa-trash' aria-hidden='true'></i></a></th><th>Editorial<a href='#' onClick='ordenarCampo(\"editorial\")'><i title='Ordenar' class='fa fa-trash' aria-hidden='true'></i></a></th><th>Lugar de edicion<a href='#' onClick='ordenarCampo(\"lugar_edicion\")'><i title='Ordenar' class='fa fa-trash' aria-hidden='true'></i></a></th><th>Fecha de edicion<a href='#' onClick='ordenarCampo(\"fecha_edicion\")'><i title='Ordenar' class='fa fa-trash' aria-hidden='true'></i></a></th><th>ISBN<a href='#' onClick='ordenarCampo(\"ISBN\")'><i title='Ordenar' class='fa fa-trash' aria-hidden='true'></i></a></th><th>Tipo<a href='#' onClick='ordenarCampo(\"tipo\")'><i title='Ordenar' class='fa fa-trash' aria-hidden='true'></i></a></th><th>Apaisado<a href='#' onClick='ordenarCampo(\"apaisado\")'><i title='Ordenar' class='fa fa-trash' aria-hidden='true'></i></a></th><td colspan='3'><a href='/biblioteca/showinsertlibro'><i class='fa fa-plus' aria-hidden='true'></i><i title='Insertar libro' class='fa fa-book' aria-hidden='true'></i></a></td></tr>";
	        for(var i in tabla)  {
	            fila = tabla[i];
	            html = html + "<tr id='libro" + fila['id_libro'] + "'><td>" + fila["id_libro"] + "</td><td>" + fila["titulo"] + "</td><td>" + fila["autor"] + "</td><td>" + fila["editorial"] + "</td><td>" + fila["lugar_edicion"] + "</td><td>" + fila["fecha_edicion"] + "</td><td>" + fila["ISBN"] + "</td><td>" + fila["tipo"] + "</td><td>" + fila["apaisado"] + "</td><td></td><td><a href='/biblioteca/showmodificarlibro/" + fila["id_libro"] + "'><i title='Modificar' class='fa fa-pencil-square-o' aria-hidden='true'></i></a><td><a href='/biblioteca/showinsertimg/" + fila["id_libro"] + "'><i title='Insertar Páginas' class='fa fa-file-image-o' aria-hidden='true'></i></a></td><td><a href='#' onClick='borrarlibro(" + fila['id_libro'] + ")'><i title='Eliminar' class='fa fa-trash' aria-hidden='true'></i></a></td><td><a href='/biblioteca/verLibro/" + fila["id_libro"] + "'>Ver libro</a></td></tr>";
	        }
	        html = html + "</table>";
	        $("#contenido").empty();
	        $("#contenido").html(html);

	    }


	    function ordenacion(a, b) {

	        if (eval("a."+id_columna) === eval("b."+id_columna)) {
	            return 0;
	        }
	        else {
	            return (eval("a."+id_columna) < eval("b."+id_columna)) ? -1 : 1;
	        }
	    }


      // $("#tabla").load("biblioteca/buscar_libro_ajax/"+busqueda);

	</script>

    <div>
        <?php
            echo "<table id='cont' style='margin-top:80px;'>";
                    echo "<tr id='cabecera'>
                            <th>Id<a href='#' onClick='ordenarCampo(\"id_libro\")'><i title='Ordenar' class='fa fa-trash' aria-hidden='true'></i></a></th>
                            <th>Titulo<a href='#' onClick='ordenarCampo(\"titulo\")'><i title='Ordenar' class='fa fa-trash' aria-hidden='true'></i></a></th>
                            <th>Autor<a href='#' onClick='ordenarCampo(\"autor\")'><i title='Ordenar' class='fa fa-trash' aria-hidden='true'></i></a></th>
                            <th>Editorial<a href='#' onClick='ordenarCampo(\"editorial\")'><i title='Ordenar' class='fa fa-trash' aria-hidden='true'></i></a></th>
                            <th>Lugar de edicion<a href='#' onClick='ordenarCampo(\"lugar_edicion\")'><i title='Ordenar' class='fa fa-trash' aria-hidden='true'></i></a></th>
                            <th>Fecha de edicion<a href='#' onClick='ordenarCampo(\"fecha_edicion\")'><i title='Ordenar' class='fa fa-trash' aria-hidden='true'></i></a></th>
                            <th>ISBN<a href='#' onClick='ordenarCampo(\"ISBN\")'><i title='Ordenar' class='fa fa-trash' aria-hidden='true'></i></a></th>
                            <th>Tipo<a href='#' onClick='ordenarCampo(\"tipo\")'><i title='Ordenar' class='fa fa-trash' aria-hidden='true'></i></a></th>
                            <th>Apaisado<a href='#' onClick='ordenarCampo(\"apaisado\")'><i title='Ordenar' class='fa fa-trash' aria-hidden='true'></i></a></th>
                            <td colspan='3'><a href='".site_url("/biblioteca/showinsertlibro")."'><i class='fa fa-plus' aria-hidden='true'></i><i title='Insertar libro' class='fa fa-book' aria-hidden='true'></i></a></td>
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

            function ordenacion(a, b) {

		        if (eval("a."+id_columna) === eval("b."+id_columna)) {
		            return 0;
		        }
		        else {
		            return (eval("a."+id_columna) < eval("b."+id_columna)) ? -1 : 1;
		        }
		    }
        
    </script>

</div>




