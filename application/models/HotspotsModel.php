<?php
    class HotspotsModel extends CI_Model {
        
		public function buscarHotspots() {
		
			$res = $this->db->query("SELECT * FROM hotspots");
            $tabla = array();
            foreach ($res->result_array() as $fila) {
                $tabla[] = $fila;
            }
			return $tabla;
        }
		
		
		public function insertarHotspot() {
			
			$descripcion = $_REQUEST["descripcion"];
			$pitch = $_REQUEST["pitch"];
			$yaw = $_REQUEST["yaw"];
			$cssClass = $_REQUEST["cssClass"];
			$clickHandlerFunc = $_REQUEST["clickHandlerFunc"];
			$clickHandlerArgs = $_REQUEST["clickHandlerArgs"];
			$sceneId = $_REQUEST["sceneId"];
			$targetPitch = $_REQUEST["targetPitch"];
			$targetYaw = $_REQUEST["targetYaw"];
			$tipo = $_REQUEST["tipo"];

			$insrt = "INSERT INTO hotspots (descripcion,pitch,yaw,cssClass,clickHandlerFunc,clickHandlerArgs,sceneId,targetPitch,targetYaw,tipo)	
					  VALUES('$descripcion','$pitch','$yaw','$cssClass','$clickHandlerFunc','$clickHandlerArgs','$sceneId','$targetPitch','$targetYaw','$tipo')";	
			
			
			$this->db->query($insrt);
            
			return $this->db->affected_rows();
		
        }
			
        public function borrarHotspot($id) {

            $this->db->query("DELETE FROM hotspots WHERE id_hotspot = '$id'");
            
            
			return $this->db->affected_rows();
		}
			
		public function buscarUnHotspot($id) {
            
            $res = $this->db->query("SELECT * FROM hotspots WHERE id_hotspot='$id' ");
            return $res->result_array();
		}
			
			public function modificarHotspot($id){
				
				
			$id_hotspot = $_REQUEST["id_hotspot"];
			$descripcion = $_REQUEST["descripcion"];
			$pitch = $_REQUEST["pitch"];
			$yaw = $_REQUEST["yaw"];
			$cssClass = $_REQUEST["cssClass"];
			$clickHandlerFunc = $_REQUEST["clickHandlerFunc"];
			$clickHandlerArgs = $_REQUEST["clickHandlerArgs"];
			$sceneId = $_REQUEST["sceneId"];
			$targetPitch = $_REQUEST["targetPitch"];
			$targetYaw = $_REQUEST["targetYaw"];
			$tipo = $_REQUEST["tipo"];
			
			$this->db->query("
				
				
				UPDATE hotspots
				
				 SET 
				 
					 descripcion='$descripcion',
					 pitch='$pitch',
					 yaw='$yaw',
					 cssClass='$cssClass',
					 clickHandlerFunc='$clickHandlerFunc',
					 clickHandlerArgs='$clickHandlerArgs',
					 sceneId='$sceneId',
					 targetPitch='$targetPitch',
					 targetYaw='$targetYaw',
					 tipo='$tipo'
					 
				 WHERE id_hotspot='$id_hotspot'
					 
					     ");
		
                return $this->db->affected_rows();
		
			}
        
    }