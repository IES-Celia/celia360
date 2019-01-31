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

class VideoModel extends CI_Model {
/**
     * Constructor.
     * 
     * Carga llas librerias  que se van a usar a lo largo de los métodos de la clase.
     */
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
// inserta los videos en la base de datos devuelve true o false
    public function insertarvideo($desc, $url) {
        
        $r;
        $insrt = "insert into video (url_vid,desc_vid)values('$url','$desc')";
        $r = $this->db->query($insrt);
        return $r;
    }
// busca todos los videos en la base de datos y devuelve un array
    public function buscarvideo() {

        $sel = "select * from video";
        $res = $this->db->query($sel);
        $tabla = array();
        foreach ($res->result_array() as $fila) {
            $tabla[] = $fila;
        }
        return $tabla;
    }
	// verefica si el video esta relacionado con un hotspot devuelve fasle o true
	public function relacion($id){
		$s="select clickHandlerFunc from hotspots where clickHandlerFunc='video' and clickHandlerArgs='$id'";
		$r=$this->db->query($s);
		if ($r->num_rows() > 0) {
			return true;
	}else return false;
	}
//borra un video apartir de  su id
    public function borrarvideo($id_vid) {
        $del = "delete from video where id_vid='$id_vid'";
        $r = $this->db->query($del);
        return $r;
    }
// modifica los datos de un video
    public function modificarvideo($id) {
        $url = $this->input->post_get("url_vid");
        $desc = $this->input->post_get("desc_vid");
        $s = "select url_vid from video where id_vid='$id'";
        $n = $this->db->query($s);

        $del = "update video set url_vid='$url', desc_vid='$desc' where id_vid='$id'";
        $r = $this->db->query($del);

        return $r;
    }
	
	// cuenta el numero de videos disponibles en la base de datos
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
	// busca los datos de un video apartir de su id 
    public function buscaridvideo($id) {

        $sel = "select * from video where id_vid='$id'";
        $a = $this->db->query($sel);
        $tabla = array();
        foreach ($a->result_array() as $fila) {
            $tabla[] = $fila;
        }

        return $tabla;
    }
	/**	esta funcion no la uso ya en la aplicacion pero aqui se queda , sive para generar un buscador pero ya lo hicimos con un plugin mas facil*/
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