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

<link rel="stylesheet" href="<?php echo base_url("assets/css/style.css"); ?>">

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
        background-color: #2B3E50 !important;
        background-image:none !important;
    }

    /* Estilos de la ventana modal */

   
</style>

<div class='container'>

    <div class="row margen-superior bg-secondary mt-5">
        <div class="col-md-10 mx-auto">
            <h1 class="text-center">¿Qué es CeliaTour?</h1>
            <p class="text-justify">Es una aplicación web para la creación de recorridos virtuales a partir de fotografías 360 desarrollada por el alumnado de 2º curso del Ciclo Formativo de Desarrollo de Aplicaciones Web en IES Celia Viñas de Almería (España) durante el curso 2017/2018.</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 mx-auto mb-3 mt-3">
            <h2 class="text-center">Equipo de desarrollo</h2>
        </div>
    </div>
 
<div class="row">
        <div class="col-md-6 mx-auto mb-3 mt-3">
            <h2 class="text-center">Desarrolladores</h2>
            <ul class="list-group">
                <li class="list-group-item">
                <p class="d-inline" >Miguel Ángel Lopéz Segura </p>
                    <a class="d-inline" target="_blank" href="https://www.linkedin.com/in/miguel-ángel-lópez-segura-ba1809114/"><img class="float-right mr-2 mt-3"  style="width:20px;"src=<?php echo base_url('assets/css/svg/linkedin-in-brands.svg'); ?>></a> 
                    <a class="d-inline" target="_blank" href="mailto:migueldevelopez@gmail.com"><img class="float-right mr-2 mt-3"  style="width:20px;"src=<?php echo base_url('assets/css/svg/envelope-regular.svg'); ?>></a>
                    <a class="d-inline" target="_blank" href="https://github.com/miguelille" ><img class="float-right mr-2 mt-3"  style="width:20px;"src=<?php echo base_url('assets/css/svg/github-brands.svg'); ?>></a>
                </li>
                <li class="list-group-item">
                <p class="d-inline" >Francisco Linares González</p>
                    <a class="d-inline" target="_blank" href=><img class="float-right mr-2 mt-3"  style="width:20px;"src=<?php echo base_url('assets/css/svg/linkedin-in-brands.svg'); ?>></a> 
                    <a class="d-inline" target="_blank" href="mailto:franlg.alm@gmail.com"><img class="float-right mr-2 mt-3"  style="width:20px;"src=<?php echo base_url('assets/css/svg/envelope-regular.svg'); ?>></a>
                    <a class="d-inline" target="_blank" href="https://github.com/FrankLG"><img class="float-right mr-2 mt-3"  style="width:20px;"src=<?php echo base_url('assets/css/svg/github-brands.svg'); ?>></a>
                 </li>
                <li class="list-group-item">
                <p class="d-inline" >Zygimantas Sniurevicius</p>
                    <a class="d-inline" target="_blank" href=><img class="float-right mr-2 mt-3"  style="width:20px;"src=<?php echo base_url('assets/css/svg/linkedin-in-brands.svg'); ?>></a> 
                    <a class="d-inline" target="_blank" href= "mailto:zygis.1415@gmail.com"><img class="float-right mr-2 mt-3"  style="width:20px;"src=<?php echo base_url('assets/css/svg/envelope-regular.svg'); ?>></a>
                    <a  class="d-inline"  target="_blank" href= "https://github.com/heremias22"><img class="float-right mr-2 mt-3"  style="width:20px;"src=<?php echo base_url('assets/css/svg/github-brands.svg'); ?>></a>
                </li>

                <li class="list-group-item">
                <p class="d-inline" >Marc Expósito Miras</p>
                    <a class="d-inline" target="_blank" href=><img class="float-right mr-2 mt-3"  style="width:20px;"src=<?php echo base_url('assets/css/svg/linkedin-in-brands.svg'); ?>></a> 
                    <a class="d-inline" target="_blank" href=><img class="float-right mr-2 mt-3"  style="width:20px;"src=<?php echo base_url('assets/css/svg/envelope-regular.svg'); ?>></a>
                    <a class="d-inline" target="_blank" href="https://github.com/MarcWotofok"><img class="float-right mr-2 mt-3"  style="width:20px;"src=<?php echo base_url('assets/css/svg/github-brands.svg'); ?>></a>
                </li>
                <li class="list-group-item">
                <p class="d-inline" >Manuel González Mesa</p>
                    <a class="d-inline"  target="_blank" href=><img class="float-right mr-2 mt-3"  style="width:20px;"src=<?php echo base_url('assets/css/svg/linkedin-in-brands.svg'); ?>></a> 
                    <a class="d-inline" target="_blank" href=><img class="float-right mr-2 mt-3"  style="width:20px;"src=<?php echo base_url('assets/css/svg/envelope-regular.svg'); ?>></a>
                    <a class="d-inline" target="_blank" href="https://github.com/MarcWotofok"><img class="float-right mr-2 mt-3"  style="width:20px;"src=<?php echo base_url('assets/css/svg/github-brands.svg'); ?>></a>
                </li>
                <li class="list-group-item">
                <p class="d-inline" >Alejandro López López</p>
                    <a class="d-inline" target="_blank" href=><img class="float-right mr-2 mt-3"  style="width:20px;"src=<?php echo base_url('assets/css/svg/linkedin-in-brands.svg'); ?>></a> 
                    <a class="d-inline" target="_blank" href="mailto:f.alejandrolopez92@gmail.com"><img class="float-right mr-2 mt-3"  style="width:20px;"src=<?php echo base_url('assets/css/svg/envelope-regular.svg'); ?>></a>
                    <a class="d-inline" target="_blank" href="https://github.com/Alfrik"><img class="float-right mr-2 mt-3"  style="width:20px;"src=<?php echo base_url('assets/css/svg/github-brands.svg'); ?>></a>
                </li>
                <li class="list-group-item">
                <p class="d-inline" >Hamza Benhachmi</p>
                    <a class="d-inline" target="_blank" href=><img class="float-right mr-2 mt-3"  style="width:20px;"src=<?php echo base_url('assets/css/svg/linkedin-in-brands.svg'); ?>></a> 
                    <a class="d-inline" target="_blank" href=><img class="float-right mr-2 mt-3"  style="width:20px;"src=<?php echo base_url('assets/css/svg/envelope-regular.svg'); ?>></a>
                    <a class="d-inline" target="_blank" href="https://github.com/jamudi"><img class="float-right mr-2 mt-3"  style="width:20px;"src=<?php echo base_url('assets/css/svg/github-brands.svg'); ?>></a>
                </li>
                <li class="list-group-item">
                <p class="d-inline" >Miguel Ángel López Rodríguez</p>
                    <a class="d-inline" target="_blank" href=><img class="float-right mr-2 mt-3"  style="width:20px;"src=<?php echo base_url('assets/css/svg/linkedin-in-brands.svg'); ?>></a> 
                    <a class="d-inline" target="_blank" href=><img class="float-right mr-2 mt-3"  style="width:20px;"src=<?php echo base_url('assets/css/svg/envelope-regular.svg'); ?>></a>
                    <a class="d-inline" target="_blank"  href="https://github.com/MickeyLopez091"><img class="float-right mr-2 mt-3"  style="width:20px;"src=<?php echo base_url('assets/css/svg/github-brands.svg'); ?>></a>
                </li>
                <li class="list-group-item">
                <p class="d-inline" >María Dolores Salmerón Sierra</p>
                <a class="d-inline" target="_blank" href="https://drive.google.com/file/d/1J_y25TEknArM3Q6nNnbq78cy57zi0FzD/view?usp=sharing"><img class="float-right mr-2 mt-3"  style="width:15px;"src=<?php echo base_url('assets/css/svg/file-pdf-regular.svg'); ?>></a>
                <a class="d-inline" target="_blank" href=><img class="float-right mr-2 mt-3"  style="width:20px;"src=<?php echo base_url('assets/css/svg/linkedin-in-brands.svg'); ?>></a> 
                <a class="d-inline" target="_blank" href="mailto:salmeron.loli@gmail.com"><img class="float-right mr-2 mt-3"  style="width:20px;"src=<?php echo base_url('assets/css/svg/envelope-regular.svg'); ?>></a>
                <a class="d-inline" target="_blank" href="https://github.com/lolisalmeron"><img class="float-right mr-2 mt-3"  style="width:20px;"src=<?php echo base_url('assets/css/svg/github-brands.svg'); ?>></a>
                </li>
                <li class="list-group-item">
                <p class="d-inline" >Álvaro Sánchez Casares</p>
                    <a class="d-inline" target="_blank" href=><img class="float-right mr-2 mt-3"  style="width:20px;"src=<?php echo base_url('assets/css/svg/linkedin-in-brands.svg'); ?>></a> 
                    <a class="d-inline" target="_blank" href=><img class="float-right mr-2 mt-3"  style="width:20px;"src=<?php echo base_url('assets/css/svg/envelope-regular.svg'); ?>></a>
                    <a class="d-inline" target="_blank" href="https://github.com/Dansberg"><img class="float-right mr-2 mt-3"  style="width:20px;"src=<?php echo base_url('assets/css/svg/github-brands.svg'); ?>></a>
                </li>
                <li class="list-group-item">
                <p class="d-inline" >José Luis Ramírez Jiménez</p>
                    <a class="d-inline" target="_blank" href=><img class="float-right mr-2 mt-3"  style="width:20px;"src=<?php echo base_url('assets/css/svg/linkedin-in-brands.svg'); ?>></a> 
                    <a class="d-inline" target="_blank" href=><img class="float-right mr-2 mt-3"  style="width:20px;"src=<?php echo base_url('assets/css/svg/envelope-regular.svg'); ?>></a>
                    <a class="d-inline" target="_blank" href="https://github.com/Dansberg"><img class="float-right mr-2 mt-3"  style="width:20px;"src=<?php echo base_url('assets/css/svg/github-brands.svg'); ?>></a>
                </li>
                <li class="list-group-item">
                <p class="d-inline" >David Ramón Casanova</p>
                    <a class="d-inline" target="_blank" href="https://www.linkedin.com/in/david-ramon-casanova/"><img class="float-right mr-2 mt-3"  style="width:20px;"src=<?php echo base_url('assets/css/svg/linkedin-in-brands.svg'); ?>></a> 
                    <a class="d-inline" target="_blank" href="davidramoncasanova98@gmail.com"><img class="float-right mr-2 mt-3"  style="width:20px;"src=<?php echo base_url('assets/css/svg/envelope-regular.svg'); ?>></a>
                    <a class="d-inline" target="_blank" href="https://github.com/DavidRamon15"><img class="float-right mr-2 mt-3"  style="width:20px;"src=<?php echo base_url('assets/css/svg/github-brands.svg'); ?>></a>
                </li>
                <li class="list-group-item">
                    <p class="d-inline">Daniel Sanchez Gil</p>
                    <a class="d-inline" target="_blank" href="https://www.linkedin.com/in/daniel-sanchez-gil"><img class="float-right mr-2 mt-3"  style="width:20px;"src=<?php echo base_url('assets/css/svg/linkedin-in-brands.svg'); ?>></a> 
                    <a class="d-inline" target="_blank" href="mailto:danielsanchezgil95@gmail.com"><img class="float-right mr-2 mt-3"  style="width:20px;"src=<?php echo base_url('assets/css/svg/envelope-regular.svg'); ?>></a>
                    <a class="d-inline" target="_blank" href="https://github.com/vampy95"><img class="float-right mr-2 mt-3"  style="width:20px;"src=<?php echo base_url('assets/css/svg/github-brands.svg'); ?>></a>
                </li>
                <li class="list-group-item">David Mora Cáceres
                    <a class="d-inline" target="_blank" href="https://www.linkedin.com/in/david-mora-/"><img class="float-right mr-2 mt-3"  style="width:20px;"src=<?php echo base_url('assets/css/svg/linkedin-in-brands.svg'); ?>></a> 
                    <a class="d-inline" target="_blank" href="mailto:davidmoracaceres2@gmail.com"><img class="float-right mr-2 mt-3"  style="width:20px"src=<?php echo base_url('assets/css/svg/envelope-regular.svg'); ?>></a>
                    <a class="d-inline" target="_blank" href="https://github.com/dmc21"><img class="float-right mr-2 mt-3"  style="width:20px;"src=<?php echo base_url('assets/css/svg/github-brands.svg'); ?>></a>
                </li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mx-auto mb-3 mt-3">
            <h2 class="text-center">Profesores</h2>
            <ul class="list-group">
                <li class="list-group-item">Alfredo Moreno Vozmediano</li>
                <li class="list-group-item">Félix Expósito López</li>
                <li class="list-group-item">José Barranquero Infantes</li>
            </ul>
        </div>
    </div>

<style>
   .list-group-item{border: 1px solid black !important ;}
</style>
    <div class="row">
        <div class="col-md-6 mx-auto mb-3 mt-3">
            <h2 class="text-center">Colaboradores</h2>
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
    </div>

<!-- FINAL DE CONTAINER -->

  <!-- 	
                <li>Matar moscas a cañonazos</li> 
                <li>Montar cirios pascuales</li> 
                <li>Disparar con polvora de rey</li>
                <li>Es lo que nos diferencia de uno de la calle</li>   
    -->
<script>

    /* Script para el funcionamiento de las ventanas modales */

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
    var DanielS = [];
    var DavidR = [];
    var DavidM = [];
    
    var alumnos2018 = [Miguel1, Fran, Zygis, Marc, Manu, Alejandro, Hamza, Miguel2, Loli, Alvaro, Jose, DanielS, DavidR, DavidM];
    $(".inform").click(function(){
        var alumno = $(this).attr("alumno");
        $('#titulomodal').html(alumnos2018[alumno][0]);
        $('#listaGoals').html(alumnos2018[alumno][1]);
    });
</script>
