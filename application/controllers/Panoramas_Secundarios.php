<?php 
class Panoramas_Secundarios extends CI_Controller {

public function __construct() {
    parent::__construct();
    $this->load->model("EscenasModel");
    $this->load->model("UsuarioModel");
    $this->load->model("MapaModel","mapa");
}

public function show_panoramas_secundarios($codigo_escena){ //cargo la vista para insertar panoramas secundarios
    $datos['datos_escena'] = $this->EscenasModel->getOne($codigo_escena);
    $datos["vista"]="escenas/panoramas_secundarios";
    $datos['permiso'] = true; //preguntar a alfredo
    $this->load->view("admin_template",$datos);
}

/*public function insertSecondaryPanorama($datos){ //datos es un array
 
    move_uploaded_file($_FILES['file']['tmp_name'], 'uploads/'.$_FILES['file']['name']);
    echo "File uploaded successfully.";
}*/

}

?>