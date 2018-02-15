<?php

class Img extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function insertar_imagen() {
        $resultado = array();

        $id_imagen = $this->input->post_get('id_imagen');
        $titulo_imagen = $this->input->post_get('titulo_imagen');
        $texto_imagen = $this->input->post_get('texto_imagen');
        $fecha = $this->input->post_get('fecha');

        //Insertamos un registro vacío para generar el ID y usarlo como nombre del fichero que se va a subir
        $this->db->query("INSERT INTO imagenes(id_imagen) VALUES (0)"); // Es un campo auto_increment, así que ignorará el 0

        $resul = $this->db->query("SELECT MAX(id_imagen) AS maxid FROM imagenes ORDER BY id_imagen DESC LIMIT 1");
        $id_nuevaimagen = $resul->row()->maxid;

        //cambiar el nombre de la imagen de carga	
        $userpic = $id_nuevaimagen . "." . "jpg";

        $config['upload_path'] = 'assets/imagenes/imagenes-hotspots/';
        $config['allowed_types'] = 'jpg';
        $config['file_name'] = $userpic;

        //cargar la librería
        $this->load->library('upload', $config);
        //Realiza la carga según las preferencias que ha establecido.
        $resultado_subida = $this->upload->do_upload('imagen');

        if ($resultado_subida == false) {
            // ¡¡La subida del fichero ha fallado!!
            $resultado[0] = false;
            $resultado[1] = $this->upload->display_errors("<i>", "</i>");
            // Borramos el registro que habíamos creado vacío (solo con el ID)
            $this->db->query("DELETE FROM imagenes WHERE id_imagen = '$id_nuevaimagen'");
        } else {
            // ¡¡La subida del fichero ha sido un éxito!!
            //Para devolver un elemento de la matriz: $this->upload->data('client_name'); 
            //Nombre de archivo proporcionado por el agente de usuario del cliente, antes de cualquier preparación o incremento de nombre de archivo
            $imgFile = $this->upload->data('client_name');
            //Nombre del archivo que se cargó, incluida la extensión de nombre de archivo
            $tmp_dir = $this->upload->data('file_name');
            // Modificamos el registro en la base de datos
            $resultado[0] = true;
            $resultado[1] = $this->db->query("UPDATE imagenes SET titulo_imagen='$titulo_imagen', texto_imagen = '$texto_imagen', 
                                        url_imagen = '$userpic', fecha = '$fecha' WHERE id_imagen = '$id_nuevaimagen'");
            // Creamos una miniatura de la imagen
            $nombre_miniatura = $id_nuevaimagen . "_miniatura.jpg";
            copy('assets/imagenes/imagenes-hotspots/'.$userpic, 'assets/imagenes/imagenes-hotspots/'.$nombre_miniatura);
            $config['image_library'] = 'gd2';
            $config['source_image'] = 'assets/imagenes/imagenes-hotspots/'.$nombre_miniatura;
            $config['maintain_ratio'] = TRUE;
            $config['width'] = 200;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
        }
        return $resultado;
    }

    //Modifica los datos de la imagen
    public function modificar_imagen() {

        $fichero_actualizado = false;

        if ($this->input->post_get('actualizar')) {

            $actualizar_id = $this->input->post_get('id_imagen');
            $actualizar_titulo = $this->input->post_get('titulo_imagen');
            $actualizar_texto = $this->input->post_get('texto_imagen');
            $actualizar_url = $this->input->post_get('url_imagen');
            $actualizar_fecha = $this->input->post_get('fecha');

            //cambiar el nombre de la imagen de carga
            $userpic = $actualizar_id . "." . "jpg";

            $config['upload_path'] = 'assets/imagenes/imagenes-hotspots/';
            $config['allowed_types'] = 'jpg';
            $config['file_name'] = $userpic;
            $config['overwrite'] = TRUE;

            //cargar la librería
            $this->load->library('upload', $config);

            $resultado_subida = $this->upload->do_upload('imagen');

            if ($resultado_subida) {
                //cambiar el nombre de la imagen de carga
                $userpic = $actualizar_id . "." . "jpg";
            
                // Creamos una miniatura de la imagen
                $nombre_miniatura = $actualizar_id . "_miniatura.jpg";
                copy('assets/imagenes/imagenes-hotspots/'.$userpic, 'assets/imagenes/imagenes-hotspots/'.$nombre_miniatura);
                $config['image_library'] = 'gd2';
                $config['source_image'] = 'assets/imagenes/imagenes-hotspots/'.$nombre_miniatura;
                $config['maintain_ratio'] = TRUE;
                $config['width'] = 200;
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $fichero_actualizado = true;
                $resultado = true;
            } else {
                // si no se seleccionó ninguna imagen, la anterior permanecerá como está.
                $userpic = $actualizar_url;
                $nombre_miniatura = $actualizar_id . "_miniatura.jpg"; 
                $fichero_actualizado = false;
                $resultado = false;
            }

            $q = "update imagenes set titulo_imagen = '$actualizar_titulo',texto_imagen='$actualizar_texto',
                url_imagen='$userpic',fecha='$actualizar_fecha' where id_imagen ='$actualizar_id'";

            $resultado = $this->db->query($q);

            return $resultado | $fichero_actualizado;
        }
    }

    //buscar todos los datos    
    public function buscar_todo() {

        $res = $this->db->query("SELECT * FROM imagenes");
        $lista = array();
        foreach ($res->result_array() as $fila) {
            $lista[] = $fila;
        }
        return $lista;
    }

    //Eliminar imagen
    public function borrar_imagen($id) {

        $miconsulta = "SELECT url_imagen FROM imagenes WHERE id_imagen = '$id'";

        $consulta = $this->db->query($miconsulta);
        $archivo_imagen = $consulta->result_array()[0]["url_imagen"];
        
        // cargar directorio
        $url_imagen = "assets/imagenes/imagenes-hotspots/" . $archivo_imagen; 
        // cargar directorio de la miniatura
        $url_imagen_miniatura = "assets/imagenes/imagenes-hotspots/" . $id ."_miniatura.jpg";
        //unlink — Borra un fichero
        unlink($url_imagen);
     
        unlink($url_imagen_miniatura);  //borra la miniatura
        //borrar el registro de la base de datos
        $q = "delete  from imagenes where id_imagen= '$id'";

        $this->db->query($q);
        return $this->db->affected_rows();
    }

    // Busca una imagen en la BD y devuelve sus datos en un array
    public function buscar_imagen($id) {

        $miconsulta = "SELECT * FROM imagenes WHERE id_imagen = '$id'";
        $select = $this->db->query($miconsulta);
        $tabla = $select->result_array();
        return $tabla;
    }
   
    
}
