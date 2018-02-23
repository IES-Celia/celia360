<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel='stylesheet' href=https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />

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


</script>


</head>
<body>
    <div>
        <?php
            echo "<table id='contenido'>";
                    echo "<tr>
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
                            <a href='".site_url("/biblioteca/showmodificarlibro/".$usu["id_libro"])."'> <i title='Modificar' class='fa fa-pencil-square-o' aria-hidden='true'></i></a>
                            <td><a href='".site_url("/biblioteca/showinsertimg/".$usu["id_libro"])."'><i title='Insertar Páginas' class='fa fa-file-image-o' aria-hidden='true'></i></a></td>
                            <td><a href='#' onClick='borrarlibro(".$usu['id_libro'].")'><i title='Eliminar' class='fa fa-trash' aria-hidden='true'></i></a></td>
                            <td><a href=".site_url("/biblioteca/verLibro/".$usu["id_libro"])."'>Ver libro</a></td>

                           </tr>";
                }
                echo "</table>";

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

</body>
</html>