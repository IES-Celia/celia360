<?php 

    class Modelousuario extends CI_Model {
        /*******************************************************************
        *                           ADMIN
        *
        ******************************************************************/
	


        public function inserUsu(){
			$this->db->conectar();
            $email = $_REQUEST["email"];
        	$username = $_REQUEST["username"];
        	$pass = $_REQUEST["pass"];
            $tipo = $_REQUEST["tipo"];
            $name = $_REQUEST["nombre"];
            $foto = $_REQUEST["Foto"];
            $apellido = $_REQUEST["subname"];
        
        	$resultado=$this->db->manipula("insert into usuarios (nombre_usuario, password, email, Nombre, Apellido, Foto, tipo_usuario) VALUES('$username','$pass','$email','$name','$apellido','$foto','$tipo')");

        
            $this->db->desconectar();
        	return $resultado;       

		}

        public function login($usr,$pass){
            $this->db->conectar();
            $fila = $this->db->dobleconsulta("SELECT id_usuario, tipo_usuario FROM usuarios WHERE nombre_usuario = '$usr' and password = '$pass'");
            
            if (count($fila) > 0){
                    if($fila["tipo_usuario"]==1){
                        
                        $resultado = 1;

                    }else if($fila["tipo_usuario"]==2){

                        $resultado = 2;

                    }else if ($fila["tipo_usuario"]==3){

                        $resultado = 3;
                    }
                }
                else{
                    $resultado = 4;
                } 
                $this->db->desconectar();
                return $resultado;   
        }

        public function buscarUsu($usr,$pass){
            $this->db->conectar();
            $consulta = "SELECT * FROM usuarios where nombre_usuario = '$usr' and password = '$pass'";
            $tabla = $this->db->tabla($consulta);
            $this->db->desconectar();
            return $tabla;
        }

        public function buscarUsuId($id){
            $this->db->conectar();
            $consulta = "SELECT * FROM usuarios WHERE id_usuario = $id";
            $tabla = $this->db->tabla($consulta);
            $this->db->desconectar();
        return $tabla;

    }

        public function buscarTodoUsu(){
           $this->db->conectar();
            $tabla = $this->db->consulta("SELECT * FROM usuarios");
            $this->db->desconectar();
        return $tabla;
    }

        public function borrarUsu($id){
            $this->db->conectar();
            $this->db->manipula("Delete from usuarios where id_usuario = '$id'"); 
            $tabla = $this->db->consulta("SELECT * FROM usuarios");
            $this->db->desconectar(); 
        return $tabla;
    }

        public function alterarUsu($id){
            $nombre = $_REQUEST["nombre"];
            $apellidos = $_REQUEST["apellidos"];
            $email = $_REQUEST["email"];
            $username = $_REQUEST["username"];
            $pass = $_REQUEST["pass"];

           $this->db->conectar();
           $this->db->manipula("Update usuarios set nombre = '$nombre', Email = '$email', nombre_usuario = '$username', Password = '$pass' where id_usuario = '$id'");

            $tabla = $this->db->consulta("SELECT * FROM usuarios");
            $this->db->desconectar(); 
        return $tabla;
    }

}

?> 