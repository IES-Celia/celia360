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
            $res = $this->db->query("SELECT * FROM opciones_portada ORDER BY id_opcion");
            return $res->result_array();
        }
        
        /**
         * Actualiza en la base de datos las opciones de la portada.
         * Los datos se reciben por POST.
         * 
         */
        public function update_portada(){
            // Actualizamos todos los campos de la tabla (menos la imagen)
            $titulo_web = $this->input->get_post("titulo_web");
            $subtitulo_visita_libre = $this->input->get_post("subtitulo_visita_libre");
            $subtitulo_visita_guiada = $this->input->get_post("subtitulo_visita_guiada");
            $subtitulo_puntos_destacados = $this->input->get_post("subtitulo_puntos_destacados");
            $subtitulo_biblioteca = $this->input->get_post("subtitulo_biblioteca");
            $show_biblioteca = $this->input->get_post("show_biblioteca");
            $show_historia = $this->input->get_post("show_historia");
            $color_fuente = $this->input->get_post("color_fuente");
            $nombre_fuente = $this->input->get_post("nombre_fuente");
            $ascensor_mapa = $this->input->get_post("ascensor_mapa");
            $text_historia = $this->input->post_get("texto_panel_historia",FALSE);
            $meta_descripcion = $this->input->post_get("meta_descripcion");
            $meta_titulo = $this->input->post_get("meta_titulo");
            $personas_creditos = $this->input->post_get("personas_creditos");
            $creditos_adicionales = $this->input->post_get("creditos_adicionales");
            $propietario_web = $this->input->post_get("propietario_web");

            $contador_update = 0; //Contador del total de Update que se han realizado correctamente

            $this->db->query("UPDATE opciones_portada SET opcion_valor = '".$titulo_web."' WHERE id_opcion = 0");
            if ($this->db->affected_rows() != 0){
                $contador_update++;
            }
            $this->db->query("UPDATE opciones_portada SET opcion_valor = '".$subtitulo_visita_libre."' WHERE id_opcion = 2");
            if ($this->db->affected_rows() != 0){
                $contador_update++;
            }
            $this->db->query("UPDATE opciones_portada SET opcion_valor = '".$subtitulo_visita_guiada."' WHERE id_opcion = 3");
            if ($this->db->affected_rows() != 0){
                $contador_update++;
            }
            $this->db->query("UPDATE opciones_portada SET opcion_valor = '".$subtitulo_puntos_destacados."' WHERE id_opcion = 4");
            if ($this->db->affected_rows() != 0){
                $contador_update++;
            }
            $this->db->query("UPDATE opciones_portada SET opcion_valor = '".$subtitulo_biblioteca."' WHERE id_opcion = 5");
            if ($this->db->affected_rows() != 0){
                $contador_update++;
            }
            $this->db->query("UPDATE opciones_portada SET opcion_valor = '".$show_biblioteca."' WHERE id_opcion = 6");
            if ($this->db->affected_rows() != 0){
                $contador_update++;
            }
            $this->db->query("UPDATE opciones_portada SET opcion_valor = '".$show_historia."' WHERE id_opcion = 7");
            if ($this->db->affected_rows() != 0){
                $contador_update++;
            }
            $this->db->query("UPDATE opciones_portada SET opcion_valor = '".$nombre_fuente."' WHERE id_opcion = 8");
            if ($this->db->affected_rows() != 0){
                $contador_update++;
            }
            $this->db->query("UPDATE opciones_portada SET opcion_valor = '".$color_fuente."' WHERE id_opcion = 9");
            if ($this->db->affected_rows() != 0){
                $contador_update++;
            }
            $this->db->query("UPDATE opciones_portada SET opcion_valor = '".$ascensor_mapa."' WHERE id_opcion = 11");
            if ($this->db->affected_rows() != 0){
                $contador_update++;
            }
        

            /*Por cuestiones de compatibilidad con antiguas versiones, realizamos un delete y despues un insert*/
            $this->db->where('id_opcion', '13');
            $this->db->delete('opciones_portada');

            $data = array(
                'id_opcion' => '13',
                'opcion' => 'text_historia',
                'opcion_valor' => $text_historia
            );
        
            $this->db->insert('opciones_portada', $data);

            /*Por cuestiones de compatibilidad con antiguas versiones, realizamos un delete y despues un insert*/
            $this->db->where('id_opcion', '14');
            $this->db->delete('opciones_portada');

            $data = array(
                'id_opcion' => '14',
                'opcion' => 'meta_descripcion',
                'opcion_valor' => $meta_descripcion
            );
        
            $this->db->insert('opciones_portada', $data);

            /*Por cuestiones de compatibilidad con antiguas versiones, realizamos un delete y despues un insert*/
            $this->db->where('id_opcion', '15');
            $this->db->delete('opciones_portada');

            $data = array(
                'id_opcion' => '15',
                'opcion' => 'meta_titulo',
                'opcion_valor' => $meta_titulo
            );

            $this->db->insert('opciones_portada', $data);

            $this->db->where('id_opcion', '16');
            $this->db->delete('opciones_portada');

            $data = array(
                'id_opcion' => '16',
                'opcion' => 'personas_creditos',
                'opcion_valor' => $personas_creditos
            );
        
            $this->db->insert('opciones_portada', $data);

            if ($this->db->affected_rows() != 0){
                $contador_update++;
            }               

            /*Por cuestiones de compatibilidad con antiguas versiones, realizamos un delete y despues un insert*/
            $this->db->where('id_opcion', '17');
            $this->db->delete('opciones_portada');

            $data = array(
                'id_opcion' => '17',
                'opcion' => 'propietario_web',
                'opcion_valor' => $propietario_web
            );

            $this->db->insert('opciones_portada', $data);

            if ($this->db->affected_rows() != 0){
                $contador_update++;
            }               

            //Comprobamos que el numero de update sea correcto
            if ($contador_update > 0){
                $resultado_update = 0;  // Update correcto (0)
            }else{
                $resultado_update = 1;  // Error en update (1)
            }

            // Actualizamos la imagen de la portada
            if($_FILES['nueva_imagen_web']['name'] != null) {
                $nueva_imagen_fondo = $_FILES["nueva_imagen_web"]["name"];  // Nombre del archivo de imagen
                $config['upload_path'] = 'assets/imagenes/portada/';
                $config['allowed_types'] = 'jpg|png';
                $config['file_name'] = $nueva_imagen_fondo;
                $config['overwrite'] = TRUE;
    
                // Cargar la librería
                $this->load->library('upload', $config);
                
                $resultado_subida = $this->upload->do_upload('nueva_imagen_web');
    
                if ($resultado_subida == false) {
                    // ¡¡La subida del fichero ha fallado!!
                    echo $this->upload->display_errors();
                    $resultado_imagen = 1;  // Error en subida de imagen
                } else {
                    // ¡¡La subida del fichero ha sido un éxito!!
                    // Modificamos el registro en la base de datos
                    $sql = "UPDATE opciones_portada SET opcion_valor = '".$nueva_imagen_fondo."' WHERE id_opcion = 1";
                    $this->db->query($sql);
                    if ($this->db->affected_rows() == 0) {
                        $resultado_imagen = 1;  // Marca de error al actualizar
                    } else {
                        $resultado_imagen = 0;  // Subida de nueva imagen OK
                    }
                }
            }else{
                $resultado_imagen = 0; //No se a subido ninguna imagen de fondo 
            }

            // Actualizamos la imagen del logo
            if($_FILES['nuevo_logo_web']['name'] != null) {
                $nuevo_icono = $_FILES["nuevo_logo_web"]["name"];  // Nombre del archivo de imagen
                $config['upload_path'] = 'assets/imagenes/portada/';
                $config['allowed_types'] = 'jpg|png';
                $config['file_name'] = $nuevo_icono;
                $config['overwrite'] = TRUE;
    
                // Cargar la librería
                $this->load->library('upload', $config);
                
                $resultado_subida = $this->upload->do_upload('nuevo_logo_web');
    
                if ($resultado_subida == false) {
                    // ¡¡La subida del fichero ha fallado!!
                    echo $this->upload->display_errors();
                    $resultado_logo = 1;  // Error en subida de imagen
                } else {
                    // ¡¡La subida del fichero ha sido un éxito!!
                    // Modificamos el registro en la base de datos
                    $sql = "UPDATE opciones_portada SET opcion_valor = '".$nuevo_icono."' WHERE id_opcion = 10";
                    $this->db->query($sql);
                    if ($this->db->affected_rows() == 0) {
                        $resultado_logo = 1;  // Marca de error al actualizar BD
                    } else {
                        $resultado_logo = 0;  // Subida de nueva imagen OK
                    }
                }
            }else{
                $resultado_logo = 0; //No se a subido ninguna imagen de icono  
            }
            
            // Actualizamos la imagen del mapa
            if($_FILES['nueva_imagen_mapa']['name'] != null) {
                $nueva_imagen_mapa = $_FILES["nueva_imagen_mapa"]["name"];  // Nombre del archivo de imagen del mapa
                $config['upload_path'] = 'assets/imagenes/mapa/';
                $config['allowed_types'] = 'jpg|png';
                $config['file_name'] = $nueva_imagen_mapa;
                $config['overwrite'] = TRUE;
    
                // Cargar la librería
                $this->load->library('upload', $config);
                
                $resultado_subida = $this->upload->do_upload('nueva_imagen_mapa');
    
                if ($resultado_subida == false) {
                    // ¡¡La subida del fichero ha fallado!!
                    echo $this->upload->display_errors();
                    $resultado_mapa = 1;  // Error en subida de imagen
                } else {
                    // ¡¡La subida del fichero ha sido un éxito!!
                    // Modificamos el registro en la base de datos
                    $sql = "UPDATE opciones_portada SET opcion_valor = '".$nueva_imagen_mapa."' WHERE id_opcion = 12";
                    $this->db->query($sql);
                    if ($this->db->affected_rows() == 0) {
                        $resultado_mapa = 1;  // Marca de error al actualizar BD
                    } else {
                        $resultado_mapa = 0;  // Subida de nueva imagen OK
                    }
                }
            }else{
                $resultado_mapa = 0; //No se a subido ninguna imagen de fondo 
            }

            // Actualización de la Portada de visita guiada
            if($_FILES['nueva_imagen_guiada']['name'] != null) {
                $nueva_imagen_guiada = $_FILES["nueva_imagen_guiada"]["name"];  // Nombre del archivo de imagen
                $config['upload_path'] = 'assets/imagenes/generales/';
                $config['allowed_types'] = 'jpg|png';
                $config['file_name'] = $nueva_imagen_guiada;
                $config['overwrite'] = TRUE;

                // Cargar la librería
                $this->load->library('upload', $config);
                    
                $resultado_subida = $this->upload->do_upload('nueva_imagen_guiada');

                if ($resultado_subida == false) {
                    // ¡¡La subida del fichero ha fallado!!
                    echo $this->upload->display_errors();
                    $resultado_imagen = 1;  // Error en subida de imagen
                } else {
                    // ¡¡La subida del fichero ha sido un éxito!!
                    // Modificamos el registro en la base de datos
                    $this->db->where('id_opcion', '18');
                    $this->db->delete('opciones_portada');
         
                     $data = array(
                         'id_opcion' => '18',
                         'opcion' => 'fondo_visita_guiada',
                         'opcion_valor' => $nueva_imagen_guiada
                     );
        
                    $this->db->insert('opciones_portada', $data);
                }
            }

            // Fin de Portada de visita guiada
            return $resultado_update."-".$resultado_imagen."-".$resultado_logo."-".$resultado_mapa;
        }

    }
?> 