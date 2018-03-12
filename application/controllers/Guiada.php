<?php
defined('BASEPATH') OR exit('No se permite el acceso directo al script');


class Guiada extends CI_Controller {


    public function __construct() {
        parent::__construct();
        $this->load->model("UsuarioModel");
        $this->load->model("Audm");
        $this->load->model("Modeloescenas");
        $this->load->model("ModeloGuiada");
       
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
        $resultado = $this->ModeloGuiada->crearEscenaGuiada();
        if($resultado > 0){
            $datos["vista"]="guiada/asociarImagen";
            $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
            $this->load->view("template_admin", $datos);

        } else {
            $this->mostrarFormularioGuiada();
        }
    }

    public function menuGuiada(){
        //Todos los audios existentes.
        $datos["audios"]=$this->Audm->allAudios();
        //Todas las escenas existentes.
        $datos["escenasGuiada"]=$this->Modeloescenas->getAll();
        $datos["escenas"] = $this->ModeloGuiada->allEscenasGuiada();
        $datos["vista"]="guiada/administracionGuiada";
        $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
        $this->load->view("template_admin", $datos);
    }

    public function asociarImagenPreview(){
          //Insertamos la escena y ahora con sql sacamos la ultima escena por ID.
          if(isset($_POST["id_visita"])){
            $idEscena=$_POST["id_visita"];
            $asociar = $this->ModeloGuiada->asociarImagen($idEscena);

            //Buscar la imagen y borrarla si ha salido bien.
            //$borrar = $this->ModeloGuiada->borrarImagen($id_visita);
            //if($borrar)echo "se ha borrado saecio";
            //else echo "Hubo por haber problames habidos";
          }else {
            $idEscena=$this->ModeloGuiada->lastEscenaGuiada();
            $asociar = $this->ModeloGuiada->asociarImagen($idEscena);
          }

          $this->menuGuiada();
         /*
          if($asociar){
            //ir menuGuiada, donde puede ver el ultimo punto introducido
            $this->menuGuiada();

          } else {
            //Borrar ultima escena
            $this->ModeloGuiada->borrarEscenaGuiada($idEscena);
            $this->mostrarFormularioGuiada();   
      }
      */
    }

    public function modificarImagenPreview(){
        $idEscena=$_REQUEST["id_visita"];
        $asociar = $this->ModeloGuiada->asociarImagen($idEscena);
        if($asociar==false){
            echo "ERROR";
            $this->menuGuiada();

        } else {
            echo "CORRECTO";
            $this->menuGuiada();
    }
  }

    public function getGuiada(){
        $resultado = $this->ModeloGuiada->allEscenasGuiada();
        echo json_encode($resultado);
    }

    public function borrarEscena(){
        $idEscena = $_REQUEST["id"];
        $this->ModeloGuiada->borrarImagen($idEscena);
        $this->ModeloGuiada->borrarEscenaGuiada($idEscena);
        //$this->menuGuiada();
       
    }
    
    public function actualizarEscena(){
        $id_visita = $_REQUEST["id"];
        $actualizar = $this->ModeloGuiada->actualizarEscena($id_visita);
        if($actualizar)echo "1";
        else echo "0";
    }




}


?>