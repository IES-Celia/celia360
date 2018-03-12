<?php

class PuntosDestacadosModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function info_celda($id_celda){
        $res = $this->db->query("SELECT * FROM celda_pd WHERE id_celda='$id_celda' ");
        return $res->result_array();
    }
   
    public function crear_celda(){
        $resultado = array();

        $fila_asociada= $_REQUEST["fila_asociada"];
        $res = $this->db->query("SELECT id_celda FROM celda_pd ORDER BY id_celda DESC LIMIT 1")->result_array()[0]["id_celda"];
        $id_celda = $res+1;
        $escena_celda= $_REQUEST["escena_celda"];
        $titulo_celda = $_REQUEST["titulo_celda"];

        //Insertamos un registro vacío para generar el ID y usarlo como nombre del fichero que se va a subir
        $this->db->query("INSERT INTO celda_pd(id_celda) VALUES ('.$id_celda.')"); // Es un campo auto_increment, así que ignorará el 0

        $id_nuevaimagen = $id_celda;

        //cambiar el nombre de la imagen de carga	
        $userpic = $id_nuevaimagen . "." . "jpg";

        $config['upload_path'] = 'assets/imagenes/destacados/';
        $config['allowed_types'] = 'jpg';
        $config['file_name'] = $userpic;

        //cargar la librería
        $this->load->library('upload', $config);
        //Realiza la carga según las preferencias que ha establecido.
        $resultado_subida = $this->upload->do_upload('imagen_celda');

        if ($resultado_subida == false) {
            // ¡¡La subida del fichero ha fallado!!
            $resultado[0] = false;
            $resultado[1] = $this->upload->display_errors("<i>", "</i>");
            // Borramos el registro que habíamos creado vacío (solo con el ID)
            $this->db->query("DELETE FROM celda_pd WHERE id_celda = '$id_celda'");
        } else {
            // ¡¡La subida del fichero ha sido un éxito!!
            //Para devolver un elemento de la matriz: $this->upload->data('client_name'); 
            //Nombre de archivo proporcionado por el agente de usuario del cliente, antes de cualquier preparación o incremento de nombre de archivo
            $imgFile = $this->upload->data('client_name');
            //Nombre del archivo que se cargó, incluida la extensión de nombre de archivo
            $tmp_dir = $this->upload->data('file_name');
            // Modificamos el registro en la base de datos
            $resultado[0] = true;
            $resultado[1] = $this->db->query("UPDATE celda_pd SET titulo_celda='$titulo_celda', imagen_celda = 'assets/imagenes/destacados/$userpic', escena_celda='$escena_celda' ,fila_asociada = '$fila_asociada' WHERE id_celda = '$id_celda'");
            // Creamos una miniatura de la imagen
           /* $nombre_miniatura = $id_nuevaimagen . "_miniatura.jpg";
            copy('assets/imagenes/destacados/'.$userpic, 'assets/imagenes/destacados/'.$nombre_miniatura);
            $config['image_library'] = 'gd2';
            $config['source_image'] = 'assets/imagenes/destacados/'.$nombre_miniatura;
            $config['maintain_ratio'] = TRUE;
            $config['width'] = 200;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize(); */
        }
        return $resultado;
    }
    
    public function borrar_celda($id){
        $this->db->query("DELETE FROM celda_pd WHERE id_celda = '$id'");
        $imagen_borrar = "assets/imagenes/destacados/$id.JPG";
        unlink($imagen_borrar);
       /* $imagen_borrar = "assets/imagenes/destacados/$id._miniatura.JPG";
        unlink($imagen_borrar);*/
    }
    
    public function editar_celda(){
        $id_celda = $_REQUEST["id_celda"];
        $escena_celda= $_REQUEST["escena_celda"];
        $titulo_celda = $_REQUEST["titulo_celda"];
        $fila_asociada= $_REQUEST["fila_asociada"];
        
        $this->db->query("UPDATE celda_pd SET 
                           escena_celda='$escena_celda',
                           titulo_celda='$titulo_celda',
                           fila_asociada='$fila_asociada'
                           WHERE id_celda='$id_celda'
                            ");
        return $this->db->affected_rows();
    }
   // maravilloso
    public function mover_celda($idcelda, $idfila){
        $res = $this->db->query("SELECT COUNT(id_celda) FROM celda_pd WHERE fila_asociada=$id_fila")->result_array()[0]["COUNT(id_celda)"];
        if($res<4){
            $this->db->query("UPDATE celda_pd SET fila_asociada=.$id_fila. WHERE id_celda=$idcelda");
        }else{
            return false;
        }
    }

    public function getAll() {
        $sql = "SELECT * FROM celda_pd";
        
        $result = $this->db->query($sql);
        $r = array();
        $r[0] = array();
        $r[1] = array();
        $r[2] = array();
        $r[3] = array();
        $r[4] = array();
        foreach ($result->result_array() as $fila) {
            $f = $fila["fila_asociada"];
            $r[$f][] = $fila;
        }
        return $r;
    }
}