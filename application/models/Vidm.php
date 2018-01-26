<?php
class Vidm extends CI_Model{
            public function __construct() {
                parent::__construct();
                $this->load->database();
            }

public function insertarvideo($desc, $url){
	
$r;
$insrt="insert into video (url_vid,desc_vid)values('$url','$desc')";
	$r=$this->db->query($insrt);
return $r;	
}
public function buscarvideo(){
	
	$sel="select * from video";
	$res = $this->db->query($sel);
        $tabla = array();
        foreach ($res->result_array() as $fila) {
                $tabla[] = $fila;
            }
	return $tabla;
        echo $tabla;

}
public function borrarvideo($id_vid){
	$del="delete from video where id_vid='$id_vid'";
	$alter="alter table video auto_increment=1;";
	$r=$this->db->query($del);
	$this->db->query($alter);
	
	return $r;
	
	}
public function modificarvideo($id){
	$url=$_REQUEST["url_vid"];
	$desc=$_REQUEST["desc_vid"];
	$s="select url_vid from video where id_vid='$id'";
	$n=$this->db->query($s);
	
	$del="update video set url_vid='$url', desc_vid='$desc' where id_vid='$id'";
	$r=$this->db->query($del);
	
	return $r;
}
public function buscaridvideo($id){
		
		$sel="select * from video where id_vid='$id'";
		$a= $this->db->query($sel);
		$tabla = array();
            foreach ($a->result_array() as $fila) {
                $tabla[] = $fila;
            }
	
		return $tabla;
}






}

?>