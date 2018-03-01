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
		public function crear_zona(){
			$resultado = array();

			$nombre_zona = $this->input->post_get('nombre_zona');

			$zonas = $this->db->query("SELECT * FROM zonas");

			var_dump($zonas);

			$resul = $this->db->query("SELECT MAX(id_imagen) AS maxid FROM imagenes ORDER BY id_imagen DESC LIMIT 1");
			$id_nuevaimagen = $resul->row()->maxid;

			//cambiar el nombre de la imagen de carga	
			$userpic = $id_nuevaimagen . "." . "jpg";

			$config['upload_path'] = 'assets/imagenes/imagenes-hotspots/';
			$config['allowed_types'] = 'jpg';
			$config['file_name'] = $userpic;

			//cargar la librería
			$this->load->library('upload', $config);
			//Realiza la carga según las preferencias que ha establecido.
			$resultado_subida = $this->upload->do_upload('imagen');

			if ($resultado_subida == false) {
				// ¡¡La subida del fichero ha fallado!!
				$resultado[0] = false;
				$resultado[1] = $this->upload->display_errors("<i>", "</i>");
				// Borramos el registro que habíamos creado vacío (solo con el ID)
				$this->db->query("DELETE FROM imagenes WHERE id_imagen = '$id_nuevaimagen'");
			} else {
				// ¡¡La subida del fichero ha sido un éxito!!
				//Para devolver un elemento de la matriz: $this->upload->data('client_name'); 
				//Nombre de archivo proporcionado por el agente de usuario del cliente, antes de cualquier preparación o incremento de nombre de archivo
				$imgFile = $this->upload->data('client_name');
				//Nombre del archivo que se cargó, incluida la extensión de nombre de archivo
				$tmp_dir = $this->upload->data('file_name');
				// Modificamos el registro en la base de datos
				$resultado[0] = true;
				$resultado[1] = $this->db->query("UPDATE imagenes SET titulo_imagen='$titulo_imagen', texto_imagen = '$texto_imagen', 
											url_imagen = '$userpic', fecha = '$fecha' WHERE id_imagen = '$id_nuevaimagen'");
				// Creamos una miniatura de la imagen
				$nombre_miniatura = $id_nuevaimagen . "_miniatura.jpg";
				copy('assets/imagenes/imagenes-hotspots/'.$userpic, 'assets/imagenes/imagenes-hotspots/'.$nombre_miniatura);
				$config['image_library'] = 'gd2';
				$config['source_image'] = 'assets/imagenes/imagenes-hotspots/'.$nombre_miniatura;
				$config['maintain_ratio'] = TRUE;
				$config['width'] = 200;
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
			}
			return $resultado;
		}

	}