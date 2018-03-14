<?php

// Este es el controlador de la aplicación

class Video extends CI_Controller {
private $videos_por_pagina = 10;
    public function __construct() {
        parent::__construct();
        $this->load->model("Vidm");
        $this->load->model("UsuarioModel");
    }

    public function index() {
        $this->mostrarvideo($primero=0);
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

    public function mostrarvideo($primero=0) {
        $datos["tabla"] = $this->Vidm->buscarvideo();
		$datos["primero"] = $primero;
		$datos["total"]=$this->Vidm->buscar();
		$datos["cantidad"] = $this->videos_por_pagina;
        $datos["vista"] = "video/Vvideos";
		$datos["tabla"] = $this->Vidm->buscarvid($primero, $this->videos_por_pagina);
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
        $listaVideos = $this->Vidm->buscarvid(0, $this->videos_por_pagina);
        $html = '<script>'
                    . '       function seleccionarVideo(idVideo) {'
                    . '             document.getElementById("idVideoForm").value = idVideo;'
                    . '       }'
                    . '</script>';
        echo"<table align='center' id='cont' border:1><tr>
            <th>ID</th>
            <th>URL</th>
            <th>Descripcion</th>
			<th>ver video</th>
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
					.'<td><a target="_blank" href="'. $video["url_vid"] .'">visitar enlace</a></td>'
                    . '<td onClick="seleccionarVideo('.$fila.')"><a href="#">Seleccionar</a></td>'
                    . '</tr>';          
        }
        echo $html; 
        echo '</table>';
    }
 public function videosajax($abuscar="") {
	 $cantidad = $this->videos_por_pagina;
	 $total=$this->Vidm->buscar();
	 $primero=0;
        $listaVideos = $this->Vidm->buscar_ajaxvid($abuscar);
		if ($listaVideos == false) {
			echo 'No hay resultados';
		}
		else {
        echo'<script>function seleccionarVideo(idVideo) {document.getElementById("idVideoForm").value = idVideo;}</script>';
      echo"<table  id='cont'><tr id='cabecera'>
<th>ID</th>
<th>URL</th>
<th>Descripcion</th>
<th>Ver video</th>
<th>Modificar</th>
<th>Eliminar</th></tr>
";

foreach ($listaVideos as $re) {
    $id=$re["id_vid"];
    echo'<tr id="contenido"><td id="id_vid'.$id.'">' . $re["id_vid"] . '</td>';
    echo'<td id="url_vid'.$id.'">' . $re["url_vid"] . '</td>';
    echo'<td id="desc_vid'.$id.'">' . $re["desc_vid"] . '</td>';
    echo"<td><a target='_blank' href='". $re["url_vid"] ."'>visitar enlace</a></td>";
    echo"<td><a onclick='mostrarm(". $re["id_vid"] .")'><i class='fa fa-edit' style='font-size:30px;'></i></a></td>";
    echo"<td><a href='#' onclick='borrarvid(". $re["id_vid"] .")'><i class='fa fa-trash' style='font-size:30px;'></i></a></td></tr>";
}
echo "</table>";
/*$ant = $primero - $cantidad;
if($ant<0)$ant=0;
$sig = $primero + $cantidad;
if($sig>$total) $sig=$total-1;
echo "<div id='div_pag'><a class='paginacion' href='". site_url("video/mostrarvideo/") ."$ant'>Anterior</a> - <a class='paginacion' href='". site_url("video/mostrarvideo/") ."$sig'>Siguiente</a></div></br></br>";*/
		}
    }  	
}

?>
