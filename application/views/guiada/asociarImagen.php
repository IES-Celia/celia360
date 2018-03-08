<?php ?>

<div id='caja'>
<h1>Subir imagen preview</h1>
<form class="for" enctype="multipart/form-data" action='<?php echo site_url("guiada/asociarImagenPreview"); ?>' method="post">
  <input type="file" name="imagenPreview" placeholder="Seleccionar la imagen" required><br>
<input type="hidden" name="MAX_FILE_SIZE" value="20000000" />
<input type="submit" value="upload" />
</form>
<button>Volver atras</button>
</div>

</body>
</html>