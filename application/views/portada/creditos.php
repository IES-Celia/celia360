<script>
$(document).ready(function(){
   $('html, body').css({
        overflow: 'auto',
    });
});
</script>

<style>


body{
    background-color: grey;
    overflow-y: auto;
    height:3000px;
    width:auto;    
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


.prueba_informacion {
	padding: 10px;
	margin: 10px;
	background-color: #aaaaaa;
	opacity: 0.5;
	border-radius: 5px;
        font-family: "Lato";
}


.prueba_carta{
    display:flex;
    /*ustify-content: space-between;*/
    font-family: "Lato";
}


#prueba_cartas{
    margin-top:100px;
    font-family: "Lato";
}

.nombres_creditos {
	text-align: center;
        font-family: "Lato";
}

.copyleft {
  display:inline-block;
  transform: rotate(180deg);
}

</style>

<!-- 
    tilt.js para fotos?
    svg de volver atras
    "background-image: url('.base_url(sdsdsd).')"
-->

<div id='prueba_contenedor'>
    <div class='prueba_informacion'>
	Celia360 (a.k.a. CeliaTour) es una aplicación web para la creación de recorridos virtuales a partir de fotografías 360
	desarrollada por el alumnado de 2º curso del Ciclo Formativo de Desarrollo de Aplicaciones Web en IES Celia Viñas de Almería (España)
	durante el curso 2017/2018.
    </div>

    <div id='prueba_cartas'>
	<h2>
            Equipo de coordinación
	</h2>
        
        <div class='nombres_creditos'>
            José Barranquero Infantes<br>
            Félix Expósito López<br>
            Alfredo Moreno Vozmediano<br>
        </div>
            
        <hr class='separador_creditos'>
            
            
            
        <h2>
            Equipo de desarrollo<br/>(en orden alfabético):
	</h2>
        <hr class='separador_creditos'>
        

        <div class='prueba_carta'>
            <div>
                <h2>Hamza<br> Benhachmi</h2>
                <div class='prueba_informacion'>En construcción<br>Email:enconstruccion@mimail.com<br>Redes</div>
            </div>

              <div>
                <h2>Marc<br> Expósito Miras</h2>
                <div class='prueba_informacion'>En construcción<br>Email:enconstruccion@mimail.com<br>Redes</div>
            </div>

              <div>
                <h2>Manuel<br> González Mesa</h2>
                <div class='prueba_informacion'>En construcción<br>Email:enconstruccion@mimail.com<br>Redes</div>
            </div>
        </div>

        <hr class='separador_creditos'>

        <div class='prueba_carta'>

            <div>
                <h2>Francisco<br> Linares González</h2>
                <div class='prueba_informacion'>En construcción<br>Email:enconstruccion@mimail.com<br>Redes</div>
            </div>

              <div>
                <h2>Alejandro<br> López López</h2>
                <div class='prueba_informacion'>En construcción<br>Email:enconstruccion@mimail.com<br>Redes</div>
            </div>

              <div>
                <h2>Miguel Ángel López Rodríguez</h2>
                <div class='prueba_informacion'>En construcción<br>Email:enconstruccion@mimail.com<br>Redes</div>
            </div>
        </div>

         <hr class='separador_creditos'>

        <div class='prueba_carta'>

            <div>
                <h2>Miguel Ángel<br> López Segura</h2>
                <div class='prueba_informacion'>En construcción<br>Email:enconstruccion@mimail.com<br>Redes</div>
            </div>

              <div>
                <h2>José Luis<br> Ramírez Jiménez</h2>
                <div class='prueba_informacion'>En construcción<br>Email:enconstruccion@mimail.com<br>Redes</div>
            </div>

              <div>
                <h2>María Dolores <br>Salmerón Sierra</h2>
                <div class='prueba_informacion'>En construcción<br>Email:enconstruccion@mimail.com<br>Redes</div>
            </div>
        </div>

         <hr class='separador_creditos'>

        <div class='prueba_carta'>

            <div>
                <h2>Álvaro<br> Sánchez Casares</h2>
                <div class='prueba_informacion'>En construcción<br>Email:enconstruccion@mimail.com<br>Redes</div>
            </div>

              <div>
                <h2>Zygimantas<br> Sniurevicius</h2>
                <div class='prueba_informacion'>En construcción<br>Email:enconstruccion@mimail.com<br>Redes</div>
            </div>
        </div>

        <hr class='separador_creditos'>

 	<h2>
            Colaboradores
	</h2>
        

        <div class='nombres_creditos'>
                    Antonio Barrera Funes<br>
                    María del Carmen Cuadrado Sánchez<br>
                    María Belén Garzón<br>
                    Trinidad Gómez Ruiz<br>
                    María José Hernández Meca<br>
                    José Luis Hurtado<br>
                    Carmen Menéndez Suárez<br>
                    Juan González Parra<br>
                    Salvador Prieto Pérez<br>
                    Luis Serrano Cortés<br>
                    Manuela Soriano Sánchez<br>
        </div>
            
        <hr class='separador_creditos'>
        
        
         

    </div>

</div>

    <h2 align='center'>Desarrollo de los tours virtuales</h2>
	<div class='nombres_creditos'>Francisco Linares González<br>Miguel Ángel López Segura<br>Zygimantas Sniurevicius</div>
    <hr class='separador_creditos'>
    <h2 align='center'>Biblioteca</h2>
	<div class='nombres_creditos'>Marc Expósito Miras<br>Manuel González Mesa<br>Alejandro López López</div>
    <hr class='separador_creditos'>
    <h2 align='center'>Panel de administración</h2>
	<div class='nombres_creditos'>Hamza Benhachmi<br>Miguel Ángel López Rodríguez<br>María Dolores Salmerón Segura</div>

    <hr class='separador_creditos'>
    <h2 align='center'>Diseño</h2>
	<div class='nombres_creditos'>Álvaro Sánchez Casares</div>

    <hr class='separador_creditos'>
    <h2 align='center'>Locución</h2>
    <div class='nombres_creditos'>Inas El Amrani<br>María Begoña Cortés Figueredo<br/>Marina Esteban Rodríguez<br>Alejandro López López<br>Ana López Valero<br/>Carmen Pérez Rozas</div>

    <hr class='separador_creditos'>
    <h2 align='center'>Edición de imágenes, audio y vídeo</h2>
    <div class='nombres_creditos'>José Luis Ramírez Jiménez</div>

    <hr class='separador_creditos'>
    <div class='nombres_creditos'><span class="copyleft">&copy;</span> 2018 IES Celia Viñas (Almería, Spain)</div>

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
