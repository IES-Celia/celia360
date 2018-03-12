<?php

class ModeloGuiada extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function crearEscenaGuiada() {

        $cod_escena = $_REQUEST['escenaGuiada'];
        $audio_escena = $_REQUEST["audioGuiada"];
        $titulo_escena = $_REQUEST["tituloGuiada"];
        if(empty($cod_escena) || empty($audio_escena)){
            return -1;    
        }
        $sql = "INSERT INTO visita_guiada (id_visita,cod_escena,audio_escena,titulo_escena) VALUES(NULL,'$cod_escena','$audio_escena','$titulo_escena');";
        //print_r($sql);
        $this->db->query($sql);

        return $this->db->affected_rows();
    }

    public function allEscenasGuiada(){
        $sql = "SELECT * FROM visita_guiada;";
        $resultado = $this->db->query($sql);
        $array = array();
        foreach ($resultado->result_array() as $fila) {
            $array[] = $fila;
        }
        return $array;
    }

    public function lastEscenaGuiada() {

            $resultado = $this->db->query("SELECT id_visita FROM visita_guiada ORDER BY id_visita DESC LIMIT 1")->result_array()[0]["id_visita"];
            return $resultado;
        
    }

    public function asociarImagen($idEscena){

        $filePath = 'assets/imagenes/previews-guiada/';
        $nombreImagen="prev".$idEscena;
        $config['upload_path'] = $filePath;
        $config['allowed_types'] = '*';
        $config['file_name'] = $nombreImagen;
        $config['overwrite'] = TRUE;

       //cargar la librería
       $this->load->library('upload', $config);
       //Realiza la carga según las preferencias que ha establecido.
       $resultado_subida = $this->upload->do_upload('imagenPreview');

        if ($resultado_subida == false) {
            $malasuerte = $this->upload->display_errors("<i>", "</i>");
            print_r($malasuerte);
        } else {
            //Nombre de archivo proporcionado por el agente de usuario del cliente, antes de cualquier preparación o incremento de nombre de archivo
            $imgFile = $this->upload->data('client_name');
            //Nombre del archivo que se cargó, incluida la extensión de nombre de archivo
            $tmp_dir = $this->upload->data('file_name');

            $sql="UPDATE visita_guiada SET img_preview='$tmp_dir' WHERE id_visita='$idEscena'";

            $this->db->query($sql);
            // Deberia cambiarle el tamaño de la imagen preview subida!
            /*
            $nombre_miniatura = $id_nuevaimagen . "_miniatura.jpg";
            copy('assets/imagenes/imagenes-hotspots/'.$userpic, 'assets/imagenes/previews-guiada/'.$nombre_miniatura);
            $config['image_library'] = 'gd2';
            $config['source_image'] = 'assets/imagenes/imagenes-hotspots/'.$nombre_miniatura;
            $config['maintain_ratio'] = TRUE;
            $config['width'] = 450;
            $config['height'] = 450;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            */



        }
        
        return $this->db->affected_rows();

    }
    
    public function borrarEscenaGuiada($idEscena) {
        $resultado = $this->db->query("DELETE FROM visita_guiada WHERE id_visita='$idEscena'");
        return $this->db->affected_rows();
    }

    public function borrarImagen($idEscena){
        $sql ="SELECT img_preview  FROM visita_guiada WHERE id_visita='$idEscena'";
        $resultado = $this->db->query($sql)->result_array()[0]["img_preview"];
        $enlace ="assets/imagenes/previews-guiada/" . $resultado;
        unlink($enlace);
    }

    public function actualizarEscena($idEscena){
        $id_visita = $_REQUEST["id"];
        $cod_escena = $_REQUEST["escena"];
        $audio_escena = $_REQUEST["audio"];
        $titulo_escena = $_REQUEST["titulo"];

        $this->db->query("UPDATE visita_guiada
				SET 
				    cod_escena='$cod_escena',
	                titulo_escena='$titulo_escena',
					audio_escena='$audio_escena' 
				WHERE id_visita='$idEscena'");
		
        return $this->db->affected_rows();


    }


}


?>