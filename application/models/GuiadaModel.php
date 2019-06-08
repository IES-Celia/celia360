
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

    public function crearEscenaGuiada ($id_visita_guiada) {

        $cod_escena = $this->input->post_get('escenaGuiada');
        $audio_escena = $this->input->post_get('audioGuiada');
		$titulo_escena = $this->input->post_get('tituloGuiada');

        if(empty($cod_escena) || empty($audio_escena)){
            return -1;    
        }

        //El orden se hace automaticamente despues ordenas como te de la gana.
		$total = $this->db->count_all('estancias_guiada');

        //$total = $total+1; 

        $sql = "INSERT INTO estancias_guiada (id_estancia,cod_escena,audio_escena,titulo_escena,orden, id_visita_guiada) VALUES(NULL,'$cod_escena','$audio_escena','$titulo_escena','$total', '$id_visita_guiada');";
        //print_r($sql);
		$this->db->query($sql);

        return $this->db->affected_rows();
    }

  /** 
     * Carga todas las escenas en order ascendente
     *
    */

    public function allEscenasGuiada($id){
        $sql = "SELECT * FROM estancias_guiada WHERE id_visita_guiada = $id ORDER BY orden ASC;";
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

	//lastEstanciaGuiada
    public function lastEscenaGuiada() {
            $resultado = $this->db->query("SELECT id_estancia FROM estancias_guiada ORDER BY id_estancia DESC LIMIT 1")->result_array()[0]["id_estancia"];
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
            $resultado = -2;
        } else if ($resultado_subida == true) {
            //Nombre de archivo proporcionado por el agente de usuario del cliente, antes de cualquier preparación o incremento de nombre de archivo
            $imgFile = $this->upload->data('client_name');
            //Nombre del archivo que se cargó, incluida la extensión de nombre de archivo
            $tmp_dir = $this->upload->data('file_name');
            $sql="UPDATE estancias_guiada SET img_preview='$tmp_dir' WHERE id_estancia='$idEscena'";
            $this->db->query($sql);
            $resultado = 1;
        }else{
			$resultado = -1;
		}
        return $resultado;
    }

      /** 
     * Recibe un ID y borra esa escena
     * 
    */
    
    public function borrarEscenaGuiada($idEscena) {
        $sql="DELETE FROM estancias_guiada WHERE id_estancia='$idEscena'";
        $resultado = $this->db->query($sql);
        return $this->db->affected_rows();
    }

      /** 
     * Borra la imagen del servidor
     * 
    */

    public function borrarImagen($idEscena){
        $sql ="SELECT img_preview  FROM estancias_guiada WHERE id_estancia='$idEscena'";
        $resultado = $this->db->query($sql)->result_array()[0]["img_preview"];
		$enlace ="assets/imagenes/previews-guiada/" . $resultado;
		$retorno;
		if(unlink($enlace)){
			$retorno = 1;
		}else{
			$retorno = 0;
		}
		return $retorno;
    }

      /** 
     * Actualiza la escena guiada desde el panel de administracion
     * 
    */

    public function actualizarEscena($idEscena){
        $id_visita = $this->input->post_get("id");
        $cod_escena = $this->input->post_get("escena");
        $audio_escena = $this->input->post_get("audio");
        $titulo_escena = $this->input->post_get("titulo");

        $this->db->query("UPDATE estancias_guiada
				SET 
				    cod_escena='$cod_escena',
	                titulo_escena='$titulo_escena',
					audio_escena='$audio_escena' 
				WHERE id_estancia='$idEscena'");
		
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
	
	public function updateTable($arrayId, $orden, $id_visita_guiada){
		$devuelve = 0;
		for($i=0;$i<count($arrayId);$i++){
			$this->db->query("UPDATE estancias_guiada SET orden = '".$orden[$i]."' WHERE id_estancia = '".$arrayId[$i]."' AND id_visita_guiada = '$id_visita_guiada'");
			$devuelve += $this->db->affected_rows();
		}
		return $devuelve;
	}

	/**
	 * Función que devuelve todas las visitas guiadas.
	 */

	public function getAllPrincipalGuiada() {
		$query = $this->db->query("SELECT * FROM visitas_guiadas");
		return $query->result_array();
	}

	/**
	 * Función que se trae todos los datos de una visita guiada concreta
	 * @param id INT | Identificador de la visita guiada.
	 */

	public function getAllPrincipalGuiadaPerId($id) {
		$query = $this->db->query("SELECT * FROM visitas_guiadas WHERE id = $id");
		return $query->result_array();
	}

	/**
	 * Función que inserta una visita guiada con su nombre y descripción.
	 * Posteriormente se inserta en la base de datos.
	 */

	public function insertarVisitaGuiada() {
		$name = $this->input->get_post('nombre');
		$descr = $this->input->get_post('descripcion');
		
		$this->db->query("INSERT INTO visitas_guiadas VALUES (null, '$name', '$descr')");
		return $this->db->affected_rows();
	}

	/**
	 * Borrado por AJAX, se envia a través de una petición asíncrona un formulario con el id de la visita guiada
	 */

	public function borrarVisitaGuiada() {
		$id = $this->input->get_post('id');
		$this->db->query("DELETE FROM visitas_guiadas WHERE id = $id");
		return $this->db->affected_rows();	
	}

	/**
	 * Se trae de la base de datos todas las estancias ordenadas donde su id_visita_guiada = $id
	 * @param id INT identificador de la visita_guiada
	 */

	public function getAllEstanciasGuiada($id) {
		$res = $this->db->query("SELECT * FROM estancias_guiada WHERE id_visita_guiada = $id ORDER BY orden");
		return $res->result_array();
	}

	/**
	 * Realiza el proceso de actualización
	 */

	public function proccessUpdateVisitaGuiada() {
		$id = $this->input->get_post('id');
		$name = $this->input->get_post('nombre');
		$descr = $this->input->get_post('descripcion');

		$this->db->query("UPDATE visitas_guiadas SET nombre = '$name', descripcion = '$descr' WHERE id = '$id'");

		return $this->db->affected_rows();
	}

	/**
	 * Función que devuelve el número de estancias que pertenece a una visita en concreto.
	 * Si no contiene ninguna se borrara la visita guiada, si no, no se eliminará.
	 * @param id INT | identificador de la visita guiada.
	 */

	public function checkDeleteVisitaGuiada($id){
		$sql = $this->db->query("SELECT id_estancia FROM estancias_guiada WHERE id_visita_guiada = '$id'");
		return $sql->num_rows();
	}

}


?>
