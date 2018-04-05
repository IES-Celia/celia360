

<?php

/*

<!--
    Este archivo es parte de la aplicación web Celia360. 

    Celia 360 es software libre: usted puede redistribuirlo y/o modificarlo
    bajo los términos de la GNU General Public License tal y como está publicada por
    la Free Software Foundation en su versión 3.
    Celia 360 se distribuye con el propósito de resultar útil,
    pero SIN NINGUNA GARANTÍA de ningún tipo. 
    Véase la GNU General Public License para más detalles.

    Puede obtener una copia de la licencia en <http://www.gnu.org/licenses/>.
-->

*/
defined('BASEPATH') OR exit('No se permite el acceso directo al script');


class Guiada extends CI_Controller {


    public function __construct() {
        parent::__construct();
        $this->load->model("UsuarioModel");
        $this->load->model("AudioModel");
        $this->load->model("EscenasModel");
        $this->load->model("GuiadaModel");
       
    }

    public function mostrarFormularioGuiada() {
        $this->load->model("MapaModel","mapa");
        $datos["mapa"]=$this->mapa->cargar_mapa();
        $datos["puntos"]=$this->mapa->cargar_puntos();
        //Todos los audios existentes.
        $datos["audios"]=$this->AudioModel->allAudios();
        //Todas las escenas existentes.
        $datos["escenas"]=$this->EscenasModel->getAll();
        $datos["vista"]="guiada/insertarGuiada";
        $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
        $this->load->view("admin_template", $datos);
    }

    public function insertarEscenaGuiada(){
        $resultado = $this->GuiadaModel->crearEscenaGuiada();
        if($resultado > 0){
            $datos["vista"]="guiada/asociarImagen";
            $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
            $this->load->view("admin_template", $datos);

        } else {
            $this->mostrarFormularioGuiada();
        }
    }

    public function menuGuiada(){
        //Todos los audios existentes.
        $datos["audios"]=$this->AudioModel->allAudios();
        //Todas las escenas existentes.
        $datos["escenasGuiada"]=$this->EscenasModel->getAll();
        $datos["escenas"] = $this->GuiadaModel->allEscenasGuiada();
        $datos["vista"]="guiada/administracionGuiada";
        $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
        $this->load->view("admin_template", $datos);
    }

    public function asociarImagenPreview(){
        //Si es una modificacion de imagen existente
          if(isset($_POST["id_visita"])){
            $idEscena=$_POST["id_visita"];
            $borrarImagen = $this->GuiadaModel->borrarImagen($idEscena);
            $asociar = $this->GuiadaModel->asociarImagen($idEscena);
          }else {
        //Si es la primera vez que introducimos una imagen
            $idEscena=$this->GuiadaModel->lastEscenaGuiada();
            $asociar = $this->GuiadaModel->asociarImagen($idEscena);
            if($asociar==-1){
                $this->GuiadaModel->borrarEscenaGuiada($idEscena);
            }
          }
          redirect('/guiada/menuGuiada', 'refresh');
         /*
          if($asociar){
            //ir menuGuiada, donde puede ver el ultimo punto introducido
            $this->menuGuiada();

          } else {
            //Borrar ultima escena
            $this->GuiadaModel->borrarEscenaGuiada($idEscena);
            $this->mostrarFormularioGuiada();   
      }
      */
    }

    public function modificarImagenPreview(){
        $idEscena=$_REQUEST["id_visita"];
        $asociar = $this->GuiadaModel->asociarImagen($idEscena);
        if($asociar==false){
             redirect('/guiada/menuGuiada', 'refresh');

        } else {
             redirect('/guiada/menuGuiada', 'refresh');
    }
  }

    public function getGuiada(){
        $resultado = $this->GuiadaModel->allEscenasGuiada();
        echo json_encode($resultado);
    }

    public function borrarEscena(){
        $idEscena = $_REQUEST["id"];
        $this->GuiadaModel->borrarImagen($idEscena);
        $this->GuiadaModel->borrarEscenaGuiada($idEscena);
        //$this->menuGuiada();
       
    }
    
    public function actualizarEscena(){
        $id_visita = $_REQUEST["id"];
        $actualizar = $this->GuiadaModel->actualizarEscena($id_visita);
        if($actualizar) "1";
        else  "0";
    }

    public function ordenarTabla(){
        $ordenar= $this->GuiadaModel->ordenarTabla();
        echo json_encode($ordenar);
    }

    public function cambiarFilas(){
        $filaAID = $_REQUEST["filaAID"];
        $filaAPOS = $_REQUEST["filaAPOS"];
        $filaBID = $_REQUEST["filaBID"];
        $filaBPOS = $_REQUEST["filaBPOS"];
        $mover = $this->GuiadaModel->intercambiarFilas($filaAID,$filaAPOS,$filaBID,$filaBPOS);

        echo $mover;
        
    }




}


?>