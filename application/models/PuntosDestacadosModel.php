<?php

class PuntosDestacadosModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function ocultar_fila($id_fila){
        $this->db->query("UPDATE fila_pd SET id_fila=.$id_fila. WHERE mostrar='0'");
        $this->db->query("DELETE celda_p WHERE fila_asociada=.$id_fila");
    }
    
    public function mostrar_fila($id_fila){
        $this->db->query("UPDATE fila_pd SET id_fila=.$id_fila. WHERE mostrar='1'");
    }
    
    public function crear_celda($id_fila){
        $res = $this->db->query("SELECT COUNT(id_celda) FROM celda_pd WHERE fila_asociada=.$id_fila.")->result_array()[0]["COUNT(id_celda)"];
        
        if($res<4){
            $res = $this->db->query("SELECT id_celda FROM celda_pd ORDER BY id_celda DESC LIMIT 1")->result_array()[0]["id_celda"];
            $id_celda = $res+1;
            $escena_celda= $_REQUEST["escena_celda"];
            $imagen_celda = $_REQUEST["imagen_celda"];
            $titulo_celda = $_REQUEST["titulo_celda"];

            $insrt = "INSERT INTO celda_pd (id_celda,escena_celda,fila_asociada,imagen_celda,titulo_celda) 
                      VALUES(' $id_celda','$escena_celda' ,'$id_fila','$imagen_celda', '$titulo_celda')";	
        }else{
            echo "ya has excedido el numero maximo de celdas por fila";
        }
    }
    
    public function borrar_celda($id){
        $this->db->query("DELETE FROM celda_pd WHERE id_celda = '$id'");
    }
     
    public function getAll() {
        $sql = "SELECT * FROM celda_pd AS C
                INNER JOIN fila_pd AS F ON C.fila_asociada = F.id_fila
                ORDER BY C.fila_asociada, C.id_celda";
        $result = $this->db->query($sql);
        $r = array();
        $r[0] = array();
        $r[1] = array();
        $r[2] = array();
        $r[3] = array();
        $r[4] = array();
        foreach ($result->fetch_array() as $fila) {
            $f = $fila["fila_asociada"];
            $r[$f][] = $fila;
        }
        return $r;
    }
    
        public function getAllMostrados() {
        $sql = "SELECT * FROM celda_pd AS C
                INNER JOIN fila_pd AS F ON C.fila_asociada = F.id_fila
                WHERE F.mostrar = 1
                ORDER BY C.fila_asociada, C.id_celda";
        $result = $this->db->query($sql);
        $r = array();
        $r[0] = array();
        $r[1] = array();
        $r[2] = array();
        $r[3] = array();
        $r[4] = array();
        foreach ($result->fetch_array() as $fila) {
            $f = $fila["fila_asociada"];
            $r[$f][] = $fila;
        }
        return $r;
    }
    
}
