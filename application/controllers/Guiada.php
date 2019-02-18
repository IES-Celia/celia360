

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

/**
 * Controlador de Guiada.
 * 
 * Esta clase contiene todos los métodos del controlador del panel de administración de la tabla Guiada.
 * Permite insertar, eliminar, modificar y consultar la tabla Guiada.
 * @author Sniurevicius Zygimantas 2018
 */    
    public function __construct() {
        parent::__construct();
        $this->load->model("UsuarioModel");
        $this->load->model("AudioModel");
        $this->load->model("EscenasModel");
        $this->load->model("GuiadaModel");
        $this->load->model("MapaModel","mapa");
    }

/**
* Método para mostrar formulario de creacion de visita guiada .
* 
* Carga el mapa y los puntos con cargar_mapa() y cargar_puntos()
* Carga todos los audios existentes en la plataforma con allAudios()
* Carga todas las escenas disponibles en la plataforma con getAll()
* Por ultimo le paso la vista y la comprobacion de permisos
*/
    public function mostrarFormularioGuiada() {
        $this->load->model("MapaModel","mapa");
        $datos["mapa"]=$this->mapa->cargar_mapa();
        $datos["puntos"]=$this->mapa->cargar_puntos();
        $datos["audios"]=$this->AudioModel->allAudios();
        $datos["escenas"]=$this->EscenasModel->getAll();
        $datos["vista"]="guiada/insertarGuiada";
        $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
        $this->load->view("admin_template", $datos);
    }

/**
* Método para insertar una escena guiada .
* 
* llama al metodo crearEscenaGuiada()
* Si se realiza la insercion de datos, nos lleva al siguiente paso.
* En caso de fallar nos lleva devuelta al formulario
*
*/

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

/**
* Método que carga las vistas de la adminisrtacion de la guiada.
*
* Carga todos los audios y escenas
* nos lleva a la vista administracion
*/

    public function menuGuiada(){
        //Todos los audios existentes.
        $datos["audios"]=$this->AudioModel->allAudios();
        //Todas las escenas existentes.
        $datos["escenasGuiada"]=$this->EscenasModel->getAll();
        $datos["escenas"] = $this->GuiadaModel->allEscenasGuiada();
        $datos["mapa"] = $this->mapa->cargar_mapa();
        $datos["puntos"] = $this->mapa->cargar_puntos();
        $datos["vista"]="guiada/administracionGuiada";
        $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
        $this->load->view("admin_template", $datos);
    }

/**
* Método para asociar un thumbnail a la escena guiada.
* 
* Si es la primera vez que introducimos una imagen coge la ultima entrada de tabla guiada y le asocia la imagen
* Si ya tenia una imagen en la base de datos borra la imagen y la cambia por la nueva, una modificacion simple
*
*/

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
        
    }

    public function modificarImagenPreview(){
        $idEscena = $this->input->get_post("id_visita");
        $asociar = $this->GuiadaModel->asociarImagen($idEscena);
        if($asociar==false){
             redirect('/guiada/menuGuiada', 'refresh');

        } else {
             redirect('/guiada/menuGuiada', 'refresh');
    }
  }

/**
* Método que selecciona todas las entradas de tabla visita guiada.
* 
* El resultado de ese select lo envia en JSON.
*
*/

    public function getGuiada(){
        $resultado = $this->GuiadaModel->allEscenasGuiada();
        echo json_encode($resultado);
    }

/**
* Método para borrar una escena en el panel de administracion.
* 
* Recibe el id de la escena guiada para borrar esa imagen y luego borra la guiada de la base de datos
*
*/

    public function borrarEscena(){
        $idEscena = $this->input->get_post("id");
        $this->GuiadaModel->borrarImagen($idEscena);
        $this->GuiadaModel->borrarEscenaGuiada($idEscena);
    }

/**
* Método metodo para actualizar una escena desde el panel de administracion guiada.
* 
* Recibe el id de la escena guiada y la actualiza con los datos correspondientes.
*
*/
    
    public function actualizarEscena(){
        $id_visita = $this->input->get_post("id");
        $actualizar = $this->GuiadaModel->actualizarEscena($id_visita);
        echo($actualizar);
    }

/**
* metodo para ordenar la tabla de la administracion visita guiada.
* 
* DEPRICATED.
*
*/

    public function ordenarTabla(){
        $ordenar= $this->GuiadaModel->ordenarTabla();
        echo json_encode($ordenar);
    }

/**
* metodo para ordenar las filas de la adminsitracion guiada.
* 
* intercambia la fila seleccionaba por la fila de abajo o arriba
*
*/
    public function cambiarFilas(){
       $arrayId = $this->input->post('idArray');
	   $arrayOrden = $this->input->post('orden');

	   $res = $this->GuiadaModel->updateTable($arrayId, $arrayOrden);

	   echo $res;

    }




}


?>
