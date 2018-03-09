<?php ?>

<style>

*{
    margin:0px;
    padding:0px;
    box-sizing: border-box;
}

body{
    background-color: grey;
}

.grid_creditos{
    display:flex;
    flex-wrap: wrap;
    flex-direction: row;
}

.container_creditos {
  margin: 0 auto;
  max-width: 900px;
  padding: 0 1rem;
}

.responsive-image {
  max-width: 100%;
}

.celda_creditos img {
  display: block;
}
/* HEADER */
#header_portada {
    width: 100%;
    background: url('../imagenes/portada/header-bg2.png');
    height: 110px;
    position: absolute;
    margin-top: 0px;
    
}

.contenedor_portada{ 
    margin: 0 auto; width: 960px; 
}

#header_portada {
    width: 100%;
    background: url('../imagenes/portada/header-bg2.png');
    height: 110px;
    position: absolute;
    margin-top: 0px;
    z-index:5
}

#nav_portada { 
     float: left;  
   
}

#nav_portada img{
    width: 50px;
    margin-top: 0px; 
}

#logo a { 
    color: #fff; 
    text-decoration: none; 
    float: left; 
    font-size: 45px; 
    margin-top: 25px; 
    color: #fff; 
    font-family:"Lato"; 
    font-weight: bold; 
}

#descripcion_portada{
    font-family:"Lato";
    font-size: 30px;
    color: white;
    margin-top: 20px;
    text-shadow: 1px 1px #262626;

}

 
#nav_portada ul{
    list-style: none;
    display: inline;
    margin: 0 auto;
}

#nav_portada li{
    margin-top: 23px;
    float: left;
    padding-left: 21px;
    cursor:pointer;
}

#nav_portada li a { 
    margin-top: 15px;
    color: #fff; 
    opacity:0.9; 
    font-size: 30px; 
    text-decoration: none; 
    font-family: 'helvetica'; 
    display:block;
    transition:transform 0.1s ease-out;
}

#nav_portada li a:hover { 
    color: #fff; 
    opacity:1; 
    transform: scale(1.1);
}

#header_portada{
    background-color:rgba(0.0,0.0,0.0,0.70);
    width: 100%;
}

#nav_portada img{
    transition:transform 0.1s ease-out;
}

#nav_portada img:hover{
    transform: scale(1.4);
}



</style>


<header id="header_portada">
    <div class="contenedor_portada">
    <nav id="nav_portada">
        <ul>
        <li><img src="<?php echo base_url("assets/imagenes/portada/logo.png"); ?>"/> </li>
        <li><a id="opcionlibre_portada" onclick='visita_opcion("get_json_libre");'>Tour's</a></li>
        <li><a id="opcionguiada_portada" onclick='visita_opcion("get_json_guiada");'>Biblioteca</a></li>
        <li><a href="<?php echo site_url("Puntos_destacados/cargar_puntosdestacados"); ?>" id="opciondestacada_portada">Administracion</a></li>
        <li><a id="clickbiblio" href="<?php echo site_url("biblioteca/vertodosloslibros"); ?>">Dise&ntilde;o</a></li>
        <li><a href="<?php echo site_url("welcome");?>" id="creditos_portada">Colaboradores</a></li>
        </ul>
    </nav>
    </div>
</header>


<h2>Creditos</h2>


<div class="container_creditos">
  <div class="grid_creditos">
    <div class="celda_creditos">
      <img src="http://placehold.it/200x200" class="responsive-image">
    </div>
    <div class="celda_creditos">
      <img src="http://placehold.it/200x200" class="responsive-image">
    </div>
    <div class="celda_creditos">
      <img src="http://placehold.it/200x200" class="responsive-image">
    </div>
    <div class="celda_creditos">
      <img src="http://placehold.it/200x200" class="responsive-image">
    </div>
    <div class="celda_creditos">
      <img src="http://placehold.it/200x200" class="responsive-image">
    </div>
    <div class="celda_creditos">
      <img src="http://placehold.it/200x200" class="responsive-image">
    </div>
    <div class="celda_creditos">
      <img src="http://placehold.it/200x200" class="responsive-image">
    </div>
    <div class="celda_creditos">
      <img src="http://placehold.it/200x200" class="responsive-image">
    </div>
    <div class="celda_creditos">
      <img src="http://placehold.it/200x200" class="responsive-image">
    </div>
    <div class="celda_creditos">
      <img src="http://placehold.it/200x200" class="responsive-image">
    </div>
    <div class="celda_creditos">
      <img src="http://placehold.it/200x200" class="responsive-image">
    </div>
  </div>
</div>