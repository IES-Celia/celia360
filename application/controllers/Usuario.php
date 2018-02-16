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


        public function showloginForm($msj = ""){       
        //Muestra la ventana de login
            $data["vista"] ="usuario/formLogin";
            $data["mensaje"] = $msj; 
            $this->load->view('template_login', $data);
        }


        public function checklogin(){
            //Ejecuta el login
            $resultado = $this->UsuarioModel->login($_REQUEST["user"],$_REQUEST["pass"]);
        
            
             if($resultado ==1){
                   
                    $data["tablaUsuarios"]= $this->UsuarioModel->buscartodousu(); 
                    $data["vista"] = "usuario/usuarios";
                     $data["permiso"]=$this->UsuarioModel->comprueba_permisos($data["vista"]);
                     
                    $this->load->view('template_admin',$data);
             }else if($resultado ==2){
                    $datos["vista"] = "usuario/mapero";
                    $this->load->view('template_login',$datos);
            }else if($resultado ==3){
                $datos["tabla"] = $libro->get_info();
                $datos["vista"] = "libro/IntAdmin";
                $this->load->view('template_login',$datos);

            }else if($resultado ==0){
                $datos["error"] = "Usuario sin confirmar";
                $datos["vista"] = "usuario/formLogin";
                $this->load->view('template_login',$datos);

            }else{

                $datos["error"] = "Usuario no registrado";
                $datos["vista"] = "usuario/formLogin";
                $this->load->view('template_login',$datos);
            }
          }
        
        public function showregisterform(){
        //Mostrar el formulario de registro
            $data["vista"] = "usuario/registerForm";
            $this->load->view('template_login',$data);
        }
        

        public function processregisterform(){
        //Formulario de registro de usuarios
         
            $resultado = $this->UsuarioModel->inserusu();
            if ($resultado){

                $datos["mensaje"] = "Usuario creado correctamente";
                $datos["vista"] = "usuario/formLogin";
                $this->load->view('template_login', $datos);
            }
            else {
                $datos["mensaje"] = "Usuario ocupado";
                $datos["vista"] = "usuario/registerForm";
                $this->load->view("template_login", $datos);
            }
     
        }
        
        public function modificar($id){
    
        //Abrir la ventana para modificar el usuario

            $datos["DatosMod"]=$this->UsuarioModel->buscarusuid($id);
            $datos["vista"] = "usuario/modUsu";
            $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
            $this->load->view("template_admin",$datos);

        }
        public function modusuario(){
        
        //Modificar el usuario
        $id = $_REQUEST["id"];
        $this->UsuarioModel->alterarusu($id);
        $datos["tablaUsuarios"] = $this->UsuarioModel->buscartodousu();
        $datos["nombreUsuario"] = "usuario modificado correctamente.";
            
        $datos["vista"] = "usuario/usuarios";       
        $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
        $this->load->view('template_admin',$datos);

        }

        public function borrarusuario($idusu){ 
        //Borrar usuario

    
            $resultado = $this->UsuarioModel->borrarusu($idusu);
            if ($resultado != 0) 
                echo $idusu;
            else
                echo $resultado;
            //$datos["tablaUsuarios"] = $this->UsuarioModel->buscartodousu();
            //$datos["nombreUsuario"] = "usuario borrado correctamente.";
            //$datos["vista"] = "usuario/usuarios";
            //$this->load->view("template_admin",$datos);

          
        }

        public function usuarios(){

            $datos["tablaUsuarios"]=$this->UsuarioModel->buscartodousu();
            $datos["vista"] = "usuario/usuarios";
            $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
            $this->load->view('template_admin',$datos);
        }

        public function mapero(){
            
            $data["vista"] = "usuario/mapero";
            $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
                $this->load->view('template_admin', $data);

        }
         public function cerrarSesion() {
            $this->session->sess_destroy();
            $this->showloginForm();
        }

    }
?>
