<?php

defined('BASEPATH') OR exit('No se permite el acceso directo al script');

class escenas extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("Modeloescenas");
        $this->load->model("UsuarioModel");
        $this->load->model('Mapa','mapa');
    }
    
    
    public function index(){
        $this->showescenas();
    }
    
    public function showescenas() {
        
               
        $datos["tablaEscenas"] = $this->Modeloescenas->getAll();
        $datos["mapa"] = $this->mapa->cargar_mapa();
        $datos["puntos"] = $this->mapa->cargar_puntos();
        $datos["vista"]="escenas/Escenastable";
        $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
        $this->load->view('template_admin', $datos);
    } 
    
    public function showinsert($id_mapa, $left_mapa, $top_mapa) {
        $datos["id_mapa"] = $id_mapa;
        $datos["left_mapa"] = $left_mapa;
        $datos["top_mapa"] = $top_mapa;
        $datos["vista"]="escenas/Insertar";
        $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
        $this->load->view('template_admin', $datos);
    }
    
    public function processinsertscene(){
        $resultado = $this->Modeloescenas->insertar();
        if ($resultado == true) {
            $datos["mensaje"] = "La inserci&oacute;n ha sido un &eacute;xito";
            $datos["tablaEscenas"] = $this->Modeloescenas->getAll();
            $datos["mapa"] = $this->mapa->cargar_mapa();
            $datos["puntos"] = $this->mapa->cargar_puntos();
            $datos["vista"]="escenas/Escenastable";
            $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
            $this->load->view('template_admin', $datos);
        }
        else {
            $datos["error"] = "La inserci&oacute;n ha fallado";
            $datos["tablaEscenas"] = $this->Modeloescenas->getAll();
            $datos["mapa"] = $this->mapa->cargar_mapa();
            $datos["puntos"] = $this->mapa->cargar_puntos();
            $datos["vista"]="escenas/Escenastable";
            $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
            $this->load->view("template_admin", $datos);
        }
    }

    public function deletesceneajax($cod){

        $resultado = $this->Modeloescenas->borrar($cod);
        if ($resultado != 0) echo $cod;
        else echo " ";
    }
    
    
    public function deletescene($cod){

        $resultado = $this->Modeloescenas->borrar($cod);
        
        if ($resultado > 1) {
            $datos["mensaje"] = "Escena borrado correctamente";
            $datos["tablaEscenas"] = $this->Modeloescenas->getAll();
            $datos["vista"]="escenas/Escenastable";
            $datos["mapa"] = $this->mapa->cargar_mapa();
            $datos["puntos"] = $this->mapa->cargar_puntos();
            $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
            $this->load->view('template_admin', $datos);
            }
        else {
            $datos["error"] = "Error al borrar la escena";
            $datos["tablaEscenas"] = $this->Modeloescenas->getAll();
            $datos["vista"]="escenas/Escenastable";
            $datos["mapa"] = $this->mapa->cargar_mapa();
            $datos["puntos"] = $this->mapa->cargar_puntos();
            $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
            $this->load->view("template_admin",$datos);
        }
        
    }
    
    public function showupdatescene($cod){
    
        $datos["tabla"]= $this->Modeloescenas->getOne($cod);
        $datos["vista"]="escenas/Modificar";
        $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
        $this->load->view('template_admin', $datos);
    }
    
    public function processupdatescene(){
    
        $cod=$_REQUEST['cod'];
            $resultado = $this->Modeloescenas->update($cod);
            
            if ($resultado == true) {
                $datos["mensaje"] = "La modificaci&oacute;n ha sido un &eacute;xito";
                $datos["tablaEscenas"] = $this->Modeloescenas->getAll();
                $datos["vista"]="escenas/Escenastable";
                $datos["mapa"] = $this->mapa->cargar_mapa();
                $datos["puntos"] = $this->mapa->cargar_puntos();
                $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
                $this->load->view('template_admin', $datos);
            }
            else {
                $datos["error"] = "La modificaci&oacute;n ha fallado";
                $datos["tablaEscenas"] = $this->Modeloescenas->getAll();
                $datos["vista"]="escenas/Escenastable";
                $datos["mapa"] = $this->mapa->cargar_mapa();
                $datos["puntos"] = $this->mapa->cargar_puntos();
                $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
                $this->load->view('template_admin', $datos);
            }
        
    }


}

?>
