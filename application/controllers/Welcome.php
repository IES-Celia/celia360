<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {



	public function index(){

		//$datos["vista"] = "p2p3";
		$this->load->view("jotpoch");
	}
    



}
