<?php
    // Este es el controlador de la aplicación
    
    class Usuario extends CI_Controller {
  /*************************************************************************
  *                                 USUARIO
  *                                               
  *************************************************************************/  

        public function ___construct(){
            parent::___construct();
            $this->load->model("UsuarioModel");
        }

        public function showLoginForm(){       
        //Muestra la ventana de login
        $vista->show("usuario/formLogin");
        }
        public function checkLogin(){
            //Ejecuta el login
                
            $resultado = $usuario->login($_REQUEST["user"],$_REQUEST["pass"]);
            
             if($resultado ==1){
                $_SESSION["tipousr"] = 1;
               
            $this->load->view("usuario/admin",$datos);

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
        public function showRegisterForm(){
        //Mostrar el formulario de registro
        $this->load->view("usuario/registerForm");
        }
        

        public function processRegisterForm(){
        //Formulario de registro de usuarios
         
            $resultado = $usuario->inserUsu();
            if ($resultado){

                $datos["mensaje"] = "Usuario creado correctamente";
                $this->load->view("usuario/formLogin", $datos);
            }
            else {
          
                $this->load->view("usuario/registerForm");
            }
     
        }
        
        public function modificar(){
    
        //Abrir la ventana para modificar el usuario

            $id = $_REQUEST["id"];
            $datos["DatosMod"]=$usuario->buscarUsuId($id);
            $this->load->view("usuario/modUsu",$datos);

        }
        public function modUsuario(){
        
        //Modificar el usuario
        $id = $_REQUEST["id"];
        $usuario->alterarUsu($id);
        $datos["tablaUsuarios"] = $usuario->buscarTodoUsu();
        $datos["nombreUsuario"] = "usuario modificado correctamente.";
        $this->load->view("usuario/usuarios",$datos);

        }

        public function borrarUsuario(){ 
        //Borrar usuario

            $id = $_REQUEST["id"];
            $usuario->borrarUsu($id);
            $datos["tablaUsuarios"] = $usuario->buscarTodoUsu();
            $datos["nombreUsuario"] = "usuario borrado correctamente.";
            $this->load->view("usuario/usuarios",$datos);
          
        }

        public function usuarios(){

                $datos["tablaUsuarios"]=$usuario->buscarTodoUsu();
                $this->load->view("usuario/usuarios",$datos);
        }

        public function mapero(){

                $this->load->view("usuario/mapa");

        }

    }
?>
