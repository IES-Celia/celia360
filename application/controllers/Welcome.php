<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function cargar_escena($escenaInicial, $redireccion){
        $redireccion = site_url("/hotspots/".$redireccion."/");
        $datos["redireccion_jotpoch"]= $redireccion;
		$datos["escenaInicial"] = $escenaInicial;
		$this->load->view("jotpoch", $datos);	
	}
    
    // sobrecargando la funcion cargar_escena para añadirle funcionalidad para modificar hotspots
    public function cargar_escena_modificar($escenaInicial, $redireccion, $idhotspot){
        $redireccion = site_url("/hotspots/".$redireccion."/");
        $datos["redireccion_jotpoch"]= $redireccion;
		$datos["escenaInicial"] = $escenaInicial;
        $datos["idhotspot"]= $idhotspot;
		$this->load->view("jotpoch", $datos);	
	}
    
}
