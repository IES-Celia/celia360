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
		public function editar_zona(){
			$posicion = $this->input->post_get("posicion");
			$posicion_inicial = $this->input->post_get("posicion_inicial");
			if($posicion!=$posicion_inicial){
				if($posicion>$posicion_inicial){
					$tipo="movimiento";
					//$this->imagen_adelante($posicion_inicial, $posicion);
					$this->actualizar_imagen($posicion);
				}
				if($posicion<$posicion_inicial){
					$tipo="movimiento";
					//$this->imagen_atras($posicion_inicial, $posicion);
					$this->actualizar_imagen($posicion);
				}
			}else{
				$tipo="actualizacion";
				$this->actualizar_imagen($posicion,$tipo);
			}
		}

		public function actualizar_imagen($posicion,$tipo){
			
			$resultado = $this->db->query("SELECT url_img, piso FROM pisos WHERE url_img LIKE '%".$_FILES['zona']['name']."%'");
			$resultado = $resultado->result_array();

			switch ($tipo) {
				case 'actualizacion':
					unlink($resultado[0][piso])
					break;
				case 'movimiento':

					break;
			}
			
			if($this->db->affected_rows()==0){
				$config['upload_path'] = 'assets/css/';
				$config['allowed_types'] = 'jpg|png';
				
				$this->load->library('upload', $config);
				$nombre = $this->upload->data('file_name');

				$this->db->query("UPDATE pisos SET url_img='assets/css/$nombre' WHERE piso=$posicion ");

				$resultado = $this->upload->do_upload('zona');
			}else {
				if($resultado[0]["piso"]==$posicion){
					echo "es el mismo piso";
				}else{
					echo "no es el mismo piso";
				}


				/*$config['upload_path'] = 'assets/css/';
				$config['allowed_types'] = 'jpg|png';
				
				$this->load->library('upload', $config);
				$nombre = $this->upload->data('file_name');

				$this->db->query("UPDATE pisos SET url_img='assets/css/$nombre' WHERE piso=$posicion ");

				$resultado = $this->upload->do_upload('zona');*/
			}

			

			

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

		public function anadir_zona(){
			$posicion = $this->input->post_get("posicion");

			$this->load->database();

			$maximo = $this->db->query("SELECT COUNT(piso) from pisos");

			$this->db->query("SET foreign_key_checks=0;");
			
			for ($i=$maximo-1; $i >= $posicion ; $i--) { 
				
				$this->db->query("UPDATE pisos SET piso=$i+1 WHERE piso=$i");

				$this->db->query("UPDATE puntos_mapa SET piso=$i+1 WHERE piso=$i");

			}
			$this->db->query("INSERT ");

			$this->db->query("SET foreign_key_checks=1;");
		}
	}
