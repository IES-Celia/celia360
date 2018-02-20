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
        
    public function __construct() {
        parent::__construct();
        $this->load->model("Modeloescenas");
        $this->load->model("UsuarioModel");
    }
		
		
		public function insertarHotspotEscena() {
            // esta consulta es para sacar el ultimo id y sumarle uno, evitando asi tener que poner AI en la bd
			$res = $this->db->query("SELECT id_hotspot FROM hotspots ORDER BY id_hotspot DESC LIMIT 1")->result_array()[0]["id_hotspot"];
            $idhotspot = $res+1;
            
            $id_scene= $_REQUEST["id_scene"];
			$pitch = $_REQUEST["pitch"];
			$yaw = $_REQUEST["yaw"];
			$cssClass = $_REQUEST["cssClass"];
			$clickHandlerFunc = $_REQUEST["clickHandlerFunc"];
			$clickHandlerArgs = $_REQUEST["clickHandlerArgs"];
            $sceneId = $_REQUEST["sceneId"];
			$targetPitch = $_REQUEST["targetPitch"];
			$targetYaw = $_REQUEST["targetYaw"];
			$tipo = $_REQUEST["tipo"];
            
            // insercción del punto en la tabla hotspot
			$insrt = "INSERT INTO hotspots (id_hotspot,pitch,yaw,cssClass,clickHandlerFunc,clickHandlerArgs,sceneId,targetPitch,targetYaw,tipo) VALUES(' $idhotspot','$pitch' ,'$yaw','$cssClass', '$clickHandlerFunc','$clickHandlerArgs','$sceneId','$targetPitch','$targetYaw','$tipo')";	
			$this->db->query($insrt);
            
			// insercción de la relación (del jotpoch y la escena para que el json pueda salir) en la tabla escenas_hotspots 
            // lo primero es recuperar el id de la escena a partir del cod_escena y luego ya el insert
            
            $cadenaconsulta= "SELECT id_escena FROM escenas WHERE cod_escena='".$id_scene."'";
            $res2 = $this->db->query($cadenaconsulta)->result_array()[0]["id_escena"];
            
            $insrt2 = "INSERT INTO escenas_hotspots (id_escena, id_hotspot) VALUES ($res2,$idhotspot);";
            
            $this->db->query($insrt2);
            
			return $this->db->affected_rows();
		
        }
        
        public function modificarPitchYaw($pitch, $yaw, $idhotspot){
            $this->db->query("UPDATE hotspots SET pitch=".$pitch.", yaw=".$yaw." WHERE id_hotspot=".$idhotspot);
        }
        
        public function modificarPitchYawEscena($pitch, $yaw, $codescena){
            $this->db->query("UPDATE escenas SET pitch=".$pitch.", yaw=".$yaw." WHERE cod_escena='".$codescena."'");
        }
 
        public function borrarHotspot($id) {
            $this->db->query("DELETE FROM hotspots WHERE id_hotspot = '$id'");
			$this->db->query("DELETE FROM escenas_hotspots WHERE id_hotspot = '$id'");

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
      
       public function insertarHotspotPanel() {
            
            // esta consulta es para sacar el ultimo id y sumarle uno, evitando asi tener que poner AI en la bd
			$res = $this->db->query("SELECT id_hotspot FROM hotspots ORDER BY id_hotspot DESC LIMIT 1")->result_array()[0]["id_hotspot"];
            $idhotspot = $res+1;
            
            $id_scene= $_REQUEST["id_scene"];
			$pitch = $_REQUEST["pitch"];
			$yaw = $_REQUEST["yaw"];
			$cssClass = $_REQUEST["cssClass"];
            $clickHandlerFunc =$_REQUEST["clickHandlerFunc"];
			$clickHandlerArgs =$_REQUEST["clickHandlerArgs"];
			$tipo = $_REQUEST["tipo"];
            //Panel
            $titulo = $_REQUEST["titulo"]; //
            $texto = $_REQUEST["texto"]; //
            
            // insercción del punto en la tabla hotspot
			$insrt = "INSERT INTO hotspots (id_hotspot,pitch,yaw,cssClass,clickHandlerFunc,clickHandlerArgs,tipo,titulo_panel,texto_panel) VALUES(' $idhotspot','$pitch' ,'$yaw','$cssClass', '$clickHandlerFunc','$clickHandlerArgs','$tipo','$titulo','$texto')";	
			$this->db->query($insrt);
            
			// insercción de la relación (del jotpoch y la escena para que el json pueda salir) en la tabla escenas_hotspots 
            // lo primero es recuperar el id de la escena a partir del cod_escena y luego ya el insert
            
            $cadenaconsulta= "SELECT id_escena FROM escenas WHERE cod_escena='".$id_scene."'";
            $res2 = $this->db->query($cadenaconsulta)->result_array()[0]["id_escena"];
            
            $insrt2 = "INSERT INTO escenas_hotspots (id_escena, id_hotspot) VALUES ($res2,$idhotspot);";
            
            $this->db->query($insrt2);
            
			return $idhotspot;
		
        }
      
       public function insertarHotspotEscalera() {
            
            // esta consulta es para sacar el ultimo id y sumarle uno, evitando asi tener que poner AI en la bd
			$res = $this->db->query("SELECT id_hotspot FROM hotspots ORDER BY id_hotspot DESC LIMIT 1")->result_array()[0]["id_hotspot"];
            $idhotspot = $res+1;
            
            $id_scene= $_REQUEST["id_scene"];
			$pitch = $_REQUEST["pitch"];
			$yaw = $_REQUEST["yaw"];
			$cssClass = $_REQUEST["cssClass"];
            $clickHandlerFunc =$_REQUEST["clickHandlerFunc"]; 
            // insercción del punto en la tabla hotspot
			$insrt = "INSERT INTO hotspots (id_hotspot,pitch,yaw,cssClass,clickHandlerFunc) 
            VALUES(' $idhotspot','$pitch' ,'$yaw','$cssClass', '$clickHandlerFunc')";	
			$this->db->query($insrt);
            
			// insercción de la relación (del jotpoch y la escena para que el json pueda salir) en la tabla escenas_hotspots 
            // lo primero es recuperar el id de la escena a partir del cod_escena y luego ya el insert
            
            $cadenaconsulta= "SELECT id_escena FROM escenas WHERE cod_escena='".$id_scene."'";
            $res2 = $this->db->query($cadenaconsulta)->result_array()[0]["id_escena"];
            
            $insrt2 = "INSERT INTO escenas_hotspots (id_escena, id_hotspot) VALUES ($res2,$idhotspot);";
            
            $this->db->query($insrt2);
            
			return $idhotspot;
		
        }
      
      
      public function insertar_imagenes_hotspot(){
        
          $id_hotspot = $_REQUEST["idhs"];
          //Al ser un array string lo partimos por las comas.
          $listaArray = $_REQUEST["listaimg"];
          //$resultado = implode(",",$listaimagenes);
          $listaimagenes = explode($listaArray,",");
          
          foreach ($listaArray as $imagen_id){ 
             $sql = "INSERT INTO panel_imagenes (id_hotspot,id_imagen)VALUES('$id_hotspot','$imagen_id')";
             $this->db->query($sql);
          }
         return $this->db->affected_rows();
      }
        
        //Aqui deberia deberia ser un parametro pero al no estar funcionando he puesto un numero fijo para hacer pruebas.
      public function cargar_imagenes_panel($id){
        
        $id_hotspot = $id;
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
      
    public function insertarHotspotAudio() {

        // esta consulta es para sacar el ultimo id y sumarle uno, evitando asi tener que poner AI en la bd
        $res = $this->db->query("SELECT id_hotspot FROM hotspots ORDER BY id_hotspot DESC LIMIT 1")->result_array()[0]["id_hotspot"];
        $idhotspot = $res + 1;

        $id_scene = $this->input->post_get("id_scene");
        $pitch = $this->input->post_get("pitch");
        $yaw = $this->input->post_get("yaw");
        $cssClass = $this->input->post_get("cssClass");
        $tipo = $this->input->post_get("tipo");
        $clickHandlerFunc =$this->input->post_get("clickHandlerFunc");
        $clickHandlerArgs = $this->input->post_get("clickHandlerArgs");
        
        // insercción del audio en la tabla hotspot
        $insrt = "INSERT INTO hotspots (id_hotspot,pitch,yaw,cssClass,tipo,clickHandlerFunc,clickHandlerArgs,sceneId)"
                . " VALUES(' $idhotspot','$pitch' ,'$yaw','$cssClass' ,'$tipo', '$clickHandlerFunc','$clickHandlerArgs','$id_scene')";
        $this->db->query($insrt);
  
        // insercción de la relación (del jotpoch y la escena para que el json pueda salir) en la tabla escenas_hotspots 
        // lo primero es recuperar el id de la escena a partir del cod_escena y luego ya el insert
            
        $cadenaconsulta = "SELECT id_escena FROM escenas WHERE cod_escena='" . $id_scene . "'";
        $res2 = $this->db->query($cadenaconsulta)->result_array()[0]["id_escena"];

        $insrt2 = "INSERT INTO escenas_hotspots (id_escena, id_hotspot) VALUES ($res2,$idhotspot);";

        $this->db->query($insrt2);

        return $this->db->affected_rows();
    }
      
    //Sacar el id del ultimo hotspot.
    public function ultimo_hotspot(){
        $res = $this->db->query("SELECT id_hotspot FROM hotspots ORDER BY id_hotspot DESC LIMIT 1")->result_array()[0]["id_hotspot"];
        return $res;
    }
        
    // saca la escena de un punto... importante por no tener el cod_escena en el hotspot    
    public function cargar_codigo_escena($idhotspot){
        $sql ="SELECT id_escena FROM escenas_hotspots WHERE id_hotspot=".$idhotspot;
        $res = $this->db->query($sql)->result_array()[0]["id_escena"];
        $sql2="SELECT cod_escena FROM escenas WHERE id_escena=".$res;
        $res = $this->db->query($sql2)->result_array()[0]["cod_escena"];
        return $res;
    }       


	 public function process_insert_hotspot(){
		 $pitch = $this->input->post_get("pitch");
		 $yaw = $this->input->post_get("yaw");
		 $cssClass = $this->input->post_get("cssClass");
		 $tipo = $this->input->post_get("tipo");
		 $clickHandlerFunc = $this->input->post_get("clickHandlerFunc");
		 $clickHandlerArgs = $this->input->post_get("clickHandlerArgs");
		$res = $this->db->query("SELECT id_hotspot FROM hotspots ORDER BY id_hotspot DESC LIMIT 1")->result_array()[0]["id_hotspot"];
		 $idhotspot = $res+1;
		 $insrt = "INSERT INTO hotspots (id_hotspot,pitch,yaw,cssClass,clickHandlerFunc,clickHandlerArgs,tipo) VALUES('$idhotspot','$pitch','$yaw','$cssClass','$clickHandlerFunc','$clickHandlerArgs','$tipo')";	
		$this->db->query($insrt);
		return $this->db->affected_rows();
	  }	
}