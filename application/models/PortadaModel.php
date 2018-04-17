<?php 

    class PortadaModel extends CI_Model {
        
        public function get_info_portada(){
            $res = $this->db->query("SELECT * FROM opciones_portada");
            return $res->result_array();
        }
        
        /**
         * Actualiza en la base de datos las opciones de la portada.
         * Los datos se reciben por POST.
         * 
         * @return int 0 si la actualización ha funcionado, 1 si ha fallado el update de los datos, 2 si ha fallado la subida de la nueva imagen, 3 si han fallado ambas cosas
         */
        public function update_portada(){
            // Actualizamos todos los campos de la tabla (menos la imagen)
            $titulo_web = $_REQUEST["titulo_web"];
            $subtitulo_visita_libre = $_REQUEST["subtitulo_visita_libre"];
            $subtitulo_visita_guiada = $_REQUEST["subtitulo_visita_guiada"];
            $subtitulo_puntos_destacados = $_REQUEST["subtitulo_puntos_destacados"];
            $subtitulo_biblioteca = $_REQUEST["subtitulo_biblioteca"];
            $show_biblioteca = $_REQUEST["show_biblioteca"];
            $show_historia = $_REQUEST["show_historia"];
            $color_fuente = $_REQUEST["color_fuente"];
            $nombre_fuente = $_REQUEST["nombre_fuente"];

            
            $this->db->query("UPDATE opciones_portada "
                            . "SET titulo_web = '$titulo_web', "
                                . "subtitulo_visita_libre = '$subtitulo_visita_libre', "
                                . "subtitulo_visita_guiada = '$subtitulo_visita_guiada', "
                                . "subtitulo_puntos_destacados = '$subtitulo_puntos_destacados', "
                                . "subtitulo_biblioteca = '$subtitulo_biblioteca', "
                                . "show_biblioteca = '$show_biblioteca', "
                                . "show_historia = '$show_historia', "
                                . "color_fuente = '$color_fuente', "
                                . "nombre_fuente = '$nombre_fuente' WHERE 1=1");
                    
            if ($this->db->affected_rows() != 0)
                $resultado_update = 0;  // Update correcto
            else
                $resultado_update = 1;  // Error en update

            // Actualizamos la imagen
            $userpic = "portada.jpg";  // Nombre del archivo de imagen

            $config['upload_path'] = 'assets/imagenes/portada/';
            $config['allowed_types'] = 'jpg';
            $config['file_name'] = $userpic;

            // Cargar la librería
            $this->load->library('upload', $config);
            
            // Renombra el archivo actual (añadiéndole el string "-backup")
            $imagen_borrar = "assets/imagenes/portada/portada.jpg";
            rename($imagen_borrar, $imagen_borrar."-backup");
            
            $resultado_subida = $this->upload->do_upload('imagenweb');

            if ($resultado_subida == false) {
                // ¡¡La subida del fichero ha fallado!!
                // Restauramos la imagen anterior
                rename($imagen_borrar."-backup", $imagen_borrar);
                $resultado_imagen = 2;  // Error en subida de imagen
            } else {
                // ¡¡La subida del fichero ha sido un éxito!!
                // Borramos el fichero antiguo
                unlink($imagen_borrar."-backup");
                // NO actualizamos nada en la BD porque el campo imagen_portada no se está usando
                // (la imagen de la portada siempre se llama portada.jpg)
                // Modificamos el registro en la base de datos
                $resultado_imagen = 0;   // Sin error en la subida de imagen
            }
            return $resultado_imagen + $resultado_update;
        }
            
            
            
            
       
       
    }
        
       
        
        
?> 