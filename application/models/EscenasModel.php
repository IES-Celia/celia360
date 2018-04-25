<?php

class EscenasModel extends CI_Model {

    public function getAll() {

        $con = $this->db->query("SELECT * FROM escenas ORDER BY cod_escena");
        $tabla = array();
        foreach ($con->result_array() as $fila) {
            $tabla[] = $fila;
        }

        return $tabla;
    }

    public function getOne($cod) {

        $com = $this->db->query("SELECT * FROM escenas where cod_escena = '$cod'");
        $tabla = array();
        foreach ($com->result_array() as $fila) {
            $tabla[] = $fila;
        }
        return $tabla;
    }

    /**
     * Inserta una escena (panorama) en la BD y sube el archivo con la imagen al directorio assets/imagenes/escenas/
     * 
     * La imagen se redimensiona a 4000 px de ancho para evitar problemas en navegadores Mozilla.
     * 
     * @return 1 si la escena se sube correctamente, 0 si hay un error al insertar en la BD, -1 si hay un error al subir o redimensionar la imagen.
     */
    public function insertar() {

        $config['upload_path'] = 'assets/imagenes/escenas/';
        $config['allowed_types'] = 'jpg';

        $this->load->library('upload', $config);

        $resultado = $this->upload->do_upload('panorama');
        if ($resultado) {
            // Imagen subida con éxito
            // 
            // Obtenemos el nombre del archivo de imagen y le cambiamos la extensión .jpg por .JPG
            // (hemos tenido muchos problemas con esto y hemos decidido dejar la extensión en MAYÚSCULAS)
            $img_cliente = $this->upload->data()["client_name"];
            $nombre_imagen = substr($img_cliente, 0, -4).".JPG";
            rename("assets/imagenes/escenas/$img_cliente", "assets/imagenes/escenas/$nombre_imagen");
            
            // *** TODO: Se tiene que comprobar que existe ya un cod_escena igual para evitar duplicados ***

            // Vamos a redimensionarla para asegurarnos que su ancho es <4096px
            // (por encima de 4096px, algunos navegadores dan problemas)
            if ($this->upload->data()["image_width"] > 4000) {
                $config['image_library'] = 'gd2';
                $config['source_image'] = 'assets/imagenes/escenas/'.$nombre_imagen;
                $config['maintain_ratio'] = TRUE;
                $config['new_image'] = 'assets/imagenes/escenas/';
                $config['width'] = 4000;
                $this->load->library('image_lib', $config);

                if (!$this->image_lib->resize()) {
                    // Ha ocurrido un error al redimensionar la imagen
                    $resultado = -1;  // Marca de error
                }
            }

            // Insertamos en la BD
            $name = $this->input->post_get("name");
            $cod = substr($nombre_imagen, 0, -4);
            $left_mapa = $_REQUEST["left_mapa"];
            $top_mapa = $_REQUEST["top_mapa"];
            $piso_mapa = $_REQUEST["piso_mapa"];

            $insert = "INSERT INTO escenas (Nombre,cod_escena,hfov,pitch,yaw,tipo,panorama) 
                      VALUES('$name','$cod',120,10,10,'equirectangular','assets/imagenes/escenas/$nombre_imagen')";

            $this->db->query($insert);

            $insert = "INSERT INTO puntos_mapa (left_mapa, top_mapa, id_escena, piso) 
                VALUES ($left_mapa,$top_mapa,'$cod',$piso_mapa)";

            $this->db->query($insert);

            $resultado = $this->db->affected_rows();
        } else {
            $resultado = -1;
        }
        return $resultado;
    }

    /**
     * Función encargada de eliminar las escenas y todos los hotspots relacionados.
     * 
     * @param codigo_escena
     */
    public function borrar($cod) {

        $sql = "DELETE FROM hotspots WHERE id_hotspot IN (
                SELECT id_hotspot FROM escenas_hotspots where id_escena IN (
                    SELECT id_escena FROM escenas WHERE cod_escena = '$cod'))";
        $this->db->query($sql);

        $sql = "DELETE FROM puntos_mapa WHERE id_escena = '$cod'";
        $this->db->query($sql);

        $sql = "DELETE FROM escenas_hotspots WHERE id_escena = (SELECT id_escena FROM escenas WHERE cod_escena = '$cod') ";
        $this->db->query($sql);

        $sql = "DELETE FROM hotspots WHERE sceneid='$cod'";
        $this->db->query($sql);

        $sql = "DELETE FROM escenas WHERE cod_escena = '$cod' ";
        $this->db->query($sql);

        $imagen_borrar = "assets/imagenes/escenas/$cod.JPG";

        unlink($imagen_borrar);

        return $this->db->affected_rows();
    }

    public function update($cod) {

        $imagen_borrar = "assets/imagenes/escenas/$cod.JPG";

        $config['upload_path'] = 'assets/imagenes/escenas/';
        $config['allowed_types'] = 'jpg';
        $config['file_name'] = "$cod.JPG";
        $config['overwrite'] = TRUE;

        $this->load->library('upload', $config);

        $resultado = $this->upload->do_upload('panorama');
        
        if ($resultado) {
            // Nueva imagen subida con éxito. Vamos a redimensionarla a 4000 px para evitar problemas con Mozilla
            if ($this->upload->data()["image_width"] > 4000) {
                $config['image_library'] = 'gd2';
                $config['source_image'] = 'assets/imagenes/escenas/'.$cod.'.JPG';
                $config['maintain_ratio'] = TRUE;
                $config['new_image'] = 'assets/imagenes/escenas/';
                $config['width'] = 4000;
                $this->load->library('image_lib', $config);

                if (!$this->image_lib->resize()) {
                    // Ha ocurrido un error al redimensionar la imagen
                    $resultado = -1;  // Marca de error
                }
            }
            
        }


        //////////////////////
        //// TODO: Se tiene que poder modificar la imagen asociada a una cod_escena / $id manteniendo sus hotspots (subiendo la nueva escena al   server, sobrescribiendo la existente)
        /////////////////////


        $name = $_REQUEST["name"];
        $id = $_REQUEST["Id"];
        $panorama = $this->upload->data()["client_name"];
        $update = "
                    UPDATE escenas 
                    SET Nombre = '$name'";
        if ($resultado != 0) {
            $update = $update . ", panorama = 'assets/imagenes/escenas/$panorama'";
        }
        $update = $update . "WHERE id_escena = '$id'";


        $this->db->query($update);

        return $this->db->affected_rows();
    }

}
?>	
