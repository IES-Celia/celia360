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
			$zona = $this->input->post_get("zona");
			
			if(!$posicion==$posicion_inicial){
				if($posicion>$posicion_inicial){
					echo "Hacia delante";
				}
				if($posicion<$posicion_inicial){
					echo "Hacia atras";
					//imagen_atras($posicion_inicial, $posicion);
				}
			}
			
			
			
		}

		public function actualizar_imagen(){

		}

		public function imagen_atras($inicial, $destino){
			$this->load->database();
			$sql="UPDATE pisos SET piso=1000 WHERE piso=$inicial";
			$this->db->query($sql);
			for ($i=$inicial; $i > $destino ; $i--) { 
				$sql="UPDATE pisos SET piso=$i WHERE piso=$i-1";
				$this->db->query($sql);
			}
			$sql="UPDATE pisos SET piso=$destino WHERE piso=1000";
			$this->db->query($sql);
			echo "hecho";
		}

		public function imagen_adelante(){

		}

	}