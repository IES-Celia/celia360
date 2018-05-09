<?php
	/*
    Este archivo es parte de la aplicación web Celia360. 

    Celia 360 es software libre: usted puede redistribuirlo y/o modificarlo
    bajo los términos de la GNU General Public License tal y como está publicada por
    la Free Software Foundation en su versión 3.
 
    Celia 360 se distribuye con el propósito de resultar útil,
    pero SIN NINGUNA GARANTÍA de ningún tipo. 
    Véase la GNU General Public License para más detalles.

    Puede obtener una copia de la licencia en <http://www.gnu.org/licenses/>.
*/


	class BibliotecaModel extends CI_Model {

		/**
		 * Constructor.
		 * 
		 * Carga llas librerias  que se van a usar a lo largo de los métodos de la clase.
		 */
		public function __construct() {
			parent::__construct();
			$this->load->database();
		}
		
		/**
		 * Extrae todos los datos de la tabla libros 
		 * 
		 * @return Devuelve los datos guardados en un array.
		 */
		
		public function get_info(){
            $res = $this->db->query("SELECT * FROM libros");
            $tabla = array();
            foreach($res->result_array() as $fila) {
            	$tabla[] = $fila;
            }

            return $tabla;
		}
		/**
		 * Extrae los datos de un libro especifico
		 * 
		 * @param int $id_libro El id del libro del que se extraeran los datos.
		 * 
		 * @return Devuelve los datos guardados en un array
		*/
		public function get_info_libro($id_libro){
            $res = $this->db->query("SELECT * from libros where id_libro = '$id_libro'");
 			$tabla = array();
			foreach($res->result_array() as $fila) {
            	$tabla[] = $fila;
            }
			
			return $tabla;
		
		}
		/**
		 * Modifica los datos,enviados a traves de un formulario, en la tabla libros de un libro especifico
		 * 
		 * @return Devuelve un booleano, 1 si se ha realizado la query con exito y 0 si ha fallado
		 */
		public function update(){
			$id_libro=$this->input->get_post("id_libro");			
			$titulo=$this->input->get_post("titulo");
			$autor=$this->input->get_post("autor");
			$editorial=$this->input->get_post("editorial");
			$lugar=$this->input->get_post("lugar_edicion");
			$fecha=$this->input->get_post("fecha_edicion");
			$isbn=$this->input->get_post("ISBN");
			$tipo=$this->input->get_post("tipo");
			$apaisado=$this->input->get_post("apaisado");

			$this->db->query("Update libros set titulo='$titulo', autor='$autor',editorial='$editorial',lugar_edicion='$lugar', fecha_edicion='$fecha', ISBN='$isbn', tipo='$tipo',apaisado='$apaisado' where id_libro='$id_libro'");
			$res = $this->db->affected_rows();
			return $res;
		}


		public function borrarDir($directorio){
			$archivos = scandir($directorio); 
			$num = count($archivos);
			chmod("$directorio", 0777);

			$res = TRUE;

			for ($i=2; $i<$num; $i++) {
			 $res = unlink ($directorio.$archivos[$i]);
			 if (!$res) break;
			}

			if ($res) $res = rmdir ($directorio);
			return $res;
		}

		/**
		 * Elimina los datos de un libro de la tabla libros y su directorio correspondiente(Si el usuario lo ha indicado)
		 * 
		 * $id_libro id del libro que se desea eliminar
		 * $bcarpeta booleano que indica si se quiere eliminar tambien el directorio
		 * 
		 * @return Devuelve un booleano, 1 si se ha realizado la query con exito y 0 si ha fallado
		 */
		public function deletelibro(){
			$id_libro=$this->input->get_post("id_libro");
			$bcarpeta=$this->input->get_post("bcarpeta");

				if($bcarpeta==1){
		            $directorio = "assets/libros/$id_libro/";
		            $res = $this->borrarDir($directorio);
	            
		            $this->db->query("Delete from libros WHERE id_libro='$id_libro'");
		        }else{
		        	$this->db->query("Delete from libros WHERE id_libro='$id_libro'");
		            
		        }
		     return $this->db->affected_rows();
	        }
		



		/**
		 * Renombra las imagenes del libro indicado
		 * 
		 * 
		 * @param int $id_libro El id del libro que se modificaran las imagenes.
		 * @param int $pag_ant numero de imgaen hasta el que se renombraran las imagenes.
		 * @param int $num_pag cantidad total de imagenes.
		 * 
		 * @return Devuelve un booleano, 1 si se ha realizado el cambio de nombre con exito y 0 si ha fallado
		 */
		public function renomdir($id_libro,$pag_ant,$num_pag){
			for($i=$num_pag-1;$i>$pag_ant;$i--){
				$oldDir="assets/libros/$id_libro/".$i.".jpg";
				$newDir="assets/libros/$id_libro/".($i+1).".jpg";
				$confirm=rename($oldDir,$newDir);
			}
			return $confirm;
		}

	
		
		/**
		 * Inserta una imagen en el directorio del libro seleccionado
		 * 
		 * @param int $id_libro El id del libro que se insertara la imagee
		 * @param int $pag_ant numero de la pagina anterior a la pagina nueva que se insertara
		 * 
		 * @return Devuelve un booleano, true si se ha realizado la subida con exito y false si ha fallado
		 */
		public function insertarimagen($id_libro, $pag_ant) {
			
			$target_file = "assets/libros/$id_libro/" . ($pag_ant + 1). ".jpg";
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

			$flag = false;
			if (move_uploaded_file($_FILES["fichero"]['tmp_name'], $target_file)) {
			    $flag=true;
			} else {
			    $flag = false;
			}

			return $flag;
		}


		/**
		 * 
		 * 
		 */
		public function insertarimgsLibros($id_libro) {
			$target_file = "libros/$id_libro/jpg";
			$target_file = "libros/$id_libro/" . $_FILES["fichero"]["name"];
			echo $target_file;
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			
			if (move_uploaded_file($_FILES['fichero']['tmp_name'], $target_file)) {
			    echo "El fichero es válido y se subió con éxito.\n";
			} else {
			    echo "¡Posible ataque de subida de ficheros!\n";
			    print_r($_FILES);
			}

		}

		/**
		 * Extrae de la tabla libros el ultimo id
		 * 
		 * @return Devuelve el ultimo id de la tabla libros.
		 */
		public function getmaxidlibro(){
            $maxid = $this->db->query("SELECT MAX(id_libro) AS maximo from libros");
            $fila = $maxid->result_array();
                       
            return $fila[0]["maximo"];
		}

		/**
		 * Inserta en la tabla libros los datos de un nuevo libro
		 * 
		 * @return Devuelve el id del libro insertado.
		 */
		public function insertlibro(){
			
			$titulo=$this->input->get_post("titulo");
			$autor=$this->input->get_post("autor");
			$editorial=$this->input->get_post("editorial");
			$lugar=$this->input->get_post("lugar");
			$fecha=$this->input->get_post("fecha");
			$isbn=$this->input->get_post("isbn");
			$tipo=$this->input->get_post("tipo");
			$apaisado=$this->input->get_post("apaisado");


            $res = $this->db->query("INSERT INTO libros(titulo,autor,editorial,lugar_edicion,fecha_edicion,ISBN,tipo,apaisado) VALUES ('$titulo','$autor','$editorial','$lugar','$fecha','$isbn','$tipo','$apaisado')");

         	$id_libro=$this->getmaxidlibro();
            return $id_libro;
		}


		/**
		 * Elimina una imagen del libro seleccionado
		 * 
		 * @param int $id_libro id del libro que se eliminara la imagen
		 * @param int $num_pag numero de la pagina que se va a eliminar
		 * @param int $cant_pag cantidad total de paginas que tiene el libro
		 * 
		 * @return Devuelve un booleano, 1 si se ha eliminado la imagen con exito y 0 si ha fallado
		 */
		public function deletepaglibro($id_libro,$num_pag,$cant_pag){
			$filename="assets/libros/$id_libro/$num_pag.jpg";
			$res=unlink($filename);

			if($res){
				for($i=$num_pag;$i<$cant_pag;$i++){
					$oldDir="assets/libros/$id_libro/".($i+1).".jpg";
					$newDir="assets/libros/$id_libro/".$i.".jpg";
					rename($oldDir,$newDir);
				}
			}
			return $res;
		}
		
		public function busqueda_aproximada($str_busqueda){
					$res = $this->db->query("SELECT * FROM libros WHERE id_libro LIKE '%".$str_busqueda."%' OR titulo LIKE '%".$str_busqueda."%' OR autor LIKE '%".$str_busqueda."%' OR editorial LIKE '%".$str_busqueda."' ");
					return $res;
		}

		//Renombrar archivos de una carpeta
		/*public function rename_cont($id_libro){
			$ruta ="libros/$id_libro";
			$carpeta = scandir($ruta,SCANDIR_SORT_NONE);
			$cantidadarchivos=count($carpeta);

			for($i=0;$i<$cantidadarchivos;$i++){
				print_r($carpeta[$i]);
				$oldDir="libros/$id_libro/".$carpeta[$i].".jpg";
				$newDir="libros/$id_libro/".$i.".jpg";
				rename($oldDir,$newDir);
			}
		}*/

	}

?>
