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
/**
 * Controlador de Audio.
 * 
 * Esta clase contiene todos los métodos del controlador del panel de administración de la tabla usuarios.
 * Permite insertar, eliminar, modificar y consultar la tabla Usuario.
 * @author Miguel Angel Lopez Rodriguez 2018
 */

// Este es el controlador de la aplicación

class Usuario extends CI_Controller {
    /*     * ***********************************************************************
     *                                 USUARIO
     *                                               
     * *********************************************************************** */

    public function __construct() {
        parent::__construct();
        $this->load->model("UsuarioModel");
    }

    public function index() {
        $this->showloginform();
    }

    public function showloginForm($msj = "") {
        //Muestra la ventana de login
        $data["vista"] = "usuario/formLogin";
        $data["mensaje"] = $msj;
        $this->load->view('login_template', $data);
    }

    public function checklogin() {
        //Ejecuta el login
        $resultado = $this->UsuarioModel->login($this->input->get_post("user"), $this->input->get_post("pass"));

        if ($resultado == 1) {
            // Usuario administrador: redirigimos a panel de administración de escenas
            redirect(base_url("escenas"));
        } else if ($resultado == 2) {
            // Usuario mapero: también redirigimos a panel de administración de escenas
            redirect(base_url("escenas"));
        } else if ($resultado == 3) {
            // Usuario bibliotecario: redirigimos a panel de administración de biblioteca
            $datos["tabla"] = $libro->get_info();
            $datos["vista"] = "libro/IntAdmin";
            $this->load->view('login_template', $datos);
        } else if ($resultado == 0) {
            // Usuario pendiente de confirmar: redirigimos a pantalla de login
            $datos["error"] = "Usuario sin confirmar";
            $datos["vista"] = "usuario/formLogin";
            $this->load->view('login_template', $datos);
        } else {
            // Usuario sin registrar: redirigimos a pantalla de login
            $datos["error"] = "Usuario no registrado";
            $datos["vista"] = "usuario/formLogin";
            $this->load->view('login_template', $datos);
        }
    }

    public function showregisterform() {
        //Mostrar el formulario de registro
        $data["vista"] = "usuario/registerForm";
        $this->load->view('login_template', $data);
    }

    public function processregisterform() {
        //Formulario de registro de usuarios

        $resultado = $this->UsuarioModel->inserusu();
        if ($resultado) {
            // Usuario creado correctamente
            $datos["mensaje"] = "Usuario creado correctamente";
            if ($this->UsuarioModel->get_tipo_usuario() == -1) {
                // El usuario aún no está logueado: volvemos a la pantalla de login
                $datos["vista"] = "usuario/formLogin";
                $this->load->view('login_template', $datos);
            } else {
                // El usuario ya está logueado: volvemos al panel de administración
                $datos["vista"] = "usuario/usuarios";
                $datos["permiso"] = $this->UsuarioModel->comprueba_permisos($datos["vista"]);
                $datos["tablaUsuarios"] = $this->UsuarioModel->buscartodousu();
                $this->load->view('admin_template', $datos);
            }
        } else {
            $datos["error"] = "Error al crear el usuario";
            if ($this->UsuarioModel->get_tipo_usuario() == -1) {
                // No hay usuario logueado: volvemos a la pantalla de registro
                $datos["vista"] = "usuario/registerForm";
                $this->load->view("login_template", $datos);
            } else {
                // El usuario ya está logueado: volvemos al panel de administración
                $datos["vista"] = "usuario/usuarios";
                $datos["permiso"] = $this->UsuarioModel->comprueba_permisos($datos["vista"]);
                $datos["tablaUsuarios"] = $this->UsuarioModel->buscartodousu();
                $this->load->view('admin_template', $datos);
            }
        }
    }

    public function modificar($id) {

        //Abrir la ventana para modificar el usuario

        $datos["DatosMod"] = $this->UsuarioModel->buscarusuid($id);
        $datos["vista"] = "usuario/modUsu";
        $datos["permiso"] = $this->UsuarioModel->comprueba_permisos($datos["vista"]);
        $this->load->view("admin_template", $datos);
    }

    /**
     * Modifica el tipo de un usuario. Petición por ajax.
     * 
     * Devuelve 1 si la modificación es un éxito, 0 en caso de fallo. Lo devuelve a Ajax.
     * 
     * @param integer $idusu El id del usuario a modificar
     * @param integer $nuevotipo El nuevo tipo que se le debe asignar
     * 
     */
    public function modtipo($idusu, $nuevotipo) {
        $resultado = $this->UsuarioModel->modtipo($idusu, $nuevotipo);
        echo $resultado;
    }

    public function modusuario() {

        //Modificar el usuario
        $id = $this->input->get_post("id");
        $res = $this->UsuarioModel->alterarusu($id);
        $datos["tablaUsuarios"] = $this->UsuarioModel->buscartodousu();
        if ($res > 0) {
            $datos["mensaje"] = "Usuario modificado correctamente";
        } else {
            $datos["error"] = "No se ha podido modificar el usuario";
        }

        $datos["vista"] = "usuario/usuarios";
        $datos["permiso"] = $this->UsuarioModel->comprueba_permisos($datos["vista"]);
        $this->load->view('admin_template', $datos);
    }

    public function borrarusuario($idusu) {
        //Borrar usuario

        $resultado = $this->UsuarioModel->borrarusu($idusu);
        if ($resultado != 0)
            echo $idusu;
        else
            echo $resultado;
        //$datos["tablaUsuarios"] = $this->UsuarioModel->buscartodousu();
        //$datos["nombreUsuario"] = "usuario borrado correctamente.";
        //$datos["vista"] = "usuario/usuarios";
        //$this->load->view("admin_template",$datos);
    }

    public function usuarios() {

        $datos["tablaUsuarios"] = $this->UsuarioModel->buscartodousu();
        $datos["vista"] = "usuario/usuarios";
        $datos["permiso"] = $this->UsuarioModel->comprueba_permisos($datos["vista"]);
        $this->load->view('admin_template', $datos);
    }

    public function mapero() {

        $data["vista"] = "usuario/mapero";
        $datos["permiso"] = $this->UsuarioModel->comprueba_permisos($datos["vista"]);
        $this->load->view('admin_template', $data);
    }

    public function cerrarSesion() {
        $this->session->sess_destroy();
        $this->showloginForm();
    }

}

?>
