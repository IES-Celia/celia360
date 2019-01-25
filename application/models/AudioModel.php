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

class AudioModel extends CI_Model {
 /**
     * Constructor.
     * 
     * Carga llas librerias  que se van a usar a lo largo de los métodos de la clase.
     */
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
// inserta los audios en la base de datos y copia  los audios (archivo)al servidor
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
    /**
     * Busca todos los audios en la base de datos y los guarda en un array 
     * 
     * @return $tabla, nos devuelve todos los registros de la tabla "audio" 
     * @author: María Dolores Salmeron Sierra  
     */
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
    
  // esta funcion cuenta cuantos audios hay en la base de datos pero no la uso en la aplicacion
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
		/** esta funcion permite saber si el audio  esta relacionado con algun hotsot por lo cual no se permitira su borrado o modificacion**/
	public function relacion($id){
		$s="select clickHandlerFunc from hotspots where clickHandlerFunc='musica' and clickHandlerArgs='$id'";
		$r=$this->db->query($s);
		if ($r->num_rows() > 0) {
			return true;
	}else return false;
	}
// borra audio del servidor y de la base de datos.
    public function borraraud($id_aud) {
        $s = "select url_aud from audio where id_aud='$id_aud'";
        $res = $this->db->query($s);
        $nom = $res->result_array()[0]["url_aud"];
        unlink($nom);
        $del = "delete from audio where id_aud='$id_aud'";
        $alter = "alter table audio auto_increment=1;";
        $r = $this->db->query($del);
        $resultado = $this->db->affected_rows();
        $this->db->query($alter);

        return $resultado;
    }
// permite modifical el audio y cambiar sus datos de entrada en la base de datos
    public function modificaraud($id) {
        $url = $this->input->post_get("url_aud");
        $desc = $this->input->post_get("desc_aud");
        $tipo = $this->input->post_get("tipo_aud");

        $del = "update audio set desc_aud='$desc', tipo_aud='$tipo' where id_aud='$id'";
        $r = $this->db->query($del);
        return $r;
    }
// borra el audio especificado y devuelve una lista de todos los audios disponibles en el servidor/basedatos
    public function buscaridaud($id) {

        $sel = "select * from audio where id_aud='$id'";
        $res = $this->db->query($sel);
        $tabla = array();
        foreach ($res->result_array() as $fila) {
            $tabla[] = $fila;
        }

        return $tabla;
    }
// aqui comprobamos si el audio existe en el servidor antes de subirlo
    public function existeaud($n) {


        $s = "select url_aud from audio where url_aud='$n'";
        $a = $this->db->query($s);
        if ($a->num_rows())
            return true;
        else
            return false;
    }
	// esta funcion ya no la uso, la usaba para hacer la paginacion y el buscador antes de meter el plugin de loli
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