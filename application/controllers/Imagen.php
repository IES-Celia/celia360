<?php

defined('BASEPATH') OR exit('No se permite el acceso directo al script');
/**
 * Clase Imagen que extiende del controlador base de Codeigniter, para que pueda heredar todos sus métodos
 * 
 * @author: María Dolores Salmeron Sierra
 */
class Imagen extends CI_Controller {

    /**Constructor, ejecuta un proceso predeterminado cuando se crea una instancia de su clase
     * 
     * @author: María Dolores Salmeron Sierra
     */
    public function __construct() {
        
        parent::__construct();
        $this->load->model("UsuarioModel");
    }
    /**
     * El método "index()" se carga de manera predeterminada, llama al método lista_imagenes()
     * 
     * @author: María Dolores Salmeron Sierra
     */
    
    public function index() {
        $this->lista_imagenes();
    }

    /**
     * Muestra el formulario para insertar una imagen
     * 
     * @author: María Dolores Salmeron Sierra     
     */
    public function formulario_insertar_imagen() {
        $datos["vista"] = "imagen/formulario_insertar_imagen";
        $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
        $this->load->view('template_admin', $datos);
    }

    /**
     * Inserta una imagen y nos muestra el mensaje si ha sido un éxito o no
     * 
     * @author: María Dolores Salmeron Sierra    
     */
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

    /**
     * Muestra una tabla con el listado de imágenes
     * 
     * @author: María Dolores Salmeron Sierra     
     */
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

    /**
     * Muestra el formulario para modificar la imagen
     * 
     * @param $id, el identificador de la imagen
     * @author: María Dolores Salmeron Sierra     
     */
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

    /**
     * Actualiza la imagen y muestra un mensaje si se ha realizado correctamente o no
     * 
     * @author: María Dolores Salmeron Sierra
     */
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

    /**
     * Borra la imagen
     *  
     * @param $id_imagen, el identificador de la imagen  
     * @author: María Dolores Salmeron Sierra  
     */
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
    /**
     * Busca la cadena especificada en el título de la imagen
     * 
     * 
     * @return los resultados obtenidos, que coinciden con la cadena introducida o no hay resultados 
     * @param $abuscar, la cadena que introducimos en el buscador  
     * @author: María Dolores Salmeron Sierra  
     */
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
