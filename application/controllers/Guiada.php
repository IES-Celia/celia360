<?php
defined('BASEPATH') OR exit('No se permite el acceso directo al script');


class Guiada extends CI_Controller {


    public function __construct() {
        parent::__construct();
        $this->load->model("UsuarioModel");
        $this->load->model("Audm");
        $this->load->model("Modeloescenas");
        $this->load->model("modeloGuiada");
       
    }

    public function mostrarFormularioGuiada() {
        //Todos los audios existentes.
        $datos["audios"]=$this->Audm->allAudios();
        //Todas las escenas existentes.
        $datos["escenas"]=$this->Modeloescenas->getAll();
        $datos["vista"]="guiada/insertarGuiada";
        $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
        $this->load->view("template_admin", $datos);
    }

    public function insertarEscenaGuiada(){
        $resultado = $this->modeloGuiada->crearEscenaGuiada();
        if($resultado > 0){
            $datos["vista"]="guiada/asociarImagen";
            $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
            $this->load->view("template_admin", $datos);

        } else {
            $this->mostrarFormularioGuiada();
        }
    }

    public function menuGuiada(){
        $datos["escenas"] = $this->modeloGuiada->allEscenasGuiada();
        $datos["vista"]="guiada/administracionGuiada";
        $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
        $this->load->view("template_admin", $datos);
    }

    public function asociarImagenPreview(){
          //Insertamos la escena y ahora con sql sacamos la ultima escena por ID.
          $idEscena=$this->modeloGuiada->lastEscenaGuiada();
          $asociar = $this->modeloGuiada->asociarImagen($idEscena);
          if($asociar==false){
              //Borrar ultima escena
              $this->modeloGuiada->borrarEscenaGuiada($idEscena);
              $this->mostrarFormularioGuiada();

          } else {
              //ir menuGuiada, donde puede ver el ultimo punto introducido
              $this->menuGuiada();
      }
    }

    public function modificarImagenPreview(){
        $idEscena=$_REQUEST["id_visita"];
        $asociar = $this->modeloGuiada->asociarImagen($idEscena);
        if($asociar==false){
            echo "ERROR";
            $this->menuGuiada();

        } else {
            echo "CORRECTO";
            $this->menuGuiada();
    }
  }

    public function getGuiada(){
        $resultado = $this->modeloGuiada->allEscenasGuiada();
        echo json_encode($resultado);
    }

    public function borrarEscena(){
        $idEscena = $_REQUEST["id"];
        $this->modeloGuiada->borrarEscenaGuiada($idEscena);
        $this->menuGuiada();
       
    }

    public function modificarEscena(){
        $datos["vista"]="guiada/modificarGuiada";
        $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
        $this->load->view("template_admin", $datos);
    }
    
    public function actualizarEscena(){
        $id_visita = $_REQUEST["id"];
        $this->modeloGuiada->actualizarEscena($id_visita);
    }


}


?>