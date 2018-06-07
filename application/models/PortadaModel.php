<?php

/*
    Este archivo es parte de la aplicación web Celia360. 

    Celia 360 es software libre: usted puede redistribuirlo y/o modificarlo
    bajo los términos de la GNU General Public License tal y como está publicada por
    la Free Software Foundation en su versión 3.
 
    Celia 360 se distribuye con el propósito de resultar útil,
    pero SIN NINGUNA GARANTÍA de ningún tipo. 
    Véase la GNU General Public License para más detalles.

    Puede obtener una copia de la licencia en <http://www.gnu.org/licenses/>.
*/


    class PortadaModel extends CI_Model {
        
        public function get_info_portada(){
            $res = $this->db->query("SELECT * FROM opciones_portada");
            return $res->result_array();
        }
        
        /**
         * Actualiza en la base de datos las opciones de la portada.
         * Los datos se reciben por POST.
         * 
         * @return int en binario: 000 (0) = actualización OK, 001 (1) = error en update, 010 (2) = error en subida de imagen, 100 (4) = error en update de imagen
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
                $resultado_update = 0;  // Update correcto (000)
            else
                $resultado_update = 1;  // Error en update (001)

            // Actualizamos la imagen

            $userpic = $_FILES["nueva_imagen_web"]["name"];  // Nombre del archivo de imagen
            $config['upload_path'] = 'assets/imagenes/portada/';
            $config['allowed_types'] = 'jpg';
            $config['file_name'] = $userpic;
            $config['overwrite'] = TRUE;

            // Cargar la librería
            $this->load->library('upload', $config);
            
            $resultado_subida = $this->upload->do_upload('nueva_imagen_web');

            if ($resultado_subida == false) {
                // ¡¡La subida del fichero ha fallado!!
                echo $this->upload->display_errors();
                $resultado_imagen = 2;  // Error en subida de imagen (010)
            } else {
                // ¡¡La subida del fichero ha sido un éxito!!
                // Modificamos el registro en la base de datos
                $sql = "UPDATE opciones_portada SET imagen_web = '$userpic' WHERE 1=1";
                $this->db->query($sql);
                if ($this->db->affected_rows() == 0) {
                    $resultado_imagen = 4;  // Marca de error al actualizar BD (100)
                } else {
                    $resultado_imagen = 0;  // Subida de nueva imagen OK (000)
                }
            }
            return $resultado_imagen + $resultado_update;
        }  
    }
?> 