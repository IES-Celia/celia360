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
        $this->load->model("Mapa","mapa");
        $datos["mapa"]=$this->mapa->cargar_mapa();
        $datos["puntos"]=$this->mapa->cargar_puntos();
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
        //Si es una modificacion de imagen existente
          if(isset($_POST["id_visita"])){
            $idEscena=$_POST["id_visita"];
            $borrarImagen = $this->ModeloGuiada->borrarImagen($idEscena);
            $asociar = $this->ModeloGuiada->asociarImagen($idEscena);
          }else {
        //Si es la primera vez que introducimos una imagen
            $idEscena=$this->ModeloGuiada->lastEscenaGuiada();
            $asociar = $this->ModeloGuiada->asociarImagen($idEscena);
            if($asociar==-1){
                $this->ModeloGuiada->borrarEscenaGuiada($idEscena);
            }
          }
          redirect('/guiada/menuGuiada', 'refresh');
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
             redirect('/guiada/menuGuiada', 'refresh');

        } else {
             redirect('/guiada/menuGuiada', 'refresh');
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
        if($actualizar) "1";
        else  "0";
    }

    public function ordenarTabla(){
        $ordenar= $this->ModeloGuiada->ordenarTabla();
        echo json_encode($ordenar);
    }

    public function cambiarFilas(){
        $filaAID = $_REQUEST["filaAID"];
        $filaAPOS = $_REQUEST["filaAPOS"];
        $filaBID = $_REQUEST["filaBID"];
        $filaBPOS = $_REQUEST["filaBPOS"];
        $mover = $this->ModeloGuiada->intercambiarFilas($filaAID,$filaAPOS,$filaBID,$filaBPOS);
        echo $mover;
    }




}


?>