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
 * Controlador de Audio.
 * 
 * Esta clase contiene todos los métodos del controlador del panel de administración de la tabla Audio.
 * Permite insertar, eliminar, modificar y consultar la tabla Audio.
 * @author Hamza Benhachmi 2018
 */
class Audio extends CI_Controller {
    
    /**
     * Constructor.
     * 
     * Carga los modelos que se van a usar a lo largo de los métodos de la clase.
     */
    public function __construct() {
        parent::__construct();
        $this->load->model("AudioModel");
        $this->load->model("UsuarioModel");
    }

    /**
     * Método por defecto del controlador.
     * 
     * Invoca automáticamente el método mostraraudios() si se entra al controlador
     * sin especificar otro método.
     */
    public function index() {
        $this->mostraraudios();
    }

    /**
     * Sube un audio al servidor y lo inserta en la base de datos.
     */
    public function insertaraud() {
        // Primero comprobaremos si el fichero ya está en el servidor
        // (para no sobreescribirlo por error)
        $f_def = "assets/audio/" . $_FILES["audio"]["name"];
        $r = $this->AudioModel->existeaud($f_def);

        if ($r == true) {
            // El archivo ya está en el servidor: preparamos un mensaje de error para la vista
            $datos["error"] = "El archivo ya existe en el servidor. Intenta cambiarle el nombre antes de subirlo si no quieres que se sobreescriba";
        } else {
            // El archivo no está en el servidor: le pedimos al modelo que lo suba y lo inserte en la BD
            $tipo = $this->input->post_get("tipo_aud");
            $desc = $this->input->post_get("desc");
            $res = $this->AudioModel->insertaraud($desc, $tipo);
        }
        // Preparamos la vista
        $datos["tabla"] = $this->AudioModel->buscaraudio();
        $datos["vista"] = "audio/Vaudios";
        $datos["permiso"] = $this->UsuarioModel->comprueba_permisos($datos["vista"]);
        $this->load->view("admin_template", $datos);
    }

    /**
     * Muestra la vista principal de Audio, con toda la tabla y las ventanas modales
     * para insertar y modificar.
     */
    public function mostraraudios() {
        $datos["tabla"] = $this->AudioModel->buscaraudio();
        $datos["vista"] = "audio/Vaudios";
        $datos["permiso"] = $this->UsuarioModel->comprueba_permisos($datos["vista"]);
        $this->load->view("admin_template", $datos);
        
    }

    /**
     * Borra un registro de la tabla Audio.
     * 
     * Este método se pide por Ajax, de modo que su salida es un "0" o un "1".
     * 
     * @param int $id El id del audio que se quiere borrar.
     * @return Devuelve a la petición Ajax un "-1" si el borrado ha fallado, un "-2" si el borrado ha fallado porque el audio está en uso en un hotspot, o el id del audio si ha funcionado bien.
     */
    public function borraraud($id) {
        // Comprobamos si el audio está en uso en algún hotspot.
		
        $r=$this->AudioModel->relacion($id);
	if($r==false){
            // El audio no está en uso, así que podemos borrarlo.
            $resultado = $this->AudioModel->borraraud($id);
            if ($resultado == 1) echo $id;  // El audio se ha borrado correctamente
            else echo "-1";                  // Algo ha fallado al intentar borrar el audio
	} else {
            // El audio está en uso: no se puede borrar
            echo "-2";
        }
    }

    /**
     * Modifica un audio. Los datos se reciben por POST.
     */
    public function modificaraud() {
        $id = $this->input->post_get("id");
        $this->AudioModel->modificaraud($id);
        $datos["tabla"] = $this->AudioModel->allAudios();
        $datos["vista"] = "audio/Vaudios";
        $datos["permiso"] = $this->UsuarioModel->comprueba_permisos($datos["vista"]);
        $this->load->view("admin_template", $datos);
    }
}
?>