<?php

defined('BASEPATH') OR exit('No se permite el acceso directo al script');

class escenas extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("Modeloescenas");
    }
    
    
    public function index(){
        $this->showescenas();
    }
    public function showescenas() {
        $this->load->model('Mapa','mapa');
        $datos["tablaEscenas"] = $this->Modeloescenas->getAll();
        $datos["vista"]="escenas/Escenastable";
        $datos["mapa"] = $this->mapa->cargar_mapa();
        $datos["puntos"] = $this->mapa->cargar_puntos();
        $this->load->view('template_admin', $datos);
    } 
    
    public function showinsert() {
        $data["vista"]="escenas/Insertar";
        $this->load->view('template_admin', $data);
    }
    
    public function processinsertscene(){
        $resultado = $this->Modeloescenas->insertar();
        if ($resultado == true) {
            $datos["mensaje"] = "La inserci&oacute;n ha sido un &eacute;xito";
            $datos["tablaEscenas"] = $this->Modeloescenas->getAll();
            $datos["vista"]="escenas/Escenastable";
            $this->load->view('template_admin', $datos);
        }
        else {
            $datos["error"] = "La inserci&oacute;n ha fallado";
            $datos["tablaEscenas"] = $this->Modeloescenas->getAll();
            $datos["vista"]="escenas/Escenastable";
            $this->load->view("template_admin", $datos);
        }
    }
    
    public function deletescene($id){

        $resultado = $this->Modeloescenas->borrar($id);
        
        if ($resultado == 1) {
            $datos["mensaje"] = "Escena borrado correctamente";
            $datos["tablaEscenas"] = $this->Modeloescenas->getAll();
            $datos["vista"]="escenas/Escenastable";
            $this->load->view('template_admin', $datos);
            }
        else {
            $datos["error"] = "Error al borrar la escena";
            $datos["tablaEscenas"] = $this->Modeloescenas->getAll();
            $datos["vista"]="escenas/Escenastable";
            $this->load->view("template_admin",$datos);
        }
        
    }
    
    public function showupdatescene($id){
    
        $datos["tabla"]= $this->Modeloescenas->getOne($id);
        $datos["vista"]="escenas/Modificar";
    
        $this->load->view('template_admin', $datos);
    }
    
    public function processupdatescene($id){
    
            
            $resultado = $this->Modeloescenas->update($id);
            
            if ($resultado == true) {
                $datos["mensaje"] = "La modificaci&oacute;n ha sido un &eacute;xito";
                $datos["tablaEscenas"] = $this->Modeloescenas->getAll();
                $datos["vista"]="escenas/Escenastable";
                $this->load->view('template_admin', $datos);
            }
            else {
                $datos["error"] = "La modificaci&oacute;n ha fallado";
                $datos["tablaEscenas"] = $this->Modeloescenas->getAll();
                $datos["vista"]="escenas/Escenastable";
                $this->load->view('template_admin', $datos);
            }
        
    }
}
?>
