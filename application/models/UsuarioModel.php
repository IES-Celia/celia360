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
            $tipo = $_REQUEST["tipo"];
            $name = $_REQUEST["nombre"];
            $foto = $_REQUEST["Foto"];
            $apellido = $_REQUEST["subname"];
        
            $resultado=$this->db->query("insert into usuarios (nombre_usuario, password, email, Nombre, Apellido, Foto, tipo_usuario) VALUES('$username','$pass','$email','$name','$apellido','$foto','$tipo')");

        
            return $resultado;       

        }

        public function login($usr,$pass){
          
            $resultado = $this->db->query("SELECT id_usuario, tipo_usuario FROM usuarios WHERE nombre_usuario = '$usr' and password = '$pass'");
          

            $tabla = array();
                foreach($resultado->result_array() as $fila) {
                    $tabla[] = $fila;
                }  
          

            if (count($tabla) > 0){
                    if($tabla[0]["tipo_usuario"]==1){
                        
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

            $resultado = $this->db->query("SELECT * FROM usuarios");

            $tabla = array();
                foreach($resultado->result_array() as $fila) {
            $tabla[] = $fila;
          }
           
        return $tabla;
    }

        public function alterarusu($id){
            $nombre = $_REQUEST["nombre"];
            $apellidos = $_REQUEST["apellidos"];
            $email = $_REQUEST["email"];
            $username = $_REQUEST["username"];
            $pass = $_REQUEST["pass"];

           
           $this->db->query("Update usuarios set nombre = '$nombre', Email = '$email', nombre_usuario = '$username', Password = '$pass' where id_usuario = '$id'");

            $resultado= $this->db->query("SELECT * FROM usuarios");

            $tabla = array();
                foreach($resultado->result_array() as $fila) {
            $tabla[] = $fila;
          }
           
        return $tabla;
    }

}

?> 