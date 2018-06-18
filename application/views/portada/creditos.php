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
// a continuacion nos encontramos con el css de las ventanas modales de la vista audio.
?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">


<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

<script>
$(document).ready(function(){
   $('html, body').css({
        overflow: 'auto',
    });
});
</script>

<style>
    body{
        overflow-y: auto;
        background-color: #F9F9F9;
    }
    #header_portada {
        height: 110px;
        position: fixed;
        margin-top: 0px;
        background-color:black;
        width: 100%;    
    }

    #cuerpo{
       top: 100px;
       position: relative;
        
    }
    
    .cabecera {
        padding: 20px;
        margin: 20px 0;
        border: 1px solid #eee;
        border-left-width: 5px;
        border-radius: 3px;
        border-left-color: #428bca;
    }

    .cabecera h4 {
        color: #428bca;
    }
    
    .perfil{
        border: 1px solid #eee;
        border-radius: 3px;
        margin-bottom: 10px;
    }
    
    .perfil img{
        height: 120px;
        border-radius: 10px;

    }
   
    .nombrefoto{
        margin-bottom: 4px;
        margin-top: 10px;
    }
    
    .nombrefoto h2{
        font-size: 1.8rem;
        font-weight: 300;
        line-height: 1.4;
        text-align: left;
        padding-left: 4px;
    }
    
    #popup {
		visibility: hidden;
		opacity: 0;
		margin-top: -200px;
	}
	#popup:target {
		visibility:visible;
		opacity: 1;
		background-color: rgba(0,0,0,0.8);
		position: fixed;
		top:0;
		left:0;
		right:0;
		bottom:0;
		margin:0;
		z-index: 999;
		-webkit-transition:all 1s;
		-moz-transition:all 1s;
		transition:all 1s;
	}
	.popup-contenedor {
		position: relative;
		margin:7% auto;
		padding:30px 50px;
		background-color: #fafafa;
		color:#333;
		border-radius: 3px;
		width:50%;
	}
	a.popup-cerrar {
		position: absolute;
		top:3px;
		right:3px;
		background-color: #333;
		padding:7px 10px;
		font-size: 20px;
		text-decoration: none;
		line-height: 1;
		color:#fff;
	}
 
    /* estilos para el enlace */
    
	a.popup-link {
	    text-align: center;
	    display: block;
	    margin: 30px 0;
	}
    
    .popup-contenedor li{
        font-size: 20px;
    }
    
    .display-4{
        font-size: 36px;
    }


</style>

<div class='container'>
  <div id="cuerpo">
    <div class="cabecera">
        <h4>CeliaTour</h4>
        Es una aplicación web para la creación de recorridos virtuales a partir de fotografías 360
        desarrollada por el alumnado de 2º curso del Ciclo Formativo de Desarrollo de Aplicaciones Web en IES Celia Viñas de Almería (España)
        durante el curso 2017/2018.
    </div>
        
    <h2 class="display-3">Equipo de desarrollo</h2>

        <div class='row'>
            <div class="perfil col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div class="nombrefoto d-flex flex-row ">
                    <img src="<?php echo base_url("assets/imagenes/portada/unnamed.jpg"); ?>"/>
                    <h2>Miguel Ángel López Segura</h2>
                </div>
                <div class='prueba_informacion'>
                    migueldevelopez@gmail.com<br>
                </div>
                <div class="d-flex flex-row justify-content-around">
                        <a target="_blank" href="https://www.linkedin.com/in/miguel-ángel-lópez-segura-ba1809114/"><i class="fab fa-linkedin-in"></i> </a>
                        <a target="_blank" href="mailto:migueldevelopez@gmail.com"><i class="far fa-envelope"></i> </a>
                        <a target="_blank" href=""> <i class="far fa-file-pdf"></i></a> 
                        <a target="_blank" href="https://github.com/miguelille"> <i class="fab fa-github"></i></a>
                        <a href="#popup" class="inform" alumno='0'><i class="fas fa-plus"></i> info </a>
                </div>
            </div>

            <div class="perfil col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div class="nombrefoto d-flex flex-row ">
                    <img src="<?php echo base_url("assets/imagenes/portada/unnamed.jpg"); ?>"/>
                    <h2>Francisco Linares González</h2>
                </div>
                <div class='prueba_informacion'>
                    franlg.alm@gmail.com<br>
                </div>
                <div class="d-flex flex-row justify-content-around">
                        <a target="_blank" href=""><i class="fab fa-linkedin-in"></i> </a>
                        <a target="_blank" href="mailto:franlg.alm@gmail.com"><i class="far fa-envelope"></i> </a>
                        <a target="_blank" href=""> <i class="far fa-file-pdf"></i></a> 
                        <a target="_blank" href="https://github.com/FrankLG"> <i class="fab fa-github"></i></a>
                    <a href="#popup" class="inform" alumno='1'><i class="fas fa-plus"></i> info </a>
                </div>
            </div>

            <div class="perfil col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div class="nombrefoto d-flex flex-row ">
                    <img src="<?php echo base_url("assets/imagenes/portada/unnamed.jpg"); ?>"/>
                    <h2>Zygimantas Sniurevicius</h2>
                </div>
                <div class='prueba_informacion'>
                    zygis.1415@gmail.com<br>
                </div>
                <div class="d-flex flex-row justify-content-around">
                        <a target="_blank" href=""><i class="fab fa-linkedin-in"></i> </a>
                        <a target="_blank" href="mailto:zygis.1415@gmail.com"><i class="far fa-envelope"></i> </a>
                        <a target="_blank" href=""> <i class="far fa-file-pdf"></i></a> 
                        <a target="_blank" href="https://github.com/heremias22"> <i class="fab fa-github"></i></a>
                    <a href="#popup" class="inform" alumno='2'><i class="fas fa-plus"></i> info </a>
                </div>
            </div>
            
            <div class="perfil col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div class="nombrefoto d-flex flex-row ">
                    <img src="<?php echo base_url("assets/imagenes/portada/unnamed.jpg"); ?>"/>
                    <h2>Marc Expósito Miras</h2>
                </div>
                <div class='prueba_informacion'>
                    enconstruccion@mimail.com<br>
                </div>
                <div class="d-flex flex-row justify-content-around">
                        <a target="_blank" href=""><i class="fab fa-linkedin-in"></i> </a>
                        <a target="_blank" href=""><i class="far fa-envelope"></i> </a>
                        <a target="_blank" href=""> <i class="far fa-file-pdf"></i></a> 
                        <a target="_blank" href="https://github.com/MarcWotofok"> <i class="fab fa-github"></i></a>
                        <a href="#popup" class="inform" alumno='3'><i class="fas fa-plus"></i> info </a>
                </div>
            </div>
            
            <div class="perfil col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div class="nombrefoto d-flex flex-row ">
                    <img src="<?php echo base_url("assets/imagenes/portada/unnamed.jpg"); ?>"/>
                    <h2>Manuel González Mesa</h2>
                </div>
                <div class='prueba_informacion'>
                    enconstruccion@mimail.com<br>
                </div>
                <div class="d-flex flex-row justify-content-around">
                        <a target="_blank" href=""><i class="fab fa-linkedin-in"></i> </a>
                        <a target="_blank" href=""><i class="far fa-envelope"></i> </a>
                        <a target="_blank" href=""> <i class="far fa-file-pdf"></i></a> 
                        <a target="_blank" href="https://github.com/mgonzalezmesa"> <i class="fab fa-github"></i></a>
                        <a href="#popup" class="inform" alumno='4'><i class="fas fa-plus"></i> info </a>
                </div>
            </div>

            <div class="perfil col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div class="nombrefoto d-flex flex-row ">
                    <img src="<?php echo base_url("assets/imagenes/portada/unnamed.jpg"); ?>"/>
                    <h2>Alejandro López López</h2>
                </div>
                <div class='prueba_informacion'>
                    enconstruccion@mimail.com<br>
                </div>
                <div class="d-flex flex-row justify-content-around">
                        <a target="_blank" href=""><i class="fab fa-linkedin-in"></i> </a>
                        <a target="_blank" href=""><i class="far fa-envelope"></i> </a>
                        <a target="_blank" href=""> <i class="far fa-file-pdf"></i></a> 
                        <a target="_blank" href="https://github.com/Alfrik"> <i class="fab fa-github"></i></a>
                    <a href="#popup" class="inform" alumno='5'><i class="fas fa-plus"></i> info </a>
                </div>
            </div>
            
            <div class="perfil col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div class="nombrefoto d-flex flex-row ">
                    <img src="<?php echo base_url("assets/imagenes/portada/unnamed.jpg"); ?>"/>
                    <h2>Hamza Benhachmi</h2>
                </div>
                <div class='prueba_informacion'>
                    enconstruccion@mimail.com<br>
                </div>
                <div class="d-flex flex-row justify-content-around">
                        <a target="_blank" href=""><i class="fab fa-linkedin-in"></i> </a>
                        <a target="_blank" href=""><i class="far fa-envelope"></i> </a>
                        <a target="_blank" href=""> <i class="far fa-file-pdf"></i></a> 
                        <a target="_blank" href="https://github.com/jamudi"> <i class="fab fa-github"></i></a>
                    <a href="#popup" class="inform" alumno='6'><i class="fas fa-plus"></i> info </a>
                </div>
            </div>

            <div class="perfil col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div class="nombrefoto d-flex flex-row ">
                    <img src="<?php echo base_url("assets/imagenes/portada/unnamed.jpg"); ?>"/>
                    <h2>Miguel Ángel López Rodríguez</h2>
                </div>
                <div class='prueba_informacion'>
                    enconstruccion@mimail.com<br>
                </div>
                <div class="d-flex flex-row justify-content-around">
                        <a target="_blank" href=""><i class="fab fa-linkedin-in"></i> </a>
                        <a target="_blank" href=""><i class="far fa-envelope"></i> </a>
                        <a target="_blank" href=""> <i class="far fa-file-pdf"></i></a> 
                        <a target="_blank" href="https://github.com/MickeyLopez091"> <i class="fab fa-github"></i></a>
                    <a href="#popup" class="inform" alumno='7'><i class="fas fa-plus"></i> info </a>
                </div>
            </div>
        


            <div class="perfil col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div class="nombrefoto d-flex flex-row ">
                    <img src="<?php echo base_url("assets/imagenes/portada/unnamed.jpg"); ?>"/>
                    <h2>María Dolores Salmerón Sierra</h2>
                </div>
                <div class='prueba_informacion'>
                    salmeron.loli@gmail.com<br>
                </div>
                <div class="d-flex flex-row justify-content-around">
                        <a target="_blank" href=""><i class="fab fa-linkedin-in"></i> </a>
                        <a target="_blank" href="mailto:salmeron.loli@gmail.com"><i class="far fa-envelope"></i> </a>                       
                        <a target="_blank" href=""> <i class="far fa-file-pdf"></i></a> 
                        <a target="_blank" href="https://github.com/lolisalmeron"> <i class="fab fa-github"></i></a>
                    <a href="#popup" class="inform" alumno='8'><i class="fas fa-plus"></i> info </a>
                </div>
            </div>
 
            <div class="perfil col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div class="nombrefoto d-flex flex-row ">
                    <img src="<?php echo base_url("assets/imagenes/portada/unnamed.jpg"); ?>"/>
                    <h2>Álvaro Sánchez Casares</h2>
                </div>
                <div class='prueba_informacion'>
                    enconstruccion@mimail.com<br>
                </div>
                <div class="d-flex flex-row justify-content-around">
                        <a target="_blank" href=""><i class="fab fa-linkedin-in"></i> </a>
                        <a target="_blank" href=""><i class="far fa-envelope"></i> </a>
                        <a target="_blank" href=""> <i class="far fa-file-pdf"></i></a> 
                        <a target="_blank" href="https://github.com/Dansberg"> <i class="fab fa-github"></i></a>
                    <a href="#popup" class="inform" alumno='9'><i class="fas fa-plus"></i> info </a>
                </div>
            </div>

            <div class="perfil col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div class="nombrefoto d-flex flex-row ">
                    <img src="<?php echo base_url("assets/imagenes/portada/unnamed.jpg"); ?>"/>
                    <h2>José Luis Ramírez Jiménez</h2>
                </div>
                <div class='prueba_informacion'>
                    enconstruccion@mimail.com<br>
                </div>
                <div class="d-flex flex-row justify-content-around">
                        <a target="_blank" href=""><i class="fab fa-linkedin-in"></i> </a>
                        <a target="_blank" href=""><i class="far fa-envelope"></i> </a>
                        <a target="_blank" href=""> <i class="far fa-file-pdf"></i></a> 
                        <a target="_blank" href="https://github.com/pepeluchan"> <i class="fab fa-github"></i></a>
                    <a href="#popup" class="inform" alumno='10'><i class="fas fa-plus"></i> info </a>
                </div>
            </div>
        </div>
<br>        
<hr class='separador_creditos'>
    <h2 class="display-3">Profesores</h2>
        <div class="center-block" style="width:400px; margin:auto;">
            <ul class="list-group">
                <li class="list-group-item">Alfredo Moreno Vozmediano</li>
                <li class="list-group-item">Félix Expósito López</li>
                <li class="list-group-item">José Barranquero Infantes</li>
            </ul>
       </div> 
<br>        
<hr class='separador_creditos'>
<br>         
 	<h2 class="display-3">Colaboradores</h2>
        <div class="center-block" style="width:400px; margin:auto;">
            <ul class="list-group">
                <li class="list-group-item">Antonio Barrera Funes</li>
                <li class="list-group-item">María del Carmen Cuadrado Sánchez</li>
                <li class="list-group-item">María Belén Garzón</li>
                <li class="list-group-item">Trinidad Gómez Ruiz</li>
                <li class="list-group-item">María José Hernández Meca</li>
                <li class="list-group-item">José Luis Hurtado</li>
                <li class="list-group-item">Carmen Menéndez Suárez</li>
                <li class="list-group-item">Juan González Parra</li>
                <li class="list-group-item">Salvador Prieto Pérez</li>
                <li class="list-group-item">Luis Serrano Cortés</li>
                <li class="list-group-item">Manuela Soriano Sánchez</li>
            </ul>
       </div>         
       <br> <br> 
</div>
</div>

    <br> <br> 
   	<div class="modal-wrapper" id="popup">
		<div class="popup-contenedor">
			
			<h2 id="titulomodal" class="display-4">Ventana en desarrollo WIP</h2>
            <h5>Desarrollo realizado:</h5>
			<ul id="listaGoals">
                <li>Matar moscas a cañonazos</li> 
                <li>Montar cirios pascuales</li> 
                <li>Disparar con polvora de rey</li>   
                <li>Adorar a Zeus</li>  
            </ul>
			
			<a class="popup-cerrar" href="#">X</a>
		</div>
	</div> 

<script>
    var Miguel1 = ["Miguel Ángel López Segura", "<li>Coordinador</li><li>Desarrollo de los puntos destacados, frontend y backend</li><li>Desarrollo de la portada de la web, la cual se puede personalizar en el panel de administración</li><li>Desarrollo de los creditos</li><li>Desarrollo de la herramienta para crear hotspots (puntos de acción para saltar entre imagenes 360º, panel de información...)</li>"];
    var Fran = ["Francisco Linares", "<li>Encargado de todo el backend relacionado con el mapa y subida de las escenas</li><li>Ser Zeus</li><li>Desarrollo de los hotspots de tipo vídeo</li><li>Ser Zeus</li>"];
    var Zygis = ["Zygimantas Sniurevicius", "<li>Desarrollo de la visita guiada, frontend and backend</li><li>Encargado </li><li>Creación de todos los metodos encargados de que los hotspots (puntos de accion para saltar entre imagenes 360º, panel de información...) funcionen</li>"];
    var Marc = ["Marc Expósito Miras", "<li>Desarrollo de la biblioteca</li>"];
    var Manu = ["Manuel González Mesa", "<li>Desarrollo de la biblioteca</li>"];
    var Alejandro = ["Alejandro López López", "<li>Desarrollo de la biblioteca</li>"];
    var Hamza = ["Hamza Benhachmi", "<li>Encargado del backend relacionado con audio</li>"];
    var Miguel2 = ["Miguel Ángel López Rodríguez", "<li>Desarrollo del instalable del tour</li>"];
    var Loli =["María Dolores Salmerón Sierra", "<li>Encargada del backend relacionadas con las imagenes</li>"];
    var Alvaro = ["Álvaro Sánchez Casares", "<li>Diseño del dashboard</li>"];
    var Jose = ["José Luis Ramírez Jiménez", "<li>Captura de fotografias y audios</li>"];
    
    var alumnos2018 = [Miguel1, Fran, Zygis, Marc, Manu, Alejandro, Hamza, Miguel2, Loli, Alvaro, Jose];
    $(".inform").click(function(){
        var alumno = $(this).attr("alumno");
        $('#titulomodal').html(alumnos2018[alumno][0]);
        $('#listaGoals').html(alumnos2018[alumno][1]);
    });
</script>