<?php 

    class UsuarioModel extends CI_Model {
        /*******************************************************************
        *                           ADMIN
        *
        ******************************************************************/
    

        public function inserusu(){
        
            $email = $_REQUEST["email"];
            $username = $_REQUEST["username"];
            $pass = $_REQUEST["pass"];
            $name = $_REQUEST["nombre"];
            $apellido = $_REQUEST["subname"];

            $pass_encryted = md5($pass);
        
            $resultado=$this->db->query("insert into usuarios (nombre_usuario, password, nombre, apellido, email, tipo_usuario) VALUES('$username','$pass_encryted','$name','$apellido','$email','0')");

        
            return $resultado;       

        }

        public function login($usr,$pass){

            $pass_encryted = md5($pass);
          
            $resultado = $this->db->query("SELECT id_usuario, tipo_usuario FROM usuarios WHERE nombre_usuario = '$usr' and password = '$pass_encryted'");
          

            $tabla = array();
                foreach($resultado->result_array() as $fila) {
                    $tabla[] = $fila;
                }  
          

            if (count($tabla) > 0){
                    if($tabla[0]["tipo_usuario"]==1){
                        
                        $resultado = 1;

                    }else if($tabla[0]["tipo_usuario"]==2){

                        $resultado = 2;

                    }else if ($tabla[0]["tipo_usuario"]==3){

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
            $tabla = $this->db->tabla($consulta);
       
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
            $nombre = $_REQUEST["nombre"];
            $apellidos = $_REQUEST["apellidos"];
            $email = $_REQUEST["email"];
            $username = $_REQUEST["username"];
            $pass = $_REQUEST["pass"];

           
           $this->db->query("Update usuarios set nombre_usuario = '$username', nombre = '$nombre', apellido='$apellidos', email = '$email', password = '$pass' where id_usuario = '$id'");

            $resultado= $this->db->query("SELECT * FROM usuarios");

            $tabla = array();
                foreach($resultado->result_array() as $fila) {
            $tabla[] = $fila;
          }
           
        return $tabla;
    }
	
	public function comprueba_permisos($vista){
        session_start();
        $tipo = -1;
        if(isset($_SESSION['tipousr'])){
            $tipo=$_SESSION['tipousr'];
        }
        
        $dir =  explode("/", $vista);
        $dir = $dir[0];
        print_r($dir);
        if ($tipo == 1 && $dir == "audio" || $dir == "imagen" || $dir == "biblioteca" || $dir == "escenas" || $dir == "video" || $dir == "hotspots") return true;
        else if ($tipo == 2 && $dir == "audio" || $dir == "imagen" || $dir == "escenas" || $dir == "video" || $dir == "hotspots" ) return true;
        else if ($tipo == 3 && $dir == "biblioteca") return true;
        else return false;
        
        
        
    }

}

?> 