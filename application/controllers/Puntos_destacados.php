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
    
    public function anadir_fila($id_fila){
        $resultado = $this->PuntosDestacadosModel->mostrar_fila($id_fila);
        if($resultado){ // si se añade una fila se añade una celda
            $datos["idfila"]=$id_fila;
            $this->load->view("puntosdestacados/insertarDestacado", $datos);
        }
    }
    
    // para borrar una fila se borrarán todas las celdas asociadas a esta
    public function quitar_fila($id_fila) {
        $resultado = $this->PuntosDestacadosModel->ocultar_fila($id_fila);
        if ($resultado) {
            $datos["puntos_d"] = $this->PuntosDestacadosModel->getAll();
            $this->load->view("puntosdestacados/adminDestacados", $datos);	
        }
        else {
            echo "Aquí generariamos la vista pero con un mensaje de error";
        }
    }
    
    // mejorar en un futuro (que si una fila se queda sin celdas se ponga automaticamente en oculta)
    public function mover_celda($idcelda, $idfila){
        $resultado = $this->PuntosDestacadosModel->mover_celda($idcelda, $idfila);
        if($resultado){
            
        }else{
            
        }
    }
    
	public function cargar_puntosdestacados(){
        // hay que sacar un array que te diga que filas se muestran para que al crear la vista no se creen varias filas
        $datos["puntos_d"] = $this->PuntosDestacadosModel->getAll();
		$this->load->view("puntosdestacados/puntosDestacados", $datos);	
	}
    
    public function cargar_admin_puntosdestacados(){
        $datos["puntos_d"] = $this->PuntosDestacadosModel->getAll();
		$this->load->view("puntosdestacados/adminDestacados", $datos);	
	}
    
    /* ERROR
    public function processinsertdestacado(){
        $res = $this->db->query("SELECT id_celda FROM celda_pd ORDER BY id_celda DESC LIMIT 1")->result_array()[0]["id_celda"];
        $id_celda = $res+1;
        
        $titulo_celda= $_REQUEST["titulo_celda"];
        $imagen_celda = $_REQUEST["imagen_celda"];
        $escena_celda = $_REQUEST["escena_celda"];
        $fila_asociada = $_REQUEST["fila_asociada"];
        
        $insrt = "INSERT INTO celda_pd (id_celda,fila_asociada,escena_celda, titulo_celda, imagen_celda) 
        VALUES ('$id_celda','$fila_asociada' ,'$escena_celda','$titulo_celda','$imagen_celda')";	
        $this->db->query($insrt);
        
        return $this->db->affected_rows();
    } */
    
    public function formulario_update($id){
        $datos["celda"]= $this->PuntosDestacadosModel->info_celda($id);
        $this->load->view("puntosdestacados/updateDestacado", $datos);
    }
    
    public function processupdatedestacado(){
        $resultado = $this->PuntosDestacadosModel->editar_celda();
        if($resultado){
            
        }
    }
    
}