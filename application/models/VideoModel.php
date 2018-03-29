<?php

class VideoModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function insertarvideo($desc, $url) {

        $r;
        $insrt = "insert into video (url_vid,desc_vid)values('$url','$desc')";
        $r = $this->db->query($insrt);
        return $r;
    }

    public function buscarvideo() {

        $sel = "select * from video";
        $res = $this->db->query($sel);
        $tabla = array();
        foreach ($res->result_array() as $fila) {
            $tabla[] = $fila;
        }
        return $tabla;
        echo $tabla;
    }
	public function relacion($id){
		$s="select clickHandlerFunc from hotspots where clickHandlerFunc='video' and clickHandlerArgs='$id'";
		$r=$this->db->query($s);
		if ($r->num_rows() > 0) {
			return true;
	}else return false;
	}

    public function borrarvideo($id_vid) {
        $del = "delete from video where id_vid='$id_vid'";
        $r = $this->db->query($del);
        return $r;
    }

    public function modificarvideo($id) {
        $url = $this->input->post_get("url_vid");
        $desc = $this->input->post_get("desc_vid");
        $s = "select url_vid from video where id_vid='$id'";
        $n = $this->db->query($s);

        $del = "update video set url_vid='$url', desc_vid='$desc' where id_vid='$id'";
        $r = $this->db->query($del);

        return $r;
    }
	public function buscarvid($a, $b) {
        $sel = "select * from video limit $a,$b";
        $res = $this->db->query($sel);
        $tabla = array();
        foreach ($res->result_array() as $fila) {
            $tabla[] = $fila;
        }
        return $tabla;
    }
	 public function buscar(){
        $sel = "select count(*) from video";
        $res = $this->db->query($sel);
        $tabla = array();
        foreach ($res->result_array() as $fila) {
            $tabla[] = $fila;
            
        }
        $res=$tabla[0]["count(*)"];
        return $res;

        }
    public function buscaridvideo($id) {

        $sel = "select * from video where id_vid='$id'";
        $a = $this->db->query($sel);
        $tabla = array();
        foreach ($a->result_array() as $fila) {
            $tabla[] = $fila;
        }

        return $tabla;
    }
	 public function buscar_ajaxvid($abuscar) {
       
        $this->db->select('*');

        
        if ($abuscar != "") $this->db->like('desc_vid', $abuscar);

        $resultados = $this->db->get('video');

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

}

?>