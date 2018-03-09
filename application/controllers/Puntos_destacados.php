<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Puntos_destacados extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model("PuntosDestacadosModel");
    }
    
    public function index(){
        $datos["puntos_d"] = $this->PuntosDestacadosModel->getAll();
		$this->load->view("puntosdestacados/adminDestacados", $datos);	
    }
    
    public function anadir_celda($id_fila){
        $this->load->model("Mapa", "mapa");
        $datos["mapa"] = $this->mapa->cargar_mapa();
        $datos["puntos"] = $this->mapa->cargar_puntos();
        $datos["id_fila"]= $id_fila;
        $this->load->view("puntosdestacados/insertarDestacado", $datos);
    }
    
    public function borrar_celda($id_fila){
        $resultado = $this->PuntosDestacadosModel->borrar_celda($id_fila);
        $datos["puntos_d"] = $this->PuntosDestacadosModel->getAll();
		$this->load->view("puntosdestacados/adminDestacados", $datos);	
    }
    
	public function cargar_puntosdestacados(){
        $datos["puntos_d"] = $this->PuntosDestacadosModel->getAll();
		$this->load->view("puntosdestacados/puntosDestacados", $datos);	
	}
    
    public function cargar_admin_puntosdestacados(){
        $datos["puntos_d"] = $this->PuntosDestacadosModel->getAll();
		$this->load->view("puntosdestacados/adminDestacados", $datos);	
	}

    
    public function formulario_update($id){
        $this->load->model("Mapa", "mapa");
        $datos["mapa"] = $this->mapa->cargar_mapa();
        $datos["puntos"] = $this->mapa->cargar_puntos();
        $datos["celda"]= $this->PuntosDestacadosModel->info_celda($id);
        $this->load->view("puntosdestacados/updateDestacado", $datos);
    }
    
    public function processupdatedestacado(){
        $resultado = $this->PuntosDestacadosModel->editar_celda();
        if($resultado){
            redirect('puntos_destacados');
        }
    }
    
    public function processinsertdestacado(){
        echo $escena_celda;
         $resultado = $this->PuntosDestacadosModel->crear_celda();
        if($resultado){
            $datos["puntos_d"] = $this->PuntosDestacadosModel->getAll();
		  $this->load->view("puntosdestacados/adminDestacados", $datos);	
        }
    }
    
}