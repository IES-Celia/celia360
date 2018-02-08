<?php
    // Este es el controlador de la aplicación
   
   class Video extends CI_Controller{
       
       public function __construct() {
           parent::__construct();
           $this->load->model("Vidm");
		   $this->load->model("UsuarioModel");
       }
       
     public function index() {
        $this->mostrarvideo();
     }
		
	
    public function frominsertarvideo(){
        $datos["vista"] ="video/Insertarvideos";
		$datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
		$this->load->view('template_admin', $datos);	
    }
    
   public function insertarvideo(){
			$f_def =$_REQUEST["video"];
			$desc=$_REQUEST["desc"];
			$res=$this->Vidm->insertarvideo($desc, $f_def);
			$datos["tabla"]=$this->Vidm->buscarvideo();
            $datos["vista"]="video/Vvideos";
			$datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
			$this->load->view('template_admin',$datos);
   }
   public function mostrarvideo(){
			$datos["tabla"]=$this->Vidm->buscarvideo();
            $datos["vista"]="video/Vvideos";
			$datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
			$this->load->view('template_admin',$datos);
		
   }
   public function borrarvideo($id){
			
			$this->Vidm->borrarvideo($id);
			$datos["tabla"]=$this->Vidm->buscarvideo();
            $datos["vista"]="video/Vvideos";
			$datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
			$this->load->view('template_admin',$datos);
   }
		
   public function formmodificarvideo($id_vid){
			
			$datos["vid"]=$this->Vidm->buscaridvideo($id_vid);
            $datos["vista"]="video/Modificarvideos";
			$datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
			$this->load->view('template_admin', $datos);
		
   }
   public function modificarvideo(){
			$id=$_REQUEST["id"];
			$this->Vidm->modificarvideo($id);
			$datos["tabla"]=$this->Vidm->buscarvideo();
            $datos["vista"]="video/Vvideos";
			$datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
			$this->load->view('template_admin', $datos);
		
   }
        
    
    

}
?>
