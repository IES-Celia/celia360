<?php
class mapaadmin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Mapa','mapa');
    }
    public function index(){
        $datos["mapa"] = $this->mapa->cargar_mapa();
        $datos["puntos"] = $this->mapa->cargar_puntos();
        $datos["vista"] = "administrar_mapa";
        $this->load->view('template_admin',$datos);
    } 
  
    public function crear_zona(){

        $this->mapa->crear_zona();
    }
}