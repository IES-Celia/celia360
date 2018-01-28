<?php
    // Este es el controlador de la aplicación
   
   class Video extends CI_Controller{
       
       public function __construct() {
           parent::__construct();
           $this->load->model("Vidm");
       }
       
     public function index() {
        $this->mostrarvideo();
     }
		
	
    public function frominsertarvideo(){
        $data["vista"] ="video/Insertarvideos";
		$this->load->view('template_admin', $data);	
    }
    
   public function insertarvideo(){
			$f_def =$_REQUEST["video"];
			$desc=$_REQUEST["desc"];
			$res=$this->Vidm->insertarvideo($desc, $f_def);
			$da["tabla"]=$this->Vidm->buscarvideo();
            $da["vista"]="video/Vvideos";
			$this->load->view('template_admin',$da);
   }
   public function mostrarvideo(){
			$da["tabla"]=$this->Vidm->buscarvideo();
            $da["vista"]="video/Vvideos";
			$this->load->view('template_admin',$da);
		
   }
   public function borrarvideo($id){
			
			$this->Vidm->borrarvideo($id);
			$da["tabla"]=$this->Vidm->buscarvideo();
            $da["vista"]="video/Vvideos";
			$this->load->view('template_admin',$da);
   }
		
   public function formmodificarvideo($id_vid){
			
			$da["vid"]=$this->Vidm->buscaridvideo($id_vid);
            $da["vista"]="video/Modificarvideos";
			$this->load->view('template_admin', $da);
		
   }
   public function modificarvideo(){
			$id=$_REQUEST["id"];
			$this->Vidm->modificarvideo($id);
			$da["tabla"]=$this->Vidm->buscarvideo();
            $da["vista"]="video/Vvideos";
			$this->load->view('template_admin', $da);
		
   }
        
    
    

}
?>
