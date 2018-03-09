<?php 

    class UsuarioModel extends CI_Model {
        /*******************************************************************
        *                           ADMIN
        *
        ******************************************************************/
    

        public function inserusu(){
        
            $email = $this->input->get_post("email");
            $username = $this->input->get_post("username");
            $pass = $this->input->get_post("pass");
            $name = $this->input->get_post("nombre");
            $apellido = $this->input->get_post("subname");

           
            $consulta = $this->db->query("SELECT * FROM usuarios");    
            
            if(!$this->db->affected_rows($consulta)){
                
            $resultado=true;
            $pass_encryted = md5($pass);
            $this->db->query("insert into usuarios (nombre_usuario, password, nombre, apellido, email, tipo_usuario) VALUES('$username','$pass_encryted','$name','$apellido','$email','1')");
            
            }else{

            $prueba = $this->db->query("SELECT id_usuario FROM usuarios WHERE nombre_usuario = '$username' OR email = '$email'");
            if($this->db->affected_rows($prueba)){

              $resultado=false; 

            }else{
            
            $resultado=true;
            $pass_encryted = md5($pass);
            $this->db->query("insert into usuarios (nombre_usuario, password, nombre, apellido, email, tipo_usuario) VALUES('$username','$pass_encryted','$name','$apellido','$email','0')");
        }
    }
        
            return $resultado;       

        }

        public function login($usr,$pass){


            $pass_encryted = md5($pass);

            $consulta ="SELECT id_usuario, tipo_usuario, nombre_usuario FROM usuarios WHERE nombre_usuario = '$usr' and password = '$pass_encryted'";
            
            $res= $this->db->query($consulta);


            $tabla = array();
                foreach($res->result_array() as $fila) {
                    $tabla= $fila;
                }
        
            $resultado = 0;
            if (count($tabla) > 0){
                    $this->session->tipousr = $tabla["tipo_usuario"];
                    $this->session->nombreusr = $tabla["nombre_usuario"];

                    if($tabla["tipo_usuario"]==1){
                        
                        $resultado = 1;

                    }else if($tabla["tipo_usuario"]==2){

                        $resultado = 2;

                    }else if ($tabla["tipo_usuario"]==3){

                        $resultado = 3;
                    }
                }
                else{
                    $resultado = 4;
                } 
               
                return $resultado;   
        }

        public function buscarusu($usr,$pass){
          
            $consulta = "SELECT * FROM usuarios where nombre_usuario = '$usr' and password = '$pass'";
            $tabla = $this->db->query($consulta);
       
            return $tabla;
        }

        public function buscarusuid($id){
          
            $consulta = "SELECT * FROM usuarios WHERE id_usuario = $id";
            $resultado= $this->db->query($consulta);

            $tabla = array();
                foreach($resultado->result_array() as $fila) {
                    $tabla[] = $fila;
                }           
        return $tabla;

    }

        public function buscartodousu(){
           
            $resultado = $this->db->query("SELECT * FROM usuarios");
           
          $tabla = array();
          foreach($resultado->result_array() as $fila) {
              $tabla[] = $fila;
          }
          
            return $tabla;

    }

        public function borrarusu($id){
          
            $this->db->query("Delete from usuarios where id_usuario = '$id'");

            return $this->db->affected_rows();
        
    }

        public function alterarusu($id){
         
            $nombre = $this->input->get_post("nombre");
            $apellidos = $this->input->get_post("apellidos");
            $email = $this->input->get_post("email");
            $username = $this->input->get_post("username");
            $pass = $this->input->get_post("pass");
            $tipo = $this->input->get_post("tipo");

            $password = md5($pass);

           
           $this->db->query("Update usuarios set nombre_usuario = '$username', nombre = '$nombre', apellido='$apellidos', email = '$email', password = '$password', tipo_usuario='$tipo' where id_usuario = '$id'");
            
            return $this->db->affected_rows();
    }
	
	public function comprueba_permisos($vista){
        if ($this->session->tipousr) {
            $tipo=$this->session->tipousr;
        }else $tipo = -1;
        
        $dir =  explode("/", $vista);
        $dir = $dir[0];

        if ($tipo == 1 && ($dir == "audio" || $dir == "imagen" || $dir == "biblioteca" || $dir == "escenas" || $dir == "video" || $dir == "hotspots" || $dir== "usuario" || $dir == "guiada" || $dir == "MapaAdmin")) return true;
        else if ($tipo == 2 && ($dir == "audio" || $dir == "imagen" || $dir == "escenas" || $dir == "video" || $dir == "hotspots" || $dir == "guiada" || $dir == "MapaAdmin" ) )return true;
        else if ($tipo == 3 && $dir == "biblioteca") return true;
        else return false;

    }


}

?> 