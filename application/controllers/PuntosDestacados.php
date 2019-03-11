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
 * Esta clase contiene todos los métodos del controlador del panel de administración de la tabla celdapd.
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
		$datos['vista'] = "puntosdestacados/insertarDestacado";
        $datos['permiso'] = $this->UsuarioModel->comprueba_permisos($datos['vista']);
        if ($datos['permiso']) {
            $this->load->view("admin_template", $datos);
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
		$datos['vista'] = "puntosdestacados/adminDestacados";
        $datos['permiso'] = $this->UsuarioModel->comprueba_permisos($datos['vista']);
		
		if ($datos['permiso']) {
			if($resultado == 1){
				$datos['mensaje'] = "Punto destacado borrado con éxito";
			}else{
				$datos['error'] = "Error al borrar el punto destacado";
			}
			$this->load->view("admin_template", $datos);
        }else {
            redirect(base_url("usuario"));
        }
    }
    
    /**
     * Este metodo carga los puntos destacados y carga la vista puntosDestacados para el usuario.
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
     * Este metodo carga la vista adminDestacados para el administrador, con la posibilidad de modificarlos, borrarlos.
     *
     */
    
    public function cargar_admin_puntosdestacados(){
		$datos["puntos_d"] = $this->PuntosDestacadosModel->getAll();
		$datos['vista'] = "puntosdestacados/adminDestacados";
		$datos['permiso'] = $this->UsuarioModel->comprueba_permisos($datos['vista']);

        if($datos['permiso']){
			$this->load->view('admin_template',$datos);
		}else{
			echo 'no tienes permisos';
		}
    }
    
    /**
     * Muestra el formulario para modificar un punto destacado.
     * 
     * @param int $id El id de la celda que se quiere borrar.
     */

    public function formulario_update($id){
		$this->load->model("MapaModel", "mapa");
		$datos['vista'] = "puntosdestacados/updateDestacado";
        $datos["mapa"] = $this->mapa->cargar_mapa();
        $datos["puntos"] = $this->mapa->cargar_puntos();
        $datos["celda"]= $this->PuntosDestacadosModel->info_celda($id);
        $datos['permiso'] = $this->UsuarioModel->comprueba_permisos("puntosdestacados/updateDestacado");
        if ($datos['permiso']) {
            $this->load->view("admin_template", $datos);
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
		$datos['vista'] = "puntosdestacados/adminDestacados";
        $datos['permiso'] = $this->UsuarioModel->comprueba_permisos($datos['vista']);
        if ($datos['permiso']) {
			if($resultado == 1){
				$datos['mensaje'] = "Punto destacado actualizado con éxito";
			}else{
				$datos['error'] = "Error al actualizar el punto destacado";
			}
            $this->load->view("admin_template", $datos);
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
		$datos['vista'] = "puntosdestacados/adminDestacados";
        $resultado = $this->PuntosDestacadosModel->crear_celda();
        $datos['permiso'] = $this->UsuarioModel->comprueba_permisos($datos['vista']);
            if ($datos['permiso']) {
				if($resultado){
					$datos['mensaje'] = "Punto destacado insertado con éxito";
                		
            }else{
				$datos['error'] = "Error al insertar el punto destacado";
			}
			$datos["puntos_d"] = $this->PuntosDestacadosModel->getAll();
			$this->load->view("admin_template", $datos);
		}else {
                redirect(base_url("usuario"));
            }
        }
	}
