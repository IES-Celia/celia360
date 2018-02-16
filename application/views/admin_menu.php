    
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
          
        
        <br><br><br>
        <a href="<?php echo site_url("imagen");?>" class="enlacesidenav"> Imagenes</a>
        <a href="<?php echo site_url("audio");?>" class="enlacesidenav"> Audios</a>
        <a href="<?php echo site_url("video");?>" class="enlacesidenav"> Vídeos</a>
        <a href="<?php echo site_url("escenas");?>" class="enlacesidenav"> Escenas</a>
        <a href="<?php echo site_url("hotspots");?>" class="enlacesidenav"> Hotspots</a>
        <a href="<?php echo site_url("usuario/usuarios");?>" class="enlacesidenav"> Usuarios</a>
        <a href="<?php echo site_url("biblioteca");?>" class="enlacesidenav"> Bibilioteca </a>
        
    </div>
    
    <span class="sidenavmenu" onclick="openNav()">&#9776; Menu </span>

    

