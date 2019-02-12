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
?>

<?php
defined('BASEPATH') OR exit('No se permite el acceso directo al script');
/**
 * Controlador de Hotspots.
 * 
 * Esta clase contiene todos los métodos del controlador del panel de administración de la tabla hotspots.
 * Permite insertar, eliminar, modificar y consultar la tabla hotspots.
 * @author Miguel Ángel López Segura 2018
 */  
class HotspotsModel extends CI_Model {
    /**
     * Constructor.
     * 
     * Carga los modelos que se van a usar a lo largo de los métodos de la clase.
     */      
    public function __construct() {  
        parent::__construct();
        $this->load->model("EscenasModel");
        $this->load->model("UsuarioModel");
    }
    
    /**
     * Saca un todos los hotspots.
     * 
     * @return Devuelve un array con todos los hotspots.
     */

    public function buscarHotspots() {

        $res = $this->db->query("SELECT * FROM hotspots");
        $tabla = array();
        foreach ($res->result_array() as $fila) {
            $tabla[] = $fila;
        }
        return $tabla;
    }
    
    /**
     * Metodo encargado de hacer la inserción de hotspot de tipo salto.
     * 
     */

    public function insertarHotspotEscena() {
        // esta consulta es para sacar el ultimo id y sumarle uno, evitando asi tener que poner AI en la bd
        $res = $this->db->query("SELECT id_hotspot FROM hotspots ORDER BY id_hotspot DESC LIMIT 1")->result_array()[0]["id_hotspot"];
        $idhotspot = $res + 1;
        
        $id_scene = $this->input->post_get("id_scene");
        $pitch = $this->input->post_get("pitch");
        $yaw = $this->input->post_get("yaw");
        $cssClass = $this->input->post_get("cssClass");
        $clickHandlerFunc = $this->input->post_get("clickHandlerFunc");
        $clickHandlerArgs = $this->input->post_get("clickHandlerArgs");
        $sceneId = $this->input->post_get("sceneId");
        $targetPitch = $this->input->post_get("targetPitch");
        $targetYaw = $this->input->post_get("targetYaw");
        $tipo = $this->input->post_get("tipo");
        $plantaDestino = $this->input->post_get("plantaDestino");
        // insercción del punto en la tabla hotspot
        $insrt = "INSERT INTO hotspots (id_hotspot,plantaDestino,pitch,yaw,cssClass,clickHandlerFunc,clickHandlerArgs,sceneId,targetPitch,targetYaw,tipo) VALUES('$idhotspot','$plantaDestino','$pitch' ,'$yaw','$cssClass', '$clickHandlerFunc','$clickHandlerArgs','$sceneId','$targetPitch','$targetYaw','$tipo')";
        $this->db->query($insrt);

        // insercción de la relación (del jotpoch y la escena para que el json pueda salir) en la tabla escenas_hotspots 
        // lo primero es recuperar el id de la escena a partir del cod_escena y luego ya el insert

        $cadenaconsulta = "SELECT id_escena FROM escenas WHERE cod_escena='" . $id_scene . "'";
        $res2 = $this->db->query($cadenaconsulta)->result_array()[0]["id_escena"];

        $insrt2 = "INSERT INTO escenas_hotspots (id_escena, id_hotspot) VALUES ($res2,$idhotspot);";

        $this->db->query($insrt2);

        return $this->db->affected_rows();
    }
    
    /**
     * Modifica las coordenadas de un hotspot dentro de la escena.
     *     
     * @param int $pitch Una de las coordenadas nuevas.
     * @param int $yaw Una de las coordenadas nuevas.
     * @param int $idhotspot El id del hotspot que se quiere modificar.
     * @return Retorna si se ha efectuado el cambio en la tabla de hotspot.
     */

    public function modificarPitchYaw($pitch, $yaw, $idhotspot) {
        $this->db->query("UPDATE hotspots SET pitch=" . $pitch . ", yaw=" . $yaw . " WHERE id_hotspot=" . $idhotspot);
        return $this->db->affected_rows();
    }

    /**
     * Modifica las coordenadas a la que se dirigirá la camara al entrar a una escena DESDE el mapa. 
     *     
     * @param int $pitch Una de las coordenadas nuevas.
     * @param int $yaw Una de las coordenadas nuevas.
     * @param int $codescena El id de la escena que se quiere modificar.
     * @return Retorna si se ha efectuado el cambio en la tabla de escena.
     */
    public function modificarPitchYawEscena($pitch, $yaw, $idescena, $id_pan_sec) {
		$devuelve = '';
		if($id_pan_sec == null){
			$this->db->query("UPDATE escenas SET pitch=" . $pitch . ", yaw=" . $yaw . " WHERE id_escena='" . $idescena . "'");
			$devuelve =  $this->db->affected_rows();
		}else{
			$this->db->query("UPDATE panoramas_secundarios SET pitch=" . $pitch . ", yaw=" . $yaw . " WHERE id_panorama_secundario ='" . $id_pan_sec . "'");
        	$devuelve = $this->db->affected_rows();
		}
        return $devuelve;
    }
    
    /**
     * Modifica las coordenadas a la que se dirigirá la camara al entrar a una escena DESDE un hotspot.
     *     
     * @param int $pitch Una de las coordenadas nuevas.
     * @param int $yaw Una de las coordenadas nuevas.
     * @param int $codescena xx
     * @param int $idhotspot El id del punto que se quiere modificar.
     */    
    public function modificarTargetsHotspot($pitch, $yaw, $codescena, $idhotspot){
        $this->db->query("UPDATE hotspots SET targetPitch=" . $pitch . ", targetYaw=" . $yaw . " WHERE id_hotspot='" . $idhotspot . "'");
    }
    
    /**
     * Modifica un hotspot de tipo de video cambiando el video.
     *     
     * @param int $id El id del hotspot que será modificado.
     * @param int $vid El nuevo video que enlazará el hotspot.
     * @return Retorna si se ha efectuado el cambio en la tabla de hotspot.
     */ 

    public function modificarpuntovideo($id, $vid) {
        $this->db->query("UPDATE hotspots SET clickHandlerArgs=" . $vid . " WHERE id_hotspot='" . $id . "'");
        return $this->db->affected_rows();
    }

    /**
     * Modifica un hotspot de tipo de audio cambiando el audio.
     *     
     * @param int $id El id del hotspot que será modificado.
     * @param int $aud El nuevo video que enlazará el hotspot.
     * @return Retorna si se ha efectuado el cambio en la tabla de hotspot.
     */ 
    public function modificarpuntoaudio($id, $aud) {
        $this->db->query("UPDATE hotspots SET clickHandlerArgs=" . $aud . " WHERE id_hotspot='" . $id . "'");
        return $this->db->affected_rows();
    }
    
     /**
     * Borra un hotspot
     *     
     * @param int $id El id del hotspot que será borrado.
     * @return Retorna si se ha efectuado el cambio en las tablas.
     */ 
    public function borrarHotspot($id) {
			$this->db->query("DELETE FROM hotspots WHERE id_hotspot = '$id'");
			$this->db->query("DELETE FROM escenas_hotspots WHERE id_hotspot = '$id'");

        return $this->db->affected_rows();
    }
    /**
     * Saca un hotspot concreto para modificarlo o borrarlo
     *     
     * @param int $id El id del hotspot.
     * @return Retorna si se ha efectuado el cambio en la tabla de hotspot.
     */ 
    public function buscarUnHotspot($id) {
        $res = $this->db->query("SELECT * FROM hotspots WHERE id_hotspot='$id' ");
        return $res->result_array();
    }

    /**
     * Modifica un hotspot, especialmente util para modificar si el hotspot puede o no salir en la visita de puntos destacados
     *     
     * @param int $id El id del hotspot que será modificado.
     * @return Retorna si se ha efectuado el cambio en la tabla de hotspot.
     */ 
    public function modificarHotspot($id) {
        
        $id_hotspot = $this->input->post_get("id_hotspot");
        $sceneId = $this->input->post_get("sceneId");
        $cerrado_destacado = $this->input->post_get("cerrado_destacado");   

        $sql ="UPDATE hotspots SET sceneId='$sceneId', cerrado_destacado='$cerrado_destacado'
				 WHERE id_hotspot='$id_hotspot'";
        $this->db->query($sql);

        return $this->db->affected_rows();
    }
    
    /**
     * Modifica un hotspot de tipo de panel informativo
     *     
     * @param int $id El id del hotspot que será modificado.
     * @return Retorna si se ha efectuado el cambio en la tabla de hotspot.
     */ 

    public function modificarHotspotPanel($id) {

        $id_hotspot = $this->input->post_get("id_hotspot");
        $pitch = $this->input->post_get("pitch");
        $yaw = $this->input->post_get("yaw");
        $cssClass = $this->input->post_get("cssClass");
        $titulo_panel = $this->input->post_get("titulo_panel");
        $texto_panel = $this->input->post_get("texto_panel",FALSE);

        $this->db->query("UPDATE hotspots
                    SET 
                          pitch='$pitch',
                          yaw='$yaw',
                          titulo_panel='$titulo_panel',
                          texto_panel='$texto_panel'
                    WHERE id_hotspot='$id_hotspot'");

        return $this->db->affected_rows();
    }

    ///////////////////////////ZYGIS - Cosas del CMS/////////////////////////

    public function get_imgs_asociadas_al_hotspot($id_hotspot){
        $resultado = $this->db->query("SELECT id_imagen FROM panel_imagenes WHERE id_hotspot='$id_hotspot' ORDER BY panel_imagenes.orden ASC")->result_array();
        return $resultado;

    }
	  
	// $tabla es un 0 o 1, si es 0 se inserta un hotspot en la escena principal
	// si es 1, se inserta un hotspot en la escena secundaria
    public function insertarHotspotPanel($tabla) {

        // esta consulta es para sacar el ultimo id y sumarle uno, evitando asi tener que poner AI en la bd
        $res = $this->db->query("SELECT id_hotspot FROM hotspots ORDER BY id_hotspot DESC LIMIT 1")->result_array()[0]["id_hotspot"];
        $idhotspot = $res + 1;

        $id_scene = $this->input->post_get("id_scene");
        $pitch = $this->input->post_get("pitch");
        $yaw = $this->input->post_get("yaw");
        $cssClass = $this->input->post_get("cssClass");
        $clickHandlerFunc = $this->input->post_get("clickHandlerFunc");
        $clickHandlerArgs = $this->input->post_get("clickHandlerArgs");
        $tipo = $this->input->post_get("tipo");
        //Panel
        $titulo = $this->input->post_get("titulo"); //
		$texto = $this->input->post_get("texto", FALSE); //
        //$documento = $this->input->post_get("documento");
        // insercción del punto en la tabla hotspot
        $nombreArchivo = $_FILES["documento"]["name"];
        if($nombreArchivo==""){
            $sql = "INSERT INTO hotspots (id_hotspot,pitch,yaw,cssClass,clickHandlerFunc,clickHandlerArgs,tipo,titulo_panel,texto_panel,documento_url) VALUES(' $idhotspot','$pitch' ,'$yaw','$cssClass', '$clickHandlerFunc','$clickHandlerArgs','$tipo','$titulo','$texto','ninguno')";
            $this->db->query($sql);
        } else {
            $filePath = 'assets/documentos-panel/';
            $nombreImagen="documento".$idhotspot;
            $config['upload_path'] = $filePath;
            $config['allowed_types'] = 'pdf';
            $config['file_name'] = $nombreImagen;
            $config['overwrite'] = TRUE;
            //cargar la librería
            $this->load->library('upload', $config);
            //Realiza la carga según las preferencias que ha establecido.
            $resultado_subida = $this->upload->do_upload('documento');

            if ($resultado_subida == false) {
                $malasuerte = $this->upload->display_errors("<i>", "</i>");
                var_dump($malasuerte);
                // $sql="DELETE FROM visita_guiada WHERE id_visita='$idEscena'";
                //$this->db->query($sql);
                $resultado = -1;
            } else {
                //Nombre de archivo proporcionado por el agente de usuario del cliente, antes de cualquier preparación o incremento de nombre de archivo
                $imgFile = $this->upload->data('client_name');
                //Nombre del archivo que se cargó, incluida la extensión de nombre de archivo
                $tmp_dir = $this->upload->data('file_name');
                $sql = "INSERT INTO hotspots (id_hotspot,pitch,yaw,cssClass,clickHandlerFunc,clickHandlerArgs,tipo,titulo_panel,texto_panel,documento_url) VALUES(' $idhotspot','$pitch' ,'$yaw','$cssClass', '$clickHandlerFunc','$clickHandlerArgs','$tipo','$titulo','$texto','$tmp_dir')";
                $this->db->query($sql);
                $resultado = 1;
            }
        }
        
        // insercción de la relación (del jotpoch y la escena para que el json pueda salir) en la tabla escenas_hotspots 
        // lo primero es recuperar el id de la escena a partir del cod_escena y luego ya el insert

		if ($tabla == '0'){
			$cadenaconsulta = "SELECT id_escena FROM escenas WHERE cod_escena='" . $id_scene . "'";
			$res2 = $this->db->query($cadenaconsulta)->result_array()[0]["id_escena"];
	
			$insrt2 = "INSERT INTO escenas_hotspots (id_escena, id_hotspot) VALUES ($res2,$idhotspot);";
	
			$this->db->query($insrt2);
			//
			$devoler = array($idhotspot, $id_scene);
		}else{
	
			$insrt2 = "INSERT INTO escenas_hotspots (id_hotspot, id_panorama_secundario) VALUES ($idhotspot, '$id_scene');";
	
			$this->db->query($insrt2);
			//
			$devoler = array($idhotspot, $id_scene);
		}

        
        return $devoler;
    }
    
    /**
     * Inserta un hotspot de tipo de escalera
     *     
     */ 

    public function insertarHotspotEscalera() {

        // esta consulta es para sacar el ultimo id y sumarle uno, evitando asi tener que poner AI en la bd
        $res = $this->db->query("SELECT id_hotspot FROM hotspots ORDER BY id_hotspot DESC LIMIT 1")->result_array()[0]["id_hotspot"];
        $idhotspot = $res + 1;

        $id_scene = $this->input->post_get("id_scene");
        $pitch = $this->input->post_get("pitch");
        $yaw = $this->input->post_get("yaw");
        $cssClass = $this->input->post_get("cssClass");
        $clickHandlerFunc = $this->input->post_get("clickHandlerFunc");
        // insercción del punto en la tabla hotspot
        $insrt = "INSERT INTO hotspots (id_hotspot,pitch,yaw,cssClass,clickHandlerFunc) 
            VALUES(' $idhotspot','$pitch' ,'$yaw','$cssClass', '$clickHandlerFunc')";
        $this->db->query($insrt);

        // insercción de la relación (del jotpoch y la escena para que el json pueda salir) en la tabla escenas_hotspots 
        // lo primero es recuperar el id de la escena a partir del cod_escena y luego ya el insert

        $cadenaconsulta = "SELECT id_escena FROM escenas WHERE cod_escena='" . $id_scene . "'";
        $res2 = $this->db->query($cadenaconsulta)->result_array()[0]["id_escena"];

        $insrt2 = "INSERT INTO escenas_hotspots (id_escena, id_hotspot) VALUES ($res2,$idhotspot);";

        $this->db->query($insrt2);

        return $idhotspot;
    }

    public function insertar_imagenes_hotspot() {

        $id_hotspot = $this->input->post_get("idhs");
        //Al ser un array string lo partimos por las comas.
        $listaArray = $this->input->post_get("listaimg");
        $idescena = $this->input->post_get("idescena");
        //$resultado = implode(",",$listaimagenes);
        $listaimagenes = explode($listaArray, ",");
        $orden = $this->input->post_get("listaorden");

        $contador = 0;

        //Comprobar si existe algo de antes
        $comprobar = "SELECT * FROM panel_imagenes WHERE id_hotspot='$id_hotspot'";
        $resultado = $this->db->query($comprobar);
        if($resultado->num_rows()>0){
            //al modificar borramos todos y lo reenviamos
            $borrado = "DELETE FROM panel_imagenes WHERE id_hotspot='$id_hotspot'";
            $this->db->query($borrado);
        }
        
        //Ahora añadir
        foreach ($listaArray as $imagen_id) {
            $sql = "INSERT INTO panel_imagenes (id_hotspot,id_imagen,orden)VALUES('$id_hotspot','$imagen_id','$orden[$contador]')";
            $this->db->query($sql);
            if ($this->db->affected_rows() > 0) {
                $contador = $contador + 1;
            }
        }
        $devolver = array($contador, $idescena);
        return $devolver;
    }

    public function cargar_imagenes_panel($id) {

        $id_hotspot = $id;
        //Sacar todas las imagenes que tiene asociadas ese ID que le hemos pasado
        $res = $this->db->query("
        SELECT 
        hotspots.titulo_panel,
        hotspots.texto_panel,
        hotspots.documento_url,
        imagenes.* 
        FROM imagenes 
        INNER JOIN panel_imagenes 
        ON panel_imagenes.id_imagen = imagenes.id_imagen
        INNER JOIN hotspots
        ON panel_imagenes.id_hotspot = hotspots.id_hotspot
        WHERE panel_imagenes.id_hotspot='$id_hotspot'
        ORDER BY panel_imagenes.orden");
        //Array donde guardamos todos los ids de imagenes.
        $lista_info_imagenes = $res->result_array();
        echo json_encode($lista_info_imagenes);
    }

    public function cargar_video($id) {

        $id_hotspot = $id;
        //Sacar todas las imagenes que tiene asociadas ese ID que le hemos pasado
        $sql = "SELECT url_vid FROM video WHERE id_vid='$id_hotspot'";
        $resultado = $this->db->query($sql)->result_array()[0]["url_vid"];
        return $resultado;
    }
    /**
     * Inserta un hotspot de tipo video 
     * @return Retorna si se ha efectuado el cambio en la tabla de hotspot.
     */ 
    public function insertarHotspotVideo($tabla) {

        // esta consulta es para sacar el ultimo id y sumarle uno, evitando asi tener que poner AI en la bd
        $res = $this->db->query("SELECT id_hotspot FROM hotspots ORDER BY id_hotspot DESC LIMIT 1")->result_array()[0]["id_hotspot"];
        $idhotspot = $res + 1;

        $id_scene = $this->input->post_get("id_scene");
        $pitch = $this->input->post_get("pitch");
        $yaw = $this->input->post_get("yaw");
        $cssClass = $this->input->post_get("cssClass");
        $tipo = $this->input->post_get("tipo");
        $clickHandlerFunc = $this->input->post_get("clickHandlerFunc");
        $clickHandlerArgs = $this->input->post_get("clickHandlerArgs");

        // insercción del audio en la tabla hotspot
        $insrt = "INSERT INTO hotspots (id_hotspot,pitch,yaw,cssClass,tipo,clickHandlerFunc,clickHandlerArgs)"
                . " VALUES(' $idhotspot','$pitch' ,'$yaw','$cssClass' ,'$tipo', '$clickHandlerFunc','$clickHandlerArgs')";
        $this->db->query($insrt);

        // insercción de la relación (del jotpoch y la escena para que el json pueda salir) en la tabla escenas_hotspots 
        // lo primero es recuperar el id de la escena a partir del cod_escena y luego ya el insert

		if($tabla == 0){
			$cadenaconsulta = "SELECT id_escena FROM escenas WHERE cod_escena='" . $id_scene . "'";
			$res2 = $this->db->query($cadenaconsulta)->result_array()[0]["id_escena"];
			$insrt2 = "INSERT INTO escenas_hotspots (id_escena, id_hotspot) VALUES ($res2,$idhotspot);";
			$this->db->query($insrt2);
		}else{
			$insrt2 = "INSERT INTO escenas_hotspots (id_panorama_secundario, id_hotspot) VALUES ('$id_scene',$idhotspot);";
			$this->db->query($insrt2);
		}
        

        return $this->db->affected_rows();
    }
    /**
     * Obtiene la ruta y el nombre del audio correspondiente con el id pasado por parámetro
     * 
     * @param int $id El id del audio
     * @return devuelve la url del audio   
     */
    public function cargar_audio($id) {

        $id_hotspot = $id;
        //Sacar la ruta donde se encuentra el audio con el id que le hemos pasado
        $sql ="SELECT url_aud FROM audio WHERE id_aud='$id_hotspot'";
        $resultado = $this->db->query($sql)->result_array()[0]["url_aud"];
        echo $resultado;
    }

    /**
     * Inserta un hotspot de tipo audio 
     * @return Retorna si se ha efectuado el cambio en la tabla de hotspot.
	 * @param int $tabla si es 0 insertamos un hotspot que pertenece a un panorama secundario, si es 1 pertenece a una escena principal
     */ 
    public function insertarHotspotAudio($tabla) {

        // esta consulta es para sacar el ultimo id y sumarle uno, evitando asi tener que poner AI en la bd
        $res = $this->db->query("SELECT id_hotspot FROM hotspots ORDER BY id_hotspot DESC LIMIT 1")->result_array()[0]["id_hotspot"];
        $idhotspot = $res + 1;

        $id_scene = $this->input->post_get("id_scene");
        $pitch = $this->input->post_get("pitch");
        $yaw = $this->input->post_get("yaw");
        $cssClass = $this->input->post_get("cssClass");
        $tipo = $this->input->post_get("tipo");
        $clickHandlerFunc = $this->input->post_get("clickHandlerFunc");
        $clickHandlerArgs = $this->input->post_get("clickHandlerArgs");

        // insercción del audio en la tabla hotspot
        $insrt = "INSERT INTO hotspots (id_hotspot,pitch,yaw,cssClass,tipo,clickHandlerFunc,clickHandlerArgs)"
                . " VALUES(' $idhotspot','$pitch' ,'$yaw','$cssClass' ,'$tipo', '$clickHandlerFunc','$clickHandlerArgs')";
        $this->db->query($insrt);

        // insercción de la relación (del jotpoch y la escena para que el json pueda salir) en la tabla escenas_hotspots 
        // lo primero es recuperar el id de la escena a partir del cod_escena y luego ya el insert

		if ($tabla == 0){
			$cadenaconsulta = "SELECT id_escena FROM escenas WHERE cod_escena='" . $id_scene . "'";
			$res2 = $this->db->query($cadenaconsulta)->result_array()[0]["id_escena"];
			$insrt2 = "INSERT INTO escenas_hotspots (id_escena, id_hotspot) VALUES ($res2,$idhotspot);";
			$this->db->query($insrt2);
		}else{
			$insrt2 = "INSERT INTO escenas_hotspots (id_panorama_secundario, id_hotspot) VALUES ('$id_scene',$idhotspot);";
			$this->db->query($insrt2);
		}


        return $this->db->affected_rows();
    }

    //Sacar el id del ultimo hotspot.
    public function ultimo_hotspot() {
        
        $res = $this->db->query("SELECT id_hotspot FROM hotspots ORDER BY id_hotspot DESC LIMIT 1")->result_array()[0]["id_hotspot"];
        return $res;
    }

    // saca la escena de un punto... importante por no tener el cod_escena en el hotspot, esto deja de tener sentido con la unificación de cod_escena e id_escena   
	// $tabla vale 0 si es un hotspot escena principal y 1 si es una escena secundaria
	public function cargar_codigo_escena($idhotspot, $tabla) {

		if($tabla == 0){
			$sql = "SELECT id_escena FROM escenas_hotspots WHERE id_hotspot=" . $idhotspot;
			$res = $this->db->query($sql)->result_array()[0]["id_escena"];
			$sql2 = "SELECT cod_escena FROM escenas WHERE id_escena=" . $res;
			$res = $this->db->query($sql2)->result_array()[0]["cod_escena"];
		}else{
			$sql = "SELECT id_panorama_secundario FROM escenas_hotspots WHERE id_hotspot=" . $idhotspot;
			$res = $this->db->query($sql)->result_array()[0]["id_panorama_secundario"];
			$sql2 = "SELECT id_panorama_secundario FROM panoramas_secundarios WHERE id_panorama_secundario= '".$res."'";
			$res = $this->db->query($sql2)->result_array()[0]["id_panorama_secundario"];
		}
		return $res;
        
    }

    public function process_insert_hotspot() {
        $pitch = $this->input->post_get("pitch");
        $yaw = $this->input->post_get("yaw");
        $cssClass = $this->input->post_get("cssClass");
        $tipo = $this->input->post_get("tipo");
        $clickHandlerFunc = $this->input->post_get("clickHandlerFunc");
        $clickHandlerArgs = $this->input->post_get("clickHandlerArgs");
        $res = $this->db->query("SELECT id_hotspot FROM hotspots ORDER BY id_hotspot DESC LIMIT 1")->result_array()[0]["id_hotspot"];
        $idhotspot = $res + 1;
        
        $insrt = "INSERT INTO hotspots (id_hotspot,pitch,yaw,cssClass,clickHandlerFunc,clickHandlerArgs,tipo) VALUES('$idhotspot','$pitch','$yaw','$cssClass','$clickHandlerFunc','$clickHandlerArgs','$tipo')";
        $this->db->query($insrt);
        return $this->db->affected_rows();
    }

    public function getAllDocumentos(){
        $resultado = $this->db->query("SELECT documento_url FROM panel_informacion");
        $tabla = array();
        foreach ($resultado->result_array() as $fila) {
            $tabla[] = $fila;
        }
        return $tabla;

    }

}

?>
