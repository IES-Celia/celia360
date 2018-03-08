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

            $config['upload_path'] = 'assets/imagenes/escenas/';
            $config['allowed_types'] = 'jpg';
           
            $this->load->library('upload', $config);
            
            $resultado=$this->upload->do_upload('panorama');
			if($resultado) {            
                 //////////////////////
                 //// Se tiene que comprobar que existe ya un cod_escena igual para evitar duplicados
                 /////////////////////

                $name = $this->input->post_get("name");		
			    $panorama = $this->upload->data()["client_name"];
                $cod = substr($panorama, 0 , -4);
                $left_mapa = $_REQUEST["left_mapa"];
                $top_mapa = $_REQUEST["top_mapa"];
                $piso_mapa = $_REQUEST["piso"];
                
            
                $insert = "INSERT INTO escenas (Nombre,cod_escena,hfov,pitch,yaw,tipo,panorama) 
                      VALUES('$name','$cod',120,10,10,'equirectangular','assets/imagenes/escenas/$panorama')";

                $this->db->query($insert);
            
                $insert = "INSERT INTO puntos_mapa (left_mapa, top_mapa, id_escena, piso) 
                VALUES ($left_mapa,$top_mapa,'$cod',$piso_mapa)";
                echo $insert;

                $this->db->query($insert);

                return $this->db->affected_rows();
            }
            else {
                echo $this->upload->display_errors();
            }
		}

        public function borrar($cod){
            
            $sql  = "DELETE FROM hotspots WHERE id_hotspot IN (
                SELECT id_hotspot FROM escenas_hotspots where id_escena IN (
                    SELECT id_escena FROM escenas WHERE cod_escena = '$cod'))";
            $this->db->query($sql);

            $sql ="DELETE FROM puntos_mapa WHERE id_escena = '$cod'";
            $this->db->query($sql);
            
            $sql = "DELETE FROM escenas_hotspots WHERE id_escena = (SELECT id_escena FROM escenas WHERE cod_escena = '$cod') ";
            $this->db->query($sql);

            $sql = "DELETE FROM hotspots WHERE sceneid='$cod'";
            $this->db->query($sql);

            $sql = "DELETE FROM escenas WHERE cod_escena = '$cod' ";
            $this->db->query($sql);

            $imagen_borrar = "assets/imagenes/escenas/$cod.JPG";
            
            unlink($imagen_borrar);
        
            return $this->db->affected_rows();
        } 
        
		/*public function borrar ($id) {
            $sql ="DELETE FROM puntos_mapa WHERE id_escena = (SELECT cod_escena FROM escenas WHERE id_escena = '$id') ";
			$this->db->query($sql);

            $sql = "DELETE FROM escenas WHERE id_escena = '$id' ";

            $sql = "DELETE FROM escenas_hotspots WHERE id_escena =  ";
            $this->db->query($sql);


        
            return $this->db->affected_rows();
        }*/

		public function update ($cod) {
			
            $imagen_borrar = "assets/imagenes/escenas/$cod.JPG";
            
                    
            
            $config['upload_path'] = 'assets/imagenes/escenas/';
            $config['allowed_types'] = 'jpg';
           
            $this->load->library('upload', $config);
            
            $resultado=$this->upload->do_upload('panorama');
            echo $this->upload->display_errors();
			
            if($resultado==1) {
                unlink($imagen_borrar);
                //////////////////////
                //// Se tiene que poder modificar la imagen asociada a una cod_escena / $id manteniendo sus hotspots (subiendo la nueva escena al   server, sobrescribiendo la existente)
                /////////////////////

            
                $name = $_REQUEST["name"];
                $pitch = $_REQUEST["pitch"];
                $id = $_REQUEST["Id"];
                $yaw = $_REQUEST["yaw"];
                $panorama = $this->upload->data()["client_name"];
                $cod = substr($panorama, 0 , -4);
                
               
                $update = "

                    UPDATE escenas 

                        SET 

                            Nombre = '$name', 
                            cod_escena = '$cod',
                            pitch = '$pitch', 
                            yaw = '$yaw', 
                            tipo = 'equirectangular', 
                            panorama = 'assets/imagenes/escenas/$panorama' 

                                WHERE id_escena = '$id'";
                
                
                $this->db->query($update);

                return $this->db->affected_rows();
            }
            else { 
                echo $resultado;

                echo $this->upload->display_errors();
            }
		}
		
	}
?>	
