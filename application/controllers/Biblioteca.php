<?php

class Biblioteca extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct() {
		parent::__construct();
		$this->load->model("bibliotecaModel");
                $this->load->model("UsuarioModel");
	}

	public function index() {
		$this->showintadmin();
	}

	
	
	public function showintadmin()
	{
		$datos["tabla"] = $this->bibliotecaModel->get_info();
        $datos["vista"]="biblioteca/intadmin";
        $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
		$this->load->view('template_admin', $datos);
	}

	public function showmodificarlibro($id_libro)
	{
		$resultado = $this->bibliotecaModel->get_info_libro($id_libro);
		$datos["libros"] = $resultado;
        $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
		$this->load->view('template_admin', $datos);
	}



	public function showinsertlibro()
	{		
        $datos["vista"]="biblioteca/inserlibro";
        $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
		$this->load->view('template_admin', $datos);
	}

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
		$this->load->view('template_admin',$datos);
	}

	public function vertodosloslibros($idlibro = -1,$apaisado = -1,$tipo=-1){
		$datos["tabla"] = $this->bibliotecaModel->get_info();
		$datos["id_libro"] = $idlibro;
		$datos["apaisado"] = $apaisado;
		$this->load->view("biblioteca/bibliotecaajax", $datos);

	}

	// public function abrir_phistoria(){
	// 	$datos["tabla"] = $this->bibliotecaModel->get_info();
	// 	$this->load->view('biblioteca/portada_historia', $datos);
	// }

	public function abrir_phistoria($idlibro = -1,$apaisado = -1,$tipo=-1){
		$datos["tabla"] = $this->bibliotecaModel->get_info();
		$datos["id_libro"] = $idlibro;
		$datos["apaisado"] = $apaisado;
		$this->load->view("biblioteca/portada_historia", $datos);

	}
/*
	public function verLibroAjax($idlibro,$apaisado){
		$datos["id_libro"] = $idlibro;
		$datos["apaisado"] = $apaisado;
		$this->load->view("biblioteca/libroajax", $datos);
	}
*/

	public function deletelibro($id_libro){
		$resultado=$this->bibliotecaModel->deletelibro($id_libro);	
		if($resultado !=0) 
			echo $id_libro;
		else
			echo $resultado;

	}

	public function insertlibro(){
		$idlibro=$this->bibliotecaModel->insertlibro();
		if ($idlibro == -1) { // Error al insertar
			$datos["mensaje"] = "Error al insertar el libro";
		}
		else {					// Libro insertado con éxito
			$datos["mensaje"] = "Libro insertado con éxito. La carpeta con las imágenes debe llamarse ".$idlibro;
		}
		$datos["tabla"] = $this->bibliotecaModel->get_info();
        $datos["vista"] = "biblioteca/intadmin";
        $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
		$this->load->view("template_admin",$datos);
	}

	public function showinsertimg($id_libro){
		$datos["idlibro"] = $id_libro;
		//$datos = $_REQUEST["id_libro"];
        $datos["vista"] = "biblioteca/insertimg";
        $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
		$this->load->view("template_admin",$datos);
	}

	public function procesarinsertimg(){
		$id_libro = $_REQUEST["id"];
		$pag_ant = $_REQUEST["pagina_ant"];
		$num_pag = $_REQUEST["num_pag"];
		echo "Voy a renombrar... $id_libro - $pag_ant - $num_pag<br>";
		$this->bibliotecaModel->renomdir($id_libro,$pag_ant,$num_pag);
		echo "Voy a insertar nueva imagen... $id_libro - $pag_ant<br>";
		$this->bibliotecaModel->insertarimagen($id_libro, $pag_ant);
		$datos["idlibro"] = $_REQUEST["id"];
        $datos["vista"] = "biblioteca/insertimg";
        $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
		$this->load->view("template_admin",$datos);
	}

	//BORRAR PAGINAS DEL LIBRO
	public function deletepag($id_libro,$num_pag,$cant_pag){
		$res=$this->bibliotecaModel->deletepaglibro($id_libro,$num_pag,$cant_pag);
		if($res){
			$datos["idlibro"] = $id_libro;
	        $datos["vista"] = "biblioteca/insertimg";
	        $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
			$this->load->view("template_admin",$datos);
		}else{
			echo "pos no";
		}

	}

	public function verLibro($id_libro) {
		$datos["id_libro"] = $id_libro;
        $datos["vista"] = "biblioteca/libro";
        $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
		$this->load->view("template_admin", $datos);
	}

	// public function ver_biblioteca_ajax($id_libro,$apaisado,$tipo){
	// 	$datos["id_libro"] = $id_libro;
	// 	$datos["apaisado"] = $apaisado;
	// 	$datos["tipo"]= $tipo;
	// 	$this->load->view("biblioteca/libroajax", $datos);
	// }
	public function get_libro_modal($id_libro, $tipo_libro) {
		$datos["id_libro"] = $id_libro;
		$datos["tipo_libro"] = $tipo_libro;
        $datos["vista"] ="biblioteca/libro.php";
        $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
		$this->load->view("template_admin", $datos);
	}

	public function buscar_libro_ajax($str_busqueda) {
		$lista_libros = $this->bibliotecaModel->busqueda_aproximada($str_busqueda);
		if($resultado->num_rows > 0){
		$salida.="
			<table border='1px solid black' style='border-spacing: 0;' class='tabla_datos'>
				<thead>
				<tr>
					<th>IDLIBRO</th>
					<th>TITULO</th>
					<th>AUTOR</th>
					<th>EDITORIAL</th>
					<th>LUGAR EDICION</th>
					<th>FECHA EDICION</th>
					<th>ISBN</th>
					<th>TIPO</th>
					<th>APAISADO</th>
				</tr>
				</thead>
				<tbody>
		";

		
		while ($fila = $resultado->fetch_assoc()){

			$salida.="<tr>
				<td >".$fila['id_libro']."</td>
				<td >".$fila['titulo']."</td>
				<td >".$fila['autor']."</td>
				<td >".$fila['editorial']."</td>
				<td >".$fila['lugar_edicion']."</td>
				<td >".$fila['fecha_edicion']."</td>
				<td >".$fila['ISBN']."</td>
				<td >".$fila['tipo']."</td>
				<td >".$fila['apaisado']."</td>
				<td> 
					<a href='#'> <i title='Modificar' class='fa fa-pencil-square-o' aria-hidden='true'></i></a>
				</td>
				<td>
					<a href=''><i title='Insertar Páginas' class='fa fa-file-image-o' aria-hidden='true'></i></a>
				</td>
				<td>
					<a href='#' onClick='borrarlibro('')'><i title='Eliminar' class='fa fa-trash' aria-hidden='true'></i></a>
				</td>
			</tr>";
			 
		}
		$salida.="</tbody></table>";

	} else{
		$salida.= "no hay datos MEN :(";
	}

	echo $salida;


	}

}
