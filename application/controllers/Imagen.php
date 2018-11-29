<?php
/*
    Este archivo es parte de la aplicación web Celia360. 

    Celia 360 es software libre: usted puede redistribuirlo y/o modificarlo
    bajo los términos de la GNU General Public License tal y como está publicada por
    la Free Software Foundation en su versión 3.
 
    Celia 360 se distribuye con el propósito de resultar útil,
    pero SIN NINGUNA GARANTÍA de ningún tipo. 
    Véase la GNU General Public License para más detalles.

    Puede obtener una copia de la licencia en <http://www.gnu.org/licenses/>.
*/
?>
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
     * Inserta una imagen y nos muestra el mensaje si ha sido un éxito o no
     * 
     * @author: María Dolores Salmeron Sierra    
     */
    public function insertar_imagen() {

        //cargar el modelo
        $this->load->model("ImagenModel");
        //acciones para insertar la imagen
        $resultado = $this->ImagenModel->insertar_imagen();

        // Comprobamos cuantas imágenes se han subido correctamente
        $correctas = 0;
        $incorrectas = 0;
        for ($i = 0; $i < count($resultado); $i++) {
            if ($resultado[$i] == 0) $incorrectas++; else $correctas++;
        }
        $total = $correctas + $incorrectas;
        if ($incorrectas > 0)
            $datos["error"] = $total." imágenes subidas: $correctas correctas - $incorrectas fallidas";
        else
            $datos["mensaje"] = $total." imágenes subidas correctamente";
            
            $datos["lista_imagenes"] = $this->ImagenModel->buscar_todo();
            $datos["vista"] = "imagen/principal_img";
            $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
            $this->load->view('admin_template', $datos);
        
    }

    /**
     * Muestra una tabla con el listado de imágenes
     * 
     * @author: María Dolores Salmeron Sierra     
     */
    public function lista_imagenes() {
        //cargar el modelo
        $this->load->model("ImagenModel");
        //acciones para ver el listado de imagenes
        $datos["lista_imagenes"] = $this->ImagenModel->buscar_todo();
        $datos["vista"] = "imagen/principal_img";
        $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
        //cargar la vista
        $this->load->view('admin_template', $datos);
    }

    /**
     * Muestra el formulario para modificar la imagen
     * 
     * @param $id, el identificador de la imagen
     * @author: María Dolores Salmeron Sierra     
     */
    public function modificar_imagen($id) {

        //cargar el modelo
        $this->load->model("ImagenModel");
        //buscar los datos de una imagen concreta

        $datos["lista_imagenes"] = $this->ImagenModel->buscar_imagen($id);
        $datos["vista"] = "imagen/modificar_imagen";
        $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
        //muestra el formulario para modificar los datos
        $this->load->view('admin_template', $datos);
    }

    /**
     * Actualiza la imagen y muestra un mensaje si se ha realizado correctamente o no
     * 
     * @author: María Dolores Salmeron Sierra
     */
    public function actualizar_imagen() {
        //cargar el modelo
        $this->load->model("ImagenModel");

        //acciones para modificar los datos de la imagen en la BD
        $actualizar_titulo = $this->input->post_get('titulo_imagen');
        $actualizar_texto = $this->input->post_get('texto_imagen');
        $actualizar_fecha = $this->input->post_get('fecha');

        $actualizar_url = 'assets/imagenes/imagenes-hotspots/' . $this->input->post_get('titulo_imagen') . ".jpg";

        $resultado = $this->ImagenModel->modificar_imagen();

        $datos["lista_imagenes"] = $this->ImagenModel->buscar_todo();
        if ($resultado) {
            $datos["mensaje"] = "Imagen actualizada con &eacute;xito";
        } else
            $datos["mensaje"] = "Los datos no se han modificado";

        $datos["vista"] = "imagen/principal_img";
        $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
        $this->load->view('admin_template', $datos);
    }

    /**
     * Borra la imagen con el id especificado
     * Este método se pide por Ajax, de modo que su salida es un "0" o un "1".
     *  
     * @param $id_imagen, el identificador de la imagen  
     * @return Devuelve a la petición Ajax un "0" si el borrado ha fallado,
     * un "-1" si el borrado ha fallado porque la imagen está en uso en un hotspot,
     * o el id de la imagen si ha funcionado bien.
     * 
     * @author: María Dolores Salmeron Sierra  
     */
    public function borrar_imagen($id_imagen) {

        //cargar el modelo
        $this->load->model("ImagenModel");
        
        // Comprobamos si la imagen se está utilizando en la aplicación.
        $sql = $this->ImagenModel->buscar_imagen_panel($id_imagen);
        
        if ($sql == false){
            // La imagen no está en uso, así que podemos borrarla.
            //acciones para eliminar la imagen en la BD
            $resultado = $this->ImagenModel->borrar_imagen($id_imagen);
            if($resultado == 1){
                echo $id_imagen;  // La imagen se ha borrado correctamente
            }else{
                echo "0"; //Ha ocurrido un error al borrar la imagen
            }
        }else{
            //La imagen está en uso y no se puede borrar
            echo "-1";
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
        $this->load->model("ImagenModel");

        //si es una petición ajax y existe una variable post
        //llamada info dejamos pasar
            $lista_imagenes = $this->ImagenModel->buscar_ajax($abuscar);

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
