    
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
          
        
        <input type="text" placeholder="  Buscar..."><i class="fa fa-search" style="color: white; font-size: 22px; cursor: pointer; position: absolute; right: 27px; top:70px;;"></i>
        <br><br><br>
        <a href="<?php echo site_url("imagen");?>" class="enlacesidenav">Administrar Imagenes</a>
        <a href="<?php echo site_url("audio");?>" class="enlacesidenav">Administrar Audios</a>
        <a href="<?php echo site_url("video");?>" class="enlacesidenav">Administrar Vídeos</a>
        <a href="<?php echo site_url("escenas");?>" class="enlacesidenav">Administrar Escenas</a>
        <a href="<?php echo site_url("hotspots");?>" class="enlacesidenav">Administrar Hotspots</a>
        <a href="<?php echo site_url("usuario/usuarios");?>" class="enlacesidenav">Administrar Usuarios</a>
        <a href="<?php echo site_url("biblioteca");?>" class="enlacesidenav">Administrar Bibilioteca </a>
        
    </div>
    
    <span class="sidenavmenu" onclick="openNav()">&#9776; Menu </span>

    

