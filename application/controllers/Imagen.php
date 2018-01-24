<?php

defined('BASEPATH') OR exit('No se permite el acceso directo al script');

class Imagen extends CI_Controller {
  
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        $this->lista_imagenes();
    }
//PARA FUNCIONAR HE CAMBIADO LA PRIMERA FUNCIÓN INDEX() Y HE QUITADO LA LIBRERÍA 'input' de autoload.php
    public function formulario_insertar_imagen() {
  
        $this->load->view('imagen/formulario_insertar_imagen');
    }

    public function insertar_imagen() {
        //cargar el modelo
        $this->load->model("Img");
        //acciones para insertar la imagen
		//método insertar
        $resultado = $this->Img->insertar_imagen();

        if ($resultado) {
            $datos["mensaje"] = "Imagen insertada correctamente";
            $datos["lista_imagenes"] = $this->Img->buscar_todo();
            //cargar la vista
            $this->load->view('imagen/principal_img', $datos);
        } else {
            $datos["error"] = "Ha ocurrido un error al insertar el registro";
            $datos["lista_imagenes"] = $this->Img->buscar_todo();
            //cargar la vista
            $this->load->view('imagen/principal_img', $datos);
        }
    }

    public function lista_imagenes() {
        //cargar el modelo
        $this->load->model("Img");
        //acciones para ver el listado de imagenes
        $datos["lista_imagenes"] = $this->Img->buscar_todo();
        //cargar la vista
        $this->load->view('imagen/principal_img', $datos);
    }

    public function modificar_imagen($id) {
        
                                 //$this->load->library("input");  ***********************************
        //cargar el modelo
        $this->load->model("Img");
        //buscar los datos de una imagen concreta

        $datos["lista_imagenes"] = $this->Img->buscar_imagen($id);
        //muestra el formulario para modificar los datos
        $this->load->view('imagen/modificar_imagen', $datos);
    }

    public function actualizar_imagen() {
        //cargar el modelo
        $this->load->model("Img");
        //acciones para modificar los datos de la imagen en la BD
        //$actualizar_id=$_REQUEST['id_imagen'];
        $actualizar_titulo = $_REQUEST['titulo_imagen'];
        $actualizar_texto = $_REQUEST['texto_imagen'];
        //$actualizar_url = $_REQUEST['url_imagen'];
        $actualizar_fecha = $_REQUEST['fecha'];

        $actualizar_url = 'imagenes/' . $_REQUEST['titulo_imagen'] . ".jpg";

        $resultado = $this->Img->modificar_imagen();
        
        $datos["lista_imagenes"] = $this->Img->buscar_todo();
        if ($resultado) {
            $datos["mensaje"] = "Imagen actualizada con &eacute;xito";
        } else
            $datos["mensaje"] = "Los datos no se han modificado";
        $this->load->view('imagen/principal_img', $datos);
    }

    public function borrar_imagen($id_imagen) {
        //cargar el modelo
        $this->load->model("Img");
        //acciones para eliminar la imagen en la BD

        $resultado = $this->Img->borrar_imagen($id_imagen);

        $datos["lista_imagenes"] = $this->Img->buscar_todo();

        if ($resultado)
            $datos["mensaje"] = "Imagen borrada con &eacute;xito";
        else
            $datos["mensaje"] = "Error al borrar la imagen";

        $this->load->view("imagen/principal_img", $datos);
    }
}