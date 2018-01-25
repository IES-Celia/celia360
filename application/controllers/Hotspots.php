<?php
      
class Hotspots extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model("hotspotsModel");
    }
    
    public function index(){
        $this->showHotspotsTable();
    }
    
    public function showHotspotsTable() {
        $datos["tablaHotspots"] = $this->hotspotsModel->buscarHotspots();
        $this->load->view("hotspots/hotspotsTable", $datos);
    }
    
    public function showinsertHotspot() {
        $this->load->view("hotspots/InsertHotspot");
    }
    
    public function processInsertHotspot(){
        $resultado = $this->hotspotsModel->insertarHotspot();
        if ($resultado == true) {
            $datos["mensaje"] = "La inserci&oacute;n ha sido un &eacute;xito";
            $datos["tablaHotspots"] = $this->hotspotsModel->buscarHotspots();
            $this->load->view("hotspots/hotspotsTable", $datos);
        }
        else {
            $datos["error"] = "La inserci&oacute;n ha fallado";
            $datos["tablaHotspots"] = $this->hotspotsModel->buscarHotspots();
            $this->load->view("hotspots/hotspotsTable", $datos);
        }
    }
    
    public function deleteHotspot($id){

        $resultado = $this->hotspotsModel->borrarHotspot($id);
        
        if ($resultado == 1) {
            $datos["mensaje"] = "Hotspot borrado correctamente";
            $datos["tablaHotspots"] = $this->hotspotsModel->buscarHotspots();
            $this->load->view("hotspots/hotspotsTable", $datos);
            }
        else {
            $datos["error"] = "Error al borrar el hotspot";
            $datos["tablaHotspots"] = $this->hotspotsModel->buscarHotspots();
            $this->load->view("hotspots/hotspotsTable",$datos);
        }
        
    }
    
    public function showUpdateHotspot($id){

        $datos["tabla"]= $this->hotspotsModel->buscarUnHotspot($id);
        print_r($datos);
    
        $this->load->view("hotspots/UpdateHotspot", $datos);
    }
    
    public function processUpdateHotspot(){
    
            
            $id = $_REQUEST["id_hotspot"];
            /**echo "id = $id";**/
            
            $resultado = $this->hotspotsModel->modificarHotspot($id);
            
            if ($resultado == true) {
                $datos["mensaje"] = "La modificaci&oacute;n ha sido un &eacute;xito";
                $datos["tablaHotspots"] = $this->hotspotsModel->buscarHotspots();
                $this->load->view("hotspots/hotspotsTable", $datos);
            }
            else {
                $datos["error"] = "La modificaci&oacute;n ha fallado";
                $datos["tablaHotspots"] = $this->hotspotsModel->buscarHotspots();
                $this->load->view("hotspots/hotspotsTable", $datos);
            }
        
    }


}