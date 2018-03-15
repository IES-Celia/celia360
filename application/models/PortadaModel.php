<?php 

    class PortadaModel extends CI_Model {
        
        public function info_portada(){
            $res = $this->db->query("SELECT * FROM portada");
            return $res->result_array();
        }
        
        public function editar_titulo(){
            $tituloweb = $_REQUEST["tituloweb"];
            $this->db->query("UPDATE portada SET tituloweb='$tituloweb'");
            return $this->db->affected_rows();

        }
        
        public function editar_imagen(){
            //cambiar el nombre de la imagen de carga	
            $userpic = "portada.jpg";

            $config['upload_path'] = 'assets/imagenes/portada/';
            $config['allowed_types'] = 'jpg';
            $config['file_name'] = $userpic;

            //cargar la librería
            $this->load->library('upload', $config);
            
            //Realiza la carga según las preferencias que ha establecido.
            $imagen_borrar = "assets/imagenes/portada/portada.jpg";
            unlink($imagen_borrar);
            
            $resultado_subida = $this->upload->do_upload('imagenweb');

            if ($resultado_subida == false) {
                // ¡¡La subida del fichero ha fallado!!
                echo "coliflor";
                $resultado[0] = false;
                $resultado[1] = $this->upload->display_errors("<i>", "</i>");
                // Borramos el registro que habíamos creado vacío (solo con el ID)
                $this->db->query("DELETE FROM portada WHERE imagenweb = '$imagenweb'");
            } else {
                // ¡¡La subida del fichero ha sido un éxito!!
                //Para devolver un elemento de la matriz: $this->upload->data('client_name'); 
                //Nombre de archivo proporcionado por el agente de usuario del cliente, antes de cualquier preparación o incremento de nombre de archivo
                
                $imgFile = $this->upload->data('client_name');
                //Nombre del archivo que se cargó, incluida la extensión de nombre de archivo
                $tmp_dir = $this->upload->data('file_name');
                // Modificamos el registro en la base de datos
                $resultado[0] = true;
            }
        }

    }

?> 