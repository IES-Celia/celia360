<?php ?>


<h2>Asociar thumbnail a escena visita</h2>

<form class="for" enctype="multipart/form-data" action='<?php echo site_url("guiada/asociarImagenPreview"); ?>' method="post">

  <input type="file" name="imagenPreview" placeholder="Seleccionar la imagen" required><br>


<input type="hidden" name="MAX_FILE_SIZE" value="20000000" />
<input type="submit" value="upload" />

</form>

</body>
</html>