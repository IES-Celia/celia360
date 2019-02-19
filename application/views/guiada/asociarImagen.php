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

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1 class="text-center">Subir imagen preview</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
				<form class="for" enctype="multipart/form-data" action='<?php echo site_url("guiada/asociarImagenPreview"); ?>' method="post">
					
				<div class="form-group">
					<label for="previ">Imagen preview</label>
				<input type="file" class='form-control-file' name="imagenPreview" placeholder="Seleccionar la imagen" required>
				</div>
				
					<div class="form-group">
					<input type="submit" class='btn btn-success' value="Subir preview" />
					</div>
					<input type="hidden" name="MAX_FILE_SIZE" value="20000000" />
					
				</form>
				</div>
			</div>
		</div>
	</div>
</div>
