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
        font-size: 2rem;
        font-weight: 300;
        line-height: 1.4;
        text-align: left;
        padding-left: 4px;
    }
    
.contenedor-modal {
  position: absolute;
  width: 100%;
  height: 100%;
  text-align: center;
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
                    enconstruccion@mimail.com<br>
                </div>
                <div class="d-flex flex-row justify-content-around">
                        <a href=""><i class="fab fa-linkedin-in"></i> </a>
                        <a href=""><i class="far fa-envelope"></i> </a>
                        <a href=""> <i class="far fa-file-pdf"></i></a> 
                        <a href=""> <i class="fab fa-github"></i></a>
                    <a href=""><i class="fas fa-plus"></i> info </a>
                </div>
            </div>

            <div class="perfil col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div class="nombrefoto d-flex flex-row ">
                    <img src="<?php echo base_url("assets/imagenes/portada/unnamed.jpg"); ?>"/>
                    <h2>Francisco Linares González</h2>
                </div>
                <div class='prueba_informacion'>
                    enconstruccion@mimail.com<br>
                </div>
                <div class="d-flex flex-row justify-content-around">
                        <a href=""><i class="fab fa-linkedin-in"></i> </a>
                        <a href=""><i class="far fa-envelope"></i> </a>
                        <a href=""> <i class="far fa-file-pdf"></i></a> 
                        <a href=""> <i class="fab fa-github"></i></a>
                    <a href=""><i class="fas fa-plus"></i> info </a>
                </div>
            </div>

            <div class="perfil col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div class="nombrefoto d-flex flex-row ">
                    <img src="<?php echo base_url("assets/imagenes/portada/unnamed.jpg"); ?>"/>
                    <h2>Zygimantas Sniurevicius</h2>
                </div>
                <div class='prueba_informacion'>
                    enconstruccion@mimail.com<br>
                </div>
                <div class="d-flex flex-row justify-content-around">
                        <a href=""><i class="fab fa-linkedin-in"></i> </a>
                        <a href=""><i class="far fa-envelope"></i> </a>
                        <a href=""> <i class="far fa-file-pdf"></i></a> 
                        <a href=""> <i class="fab fa-github"></i></a>
                    <a href=""><i class="fas fa-plus"></i> info </a>
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
                        <a href=""><i class="fab fa-linkedin-in"></i> </a>
                        <a href=""><i class="far fa-envelope"></i> </a>
                        <a href=""> <i class="far fa-file-pdf"></i></a> 
                        <a href=""> <i class="fab fa-github"></i></a>
                    <a href=""><i class="fas fa-plus"></i> info </a>
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
                        <a href=""><i class="fab fa-linkedin-in"></i> </a>
                        <a href=""><i class="far fa-envelope"></i> </a>
                        <a href=""> <i class="far fa-file-pdf"></i></a> 
                        <a href=""> <i class="fab fa-github"></i></a>
                    <a href=""><i class="fas fa-plus"></i> info </a>
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
                        <a href=""><i class="fab fa-linkedin-in"></i> </a>
                        <a href=""><i class="far fa-envelope"></i> </a>
                        <a href=""> <i class="far fa-file-pdf"></i></a> 
                        <a href=""> <i class="fab fa-github"></i></a>
                    <a href=""><i class="fas fa-plus"></i> info </a>
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
                        <a href=""><i class="fab fa-linkedin-in"></i> </a>
                        <a href=""><i class="far fa-envelope"></i> </a>
                        <a href=""> <i class="far fa-file-pdf"></i></a> 
                        <a href=""> <i class="fab fa-github"></i></a>
                    <a href=""><i class="fas fa-plus"></i> info </a>
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
                        <a href=""><i class="fab fa-linkedin-in"></i> </a>
                        <a href=""><i class="far fa-envelope"></i> </a>
                        <a href=""> <i class="far fa-file-pdf"></i></a> 
                        <a href=""> <i class="fab fa-github"></i></a>
                    <a href=""><i class="fas fa-plus"></i> info </a>
                </div>
            </div>
        


            <div class="perfil col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div class="nombrefoto d-flex flex-row ">
                    <img src="<?php echo base_url("assets/imagenes/portada/unnamed.jpg"); ?>"/>
                    <h2>María Dolores Salmerón Segura</h2>
                </div>
                <div class='prueba_informacion'>
                    enconstruccion@mimail.com<br>
                </div>
                <div class="d-flex flex-row justify-content-around">
                        <a href=""><i class="fab fa-linkedin-in"></i> </a>
                        <a href=""><i class="far fa-envelope"></i> </a>
                        <a href=""> <i class="far fa-file-pdf"></i></a> 
                        <a href=""> <i class="fab fa-github"></i></a>
                    <a href=""><i class="fas fa-plus"></i> info </a>
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
                        <a href=""><i class="fab fa-linkedin-in"></i> </a>
                        <a href=""><i class="far fa-envelope"></i> </a>
                        <a href=""> <i class="far fa-file-pdf"></i></a> 
                        <a href=""> <i class="fab fa-github"></i></a>
                    <a href=""><i class="fas fa-plus"></i> info </a>
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
                        <a href=""><i class="fab fa-linkedin-in"></i> </a>
                        <a href=""><i class="far fa-envelope"></i> </a>
                        <a href=""> <i class="far fa-file-pdf"></i></a> 
                        <a href=""> <i class="fab fa-github"></i></a>
                    <a href=""><i class="fas fa-plus"></i> info </a>
                </div>
            </div>
        </div>
<br>        
<hr class='separador_creditos'>
    <h2 class="display-4">Profesores</h2>
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
 	<h2 class="display-4">Colaboradores</h2>
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

    <br> <br> <br> 

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  +info
</button>
Cada desarrollador tendrá su ventana modal con todo lo que haya hecho, se accede en el botón más info, tras hacer click en este cambiará el contenido de la modal

<!-- Modal por mejorar -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nombre</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Aportaciones
          <ul>
            <li>Desarrollo de tal</li>
            <li>Desarrollo de cual</li>
            <li>Desarrollador de la parte del backend: audio</li>  
            <li>blablabla</li>  
            <li>tal y cual</li>
          </ul>
      </div>
      <div class="modal-footer">
        <div class="d-flex flex-row justify-content-around">
             <a href=""><i class="fab fa-linkedin-in"></i> </a>
             <a href=""><i class="far fa-envelope"></i> </a>
             <a href=""> <i class="far fa-file-pdf"></i></a> 
            <a href=""> <i class="fab fa-github"></i></a>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>
