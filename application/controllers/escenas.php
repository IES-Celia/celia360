<?php

class escenas extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("modeloescenas");
    }
    
    
    public function index(){
        $this->showescenas();
    }
    public function showescenas() {
        $datos["tablaEscenas"] = $this->modeloescenas->getAll();
        $this->load->view("escenas/escenastable", $datos);
    } 
    
    public function showinsert() {
        $this->load->view("escenas/insertar");
    }
    
    public function processinsertscene(){
        $resultado = $this->modeloescenas->insertar();
        if ($resultado == true) {
            $datos["mensaje"] = "La inserci&oacute;n ha sido un &eacute;xito";
            $datos["tablaEscenas"] = $this->modeloescenas->getAll();
            $this->load->view("escenas/escenastable", $datos);
        }
        else {
            $datos["error"] = "La inserci&oacute;n ha fallado";
            $datos["tablaEscenas"] = $this->modeloescenas->getAll();
            $this->load->view("escenas/escenastable", $datos);
        }
    }
    
    public function deletescene($id){

        $resultado = $this->modeloescenas->borrar($id);
        
        if ($resultado == 1) {
            $datos["mensaje"] = "Escena borrado correctamente";
            $datos["tablaEscenas"] = $this->modeloescenas->getAll();
            $this->load->view("escenas/escenastable", $datos);
            }
        else {
            $datos["error"] = "Error al borrar la escena";
            $datos["tablaEscenas"] = $this->modeloescenas->getAll();
            $this->load->view("escenas/escenastable",$datos);
        }
        
    }
    
    public function showUpdateScene($id){
    
        $datos["tabla"]= $this->modeloescenas->getOne($id);
    
        $this->load->view("escenas/modificar", $datos);
    }
    
    public function processUpdateScene($id){
    
            
            $resultado = $this->modeloescenas->update($id);
            
            if ($resultado == true) {
                $datos["mensaje"] = "La modificaci&oacute;n ha sido un &eacute;xito";
                $datos["tablaEscenas"] = $this->modeloescenas->getAll();
                $this->load->view("escenas/escenastable", $datos);
            }
            else {
                $datos["error"] = "La modificaci&oacute;n ha fallado";
                $datos["tablaEscenas"] = $this->modeloescenas->getAll();
                $this->load->view("escenas/escenastable", $datos);
            }
        
    }
}
?>