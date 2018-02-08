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
        $datos["vista"]="biblioteca/modificarlibro";
        $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
		$this->load->view('template_admin', $datos);
	}



	public function showinsertlibro()
	{		
        $data["vista"]="biblioteca/inserlibro";
        $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
		$this->load->view('template_admin', $data);
	}

	public function modifiedLibro($id_libro)
	{
		$resultado=$this->bibliotecaModel->update($id_libro);
		if($resultado){
				$datos["tabla"] = $this->bibliotecaModel->get_info();
                $datos["vista"]="biblioteca/intadmin";
                $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
				$this->load->view('template_admin',$datos);
			}
	}


	public function deletelibro($id_libro){
		$resultado=$this->bibliotecaModel->deletelibro($id_libro);	
		if($resultado !=0) 
			echo $id_libro;
		else
			echo $resultado;

	}

	public function insertlibro(){
		$libro=$this->bibliotecaModel->insertlibro();
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

	public function verLibro($id_libro) {
		$datos["id_libro"] = $id_libro;
        $datos["vista"] = "biblioteca/libro";
        $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
		$this->load->view("template_admin", $datos);
	}

	public function verLibroAjax($idlibro){
		$datos["id_libro"] = $idlibro;
		$this->load->view("biblioteca/libroajax", $datos);
	}

	public function get_libro_modal($id_libro, $tipo_libro) {
		$datos["id_libro"] = $id_libro;
		$datos["tipo_libro"] = $tipo_libro;
        $datos["vista"] ="biblioteca/libro.php";
        $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
		$this->load->view("template_admin", $datos);
	}

}
