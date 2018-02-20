
	<head>
		<style type="text/css">
		body{
			background-color: blue;
		}
			.piso_cerrado{
			    left:-300%;
			}
			.piso_abierto{
			   left:0.5%;
			}
			#mapa{
			    pointer-events:none;
			    z-index: 2;
			    position: absolute;
			    overflow: visible;
			    /*background-color: black;   */
			}
			.puntos{
			    pointer-events: auto;
			    cursor: pointer;
			    position: absolute;
			    width: 2%;
			    height: 3.4%;
			    border-radius: 50%;
			    background: white;
			}
			.punto_seleccionado{
			    pointer-events: auto;
			    cursor: pointer;
			    position: absolute;
			    width: 2%;
			    height: 3.4%;
			    border-radius: 50%;
			    background: cyan;
			}
			.pisos{
			    background-size: 100% 100%;
			    opacity: 0.6;
			    position: absolute;
			    pointer-events: none;
			    width: 100%;
			    height: 100%;
			    transition: left .5s;
			}
			.cerrado{
			    transition: left .5s;
			    left: -300%;
			}
			.abierto{
			    transition: left .5s;
			    left: 0.5%;
			}
			#subir_piso{
			    bottom: 0px;
			    margin-bottom: 100px;
			    z-index: 2;
			    position: absolute;
			    background-image: url(<?php echo "'".base_url('assets/imagenes/svg/subirpiso22.svg')."'"?>);
			    background-size: 100% 100%;
			    width: 30px;
			    height: 30px;
			}
			#bajar_piso{
			  
			    bottom: 0px;
			    margin-bottom: 60px;
			    z-index: 2;
			    position: absolute;
			    background-image: url(<?php echo "'".base_url('assets/imagenes/svg/bajarpiso22.svg')."'"?>);
			    background-size: 100% 100%;
			    width: 30px;
			    height: 30px;
			}
			#boton_mapa{
			    bottom: 0px;
			    margin-bottom: 10px;
			    z-index: 2;
			    position: absolute;
			    background-image: url(<?php echo "'".base_url('assets/imagenes/svg/pinned.svg')."'"?>);
			    background-size: 100% 100%;
			    width: 40px;
			    height: 40px;
			    
			}
		</style>
		<script src="https://code.jquery.com/jquery-1.7.1.min.js"></script>
    	<script src="https://code.jquery.com/ui/1.8.16/jquery-ui.js"></script>
	</head>
	<div id="mapa" style="width: 614px; height: 350px; top: 280px;" class="cerrado">
 		<?php
 			$indice = 0;

 			 $pisos = array('0' => "sotano", '1' => "primer_piso", "2" => "segundo_piso", "3" => "tercer_piso", "4" => "tejado" );

 			foreach ($mapa as $imagen) {
 				if($pisos[$indice]=="primer_piso"){
 					echo "<div id='".$pisos[$indice]."' class='piso_abierto pisos' style='background-image: url(".base_url($imagen['url_img']).");'>";
 				}else{
 					echo "<div id='".$pisos[$indice]."' class='piso_cerrado pisos' style='background-image: url(".base_url($imagen['url_img']).");'>"; 
 				}
 				
 					foreach ($puntos as $punto) {
 						if($punto['piso']==$indice){
 							if ($punto['nombre']=='p1punto15') {
							echo "<div id='".$punto['nombre']."' class='punto_seleccionado' style='left: ".$punto['left_mapa']."%; top: ".$punto['top_mapa']."%;' onclick='puntos(\"".$punto['nombre']."\"); viewer.loadScene(\"".$punto['id_escena']."\")'></div>";
							}else{
								echo "<div id='".$punto['nombre']."' class='puntos' style='left: ".$punto['left_mapa']."%; top: ".$punto['top_mapa']."%;' onclick='puntos(\"".$punto['nombre']."\"); viewer.loadScene(\"".$punto['id_escena']."\")'></div>";
							}
 							
 						}
 						
 					}
 				echo "</div>";
 				$indice++;
 			}
 			/*echo "<div style='left: ".$puntos_mapa['left']."; top:".$puntos_mapa['top']."'></div>";*/
 		?>

	</div>
	<div id="boton_mapa" style="transition: left 0.5s ease 0s;left:0.5%;" class="cerrado_boton boton" onclick="mover(document.getElementById('mapa')); mover(document.getElementById('boton_mapa'));mover(document.getElementById('subir_piso')); mover(document.getElementById('bajar_piso'));"></div>

        <div id="subir_piso" style="transition: left 0.5s ease 0s;left:0.5%; visibility:hidden;" class="cerrado_boton boton" onclick="cambiar_piso(10)"></div>

        <div id="bajar_piso" style="transition: left 0.5s ease 0s;left:0.5%; visibility:hidden;" class="cerrado_boton boton" onclick="cambiar_piso(-10); this.style"></div>

<script type="text/javascript">
			mapa_responsivo();
                var piso=1;
                /*evento de resize*/
                var id;
                function variable_piso(x){
                    piso=x;
                }
             
                $(window).resize(function() {
                    clearTimeout(id);
                    alert
                    id = setTimeout(mapa_responsivo, 100);
                });

                /*movimiento del mapa y botones*/
                function mapa_responsivo(){
                    var distancia_top=window.innerHeight*0.57;
                    var anchura=window.innerWidth*0.45;
                    var altura=anchura*0.57;
                    
                    document.getElementById("mapa").style.top=window.innerHeight-altura+"px";
                    document.getElementById("mapa").style.height=altura+"px";
                    document.getElementById("mapa").style.width=anchura+"px"; 
                        distancia_top=window.innerHeight*0.92;
                }
                function puntos(identificador){
		            document.getElementsByClassName("punto_seleccionado")[0].className="puntos";
		            document.getElementById(identificador).className="punto_seleccionado";
		        }
                function cambiar_piso(opcion){
                    if (opcion==10) {
                        if (piso==4) {
                            // aqui puedes poner algo y saltará cuando intentas pasar más allá del tejado
                        }else{
                            piso++;
                            switch (piso){
                                case 1:
                                    document.getElementById("sotano").className="piso_cerrado pisos";
                                    document.getElementById("primer_piso").className="piso_abierto pisos";
                                     
                                    break;
                                case 2:
                                    document.getElementById("primer_piso").className="piso_cerrado pisos";
                                    document.getElementById("segundo_piso").className="piso_abierto pisos";
                                    
                                    break;
                                case 3:
                                    document.getElementById("segundo_piso").className="piso_cerrado pisos";
                                    document.getElementById("tercer_piso").className="piso_abierto pisos";
                                    break;
                                case 4:
                                    document.getElementById("tercer_piso").className="piso_cerrado pisos";
                                    document.getElementById("tejado").className="piso_abierto pisos";
                                    break;
                            }
                          }
                    }else if (opcion==-10) {
                        if(piso==0){
                            // aqui puedes poner algo y saltará cuando intentas pasar más allá del sotano
                        }else{
                            piso--;
                            switch (piso){
                                case 3:
                                    document.getElementById("tejado").className="piso_cerrado pisos";
                                    document.getElementById("tercer_piso").className="piso_abierto pisos";
                                    break;
                                case 2:
                                    document.getElementById("tercer_piso").className="piso_cerrado pisos";
                                    document.getElementById("segundo_piso").className="piso_abierto pisos";
                                    
                                    break;
                                case 1:
                                    document.getElementById("segundo_piso").className="piso_cerrado pisos";
                                    document.getElementById("primer_piso").className="piso_abierto pisos";
                                    
                                    break;
                                case 0:
                                    document.getElementById("primer_piso").className="piso_cerrado pisos";
                                    document.getElementById("sotano").className="piso_abierto pisos";
                                    break;
                            }
                        }

                    }else{
                        switch (piso){
                                case 4:
                                
                                case 3:
                                    
                                    break;
                                case 2:
                                    
                                    
                                    break;
                                case 1:
                                    
                                    
                                    break;
                                case 0:
                                    
                                    break;
                            }
                    }
                    
                    
                    
                }

                function mover(opcion){               
                    switch (opcion.className){
                        case "cerrado":
                            opcion.className="abierto";
                            break;
                        case "abierto":
                            opcion.className="cerrado";
                            break;
                        case "cerrado_boton boton":
                            if(opcion.id=="subir_piso" || opcion.id=="bajar_piso"){
                                opcion.style.visibility="visible";
                            }
                            opcion.className="abierto_boton boton";
                            opcion.style.left="46.5%";
                            break;
                        case "abierto_boton boton":
                            if(opcion.id=="subir_piso" || opcion.id=="bajar_piso"){
                                opcion.style.visibility="hidden";
                            }
                            opcion.className="cerrado_boton boton";
                            opcion.style.left="0.5%";
                            break;
                    }
                    
                }
</script>