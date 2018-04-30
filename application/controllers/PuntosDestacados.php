<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PuntosDestacados extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model("PuntosDestacadosModel");
        $this->load->model("UsuarioModel");
        //$this->load->helper('funcionesHotspot');
    }
    
    public function index(){
        $datos["puntos_d"] = $this->PuntosDestacadosModel->getAll();
        $permiso = $this->UsuarioModel->comprueba_permisos("puntosdestacados/puntosDestacados");
        if ($permiso) {
            $this->load->view("puntosdestacados/puntosDestacados", $datos);	
        }
        else {
            redirect(base_url("usuario"));
        }
    }
    
    public function anadir_celda($id_fila){
        $this->load->model("MapaModel", "mapa");
        $datos["mapa"] = $this->mapa->cargar_mapa();
        $datos["puntos"] = $this->mapa->cargar_puntos();
        $datos["id_fila"]= $id_fila;
        $permiso = $this->UsuarioModel->comprueba_permisos("puntosdestacados/insertarDestacado");
        if ($permiso) {
            $this->load->view("puntosdestacados/insertarDestacado", $datos);
        }
        else {
            redirect(base_url("usuario"));
        }
    }
    
    public function borrar_celda($id_fila){
        $resultado = $this->PuntosDestacadosModel->borrar_celda($id_fila);
        $datos["puntos_d"] = $this->PuntosDestacadosModel->getAll();
        $permiso = $this->UsuarioModel->comprueba_permisos("puntosdestacados/adminDestacados");
        if ($permiso) {
            $this->load->view("puntosdestacados/adminDestacados", $datos);	
        }
        else {
            redirect(base_url("usuario"));
        }
    }
    
    public function cargar_puntosdestacados(){
        $datos["puntos_d"] = $this->PuntosDestacadosModel->getAll();
        $permiso = $this->UsuarioModel->comprueba_permisos("puntosdestacados/puntosDestacados");
        if ($permiso) {
        	$this->load->view("puntosdestacados/puntosDestacados", $datos);	
        }
        else {
            redirect(base_url("usuario"));
        }
    }
    
    public function cargar_admin_puntosdestacados(){
        $datos["puntos_d"] = $this->PuntosDestacadosModel->getAll();
        $permiso = $this->UsuarioModel->comprueba_permisos("puntosdestacados/adminDestacados");
        if ($permiso) {
            $this->load->view("puntosdestacados/adminDestacados", $datos);
        } else {
            redirect(base_url("usuario"));
        }
    }

    public function formulario_update($id){
        $this->load->model("MapaModel", "mapa");
        $datos["mapa"] = $this->mapa->cargar_mapa();
        $datos["puntos"] = $this->mapa->cargar_puntos();
        $datos["celda"]= $this->PuntosDestacadosModel->info_celda($id);
        $permiso = $this->UsuarioModel->comprueba_permisos("puntosdestacados/updateDestacado");
        if ($permiso) {
            $this->load->view("puntosdestacados/updateDestacado", $datos);
        }
        else {
            redirect(base_url("usuario"));
        }
    }
    
    public function processupdatedestacado(){
        $resultado = $this->PuntosDestacadosModel->editar_celda();
        $datos["puntos_d"] = $this->PuntosDestacadosModel->getAll();
        $permiso = $this->UsuarioModel->comprueba_permisos("puntosdestacados/adminDestacados");
        if ($permiso) {
            $this->load->view("puntosdestacados/adminDestacados", $datos);
        }
        else {
            redirect(base_url("usuario"));
        }
    }
    
    public function processinsertdestacado(){
        $resultado = $this->PuntosDestacadosModel->crear_celda();
        if($resultado){
            $datos["puntos_d"] = $this->PuntosDestacadosModel->getAll();
            $permiso = $this->UsuarioModel->comprueba_permisos("puntosdestacados/adminDestacados");
            if ($permiso) {
                $this->load->view("puntosdestacados/adminDestacados", $datos);	
            }
            else {
                redirect(base_url("usuario"));
            }
        }
    }
    
}