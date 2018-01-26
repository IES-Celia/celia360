<?php

class escenas extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("Modeloescenas");
    }
    
    
    public function index(){
        $this->showescenas();
    }
    public function showescenas() {
        $datos["tablaEscenas"] = $this->Modeloescenas->getAll();
        $this->load->view("escenas/Escenastable", $datos);
    } 
    
    public function showinsert() {
        $this->load->view("escenas/Insertar");
    }
    
    public function processinsertscene(){
        $resultado = $this->Modeloescenas->insertar();
        if ($resultado == true) {
            $datos["mensaje"] = "La inserci&oacute;n ha sido un &eacute;xito";
            $datos["tablaEscenas"] = $this->Modeloescenas->getAll();
            $this->load->view("escenas/Escenastable", $datos);
        }
        else {
            $datos["error"] = "La inserci&oacute;n ha fallado";
            $datos["tablaEscenas"] = $this->Modeloescenas->getAll();
            $this->load->view("escenas/Escenastable", $datos);
        }
    }
    
    public function deletescene($id){

        $resultado = $this->Modeloescenas->borrar($id);
        
        if ($resultado == 1) {
            $datos["mensaje"] = "Escena borrado correctamente";
            $datos["tablaEscenas"] = $this->Modeloescenas->getAll();
            $this->load->view("escenas/Escenastable", $datos);
            }
        else {
            $datos["error"] = "Error al borrar la escena";
            $datos["tablaEscenas"] = $this->Modeloescenas->getAll();
            $this->load->view("escenas/Escenastable",$datos);
        }
        
    }
    
    public function showupdatescene($id){
    
        $datos["tabla"]= $this->Modeloescenas->getOne($id);
    
        $this->load->view("escenas/Modificar", $datos);
    }
    
    public function processupdatescene($id){
    
            
            $resultado = $this->Modeloescenas->update($id);
            
            if ($resultado == true) {
                $datos["mensaje"] = "La modificaci&oacute;n ha sido un &eacute;xito";
                $datos["tablaEscenas"] = $this->Modeloescenas->getAll();
                $this->load->view("escenas/Escenastable", $datos);
            }
            else {
                $datos["error"] = "La modificaci&oacute;n ha fallado";
                $datos["tablaEscenas"] = $this->Modeloescenas->getAll();
                $this->load->view("escenas/Escenastable", $datos);
            }
        
    }
}
?>
