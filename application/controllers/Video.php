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


// Este es el controlador de la aplicación
/**
 * Controlador de Audio.
 * 
 * Esta clase contiene todos los métodos del controlador del panel de administración de la tabla Video.
 * Permite insertar, eliminar, modificar y consultar la tabla Audio.
 * @author Hamza Benhachmi 2018
 */

class Video extends CI_Controller {
/**
     * Constructor.
     * 
     * Carga los modelos que se van a usar a lo largo de los métodos de la clase.
     */
    public function __construct() {
        parent::__construct();
        $this->load->model("VideoModel", "Vidm");
        $this->load->model("UsuarioModel");
    }
	/**
     * Método por defecto del controlador.
     * 
     * Invoca automáticamente el método mostrarvideos() si se entra al controlador
     * sin especificar otro método.
     */
    public function index() {
        $this->mostrarvideo();
    }
	/**
     *  inserta la url de los videos en la base de datos.
     */

    public function insertarvideo() {
        $numeroVideos = $this->input->post_get("numeroVideos");   
        for($i=0;$i<$numeroVideos;$i++){
        $url  = $this->input->post_get("video".$i);
        $desc = $this->input->post_get("desc");
		//recojemos las variables del formulario y las insertamos en la base de datos
        $res = $this->Vidm->insertarvideo($desc, $url);

        if($res){
           $datos['mensaje'] = "Vídeo insertado con éxito";
        }else{
			$datos['error'] = "Error al insertar vídeos";
         }
        }
		//preparamos un array con los datos que contiene esa tabla de videos y se los mandamos ala vida para ser visualizados en pantalla
        $datos["tabla"] = $this->Vidm->buscarvideo();
        $datos["vista"] = "video/Vvideos";
        $datos["permiso"] = $this->UsuarioModel->comprueba_permisos($datos["vista"]);
        $this->load->view('admin_template', $datos);
    }
  /**
     * Muestra la vista principal de Video, con toda la tabla y las ventanas modales
     * para insertar y modificar.
     */
    public function mostrarvideo() {
        $datos["tabla"] = $this->Vidm->buscarvideo();
        $datos["vista"] = "video/Vvideos";
        $datos["permiso"] = $this->UsuarioModel->comprueba_permisos($datos["vista"]);
        $this->load->view('admin_template', $datos);
    }
 /**
     * Borra un registro de la tabla Video.
     * 
     * Este método se pide por Ajax, de modo que su salida es un "0" o un "1".
     * 
     * @param int $id El id del video que se quiere borrar.
     * @return Devuelve a la petición Ajax un "-1" si el borrado ha fallado, un "-2" si el borrado ha fallado porque el video está en uso en un hotspot, o el id del audio si ha funcionado bien.
     */
    public function borrarvideo($id) {
		 // Comprobamos si el audio está en uso en algún hotspot.
		$r=$this->Vidm->relacion($id);
		 // El video no está en uso, así que podemos borrarlo.
		if($r==false){
			$resultado=$this->Vidm->borrarvideo($id);
			if($resultado == 1) echo $id;// El video se ha borrado correctamente
			else echo "-1";	// Algo ha fallado al intentar borrar el video
		}
		else  {
			 // El audio está en uso: no se puede borrar
			echo "-2";
		}
    }

/**
     * Modifica un video. Los datos se reciben por POST.
     */
    public function modificarvideo() {

        $id = $this->input->post_get("id");
        $this->Vidm->modificarvideo($id);
        $datos["tabla"] = $this->Vidm->buscarvideo();
        $datos["vista"] = "video/Vvideos";
        $datos["permiso"] = $this->UsuarioModel->comprueba_permisos($datos["vista"]);
        $this->load->view('admin_template', $datos);
    }

}
    
?>
