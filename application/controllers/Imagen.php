<?php

defined('BASEPATH') OR exit('No se permite el acceso directo al script');

class Imagen extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("UsuarioModel");
    }

    public function index() {
        $this->lista_imagenes();
    }

    public function formulario_insertar_imagen() {
        $datos["vista"] = "imagen/formulario_insertar_imagen";
        $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
        $this->load->view('template_admin', $datos);
    }

    public function insertar_imagen() {

        //cargar el modelo
        $this->load->model("Img");
        //acciones para insertar la imagen
        $resultado = $this->Img->insertar_imagen();

        if ($resultado[0]) {
            $datos["mensaje"] = "Imagen insertada correctamente";
            $datos["lista_imagenes"] = $this->Img->buscar_todo();
            $datos["vista"] = "imagen/principal_img";
            $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
            //cargar la vista
            $this->load->view('template_admin', $datos);
        } else {
            $datos["error"] = "Ha ocurrido un error al insertar el registro";
            $datos["lista_imagenes"] = $this->Img->buscar_todo();
            $datos["vista"] = "imagen/principal_img";
            $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
            //cargar la vista
            $this->load->view('template_admin', $datos);
        }
    }

    public function lista_imagenes() {
        //cargar el modelo
        $this->load->model("Img");
        //acciones para ver el listado de imagenes
        $datos["lista_imagenes"] = $this->Img->buscar_todo();
        $datos["vista"] = "imagen/principal_img";
        $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
        //cargar la vista
        $this->load->view('template_admin', $datos);
    }

    public function modificar_imagen($id) {

        //cargar el modelo
        $this->load->model("Img");
        //buscar los datos de una imagen concreta

        $datos["lista_imagenes"] = $this->Img->buscar_imagen($id);
        $datos["vista"] = "imagen/modificar_imagen";
        $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
        //muestra el formulario para modificar los datos
        $this->load->view('template_admin', $datos);
    }

    public function actualizar_imagen() {
        //cargar el modelo
        $this->load->model("Img");

        //acciones para modificar los datos de la imagen en la BD
        $actualizar_titulo = $this->input->post_get('titulo_imagen');
        $actualizar_texto = $this->input->post_get('texto_imagen');
        $actualizar_fecha = $this->input->post_get('fecha');

        $actualizar_url = 'assets/imagenes/imagenes-hotspots/' . $this->input->post_get('titulo_imagen') . ".jpg";

        $resultado = $this->Img->modificar_imagen();

        $datos["lista_imagenes"] = $this->Img->buscar_todo();
        if ($resultado) {
            $datos["mensaje"] = "Imagen actualizada con &eacute;xito";
        } else
            $datos["mensaje"] = "Los datos no se han modificado";

        $datos["vista"] = "imagen/principal_img";
        $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
        $this->load->view('template_admin', $datos);
    }

    public function borrar_imagen($id_imagen) {

        //cargar el modelo
        $this->load->model("Img");

        //acciones para eliminar la imagen en la BD
        $resultado = $this->Img->borrar_imagen($id_imagen);
        if ($resultado != 0) {
            echo $id_imagen;
        } else {
            echo $resultado;
        }
    }
    
    public function busqueda_ajax($abuscar = "") {
        //cargar el modelo
        $this->load->model("Img");

        //si es una petición ajax y existe una variable post
        //llamada info dejamos pasar
            $lista_imagenes = $this->Img->buscar_ajax($abuscar);

            //si search es distinto de false significa que hay resultados
            //y los mostramos con un loop foreach
            if ($lista_imagenes !== FALSE) {
                
            echo "<br><table id='cont'>";
            echo '<tr><th>Id</th><th>T&iacute;tulo</th><th>Url</th><th>Miniatura</th><th>Fecha</th>'
            . '<th>Modificar Imagen</th><th>Borrar Imagen</th></tr>';
            foreach ($lista_imagenes as $ima) {
                $fila = $ima["id_imagen"];
                $nombre_archivo = $ima["id_imagen"] . "_miniatura.jpg";
                $url_modificar = site_url("imagen/modificar_imagen/") . $ima["id_imagen"];
                $url_borrar = site_url("imagen/borrar_imagen/") . $ima["id_imagen"];
                echo "<tr id='imagen-" . $fila . "'><td>" . $ima["id_imagen"] . "</td><td>" . $ima["titulo_imagen"] .
                        "</td><td>" . $ima["url_imagen"] . "</td><td align='center'><a href='" .
                base_url("assets/imagenes/imagenes-hotspots/" . $ima["url_imagen"]) . "'><img src='" .
                base_url("assets/imagenes/imagenes-hotspots/" . $nombre_archivo) . "'></a></td><td>" .
                $ima["fecha"] . "</td>
                <td><a href='" . $url_modificar . "'><i class='fa fa-edit' style='font-size:30px;'></i></a></td>
                <td><a class='delete' href='#' onclick='borrar_imagen($fila)'><i class='fa fa-trash' style='font-size:30px;'></i></a></td></tr>";
            }
            echo "</table><br>";

            //en otro caso decimos que no hay resultados
            } else {
                ?>

                <p><?php echo 'No hay resultados' ?></p>

                <?php
            }
    }

}
