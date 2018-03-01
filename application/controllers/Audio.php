<?php

// Este es el controlador de la aplicación
defined('BASEPATH') OR exit('No se permite el acceso directo al script');

class Audio extends CI_Controller {
    
    private $audios_por_pagina = 3;
    
    public function __construct() {
        parent::__construct();
        $this->load->model("Audm");
        $this->load->model("UsuarioModel");
        $this->load->library( 'pagination' );
    }

    public function index() {
        $this->mostraraudios($primero=0);
    }

    public function forminsertaraudio() {
        $datos["vista"] = "audio/Insertaraudios";
        $datos["permiso"] = $this->UsuarioModel->comprueba_permisos($datos["vista"]);
        $this->load->view("template_admin", $datos);
    }

    public function insertaraud() {
        $f_def = "assets/audio/" . $_FILES["audio"]["name"];
        $r = $this->Audm->existeaud($f_def);

        if ($r == true) {
            echo"el archivo ya existe en el servidor, intenta cambiarle el nombre antes de subirlo si no quieres qe se sobreescriba";
            echo"</br><a href='" . site_url("audio/forminsertaraudio") . "'>insertar</a></br>";
            echo"</br><a href='" . site_url("audio/mostraraudios") . "'>mostrar</a></br>";
            echo"</br><a href='" . site_url("audio/mostraraudios") . "'>renombrar archivo en el servidor</a></br>";
        } else {
            $tipo = $this->input->post_get("tipo_aud");
            $desc = $this->input->post_get("desc");
            $res = $this->Audm->insertaraud($desc, $tipo);
            $datos["tabla"] = $this->Audm->buscaraud(0, $this->audios_por_pagina);
            $datos["vista"] = "audio/Vaudios";
            $datos["permiso"] = $this->UsuarioModel->comprueba_permisos($datos["vista"]);
            $this->load->view("template_admin", $datos);
        }
    }

    public function mostraraudios($primero=0) {
        $datos["vista"] = "audio/Vaudios";
        $datos["primero"] = $primero;
        $datos["total"]=$this->Audm->buscar();
        $datos["cantidad"] = $this->audios_por_pagina;
        $datos["tabla"] = $this->Audm->buscaraud($primero, $this->audios_por_pagina);
        $datos["permiso"] = $this->UsuarioModel->comprueba_permisos($datos["vista"]);
        $this->load->view("template_admin", $datos);
        
    }

    public function borraraud($id) {
        $this->Audm->borraraud($id);
        $datos["tabla"] = $this->Audm->buscaraud(0, $this->audios_por_pagina);
        $datos["vista"] = "audio/Vaudios";
        $datos["permiso"] = $this->UsuarioModel->comprueba_permisos($datos["vista"]);
        $this->load->view("template_admin", $datos);
    }

    public function formmodificarAud($id_aud) {
        $datos["aud"] = $this->Audm->buscaridaud($id_aud);
        $datos["vista"] = "audio/Modificaraudios";
        $datos["permiso"] = $this->UsuarioModel->comprueba_permisos($datos["vista"]);
        $this->load->view("template_admin", $datos);
    }

    public function modificaraud() {
        $id = $this->input->post_get("id");
        $this->Audm->modificaraud($id);
        $datos["tabla"] = $this->Audm->buscaraud(0, $this->audios_por_pagina);
        $datos["vista"] = "audio/Vaudios";
        $datos["permiso"] = $this->UsuarioModel->comprueba_permisos($datos["vista"]);
        $this->load->view("template_admin", $datos);
    }
    
    public function obtenerListaAudiosAjax() {
        $listaAudios = $this->Audm->buscaraud(0, $this->audios_por_pagina);
        $html = '<script>'
                    . '       function seleccionarAudio(idAudio) {'
                    . '             document.getElementById("idAudioForm").value = idAudio;'
                    . '       }'
                    . '</script>';
        echo"<table align='center' id='cont' border:1><tr>
            <th>ID</th>
            <th>URL</th>
            <th>Descripcion</th>
            <th>Tipo de audio</th>
            <th>Reproducir</th>
            <th>Seleccionar</th>
            </tr>
            ";
        foreach ($listaAudios as $audio) {
            $fila = $audio["id_aud"];
                    
            $html = $html .
                    '<tr>'
                    . '<td>' . $audio["id_aud"] . '</td>'
                    . '<td>' . $audio["url_aud"] . '</td>'
                    . '<td>' . $audio["desc_aud"]. '</td>'
                    . '<td>' . $audio["tipo_aud"] . '</td>'
                    .'<td><audio controls="controls" preload="auto">
	<source src="' . base_url($audio["url_aud"]) . '" type="audio/m4a"/>
	<source src="' . base_url($audio["url_aud"]) . '" type="audio/mp3"/>
	</audio></td>'
                    . '<td onClick="seleccionarAudio('.$fila.')"><a href="#">Seleccionar</a></td>'
                    . '</tr>';          
        }
        echo $html; 
        echo '</table>';
    }   
    
    public function buscar_ajaxaud($abuscar) {
        $listaAudios = $this->Audm->buscar_ajaxaud($abuscar);
        
        echo"<table align='center' id='cont' border:1><tr>
            <th>ID</th>
            <th>URL</th>
            <th>Descripcion</th>
            <th>Tipo de audio</th>
            <th>Reproducir</th>
            <th>Seleccionar</th>
            </tr>
            ";
        foreach ($listaAudios as $audio) {
            $fila = $audio["id_aud"];
                    
            $html = $html .
                    '<tr>'
                    . '<td>' . $audio["id_aud"] . '</td>'
                    . '<td>' . $audio["url_aud"] . '</td>'
                    . '<td>' . $audio["desc_aud"]. '</td>'
                    . '<td>' . $audio["tipo_aud"] . '</td>'
                    .'<td><audio controls="controls" preload="auto">
	<source src="' . base_url($audio["url_aud"]) . '" type="audio/m4a"/>
	<source src="' . base_url($audio["url_aud"]) . '" type="audio/mp3"/>
	</audio></td>'
                    . '<td onClick="seleccionarAudio('.$fila.')"><a href="#">Seleccionar</a></td>'
                    . '</tr>';          
        }
        echo $html; 
        echo '</table>';
    }   
    



}

?>


 

