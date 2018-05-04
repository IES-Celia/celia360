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
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Controlador de Puntos Destacados.
 * 
 * Esta clase contiene todos los métodos del controlador del panel de administración de la tabla Puntos Destacados.
 * Permite insertar, eliminar, modificar y consultar la tabla Puntos Destacados.
 * @author Miguel Ángel López Segura 2018
 */

class PuntosDestacados extends CI_Controller {
    /**
     * Constructor.
     * 
     * Carga los modelos que se van a usar a lo largo de los métodos de la clase.
     */
    public function __construct(){
        parent::__construct();
        $this->load->model("PuntosDestacadosModel");
        $this->load->model("UsuarioModel");
        //$this->load->helper('funcionesHotspot');
    }
    
    /**
     * Método por defecto del controlador.
     * 
     * Invoca automáticamente la vista puntosDestacados() si se entra al controlador
     * sin especificar otro método.
     */
    public function index(){
        $datos["puntos_d"] = $this->PuntosDestacadosModel->getAll();
        $this->load->view("puntosdestacados/puntosDestacados", $datos);	
    }
    
    /**
     * Añade una nueva celda, con todo lo que necesita para funcionar, y lo inserta en la base de datos.
     * @param int id_fila El id de la fila donde se va a añadir la celda
     */
    
    public function anadir_celda($id_fila){
        $this->load->model("MapaModel", "mapa");
        $datos["mapa"] = $this->mapa->cargar_mapa();
        $datos["puntos"] = $this->mapa->cargar_puntos();
        $datos["id_fila"]= $id_fila;
        $permiso = $this->UsuarioModel->comprueba_permisos("puntosdestacados/insertarDestacado");
        if ($permiso) {
            $this->load->view("puntosdestacados/insertarDestacado", $datos);
        }
        else {
            redirect(base_url("usuario"));
        }
    }
    
    /**
     * Borra un registro de la tabla celdapd.
     * 
     * @param int $id_fila El id de la celda que se quiere borrar.
     */
    
    public function borrar_celda($id_fila){
        $resultado = $this->PuntosDestacadosModel->borrar_celda($id_fila);
        $datos["puntos_d"] = $this->PuntosDestacadosModel->getAll();
        $permiso = $this->UsuarioModel->comprueba_permisos("puntosdestacados/adminDestacados");
        if ($permiso) {
            $this->load->view("puntosdestacados/adminDestacados", $datos);	
        }else {
            redirect(base_url("usuario"));
        }
    }
    
    /**
     * Este metodo carga los puntos destacados.
     *
     */
    
    public function cargar_puntosdestacados(){
        $datos["puntos_d"] = $this->PuntosDestacadosModel->getAll();
        $permiso = $this->UsuarioModel->comprueba_permisos("puntosdestacados/puntosDestacados");
        if ($permiso) {
        	$this->load->view("puntosdestacados/puntosDestacados", $datos);	
        }
        else {
            redirect(base_url("usuario"));
        }
    }
    
    /**
     * Este metodo carga la vista de los puntos destacados con la posibilidad de modificarlos.
     *
     */
    
    public function cargar_admin_puntosdestacados(){
        $datos["puntos_d"] = $this->PuntosDestacadosModel->getAll();
        $permiso = $this->UsuarioModel->comprueba_permisos("puntosdestacados/adminDestacados");
        if ($permiso) {
            $this->load->view("puntosdestacados/adminDestacados", $datos);
        } else {
            redirect(base_url("usuario"));
        }
    }
    
    /**
     * Muestra el formulario para modificar un punto destacado.
     * 
     * @param int $id El id de la celda que se quiere borrar.
     */

    public function formulario_update($id){
        $this->load->model("MapaModel", "mapa");
        $datos["mapa"] = $this->mapa->cargar_mapa();
        $datos["puntos"] = $this->mapa->cargar_puntos();
        $datos["celda"]= $this->PuntosDestacadosModel->info_celda($id);
        $permiso = $this->UsuarioModel->comprueba_permisos("puntosdestacados/updateDestacado");
        if ($permiso) {
            $this->load->view("puntosdestacados/updateDestacado", $datos);
        }
        else {
            redirect(base_url("usuario"));
        }
    }
    
    
    /**
     * Este metodo modifica un punto destacado, se llega aqui desde la vista updateDestacado.
     *
     */
    
    
    public function processupdatedestacado(){
        $resultado = $this->PuntosDestacadosModel->editar_celda();
        $datos["puntos_d"] = $this->PuntosDestacadosModel->getAll();
        $permiso = $this->UsuarioModel->comprueba_permisos("puntosdestacados/adminDestacados");
        if ($permiso) {
            $this->load->view("puntosdestacados/adminDestacados", $datos);
        }
        else {
            redirect(base_url("usuario"));
        }
    }
    
    /**
     * Este metodo inserta un punto destacado, se llega aqui desde la vista insertarDestacado.
     *
     */
    
    public function processinsertdestacado(){
        $resultado = $this->PuntosDestacadosModel->crear_celda();
        if($resultado){
            $datos["puntos_d"] = $this->PuntosDestacadosModel->getAll();
            $permiso = $this->UsuarioModel->comprueba_permisos("puntosdestacados/adminDestacados");
            if ($permiso) {
                $this->load->view("puntosdestacados/adminDestacados", $datos);	
            }
            else {
                redirect(base_url("usuario"));
            }
        }
    }
    
}