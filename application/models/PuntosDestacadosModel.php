<?php

class PuntosDestacadosModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function info_celda($id_celda){
        $res = $this->db->query("SELECT * FROM celda_pd WHERE id_celda='$id_celda' ");
        return $res->result_array();
    }
   
    public function crear_celda(){
        $fila_asociada= $_REQUEST["fila_asociada"];
        
            $res = $this->db->query("SELECT id_celda FROM celda_pd ORDER BY id_celda DESC LIMIT 1")->result_array()[0]["id_celda"];
            $id_celda = $res+1;
            $escena_celda= $_REQUEST["escena_celda"];
            $imagen_celda = $_REQUEST["imagen_celda"];
            $titulo_celda = $_REQUEST["titulo_celda"];
            
            $insrt = "INSERT INTO celda_pd (id_celda,escena_celda,imagen_celda,titulo_celda,fila_asociada) 
                        VALUES(' $id_celda','$escena_celda' ,'$imagen_celda', '$titulo_celda',$fila_asociada)";	
            
            $this->db->query($insrt);
        
    }
    
    public function borrar_celda($id){
        $this->db->query("DELETE FROM celda_pd WHERE id_celda = '$id'");
    }
    
    public function editar_celda(){
        $id_celda = $_REQUEST["id_celda"];
        $escena_celda= $_REQUEST["escena_celda"];
        $imagen_celda = $_REQUEST["imagen_celda"];
        $titulo_celda = $_REQUEST["titulo_celda"];
        $fila_asociada= $_REQUEST["fila_asociada"];
        
        $this->db->query("UPDATE celda_pd SET 
                           escena_celda='$escena_celda',
                           imagen_celda='$imagen_celda',
                           titulo_celda='$titulo_celda',
                           fila_asociada='$fila_asociada'
                           WHERE id_celda='$id_celda'
                            ");
        return $this->db->affected_rows();
    }

    public function mover_celda($idcelda, $idfila){
        $res = $this->db->query("SELECT COUNT(id_celda) FROM celda_pd WHERE fila_asociada=$id_fila")->result_array()[0]["COUNT(id_celda)"];
        if($res<4){
            $this->db->query("UPDATE celda_pd SET fila_asociada=.$id_fila. WHERE id_celda=$idcelda");
        }else{
            return false;
        }
    }

    public function getAll() {
        $sql = "SELECT * FROM celda_pd";
        
        $result = $this->db->query($sql);
        $r = array();
        $r[0] = array();
        $r[1] = array();
        $r[2] = array();
        $r[3] = array();
        $r[4] = array();
        foreach ($result->result_array() as $fila) {
            $f = $fila["fila_asociada"];
            $r[$f][] = $fila;
        }
        return $r;
    }
}