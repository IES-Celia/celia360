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

class EscenasModel extends CI_Model {

    public function getAll() {

        $con = $this->db->query("SELECT * FROM escenas ORDER BY cod_escena");
        $tabla = array();
        foreach ($con->result_array() as $fila) {
            $tabla[] = $fila;
        }

        return $tabla;
    }

    public function getOne($cod) {

        $com = $this->db->query("SELECT * FROM escenas where cod_escena = '$cod'");
        $tabla = array();
        foreach ($com->result_array() as $fila) {
            $tabla[] = $fila;
        }
        return $tabla;
    }

    public function getOneId($cod) {

        $com = $this->db->query("SELECT * FROM escenas where id_escena = '$cod'");
        $tabla = array();
        foreach ($com->result_array() as $fila) {
            $tabla[] = $fila;
        }
        return $tabla;
    }

    /**
     * Inserta una escena (panorama) en la BD y sube el archivo con la imagen al directorio assets/imagenes/escenas/
     * 
     * La imagen se redimensiona a 4000 px de ancho para evitar problemas en navegadores Mozilla.
     * La imagen se renombra como el código de escena (más ".JPG").
     * 
     * @return 1 si la escena se sube correctamente, 0 si hay un error al insertar en la BD, -1 si hay un error al subir o redimensionar la imagen.
     */
    public function insertar() {

        $config['upload_path'] = 'assets/imagenes/escenas/';
        $config['allowed_types'] = 'jpg';

        $this->load->library('upload', $config);

        $resultado = $this->upload->do_upload('panorama');
    
        if ($resultado) {
            // Imagen subida con éxito

            // Vamos a insertar un registro en la BD para genera el id (que es AUTOINCREMENT)
            $name = $this->input->post_get("name");
            $cod = "temp";  // Luego lo sustituiremos por el id (campo redundante; no lo eliminamos porque se usa en otros lugares de la aplicación por motivos históricos)
            $left_mapa = $_REQUEST["left_mapa"];
            $top_mapa = $_REQUEST["top_mapa"];
            $piso_mapa = $_REQUEST["piso_mapa"];
            $nombre_imagen = "temp";   // También lo cambiaremos luego, cuando conozcamos el id asignado al registro

            $insert = "INSERT INTO escenas (Nombre,cod_escena,hfov,pitch,yaw,tipo,panorama) 
                      VALUES('$name','$cod',120,10,10,'equirectangular','$nombre_imagen')";
            $this->db->query($insert);
            
            // Obtenemos el id asignado a la escena (es un campo AUTOINCREMENT)
            $last_id = $this->db->insert_id();  
            $cod = $last_id;    // El código será igual que el último id (campo redundante: no lo eliminamos porque se usa en otros lugares de la aplicación por motivos históricos)
            
            // Renombramos archivo de imagen para que su nombre sea el id (o cod de escena) seguido de ".JPG"
            // (hemos tenido muchos problemas con esto y hemos decidido dejar la extensión en MAYÚSCULAS)
            $img_cliente = $this->upload->data()["client_name"];
            $nombre_imagen = $cod.".JPG";
            rename("assets/imagenes/escenas/$img_cliente", "assets/imagenes/escenas/$nombre_imagen");
            
            // Actualizamos el registro con el nuevo cod y el nuevo nombre de imagen (ambos iguales a id: campos redundantes, pero no los podemos eliminar porque se usan en otros lugares de la aplicación)
            $update = "UPDATE escenas SET cod_escena = '$cod', panorama = 'assets/imagenes/escenas/$nombre_imagen' WHERE id_escena = '$last_id'";
            $this->db->query($update);
            if ($this->db->affected_rows() != 1) {
                // Ha ocurrido algún error. Devolvemos un -1 y eliminamos la imagen de la BD y del directorio de imágenes
                $resultado = 0;
                $delete = "DELETE FROM escenas WHERE id_escena = '$last_id'";
                unlink("assets/imagenes/escenas/$nombre_imagen");
    echo "Error tras UPDATE<br><br>";
    
            }
            else {
                // Todo ha ido bien. Ya tenemos la imagen subida. Su nombre es el id de la imagen (seguido de ".JPG").
                // Sus campos id y cod son iguales.
                // 
                // Vamos a redimensionar la imagen para asegurarnos que su ancho es <4096px
                // (por encima de 4096px, algunos navegadores dan problemas)
                if ($this->upload->data()["image_width"] > 4000) {
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = 'assets/imagenes/escenas/'.$nombre_imagen;
                    $config['maintain_ratio'] = TRUE;
                    $config['new_image'] = 'assets/imagenes/escenas/';
                    $config['width'] = 4000;
                    $this->load->library('image_lib', $config);

                    if (!$this->image_lib->resize()) {
                        // Ha ocurrido un error al redimensionar la imagen
                        $resultado = -1;  // Marca de error
                    }
                }


                $insert = "INSERT INTO puntos_mapa (left_mapa, top_mapa, id_escena, piso) 
                    VALUES ($left_mapa,$top_mapa,'$cod',$piso_mapa)";

                $this->db->query($insert);

                $resultado = $this->db->affected_rows();
            } // else
        } else {
            // La imagen ha fallado durante la subida
            echo $this->upload->display_errors()."<br><br>";
            $resultado = -1;
        }
        return $resultado;
    }

    /**
     * Función encargada de eliminar las escenas y todos los hotspots relacionados.
     * 
     * @param codigo_escena
     */
    public function borrar($cod) {

        $resultado = 0;
        
        $sql = "DELETE FROM hotspots WHERE id_hotspot IN (
                SELECT id_hotspot FROM escenas_hotspots where id_escena IN (
                    SELECT id_escena FROM escenas WHERE cod_escena = '$cod'))";
        $this->db->query($sql);
        $resultado += $this->db->affected_rows();
        
        $sql = "DELETE FROM puntos_mapa WHERE id_escena = '$cod'";
        $this->db->query($sql);
        $resultado += $this->db->affected_rows();

        $sql = "DELETE FROM escenas_hotspots WHERE id_escena = (SELECT id_escena FROM escenas WHERE cod_escena = '$cod') ";
        $this->db->query($sql);
        $resultado += $this->db->affected_rows();

        $sql = "DELETE FROM hotspots WHERE sceneid='$cod'";
        $this->db->query($sql);
        $resultado += $this->db->affected_rows();

        $sql = "DELETE FROM escenas WHERE cod_escena = '$cod' ";
        $this->db->query($sql);
        $resultado += $this->db->affected_rows();

		$imagen_borrar = "assets/imagenes/escenas/$cod.JPG";
		
		$consulta = $this->db->query("SELECT * FROM panoramas_secundarios WHERE cod_escena = '$cod'");
		

		for($i=0;$i<count($consulta->result_array());$i++){
			$imagen = $consulta->result_array()[$i]['panorama'];
			$id_pan_sec = $consulta->result_array()[$i]['id_panorama_secundario'];
			unlink(getcwd().'/'.$imagen);
			$this->db->query("DELETE FROM escenas_hotspots WHERE id_panorama_secundario = '$id_pan_sec'");
			$resultado += $this->db->affected_rows();
		}

		/* BORRAR HOTSPOTS ASOCIADOS A LA ESCENA SECUNDARIA */

		$sql = "DELETE FROM panoramas_secundarios WHERE cod_escena = '$cod'";
		$this->db->query($sql);
		$resultado += $this->db->affected_rows();


        unlink($imagen_borrar);

        return $resultado;
    }

    /**
     * Función encargada de actualizar una escena. Los datos llegan por POST.
     * 
     * @cod Código de la escena a modificar.
     * @return 0 si todo va bien, 1 si falla la subida de la imagen, 2 si falla la actualización de la BD
     */
    public function update($cod) {

        $nombre_fichero = "$cod.JPG";
        $resultado = 0; // Para el return. Suponemos que todo va a ir OK de entrada.
        
        $config['upload_path'] = 'assets/imagenes/escenas/';
        $config['allowed_types'] = 'jpg';
        $config['file_name'] = $nombre_fichero;
        $config['overwrite'] = TRUE;

        $this->load->library('upload', $config);

        $res_upload = $this->upload->do_upload('panorama');
        
        if ($res_upload) {
            // Nueva imagen subida con éxito. Vamos a redimensionarla a 4000 px para evitar problemas con Mozilla
            if ($this->upload->data()["image_width"] > 4000) {
                $config['image_library'] = 'gd2';
                $config['source_image'] = 'assets/imagenes/escenas/'.$nombre_fichero;
                $config['maintain_ratio'] = TRUE;
                $config['new_image'] = 'assets/imagenes/escenas/';
                $config['width'] = 4000;
                $this->load->library('image_lib', $config);

                if (!$this->image_lib->resize()) {
                    // Ha ocurrido un error al redimensionar la imagen
                    $resultado = 1;  // Marca de error en upload
                }
            }
        } else {
            // Ha fallado el upload de la imagen
            $resultado = 1;  // Marca de error en upload
        }


        //////////////////////
        //// TODO: Se tiene que poder modificar la imagen asociada a una cod_escena / $id manteniendo sus hotspots (subiendo la nueva escena al   server, sobrescribiendo la existente)
        /////////////////////


        $name = $_REQUEST["name"];
        $id = $_REQUEST["Id"];
        $panorama = $this->upload->data()["client_name"];
        $update = "
                    UPDATE escenas 
                    SET Nombre = '$name'";
        if ($res_upload) {
            $update = $update . ", panorama = 'assets/imagenes/escenas/$nombre_fichero'";
        }
        $update = $update . "WHERE id_escena = '$id'";

        // Lanzamos el update de la base de datos
        $this->db->query($update);
        if ($this->db->affected_rows() == 0 && !$res_upload) {
            $resultado = 2;     // Marca de error en actualización de la BD
        }

        return $resultado;
    }

    function get_versiones($cod) {

        $sql = $this->db->query(
            "SELECT escenas_versiones.titulo_version, escenas_versiones.cod_escena_version 
            FROM escenas
            INNER JOIN escenas_versiones ON escenas.cod_escena = escenas_versiones.cod_escena_original
            WHERE escenas.cod_escena = '$cod'");
        $versiones = array();
        foreach ($sql->result_array() as $fila) {
            $versiones[] = $fila;
        }
        return $versiones;
    }

}
?>	
