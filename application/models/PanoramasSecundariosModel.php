<?php 
    class PanoramasSecundariosModel extends CI_Model {

        public function insertSecondaryPanoramas($id){
            $resultado = array();
            $arrayImagenes = $_FILES['file']; //array de las imagenes
            $numImagenes = count($arrayImagenes['name']); //numero de imagenes
            /****************************************** */
            $arrayPosts = $_POST; //array de los inputs texto y fecha del formulario
            $longitudPosts = count($arrayPosts); //numero de inputs
            $posts = array(); //array posts

            $k=0;
            foreach($_POST as $nombre_campo => $valor){ //VALORES DE TODOS LOS INPUTS TEXT Y FECHAS
                $posts[$k] = $valor; //almaceno todos los valores de los inputs (titulo y fecha)
                $k++;
            }

            $j=0;
            for($i=0;$i<$numImagenes;$i++){
                $titulo_pan_sec = $posts[$j];
                $fechatop = $posts[$j+1];


                // Cambiamos el nombre de la imagen de carga	(le asignamos como nombre el id seguido de .jpg)
                
                $resul = $this->db->query("SELECT MAX(id_panorama_secundario) AS maxid FROM panoramas_secundarios;");
                $id_pan_sec = $resul->row()->maxid+1;
                $userpic = $id_pan_sec . ".jpg";
                $upload_path = 'assets/imagenes/panoramasSecundarios/'.$userpic;
                
            if(move_uploaded_file($arrayImagenes['tmp_name'][$i],$upload_path)){
                $this->db->query("INSERT INTO panoramas_secundarios VALUES ($id_pan_sec,$id,'$titulo_pan_sec','$fechatop','$upload_path',null,null,null);"); //Insertamos la nueva imagen
            
                
            
                // Redimensionamos la imagen con la libreria imagen_lib de CodeIgniter
                $config['image_library'] = 'gd2';
                $config['source_image'] = $upload_path;
                $config['create_thumb'] = TRUE;
                $config['maintain_ratio'] = TRUE;
                $config['new_image'] = 'assets/imagenes/panoramasSecundarios/';  
                $config['width'] = 1200;
                $this->load->library('image_lib', $config);
                
                $resultado[$i] = 1;

            }
            
            else{
                $resultado[$i] = 0;
            }
            if (!$this->image_lib->resize()) {
                    // Ha ocurrido un error al redimensionar la imagen
                    $resultado[$i] = 0;  // Marca de error
                }

                $this->image_lib->clear();
                $j+=2;
            }

            return $resultado;
            
        }
    }
?>
