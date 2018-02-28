<h2>Menu VISITA GUIADA</h2>

<form action='<?php echo site_url("guiada/mostrarFormularioGuiada"); ?>' method="post">
<input type="submit" value="crear Escena" />
</form>
<table >
    <tr>
        <th>id guiada</th>
        <th>cod escena</th>
        <th>audio escena</th>
        <th>titulo escena</th>
        <th>imagen preview</th>
    </tr>

<?php
foreach ($escenas as $escena) {
    if(empty($escena["img_preview"])){
        //Quitarlo en un futuro no muy lejano
        $imagen="vacio";
    } else{
        $imagen=$escena["img_preview"];
        $imagen = base_url('assets/imagenes/previews-guiada/').$imagen;
    }
        $idEscena =$escena['id_visita'];
        $urlFormulario = site_url('guiada/modificarEscena');

    echo "<tr class='filaEscena'>".
    "<td class='id_visita'>".$escena['id_visita']."</td>
    <td class='cod_escena'>".$escena['cod_escena']."</td>
    <td class='audio_escena'>".$escena['audio_escena']."</td>
    <td class='titulo_escena'>".$escena['titulo_escena']."</td>
    <td><img style='height:100px; width:auto;' src='".$imagen."'></td>
    <td><a data-id='$idEscena' onclick='borrarGuiada(this);'>borrar</a></td>
    <form action='$urlFormulario' method='post' id='actualizar'>
    <input name='id_visita' value='$idEscena' type='hidden'>
    <input type='submit' style='display:none' value='nada'>
    </form><td>";

    ?>
   <a onclick="document.getElementsById('actualizar').submit();">modificar</a></td></tr>";
   <?php
}
?>

</table>

<script>

function borrarGuiada(elemento){

    var idEscena = $(elemento).attr("data-id");
    var urlPeticion= "<?php echo base_url("guiada/borrarEscena");?>";
    var peticion = $.ajax({
        type: "post",
        url: urlPeticion,
        data: {id : idEscena }
    });

    peticion.done(function(){
        alert("Borrado");
        $(elemento).closest(".filaEscena").remove();
    });

}

</script>