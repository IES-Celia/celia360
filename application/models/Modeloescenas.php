<?php

	class modeloescenas extends CI_Model {
				
		public function getAll() {
			
            $con = $this->db->query("SELECT * FROM escenas ORDER BY cod_escena");
            $tabla = array();
                foreach($con->result_array() as $fila) {
                        $tabla[] = $fila;
                }
			
            return $tabla;
		}

		public function getOne($cod) {
			
			$com = $this->db->query("SELECT * FROM escenas where cod_escena = '$cod'");
            $tabla = array();
                foreach($com->result_array() as $fila) {
                    $tabla[] = $fila;
                }
				
			return $tabla;
		}
        
        

		public function insertar() {
			
			$name = $_REQUEST["name"];		
			$panorama = $_REQUEST["panorama"];
            $cod = substr($panorama, 0 , -4);

			$insert = "INSERT INTO escenas (Nombre,cod_escena,hfov,pitch,yaw,tipo,panorama) 
                      VALUES('$name','$cod',120,10,10,'equirectangular','assets/imagenes/escenas/$panorama')";

			$this->db->query($insert);
            
            return $this->db->affected_rows();
		}

		public function borrar ($id) {
			
			
			$this->db->query("DELETE FROM escenas WHERE id_escena = '$id' ");
			
            return $this->db->affected_rows();
        }

		public function update ($cod) {
			
            $id = $_REQUEST["Id"];
			$name = $_REQUEST["name"];
			$hfov = $_REQUEST["hfov"];
			$pitch = $_REQUEST["pitch"];
			$yaw = $_REQUEST["yaw"];
			$type = $_REQUEST["type"];
			$panorama = $_REQUEST["panorama"];
            
			$this->db->query("
                
                UPDATE escenas 
                    
                    SET 
                        
                        Nombre = '$name', 
                        hfov = '$hfov',
                        pitch = '$pitch', 
                        yaw = '$yaw', 
                        tipo = '$type', 
                        panorama = '$panorama' 
                            
                            WHERE cod_escena = '$cod'");
			
			return $this-> db->affected_rows();
			
		}
		
	}
?>	
