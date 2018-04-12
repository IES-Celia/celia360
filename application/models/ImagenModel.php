<?php
/** 
  * Las operaciones de la base de datos se deben colocar en un modelo, para que puedan reutilizarse fácilmente más adelante.
  * Clase Img que extiende del Modelo base de Codeigniter, que carga la librería de base de datos.
  * Esto hará que la clase de base de datos esté disponible a través del $this->dbobjeto.
  * 
  * @author: María Dolores Salmeron Sierra
  */
class ImagenModel extends CI_Model {
    
    /**
     * Constructor, ejecuta un proceso predeterminado cuando se crea una instancia de su clase
     * 
     * @author: María Dolores Salmeron Sierra
     */
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    /**
     * Inserta un registro en la tabla "imagenes" de la base de datos
     * Sube al servidor el fichero de la imagen reduciendo sus dimensiones y el peso de la misma, crea una miniatura de la imagen en el servidor
     * 
     * @return $resultado, nos devuelve si se han realizado las acciones correctamente (true) o no (false)
     * @author: María Dolores Salmeron Sierra
     */
    //INSERTAR REDUCIENDO LA IMAGEN
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
    
        if (!$this->upload->do_upload('imagen')) {

            // ¡¡La subida del fichero ha fallado!!
            $resultado[0] = false;
            $resultado[1] = array('error' => $this->upload->display_errors());
            // Borramos el registro que habíamos creado vacío (solo con el ID)
            $this->db->query("DELETE FROM imagenes WHERE id_imagen = '$id_nuevaimagen'");
        } else {
            // ¡¡La subida del fichero ha sido un éxito!!
            //EN OTRO CASO SUBIMOS LA IMAGEN, CREAMOS LA MINIATURA 
            $data = array('upload_data' => $this->upload->data());

            $img_full_path = 'assets/imagenes/imagenes-hotspots/' . $userpic;

            // Modificamos el registro en la base de datos
            $resultado[0] = true;
            $resultado[1] = $this->db->query("UPDATE imagenes SET titulo_imagen='$titulo_imagen', texto_imagen = '$texto_imagen', 
                                        url_imagen = '$userpic', fecha = '$fecha' WHERE id_imagen = '$id_nuevaimagen'");

            //REDIMENSIONAR IMAGEN   
            $config['image_library'] = 'gd2';
            //CARPETA EN LA QUE ESTÁ LA IMAGEN A REDIMENSIONAR
            $config['source_image'] = 'assets/imagenes/imagenes-hotspots/' . $userpic;
            $config['create_thumb'] = TRUE;
            $config['maintain_ratio'] = TRUE;
            //CARPETA EN LA QUE GUARDAMOS LA MINIATURA
            $config['new_image'] = 'assets/imagenes/imagenes-hotspots/';  
            $img_redim1 = $config['new_image'];
            $config['width'] = 1200;
            //$config['height'] = 1200;
            $this->load->library('image_lib', $config);

            if (!$this->image_lib->resize()) {
                echo $this->image_lib->display_errors();
                exit();
            }

            $this->image_lib->clear();
    
            // Creamos una miniatura de la imagen
            $nombre_miniatura = $id_nuevaimagen . "_miniatura.jpg";
            copy('assets/imagenes/imagenes-hotspots/' . $userpic, 'assets/imagenes/imagenes-hotspots/' . $nombre_miniatura);
            $config['image_library'] = 'gd2';
            $config['source_image'] = 'assets/imagenes/imagenes-hotspots/' . $nombre_miniatura;
            $config['maintain_ratio'] = TRUE;
            $config['width'] = 200;
            //$config['height'] = 200;
            $this->load->library('image_lib', $config);
            $config['new_image'] = 'assets/imagenes/imagenes-hotspots/';

            $this->image_lib->initialize($config); /// <<- IMPORTANTE

            if (!$this->image_lib->resize()) {
                echo $this->image_lib->display_errors();
                exit();
            }
        }
        return $resultado;
    }
  
    //PARA MODIFICAR REDUCIENDO LA IMAGEN
    /**
     * Modifica un registro en la tabla "imagenes" de la base de datos 
     * Sube al servidor el fichero de la nueva imagen reduciendo sus dimensiones y el peso de la misma, crea una miniatura de la imagen en el servidor
     * 
     * @return $resultado | $fichero_actualizado, nos devuelve si se han realizado las acciones correctamente (true) o no (false)
     * @author: María Dolores Salmeron Sierra
     */
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
            
            //Si la imagen no se ha modificado         
            if (!$this->upload->do_upload('imagen')) {

                // si no se seleccionó ninguna imagen, la anterior permanecerá como está.
                $userpic = $actualizar_url;
                $nombre_miniatura = $actualizar_id . "_miniatura.jpg";
                $fichero_actualizado = false;
                $resultado = false;
            } else {
                //cambiar el nombre de la imagen de carga
                $userpic = $actualizar_id . "." . "jpg";

                // ¡¡La subida del fichero ha sido un éxito!!
                //EN OTRO CASO SUBIMOS LA IMAGEN, CREAMOS LA MINIATURA 
                $data = array('upload_data' => $this->upload->data());

                $img_full_path = 'assets/imagenes/imagenes-hotspots/' . $userpic;

                //REDIMENSIONAR IMAGEN   
                $config['image_library'] = 'gd2';
                //CARPETA EN LA QUE ESTÁ LA IMAGEN A REDIMENSIONAR
                $config['source_image'] = 'assets/imagenes/imagenes-hotspots/' . $userpic;
                $config['create_thumb'] = TRUE;
                $config['maintain_ratio'] = TRUE;
                //CARPETA EN LA QUE GUARDAMOS LA MINIATURA
                $config['new_image'] = 'assets/imagenes/imagenes-hotspots/';
                $img_redim1 = $config['new_image'];
                $config['width'] = 1200;
                $config['height'] = 1200;
                $this->load->library('image_lib', $config);

                if (!$this->image_lib->resize()) {
                    echo $this->image_lib->display_errors();
                    exit();
                }

                $this->image_lib->clear();

                // Creamos una miniatura de la imagen
                $nombre_miniatura = $actualizar_id . "_miniatura.jpg";
                copy('assets/imagenes/imagenes-hotspots/' . $userpic, 'assets/imagenes/imagenes-hotspots/' . $nombre_miniatura);
                $config['image_library'] = 'gd2';
                $config['source_image'] = 'assets/imagenes/imagenes-hotspots/' . $nombre_miniatura;
                $config['maintain_ratio'] = TRUE;
                $config['width'] = 200;
                $config['height'] = 200;
                $this->load->library('image_lib', $config);
                $config['new_image'] = 'assets/imagenes/imagenes-hotspots/';

                $this->image_lib->initialize($config); /// <<- IMPORTANTE

                if (!$this->image_lib->resize()) {
                    echo $this->image_lib->display_errors();
                    exit();
                }
                $fichero_actualizado = true;
                $resultado = true;
            }
            //Actualizamos la base de datos
            $q = "update imagenes set titulo_imagen = '$actualizar_titulo',texto_imagen='$actualizar_texto',
                url_imagen='$userpic',fecha='$actualizar_fecha' where id_imagen ='$actualizar_id'";

            $resultado = $this->db->query($q);

            return $resultado | $fichero_actualizado;
        }
    }

    /**
     * Busca todos los registros de la tabla "imagenes" de la base de datos
     * 
     * @return $lista, nos devuelve todos los registros de la tabla "imagenes" 
     * @author: María Dolores Salmeron Sierra    
     */   
    public function buscar_todo() {

        $res = $this->db->query("SELECT * FROM imagenes");
        $lista = array();
        foreach ($res->result_array() as $fila) {
            $lista[] = $fila;
        }
        return $lista;
    }
    
    /**
     * Elimina un registro en la tabla "imagenes" de la base de datos 
     * Elimina del servidor el fichero de la imagen y el fichero de la imagen en miniatura
     * 
     * @return $this->db->affected_rows(), si se ha realizado correctamente
     * @param $id, el identificador de la imagen
     * @author: María Dolores Salmeron Sierra 
     */
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
    
    /**
     * Busca un registro en la tabla "imagenes" de la base de datos
     * 
     * @param $id, el identificador de la imagen
     * @return $tabla, devuelve sus datos en un array
     * @author: María Dolores Salmeron Sierra       
     */
    public function buscar_imagen($id) {

        $miconsulta = "SELECT * FROM imagenes WHERE id_imagen = '$id'";
        $select = $this->db->query($miconsulta);
        $tabla = $select->result_array();
        return $tabla;
    }
    
    /**
     * Buscador de cadenas de caracteres con AJAX
     * 
     * @param $abuscar, la cadena a buscar
     * @return $lista, devuelve los resultados de la búsqueda
     * @return FALSE, no hay resultados coincidentes con la cadena a buscar
     * @author: María Dolores Salmeron Sierra   
     */
    
    //buscador con ajax
    public function buscar_ajax($abuscar) {
        
        //usamos after para decir que empiece a buscar por
        //el principio de la cadena
        //ej SELECT titulo_imagen from imagenes 
        //WHERE imagenes LIKE '%$abuscar' limit 12
        $this->db->select('*');

        //$this->db->like('titulo_imagen', $abuscar, 'after');
        //buscar la cadena
        if ($abuscar != "") $this->db->like('titulo_imagen', $abuscar);

        $resultados = $this->db->get('imagenes');

        //si existe algún resultado lo devolvemos
        if ($resultados->num_rows() > 0) {

            $lista = array();
            foreach ($resultados->result_array() as $fila) {
                $lista[] = $fila;
            }
            return $lista;

            //en otro caso devolvemos false
        } else {

            return FALSE;
        }       
        
    }      
}