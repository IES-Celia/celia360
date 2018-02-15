<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {



	public function index(){

	}

	public function cargar_escena($escenaInicial, $redireccion){
        $redireccion = site_url("/hotspots/".$redireccion."/");
        $datos["redireccion_jotpoch"]= $redireccion;
		$datos["escenaInicial"] = $escenaInicial;
		$this->load->view("jotpoch", $datos);	
	}
    
    
    



}
