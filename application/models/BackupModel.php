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

class BackupModel extends CI_Model {

    //Backup de la base de datos completa
    public function backupSql(){

        //Configuracion, en formato de texto plano
        $prefs = array(
            'format' => 'txt' // gzip, zip, txt
        );

        // Load the DB utility class
        $this->load->dbutil();

        // Backup your entire database and assign it to a variable
        $backup = $this->dbutil->backup($prefs);

        // Load the download helper and send the file to your desktop
        $this->load->helper('download');
        force_download('backup_sql_'.date('d-m-Y').'.sql', $backup);
    }

    //Backup del directorio assets
    public function backupAssets(){
        
        //Cargamos la libreria
        $this->load->library('zip');

        //Ruta del directorio que vamos a comprimir
        $path = "./assets/biblio";

        $this->zip->read_dir($path, false);
    
        // Download the file to your desktop.
        $this->zip->download('backup_assets_'.date('d-m-Y').'.zip'); 
        
    }
    
    //Borrar directorio assets
    public function deleteAssets(){
        $path = "./assets/biblio"; //Ruta del directorio que vamos a eliminar
        $this->load->helper("file"); // load the helper
        delete_files($path, true); // delete all files/folders
    }

    //Restaurar directorio assets
    public function restoreAssets(){
        $config['upload_path'] = "./assets/biblio"; //Ruta donde se guarda el zip
        $config['allowed_types'] = '*'; //Tipo de fichero permitido, si especificamos zip, no funciona, nos da error al subir el archivo
        
        $this->load->library('upload', $config);//Cargamos la libreria y pasamos parametros 

        //Comprobamos que la subida del zip ha sido correcta
        if(!$this->upload->do_upload('assetsZip')){
            return false;
        }else{ //Si la subida es correcta descomprimimos nuestro archivo zip

            $upload_data = $this->upload->data(); //Datos del fichero subido
            $file_name = $upload_data['file_name']; //Nombre del archivo zip

            $zip = new ZipArchive;

            if($zip->open("./assets/biblio/$file_name")){
                if($zip->extractTo('./assets/biblio')){
                    return true;
                }else{
                    return false;
                };
                $zip->close();
            }else{
                return false;
            }
        }
    }

    //Restaurar base de datos sql
    public function restoreSql(){
        $config['upload_path'] = "."; //Ruta donde se guarda el zip de la base de datos
        $config['allowed_types'] = '*'; //Tipo de fichero permitido
        
        $this->load->library('upload', $config);//Cargamos la libreria y pasamos parametros 

        //Comprobamos que la subida es correcta
        if(!$this->upload->do_upload('sqlZip')){
            return false;
        }else{
            $upload_data = $this->upload->data(); //Datos del fichero subido
            $file_name = $upload_data['file_name']; //Nombre del archivo
       
            // Temporary variable, used to store current query
            $templine = '';

            // Read in entire file
            $lines = file($file_name);

            $error = '';

            // Loop through each line
            foreach ($lines as $line){
                // Skip it if it's a comment
                if(substr($line, 0, 2) == '--' || $line == ''){
                    continue;
                }
                
                // Add this line to the current segment
                $templine .= $line;
                
                // If it has a semicolon at the end, it's the end of the query
                if (substr(trim($line), -1, 1) == ';'){
                    // Perform the query
                    if(!$this->db->query($templine)){
                        $error .= 'Error performing query "<b>' . $templine . '</b>": ' . $db->error . '<br /><br />';
                    }
                    
                    // Reset temp variable to empty
                    $templine = '';
                }
            }
            return !empty($error)?$error:true;            
        }
    }
}
?>	
