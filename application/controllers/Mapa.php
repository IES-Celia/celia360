<?php
class Mapa extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("MapaModel","mapa");
        $this->load->model("UsuarioModel");
    }
    public function index(){
        $datos["mapa"] = $this->mapa->cargar_mapa();
        $datos["puntos"] = $this->mapa->cargar_puntos();
        $datos["configuracion"] = $this->mapa->cargar_config();
        $datos["vista"] = "mapa/Administrar_mapa";
        $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
        $this->load->view('admin_template',$datos);
    } 
  
    public function editar_zona(){
        $this->mapa->editar_zona();
        $datos["mapa"] = $this->mapa->cargar_mapa();
        $datos["puntos"] = $this->mapa->cargar_puntos();
        $datos["vista"] = "mapa/Administrar_mapa";
        $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
        $this->load->view('admin_template',$datos);
    }

    public function crear_zona(){
        $this->mapa->crear_zona();
        $datos["mapa"] = $this->mapa->cargar_mapa();
        $datos["puntos"] = $this->mapa->cargar_puntos();
        $datos["vista"] = "mapa/Administrar_mapa";
        $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
        $this->load->view('admin_template',$datos);
    }

    public function eliminar_zona($piso,$piso_maximo){
        $this->mapa->eliminar_zona($piso,$piso_maximo);
        $datos["mapa"] = $this->mapa->cargar_mapa();
        $datos["puntos"] = $this->mapa->cargar_puntos();
        $datos["vista"] = "mapa/Administrar_mapa";
        $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
        $this->load->view('admin_template',$datos);
    }

    public function update_config(){
        if($this->mapa->update_config()==0)
            $datos["error"] = "No se ha modificado la configuración";
        else
            $datos["mensaje"] = "Se ha modificado la configuración";

        $datos["mapa"] = $this->mapa->cargar_mapa();
        $datos["puntos"] = $this->mapa->cargar_puntos();
        $datos["configuracion"] = $this->mapa->cargar_config();
        $datos["vista"] = "mapa/Administrar_mapa";
        $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
        $this->load->view('admin_template',$datos);
        
    }
    public function update_punto(){
        $id = $this->input->post("id_punto");
        $left =  $this->input->post("left");
        $top = $this->input->post("top");

        $resultado = $this->mapa->update_punto($id,$left,$top);

        if($resultado == 1){
            echo "1";
        }else{
           echo "2";
        }
    }
}