<?php

defined('BASEPATH') OR exit('No se permite el acceso directo al script');

class escenas extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("EscenasModel");
        $this->load->model("UsuarioModel");
        $this->load->model("MapaModel","mapa");
    }
    
    public function index(){
        $this->showescenas();
    }
    
    public function showescenas() {   
        $datos["tablaEscenas"] = $this->EscenasModel->getAll();
        $datos["mapa"] = $this->mapa->cargar_mapa();
        $datos["puntos"] = $this->mapa->cargar_puntos();
        $datos["vista"]="escenas/Escenastable";
        $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
        $this->load->view('admin_template', $datos);
    } 
    
    public function showinsert($piso_mapa, $left_mapa, $top_mapa) {
        $datos["piso_mapa"] = $piso_mapa;
        $datos["left_mapa"] = $left_mapa;
        $datos["top_mapa"] = $top_mapa;
        $datos["vista"]="escenas/Insertar";
        $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
        $this->load->view('admin_template', $datos);
    }
    
    public function processinsertscene(){
        $resultado = $this->EscenasModel->insertar();
        if ($resultado > 0) {
            $datos["mensaje"] = "La inserci&oacute;n ha sido un &eacute;xito";
            $datos["tablaEscenas"] = $this->EscenasModel->getAll();
            $datos["mapa"] = $this->mapa->cargar_mapa();
            $datos["puntos"] = $this->mapa->cargar_puntos();
            $datos["vista"]="escenas/Escenastable";
            $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
            $this->load->view('admin_template', $datos);
        }
        else {
            $datos["error"] = "La inserci&oacute;n ha fallado";
            $datos["tablaEscenas"] = $this->EscenasModel->getAll();
            $datos["mapa"] = $this->mapa->cargar_mapa();
            $datos["puntos"] = $this->mapa->cargar_puntos();
            $datos["vista"]="escenas/Escenastable";
            $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
            $this->load->view("admin_template", $datos);
        }
    }

    public function deletesceneajax($cod){

        $resultado = $this->EscenasModel->borrar($cod);
        if ($resultado != 0) echo $cod;
        else echo " ";
    }
    
    
    public function deletescene($cod){

        $resultado = $this->EscenasModel->borrar($cod);
        
        if ($resultado > 1) {
            $datos["mensaje"] = "Escena borrado correctamente";
            $datos["tablaEscenas"] = $this->EscenasModel->getAll();
            $datos["vista"]="escenas/Escenastable";
            $datos["mapa"] = $this->mapa->cargar_mapa();
            $datos["puntos"] = $this->mapa->cargar_puntos();
            $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
            $this->load->view('admin_template', $datos);
            }
        else {
            $datos["error"] = "Error al borrar la escena";
            $datos["tablaEscenas"] = $this->EscenasModel->getAll();
            $datos["vista"]="escenas/Escenastable";
            $datos["mapa"] = $this->mapa->cargar_mapa();
            $datos["puntos"] = $this->mapa->cargar_puntos();
            $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
            $this->load->view("admin_template",$datos);
        }
        
    }
    
    public function showupdatescene($cod){
    
        $datos["tabla"]= $this->EscenasModel->getOne($cod);
        $datos["vista"]="escenas/Modificar";
        $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
        $this->load->view('admin_template', $datos);
    }
    
    public function processupdatescene(){
    
        $cod=$_REQUEST['cod'];
            $resultado = $this->EscenasModel->update($cod);
            
            if ($resultado == true) {
                $datos["mensaje"] = "La modificaci&oacute;n ha sido un &eacute;xito";
                $datos["tablaEscenas"] = $this->EscenasModel->getAll();
                $datos["vista"]="escenas/Escenastable";
                $datos["mapa"] = $this->mapa->cargar_mapa();
                $datos["puntos"] = $this->mapa->cargar_puntos();
                $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
                $this->load->view('admin_template', $datos);
            }
            else {
                $datos["error"] = "La modificaci&oacute;n ha fallado";
                $datos["tablaEscenas"] = $this->EscenasModel->getAll();
                $datos["vista"]="escenas/Escenastable";
                $datos["mapa"] = $this->mapa->cargar_mapa();
                $datos["puntos"] = $this->mapa->cargar_puntos();
                $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
                $this->load->view('admin_template', $datos);
            }
        
    }

    
  
    /**
     * Carga una escena 360 con pannellum para insertar hotspots en ella.
     * @param String $escenaInicial Código de la escena que se va a cargar.
     * @param String $redireccion Controlador al que saltaremos después de insertar el hotspot.
     * @param int $piso Identificador del piso donde está la escena.
     */
    public function cargar_escena($escenaInicial, $redireccion, $piso = null){
        $this->load->library('session');
        if(isset($piso) && is_numeric($piso)){
            $this->session->piso=$piso; 
        }
        
        $redireccion = site_url("/hotspots/".$redireccion."/");
        $datos["redireccion_jotpoch"]= $redireccion;
	$datos["escenaInicial"] = $escenaInicial;
        $datos["idhotspot"]= "vacio";
		$this->load->view("escenas/jotpoch", $datos);	
	}
    
    /**
     * Carga una escena 360 con pannellum para editar los hotspots que hay en ella.
     * @param String $escenaInicial Código de la escena que se va a cargar.
     * @param String $redireccion Controlador al que saltaremos después de insertar el hotspot.
     * @param int $idhotspot El hotspot que se va a modificar.
     */
    public function cargar_escena_modificar($escenaInicial, $redireccion, $idhotspot){
        $redireccion = site_url("/hotspots/".$redireccion."/");
        echo $redireccion;
        $datos["redireccion_jotpoch"]= $redireccion;
	$datos["escenaInicial"] = $escenaInicial;
        $datos["idhotspot"]= $idhotspot;
	$this->load->view("escenas/jotpoch", $datos);	
    }



}

?>
