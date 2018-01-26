<?php
    // Este es el controlador de la aplicación
   
   class Video extends CI_Controller{
       
       public function __construct() {
           
           $this->load->model("Vidm");
       }
       
     public function index() {
        $this->mostrarvideo();
     }
		
	
    public function frominsertarvideo(){
		$this->load->view("video/Insertarvideos");	
    }
    
   public function insertarvideo(){
			$f_def =$_REQUEST["video"];
			$desc=$_REQUEST["desc"];
			$res=$this->Vidm->insertarvideo($desc, $f_def);
			$da["tabla"]=$this->Vidm->buscarvideo();
			$this->load->view("/video/Vvideos",$da);
   }
   public function mostrarvideo(){
			$da["tabla"]=$this->Vidm->buscarvideo();
			$this->load->view("video/Vvideos",$da);
		
   }
   public function borrarvideo($id){
			
			$this->Vidm->borrarvideo($id);
			$da["tabla"]=$this->Vidm->buscarvideo();
			$this->load->view("video/Vvideos",$da);
   }
		
   public function formmodificarvideo($id_vid){
			
			$da["vid"]=$this->Vidm->buscaridvideo($id_vid);
			$this->load->view("video/Modificarvideos", $da);
		
   }
   public function modificarvideo(){
			$id=$_REQUEST["id"];
			$this->Vidm->modificarvideo($id);
			$da["tabla"]=$this->Vidm->buscarvideo();
			$this->load->view("video/Vvideos", $da);
		
   }
        
    
    

}
?>
