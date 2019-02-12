<?php 
    class PanoramasSecundariosModel extends CI_Model {

        public function insertSecondaryPanoramas($id){
            $resultado = array();
            $arrayImagenes = $_FILES['file']; //array de las imagenes
            $numImagenes = count($arrayImagenes['name']); //numero de imagenes
            /****************************************** */
            $arrayPosts = $_POST; //array de los inputs texto y fecha del formulario
            $longitudPosts = count($arrayPosts); //numero de inputs
            $posts = array(); //array posts

            $k=0;
            foreach($_POST as $nombre_campo => $valor){ //VALORES DE TODOS LOS INPUTS TEXT Y FECHAS
                $posts[$k] = $valor; //almaceno todos los valores de los inputs (titulo y fecha)
                $k++;
            }

            $j=0;
            for($i=0;$i<$numImagenes;$i++){
                $titulo_pan_sec = $posts[$j];
                $fechatop = $posts[$j+1];


                // Cambiamos el nombre de la imagen de carga	(le asignamos como nombre el id seguido de .jpg)
                
                $resul = $this->db->query("SELECT MAX(id_panorama_secundario) AS maxid FROM panoramas_secundarios;");
				$cadena_id = $resul->row()->maxid;

				$id_pan_sec = substr($cadena_id,8); //numero

			
				$id_string = 'pan_sec_'.($id_pan_sec+1);
                $userpic = $id_string . ".jpg";
                $upload_path = 'assets/imagenes/panoramasSecundarios/'.$userpic;
                
            if(move_uploaded_file($arrayImagenes['tmp_name'][$i],$upload_path)){
                $this->db->query("INSERT INTO panoramas_secundarios VALUES ('$id_string','$id','$titulo_pan_sec','$fechatop','$upload_path',120,-3,-84);"); //Insertamos la nueva imagen
                
            
                // Redimensionamos la imagen con la libreria imagen_lib de CodeIgniter
				
				$config['image_library'] = 'gd2';
                $config['source_image'] = $upload_path;
                $config['create_thumb'] = TRUE;
                $config['maintain_ratio'] = TRUE;
                $config['new_image'] = 'assets/imagenes/panoramasSecundarios/';  
                $config['width'] = 4000;
				$this->load->library('image_lib', $config);
				
                
                $resultado[$i] = 1;

            }
            
            else{
                $resultado[$i] = 0;
            }
            if (!$this->image_lib->resize()) {
                    // Ha ocurrido un error al redimensionar la imagen
                    $resultado[$i] = 0;  // Marca de error
                }

                $this->image_lib->clear();
                $j+=2;
            }

            return $resultado;
            
		}
		
		public function getById($id){
			
			$query = $this->db->query("SELECT cod_escena, id_panorama_secundario, titulo, fecha_acontecimiento, panorama FROM panoramas_secundarios WHERE cod_escena = '".$id."'");
			return $query->result_array();
		}

		public function delete($id){
			$devuelve = 0;
			
			if(unlink(getcwd()."/assets/imagenes/panoramasSecundarios/".$id.".jpg")){
				$this->db->query("DELETE FROM panoramas_secundarios WHERE id_panorama_secundario = '$id'");
				$devuelve = $this->db->affected_rows();

				//consultar id_hotspot para borrarlo despues de la tabla hotspots (fuck claves primarias :( ))

				$query = $this->db->query("SELECT id_hotspot FROM escenas_hotspots WHERE id_panorama_secundario = '$id'");
				$fila = $query->row();
				$idHotspot = $fila->id_hotspot;

				$this->db->query("DELETE FROM escenas_hotspots WHERE id_panorama_secundario = '$id'");
				$devuelve += $this->db->affected_rows();
				
				$this->db->query("DELETE FROM hotspots WHERE id_hotspot = '$idHotspot';");
				$devuelve += $this->db->affected_rows();

				

			}else{
				$devuelve = -1;
			}

			return $devuelve;
		}

		public function updatePanorama($id,$titulo,$fecha){


			$this->db->query("UPDATE panoramas_secundarios SET titulo = '$titulo', fecha_acontecimiento = '$fecha' WHERE id_panorama_secundario = '$id' ");
			
			return $this->db->affected_rows();
		}

		public function consultaPanoramas($cod_escena){

			$devuelve = '';

			$panoramas_secundarios = $this->db->query("SELECT panoramas_secundarios.id_panorama_secundario, panoramas_secundarios.titulo, panoramas_secundarios.panorama, panoramas_secundarios.pitch, panoramas_secundarios.yaw, panoramas_secundarios.hfov 
			FROM panoramas_secundarios INNER JOIN escenas
			ON escenas.cod_escena = panoramas_secundarios.cod_escena WHERE panoramas_secundarios.cod_escena = '$cod_escena'
			ORDER BY panoramas_secundarios.fecha_acontecimiento DESC;");

			if($panoramas_secundarios->num_rows() > 0){
				$devuelve = json_encode($panoramas_secundarios->result_array());
			}else{
				$devuelve = 0;
			}

			return $devuelve;
		}

		public function getCodEscena($id){
			$query = $this->db->query('SELECT cod_escena FROM panoramas_secundarios WHERE id_panorama_secundario = "'.$id.'"');
			
			return $query->result_array();
		}

		// obtiene los panoramas asociados a una escena en concreto,
		// se utiliza para marcar en la vista escenaStable.php los puntos
		// que contienen panoramas secundarios
		public function getPanoramasAsociados(){
			$consulta = $this->db->query("SELECT id_punto_mapa FROM `puntos_mapa`WHERE id_escena IN (SELECT cod_escena FROM panoramas_secundarios);");
			
			return $consulta->result_array();
		}

    }
?>
