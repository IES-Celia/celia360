<!--
    Este archivo es parte de la aplicación web Celia360. 

    Celia 360 es software libre: usted puede redistribuirlo y/o modificarlo
    bajo los términos de la GNU General Public License tal y como está publicada por
    la Free Software Foundation en su versión 3.
    Celia 360 se distribuye con el propósito de resultar útil,
    pero SIN NINGUNA GARANTÍA de ningún tipo. 
    Véase la GNU General Public License para más detalles.

    Puede obtener una copia de la licencia en <http://www.gnu.org/licenses/>.
-->


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