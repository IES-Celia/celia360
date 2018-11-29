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

class escenas extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("EscenasModel");
        $this->load->model("UsuarioModel");
        $this->load->model("MapaModel","mapa");
    }
    
    public function index(){
        $this->showescenas();
    }
    
    public function showescenas() {   
        $datos["tablaEscenas"] = $this->EscenasModel->getAll();
        $datos["mapa"] = $this->mapa->cargar_mapa();
        $datos["puntos"] = $this->mapa->cargar_puntos();
        $datos["vista"]="escenas/Escenastable";
        $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
        $this->load->view('admin_template', $datos);
    } 
    
    public function showinsert($piso_mapa, $left_mapa, $top_mapa) {
        $datos["piso_mapa"] = $piso_mapa;
        $datos["left_mapa"] = $left_mapa;
        $datos["top_mapa"] = $top_mapa;
        $datos["vista"]="escenas/Insertar";
        $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
        $this->load->view('admin_template', $datos);
    }
    
    public function processinsertscene(){
        $resultado = $this->EscenasModel->insertar();
        if ($resultado > 0) {
            $datos["mensaje"] = "La inserci&oacute;n ha sido un &eacute;xito";
            $datos["tablaEscenas"] = $this->EscenasModel->getAll();
            $datos["mapa"] = $this->mapa->cargar_mapa();
            $datos["puntos"] = $this->mapa->cargar_puntos();
            $datos["vista"]="escenas/Escenastable";
            $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
            $this->load->view('admin_template', $datos);
        }
        else {
            $datos["error"] = "La inserci&oacute;n ha fallado";
            $datos["tablaEscenas"] = $this->EscenasModel->getAll();
            $datos["mapa"] = $this->mapa->cargar_mapa();
            $datos["puntos"] = $this->mapa->cargar_puntos();
            $datos["vista"]="escenas/Escenastable";
            $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
            $this->load->view("admin_template", $datos);
        }
    }
    
    public function deletescene($cod){

        $resultado = $this->EscenasModel->borrar($cod);
        
        if ($resultado > 1) {
            $datos["mensaje"] = "Escena borrada correctamente";
            $datos["tablaEscenas"] = $this->EscenasModel->getAll();
            $datos["vista"]="escenas/Escenastable";
            $datos["mapa"] = $this->mapa->cargar_mapa();
            $datos["puntos"] = $this->mapa->cargar_puntos();
            $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
            $this->load->view('admin_template', $datos);
            }
        else {
            $datos["error"] = "Error al borrar la escena";
            $datos["tablaEscenas"] = $this->EscenasModel->getAll();
            $datos["vista"]="escenas/Escenastable";
            $datos["mapa"] = $this->mapa->cargar_mapa();
            $datos["puntos"] = $this->mapa->cargar_puntos();
            $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
            $this->load->view("admin_template",$datos);
        }
        
    }
    
    public function showupdatescene($cod){
    
        $datos["tabla"]= $this->EscenasModel->getOneId($cod);
        $datos["vista"]="escenas/Modificar";
        $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
        $this->load->view('admin_template', $datos);
    }
    
    public function processupdatescene(){
    
        $cod=$_REQUEST['cod'];
        $resultado = $this->EscenasModel->update($cod);
            
        if ($resultado == 0) {
            $datos["mensaje"] = "La modificaci&oacute;n ha sido un &eacute;xito";
            $datos["tablaEscenas"] = $this->EscenasModel->getAll();
            $datos["vista"]="escenas/Escenastable";
            $datos["mapa"] = $this->mapa->cargar_mapa();
            $datos["puntos"] = $this->mapa->cargar_puntos();
            $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
            $this->load->view('admin_template', $datos);
        }
        else {
            if ($resultado == 1) $datos["error"] = "Ha fallado la subida y/o escalado de la imagen";
            else if ($resultado == 2) $datos["error"] = "Ha fallado la actualización de la base de datos";
            else $datos["error"] = "Ha fallado la actualización";
            $datos["tablaEscenas"] = $this->EscenasModel->getAll();
            $datos["vista"]="escenas/Escenastable";
            $datos["mapa"] = $this->mapa->cargar_mapa();
            $datos["puntos"] = $this->mapa->cargar_puntos();
            $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
            $this->load->view('admin_template', $datos);
        }
    }

    
  
    /**
     * Carga una escena 360 con pannellum para insertar hotspots en ella.
     * @param String $escenaInicial Código de la escena que se va a cargar.
     * @param String $redireccion Controlador al que saltaremos después de insertar el hotspot.
     * @param int $piso Identificador del piso donde está la escena.
     */
    public function cargar_escena($escenaInicial, $redireccion, $piso = null){
        $this->load->library('session');
        if(isset($piso) && is_numeric($piso)){
            $this->session->piso=$piso; 
        }
        
        $redireccion = site_url("/hotspots/".$redireccion."/");
        $datos["redireccion_joptoch"]= $redireccion;
	    $datos["escenaInicial"] = $escenaInicial;
        $datos["idhotspot"]= "vacio";
		$this->load->view("escenas/jotpoch", $datos);	
	}
    
    /**
     * Carga una escena 360 con pannellum para editar los hotspots que hay en ella.
     * @param String $escenaInicial Código de la escena que se va a cargar.
     * @param String $redireccion Controlador al que saltaremos después de insertar el hotspot.
     * @param int $idhotspot El hotspot que se va a modificar.
     */
    public function cargar_escena_modificar($escenaInicial, $redireccion, $idhotspot){
        $redireccion = site_url("/hotspots/".$redireccion."/");
        echo $redireccion;
        $datos["redireccion_jotpoch"]= $redireccion;
	    $datos["escenaInicial"] = $escenaInicial;
        $datos["idhotspot"]= $idhotspot;
	    $this->load->view("escenas/jotpoch", $datos);	
    }

    public function cargar_versiones_escena () {
        $cod_escena = $_REQUEST["codigo_escena"];
        $resultado = $this->EscenasModel->get_versiones($cod_escena);
        echo json_encode($resultado);
    }
}

?>
