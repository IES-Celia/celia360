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

            $config['upload_path'] = 'assets/imagenes/escenas/';
            $config['allowed_types'] = 'jpg';
            $config['file_name']= $panorama;
            
            $this->load->library('upload', $config);
            
            $resultado=$this->upload->do_upload('escenas');
			
            $comp = "SELECT cod_escena FROM escenas WHERE cod_escena ='$cod'";
            if($resultado == false || $comp == $cod){
                $result[0] = false;
                $result[1] = $this->upload->display_errors("<i>","<i>");
            }else{
                $result[0] = true;
                $result[1] = this->db->query ("INSERT INTO escenas (Nombre,cod_escena,hfov,pitch,yaw,tipo,panorama) 
                      VALUES('$name','$cod',120,10,10,'equirectangular','assets/imagenes/escenas/$panorama')");
            }
            return $result;
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
