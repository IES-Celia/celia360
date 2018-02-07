<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {



	public function index(){

	}

	public function cargar_escena($escenaInicial){
		$datos["escenaInicial"] = $escenaInicial;
		$this->load->view("jotpoch", $datos);	
	}
    
    
    



}
