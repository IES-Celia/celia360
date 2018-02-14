<?php

// Este es el controlador de la aplicación

class Video extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("Vidm");
        $this->load->model("UsuarioModel");
    }

    public function index() {
        $this->mostrarvideo();
    }

    public function frominsertarvideo() {
        $datos["vista"] = "video/Insertarvideos";
        $datos["permiso"] = $this->UsuarioModel->comprueba_permisos($datos["vista"]);
        $this->load->view('template_admin', $datos);
    }

    public function insertarvideo() {
        $f_def = $this->input->post_get("video");
        $desc = $this->input->post_get("desc");
        $res = $this->Vidm->insertarvideo($desc, $f_def);
        $datos["tabla"] = $this->Vidm->buscarvideo();
        $datos["vista"] = "video/Vvideos";
        $datos["permiso"] = $this->UsuarioModel->comprueba_permisos($datos["vista"]);
        $this->load->view('template_admin', $datos);
    }

    public function mostrarvideo() {
        $datos["tabla"] = $this->Vidm->buscarvideo();
        $datos["vista"] = "video/Vvideos";
        $datos["permiso"] = $this->UsuarioModel->comprueba_permisos($datos["vista"]);
        $this->load->view('template_admin', $datos);
    }

    public function borrarvideo($id) {

        $this->Vidm->borrarvideo($id);
        $datos["tabla"] = $this->Vidm->buscarvideo();
        $datos["vista"] = "video/Vvideos";
        $datos["permiso"] = $this->UsuarioModel->comprueba_permisos($datos["vista"]);
        $this->load->view('template_admin', $datos);
    }

    public function formmodificarvideo($id_vid) {

        $datos["vid"] = $this->Vidm->buscaridvideo($id_vid);
        $datos["vista"] = "video/Modificarvideos";
        $datos["permiso"] = $this->UsuarioModel->comprueba_permisos($datos["vista"]);
        $this->load->view('template_admin', $datos);
    }

    public function modificarvideo() {

        $id = $this->input->post_get("id");
        $this->Vidm->modificarvideo($id);
        $datos["tabla"] = $this->Vidm->buscarvideo();
        $datos["vista"] = "video/Vvideos";
        $datos["permiso"] = $this->UsuarioModel->comprueba_permisos($datos["vista"]);
        $this->load->view('template_admin', $datos);
    }
    
    public function obtenerListaVideosAjax() {
        $listaVideos = $this->Vidm->buscarvideo();
        $html = '<script>'
                    . '       function seleccionarVideo(idVideo) {'
                    . '             document.getElementById("idVideoForm").value = idVideo;'
                    . '       }'
                    . '</script>';
        echo"<table align='center' id='cont' border:1><tr>
            <th>ID</th>
            <th>URL</th>
            <th>Descripcion</th>
            <th>Seleccionar</th>
            </tr>
            ";
        foreach ($listaVideos as $video) {
            $fila = $video["id_vid"];
                    
            $html = $html .
                    '<tr>'
                    . '<td>' . $video["id_vid"] . '</td>'
                    . '<td>' . $video["url_vid"] . '</td>'
                    . '<td>' . $video["desc_vid"]. '</td>'
                    . '<td onClick="seleccionarVideo('.$fila.')"><a href="#">Seleccionar</a></td>'
                    . '</tr>';          
        }
        echo $html; 
        echo '</table>';
    }   
}

?>
