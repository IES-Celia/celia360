<?php

class AudM extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function insertaraud($desc, $tipo) {

        $r = "";

        $st = $_FILES["audio"]["name"];
        $f_def = "assets/audio/" . $_FILES["audio"]["name"];
        if (move_uploaded_file($_FILES['audio']['tmp_name'], $f_def)) {
            echo "El fichero es válido y se subió con éxito.\n";
            $insrt = "insert into audio (url_aud,desc_aud, tipo_aud)values('$f_def','$desc','$tipo')";
            $r = $this->db->query($insrt);
        } else {
            echo "¡Posible ataque de subida de ficheros!\n" . $_FILES["audio"]["error"];
        }

        return $r;
    }

    //ATENCIÓN CAMBIO LOLI
    public function buscaraudio() {
        $sel = "select * from audio";
        $res = $this->db->query($sel);
        $tabla = array();
        foreach ($res->result_array() as $fila) {
            $tabla[] = $fila;
        }
        return $tabla;
    }
    
    //FIN CAMBIO LOLI
    
    public function buscaraud($a, $b) {
        $sel = "select * from audio limit $a,$b";
        $res = $this->db->query($sel);
        $tabla = array();
        foreach ($res->result_array() as $fila) {
            $tabla[] = $fila;
        }
        return $tabla;
    }
     public function buscar(){
        $sel = "select count(*) from audio";
        $res = $this->db->query($sel);
        $tabla = array();
        foreach ($res->result_array() as $fila) {
            $tabla[] = $fila;
            
        }
        $res=$tabla[0]["count(*)"];
        return $res;

        }

    public function borraraud($id_aud) {
        $s = "select url_aud from audio where id_aud='$id_aud'";
        $res = $this->db->query($s);
        $nom = $res->result_array()[0]["url_aud"];
        unlink($nom);
        $del = "delete from audio where id_aud='$id_aud'";
        $alter = "alter table audio auto_increment=1;";
        $r = $this->db->query($del);
        $this->db->query($alter);

        return $r;
    }

    public function modificaraud($id) {
        $url = $this->input->post_get("url_aud");
        $desc = $this->input->post_get("desc_aud");
        $tipo = $this->input->post_get("tipo_aud");
        
        $url1 = "assets/audio/" . $url . ".mp4";

        $s = "select url_aud from audio where id_aud='$id'";
        $res = $this->db->query($s);
        $n = $res->result_array()[0]["url_aud"];
        rename($n, $url1);
        $del = "update audio set url_aud='$url1', desc_aud='$desc', tipo_aud='$tipo' where id_aud='$id'";
        $r = $this->db->query($del);

        return $r;
    }

    public function buscaridaud($id) {

        $sel = "select * from audio where id_aud='$id'";
        $res = $this->db->query($sel);
        $tabla = array();
        foreach ($res->result_array() as $fila) {
            $tabla[] = $fila;
        }

        return $tabla;
    }

    public function existeaud($n) {


        $s = "select url_aud from audio where url_aud='$n'";
        $a = $this->db->query($s);
        if ($a->num_rows())
            return true;
        else
            return false;
    }
 public function buscar_ajaxaud($abuscar) {
       
        $this->db->select('*');

        
        if ($abuscar != "") $this->db->like('desc_aud', $abuscar);

        $resultados = $this->db->get('audio');

        //si existe algún resultado lo devolvemos
        if ($resultados->num_rows() > 0) {

            $lista = array();
            foreach ($resultados->result_array() as $fila) {
                $lista[] = $fila;
            }
            return $lista;

            //en otro caso devolvemos false
        } else {

            return false;
        }       
        
    }    
//NO BORRAR QUE ME HACE FALTA PARA LA GUIADA
    public function allAudios() {

        $sel = "select * from audio";
        $res = $this->db->query($sel);
        $tabla = array();
        foreach ($res->result_array() as $fila) {
            $tabla[] = $fila;
        }
        return $tabla;
    }
   
      
}

?>