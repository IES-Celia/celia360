<?php 
$enlace_svg = base_url("assets/css/svg/back_portada.svg");
$enlace_volver = "background-image: url('".$enlace_svg."')";


?>
<script src="<?php echo base_url("assets/js/jquery.js"); ?>"></script>
<style>

*{
    margin:0px;
    padding:0px;
    box-sizing: border-box;
}

body{
    background-color: grey;
}

/* GALERIA CREDITOS */
.grid_creditos{
    display:flex;
    flex-wrap: wrap;
    flex-direction: row;
}

.container_creditos {
  margin: 0 auto;
  max-width: 900px;
  padding: 10rem 1rem;
  display:none;
}

.responsive-image {
  max-width: 100%;
}

.celda_creditos{
    margin: 4px;
    position:relative;
}

.celda_creditos img {
  display: block;
}

.hover_nombre{
    color: black;
    bottom:5px;
    text-align: center;
    font-size: 1.4rem;
    position: absolute;
    width:100%;
    display:none;
    transition:transform 0.1s ease-out;
}


/* HEADER */
#header_portada {
    height: 110px;
    position: fixed;
    margin-top: 0px;
    background-color:black;
    width: 100%;
    
}
body{
    height:3000px;
    width:auto;
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

#volver_atras{
    position:relative;
    width:40px;
    height:40px;
    background-size:contain;
    background-repeat: no-repeat;
    background-position: center;
    margin-top:10px;
    margin-right:20px;
    transition:transform 0.1s ease-out;
}

#volver_atras:hover{
    transform: scale(1.4);
}


#izq_creditos{
    position:absolute;
    left:5%;
    top:50%;
    transform: translateX(50%);
}
#der_creditos{
    position:absolute;
    right:5%;
    top:50%;
    transform: translateX(50%);
}

#selector_creditos{
    width:30px;
    height:30px;
    border-radius:50%;
    background-color:yellow;
    position:absolute;
    z-index:2;
    top:95px;
    left:307px;
}

#prueba_contenedor{
  margin: 0 auto;
  max-width: 900px;
  padding: 10rem 1rem;
 
}

.separador_creditos{
    background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(255, 255, 255, 0.75), rgba(0, 0, 0, 0));
    margin:50px 0;
    border:0;
    height: 2px;
}
.prueba_carta{
    display:flex;
    justify-content: space-between;
}
#prueba_cartas{
    margin-top:100px;
}


</style>

<!-- 
    tilt.js para fotos?
    svg de volver atras
    "background-image: url('.base_url(sdsdsd).')"
-->

<div id='prueba_contenedor'>

    <div id='prueba_cartas'>

        <hr class='separador_creditos'>

        <div class='prueba_carta'>

            <div>
                <h2>En construcción</h2>
                    <div class='prueba_informacion'>Informacion de la persona<br>Email:Juanpalomo@gmail.com</div>
                    <div class='redes'>Linkedin , BADO , Vodafone</div>
            </div>

              <div>
                <h2>En construcción</h2>
                    <div class='prueba_informacion'>Informacion de la persona<br>Email:Juanpalomo@gmail.com</div>
                    <div class='redes'>Linkedin , BADO , Vodafone</div>
            </div>

              <div>
                <h2>En construcción</h2>
                    <div class='prueba_informacion'>Informacion de la persona<br>Email:Juanpalomo@gmail.com</div>
                    <div class='redes'>Linkedin , BADO , Vodafone</div>
            </div>
        </div>

        <hr class='separador_creditos'>

        <div class='prueba_carta'>

            <div>
                <h2>En construcción</h2>
                    <div class='prueba_informacion'>Informacion de la persona<br>Email:Juanpalomo@gmail.com</div>
                    <div class='redes'>Linkedin , BADO , Vodafone</div>
            </div>

              <div>
                <h2>En construcción</h2>
                    <div class='prueba_informacion'>Informacion de la persona<br>Email:Juanpalomo@gmail.com</div>
                    <div class='redes'>Linkedin , BADO , Vodafone</div>
            </div>

              <div>
                <h2>En construcción</h2>
                    <div class='prueba_informacion'>Informacion de la persona<br>Email:Juanpalomo@gmail.com</div>
                    <div class='redes'>Linkedin , BADO , Vodafone</div>
            </div>
        </div>

         <hr class='separador_creditos'>

        <div class='prueba_carta'>

            <div>
                <h2>En construcción</h2>
                    <div class='prueba_informacion'>Informacion de la persona<br>Email:Juanpalomo@gmail.com</div>
                    <div class='redes'>Linkedin , BADO , Vodafone</div>
            </div>

              <div>
                <h2>En construcción</h2>
                    <div class='prueba_informacion'>Informacion de la persona<br>Email:Juanpalomo@gmail.com</div>
                    <div class='redes'>Linkedin , BADO , Vodafone</div>
            </div>

              <div>
                <h2>En construcción</h2>
                    <div class='prueba_informacion'>Informacion de la persona<br>Email:Juanpalomo@gmail.com</div>
                    <div class='redes'>Linkedin , BADO , Vodafone</div>
            </div>
        </div>

         <hr class='separador_creditos'>

        <div class='prueba_carta'>

            <div>
                <h2>En construcción</h2>
                    <div class='prueba_informacion'>Informacion de la persona<br>Email:Juanpalomo@gmail.com</div>
                    <div class='redes'>Linkedin , BADO , Vodafone</div>
            </div>

              <div>
                <h2>En construcción</h2>
                    <div class='prueba_informacion'>Informacion de la persona<br>Email:Juanpalomo@gmail.com</div>
                    <div class='redes'>Linkedin , BADO , Vodafone</div>
            </div>
        </div>

        
        
         

    </div>

</div>


  <hr class='separador_creditos'>
    <h2 align='center'>Tour's</h2>

    <hr class='separador_creditos'>
    <h2 align='center'>Biblioteca</h2>

    <hr class='separador_creditos'>
    <h2 align='center'>Administración</h2>

    <hr class='separador_creditos'>
    <h2 align='center'>Diseño</h2>

    <hr class='separador_creditos'>
    <h2 align='center'>Colaboradores</h2>

    <hr class='separador_creditos'>

<script type='text/javascript'>

$(window).scroll( function() {
    var value = $(this).scrollTop();
    $(".creditos_header").each(function (index, element) {
        $(this).css("font-size","1.5rem");
        $(this).css("color","white");
        $(this).css("font-weight","normal");
        $(this).css("border-bottom","3px solid transparent");
    });

    if(value > 100 && value < 300){   
        $("#creditos_tour").css("font-size","1.9rem");
        $("#creditos_tour").css("color","DarkOrange");
        $("#creditos_tour").css("font-weight","bold");
        $("#creditos_tour").css("border-bottom","2px solid DarkOrange");
    } else if(value > 300 && value < 800){
        $("#creditos_biblioteca").css("font-size","1.9rem");
        $("#creditos_biblioteca").css("color","DarkOrange");
        $("#creditos_biblioteca").css("font-weight","bold");
        $("#creditos_biblioteca").css("border-bottom","2px solid DarkOrange");
    } else if(value > 800 && value < 1200){
        $("#creditos_administracion").css("font-size","1.9rem");
        $("#creditos_administracion").css("color","DarkOrange");
        $("#creditos_administracion").css("font-weight","bold");
        $("#creditos_administracion").css("border-bottom","2px solid DarkOrange");
    } else if(value > 1200 && value < 1500){
        $("#creditos_diseno").css("font-size","1.9rem");
        $("#creditos_diseno").css("color","DarkOrange");
        $("#creditos_diseno").css("font-weight","bold");
        $("#creditos_diseno").css("border-bottom","2px solid DarkOrange");
    } else if (value > 1500 && value < 1900){
        $("#creditos_colaboradores").css("font-size","1.9rem");
        $("#creditos_colaboradores").css("color","DarkOrange");
        $("#creditos_colaboradores").css("font-weight","bold");
        $("#creditos_colaboradores").css("border-bottom","2px solid DarkOrange");
    }
    
});


$(".celda_creditos").hover(function(){
    $(this).find(".hover_nombre").fadeIn("fast");

},function(){
    $(this).find(".hover_nombre").fadeOut("fast");

})

</script>