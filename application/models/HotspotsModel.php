<?php
class HotspotsModel extends CI_Model {
        
    public function __construct() {
        
        parent::__construct();
        $this->load->model("Modeloescenas");
        $this->load->model("UsuarioModel");
    }

    public function buscarHotspots() {

        $res = $this->db->query("SELECT * FROM hotspots");
        $tabla = array();
        foreach ($res->result_array() as $fila) {
            $tabla[] = $fila;
        }
        return $tabla;
    }

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

        // insercción del punto en la tabla hotspot
        $insrt = "INSERT INTO hotspots (id_hotspot,pitch,yaw,cssClass,clickHandlerFunc,clickHandlerArgs,sceneId,targetPitch,targetYaw,tipo) VALUES('$idhotspot','$pitch' ,'$yaw','$cssClass', '$clickHandlerFunc','$clickHandlerArgs','$sceneId','$targetPitch','$targetYaw','$tipo')";
        $this->db->query($insrt);

        // insercción de la relación (del jotpoch y la escena para que el json pueda salir) en la tabla escenas_hotspots 
        // lo primero es recuperar el id de la escena a partir del cod_escena y luego ya el insert

        $cadenaconsulta = "SELECT id_escena FROM escenas WHERE cod_escena='" . $id_scene . "'";
        $res2 = $this->db->query($cadenaconsulta)->result_array()[0]["id_escena"];

        $insrt2 = "INSERT INTO escenas_hotspots (id_escena, id_hotspot) VALUES ($res2,$idhotspot);";

        $this->db->query($insrt2);

        return $this->db->affected_rows();
    }

    public function modificarPitchYaw($pitch, $yaw, $idhotspot) {
        $this->db->query("UPDATE hotspots SET pitch=" . $pitch . ", yaw=" . $yaw . " WHERE id_hotspot=" . $idhotspot);
    }

    public function modificarPitchYawEscena($pitch, $yaw, $codescena) {
        $this->db->query("UPDATE escenas SET pitch=" . $pitch . ", yaw=" . $yaw . " WHERE cod_escena='" . $codescena . "'");
    }
    
    public function modificarTargetsHotspot($pitch, $yaw, $codescena, $idhotspot){
        $this->db->query("UPDATE hotspots SET targetPitch=" . $pitch . ", targetYaw=" . $yaw . " WHERE id_hotspot='" . $idhotspot . "'");
    }

    public function modificarpuntovideo($id, $vid) {
        $this->db->query("UPDATE hotspots SET clickHandlerArgs=" . $vid . " WHERE id_hotspot='" . $id . "'");
        return $this->db->affected_rows();
    }

///loli
    public function modificarpuntoaudio($id, $aud) {
        $this->db->query("UPDATE hotspots SET clickHandlerArgs=" . $aud . " WHERE id_hotspot='" . $id . "'");
        return $this->db->affected_rows();
    }
    
    public function borrarHotspot($id) {
        $this->db->query("DELETE FROM hotspots WHERE id_hotspot = '$id'");
        $this->db->query("DELETE FROM escenas_hotspots WHERE id_hotspot = '$id'");

        return $this->db->affected_rows();
    }

    public function buscarUnHotspot($id) {
        $res = $this->db->query("SELECT * FROM hotspots WHERE id_hotspot='$id' ");
        return $res->result_array();
    }

    public function modificarHotspot($id) {
        
        $id_hotspot = $this->input->post_get("id_hotspot");
        $sceneId = $this->input->post_get("sceneId");
        $cerrado_destacado = $this->input->post_get("cerrado_destacado");   

        $sql ="UPDATE hotspots SET sceneId='$sceneId', cerrado_destacado='$cerrado_destacado'
				 WHERE id_hotspot='$id_hotspot'";
        $this->db->query($sql);

        return $this->db->affected_rows();
    }

    public function modificarHotspotPanel($id) {

        $id_hotspot = $this->input->post_get("id_hotspot");
        $pitch = $this->input->post_get("pitch");
        $yaw = $this->input->post_get("yaw");
        $cssClass = $this->input->post_get("cssClass");
        $titulo_panel = $this->input->post_get("titulo_panel");
        $texto_panel = $this->input->post_get("texto_panel");

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
      
    public function insertarHotspotPanel() {

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
        $texto = $this->input->post_get("texto"); //
        // insercción del punto en la tabla hotspot
        $insrt = "INSERT INTO hotspots (id_hotspot,pitch,yaw,cssClass,clickHandlerFunc,clickHandlerArgs,tipo,titulo_panel,texto_panel) VALUES(' $idhotspot','$pitch' ,'$yaw','$cssClass', '$clickHandlerFunc','$clickHandlerArgs','$tipo','$titulo','$texto')";
        $this->db->query($insrt);

        // insercción de la relación (del jotpoch y la escena para que el json pueda salir) en la tabla escenas_hotspots 
        // lo primero es recuperar el id de la escena a partir del cod_escena y luego ya el insert

        $cadenaconsulta = "SELECT id_escena FROM escenas WHERE cod_escena='" . $id_scene . "'";
        $res2 = $this->db->query($cadenaconsulta)->result_array()[0]["id_escena"];

        $insrt2 = "INSERT INTO escenas_hotspots (id_escena, id_hotspot) VALUES ($res2,$idhotspot);";

        $this->db->query($insrt2);
        //
        $devoler = array($idhotspot, $id_scene);
        return $devoler;
    }

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
        $contador = 0;

        foreach ($listaArray as $imagen_id) {
            $sql = "INSERT INTO panel_imagenes (id_hotspot,id_imagen)VALUES('$id_hotspot','$imagen_id')";
            $this->db->query($sql);
            if ($this->db->affected_rows() > 0) {
                $contador = $contador + 1;
            }
        }
        $devolver = array($contador, $idescena);
        return $devolver;
    }

    //Aqui deberia deberia ser un parametro pero al no estar funcionando he puesto un numero fijo para hacer pruebas.
    public function cargar_imagenes_panel($id) {

        $id_hotspot = $id;
        //Sacar todas las imagenes que tiene asociadas ese ID que le hemos pasado
        $res = $this->db->query("
        SELECT 
        hotspots.titulo_panel,
        hotspots.texto_panel,
        imagenes.* 
        FROM imagenes 
        INNER JOIN panel_imagenes 
        ON panel_imagenes.id_imagen = imagenes.id_imagen
        INNER JOIN hotspots
        ON panel_imagenes.id_hotspot = hotspots.id_hotspot
        WHERE panel_imagenes.id_hotspot='$id_hotspot'");
        //Array donde guardamos todos los ids de imagenes.
        $lista_info_imagenes = $res->result_array();
        echo json_encode($lista_info_imagenes);
    }

    public function cargar_video($id) {

        $id_hotspot = $id;
        //Sacar todas las imagenes que tiene asociadas ese ID que le hemos pasado
        $sql = "SELECT url_vid FROM video WHERE id_vid='$id_hotspot'";
        $resultado = $this->db->query($sql);
        echo ($resultado);
    }

    public function insertarHotspotVideo() {

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
        $insrt = "INSERT INTO hotspots (id_hotspot,pitch,yaw,cssClass,tipo,clickHandlerFunc,clickHandlerArgs,sceneId)"
                . " VALUES(' $idhotspot','$pitch' ,'$yaw','$cssClass' ,'$tipo', '$clickHandlerFunc','$clickHandlerArgs','$id_scene')";
        $this->db->query($insrt);

        // insercción de la relación (del jotpoch y la escena para que el json pueda salir) en la tabla escenas_hotspots 
        // lo primero es recuperar el id de la escena a partir del cod_escena y luego ya el insert

        $cadenaconsulta = "SELECT id_escena FROM escenas WHERE cod_escena='" . $id_scene . "'";
        $res2 = $this->db->query($cadenaconsulta)->result_array()[0]["id_escena"];

        $insrt2 = "INSERT INTO escenas_hotspots (id_escena, id_hotspot) VALUES ($res2,$idhotspot);";

        $this->db->query($insrt2);

        return $this->db->affected_rows();
    }

    public function cargar_audio($id) {

        $id_hotspot = $id;
        //Sacar todas las imagenes que tiene asociadas ese ID que le hemos pasado
        $sql = "SELECT url_aud FROM audio WHERE id_aud='$id_hotspot'";
        $resultado = $this->db->query($sql);
        $resultado->result_array();
        echo json_encode($resultado);
    }

    public function insertarHotspotAudio() {

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

        $cadenaconsulta = "SELECT id_escena FROM escenas WHERE cod_escena='" . $id_scene . "'";
        $res2 = $this->db->query($cadenaconsulta)->result_array()[0]["id_escena"];

        $insrt2 = "INSERT INTO escenas_hotspots (id_escena, id_hotspot) VALUES ($res2,$idhotspot);";

        $this->db->query($insrt2);

        return $this->db->affected_rows();
    }

    //Sacar el id del ultimo hotspot.
    public function ultimo_hotspot() {
        
        $res = $this->db->query("SELECT id_hotspot FROM hotspots ORDER BY id_hotspot DESC LIMIT 1")->result_array()[0]["id_hotspot"];
        return $res;
    }

    // saca la escena de un punto... importante por no tener el cod_escena en el hotspot    
    public function cargar_codigo_escena($idhotspot) {

        $sql = "SELECT id_escena FROM escenas_hotspots WHERE id_hotspot=" . $idhotspot;
        $res = $this->db->query($sql)->result_array()[0]["id_escena"];
        $sql2 = "SELECT cod_escena FROM escenas WHERE id_escena=" . $res;
        $res = $this->db->query($sql2)->result_array()[0]["cod_escena"];
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

}