
<?php

class GuiadaModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /** 
     * Recibe datos del formulario y crea la entrada en la base de datos
     * 
    */

    public function crearEscenaGuiada() {

        $cod_escena = $this->input->post_get('escenaGuiada');
        $audio_escena = $this->input->post_get('audioGuiada');
        $titulo_escena = $this->input->post_get('tituloGuiada');
        if(empty($cod_escena) || empty($audio_escena)){
            return -1;    
        }

        //El orden se hace automaticamente despues ordenas como te de la gana.
        $total = $this->db->count_all('visita_guiada');
        //$total = $total+1; 

        $sql = "INSERT INTO visita_guiada (id_visita,cod_escena,audio_escena,titulo_escena,orden) VALUES(NULL,'$cod_escena','$audio_escena','$titulo_escena','$total');";
        //print_r($sql);
        $this->db->query($sql);

        return $this->db->affected_rows();
    }

  /** 
     * Carga todas las escenas en order ascendente
     *
    */

    public function allEscenasGuiada(){
        $sql = "SELECT * FROM visita_guiada ORDER BY orden ASC;";
        $resultado = $this->db->query($sql);
        $array = array();
        foreach ($resultado->result_array() as $fila) {
            $array[] = $fila;
        }
        return $array;
    }

      /** 
     * Carga la ultima escena creada
     * 
    */

    public function lastEscenaGuiada() {

            $resultado = $this->db->query("SELECT id_visita FROM visita_guiada ORDER BY id_visita DESC LIMIT 1")->result_array()[0]["id_visita"];
            return $resultado;
        
    }

      /** 
     * Recibe una imagen del formulario y la sube al servidor 
     * 
    */

    public function asociarImagen($idEscena){

        $filePath = 'assets/imagenes/previews-guiada/';
        $nombreImagen="prev".$idEscena;
        $config['upload_path'] = $filePath;
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['file_name'] = $nombreImagen;
        $config['overwrite'] = TRUE;
       //cargar la librería
       $this->load->library('upload', $config);
       //Realiza la carga según las preferencias que ha establecido.
       $resultado_subida = $this->upload->do_upload('imagenPreview');

        if ($resultado_subida == false) {
            $malasuerte = $this->upload->display_errors("<i>", "</i>");
            $resultado = -1;
        } else {
            //Nombre de archivo proporcionado por el agente de usuario del cliente, antes de cualquier preparación o incremento de nombre de archivo
            $imgFile = $this->upload->data('client_name');
            //Nombre del archivo que se cargó, incluida la extensión de nombre de archivo
            $tmp_dir = $this->upload->data('file_name');
            $sql="UPDATE visita_guiada SET img_preview='$tmp_dir' WHERE id_visita='$idEscena'";
            $this->db->query($sql);
            $resultado = 1;
        }
        return $resultado;
    }

      /** 
     * Recibe un ID y borra esa escena
     * 
    */
    
    public function borrarEscenaGuiada($idEscena) {
        $sql="DELETE FROM visita_guiada WHERE id_visita='$idEscena'";
        $resultado = $this->db->query($sql);
        echo($sql);
        return $this->db->affected_rows();
    }

      /** 
     * Borra la imagen del servidor
     * 
    */

    public function borrarImagen($idEscena){
        $sql ="SELECT img_preview  FROM visita_guiada WHERE id_visita='$idEscena'";
        $resultado = $this->db->query($sql)->result_array()[0]["img_preview"];
        $enlace ="assets/imagenes/previews-guiada/" . $resultado;
        unlink($enlace);
    }

      /** 
     * Actualiza la escena guiada desde el panel de administracion
     * 
    */

    public function actualizarEscena($idEscena){
        $id_visita = $_REQUEST["id"];
        $cod_escena = $_REQUEST["escena"];
        $audio_escena = $_REQUEST["audio"];
        $titulo_escena = $_REQUEST["titulo"];

        $this->db->query("UPDATE visita_guiada
				SET 
				    cod_escena='$cod_escena',
	                titulo_escena='$titulo_escena',
					audio_escena='$audio_escena' 
				WHERE id_visita='$idEscena'");
		
        return $this->db->affected_rows();
    }

      /** 
     * 
     * DEPRICATED 
     * 
    */

    public function ordenarTabla(){
        $nombreColumna = $_POST['nombreColumna'];
        $orden = $_POST['orden'];

        $sql = "SELECT * FROM visita_guiada order by ".$nombreColumna." ".$orden." ";

        $resultado = $this->db->query($sql);
        $array = array();

        foreach ($resultado->result_array() as $fila) {
            $array[] = $fila;
        }

        return $array;
        
    }

  /** 
     * Intercambia dos filas por la superior o anterior
     * 
    */

    public function intercambiarFilas($filaAid,$filaApos,$filaBid,$filaBpos){

      
        $sql ="UPDATE visita_guiada SET orden='$filaBpos' WHERE id_visita='$filaAid'";
        $sql2 ="UPDATE visita_guiada SET orden='$filaApos' WHERE id_visita='$filaBid'";
        $resultado = $this->db->query($sql);
        $resultado2 = $this->db->query($sql2);
        
        return $this->db->affected_rows();

	}
	
	public function updateTable($arrayId, $orden){
		$devuelve = 0;
		for($i=0;$i<count($arrayId);$i++){
			$this->db->query("UPDATE visita_guiada SET orden = '".$orden[$i]."' WHERE id_visita = '".$arrayId[$i]."'");
			$devuelve += $this->db->affected_rows();
		}
		return $devuelve;
	}

}


?>
