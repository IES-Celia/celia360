<?php

class Biblioteca extends CI_Controller {


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
		$this->load->view('admin_template', $datos);
	}

	public function showmodificarlibro($id_libro)
	{
		$resultado = $this->bibliotecaModel->get_info_libro($id_libro);
		$datos["libros"] = $resultado;
        $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
		$this->load->view('admin_template', $datos);
	}



	public function showinsertlibro()
	{		
        $datos["vista"]="biblioteca/inserlibro";
        $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
		$this->load->view('admin_template', $datos);
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
		$this->load->view('admin_template',$datos);
	}

	public function vertodosloslibros($idlibro = -1,$apaisado = -1,$tipo=-1){
                $this->load->model('BibliotecaModel', 'biblioteca');
                $this->load->model('PortadaModel');
                $datos["portada"]=$this->PortadaModel->get_info_portada();
                $datos["tabla"] = $this->bibliotecaModel->get_info();
		$datos["id_libro"] = $idlibro;
		$datos["apaisado"] = $apaisado;
                $datos["showBiblioteca"] = 1;  // Indica a la plantilla que debe mostrar la capa modal de la biblioteca
                $datos["vista"] = "biblioteca/bibliotecaajax";
		$this->load->view("main_template", $datos);  // Plantilla principal del frontend

	}


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

	public function deletelibro(){
		$resultado=$this->bibliotecaModel->deletelibro();	
		if($resultado==-1){ //Error al eliminar
			$datos["error"] = "Error al insertar el libro";
		}
		else{
			$datos["mensaje"] = "Libro eliminado con éxito";
		}

		$datos["tabla"] = $this->bibliotecaModel->get_info();
 		$datos["vista"]="biblioteca/intadmin";
 		$datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
		$this->load->view('admin_template',$datos);
	}

	public function insertlibro(){
		$idlibro=$this->bibliotecaModel->insertlibro();
		if ($idlibro == -1) { // Error al insertar
			$datos["error"] = "Error al insertar el libro";
		}
		else {					// Libro insertado con éxito
			$datos["mensaje"] = "Libro insertado con éxito. Debe renombrarlo en la carpeta assets/libros/ como: ".$idlibro;
		}
		$datos["tabla"] = $this->bibliotecaModel->get_info();
        $datos["vista"] = "biblioteca/intadmin";
        $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
		$this->load->view("admin_template",$datos);
	}

	public function showinsertimg($id_libro){
		$datos["idlibro"] = $id_libro;
		//$datos = $_REQUEST["id_libro"];
        $datos["vista"] = "biblioteca/insertimg";
        $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
		$this->load->view("admin_template",$datos);
	}

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

	//BORRAR PAGINAS DEL LIBRO
	public function deletepag($id_libro,$num_pag,$cant_pag){
		$res=$this->bibliotecaModel->deletepaglibro($id_libro,$num_pag,$cant_pag);
		if($res){
			$datos["idlibro"] = $id_libro;
	        $datos["vista"] = "biblioteca/insertimg";
	        $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
			$this->load->view("admin_template",$datos);
		}else{
			echo "pos no";
		}

	}

	public function verLibro($id_libro) {
		$datos["id_libro"] = $id_libro;
        $datos["vista"] = "biblioteca/libro";
        $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
		$this->load->view("admin_template", $datos);
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
		$this->load->view("admin_template", $datos);
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
