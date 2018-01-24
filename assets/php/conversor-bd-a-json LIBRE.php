<?php
    $bd = new mysqli("localhost", "root", "", "celia360");

    $sql = "SELECT * FROM escenas";
    $res = $bd->query($sql);
    $flagObj=false;
    $flagHot=false;
    $json = ' {"default": {"firstScene": "p1p2f3","sceneFadeDuration": 1000,"autoLoad": true,"showControls": false,"compass":false,"preview": "preview22.png","hotSpotDebug": false },  "scenes": {';
    while ($escena = $res->fetch_array()) {
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
        $res2 = $bd->query($sql);
        while ($hotspot = $res2->fetch_array()) {
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
    echo($json);



?>


