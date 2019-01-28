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

/**
 * Modelo de Tour.
 * 
 * Esta clase contiene todos los métodos del modelo que extrae un JSON necesario para que panellum funcion, de los datos de la tabla escenas y hotspots.
 * @author Miguel Ángel López Segura 2018
 */

class TourModel extends CI_Model {

  /*
  * Metodo que saca un json para la visita libre, con TODOS los hotspots y todas las escenas
  * @param int $datos El id de la celda que se utilizará en la consulta
  * @return el json de la visita libre
  */
  public function get_datos_libre($datos) {
	$this->load->database();

	$sql = "SELECT id_escena, cod_escena, pitch,yaw,panorama FROM escenas
	UNION
	SELECT null, id_panorama_secundario, pitch, yaw, panorama FROM panoramas_secundarios";
	$res =  $this->db->query($sql);
	$flagObj=false;
	$flagHot=false;
	$json = ' {"default": {"firstScene": "'.$datos['inicio']['escena_inicial'].'","sceneFadeDuration": 1000,"autoLoad": true,"showControls": false,"compass":false,"preview": "assets/imagenes/generales/preview22.png","hotSpotDebug": false },  "scenes": {';
	//$query->result_array() as $row
	
	foreach ($res->result_array() as $escena) {
		if($flagObj){ // con esta comprobacion pondrá coma entre objetos escenas sin ponerla en el primero
			$json = $json . ',';
		}
		$flagObj= true;
		$json = $json . ' "' .$escena['cod_escena'].'"'; 
		$json = $json . ': { ';
		$json = $json . '"hfov": 120,'; 
		$json = $json . '"pitch": '.$escena['pitch'].',';  
		$json = $json . '"yaw": '.$escena['yaw'].',';  
		$json = $json . '"type": "equirectangular",';   
		$json = $json . '"panorama": "'.$escena['panorama'].'",';  
		$json = $json . '"hotSpots": ['; // ese $escena[hotspot] no tiene sentido pero está gracioso        
				
		$sql = "SELECT * FROM hotspots INNER JOIN escenas_hotspots ON hotspots.id_hotspot = escenas_hotspots.id_hotspot WHERE escenas_hotspots.id_escena = '".$escena['id_escena']."'";
		$res2 =  $this->db->query($sql);
		foreach ($res2->result_array() as $hotspot) {
			if($flagHot){
				$json = $json . ',';
			}
			$flagHot= true;
			if($hotspot['tipo']=="info"){ // si es de info pues te mete to esto
				if($hotspot['cssClass']=="custom-hotspot-escaleras"){
					$json = $json . '{"pitch": '.$hotspot['pitch'].','; 
					$json = $json . '"yaw": '.$hotspot['yaw'].',';  
					$json = $json . '"type": "'.$hotspot['tipo'].'",'; 
					$json = $json . '"cssClass": "'.$hotspot['cssClass'].'",';  
					$json = $json . '"clickHandlerFunc": "'.$hotspot['clickHandlerFunc'].'"';   
					$json = $json . '} '; 
				}else{
					$json = $json . '{"pitch": '.$hotspot['pitch'].','; 
					$json = $json . '"yaw": '.$hotspot['yaw'].',';  
					$json = $json . '"type": "'.$hotspot['tipo'].'",'; 
					$json = $json . '"cssClass": "'.$hotspot['cssClass'].'",';  
					$json = $json . '"clickHandlerFunc": "'.$hotspot['clickHandlerFunc'].'",';  
					$json = $json . '"clickHandlerArgs": "'.$hotspot['clickHandlerArgs'].'"';
					$json = $json . '} '; 
				}
					
			}else{ // si es de escena pues te mete to esto
				$json = $json . '{"pitch": '.$hotspot['pitch'].','; 
				$json = $json . '"yaw": '.$hotspot['yaw'].',';  
				$json = $json . '"type": "'.$hotspot['tipo'].'",'; 
				$json = $json . '"sceneId": "'.$hotspot['sceneId'].'",'; 
				$json = $json . '"targetPitch": '.$hotspot['targetPitch'].',';  
				$json = $json . '"targetYaw": '.$hotspot['targetYaw'].','; 
				$json = $json . '"cssClass": "'.$hotspot['cssClass'].'",';  
				$json = $json . '"clickHandlerFunc": "'.$hotspot['clickHandlerFunc'].'",';  
				$json = $json . '"clickHandlerArgs": "'.$hotspot['clickHandlerArgs'].'"';
				$json = $json . '} ';  
			}
		}
		$flagHot=false;
		$json = $json . ']}';  
	}

	$json = $json . '}';  
	$json = $json . '}';  

	return $json;
  }
  
  /*
  * Metodo que saca un json para la visita guiada, SIN hotspots y todas las escenas
  * @param array $datos Array que trae información relativa al tour. En este caso nos interesa el campo inicio > escena inicial para generar el json correctamente
  * @return el json de la visita guiada
  */
   public function get_datos_guiada($datos) {
    $this->load->database();
    $sql = "SELECT * FROM escenas";
    $res = $this->db->query($sql);
    $flagObj=false;
    $flagHot=false;
    $json = ' {"default": {"firstScene": "'.$datos["inicio"]["escena_inicial"].'","sceneFadeDuration": 1000,"autoLoad": true,"showControls": false,"compass":false,"preview": "assets/imagenes/generales/preview22.png","hotSpotDebug": false }, "scenes": {';
    foreach ($res->result_array() as $escena) {
        if($flagObj){ // con esta comprobacion pondrá coma entre objetos escenas sin ponerla en el primero
            $json = $json . ',';
        }
        $flagObj= true;
        
        $json = $json . ' "' .$escena['cod_escena'].'"'; 
        $json = $json . ': { ';
        $json = $json . '"hfov": 120,'; 
        $json = $json . '"pitch": '.$escena['pitch'].',';  
        $json = $json . '"yaw": '.$escena['yaw'].',';  
        $json = $json . '"type": "equirectangular",';   
        $json = $json . '"panorama": "'.$escena['panorama'].'",';   
        $json = $json . '"hotSpots": ['; // ese $escena[hotspot] no tiene sentido pero está gracioso        
        
        
        $sql = "SELECT * FROM hotspots INNER JOIN escenas_hotspots ON hotspots.id_hotspot = escenas_hotspots.id_hotspot WHERE escenas_hotspots.id_escena = ".$escena['id_escena'];
        $res2 = $this->db->query($sql);
        foreach ($res2->result_array() as $hotspot) {
            
            
            if($hotspot['clickHandlerFunc']== "panelInformacion"){
                if($flagHot){
                $json = $json . ',';
                }
                $flagHot= true;
                    $json = $json . '{"pitch": '.$hotspot['pitch'].','; 
                    $json = $json . '"yaw": '.$hotspot['yaw'].',';  
                    $json = $json . '"type": "'.$hotspot['tipo'].'",'; 
                   /* $json = $json . '"cssClass": "'.$hotspot['cssClass'].'",';  */
                    $json = $json . '"text": "'.$hotspot['titulo_panel'].'"';
                    $json = $json . '} ';  
            }
        }
        $flagHot=false;
        $json = $json . ']}';  
    }

    $json = $json . '}';  
    $json = $json . '}';  
    return $json;
  }
    
  /*
  * Metodo que saca un json para los puntos destacados, con TODOS los hotspots MENOS los hotspots de tipo salto que limitan las zonas destacadas y todas las escenas
  * @param array $datos Array que trae información relativa al tour. En este caso nos interesa el campo inicio > escena inicial para generar el json correctamente
  * @return el json de los puntos destacados
  */
public function get_datos_destacado($datos) {
    $this->load->database();

    $sql = "SELECT * FROM escenas";
    $res =  $this->db->query($sql);
    $flagObj=false;
    $flagHot=false;
    $json = ' {"default": {"firstScene": "'.$datos["inicio"]["escena_inicial"].'","sceneFadeDuration": 1000,"autoLoad": true,"showControls": false,"compass":false,"preview": "assets/imagenes/generales/preview22.png","hotSpotDebug": false },  "scenes": {';
    //$query->result_array() as $row
    
    foreach ($res->result_array() as $escena) {
        if($flagObj){ // con esta comprobacion pondrá coma entre objetos escenas sin ponerla en el primero
            $json = $json . ',';
        }
        $flagObj= true;
        
        $json = $json . ' "' .$escena['cod_escena'].'"'; 
        $json = $json . ': { ';
        $json = $json . '"hfov": 120,'; 
        $json = $json . '"pitch": '.$escena['pitch'].',';  
        $json = $json . '"yaw": '.$escena['yaw'].',';  
        $json = $json . '"type": "equirectangular",';   
        $json = $json . '"panorama": "'.$escena['panorama'].'",';  
        $json = $json . '"hotSpots": ['; // ese $escena[hotspot] no tiene sentido pero está gracioso        
                
        $sql = "SELECT * FROM hotspots INNER JOIN escenas_hotspots ON hotspots.id_hotspot = escenas_hotspots.id_hotspot WHERE escenas_hotspots.id_escena = ".$escena['id_escena'];
        $res2 =  $this->db->query($sql);
        foreach ($res2->result_array() as $hotspot) {
            
            if($hotspot['tipo']=="info"){ // si es de INFO pues te mete to esto
                /*
                Quien entre en este territorio que acepte las consecuencias de sus actos.
                Descomentar esto permitirá la carga de los hotspots de tipo info (panel de información, audio, video0), tienes que meterle a la vista puntosdestacados todos los metodos de visita necesarios para que corran los hotspots correctamente. suerte
                if($hotspot['cssClass']=="custom-hotspot-escaleras"){ // si es de tipo escalera le mete esto:
                    if($flagHot){
                        $json = $json . ',';
                    }
                    $flagHot= true;
                    $json = $json . '{"pitch": '.$hotspot['pitch'].','; 
                    $json = $json . '"yaw": '.$hotspot['yaw'].',';  
                    $json = $json . '"type": "'.$hotspot['tipo'].'",'; 
                    $json = $json . '"cssClass": "'.$hotspot['cssClass'].'"';  
                    //$json = $json . '"clickHandlerFunc": "'.$hotspot['clickHandlerFunc'].'"';   
                    $json = $json . '} '; 
                }else{
                    if($flagHot){
                        $json = $json . ',';
                    }
                    $flagHot= true;
                    $json = $json . '{"pitch": '.$hotspot['pitch'].','; 
                    $json = $json . '"yaw": '.$hotspot['yaw'].',';  
                    $json = $json . '"type": "'.$hotspot['tipo'].'",'; 
                    $json = $json . '"cssClass": "'.$hotspot['cssClass'].'",';  
                    $json = $json . '"clickHandlerFunc": "'.$hotspot['clickHandlerFunc'].'",';  
                    $json = $json . '"clickHandlerArgs": "'.$hotspot['clickHandlerArgs'].'"';
                    $json = $json . '} '; 
                }
                 */
            }else{ // si es de saltoescena pues te mete to esto
                if($hotspot['cerrado_destacado']==0){
                    if($flagHot){
                        $json = $json . ',';
                    }
                    $flagHot= true;
                    $json = $json . '{"pitch": '.$hotspot['pitch'].','; 
                    $json = $json . '"yaw": '.$hotspot['yaw'].',';  
                    $json = $json . '"type": "'.$hotspot['tipo'].'",'; 
                    $json = $json . '"sceneId": "'.$hotspot['sceneId'].'",'; 
                    $json = $json . '"targetPitch": '.$hotspot['targetPitch'].',';  
                    $json = $json . '"targetYaw": '.$hotspot['targetYaw'].','; 
                    $json = $json . '"cssClass": "'.$hotspot['cssClass'].'"';  
                    //$json = $json . '"clickHandlerFunc": "'.$hotspot['clickHandlerFunc'].'",';  
                    //$json = $json . '"clickHandlerArgs": "'.$hotspot['clickHandlerArgs'].'"';
                    $json = $json . '} ';  
                }else{
                     if($flagHot){
                        $json = $json . '';
                    }
                }
            }
        }
        $flagHot=false;
        $json = $json . ']}';  
    }

    $json = $json . '}';  
    $json = $json . '}';  
    
    return $json;
  }
    
  /*
  * Metodo que saca un json para el modo personalizado de panellum utilizado para insertar hotspots, modificar pitch yaw...
  * @param int $escenaInicial El id de la escena en la que se saltará al cargar este json
  * @return el json de este pseudotour
  */    
    public function get_datos_plataforma($valor, $escenaInicial) {
		$devuelve = '';
		if($valor == 0){
	$this->load->database();

	$sql = "SELECT * FROM escenas";
    $res = $this->db->query($sql);
    $flagObj=false;
    $flagHot=false;
    $json = ' {"default": {"firstScene": "'.$escenaInicial.'","sceneFadeDuration": 1000,"autoLoad": true,"showControls": false,"compass":false,"preview": "preview22.png","hotSpotDebug": true },  "scenes": {';
    foreach ($res->result_array() as $escena) {
        if($flagObj){ // con esta comprobacion pondrá coma entre objetos escenas sin ponerla en el primero
				$json = $json . ',';
			}
			$flagObj= true;
			
			$json = $json . ' "' .$escena['cod_escena'].'"'; 
			$json = $json . ': { ';
			$json = $json . '"hfov": 120,'; 
			$json = $json . '"pitch": '.$escena['pitch'].',';  
			$json = $json . '"yaw": '.$escena['yaw'].',';  
			$json = $json . '"type": "equirectangular",';   
			$json = $json . '"panorama": "'.base_url("assets/imagenes/escenas/".$escena['cod_escena']).'.JPG",';
			$json = $json . '"hotSpots": ['; // ese $escena[hotspot] no tiene sentido pero está gracioso        
					
			$sql = "SELECT * FROM hotspots INNER JOIN escenas_hotspots ON hotspots.id_hotspot = escenas_hotspots.id_hotspot WHERE escenas_hotspots.id_escena = ".$escena['id_escena'];
			$res2 = $this->db->query($sql);
			foreach ($res2->result_array() as $hotspot) {
				if($flagHot){
					$json = $json . ',';
				}
				$flagHot= true;
				
				$json = $json . '{"pitch": '.$hotspot['pitch'].','; 
				$json = $json . '"yaw": '.$hotspot['yaw'].',';  
				$json = $json . '"type": "'.$hotspot['tipo'].'",'; 
				$json = $json . '"cssClass": "'.$hotspot['cssClass'].'",';  
				$json = $json . '"clickHandlerFunc": "modificarHotspot",';  
				$json = $json . '"clickHandlerArgs": "'.$hotspot['id_hotspot'].'"';
				$json = $json . '} '; 
			
			}
			$flagHot=false;
			$json = $json . ']}';  
		}

		$json = $json . '}';  
		$json = $json . '}';  
		$devuelve = $json;
	}else{
		$this->load->database();

		$sql = "SELECT * FROM panoramas_secundarios";
		$res = $this->db->query($sql);
		$flagObj=false;
		$flagHot=false;
		$json = ' {"default": {"firstScene": "'.$escenaInicial.'","sceneFadeDuration": 1000,"autoLoad": true,"showControls": false,"compass":false,"preview": "preview22.png","hotSpotDebug": true },  "scenes": {';
		foreach ($res->result_array() as $pan_sec) {
			if($flagObj){ // con esta comprobacion pondrá coma entre objetos escenas sin ponerla en el primero
					$json = $json . ',';
				}
				$flagObj= true;
				
				$json = $json . ' "' .$pan_sec['id_panorama_secundario'].'"'; 
				$json = $json . ': { ';
				$json = $json . '"hfov": 120,'; 
				$json = $json . '"pitch": '.$pan_sec['pitch'].',';  
				$json = $json . '"yaw": '.$pan_sec['yaw'].',';
				$json = $json . '"type": "equirectangular",';     
				$json = $json . '"panorama": "'.base_url($pan_sec['panorama']).'",';
				$json = $json . '"hotSpots": ['; // ese $escena[hotspot] no tiene sentido pero está gracioso        
						
				$sql = "SELECT * FROM hotspots INNER JOIN escenas_hotspots ON hotspots.id_hotspot = escenas_hotspots.id_hotspot WHERE escenas_hotspots.id_panorama_secundario = '".$pan_sec['id_panorama_secundario']."'";
				$res2 = $this->db->query($sql);
				foreach ($res2->result_array() as $hotspot) {
					if($flagHot){
						$json = $json . ',';
					}
					$flagHot= true;
					
					$json = $json . '{"pitch": '.$$hotspot['pitch'].','; 
					$json = $json . '"yaw": '.$hotspot['yaw'].',';  
					$json = $json . '"cssClass": "'.$hotspot['cssClass'].'",';  
					$json = $json . '"clickHandlerFunc": "modificarHotspot",';  
					$json = $json . '"clickHandlerArgs": "'.$hotspot['id_hotspot'].'"';
					$json = $json . '} '; 
				
				}
				$flagHot=false;
				$json = $json . ']}';  
			}
	
			$json = $json . '}';  
			$json = $json . '}';  
			$devuelve = $json;
	}
	return $devuelve;   
	}
  
}
?>
