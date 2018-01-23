<?php
// Este es el controlador de la aplicación
   defined('BASEPATH') OR exit('No se permite el acceso directo al script');
   class Audio extends CI_Controller{
       
       public function __construct() {
           parent::__construct();
           $this->load->model("AudM");
       }
       
     public function index() {
        $this->mostraraudios();
     }
       
     public function forminsertarAudio(){
        
        $this->load->view("audio/insertarAudios");
     }
        
     public function insertarAud(){   
            $f_def = "audios/".$_FILES["audio"]["name"];
            $r=$this->AudM->existeAud($f_def);
            
            if ($r==true){
                echo"el archivo ya existe en el servidor, intenta cambiarle el nombre antes de subirlo si no quieres qe se sobreescriba";
                echo"</br><a href='".site_url("audio/forminsertarAudio")."'>insertar</a></br>";
                echo"</br><a href='".site_url("audio/mostraraudios")."'>mostrar</a></br>";
                echo"</br><a href='".site_url("audio/mostraraudios")."'>renombrar archivo en el servidor</a></br>";
            }else{
            $tipo=$_REQUEST["tipo_aud"];
            $desc=$_REQUEST["desc"];
            $res=$this->AudM->insertarAud($desc, $tipo);
            $datos["tabla"]=$this->AudM->buscarAud();
            $this->load->view("audio/vaudios",$datos);
        }
        
        
     }
        
        public function mostraraudios(){
            $datos["tabla"]=$this->AudM->buscarAud();
            $this->load->view("audio/vaudios",$datos);
        
        }
        
        public function borrarAud($id){
            $this->AudM->borrarAud($id);
            $datos["tabla"]=$this->AudM->buscarAud();
            $this->load->view("audio/vaudios",$datos);
        }
        
        public function formmodificarAud($id_aud){
            $datos["aud"]=$this->AudM->buscaridAud($id_aud);
            
            $this->load->view("audio/modificarAudios", $datos);
        
        }

        public function modificarAud(){
            $id=$_REQUEST["id"];
            $this->AudM->modificarAud($id);
            $datos["tabla"]=$this->AudM->buscarAud();
            $this->load->view("audio/vaudios", $datos);
        
   }


    
    
   }

?>