
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel='stylesheet' href=https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css>;
    <!--<?php echo "<link rel='stylesheet' href='".base_url("assets/css/font-awesome-4.7.0/css/font-awesome.min.css")."'>"; ?>-->
    <?php echo "<link rel='stylesheet' type='text/css' href='".base_url("assets/css/estilo.css")."' media='screen' />"; ?>
    <?php echo "<link rel='stylesheet' type='text/css' href='".base_url("assets/bibliocss/adminestilo.css")."' media='screen' />";?>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />


</head>
<body>
    <div>
        <?php
            echo "<table>";
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
                            <td colspan='3'><a href='".site_url("/biblioteca/showinsertlibro")."'><i class='fa fa-plus' aria-hidden='true'></i><i title='Insertar libro' class='fa fa-book' aria-hidden='true'></i></a></td>
                           </tr>";


               
                /*echo "<a href='index.php?accion=showinsertlibro'><i class='fa fa-plus' aria-hidden='true'></i><i title='Insertar libro' class='fa fa-book' aria-hidden='true'></i></a>";*/
                foreach ($tabla as $usu) {
                    echo "<tr>
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
                            <td><a href=".site_url("/biblioteca/deletelibro/".$usu["id_libro"])." onClick='return confirm(\"¿Estás seguro?\")'><i title='Eliminar' class='fa fa-trash' aria-hidden='true'></i></a></td>
                            <td><a href=".site_url("/biblioteca/verLibro/".$usu["id_libro"])."'>Ver libro</a></td>


                           </tr>";
                }
                echo "</table>";

    ?>
</div>

</body>
</html>



