<?php
    // Este es el controlador de la aplicación
    
    class Usuario extends CI_Controller {
  /*************************************************************************
  *                                 USUARIO
  *                                               
  *************************************************************************/  

        public function __construct(){
            parent::__construct();
            $this->load->model("UsuarioModel");
        }

        public function index() {
            $this->showloginform();
        } 


        public function showloginForm(){       
        //Muestra la ventana de login
            $this->load->view("usuario/formLogin");
        }
        public function checklogin(){
            //Ejecuta el login
                
            $resultado = $this->UsuarioModel->login($_REQUEST["user"],$_REQUEST["pass"]);
            
             if($resultado ==1){
                $_SESSION["tipousr"] = 1;
               
            $this->load->view("usuario/admin");

            }else if($resultado ==2){
                $_SESSION["tipousr"] = 2;


           $this->load->view("usuario/mapero",$datos);
                

                
            }else if($resultado ==3){
                $_SESSION["tipousr"] = 3;

                $datos["tabla"] = $libro->get_info();
                $this->load->view("libro/IntAdmin",$datos);

            }else{

                $datos["error"] = "Usuario no registrado";
                $this->load->view("usuario/formLogin",$datos);
            }
          
        }
        public function showregisterform(){
        //Mostrar el formulario de registro
        $this->load->view("usuario/registerForm");
        }
        

        public function processregisterform(){
        //Formulario de registro de usuarios
         
            $resultado = $this->UsuarioModel->inserUsu();
            if ($resultado){

                $datos["mensaje"] = "Usuario creado correctamente";
                $this->load->view("usuario/formLogin", $datos);
            }
            else {
          
                $this->load->view("usuario/registerForm");
            }
     
        }
        
        public function modificar($id){
    
        //Abrir la ventana para modificar el usuario

            $datos["DatosMod"]=$this->UsuarioModel->buscarusuid($id);
            $this->load->view("usuario/modUsu",$datos);

        }
        public function modusuario(){
        
        //Modificar el usuario
        $id = $_REQUEST["id"];
        $this->UsuarioModel->alterarusu($id);
        $datos["tablaUsuarios"] = $this->UsuarioModel->buscartodousu();
        $datos["nombreUsuario"] = "usuario modificado correctamente.";
        $this->load->view("usuario/usuarios",$datos);

        }

        public function borrarusuario($id){ 
        //Borrar usuario

    
            $this->UsuarioModel->borrarusu($id);
            $datos["tablaUsuarios"] = $this->UsuarioModel->buscartodousu();
            $datos["nombreUsuario"] = "usuario borrado correctamente.";
            $this->load->view("usuario/usuarios",$datos);
          
        }

        public function usuarios(){

            $datos["tablaUsuarios"]=$this->UsuarioModel->buscartodousu();
            $this->load->view("usuario/usuarios",$datos);
        }

        public function mapero(){

                $this->load->view("usuario/mapero");

        }

    }
?>
