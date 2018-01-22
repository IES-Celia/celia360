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
	}

	public function index() {
		$this->showIntAdmin();
	}

	
	public function showIntAdmin()
	{
		$datos["tabla"] = $this->bibliotecaModel->get_info();
		$this->load->view("biblioteca/IntAdmin", $datos);
	}

	public function showmodificarLibro($id_libro)
	{
		$resultado = $this->bibliotecaModel->get_info_libro($id_libro);
		$datos["libros"] = $resultado;
		$this->load->view("biblioteca/modificarLibro", $datos);
	}



	public function showInsertLibro()
	{		
		$this->load->view("biblioteca/inserLibro");
	}

	public function modifiedLibro($id_libro)
	{
		$resultado=$this->bibliotecaModel->update($id_libro);
		if($resultado){
				$datos["tabla"] = $this->bibliotecaModel->get_info();
				$this->load->view("biblioteca/IntAdmin",$datos);
			}
	}

	public function deleteLibro($id_libro){
		$this->bibliotecaModel->deleteLibro($id_libro);
		$datos["tabla"] = $this->bibliotecaModel->get_info();
		$this->load->view("Biblioteca/IntAdmin",$datos);
	}

	public function insertLibro(){
		$libro->insertLibro();
		$datos["tabla"] = $this->bibliotecaModel->get_info();
		$this->load->view("IntAdmin",$datos);
	}

	public function showInsertImg($id_libro){
		$datos["tabla"] = $id_libro;
		//$datos = $_REQUEST["id_libro"];
		$this->load->view("Biblioteca/insertImg",$datos);
	}

	public function procesarInsertImg(){
		$id_libro = $_REQUEST["id"];
		$pag_ant = $_REQUEST["pagina_ant"];
		$num_pag = $_REQUEST["num_pag"];
		echo "Voy a renombrar... $id_libro - $pag_ant - $num_pag<br>";
		$this->bibliotecaModel->renomDir($id_libro,$pag_ant,$num_pag);
		echo "Voy a insertar nueva imagen... $id_libro - $pag_ant<br>";
		$this->bibliotecaModel->insertarImagen($id_libro, $pag_ant);
		$datos = $_REQUEST["id"];
		$this->load->view("insertImg",$datos);
	}

	public function verLibro($id_libro) {
		$datos["id_libro"] = $id_libro;
		$this->load->view("biblioteca/libro", $datos);
	}

	public function get_libro_modal($id_libro, $tipo_libro) {
		$datos["id_libro"] = $id_libro;
		$datos["tipo_libro"] = $tipo_libro;
		$this->load->view("biblioteca/libro.php", $datos);
	}

}
