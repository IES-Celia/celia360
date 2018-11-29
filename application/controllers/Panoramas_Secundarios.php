<?php 
class Panoramas_Secundarios extends CI_Controller {

public function __construct() {
    parent::__construct();
    $this->load->model("EscenasModel");
    $this->load->model("UsuarioModel");
    $this->load->model("PanoramasSecundariosModel");
}

public function show_panoramas_secundarios($codigo_escena){ //cargo la vista para insertar panoramas secundarios
    $datos['datos_escena'] = $this->EscenasModel->getOneId($codigo_escena);
    $datos["vista"]="escenas/panoramas_secundarios";
    $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
    $this->load->view("admin_template",$datos);
}


public function insertSecondaryPanorama($id){ //datos es un array
    $res = $this->PanoramasSecundariosModel->insertSecondaryPanoramas($id);
    $incorrectas = 0;
        for($i=0;$i<count($res);$i++){
            if($res[$i] == 0){
                $incorrectas++;
            }
        }
        echo $incorrectas; //devuelvo incorrectas y gestiono con ajax si es 0 o no
            
    }
}

?>