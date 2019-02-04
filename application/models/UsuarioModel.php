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

class UsuarioModel extends CI_Model {
    /*     * *****************************************************************
     *                           ADMIN
     *
     * **************************************************************** */

    /**
     * Inserta un usuario nuevo en la base de datos. La información viene por POST.
     * 
     * @return boolean true si la inserción tiene éxito, false en otro caso.
     */
    public function inserusu() {

        $email = $this->input->get_post("email");
        $username = $this->input->get_post("username");
        $pass = $this->input->get_post("pass");
        $name = $this->input->get_post("nombre");
        $apellido = $this->input->get_post("subname");
        $tipo = $this->input->get_post("tipo");
        $dejarenblanco = $this->input->get_post("dejarenblanco");
        // Si los datos vienen del formulario del panel de administración, traerán el tipo, pero si no hay que asignar un tipo = 0 (pendiente de asignar)
        if ($tipo == NULL) $tipo = 0;


        if ($dejarenblanco != "" && $dejarenblanco != NULL) {
            // Un bot ha intentado rellenar el campo trampa oculto
            $resultado = false; 
        }
        else {        
        
            $consulta = $this->db->query("SELECT * FROM usuarios");

            if (!$this->db->affected_rows($consulta)) {
                // Es el primer usuario que se inserta en la BD. Siempre será un superadmin (tipo = 1)
                $pass_encryted = md5($pass);
                $resultado = $this->db->query("insert into usuarios (nombre_usuario, password, nombre, apellido, email, tipo_usuario) VALUES('$username','$pass_encryted','$name','$apellido','$email','1')");
            } else {
                // No es el primer usuario. Vamos a comprobar si ya existe.
                $prueba = $this->db->query("SELECT id_usuario FROM usuarios WHERE nombre_usuario = '$username' OR email = '$email'");
                if ($this->db->affected_rows($prueba)) {
                    // El usuario ya existe. Error en el intento de inserción.
                    $resultado = false;
                } else {
                    // El usuario no existe. Vamos a tratar de insertarlo
                    $pass_encryted = md5($pass);
                    $resultado = $this->db->query("insert into usuarios (nombre_usuario, password, nombre, apellido, email, tipo_usuario) VALUES('$username','$pass_encryted','$name','$apellido','$email','$tipo')");
                }
            }
        }

        return $resultado;
    }
      /**
     * Comprueba que los datos al hacer login esten en la base de datos.
     * 
     * @return int con el tipo de usuario que realiza el login.
     */

    public function login($usr, $pass) {


        $pass_encryted = md5($pass);

        $consulta = "SELECT id_usuario, tipo_usuario, nombre_usuario FROM usuarios WHERE nombre_usuario = '$usr' and password = '$pass_encryted'";

        $res = $this->db->query($consulta);


        $tabla = array();
        foreach ($res->result_array() as $fila) {
            $tabla = $fila;
        }

        $resultado = 0;
        if (count($tabla) > 0) {
            $this->session->tipousr = $tabla["tipo_usuario"];
            $this->session->nombreusr = $tabla["nombre_usuario"];

            if ($tabla["tipo_usuario"] == 1) {

                $resultado = 1;
            } else if ($tabla["tipo_usuario"] == 2) {

                $resultado = 2;
            } else if ($tabla["tipo_usuario"] == 3) {

                $resultado = 3;
            }
        } else {
            $resultado = 4;
        }

        return $resultado;
    }
      /**
     * 
     * 
     * @return 
     */

    public function buscarusu($usr, $pass) {

        $consulta = "SELECT * FROM usuarios where nombre_usuario = '$usr' and password = '$pass'";
        $tabla = $this->db->query($consulta);

        return $tabla;
    }

    public function buscarusuid($id) {

        $consulta = "SELECT * FROM usuarios WHERE id_usuario = $id";
        $resultado = $this->db->query($consulta);

        $tabla = array();
        foreach ($resultado->result_array() as $fila) {
            $tabla[] = $fila;
        }
        return $tabla;
    }
        /**
     * Busca todos los usuarios de de la base de datos para mostrarlos
     * 
     * @return array con todos los usuarios de la base de datos 
     */

    public function buscartodousu() {

        $resultado = $this->db->query("SELECT * FROM usuarios");

        $tabla = array();
        foreach ($resultado->result_array() as $fila) {
            $tabla[] = $fila;
        }

        return $tabla;
    }

    public function borrarusu($id) {

        if ($id == 1) {

            $resultado = false;
        } else {

            $this->db->query("Delete from usuarios where id_usuario = '$id'");
            $resultado = true;
        }

        return $resultado;
    }

    public function alterarusu($id) {

        $nombre = $this->input->get_post("nombre");
        $apellidos = $this->input->get_post("apellidos");
        $email = $this->input->get_post("email");
        $username = $this->input->get_post("username");
        $tipo = $this->input->get_post("tipo");
        $pass = $this->input->get_post("pass");
        if ($pass != NULL) { 
            // También se va a cambiar la password
            $password = md5($pass);
            $this->db->query("Update usuarios set nombre_usuario = '$username', nombre = '$nombre', apellido='$apellidos', email = '$email', password = '$password', tipo_usuario='$tipo' where id_usuario = '$id'");
        }
        else {
            // No se va a modificar la password
            $this->db->query("Update usuarios set nombre_usuario = '$username', nombre = '$nombre', apellido='$apellidos', email = '$email', tipo_usuario='$tipo' where id_usuario = '$id'");
        }
        return $this->db->affected_rows();
    }
    
    /**
     * Modifica el tipo de un usuario.
     * 
     * @param integer $idusu El id del usuario
     * @param integer $nuevotipo El nuevo tipo de usuario
     * @return 1 si la modificación es un éxito, 0 en otro caso
     */
    public function modtipo($idusu, $nuevotipo) {
        $this->db->query("Update usuarios set tipo_usuario='$nuevotipo' where id_usuario = '$idusu'");
        return $this->db->affected_rows();
    }

    /**
     * Devuelve el tipo del usuario actualmente logueado.
     * 
     * @return integer El tipo de usuario logueado, o -1 si no hay ningún login activo.
     */
    public function get_tipo_usuario() {
        if ($this->session->tipousr) {
            $tipo = $this->session->tipousr;
        } else
            $tipo = -1;
        return $tipo;
    }
    /**
     * Comprueba si el usuario logueado tiene permisos para ver esta vista
     *
     * @param String vista El nombre de la vista que se pretende mostrar
     * @return true si el usuario tiene permisos para ver esta vista, false en otro caso
     */
    public function comprueba_permisos($vista) {
        if ($this->session->tipousr) {
            $tipo = $this->session->tipousr;
        } else
            $tipo = -1;

        $dir = explode("/", $vista);
        $dir = $dir[0];

        // El tipo 1 es adminsitrador, el tipo 2 es "mapero" y el tipo 3 es bibliotecario
        if ($tipo == 1 && ($dir == "audio" || $dir == "portada" || $dir == "imagen" || $dir == "biblioteca" || $dir == "escenas" || $dir == "puntosdestacados" || $dir == "video" || $dir == "hotspots" || $dir == "usuario" || $dir == "guiada" || $dir == "mapa") || $dir == "panoramas_secundarios" || $dir == "Backup" || $dir == "Zonas")
            return true;
        else if ($tipo == 2 && ($dir == "audio" || $dir == "imagen" || $dir == "escenas" || $dir == "video" || $dir == "hotspots" || $dir == "mapa" ))
            return true;
        else if ($tipo == 3 && $dir == "biblioteca")
            return true;
        else
            return false;
    }

}

?> 