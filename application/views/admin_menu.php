    
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
        <a href="#" class="enlacesidenav">Administrar Imagenes</a>
        <a href="#" class="enlacesidenav">Administrar Audios</a>
        <a href="#" class="enlacesidenav">Administrar Vídeos</a>
        <a href="#" class="enlacesidenav">Administrar Escenas</a>
        <a href="#" class="enlacesidenav">Administrar Hotspots</a>
        <a href="#" class="enlacesidenav">Administrar Usuarios</a>
        <a href="#" class="enlacesidenav">Administrar Bibilioteca </a>
        
    </div>
    
    <span class="sidenavmenu" onclick="openNav()">&#9776; Menu </span>

    


<p>
    <table align="center" border= '2px solid' id="menu">
    
    <tr>
        
    <td><a href="<?php echo site_url("imagen");?>">Administrar imágenes</a></td>
    
    <td><a href="<?php echo site_url("audio");?>">Administrar audios</a></td>
    
    <td><a href="<?php echo site_url("video");?>">Administrar vídeos</a></td>
    
    <td><a href="<?php echo site_url("escenas");?>">Administrar escenas</a></td>
    
    <td><a href="<?php echo site_url("hotspots");?>">Administrar hotspots</a></td>
    
    <td><a href="<?php echo site_url("usuario/usuarios");?>">Administrar usuarios</a></td>
    
    <td><a href="<?php echo site_url("biblioteca");?>">Administrar biblioteca</a></td>
    
    </tr>
    
    </table>
</p>