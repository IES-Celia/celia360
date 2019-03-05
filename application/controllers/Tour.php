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
/**
 * Esta clase es el controlador para la portada principal.
 * Contiene los métodos para mostrar la portada y las visitas (guiada, libre y de puntos destacados) desde el frontend.
 * También contiene los métodos para modificar el contenido de la portada desde el backend (panel de administración).
 */

class Tour extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->model("TourModel");
        $this->load->model("UsuarioModel");
        //$this->load->helper('funcionesHotspot');
    } 

    /**
     * Método principal del controlador de frontend.
     * Muestra la portada (con su información) y el menú de opciones.
     */
  public function index(){
    $this->load->model('PortadaModel');
    $datos["vista"] = "portada/portada";
    $datos["portada"]=$this->PortadaModel->get_info_portada();
    $this->load->view("main_template", $datos);
  }

  /**
   * Método para lanzar la vista de la visita libre y de la visita guiada.
   * La vista recibe la información del mapa para poder integrarlo en la propia vista.
   * @param String $tipo_visita Indica el tipo de visita que debe generarse. Los valores admitidos son "libre" y "guiada". Cualquier otro valor hará que se renderice la vista principal de la portada.
   */
  public function visita($tipo_visita) {
    $this->load->model("MapaModel","mapa");
    $this->load->model('PortadaModel');
    $datos["vista"] = "portada/visita";
    $datos["tipo_visita"] = $tipo_visita;
    $datos["portada"] = $this->PortadaModel->get_info_portada();
    $datos["mapa"] = $this->mapa->cargar_mapa();
    $datos["puntos"] = $this->mapa->cargar_puntos();
    $datos["config_mapa"] = $this->mapa->cargar_config();    
    $this->load->view("main_template", $datos);
  }
  
  /**
   * Obtiene todos los datos de las escenas y hotspots que hay en la BD para la visita libre y los formatea en un JSON comprensible por Pannellum.
   * Genera ese JSON para ser recibido en el cliente mediante una petición Ajax.
   */
  public function get_json_libre() {
    $this->load->model("MapaModel","mapa");
    $datos["inicio"] = $this->mapa->cargar_config();
    $json = $this->TourModel->get_datos_libre($datos);
    echo $json;
  }
    
  
  /**
   * Genera a partir de la BD el JSON que necesita Pannellum para la visita guiada.
   * Genera ese JSON para ser recibido en el cliente mediante una petición Ajax.
   */
   public function get_json_guiada() {
        $this->load->model("MapaModel","mapa");
        $datos["inicio"] = $this->mapa->cargar_config();
				$json = $this->TourModel->get_datos_guiada($datos);
				if($json == false){
					echo 1;
				}else{
					echo $json;
				}
        
  }
  
  /**
   * Genera a partir de la BD el JSON que necesita Pannellum para la visita de puntos destacados.
   * Genera ese JSON para ser recibido en el cliente mediante una petición Ajax.
   */
    public function get_json_destacados() {
        $this->load->model("MapaModel","mapa");
        $datos["inicio"] = $this->mapa->cargar_config();
        $json = $this->TourModel->get_datos_destacado($datos);
        echo $json;
    }
    
  /**
   * Genera a partir de la BD el JSON que necesita Pannellum para la vista de insercción de hotspot/modificación de pitch yaw...
   * Genera ese JSON para ser recibido en el cliente mediante una petición Ajax.
   * @param int $escenaInicial el id de la escena en la que se cargará pannellum
   */
    
    public function get_json_plataforma($valor,$escenaInicial) {
        $json = $this->TourModel->get_datos_plataforma($valor,$escenaInicial);
        echo $json;
    }

   
  /**
   * Muestra la vista con los créditos de la aplicación
   */
  public function creditos(){
      $this->load->model('PortadaModel');
      $datos["portada"]=$this->PortadaModel->get_info_portada();
      $datos["vista"] = "portada/creditos";
      $this->load->view("main_template", $datos);
  }

  /* Muestra la vista con la politica de privacidad de la aplicacion */
  public function politicaPrivacidad(){
    $this->load->model('PortadaModel');
    $datos["portada"]=$this->PortadaModel->get_info_portada();
    $datos["vista"] = "portada/politicaPrivacidad";
    $this->load->view("main_template", $datos);
  }
    /**
     * Muestra la vista del formulario de modificación de datos de la portada en el panel de administración.
     */
  public function formulario_portada(){ 
      $this->load->model("PortadaModel");
      $datos["opcionesPortada"] = $this->PortadaModel->get_info_portada();
      $datos["vista"]="portada/updatePortada";
      $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
      $this->load->view("admin_template", $datos);
  }

  /**
   * Procesa la modificación de las opciones de la portada
   */
  public function modificar_portada(){
    $this->load->model("PortadaModel");
    $resultado = $this->PortadaModel->update_portada();   
    $datos["opcionesPortada"]= $this->PortadaModel->get_info_portada();
    $datos["vista"]="portada/updatePortada";
    if ($resultado == 0-0-0-0){
        $datos["mensaje"] = "Opciones de portada modificadas correctamente";
    }else{
        $datos["error"] = "Error al modificar la portada";
    }
    $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
    $this->load->view("admin_template", $datos);
  }

}
