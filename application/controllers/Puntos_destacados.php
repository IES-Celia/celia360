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
        $datos["id_fila"]= $id_fila;
        $this->load->view("puntosdestacados/insertarDestacado", $datos);
    }
    
    public function borrar_celda($id_fila){
        $resultado = $this->PuntosDestacadosModel->borrar_celda($id_fila);
        $datos["puntos_d"] = $this->PuntosDestacadosModel->getAll();
		$this->load->view("puntosdestacados/adminDestacados", $datos);	
    }
    
 
    // mejorar en un futuro (que si una fila se queda sin celdas se ponga automaticamente en oculta)
    public function mover_celda($idcelda, $idfila){
        $resultado = $this->PuntosDestacadosModel->mover_celda($idcelda, $idfila);
        if($resultado){
            
        }else{
            
        }
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