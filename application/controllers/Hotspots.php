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
 * Controlador de Hotspot.
 * 
 * Esta clase contiene todos los métodos del controlador del panel de administración de la tabla hotspot.
 * Permite insertar, eliminar, modificar y consultar la tabla hotspot.
 * @author Miguel Ángel López Segura 2018
 */
class Hotspots extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model("hotspotsModel");
        $this->load->model("UsuarioModel");
		$this->load->model("MapaModel","mapa");
		$this->load->model('PanoramasSecundariosModel');
    }
    
    /**
     * Método por defecto del controlador.
     * 
     * No hay una vista principal de hotspots. Todas las vistas de hotspots se invocan desde la
     * vista principal de escenas, así que redirigimos allí.
     */
    public function index(){
        redirect("escenas");
    }

    /**
     * Muestra el formulario genérico de inserción de hotspots.
     * 
     * Cuando llegamos aquí, ya hemos seleccionado con la vista de pannellum el pitch y el yaw donde
     * queremos crear el hotspot.
     * 
     * @param double $pitch Coordenada pitch del hotspot
     * @param double $yaw Coordenada yaw del hotspot
     * @param String $idescena Código de la escena donde se creará el hotspot
     */
    
    public function show_insert_hotspot($pitch, $yaw, $idescena, $id_pan_sec = null) {
        //cargar los modelos
        $this->load->model("MapaModel","mapa");
        $this->load->model("AudioModel");
		$this->load->model("VideoModel", "Vidm");

		if($id_pan_sec == null){
			$datos['tabla'] = '0';
			$datos["id_scene"]= $idescena;
		}else{
			$datos['tabla'] = '1';
			$datos["id_scene"]= $id_pan_sec;
			//tambien paso a la vista el cod_escena de la vista principal
			//para que cuando inserte un nuevo hotspot, mostrar la vista
			//admin_pan_sec.php que para ello necesitamos el cod_escena
			$datos['escena_principal'] = $idescena;
		}

        //obtener los listados de audio y vídeo
        $datos["listaAudios"] = $this->AudioModel->buscaraudio();
        $datos["listaVideos"] = $this->Vidm->buscarvideo();

        $datos["documentos"]= $this->hotspotsModel->getAllDocumentos();
		$datos["pitch"]= $pitch;
        $datos["yaw"]= $yaw;
        $datos["mapa"] = $this->mapa->cargar_mapa();
        $datos["puntos"] = $this->mapa->cargar_puntos();
        $datos["vista"]="hotspots/insertHotspot";
        $datos["id_hotspot"] = $this->hotspotsModel->ultimo_hotspot()+1;
        $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
        $this->load->view('admin_template', $datos);
    }
    
    /**
     * Actualiza el pitch y el yaw de un hotspot.
     * 
     * Funciona con cualquier tipo de hotspot. Luego redirige a la vista de pannellum de la escena
     * para poder seguir modificando hotspots de esa escena.
     * 
     * @param double $pitch Nueva coordenada pitch del hotspot
     * @param double $yaw Nueva coordenada yaw del hotspot
     * @param String $idescena Código de la escena donde está el hotspot
     * @param int $idhotspot Código del hotspot que se va a modificar
     */
    
    public function update_hotspot_pitchyaw($pitch, $yaw, $idescena, $idhotspot) {
        $result = $this->hotspotsModel->modificarPitchYaw($pitch, $yaw, $idhotspot);
        if ($result == 1) $mensaje = "Hotspot modificado con éxito";
        else $mensaje = "Ha ocurrido un error al modificar el hotspot";
        redirect('escenas/cargar_escena/' . $idescena . '/_hotspot/');
        /*
        $datos["pitch"]= $pitch;
        $datos["yaw"]= $yaw;
        $datos["id_scene"]= $idescena;
        $datos["tablaEscenas"] = $this->EscenasModel->getAll();
        $datos["vista"]="escenas/Escenastable";
        $datos["mapa"] = $this->mapa->cargar_mapa();
        $datos["puntos"] = $this->mapa->cargar_puntos();
        $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
        $this->load->view('admin_template', $datos);
         */
    }
    
    /**
     * Actualiza el pitch y el yaw con el que se entra a una escena, es decir, el punto
     * al que se mira al entrar en esa escena.
     * 
     * Luego redirige a la vista pannellum para seguir modificando cosas en esa escena.
     * 
     * @param double $pitch Coordenada pitch
     * @param double $yaw Coordenada yaw
     * @param String $codescena Código de escena
     */
    public function update_escena_pitchyaw($pitch, $yaw, $idescena = null, $id_pan_sec = null) {

		if($id_pan_sec == null){
			$datos["resultado"] = $this->hotspotsModel->modificarPitchYawEscena($pitch, $yaw, $idescena, null);
        	redirect('escenas/');
		}else{
			$datos["resultado"] = $this->hotspotsModel->modificarPitchYawEscena($pitch, $yaw, null, $id_pan_sec);
			$datos['mensaje'] = 'Pitch-Yaw actualizado con éxito';
			$datos['vista'] = 'escenas/admin_pan_sec';
			$datos['tabla_escena_secundaria'] = $this->PanoramasSecundariosModel->getById($idescena);
			$datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
			$this->load->view('admin_template', $datos);
		}
        /*
        $datos["pitch"]= $pitch;
        $datos["yaw"]= $yaw;
        $datos["tablaEscenas"] = $this->EscenasModel->getAll();
        $datos["vista"]="escenas/Escenastable";
	$datos["mapa"] = $this->mapa->cargar_mapa();
	$datos["puntos"] = $this->mapa->cargar_puntos();
        $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
        $this->load->view('admin_template', $datos);
         */
    }
    
    /**
     * Actualiza los targets pitch y yaw que tiene un hotspot de tipo salto
     * 
     * @param type $pitch coordenada pitch objetivo
     * @param type $yaw coordenada yaw objetivo
     * @param type $codescena codigo de escena al que se redirigirá trás realizar la actualización
     * @param type $idhotspot hotspot del cual serán modificados los targets
     */
    public function update_hotspot_targets($pitch, $yaw, $codescena, $idhotspot) {
        $datos["resultado"] = $this->hotspotsModel->modificarTargetsHotspot($pitch, $yaw, $codescena, $idhotspot);
        redirect('escenas/cargar_escena/' . $codescena . '/_hotspot/');
    /*
        $datos["pitch"]= $pitch;
        $datos["yaw"]= $yaw;
        $datos["tablaEscenas"] = $this->EscenasModel->getAll();
        $datos["vista"]="escenas/Escenastable";
        $datos["mapa"] = $this->mapa->cargar_mapa();
	$datos["puntos"] = $this->mapa->cargar_puntos();
        $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
        $this->load->view('admin_template', $datos);
     * 
     */
    }

    /**
     * Actualiza un hostpot de tipo audio.
     * 
     * Asigna un nuevo audio a este hotspot. Los ids del audio y del hotspot se recibe por POST.
	 * @param int $tabla es 0 si es un hotspot que pertenece a una escena principal, si es uno pertenece a una escena secundaria
     */
    public function updateHotspotAudio($tabla) {
        $id = $this->input->post_get("id_hotspot");
        $aud = $this->input->post_get("clickHandlerArgs");
        $resultado = $this->hotspotsModel->modificarpuntoaudio($id, $aud);
        $cambio = $this->input->post_get("sceneId");
        if ($resultado == true) {
			if($tabla == 0){
				redirect('escenas/cargar_escena/' . $cambio . '/show_insert_hotspot/');
			}else{
				redirect('panoramas_secundarios/cargar_escena/' . $cambio . '/show_insert_hotspot/');
			} 
        } 
        
    }
    
    /**
     * Sorpresa... Borra un hotspot. 
     * @param int $id El id del hotspot que será borrado
	 * @param int $tabla 0 o 1, 0 si es hotspot escena principal y 1 si es hotspot panel secundario
     */

    public function delete_hotspot($id, $tabla){
        $codigo_escena=$this->hotspotsModel->cargar_codigo_escena($id,$tabla);    // Sacamos el código de escena a la que pertenece este hotspot
		$resultado = $this->hotspotsModel->borrarHotspot($id);
		if($resultado == 1){
			if($tabla == 0){
				redirect('escenas/cargar_escena/' . $codigo_escena. '/show_insert_hotspot/');
			}else{
				redirect('Panoramas_secundarios/cargar_escena/' . $codigo_escena. '/show_insert_hotspot/');
			}
		}

       /* if ($resultado == 1) {
            $datos["mensaje"] = "Hotspot borrado correctamente";
            $datos["tablaHotspots"] = $this->hotspotsModel->buscarHotspots();
            $datos["vista"]="hotspots/hotspotsTable";
            $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
            $this->load->view('admin_template', $datos);
            }
        else {
            $datos["error"] = "Error al borrar el hotspot";
            $datos["tablaHotspots"] = $this->hotspotsModel->buscarHotspots();
            $datos["vista"]="hotspots/hotspotsTable";
            $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
            $this->load->view('admin_template',$datos);
        }*/
    }
    
    /**
     * Muestra la vista correspondiente para actualizar un hotspot.
     * Los hotspots pueden ser de varios tipos (video, audio, panel, etc).
     * @param int $id El id del hotspot
     * @param type $escena_inicial TODO
	 * @param type $tabla (recibe 0 o 1, 0 si es hotspot_escena_principal y 1 si es secundaria)
     */
    public function show_update_hotspot($id, $escena_inicial = null, $tabla){
		$datos["codigo_escena"]=$this->hotspotsModel->cargar_codigo_escena($id,$tabla);
		$datos['tipo_update'] = $tabla;
		if($tabla == 0){
			
			$datos["tabla"]= $this->hotspotsModel->buscarUnHotspot($id);
			
			
			// TODO: comentario
			if ($datos["tabla"][0]["clickHandlerFunc"] == "puntos") {
				$datos["vista"]="hotspots/updateHotspot";
				if(isset($escena_inicial)){
					$datos["escena_inicial"]=$escena_inicial;
				}
		}
			// Hotspot de tipo video
		if ($datos["tabla"][0]["clickHandlerFunc"] == "video") {
				$datos["vista"]="hotspots/updateHotspotVideo";
				$this->load->model('VideoModel');
				$datos['allVideos'] = $this->VideoModel->buscarvideo();
		 }
			// Hotspot de tipo audio
		if ($datos["tabla"][0]["clickHandlerFunc"] == "musica") {
				$datos["vista"]="hotspots/updateHotspotAudio";
				$this->load->model('AudioModel');
				$datos['allAudios'] = $this->AudioModel->allAudios();
		 }
			// Hotspot de tipo panel (galería de imágenes con información)
		if ($datos["tabla"][0]["clickHandlerFunc"] == "panelInformacion") {
				$datos["vista"]="hotspots/updateHotspotPanel";
				if(isset($escena_inicial)){
					$datos["escena_inicial"]=$escena_inicial;
				}
		 }
			// Hotspot de tipo escelera
		if ($datos["tabla"][0]["clickHandlerFunc"] == "escaleras") {
				$datos["vista"]="hotspots/updateHotspotEscaleras";
		 }
			   // Sacamos el código de escena a la que pertenece este hotspot
			$datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
			$datos["mapa"] = $this->mapa->cargar_mapa();
			$datos["puntos"] = $this->mapa->cargar_puntos();
		}else{

        $datos["tabla"]= $this->hotspotsModel->buscarUnHotspot($id);
	
        // TODO: comentario
        if ($datos["tabla"][0]["clickHandlerFunc"] == "puntos") {
            $datos["vista"]="hotspots/updateHotspot";
            if(isset($escena_inicial)){
                $datos["escena_inicial"]=$escena_inicial;
            }
	}
        // Hotspot de tipo video
	if ($datos["tabla"][0]["clickHandlerFunc"] == "video") {
			$datos["vista"]="hotspots/updateHotspotVideo";
			$this->load->model('VideoModel');
			$datos['allVideos'] = $this->VideoModel->buscarvideo();
 	}
        // Hotspot de tipo audio
	if ($datos["tabla"][0]["clickHandlerFunc"] == "musica") {
			$datos["vista"]="hotspots/updateHotspotAudio";
			$this->load->model('AudioModel');
			$datos['allAudios'] = $this->AudioModel->allAudios();
 	}
        // Hotspot de tipo panel (galería de imágenes con información)
	if ($datos["tabla"][0]["clickHandlerFunc"] == "panelInformacion") {
			$datos["vista"]="hotspots/updateHotspotPanel";
			if(isset($escena_inicial)){
                $datos["escena_inicial"]=$escena_inicial;
            }
 	}
        // Hotspot de tipo escelera
	if ($datos["tabla"][0]["clickHandlerFunc"] == "escaleras") {
            $datos["vista"]="hotspots/updateHotspotEscaleras";
 	}
       // Sacamos el código de escena a la que pertenece este hotspot
        $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
        $datos["mapa"] = $this->mapa->cargar_mapa();
		$datos["puntos"] = $this->mapa->cargar_puntos();
	}	

    $this->load->view('admin_template', $datos);
    }
    
    /**
     * Procesa el UPDATE de un hotspot de tipo vídeo
     */
    public function updateHotspotVideo($tabla) {
        $id = $this->input->post_get("id_hotspot");
	$vid = $this->input->post_get("clickHandlerArgs");
	$resultado=$this->hotspotsModel->modificarpuntovideo($id, $vid);
	$anda=$this->input->post_get("sceneId");
	if ($resultado == true)
		if($tabla == 0){
			redirect('escenas/cargar_escena/'.$anda.'/show_insert_hotspot/');
		}else{
			redirect('panoramas_secundarios/cargar_escena/'.$anda.'/show_insert_hotspot/');
		}

       
            /*
            $datos["tablaHotspots"] = $this->hotspotsModel->buscarHotspots();
            $datos["vista"]="hotspots/hotspotsTable";
            $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
            $this->load->view('admin_template', $datos);
            */
    }
    
	// trabajar los redirect
	
    public function process_update_hotspot($id_escena = null, $tabla){
            $id = $this->input->post_get("id_hotspot");
            $tipoHotspot = $this->input->post_get("cssClass");
            if($tipoHotspot == "custom-hotspot-info")
                $resultado = $this->hotspotsModel->modificarHotspotPanel($id);
            else if($tipoHotspot == "custom-hotspot-salto")
                $resultado = $this->hotspotsModel->modificarHotspot($id);
            
            if ($resultado == true) {
				if($tabla == 1){
                $mensaje = "La modificaci&oacute;n ha sido un &eacute;xito";
				redirect('panoramas_secundarios/cargar_escena/'.$id_escena.'/show_insert_hotspot/');
				}else{
					$mensaje = "La modificaci&oacute;n ha sido un &eacute;xito";
					redirect('escenas/cargar_escena/'.$id_escena.'/show_insert_hotspot/');
				}
				
                //$datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
                //$this->load->view('admin_template', $datos);
            }
            else {
                $mensaje = "La modificaci&oacute;n ha fallado";
                redirect('escenas/cargar_escena/'.$anda.'/show_insert_hotspot/');
                //$datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
                //$this->load->view('admin_template', $datos);
            }
        
    }

   /**
    * Procesa la creación de un hotspots de tipo salto.
    */
    public function process_insert_scene(){
        $resultado = $this->hotspotsModel->insertarHotspotEscena();
        if ($resultado == true) {
            $anda=$this->input->post_get("id_scene");
            redirect('escenas/cargar_escena/'.$anda.'/show_insert_hotspot/');
        }else {
            $datos["error"] = "La inserci&oacute;n ha fallado";
            $datos["tablaHotspots"] = $this->hotspotsModel->buscarHotspots();
            $datos["vista"]="hotspots/hotspotsTable";
            $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
            $this->load->view('admin_template', $datos);
        }
    }
    
    

////////////////////////////Zygis - MOVIDAS DEL CMS//////////////////////////

   /**
    * Procesa la creación de un hotspots de tipo panel informativo.
    */
  public function process_insert_panel($tabla){
            $joshua = $this->hotspotsModel->insertarHotspotPanel($tabla);
            $datos["mensaje"] = "La inserci&oacute;n ha sido un &eacute;xito";
			$datos["vista"]="hotspots/hotspotPanel";
			
			if ($this->input->get_post('escena_principal') != null){
				$escena_principal = $this->input->get_post('escena_principal');
				$datos['escena_principal'] = $escena_principal;
			}
			
            $datos["idhs"]=$joshua[0];
            $datos["escena_actual"]=$joshua[1];
            //cargar el modelo
            $this->load->model("ImagenModel");
            
            //acciones para ver el listado de imagenes
            $datos["lista_imagenes"] = $this->ImagenModel->buscar_todo();
            $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
            $this->load->view('admin_template', $datos);
    }
  
   /**
    * Procesa la creación de un hotspots de tipo escaleras.
    */
    public function process_insert_escaleras(){
            $joshua = $this->hotspotsModel->insertarHotspotEscalera();
            $datos["mensaje"] = "La inserci&oacute;n ha sido un &eacute;xito";
            $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
            $id_scene = $this->input->post_get("id_scene");
            redirect('escenas/cargar_escena/'.$id_scene.'/_hotspot/');
    }
    
  
   /**
    * muestra todas las imagenes que podemos añadir a un panel.
    */
  public function show_panel_info(){
    //cargar el modelo
    $this->load->model("ImagenModel");
    //acciones para ver el listado de imagenes
    $datos["lista_imagenes"] = $this->ImagenModel->buscar_todo();
    //Se lo paso a la vista
    $datos["vista"]="hotspots/hotspotPanel";
    $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
    $this->load->view('admin_template', $datos); 
  }
///////////////////////////////////////////////////  
    /**** ATENCIÓN INSERTAR IMÁGENES EN HOSTPOT DE TIPO PANEL ****\
    /**
     * Inserta una imagen y nos muestra el mensaje si ha sido un éxito o no
     * 
     * @author: María Dolores Salmeron Sierra    
     */
    public function insertar_imagen() {

        //cargar el modelo
        $this->load->model("ImagenModel");
        //acciones para insertar la imagen
        $resultado = $this->ImagenModel->insertar_imagen();

        // Comprobamos cuantas imágenes se han subido correctamente
        $correctas = 0;
        $incorrectas = 0;
        for ($i = 0; $i < count($resultado); $i++) {
            if ($resultado[$i] == 0) $incorrectas++; else $correctas++;
        }
        $total = $correctas + $incorrectas;
        if ($incorrectas > 0)
            $datos["error"] = $total." imágenes subidas: $correctas correctas - $incorrectas fallidas";
        else
            $datos["mensaje"] = $total." imágenes subidas correctamente";
            $datos["lista_imagenes"] = $this->ImagenModel->buscar_todo();
            $datos["vista"] = "hotspots/hotspotPanel";
            $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
            $this->load->view('admin_template', $datos);
    }

///////////////////////////////////////////  
  
   /**
    * Añade las imagenes seleccionadas al hotspot y redirige.
    */
  public function add_imgs_hotspot(){
    //Añade las imagenes a la base de datos
	$resultado = $this->hotspotsModel->insertar_imagenes_hotspot();
	$id = $this->input->post_get('idescena');
	if($this->input->post_get('escena_pr')){
		echo base_url("Panoramas_Secundarios/cargar_escena/".$id."/show_insert_hotspot");
	}else{
		echo base_url("escenas/cargar_escena/".$id."/show_insert_hotspot");
	}
   
  }
  
   /**
	* Permite modificar el panel de informacion, recibe el id y las imagenes asociadas a ese panel
	* @param int $tabla 0 si es un hotspot de una escena normal y 1 si es un hotspot de una escena secundaria
	* @param string $escena_principal recibe la escena inicial
	*/
	
  public function modify_panel_info($idhs, $escena_principal){
	$datos['escena_principal'] = $escena_principal;
    $datos["idhs"] = $idhs;
    $datos["imagenes_seleccionadas"]=$this->hotspotsModel->get_imgs_asociadas_al_hotspot($idhs);
    //cargar el modelo
    $this->load->model("ImagenModel");
    //acciones para ver el listado de imagenes
    $datos["lista_imagenes"] = $this->ImagenModel->buscar_todo();
    $datos["vista"]="hotspots/hotspotPanel";
    $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
    $this->load->view('admin_template', $datos); 
 }
  
   /**
    * Carga la información necesaria para el panel (o galería de imágenes). La petición se hace por Ajax.
    */
 public function load_panel(){
  $id = $_REQUEST["id_hotspot"];
  $resultado = $this->hotspotsModel->cargar_imagenes_panel($id);
  //TODO: añadir mensaje de la situacion
 }

   /**
    * Recibe la petición vía Ajax para obtener la URL de un vídeo a partir de su Id.
    */
 public function load_video(){
    $id = $_REQUEST["idVideo"];
    $url = $this->hotspotsModel->cargar_video($id);
    // El vídeo se almacena en la BD con la URL de Vimeo (p.ej: https://vimeo.com/2910853)
    // pero para el reproductor embebido es necesario transformarlo (como https://player.vimeo.com/video/2910853)
    $url_modificada = str_replace("vimeo.com", "player.vimeo.com/video", $url);
    echo $url_modificada;
}

   /**
    * Procesa la creación de un hotspots de tipo video.
    */
    public function process_insert_video($tabla){
        $resultado = $this->hotspotsModel->insertarHotspotVideo($tabla);
		$anda=$this->input->post_get("id_scene");
        if ($resultado == true) {
			if($tabla == 0){
				redirect('escenas/cargar_escena/'.$anda.'/show_insert_hotspot/');
			}else{
				redirect('panoramas_secundarios/cargar_escena/'.$anda.'/show_insert_hotspot/');
			}
            /*$datos["mensaje"] = "La inserci&oacute;n ha sido un &eacute;xito";
            $datos["tablaHotspots"] = $this->hotspotsModel->buscarHotspots();
            $datos["vista"]="hotspots/hotspotsTable";
            $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
            $this->load->view('admin_template', $datos);*/
		}/*else {
            $datos["error"] = "La inserci&oacute;n ha fallado";
            $datos["tablaHotspots"] = $this->hotspotsModel->buscarHotspots();
            $datos["vista"]="hotspots/hotspotsTable";
            $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
            $this->load->view('admin_template', $datos);
        }*/
    }

   /**
    * Recibe la petición vía Ajax para obtener la URL de un audio a partir de su Id.
    */
   public function load_audio() {
        $id = $_REQUEST["id_hotspot"];
        $resultado = $this->hotspotsModel->cargar_audio($id);
        //var_dump($resultado);
        //TODO: añadir mensaje de la situacion
    }

    /**
	* Procesa la creación de un hotspots de tipo audio.
	* @param int $tabla es 0 si es un hotspot de panorama secundario o 1 si es de una escena principal
    */
    public function process_insert_audio($tabla) {

        $resultado = $this->hotspotsModel->insertarHotspotAudio($tabla);
        $cambio = $this->input->post_get("id_scene");

        if ($resultado == true) {

			if($tabla == 0){
				redirect('escenas/cargar_escena/' . $cambio . '/show_insert_hotspot/');
			}else{
				redirect('panoramas_secundarios/cargar_escena/' . $cambio . '/show_insert_hotspot/');
			}

        } else {
            $datos["error"] = "La inserci&oacute;n ha fallado";
            $datos["tablaHotspots"] = $this->hotspotsModel->buscarHotspots();
            $datos["vista"] = "hotspots/hotspotsTable";
            $datos["permiso"] = $this->UsuarioModel->comprueba_permisos($datos["vista"]);
            $this->load->view('admin_template', $datos);
        }
    }

   /**
    * Te trae los datos del formulario y los mete
    * Miguel Angel 08/06/2018
    */
    public function process_insert_hotspot(){
    $res=$this->hotspotsModel->process_insert_hotspot();
     if($res){
         echo"Se ha insertado correctamente";
         $datos["tablaHotspots"] = $this->hotspotsModel->buscarHotspots();
		 $datos["vista"]="hotspots/hotspotsTable";
         $datos["permiso"]=$this->UsuarioModel->comprueba_permisos($datos["vista"]);
         $this->load->view('admin_template', $datos);
         
     }else{
         echo"fallo al insertar hotspot";
     }
 }

   /**
    * Borra el último hotspot.
    */
 public function borrarUltimo(){
    $ultimo = $this->hotspotsModel->ultimo_hotspot();
    $resultado = $this->hotspotsModel->borrarHotspot($ultimo);
    //echo $resultado;

 }
}
