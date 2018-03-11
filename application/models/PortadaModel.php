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
            $imagenweb = $_REQUEST["imagenweb"];
            // toda la paranoia de subir imagen
        }
            

    }

?> 