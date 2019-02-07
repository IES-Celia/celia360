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

class Zonas extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("ZonasModel");
        $this->load->model("UsuarioModel");
        $this->load->model("PortadaModel");
    }
    
    public function index(){
        $this->showZonas();
    }

    public function showZonas() {   
        $datos["vista"] = "mapa/Zonas";
        $datos["opcionesPortada"] = $this->PortadaModel->get_info_portada();
        $datos["pisos"] = $this->ZonasModel->getAll();
        $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
        $this->load->view('admin_template', $datos);
    }
    
    public function insertarZonas(){
        $datos["vista"] = "mapa/Zonas";
        $datos["opcionesPortada"] = $this->PortadaModel->get_info_portada();
        $datos["pisos"] = $this->ZonasModel->getAll();
        $left_zona = $this->input->post_get("leftZona");
        $top_zona = $this->input->post_get("topZona");
        $piso = $this->input->post_get("piso");
        $result = $this->ZonasModel->insertarZonas($top_zona, $left_zona, $piso);
        if($result >= 0){
            $datos["mensaje"] = "Zona introducida correctamente";
        }else{
            $datos["error"] = "Error al insertar zona";
        }
        $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
        $this->load->view('admin_template', $datos);
    }

    public function deletePunto($id_piso){
        $result = $this->ZonasModel->deletePunto($id_piso);
        //Devuelve 0 si se a eliminado correctamente el punto en la base de datos y 1 si ha dado error
        if($result >= 0){
            echo "0";
        }else{
            echo "1";
        }
    }

}

?>
