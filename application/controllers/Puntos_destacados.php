<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
    
	public function cargar_puntosdestacados(){
		$this->load->view("puntosdestacados/puntosDestacados", $datos);	
	}
   
    
}
