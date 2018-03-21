<?php

// Este es el controlador de la aplicación
defined('BASEPATH') OR exit('No se permite el acceso directo al script');

class Audio extends CI_Controller {
    
    
    
    public function __construct() {
        parent::__construct();
        $this->load->model("Audm");
        $this->load->model("UsuarioModel");
       
    }

    public function index() {
        $this->mostraraudios();
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
           
            echo"</br><a href='" . site_url("audio/mostraraudios") . "'><button>Mostrar Audios</button></a></br>";
        } else {
            $tipo = $this->input->post_get("tipo_aud");
            $desc = $this->input->post_get("desc");
            $res = $this->Audm->insertaraud($desc, $tipo);
            $datos["tabla"] = $this->Audm->buscaraudio();
            $datos["vista"] = "audio/Vaudios";
            $datos["permiso"] = $this->UsuarioModel->comprueba_permisos($datos["vista"]);
            $this->load->view("template_admin", $datos);
        }
    }

    public function mostraraudios() {
        $datos["tabla"] = $this->Audm->buscaraudio();
         $datos["vista"] = "audio/Vaudios";
        $datos["permiso"] = $this->UsuarioModel->comprueba_permisos($datos["vista"]);
        $this->load->view("template_admin", $datos);
        
    }

    public function borraraud($id) {
		$r=$this->Audm->relacion($id);
		if($r==false){
        $this->Audm->borraraud($id);
			echo"1";
		}else {
			echo"0";
		}
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
        $datos["tabla"] = $this->Audm->allAudios();
        $datos["vista"] = "audio/Vaudios";
        $datos["permiso"] = $this->UsuarioModel->comprueba_permisos($datos["vista"]);
        $this->load->view("template_admin", $datos);
    }
    
        //ATENCIÓN CAMBIO LOLI
    public function obtenerListaAudiosAjax() {
        $listaAudios = $this->Audm->buscaraudio();
        $html = '<script>'
                    . '       function seleccionarAudio(idAudio) {'
                    . '             document.getElementById("idAudioForm").value = idAudio;'
                    . '       }</script>';
        $html = $html . "<table align='center' class='tabla_audio' class='display' id='cont' border:1>
            <thead>
            <tr>
            <th>ID</th>
            <th>URL</th>
            <th>Descripcion</th>
            <th>Tipo de audio</th>
            <th>Reproducir</th>
            <th>Seleccionar</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
            <th>ID</th>
            <th>URL</th>
            <th>Descripción</th>
            <th>Tipo de audio</th>
            <th>Reproducir</th>
            <th>Seleccionar</th>
            </tr>
            </tfoot>
            <tbody>
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
                    . '</tr>'
                    . '</tbody>';          
        }
        $html = $html . "</table>";
        echo $html; 
    }   
    //FIN CAMBIO LOLI
    
    
//    public function obtenerListaAudiosAjax() {
//        $listaAudios = $this->Audm->buscaraud(0, $this->audios_por_pagina);
//        $html = '<script>'
//                    . '       function seleccionarAudio(idAudio) {'
//                    . '             document.getElementById("idAudioForm").value = idAudio;'
//                    . '       }'
//                    . '</script>';
//        echo"<table align='center' id='cont' border:1><tr>
//            <th>ID</th>
//            <th>URL</th>
//            <th>Descripcion</th>
//            <th>Tipo de audio</th>
//            <th>Reproducir</th>
//            <th>Seleccionar</th>
//            </tr>
//            ";
//        foreach ($listaAudios as $audio) {
//            $fila = $audio["id_aud"];
//                    
//            $html = $html .
//                    '<tr>'
//                    . '<td>' . $audio["id_aud"] . '</td>'
//                    . '<td>' . $audio["url_aud"] . '</td>'
//                    . '<td>' . $audio["desc_aud"]. '</td>'
//                    . '<td>' . $audio["tipo_aud"] . '</td>'
//                    .'<td><audio controls="controls" preload="auto">
//	<source src="' . base_url($audio["url_aud"]) . '" type="audio/m4a"/>
//	<source src="' . base_url($audio["url_aud"]) . '" type="audio/mp3"/>
//	</audio></td>'
//                    . '<td onClick="seleccionarAudio('.$fila.')"><a href="#">Seleccionar</a></td>'
//                    . '</tr>';          
//        }
//        echo $html; 
//        echo '</table>';
//    }   
    public function busqueda_ajaxaud($abuscar="") {
        $listaAudios = $this->Audm->buscar_ajaxaud($abuscar);
        if ($listaAudios == false) {
			echo 'No hay resultados';
		}
		else {
        echo"<table id='cont'><tr id='cabecera'>
<th>ID</th>
<th>URL</th>
<th>Descripcion</th>
<th>Tipo de audio</th>
<th>Reproducir</th>
<th>Modificar</th>
<th>Eliminar</th>
</tr>

";

foreach ($listaAudios as $re) {
    $id=$re["id_aud"];
    echo'<tr id="contenido"><td id="id_aud'.$id.'">' . $re["id_aud"] . '</td>';
    echo'<td id="url_aud'.$id.'">' . $re["url_aud"] . '</td>';
    echo'<td id="desc_aud'.$id.'">' . $re["desc_aud"] . '</td>';
    echo'<td id="tipo_aud'.$id.'">' . $re["tipo_aud"] . '</td>';
    echo"<td><audio controls='controls' preload='auto'>
	<source src='" . base_url($re["url_aud"]) . "' type='audio/m4a'/>
	<source src='" . base_url($re["url_aud"]) . "' type='audio/mp3'/>
	</audio></td>";
    echo"<td><a onclick='mostrarm(". $re["id_aud"] .")'><i class='fa fa-edit' style='font-size:30px;'></i></a></td>";
    echo"<td><a href='#' onclick='borraraud(". $re["id_aud"] .")'><i class='fa fa-trash' style='font-size:30px;'></i></a></td></tr>";
  
}
echo "</table>";
		}
    }   

}

?>