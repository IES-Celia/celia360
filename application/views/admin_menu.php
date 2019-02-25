<script>
    function openNav() {
	    document.getElementById("mySidenav").style.width = "250px";	
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }
        
</script>  
<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <br><br>
    <a href="<?php echo site_url("escenas");?>" class="enlacesidenav">Mapa</a>
    <a href="<?php echo site_url("guiada/menuGuiada");?>" class="enlacesidenav">Guiada</a>
    <a href="<?php echo site_url("PuntosDestacados/cargar_admin_puntosdestacados");?>" class="enlacesidenav">Destacados</a>
    <a href="<?php echo site_url("biblioteca");?>" class="enlacesidenav"> Biblioteca</a>
    <a href="<?php echo site_url("imagen");?>" class="enlacesidenav"> Imágenes</a>
    <a href="<?php echo site_url("audio");?>" class="enlacesidenav"> Audios</a>
    <a href="<?php echo site_url("video");?>" class="enlacesidenav"> Vídeos</a>
    <a href="<?php echo site_url("usuario/usuarios");?>" class="enlacesidenav"> Usuarios</a>
    <a href="<?php echo site_url("tour/formulario_portada");?>" class="enlacesidenav"> Portada</a>
    <a href="<?php echo site_url("backup");?>" class="enlacesidenav">Backup</a>
    <br><br>
    <p><a href='<?php echo site_url("usuario/cerrarSesion");?>' class="cerrarsesionbtn">Cerrar Sesión</a></p>
</div>


    

