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
?>
<?php
/**
 * Controlador de Biblioteca.
 * 
 * Esta clase contiene todos los métodos del controlador del panel de administración de la tabla Libros.
 * Permite insertar, eliminar, modificar y consultar la tabla Libros.
 * @author Marc Expósito 2018
 * @author Manuel Gonzalez 2018
 * @author Francisco Alejandro Lopez 2018
 */
class Biblioteca extends CI_Controller {

 /**
 * Constructor.
 * 
 * Carga los modelos que se van a usar a lo largo de los métodos de la clase.
 */
	public function __construct() {
		parent::__construct();
		$this->load->model("bibliotecaModel");
                $this->load->model("UsuarioModel");
	}
/**
 * Método por defecto del controlador.
 * 
 * Invoca automáticamente el método showintadmin() si se entra al controlador
 * sin especificar otro método.
 */
	public function index() {
		$this->showintadmin();
	}
/**
 * Muestra una tabla con los datos de la tabla Libros.
 */
	public function showintadmin()
	{
		$datos["tabla"] = $this->bibliotecaModel->get_info();
        $datos["vista"]="biblioteca/intadmin";
        $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
		$this->load->view('admin_template', $datos);
	}
/**
 * Muestra los datos de un libro especifico en la ventana modal en la vista intadmin
 * 
 * 
 * @param int $id_libro El id del libro que se va modificar .
 * 
 */
	public function showmodificarlibro($id_libro)
	{
		$resultado = $this->bibliotecaModel->get_info_libro($id_libro);
		$datos["libros"] = $resultado;
        $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
		$this->load->view('admin_template', $datos);
	}

/**
 * Inserta los datos enviados desde la ventana modal(insert) de la vista intadmin
 * 
 */

	public function insertlibro(){
		$idlibro=$this->bibliotecaModel->insertlibro();
		if ($idlibro == -1) { // Error al insertar
			$datos["error"] = "Error al insertar el libro";
		}
		else {					// Libro insertado con éxito
			$datos["mensaje"] = "Libro insertado con éxito.";
		}
		$datos["tabla"] = $this->bibliotecaModel->get_info();
        $datos["vista"] = "biblioteca/intadmin";
        $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
		$this->load->view("admin_template",$datos);
	}


/**
 * Modifica los datos en la base de datos de un libro
 * 
 */
	public function modifiedLibro()
	{
		$resultado=$this->bibliotecaModel->update();
		if($resultado){
				$datos["mensaje"] = "Libro modificado con éxito";
		}
		else {
				$datos["error"] = "Error al modificar el libro";
		}
		$datos["tabla"] = $this->bibliotecaModel->get_info();
		$datos["maxid"] = $this->bibliotecaModel->getmaxidlibro();
        $datos["vista"]="biblioteca/intadmin";
        $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
		$this->load->view('admin_template',$datos);
	}


	// Pruebas depurar codigo 

// public function verUnLibro($idlibro, $apaisado) {
// 	$datos["tabla"] = $this->bibliotecaModel->getLibro($idlibro);
// 	$this->mostrarLibros($datos);
// }

// public function verTodosLibro($apaisado) {
// 	$datos["tabla"] = $this->bibliotecaModel->getTodosLibros();
// 	$this->mostrarLibros($datos);
// }

// public function buscarLibros($strBuscar, $apaisado) {
// 		$datos["tabla"] = $this->bibliotecaModel->buscarLibros($strBuscar);
// 		$this->mostrarLibros($datos, $apaisado);
	
// }

// private function mostrarLibros($datos, $apaisado){
// 	$this->load->model('PortadaModel');
// 	$datos["portada"]=$this->PortadaModel->get_info_portada();
// 	$datos["apaisado"] = $apaisado;
// 	$datos["showBiblioteca"] = 1;  // Indica a la plantilla que debe mostrar la capa modal de la biblioteca
// 	$datos["vista"] = "biblioteca/bibliotecaajax";
// 	$this->load->view("main_template", $datos);  // Plantilla principal del frontend

// }


	/**
	 * 
	 * 
	 * 
	 */
	public function vertodosloslibros($idlibro = -1,$apaisado = -1,$tipo = -1,$busqueda = -1){
		$this->load->model('BibliotecaModel', 'biblioteca');
		$this->load->model('PortadaModel');
		$datos["portada"]=$this->PortadaModel->get_info_portada();
		if($busqueda == -1){
			$datos["tabla"] = $this->bibliotecaModel->get_info();
		}else{
			$datos["tabla"] = $this->bibliotecaModel->busqueda_libros();
		}
		$datos["id_libro"] = $idlibro;
		$datos["apaisado"] = $apaisado;
		$datos["showBiblioteca"] = 1;  // Indica a la plantilla que debe mostrar la capa modal de la biblioteca
		$datos["vista"] = "biblioteca/bibliotecaajax";
		$this->load->view("main_template", $datos);  // Plantilla principal del frontend

	}
	/**
	 * Muestra el libro de Celia Viñas
	 * 
	 */
	public function verLibroCelia(){
		$datos["vista"] = "biblioteca/librocelia";
		$this->load->view("main_template", $datos); 
	}
	/**
	 * 
	 * 
	 * 
	 */
	public function abrir_phistoria($idlibro = -1,$apaisado = -1,$tipo=-1){
		$datos["tabla"] = $this->bibliotecaModel->get_info();
		$datos["id_libro"] = $idlibro;
		$datos["apaisado"] = $apaisado;
		$this->load->view("biblioteca/portada_historia", $datos);

	}

	/**
	 * Elimina los datos del libro de la tabla libros y su directorio correspondiente.
	 * 
	 */

	public function deletelibro(){
		$resultado=$this->bibliotecaModel->deletelibro();	
		if($resultado==-1){ //Error al eliminar
			$datos["error"] = "Error al borrar el libro";
		}
		else{
			$datos["mensaje"] = "Libro eliminado con éxito";
		}

		$datos["tabla"] = $this->bibliotecaModel->get_info();
 		$datos["vista"]="biblioteca/intadmin";
 		$datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
		$this->load->view('admin_template',$datos);
	}
	/**
	 * Muestra en una nueva vista las paginas del libro seleccionado
	 * 
	 * @param int $id_libro El id del libro que se va a mostrar .
	 */

	public function showinsertimg($id_libro){
		$datos["idlibro"] = $id_libro;
        $datos["vista"] = "biblioteca/insertimg";
        $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
		$this->load->view("admin_template",$datos);
	}

	/**
	 * Inserta la imagen y las renombra adecuadamente en el directorio del libro seleccionado 
	 * 
	 */
	public function procesarinsertimg(){
		$id_libro = $_REQUEST["id"];
		$pag_ant = $_REQUEST["pagina_ant"];
		$num_pag = $_REQUEST["num_pag"];
		$confirmre=$this->bibliotecaModel->renomdir($id_libro,$pag_ant,$num_pag);
		$confirmin=$this->bibliotecaModel->insertarimagen($id_libro, $pag_ant);

		if($confirmin && $confirmre){
			$datos["mensaje"]="Imagen subida con exito";
		}else{
			$datos["error"]="Fallo en la subida. Intentelo de nuevo mas tarde";
		}


		$datos["idlibro"] = $_REQUEST["id"];
        $datos["vista"] = "biblioteca/insertimg";
        $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
		$this->load->view("admin_template",$datos);
	}

	/**
	 * Elimina y renombra la pagina seleccionada
	 * 
	 * @param int $id_libro El id del libro que se van a mostrar las paginas
	 * @param int $num_pag numero de la pagina que se va a eliminar
	 * @param int $cant_pag total de paginas que tiene el libro
	 *
	 */
	public function deletepag($id_libro,$num_pag,$cant_pag){
		$res=$this->bibliotecaModel->deletepaglibro($id_libro,$num_pag,$cant_pag);
		if($res==-1){ //Error al eliminar
			$datos["error"] = "Error al borrar página";
		}
		else{
			$datos["mensaje"] = "Página eliminada con éxito";
			$datos["idlibro"] = $id_libro;
	        $datos["vista"] = "biblioteca/insertimg";
	        $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
			$this->load->view("admin_template",$datos);
		}

	}
	/**
	 * Muestra el libro seleccionado
	 *
	 * @param int $id_libro El id del libro que se va a mostrar . 
	 */
	public function verLibro($id_libro) {
		$datos["id_libro"] = $id_libro;
        $datos["vista"] = "biblioteca/libro";
        $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
		$this->load->view("admin_template", $datos);
	}

	/**
	 * Vista para subir imagenes
	 * 
	 */
	public function showSubida($id_libro)
	{
		$datos["tabla"] = $this->bibliotecaModel->get_info();
		$datos["vista"]="biblioteca/upload_multiple";
		$datos["id_libro"]=$id_libro;
        $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
		$this->load->view('admin_template', $datos);
	}

/**
	 * Funcion de subida de imagenes libros al servidor
	 *
	 */

	public function upload($id_libro){
		sleep(3);
		if($_FILES["files"]["name"] != '')
		{
		$output = '';
		$config["upload_path"] = './assets/libros/'.$id_libro;
		$config["allowed_types"] = 'gif|jpg|png';
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		for($count = 0; $count<count($_FILES["files"]["name"]); $count++)
		{
			$_FILES["file"]["name"] = $_FILES["files"]["name"][$count];
			$_FILES["file"]["type"] = $_FILES["files"]["type"][$count];
			$_FILES["file"]["tmp_name"] = $_FILES["files"]["tmp_name"][$count];
			$_FILES["file"]["error"] = $_FILES["files"]["error"][$count];
			$_FILES["file"]["size"] = $_FILES["files"]["size"][$count];
			if($this->upload->do_upload('file'))
			{
			$data = $this->upload->data();
			$output .= '
			<div class="col-md-3">
			<img src="'.base_url().'/assets/libros/pruebasubida/'.$data["file_name"].'" class="img-responsive img-thumbnail" />
			</div>
			';
			}
		}
		echo $output;   
		}
 	}


	public function buscador(){
		$resultado=$this->bibliotecaModel->busqueda_libros();
		
	}

	

}
