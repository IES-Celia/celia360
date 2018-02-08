<?php

defined('BASEPATH') OR exit('No se permite el acceso directo al script');

class Imagen extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("UsuarioModel");
    }

    public function index() {
        $this->lista_imagenes();
    }

    public function formulario_insertar_imagen() {
        $datos["vista"] = "imagen/formulario_insertar_imagen";
        $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
        $this->load->view('template_admin', $datos);
    }

    public function insertar_imagen() {

        //cargar el modelo
        $this->load->model("Img");
        //acciones para insertar la imagen
        $resultado = $this->Img->insertar_imagen();

        if ($resultado[0]) {
            $datos["mensaje"] = "Imagen insertada correctamente";
            $datos["lista_imagenes"] = $this->Img->buscar_todo();
            $datos["vista"] = "imagen/principal_img";
            $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
            //cargar la vista
            $this->load->view('template_admin', $datos);
        } else {
            $datos["error"] = "Ha ocurrido un error al insertar el registro";
            $datos["lista_imagenes"] = $this->Img->buscar_todo();
            $datos["vista"] = "imagen/principal_img";
            $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
            //cargar la vista
            $this->load->view('template_admin', $datos);
        }
    }

    public function lista_imagenes() {
        //cargar el modelo
        $this->load->model("Img");
        //acciones para ver el listado de imagenes
        $datos["lista_imagenes"] = $this->Img->buscar_todo();
        $datos["vista"] = "imagen/principal_img";
        $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
        //cargar la vista
        $this->load->view('template_admin', $datos);
    }

    public function modificar_imagen($id) {

        //cargar el modelo
        $this->load->model("Img");
        //buscar los datos de una imagen concreta

        $datos["lista_imagenes"] = $this->Img->buscar_imagen($id);
        $datos["vista"] = "imagen/modificar_imagen";
        $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
        //muestra el formulario para modificar los datos
        $this->load->view('template_admin', $datos);
    }

    public function actualizar_imagen() {
        //cargar el modelo
        $this->load->model("Img");

        //acciones para modificar los datos de la imagen en la BD
        $actualizar_titulo = $this->input->post_get('titulo_imagen');
        $actualizar_texto = $this->input->post_get('texto_imagen');
        $actualizar_fecha = $this->input->post_get('fecha');

        $actualizar_url = 'assets/imagenes/imagenes-hotspots/' . $this->input->post_get('titulo_imagen') . ".jpg";

        $resultado = $this->Img->modificar_imagen();

        $datos["lista_imagenes"] = $this->Img->buscar_todo();
        if ($resultado) {
            $datos["mensaje"] = "Imagen actualizada con &eacute;xito";
        } else
            $datos["mensaje"] = "Los datos no se han modificado";

        $datos["vista"] = "imagen/principal_img";
        $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
        $this->load->view('template_admin', $datos);
    }

    public function borrar_imagen($id_imagen) {

        //cargar el modelo
        $this->load->model("Img");

        //acciones para eliminar la imagen en la BD
        $resultado = $this->Img->borrar_imagen($id_imagen);
        if ($resultado != 0) {
            echo $id_imagen;
        } else {
            echo $resultado;
        }
    }

}
