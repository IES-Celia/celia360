<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {



	public function index(){
		$this->load->model('Mapa','mapa');

		$datos["mapa"] = $this->mapa->cargar_mapa();
		$datos["puntos"] = $this->mapa->cargar_puntos();
		$this->load->view('Mapa', $datos);
	}

	public function mapa(){

		

	}
}
