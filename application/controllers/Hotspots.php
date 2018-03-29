<?php
      
defined('BASEPATH') OR exit('No se permite el acceso directo al script');

class Hotspots extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model("hotspotsModel");
        $this->load->model("UsuarioModel");
        $this->load->model("MapaModel","mapa");
    }
    
    public function index(){
        $this->show_hotspots_table();
    }
    
    public function show_hotspots_table() {
        $datos["tablaHotspots"] = $this->hotspotsModel->buscarHotspots();
        $datos["vista"]="hotspots/hotspotsTable";
        $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
        $this->load->view("admin_template", $datos);
    }
    
    public function show_insert_hotspot($pitch, $yaw, $idescena) {
        $this->load->model("MapaModel","mapa");
        $datos["documentos"]= $this->hotspotsModel->getAllDocumentos();
	$datos["pitch"]= $pitch;
        $datos["yaw"]= $yaw;
        $datos["id_scene"]= $idescena;
        $datos["mapa"] = $this->mapa->cargar_mapa();
        $datos["puntos"] = $this->mapa->cargar_puntos();
        $datos["vista"]="hotspots/insertHotspot";
        $datos["id_hotspot"] = $this->hotspotsModel->ultimo_hotspot()+1;
        $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
        $this->load->view('admin_template', $datos);
    }
    
    // de miguel, para que funcione el jotpoch
    
    public function update_hotspot_pitchyaw($pitch, $yaw, $idescena, $idhotspot) {
	    $datos["pitch"]= $pitch;
        $datos["yaw"]= $yaw;
        $datos["id_scene"]= $idescena;
        $datos["tablaEscenas"] = $this->EscenasModel->getAll();
        $datos["vista"]="escenas/Escenastable";
		$datos["mapa"] = $this->mapa->cargar_mapa();
        $datos["puntos"] = $this->mapa->cargar_puntos();
        $datos["resultado"] = $this->hotspotsModel->modificarPitchYaw($pitch, $yaw, $idhotspot);
        $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
        $this->load->view('admin_template', $datos);
    }
    
     public function update_escena_pitchyaw($pitch, $yaw, $codescena) {
	    $datos["pitch"]= $pitch;
        $datos["yaw"]= $yaw;
        $datos["resultado"] = $this->hotspotsModel->modificarPitchYawEscena($pitch, $yaw, $codescena);
        $datos["tablaEscenas"] = $this->EscenasModel->getAll();
        $datos["vista"]="escenas/Escenastable";
		$datos["mapa"] = $this->mapa->cargar_mapa();
		$datos["puntos"] = $this->mapa->cargar_puntos();
        $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
        $this->load->view('admin_template', $datos);
    }
    
     public function update_hotspot_targets($pitch, $yaw, $codescena, $idhotspot) {
	    $datos["pitch"]= $pitch;
        $datos["yaw"]= $yaw;
        $datos["tablaEscenas"] = $this->EscenasModel->getAll();
        $datos["vista"]="escenas/Escenastable";
        $datos["resultado"] = $this->hotspotsModel->modificarTargetsHotspot($pitch, $yaw, $codescena, $idhotspot);
        $datos["mapa"] = $this->mapa->cargar_mapa();
		$datos["puntos"] = $this->mapa->cargar_puntos();
        $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
        $this->load->view('admin_template', $datos);
    }
////loli

    public function updateHotspotAudio() {
        
        $id = $this->input->post_get("id_hotspot");
        $aud = $this->input->post_get("clickHandlerArgs");
        $resultado = $this->hotspotsModel->modificarpuntoaudio($id, $aud);
        $cambio = $this->input->post_get("sceneId");
        if ($resultado == true) {
            redirect('escenas/cargar_escena/' . $cambio . '/show_insert_hotspot/');
        } else {
            $datos["error"] = "No se ha podido modificar el audio";
            $datos["tablaHotspots"] = $this->hotspotsModel->buscarHotspots();
            $datos["vista"] = "hotspots/hotspotsTable";
            $datos["permiso"] = $this->UsuarioModel->comprueba_permisos($datos["vista"]);
            $this->load->view('admin_template', $datos);
        }
    }

    // fin
    
    public function process_insert_scene(){
        $resultado = $this->hotspotsModel->insertarHotspotEscena();
        if ($resultado == true) {
            $anda=$this->input->post_get("id_scene");
            redirect('escenas/cargar_escena/'.$anda.'/show_insert_hotspot/');
        }else {
            $datos["error"] = "La inserci&oacute;n ha fallado";
            $datos["tablaHotspots"] = $this->hotspotsModel->buscarHotspots();
            $datos["vista"]="hotspots/hotspotsTable";
            $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
            $this->load->view('admin_template', $datos);
        }
    }
    
    public function delete_hotspot($id){

        $resultado = $this->hotspotsModel->borrarHotspot($id);
        redirect('escenas');
        
       /* if ($resultado == 1) {
            $datos["mensaje"] = "Hotspot borrado correctamente";
            $datos["tablaHotspots"] = $this->hotspotsModel->buscarHotspots();
            $datos["vista"]="hotspots/hotspotsTable";
            $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
            $this->load->view('admin_template', $datos);
            }
        else {
            $datos["error"] = "Error al borrar el hotspot";
            $datos["tablaHotspots"] = $this->hotspotsModel->buscarHotspots();
            $datos["vista"]="hotspots/hotspotsTable";
            $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
            $this->load->view('admin_template',$datos);
        }*/
    }
    
    public function show_update_hotspot($id,$escena_inicial = null){
        $datos["tabla"]= $this->hotspotsModel->buscarUnHotspot($id);
		
		if ($datos["tabla"][0]["clickHandlerFunc"] == "puntos") {
            $datos["vista"]="hotspots/updateHotspot";
            if(isset($escena_inicial)){
                $datos["escena_inicial"]=$escena_inicial;
            }
		}
		if ($datos["tabla"][0]["clickHandlerFunc"] == "video") {
			$datos["vista"]="hotspots/updateHotsportVideo";
 		}
		if ($datos["tabla"][0]["clickHandlerFunc"] == "musica") {
			$datos["vista"]="hotspots/updateHotspotAudio";
 		}
		if ($datos["tabla"][0]["clickHandlerFunc"] == "panelInformacion") {
			$datos["vista"]="hotspots/updateHotspotPanel";
 		}
		if ($datos["tabla"][0]["clickHandlerFunc"] == "escaleras") {
			$datos["vista"]="hotspots/updateHotspotEscaleras";
 		}
        $datos["codigo_escena"]=$this->hotspotsModel->cargar_codigo_escena($id);
        $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
        $datos["mapa"] = $this->mapa->cargar_mapa();
        $datos["puntos"] = $this->mapa->cargar_puntos();
        $this->load->view('admin_template', $datos);
    }
    
    public function updateHotsportVideo(){
              $id = $this->input->post_get("id_hotspot");
			  $vid = $this->input->post_get("clickHandlerArgs");
			$resultado=$this->hotspotsModel->modificarpuntovideo($id, $vid);
		$anda=$this->input->post_get("sceneId");
		if ($resultado == true) {
			redirect('escenas/cargar_escena/'.$anda.'/show_insert_hotspot/');
        }else {
            $datos["error"] = "a fallado el cambio de video";
            $datos["tablaHotspots"] = $this->hotspotsModel->buscarHotspots();
            $datos["vista"]="hotspots/hotspotsTable";
            $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
            $this->load->view('admin_template', $datos);
        }
	}
    
    // trabajar los redirect
    public function process_update_hotspot(){
            $id = $_REQUEST["id_hotspot"];
            $tipoHotspot = $_REQUEST["cssClass"];
            if($tipoHotspot == "custom-hotspot-info")
                $resultado = $this->hotspotsModel->modificarHotspotPanel($id);
            else if($tipoHotspot == "custom-hotspot-salto")
                $resultado = $this->hotspotsModel->modificarHotspot($id);
            
            if ($resultado == true) {
                $datos["mensaje"] = "La modificaci&oacute;n ha sido un &eacute;xito";
                redirect('escenas');
                $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
                $this->load->view('admin_template', $datos);
            }
            else {
                $datos["error"] = "La modificaci&oacute;n ha fallado";
                redirect('escenas');
                $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
                $this->load->view('admin_template', $datos);
            }
        
    }
  
////////////////////////////Zygis - MOVIDAS DEL CMS//////////////////////////

  public function process_insert_panel(){
            $joshua = $this->hotspotsModel->insertarHotspotPanel();
            $datos["mensaje"] = "La inserci&oacute;n ha sido un &eacute;xito";
            $datos["vista"]="hotspots/hotspotPanel";
            $datos["idhs"]=$joshua[0];
            $datos["escena_actual"]=$joshua[1];
            //cargar el modelo
            $this->load->model("ImagenModel");
            //acciones para ver el listado de imagenes
            $datos["lista_imagenes"] = $this->ImagenModel->buscar_todo();
            $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
            $this->load->view('admin_template', $datos);
    }
  
    public function process_insert_escaleras(){
            $joshua = $this->hotspotsModel->insertarHotspotEscalera();
            $datos["mensaje"] = "La inserci&oacute;n ha sido un &eacute;xito";
            $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
            redirect('escenas');
    }
  
  public function show_panel_info(){
    //cargar el modelo
    $this->load->model("ImagenModel");
    //acciones para ver el listado de imagenes
    $datos["lista_imagenes"] = $this->ImagenModel->buscar_todo();
    //Se lo paso a la vista
    $datos["vista"]="hotspots/hotspotPanel";
    $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
    $this->load->view('admin_template', $datos); 
  }
  
  public function add_imgs_hotspot(){
    //Añade las imagenes a la base de datos
    $resultado = $this->hotspotsModel->insertar_imagenes_hotspot();
    echo base_url("escenas/cargar_escena/".$resultado[1]."/show_insert_hotspot/null");
   
  }
  
  public function modify_panel_info($idhs){
    $datos["idhs"] = $idhs;
    $datos["imagenes_seleccionadas"]=$this->hotspotsModel->get_imgs_asociadas_al_hotspot($idhs);
    //cargar el modelo
    $this->load->model("ImagenModel");
    //acciones para ver el listado de imagenes
    $datos["lista_imagenes"] = $this->ImagenModel->buscar_todo();
    $datos["vista"]="hotspots/hotspotPanel";
    $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
    $this->load->view('admin_template', $datos); 
 }
  
 public function load_panel(){
  $id = $_REQUEST["id_hotspost"];
  $resultado = $this->hotspotsModel->cargar_imagenes_panel($id);
  //TODO: añadir mensaje de la situacion
 }

 public function load_video(){
    $id = $_REQUEST["idVideo"];
    $resultado = $this->hotspotsModel->cargar_video($id);
    echo $resultado;
    //TODO: añadir mensaje de la situacion
}
public function process_insert_video(){
        $resultado = $this->hotspotsModel->insertarHotspotVideo();
		$anda=$this->input->post_get("id_scene");
        if ($resultado == true) {
			echo $anda;
			redirect('escenas/cargar_escena/'.$anda.'/show_insert_hotspot/');
            /*$datos["mensaje"] = "La inserci&oacute;n ha sido un &eacute;xito";
            $datos["tablaHotspots"] = $this->hotspotsModel->buscarHotspots();
            $datos["vista"]="hotspots/hotspotsTable";
            $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
            $this->load->view('admin_template', $datos);*/
        }else {
            $datos["error"] = "La inserci&oacute;n ha fallado";
            $datos["tablaHotspots"] = $this->hotspotsModel->buscarHotspots();
            $datos["vista"]="hotspots/hotspotsTable";
            $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
            $this->load->view('admin_template', $datos);
        }
    }

public function load_audio(){
    $id = $_REQUEST["id_hotspot"];
    $resultado = $this->hotspotsModel->cargar_audio($id);
    //TODO: añadir mensaje de la situacion
}
///loli
    public function process_insert_audio() {

        $resultado = $this->hotspotsModel->insertarHotspotAudio();
        $cambio = $this->input->post_get("id_scene");

        if ($resultado == true) {

            redirect('escenas/cargar_escena/' . $cambio . '/show_insert_hotspot/');

        } else {
            $datos["error"] = "La inserci&oacute;n ha fallado";
            $datos["tablaHotspots"] = $this->hotspotsModel->buscarHotspots();
            $datos["vista"] = "hotspots/hotspotsTable";
            $datos["permiso"] = $this->UsuarioModel->comprueba_permisos($datos["vista"]);
            $this->load->view('admin_template', $datos);
        }
    }

    public function process_insert_hotspot(){
    $res=$this->hotspotsModel->process_insert_hotspot();
     if($res){
         echo"se a insertado correctamente";
         $datos["tablaHotspots"] = $this->hotspotsModel->buscarHotspots();
         $datos["vista"]="hotspots/hotspotsTable";
         $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
         $this->load->view('admin_template', $datos);
         
     }else{
         echo"fallo al insertar hotspot";
     }
 }

 //Borra ultimo hotspot
 public function borrarUltimo(){
    $ultimo = $this->hotspotsModel->ultimo_hotspot();
    $resultado = $this->hotspotsModel->borrarHotspot($ultimo);
    echo $resultado;

 }
}
