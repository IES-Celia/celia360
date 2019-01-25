<?php
/*
    Este archivo es parte de la aplicación web Celia360. 

    Celia 360 es software libre: usted puede redistribuirlo y/o modificarlo
    bajo los términos de la GNU General Public License tal y como está publicada por
    la Free Software Foundation en su versión 3.
 
    Celia 360 se distribuye con el propósito de resultar útil,
    pero SIN NINGUNA GARANTÍA de ningún tipo. 
    Véase la GNU General Public License para más detalles.

    Puede obtener una copia de la licencia en <http://www.gnu.org/licenses/>.
*/
?>

<?php
defined('BASEPATH') OR exit('No se permite el acceso directo al script');

class Backup extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("BackupModel");
        $this->load->model("UsuarioModel");
    }
    
    public function index(){
        $this->showBackup();
    }

    public function showBackup() {   
        $datos["vista"]="Backup";
        $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
        $this->load->view('admin_template', $datos);
    }
    
    //Descargamos una copia de nuestra base de datos al escritorio
    public function backupSql(){
        $this->BackupModel->backupSql();
    }

    //Nos descargamos un archivo zip de la carpeta assets en nuestro escritorio
    public function backupAssets(){
        $this->BackupModel->backupAssets();
    }

    //Restaurar assets
    public function restoreAssets(){
        $this->BackupModel->deleteAssets();//Borramos todo el contenido del directorio assets
        //Restauramos el contenido de assets
        if($this->BackupModel->restoreAssets()){
            echo "<script>alert('Assests restaurados con exito')</script>";
        }else{
            echo "<script>alert('Error al restaurar assets')</script>";
        }
        $datos["vista"]="Backup";
        $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
        $this->load->view('admin_template', $datos);
    }

    public function restoreSql(){
        //Restauramos el contenido de sql
        if($this->BackupModel->restoreSql()){
            echo "<script>alert('Sql restaurados con exito')</script>";
        }else{
            echo "<script>alert('Error al restaurar sql')</script>";
        }
        $datos["vista"]="Backup";
        $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
        $this->load->view('admin_template', $datos);
    }

}

?>
