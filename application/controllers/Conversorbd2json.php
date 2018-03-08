<?php
class Conversorbd2json extends CI_Controller {

  public function index(){
    $this->load->model("Mapa","mapa");
    $this->load->model('BibliotecaModel', 'biblioteca');
    $datos["vista"] = "portada";
    $datos["libros"] = $this->biblioteca->get_info();
    $datos["mapa"] = $this->mapa->cargar_mapa();
    $datos["puntos"] = $this->mapa->cargar_puntos();
    $datos["config_mapa"] = $this->mapa->cargar_config();    
    $this->load->view("main_template", $datos);
  }

  public function get_json_libre() {
    $this->load->model("conversorjson");
    $json = $this->conversorjson->get_datos_libre();
    echo $json;
  }
  
   public function get_json_guiada() {
    $this->load->model("conversorjson");
    $json = $this->conversorjson->get_datos_guiada();
    echo $json;
  }
  
    public function get_json_destacados() {
    
  }
  
    public function get_json_evacuacion() {
    
  }
  
  public function get_json_plataforma($escenaInicial) {
      $this->load->model("conversorjson");
      $json = $this->conversorjson->get_datos_plataforma($escenaInicial);
      echo $json;
  }
  
  
}