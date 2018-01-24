<?php

class Img extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function insertar_imagen() {

        $id_imagen = $_REQUEST['id_imagen'];
        $titulo_imagen = $_REQUEST['titulo_imagen'];
        $texto_imagen = $_REQUEST['texto_imagen'];
        $fecha = $_REQUEST['fecha'];
        $imgFile = $_FILES['imagen']['name'];
        $tmp_dir = $_FILES['imagen']['tmp_name'];


        $upload_dir = 'imagenes/'; // cargar directorio
        //PATHINFO_EXTENSION  (se devuelve la extensión)
        $imgExt = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION)); // obtener extensión de imagen
        //cambiar el nombre de la imagen de carga
        $userpic = $id_imagen . "." . $imgExt;

        //Consultar el último id insertado
        $resul = $this->db->query("SELECT MAX(id_imagen) AS maxid FROM imagenes");
        $maxid = $resul->row()->maxid;
        //recoger el resultado y añadirle 1 (que será el nombre de la imagen)
        $nombre = $maxid + 1;

        //cambiar el nombre de la imagen de carga
        $userpic = $nombre . "." . $imgExt;

        // move_uploaded_file — Mueve un archivo subido a una nueva ubicación.
        move_uploaded_file($tmp_dir, $upload_dir . $userpic);

        // Insertamos el registro en la base de datos
        $resultado = $this->db->query("insert into imagenes (id_imagen,titulo_imagen,texto_imagen,url_imagen,fecha)
                values('$id_imagen','$titulo_imagen','$texto_imagen' ,'$userpic','$fecha')");

        //Consultar el último id insertado
        $res = $this->db->query("SELECT MAX(id_imagen) AS maxid FROM imagenes");

        //recoger el resultado
        $nom = $res->row()->maxid;

        //si la 1ªconsulta del (máximo id insertado +1) es distinto de la 2ªconsulta del máximo id insertado
        if ($nombre != $nom) {

            //cambiar el nombre de la imagen de carga
            $user = $nom . "." . $imgExt;
            //modifico el nombre en la BD
            $re = $this->db->query("update imagenes set url_imagen='$user' where id_imagen ='$nom'");

            //cambia el nombre del fichero
            rename("$upload_dir$userpic", "$upload_dir$user");
        }   //fin del if

        if ($resultado == 1) {

            $resultado = true;
        } else {
            $resultado = false;
        }
        return $resultado;
    }

    //Modifica los datos de la imagen
    public function modificar_imagen() {

        $fichero_actualizado = false;

        if (isset($_REQUEST['actualizar'])) {
            $actualizar_id = $_REQUEST['id_imagen'];
            $actualizar_titulo = $_REQUEST['titulo_imagen'];
            $actualizar_texto = $_REQUEST['texto_imagen'];
            $actualizar_url = $_REQUEST['url_imagen'];
            $actualizar_fecha = $_REQUEST['fecha'];

            $imgFile = $_FILES['imagen']['name'];
            $tmp_dir = $_FILES['imagen']['tmp_name'];

            if ($imgFile) {
                $upload_dir = 'imagenes/'; // cargar directorio
                //pathinfo — Devuelve información acerca de la ruta de un fichero
                $imgExt = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION)); // obtener extensión de imagen
                //********************************
               // $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
               // if(in_array($imgExt, $valid_extensions))
                //****************************************
                //cambiar el nombre de la imagen de carga
                $userpic = $actualizar_id . "." . $imgExt;

                move_uploaded_file($tmp_dir,$upload_dir . $userpic);
                $fichero_actualizado = true;
            } else {
                // si no se seleccionó ninguna imagen, la anterior permanecerá como está.
                $userpic = $actualizar_url;
                $fichero_actualizado = false;
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

            //consultar la BD la fila
            $url_imagen = "imagenes/".$archivo_imagen; // cargar directorio
            //unlink — Borra un fichero
            unlink($url_imagen);

            $q = "delete  from imagenes where id_imagen= '$id'";

            $resultado = $this->db->query($q);

            if ($resultado != 0) {
                return true;
            } else {
                return false;
            }
    }

    // Busca una imagen en la BD y devuelve sus datos en un array
    public function buscar_imagen($id) {

        $miconsulta = "SELECT * FROM imagenes WHERE id_imagen = '$id'";
        $select = $this->db->query($miconsulta);
        $tabla = $select->result_array();
        return $tabla;
    }
}