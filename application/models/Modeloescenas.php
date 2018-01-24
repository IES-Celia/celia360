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

		public function getOne($id) {
			
			$com = $this->db->query("SELECT * FROM escenas where id_escena = '$id'");
            $tabla = array();
                foreach($com->result_array() as $fila) {
                    $tabla[] = $fila;
                }
				
			return $tabla;

		
		}

		public function insertar() {
			
			$name = $_REQUEST{"name"};
			$cod = $_REQUEST{"cod"};
			$hfov = $_REQUEST{"hfov"};
			$pitch = $_REQUEST{"pitch"};
			$yaw = $_REQUEST{"yaw"};
			$type = $_REQUEST{"type"};
			$panorama = $_REQUEST{"panorama"};

			$insert = "INSERT INTO escenas (Nombre,cod_escena,hfov,pitch,yaw,tipo,panorama) 
                      VALUES('$name','$cod','$hfov','$pitch','$yaw','$type','$panorama')";

			$this->db->query($insert);
            
            return $this->db->affected_rows();
		}

		public function borrar ($id) {
			
			
			$this->db->query("DELETE FROM escenas WHERE id_escena = '$id' ");
			
            return $this->db->affected_rows();
        }

		public function update ($id) {
			
            $id = $_REQUEST["Id"];
			$name = $_REQUEST["name"];
			$cod = $_REQUEST{"cod"};
			$hfov = $_REQUEST["hfov"];
			$pitch = $_REQUEST["pitch"];
			$yaw = $_REQUEST["yaw"];
			$type = $_REQUEST["type"];
			$panorama = $_REQUEST["panorama"];
            
			$this->db->query("
                
                UPDATE escenas 
                    
                    SET 
                        
                        Nombre = '$name',
                        cod_escena = '$cod', 
                        hfov = '$hfov', 
                        pitch = '$pitch', 
                        yaw = '$yaw', 
                        tipo = '$type', 
                        panorama = '$panorama' 
                            
                            WHERE id_escena = '$id'");
			
			return $this-> db->affected_rows();
			
		}
		
	}
?>	
