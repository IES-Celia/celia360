<?php

class Install extends CI_Controller {
	/*************************************************************************
  *                                 Install
  *                                               
  *************************************************************************/ 
	    public function __construct(){
            parent::__construct();
            $this->load->model("InstallModel");
        }

        public function index() {
            $this->showinstaform();
        } 

        public function showinstaform($msj = ""){       
        //Muestra la ventana de instalacion
            $data["vista"] ="install/installform";
            $data["mensaje"] = $msj; 
            $this->load->view('login_template', $data);
        }

        public function inserdata(){
        	$resultado = $this->InstallModel->inserbd();
        }
}
?>