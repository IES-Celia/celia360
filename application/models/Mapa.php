<?php

	class Mapa extends CI_Model {

		

		public function cargar_mapa(){
			$this->load->database();
			$query = $this->db->query('SELECT * FROM pisos');

			$lista=array();

			foreach ($query->result_array() as $fila) {
				$lista[]=$fila;
			}
			return $lista;
		}

		public function cargar_puntos(){
			$this->load->database();
			$query = $this->db->query('SELECT * FROM puntos_mapa'); 
			$lista=array();

			foreach ($query->result_array() as $fila) {
				$lista[]=$fila;
			}
			return $lista;
		}

		public function cargar_config(){
			$this->load->database();
			$query = $this->db->query('SELECT * FROM config_mapa')->result_array();
			$resultado["piso_inicial"]=$query[0]["piso_inicial"];
			$resultado["punto_inicial"]=$query[0]["punto_inicial"];
			return $resultado;
		}

		public function editar_zona(){
			$posicion = $this->input->post_get("posicion");
			$posicion_inicial = $this->input->post_get("posicion_inicial");
			if($posicion!=$posicion_inicial){
				if($posicion>$posicion_inicial){
					$tipo = "movimiento";
					$resultado = $this->actualizar_imagen($posicion);
					$sin_imagen = strpos("You did not select a file to upload.", $resultado);
					if($resultado == 1 || $sin_imagen>=0)
					$this->imagen_adelante($posicion_inicial, $posicion);
					else{
						echo $resultado;
					} 
				}
				if($posicion<$posicion_inicial){
					$tipo="movimiento";
					$resultado = $this->actualizar_imagen($posicion);
					$sin_imagen = strpos("You did not select a file to upload.", $resultado);
					if($resultado == 1 || $sin_imagen>=0)
					$this->imagen_atras($posicion_inicial, $posicion);
					else{
						echo $resultado;
					} 
					
				}
			}else{
				$tipo="sustitucion";
				$resultado = $this->actualizar_imagen($posicion);
				$sin_imagen = strpos("You did not select a file to upload.", $resultado);
				if($resultado==1  || $sin_imagen>=0){
					echo "No has cambiado la zona ni la imagen de la misma, no has hecho nada -.-\"";
				}else{
					echo $resultado;
				} 
			}
		}

		public function actualizar_imagen($posicion){
					$imagen_antigua=$this->db->query("SELECT url_img FROM pisos WHERE piso=$posicion")->result_array()[0]["url_img"];
					$piso_imagen_coincidente = $this->db->query("SELECT piso FROM pisos WHERE url_img LIKE '%/".$_FILES["zona"]["name"]."'")->result_array();
					$coincidencia = $this->db->affected_rows(); 
					if($coincidencia==0){
						
						$config['upload_path'] = 'assets/imagenes/mapa/';
						$config['allowed_types'] = 'jpg|png';

						$this->load->library('upload', $config);
						
						$resultado = $this->upload->do_upload('zona');
						if($resultado==1){
							$nombre=$this->upload->data("file_name");
							$this->db->query("UPDATE pisos SET url_img='assets/imagenes/mapa/$nombre' WHERE piso=$posicion ");
							unlink($imagen_antigua);
						}else{
							$resultado = $this->upload->display_errors();
						}
						}else if($piso_imagen_coincidente==$posicion){

								$config['upload_path'] = 'assets/imagenes/mapa/';
								$config['allowed_types'] = 'jpg|png';
								$config['overwrite'] = true;
								
								$this->load->library('upload', $config);
								$resultado = $this->upload->do_upload('zona');
								if(resultado!=1){
									$resultado = $this->upload->display_errors();
								}
							}else if($piso_imagen_coincidente!=$posicion){
									$resultado="el nombre de la imagen ya existe para otra zona, porfavor renombre la imagen antes de subirla";
							}
			return $resultado;
		}

		public function imagen_atras($inicial, $destino){ 
			$this->load->database();
			$this->db->query("SET foreign_key_checks=0;");

			$this->db->query("UPDATE pisos SET piso=1000 WHERE piso=$inicial");

			$this->db->query("UPDATE puntos_mapa SET piso=1000 WHERE piso=$inicial");

			for ($i=$inicial; $i > $destino ; $i--) { 
				$this->db->query("UPDATE pisos SET piso=$i WHERE piso=$i-1");

				$this->db->query("UPDATE puntos_mapa SET piso=$i WHERE piso=$i-1");
			}
			$this->db->query("UPDATE pisos SET piso=$destino WHERE piso=1000");

			$this->db->query("UPDATE puntos_mapa SET piso=$destino WHERE piso=1000");
			$this->db->query("SET foreign_key_checks=1;");
		}

		public function imagen_adelante($inicial, $destino){
			$this->load->database();

			$this->db->query("SET foreign_key_checks=0;");

			$this->db->query("UPDATE pisos SET piso=1000 WHERE piso=$inicial");

			$this->db->query("UPDATE puntos_mapa SET piso=1000 WHERE piso=$inicial");

			for ($i=$inicial; $i < $destino ; $i++) { 
				$this->db->query("UPDATE pisos SET piso=$i WHERE piso=$i+1");

				$this->db->query("UPDATE puntos_mapa SET piso=$i WHERE piso=$i+1");
			}
	
			$this->db->query("UPDATE pisos SET piso=$destino WHERE piso=1000");

			$this->db->query("UPDATE puntos_mapa SET piso=$destino WHERE piso=1000");

			$this->db->query("SET foreign_key_checks=1;");
		}

		public function crear_zona(){
			$posicion = $this->input->post_get("posicion");

			$this->load->database();
			$config['upload_path'] = 'assets/imagenes/mapa/';
			$config['allowed_types'] = 'jpg|png';

			$this->load->library('upload', $config);

			$resultado = $this->upload->do_upload('zona');
			$imagen_subida = $this->upload->data("file_name");
			if($resultado==1){

				$maximo = $this->db->query("SELECT COUNT(piso) from pisos")->result_array()[0]["COUNT(piso)"];
				
				$this->db->query("SET foreign_key_checks=0;");
			
				for ($i=$maximo-1; $i >= $posicion ; $i--) { 
					$piso_siguiente = $i+1;
					$this->db->query("UPDATE pisos SET piso=$piso_siguiente WHERE piso=$i");

					$this->db->query("UPDATE puntos_mapa SET piso=$piso_siguiente WHERE piso=$i");
				}

				$this->db->query("INSERT INTO pisos (piso, url_img) VALUES ($posicion,'assets/imagenes/mapa/$imagen_subida');");
				$this->db->query("SET foreign_key_checks=1;");

			}else{
				$resultado = $this->upload->display_errors();
			}
		}

		public function eliminar_zona($piso,$piso_maximo){
			$this->imagen_adelante($piso,$piso_maximo);

			$this->db->query("SET foreign_key_checks=0;");

			$sql = "SELECT id_escena FROM escenas WHERE cod_escena IN (SELECT id_escena FROM puntos_mapa where piso = $piso_maximo )";
			$resultado = $this->db->query($sql)->result_array();

			$sql = "DELETE FROM pisos WHERE piso = $piso_maximo";
			$this->db->query($sql);

			$sql = "SELECT url_img FROM pisos WHERE piso = $piso_maximo";
			$zona_borrar = $this->db->query($sql)->result_array();
			if (isset($zona_borrar[0]["url_img"])) {
				unlink($zona_borrar[0]["url_img"]);
			}

			
			$sql ="DELETE FROM puntos_mapa WHERE piso = $piso_maximo";
			$this->db->query($sql);

			foreach ($resultado as $id) {
				$sql = "DELETE FROM hotspots WHERE id_hotspot IN (
					SELECT id_hotspot FROM escenas_hotspots where id_escena = \"".$id['id_escena']."\")";
				$this->db->query($sql);
	
				
				$sql = "DELETE FROM escenas_hotspots WHERE id_escena = \"".$id['id_escena']."\" ";
				$this->db->query($sql);
	
				$sql = "DELETE FROM hotspots WHERE sceneid=(SELECT cod_escena FROM escenas WHERE id_escena=\"".$id['id_escena']."\")";
				$this->db->query($sql);

				$sql = "SELECT panorama FROM escenas WHERE id_escena = \"".$id['id_escena']."\" ";
				$panorama_borrar=$this->db->query($sql)->result_array();
				unlink($panorama_borrar[0]["panorama"]);
					
				$sql = "DELETE FROM escenas WHERE id_escena = \"".$id['id_escena']."\" ";
				$this->db->query($sql);
			}
			$this->db->query("SET foreign_key_checks=1;");

			
		}
	}