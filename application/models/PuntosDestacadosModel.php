<?php

class PuntosDestacadosModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function getAll() {
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
