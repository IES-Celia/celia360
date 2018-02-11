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
		
		
		public function insertarHotspotEscena() {
			$res = $this->db->query("SELECT id_hotspot FROM hotspots ORDER BY id_hotspot DESC LIMIT 1");
            
            echo $res;
            
			$pitch = $_REQUEST["pitch"];
			$yaw = $_REQUEST["yaw"];
			$cssClass = $_REQUEST["cssClass"];
			$clickHandlerFunc = $_REQUEST["clickHandlerFunc"];
			$clickHandlerArgs = $_REQUEST["clickHandlerArgs"];
			$sceneId = $_REQUEST["sceneId"];
			$targetPitch = $_REQUEST["targetPitch"];
			$targetYaw = $_REQUEST["targetYaw"];
			$tipo = $_REQUEST["tipo"];

			$insrt = "INSERT INTO hotspots (id_hotspot,pitch,yaw,cssClass,clickHandlerFunc,clickHandlerArgs,sceneId,targetPitch,targetYaw,tipo) 
        VALUES($idhotspot','$pitch','$yaw','$cssClass','$clickHandlerFunc','$clickHandlerArgs','$sceneId','$targetPitch','$targetYaw','$tipo')";	
			
			// importante crear tambien la relacion en la tabla escenas_hotspots algo asi:
            
           // echo "INSERT INTO escenas_hotspots (id_escena, id_hotspot) VALUES ('$idescena','$idhotspot');<br>";
            
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
      
      
       ///////////////////////////ZYGIS - Cosas del CMS/////////////////////////
      
      
      public function insertar_imagenes_hotspot(){
        
          $id_hotspot = $_REQUEST["idhs"];
          //Al ser un array string lo partimos por las comas.
          $listaArray = $_REQUEST["listaimg"];
          //$resultado = implode(",",$listaimagenes);
          $listaimagenes = explode($listaArray,",");
          
          foreach ($listaimagenes as $imagen_id){ 
             $sql = "INSERT INTO panel_imagenes (id_hotspot,id_imagen)VALUES('$id_hotspot','$imagen_id')";
             $this->db->query($sql);
          }
         return $this->db->affected_rows();
      }
        
        //Aqui deberia deberia ser un parametro pero al no estar funcionando he puesto un numero fijo para hacer pruebas.
      public function cargar_imagenes_panel(){
        
        $id_hotspot = 8;//$_REQUEST["idhs"];
        //Sacar todas las imagenes que tiene asociadas ese ID que le hemos pasado
        $res = $this->db->query("
        SELECT 
        hotspots.titulo_panel,
        hotspots.texto_panel,
        imagenes.* 
        FROM imagenes 
        INNER JOIN panel_imagenes 
        ON panel_imagenes.id_imagen = imagenes.id_imagen
        INNER JOIN hotspots
        ON panel_imagenes.id_hotspot = hotspots.id_hotspot
        WHERE panel_imagenes.id_hotspot='$id_hotspot'");
        //Array donde guardamos todos los ids de imagenes.
        $lista_info_imagenes = $res->result_array();
        echo json_encode($lista_info_imagenes);

      }
    
        
    }