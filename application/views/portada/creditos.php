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
<script>
$(document).ready(function(){
   $('html, body').css({
        overflow: 'auto',
    });

colaboradores = "<?php echo $portada[15]['opcion_valor'] ?>";

 items = colaboradores.split(",");
   
    for(i=0;i< items.length ; i++ )
    {
        var para= document.createElement("li");
        var node = document.createTextNode(items[i]);
        para.appendChild(node);
        para.setAttribute("class", "list-group-item");
        var element = document.getElementById("colaboradores");
        
        element.appendChild(para);
    }
});




</script>
<style>
    body{
        overflow-y: auto;
        background-color: #2B3E50 !important;
        background-image:none !important;
    }
    .list-group-item{border: 1px solid black !important ;}

    a[href=""] img{
       opacity: 0.2   
        }
        a[href=""]{
            pointer-events: none;
        cursor: default;        
        }

</style>

<div class='container'>

    <div class="row margen-superior mt-5">
        <div class="col-md-6 mx-auto bg-secondary">
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
        
    <!-- COLABORADORES -->
    <div class="row">
        <div class="col-md-6 mx-auto mb-3 mt-3">
            <h2 class="text-center">Colaboradores</h2>
            <ul class="list-group" id="colaboradores">
           
            
                
            </ul>
        </div>
    </div>
       <!-- FIN COLABORADORES -->
</div><!-- FINAL DE CONTAINER -->

<!-- 	
    Matar moscas a cañonazos 
    Montar cirios pascuales 
    Disparar con polvora de rey
    Es lo que nos diferencia de uno de la calle  
-->

<!-- <li class="list-group-item" >Antonio Barrera Funes</li>
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
                -->