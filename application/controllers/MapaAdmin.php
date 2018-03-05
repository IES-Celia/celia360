<?php
class mapaadmin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Mapa','mapa');
        $this->load->model("UsuarioModel");
    }
    public function index(){
        $datos["mapa"] = $this->mapa->cargar_mapa();
        $datos["puntos"] = $this->mapa->cargar_puntos();
        $datos["vista"] = "Administrar_mapa";
        $datos["vista"] = "MapaAdmin/Administrar_mapa";
        $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
        $this->load->view('template_admin',$datos);
    } 
  
    public function crear_zona(){

        $this->mapa->crear_zona();
    }

    public function usuarios(){

        $datos["vista"] = "usuario/usuarios";
        $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
        $this->load->view('template_admin',$datos);
    }
}