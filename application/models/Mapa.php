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
					$this->imagen_adelante($posicion_inicial, $posicion);
					$this->actualizar_imagen($zona, $posicion);
				}
				if($posicion<$posicion_inicial){
					$this->imagen_atras($posicion_inicial, $posicion);
					$this->actualizar_imagen($zona, $posicion);
				}
			}else{
				$this->actualizar_imagen($posicion);
			}
		}

		public function actualizar_imagen($posicion){
			

			$config['upload_path'] = 'assets/css/';
        	$config['allowed_types'] = 'jpg|png';
			$this->load->library('upload', $config);
			$this->load->database();

			$resultado = $this->upload->do_upload('zona');
			$this->upload->display_errors();
			$nombre = $this->upload->data('file_name');
			$this->db->query("UPDATE pisos SET url_img='assets/css/$nombre' WHERE piso=$posicion ");

		}

		public function imagen_atras($inicial, $destino){ 
			$this->load->database();
			$this->db->query("SET foreign_key_checks=0;");

			$sql="UPDATE pisos SET piso=1000 WHERE piso=$inicial";
			$this->db->query($sql);

			$sql="UPDATE puntos_mapa SET piso=1000 WHERE piso=$inicial";
			$this->db->query($sql);

			for ($i=$inicial; $i > $destino ; $i--) { 
				$sql="UPDATE pisos SET piso=$i WHERE piso=$i-1";
				$this->db->query($sql);

				$sql="UPDATE puntos_mapa SET piso=$i WHERE piso=$i-1";
				$this->db->query($sql);
			}
			$sql="UPDATE pisos SET piso=$destino WHERE piso=1000";
			$this->db->query($sql);

			$sql="UPDATE puntos_mapa SET piso=$destino WHERE piso=1000";
			$this->db->query($sql);
			$this->db->query("SET foreign_key_checks=1;");
		}

		public function imagen_adelante($inicial, $destino){
			$this->load->database();
			$this->db->query("SET foreign_key_checks=0;");

			$sql="UPDATE pisos SET piso=1000 WHERE piso=$inicial";
			$this->db->query($sql);

			$sql="UPDATE puntos_mapa SET piso=1000 WHERE piso=$inicial";
			$this->db->query($sql);

			for ($i=$inicial; $i < $destino ; $i++) { 
				$sql="UPDATE pisos SET piso=$i WHERE piso=$i+1";
				$this->db->query($sql);

				$sql="UPDATE puntos_mapa SET piso=$i WHERE piso=$i+1";
				$this->db->query($sql);
			}
			$sql="UPDATE pisos SET piso=$destino WHERE piso=1000";
			$this->db->query($sql);

			$sql="UPDATE puntos_mapa SET piso=$destino WHERE piso=1000";
			$this->db->query($sql);
			$this->db->query("SET foreign_key_checks=1;");
		}

		public function anadir_zona(){
			$posicion = $this->input->post_get("posicion");
			$this->load->database();

			$maximo = $this->db->query("SELECT COUNT(piso) from pisos");

			for ($i=$maximo-2; $i >= $posicion ; $i--) { 
				$this->db->query("SET foreign_key_checks=0;");
				
				$this->db->query("UPDATE pisos SET piso=$i+1 WHERE piso=$i");
				$this->db->query("UPDATE puntos_mapa SET piso=$i+1 WHERE piso=$i");
				
				$this->db->query("SET foreign_key_checks=1;");
			}
		}
	}