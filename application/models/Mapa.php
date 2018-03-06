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
			
			if($posicion!=$posicion_inicial){
				echo "no es igual";
				if($posicion>$posicion_inicial){
					$this->imagen_adelante($posicion_inicial, $posicion);
				}
				if($posicion<$posicion_inicial){
					$this->imagen_atras($posicion_inicial, $posicion);
				}
			}else{
				echo "son iguales";
			}
			
			
			
		}

		public function actualizar_imagen(){

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

	}