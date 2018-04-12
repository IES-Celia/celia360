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
    } 

    /**
     * Método principal del controlador de frontend.
     * Muestra la portada (con su información) y el menú de opciones.
     */
  public function index(){
    $this->load->model('PortadaModel');
    $datos["vista"] = "portada/portada";
    $datos["portada"]=$this->PortadaModel->info_portada();
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
    $datos["portada"]=$this->PortadaModel->info_portada();
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
        $json = $this->TourModel->get_datos_guiada();
        echo $json;
  }
  
  /**
   * Genera a partir de la BD el JSON que necesita Pannellum para la visita de puntos destacados.
   * Genera ese JSON para ser recibido en el cliente mediante una petición Ajax.
   */
    public function get_json_destacados() {
        $json = $this->TourModel->get_datos_destacado();
        echo $json;
    }
    
  /**
   * ???
   */
    
    public function get_json_plataforma($escenaInicial) {
        $json = $this->TourModel->get_datos_plataforma($escenaInicial);
        echo $json;
    }

   
    /**
     * Muestra la vista del formulario de modificación de datos de la portada en el panel de administración.
     */
  public function formulario_portada(){ 
      $this->load->model("PortadaModel");
      $datos["tabla"]= $this->PortadaModel->info_portada();
      $datos["vista"]="portada/updatePortada";
      $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
      $this->load->view("admin_template", $datos);
  }

  /**
   * Muestra la vista con los créditos de la aplicación
   */
  public function creditos(){
      $this->load->model('PortadaModel');
      $datos["portada"]=$this->PortadaModel->info_portada();
      $datos["vista"] = "portada/creditos";
      $this->load->view("main_template", $datos);
  }

  
  /**
   * Procesa la modificación del título de la portada
   */
  public function modificar_titulo(){
    $this->load->model("PortadaModel");
    $resultado = $this->PortadaModel->editar_titulo();   
    $datos["tabla"]= $this->PortadaModel->info_portada();
    $datos["vista"]="portada/updatePortada";
    if ($resultado) $datos["mensaje"] = "Título modificado correctamente";
    else $datos["mensaje"] = "Error al modificar el título";
    $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);

    $this->load->view("admin_template", $datos);

  }

  /**
   * Procesa la modificación de la imagen de fondo de la portada
   */
  public function modificar_imagen(){
    $this->load->model("PortadaModel");
    $resultado = $this->PortadaModel->editar_imagen();   
    $datos["tabla"]= $this->PortadaModel->info_portada();      
    $datos["vista"]="portada/updatePortada";
    $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
    if ($resultado) $datos["mensaje"] = "Título modificado correctamente";
    else $datos["mensaje"] = "Error al modificar el título";

    $this->load->view("admin_template", $datos);

  }    
  
}