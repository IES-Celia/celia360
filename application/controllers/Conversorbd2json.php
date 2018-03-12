<?php
class Conversorbd2json extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->model("conversorjson");
    } 

  public function index(){
    $this->load->model("Mapa","mapa");
    $this->load->model('BibliotecaModel', 'biblioteca');
    $this->load->model('PortadaModel');
    $datos["vista"] = "portada";
    $datos["portada"]=$this->PortadaModel->info_portada();
    $datos["libros"] = $this->biblioteca->get_info();
    $datos["mapa"] = $this->mapa->cargar_mapa();
    $datos["puntos"] = $this->mapa->cargar_puntos();
    $datos["config_mapa"] = $this->mapa->cargar_config();    
    $this->load->view("main_template", $datos);
  }

  public function get_json_libre() {
    $json = $this->conversorjson->get_datos_libre();
    echo $json;
  }
    
    // maravilloso
  
   public function get_json_guiada() {
    $json = $this->conversorjson->get_datos_guiada();
    echo $json;
  }
  
    public function get_json_destacados() {
    $json = $this->conversorjson->get_datos_destacado();
    echo $json;
  }
     // maravilloso
      public function get_json_plataforma($escenaInicial) {
          $json = $this->conversorjson->get_datos_plataforma($escenaInicial);
          echo $json;
      }

    
    // 
    // Modificar datos Portada
    // 
    
  public function formulario_portada(){
      $this->load->model("PortadaModel");
      $datos["tabla"]= $this->PortadaModel->info_portada();
      $this->load->view("updatePortada", $datos);
  }
  
  public function modificar_titulo(){
    $this->load->model("PortadaModel");
    $resultado = $this->PortadaModel->editar_titulo();   
  }

  public function editar_imagen(){
    $this->load->model("PortadaModel");
    $resultado = $this->PortadaModel->editar_celda();   
  }    
  
  
}