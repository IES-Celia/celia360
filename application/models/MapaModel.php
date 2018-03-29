<?php

	class MapaModel extends CI_Model {

		
/**
 * Cargamos la informacion de las zonas y sus puntos.
 */
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
/**
 * Carga la configuración inicial para conocer el piso inicial y el punto/escena.
 */
		public function cargar_config(){
			$this->load->database();
			$query = $this->db->query('SELECT * FROM config_mapa')->result_array();
			$resultado["piso_inicial"]=$query[0]["piso_inicial"];
			$resultado["punto_inicial"]=$query[0]["punto_inicial"];
			$resultado["escena_inicial"]=$query[0]["escena_inicial"];
			return $resultado;
		}
/**
 * edita la zona en cuestión, pudiendo cambiar imagen y posición.
 */
		public function editar_zona(){
			$posicion = $this->input->post_get("posicion");//Sacamos la posicion a la que moveremos la zona
			$posicion_inicial = $this->input->post_get("posicion_inicial");//sacamos la posicion inicial
			if($posicion!=$posicion_inicial){ //si las posiciones no coinciden se ejecuta el código
				if($posicion>$posicion_inicial){ //si la posición inicial
					$tipo = "movimiento";
					$resultado = $this->actualizar_imagen($posicion);//actualizamos la imagen
					$sin_imagen = strpos("You did not select a file to upload.", $resultado);//si nos devuelve un error comprobamos que sea que no hay archivo
					if($resultado == 1 || $sin_imagen>=0)//si no hay archivo o se ha actualizado correctamente.
					$this->imagen_adelante($posicion_inicial, $posicion);//se coloca la zona
					else 
					echo $resultado; //devuelve el resultado
				}
				if($posicion<$posicion_inicial){
					$tipo="movimiento";
					$resultado = $this->actualizar_imagen($posicion);//actualizamos la imagen
					$sin_imagen = strpos("You did not select a file to upload.", $resultado);//si nos devuelve un error comprobamos que sea que no hay archivo
					if($resultado == 1 || $sin_imagen>=0)//si no hay archivo o se ha actualizado correctamente.
					$this->imagen_atras($posicion_inicial, $posicion);//se coloca la zona
					else{
						echo $resultado;//devuelve el resultado
					} 
					
				}
			}else{ //si las posiciones coinciden se actualiza la imagen 
				$tipo="sustitucion";
				$resultado = $this->actualizar_imagen($posicion);//actualizamos la imagen
				$sin_imagen = strpos("You did not select a file to upload.", $resultado);//si nos devuelve un error comprobamos que sea que no hay archivo
				if($resultado==1  || $sin_imagen>=0){//si no hay archivo y tampoco se modifica la posición no haces nada :)
					echo "No has cambiado la zona ni la imagen de la misma, no has hecho nada -.-\"";
				}else{
					echo $resultado;
				} 
			}
		}
/**
 * comprueba la existencia de la imagen y actua dependiendo del resultado.
 */
		public function actualizar_imagen($posicion){
					$imagen_antigua=$this->db->query("SELECT url_img FROM pisos WHERE piso=$posicion")->result_array()[0]["url_img"];//se saca la imagen antigua de la zona.
					$piso_imagen_coincidente = $this->db->query("SELECT piso FROM pisos WHERE url_img LIKE '%/".$_FILES["zona"]["name"]."'")->result_array();//se comprueba si la nueva imagen tiene alguna coincidencia.
					$coincidencia = $this->db->affected_rows(); 
					if($coincidencia==0){//si no coincide se ejecuta el siguiente codigo
						
						$config['upload_path'] = 'assets/imagenes/mapa/'; //ruta donde se sube la imagen
						$config['allowed_types'] = 'jpg|png'; //tipo de imagenes permitidas

						$this->load->library('upload', $config);
						
						$resultado = $this->upload->do_upload('zona');//se sube la nueva imagen
						if($resultado==1){//si la imagen se sube correctamente
							$nombre=$this->upload->data("file_name");//sacamos el nombre de la imagen subida
							$this->db->query("UPDATE pisos SET url_img='assets/imagenes/mapa/$nombre' WHERE piso=$posicion"); //Actualizamos el campo de la BBDD
							unlink($imagen_antigua); //Eliminamos la imagen antigua
						}else{//si no funciona nos devuelve los errores.
							$resultado = $this->upload->display_errors();
						}
						}else if($piso_imagen_coincidente==$posicion){//si la imagen que coincide pertenece a la misma zona

								$config['upload_path'] = 'assets/imagenes/mapa/'; //ruta donde se sube la imagen
								$config['allowed_types'] = 'jpg|png'; //tipo de imagenes permitidas
								$config['overwrite'] = true; //le decimos a la libreria upload que sobreescriba el archivo
								
								$this->load->library('upload', $config);
								$resultado = $this->upload->do_upload('zona');//se sube la imagen
								if(resultado!=1){ //si la imagen no se ha subido nos devuelve los errores
									$resultado = $this->upload->display_errors();
								}
							}else if($piso_imagen_coincidente!=$posicion){//si encuentra la imagen y no corresponde con la zona nos devuelve un mensaje y no sube la imagen.
									$resultado="el nombre de la imagen ya existe para otra zona, porfavor renombre la imagen antes de subirla";
							}
			return $resultado;
		}
/**
 * Al mover una zona desplaza el resto de imagenes para que no se sobrepongan y evitar conflictos
 */
		public function imagen_atras($inicial, $destino){ 
			$this->load->database();
			$this->db->query("SET foreign_key_checks=0;");

			$this->db->query("UPDATE pisos SET piso=1000 WHERE piso=$inicial"); //se coloca el piso en la posición 1000.

			$this->db->query("UPDATE puntos_mapa SET piso=1000 WHERE piso=$inicial"); // se coloca los puntos de la zona en la posicion 1000

			for ($i=$inicial; $i > $destino ; $i--) { //se mueven todos los pisos hacia atras 
				$this->db->query("UPDATE pisos SET piso=$i WHERE piso=$i-1");

				$this->db->query("UPDATE puntos_mapa SET piso=$i WHERE piso=$i-1");
			}
			$this->db->query("UPDATE pisos SET piso=$destino WHERE piso=1000"); //Se coloca la zona en la posición de destino

			$this->db->query("UPDATE puntos_mapa SET piso=$destino WHERE piso=1000");//Se colocan los puntos de dicha zona en la posicion de destino
			$this->db->query("SET foreign_key_checks=1;");
		}
/**
 * Al mover una zona desplaza el resto de imagenes para que no se sobrepongan y evitar conflictos
 */
		public function imagen_adelante($inicial, $destino){
			$this->load->database();

			$this->db->query("SET foreign_key_checks=0;");

			$this->db->query("UPDATE pisos SET piso=1000 WHERE piso=$inicial");//se coloca la zona a mover en la posicion 1000

			$this->db->query("UPDATE puntos_mapa SET piso=1000 WHERE piso=$inicial");//se coloca los puntos de la zona mover en la posicion 1000

			for ($i=$inicial; $i < $destino ; $i++) { //Se mueven las zonas necesarias hacia delante.
				$this->db->query("UPDATE pisos SET piso=$i WHERE piso=$i+1");

				$this->db->query("UPDATE puntos_mapa SET piso=$i WHERE piso=$i+1");
			}
	
			$this->db->query("UPDATE pisos SET piso=$destino WHERE piso=1000"); //se coloca la zona 1000 en la posicion de destino

			$this->db->query("UPDATE puntos_mapa SET piso=$destino WHERE piso=1000"); //se coloca los puntos de la zona 1000 en la posicion de destino

			$this->db->query("SET foreign_key_checks=1;");
		}
/**
 * Creación de una zona con subida de imagen y demas.
 */
		public function crear_zona(){
			$posicion = $this->input->post_get("posicion"); //sacamos la posición donde insertaremos la zona.
			$titulo = $this->input->post_get("nombre");
			$this->load->database();
			$config['upload_path'] = 'assets/imagenes/mapa/'; //ruta donde se suben las imagenes.
			$config['allowed_types'] = 'jpg|png'; //Tipo de archivo permitido.

			$this->load->library('upload', $config);

			$resultado = $this->upload->do_upload('zona');
			$imagen_subida = $this->upload->data("file_name");
			if($resultado==1){ //Si la imagen se ha subido se inicia el resto de código

				$maximo = $this->db->query("SELECT COUNT(piso) from pisos")->result_array()[0]["COUNT(piso)"]; //sacamos el numero de pisos.
				
				$this->db->query("SET foreign_key_checks=0;"); //desactivamos la comprobacion de claves foraneas para poder modificar sin problemas.
			
				for ($i=$maximo-1; $i >= $posicion ; $i--) { //movemos todos las zonas una posicion hacia delante si es necesario.

					$piso_siguiente = $i+1;
					$this->db->query("UPDATE pisos SET piso=$piso_siguiente WHERE piso=$i");
					$this->db->query("UPDATE puntos_mapa SET piso=$piso_siguiente WHERE piso=$i");
				}

				$this->db->query("INSERT INTO pisos (piso, url_img,titulo_piso) VALUES ($posicion,'assets/imagenes/mapa/$imagen_subida',$titulo);");
				$this->db->query("SET foreign_key_checks=1;");

			}else{ //si la imagen no se ha subido nos devuelve los errores encontrados.
				$resultado = $this->upload->display_errors();
			}
		}
/**
 * Eliminación de una zona y todos los elementos que contenga como escenas y hotspots.
 */
		public function eliminar_zona($piso,$piso_maximo){
			$this->imagen_adelante($piso,$piso_maximo);

			$this->db->query("SET foreign_key_checks=0;");

			$sql = "SELECT id_escena FROM escenas WHERE cod_escena IN (SELECT id_escena FROM puntos_mapa where piso = $piso_maximo )";
			$resultado = $this->db->query($sql)->result_array(); //seleccionamos las escenas que esan relacionadas con la zona

			$sql = "DELETE FROM pisos WHERE piso = $piso_maximo";
			$this->db->query($sql); //Se elimina el piso.

			$sql = "SELECT url_img FROM pisos WHERE piso = $piso_maximo";
			$zona_borrar = $this->db->query($sql)->result_array(); //se consigue la url del piso.
			
			if (isset($zona_borrar[0]["url_img"])) { //si existe se elimina.
				unlink($zona_borrar[0]["url_img"]);
			}

			
			$sql ="DELETE FROM puntos_mapa WHERE piso = $piso_maximo";
			$this->db->query($sql); //se elimina los puntos relacionados con el piso.

			foreach ($resultado as $id) {
				$sql = "DELETE FROM hotspots WHERE id_hotspot IN (
					SELECT id_hotspot FROM escenas_hotspots where id_escena = \"".$id['id_escena']."\")";
				$this->db->query($sql); //Se eliminan los hotspots que tienen relacion con la escena.
	
				
				$sql = "DELETE FROM escenas_hotspots WHERE id_escena = \"".$id['id_escena']."\" ";
				$this->db->query($sql); //eliminamos la relacion de la tabla escenas-hotspots.
	
				$sql = "DELETE FROM hotspots WHERE sceneid=(SELECT cod_escena FROM escenas WHERE id_escena=\"".$id['id_escena']."\")";
				$this->db->query($sql);//Eliminamos los hotspots que saltan hacia dicha escena.

				$sql = "SELECT panorama FROM escenas WHERE id_escena = \"".$id['id_escena']."\" ";
				$panorama_borrar=$this->db->query($sql)->result_array();//sacamos la url de la imagen de escena.
				unlink($panorama_borrar[0]["panorama"]);//se elimina la imagen de escena.
					
				$sql = "DELETE FROM escenas WHERE id_escena = \"".$id['id_escena']."\" ";
				$this->db->query($sql);//por ultimo se elimina la escena.
			}
			$this->db->query("SET foreign_key_checks=1;");
		}
/**
 * Actualiza la posición de inicio del recorrido
 */
		public function update_config(){
			$piso = $this->input->post_get("piso_inicial");
			$punto = $this->input->post_get("punto_inicial");
			$escena = $this->input->post_get("escena_inicial");
			$sql = "UPDATE config_mapa SET piso_inicial='$piso', punto_inicial='$punto', escena_inicial='$escena'";
			$resultado = $this->db->query($sql);

			return $resultado;
		}
	}