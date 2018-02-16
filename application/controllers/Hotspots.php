<?php
      
defined('BASEPATH') OR exit('No se permite el acceso directo al script');

class Hotspots extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model("hotspotsModel");
        $this->load->model("UsuarioModel");
    }
    
    public function index(){
        $this->show_hotspots_table();
    }
    
    public function show_hotspots_table() {
        $datos["tablaHotspots"] = $this->hotspotsModel->buscarHotspots();
        $datos["vista"]="hotspots/hotspotsTable";
        $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
        $this->load->view("template_admin", $datos);
    }
    
    public function show_insert_hotspot($pitch, $yaw, $idescena) {
	    $datos["pitch"]= $pitch;
        $datos["yaw"]= $yaw;
        $datos["id_scene"]= $idescena;
        $datos["vista"]="hotspots/insertHotspot";
        $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
        $this->load->view('template_admin', $datos);
    }
    
    public function process_insert_scene(){
        $resultado = $this->hotspotsModel->insertarHotspotEscena();
        if ($resultado == true) {
            $datos["mensaje"] = "La inserci&oacute;n ha sido un &eacute;xito";
            $datos["tablaHotspots"] = $this->hotspotsModel->buscarHotspots();
            $datos["vista"]="hotspots/hotspotsTable";
            $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
            $this->load->view('template_admin', $datos);
        }else {
            $datos["error"] = "La inserci&oacute;n ha fallado";
            $datos["tablaHotspots"] = $this->hotspotsModel->buscarHotspots();
            $datos["vista"]="hotspots/hotspotsTable";
            $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
            $this->load->view('template_admin', $datos);
        }
    }
    
    
    public function delete_hotspot($id){

        $resultado = $this->hotspotsModel->borrarHotspot($id);
        
        if ($resultado == 1) {
            $datos["mensaje"] = "Hotspot borrado correctamente";
            $datos["tablaHotspots"] = $this->hotspotsModel->buscarHotspots();
            $datos["vista"]="hotspots/hotspotsTable";
            $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
            $this->load->view('template_admin', $datos);
            }
        else {
            $datos["error"] = "Error al borrar el hotspot";
            $datos["tablaHotspots"] = $this->hotspotsModel->buscarHotspots();
            $datos["vista"]="hotspots/hotspotsTable";
            $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
            $this->load->view('template_admin',$datos);
        }
    }
    
    public function show_update_hotspot($id){

        $datos["tabla"]= $this->hotspotsModel->buscarUnHotspot($id);
        print_r($datos);
        $datos["vista"]="hotspots/updateHotspot";
        $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
        $this->load->view('template_admin', $datos);
    }
    
    public function process_update_hotspot(){
    
            
            $id = $_REQUEST["id_hotspot"];
            /**echo "id = $id";**/
            
            $resultado = $this->hotspotsModel->modificarHotspot($id);
            
            if ($resultado == true) {
                $datos["mensaje"] = "La modificaci&oacute;n ha sido un &eacute;xito";
                $datos["tablaHotspots"] = $this->hotspotsModel->buscarHotspots();
                $datos["vista"]="hotspots/hotspotsTable";
                $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
                $this->load->view('template_admin', $datos);
            }
            else {
                $datos["error"] = "La modificaci&oacute;n ha fallado";
                $datos["tablaHotspots"] = $this->hotspotsModel->buscarHotspots();
                $datos["vista"]="hotspots/hotspotsTable";
                $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
                $this->load->view('template_admin', $datos);
            }
        
    }
  
////////////////////////////Zygis - MOVIDAS DEL CMS//////////////////////////
  
  public function show_panel_info(){
    //cargar el modelo
    $this->load->model("Img");
    //acciones para ver el listado de imagenes
    $datos["lista_imagenes"] = $this->Img->buscar_todo();
    $datos["id_hotspot"] = 8;
    //Se lo paso a la vista
    $datos["vista"]="hotspots/hotspotPanel";
    $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
    $this->load->view('template_admin', $datos); 
  }
  
  public function add_imgs_hotspot(){
    //Añade las imagenes a la base de datos
    $resultado = $this->hotspotsModel->insertar_imagenes_hotspot();
    //TODO: añadir mensaje de la situacion.
  }
  
 public function modify_panel_info($idhs){
   //TODO:Modificar el panel de informacion
 }
  
 public function load_panel(){
  //Cargar el panel de informacion en pannellum
  $resultado = $this->hotspotsModel->cargar_imagenes_panel();
  //TODO: añadir mensaje de la situacion
 }

 //LOLI------------------
 
    public function process_insert_audio(){
        $resultado = $this->hotspotsModel->insertarHotspotAudio();
        if ($resultado == true) {
            $datos["mensaje"] = "La inserci&oacute;n ha sido un &eacute;xito";
            $datos["tablaHotspots"] = $this->hotspotsModel->buscarHotspots();
            $datos["vista"]="hotspots/hotspotsTable";
            $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
            $this->load->view('template_admin', $datos);
        }else {
            $datos["error"] = "La inserci&oacute;n ha fallado";
            $datos["tablaHotspots"] = $this->hotspotsModel->buscarHotspots();
            $datos["vista"]="hotspots/hotspotsTable";
            $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
            $this->load->view('template_admin', $datos);
        }
    }
 //LOLI------------------------------
}
