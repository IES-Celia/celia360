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

class ZonasModel extends CI_Model {

    public function getAll() {
        $sql = $this->db->query("SELECT * FROM pisos");
        $tabla = array();
        foreach ($sql->result_array() as $fila) {
            $tabla[] = $fila;
        }
        return $tabla;
    }

    public function insertarZonas($top_zona, $left_zona, $piso){
        $this->db->query("UPDATE pisos SET top_zona = '".$top_zona."' , left_zona = '".$left_zona."' WHERE piso = '".$piso."'");
        return $this->db->affected_rows();
    }
}
?>