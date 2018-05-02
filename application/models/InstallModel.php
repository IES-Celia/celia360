<?php 

    class InstallModel extends CI_Model {
        /*******************************************************************
        *                           Install
        *
        ******************************************************************/

        public function inserbd(){
        	$host = $this->input->get_post("host");
        	$namebd = $this->input->get_post("namebd");
        	$nameuse = $this->input->get_post("nameuse");
        	$passbd = $this->input->get_post("passbd");
        	$base = $this->input->get_post("base");

        	$nombre_archivo = ".env.development";

        		if(file_exists($nombre_archivo)){
        			$mensaje = "El Archivo ".$nombre_archivo." se ha modificado.";
    			}
    		   		else{
        			$mensaje = "El Archivo ".$nombre_archivo." se ha creado.";
    			}

    			if($archivo = fopen($nombre_archivo, "w")){
        			if(fwrite($archivo, "DB_HOSTNAME='".$host."'\n 
        								DB_USERNAME='".$nameuse."'\n 
        								DB_PASSWORD='".$passbd."'\n 
        								DB_DATABASE='".$namebd."'\n 
        								BASE_URL='".$base."'\n 
        								SESSION_DIR='/tmp'")){
            				
            			echo "Se ha ejecutado correctamente";
        			}
        			else{
            			echo "Ha habido un problema al crear el archivo";
        			}
 
        			fclose($archivo);
    }
 


        	}
        }
 ?>