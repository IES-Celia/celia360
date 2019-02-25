<script>
    $(document).ready(function(){
        //Confirm para asegurarse que el usuario quiere restaurar los assets
        $("#restaurarAssets").click(function(event){
            if(document.getElementById("assetsZip").files.length != 1){
                event.preventDefault();
                alert("Selecciona un archivo para poder restaurar los assets");
            }else{
                if(confirm("Estas seguro de restaurar los assets") == false){
                    event.preventDefault();
                }
            }
        });
        //Confirm para asegurarse que el usuario quiere restaurar la base da datos
        $("#restaurarSql").click(function(event){
            if(document.getElementById("sqlZip").files.length != 1){
                event.preventDefault();
                alert("Selecciona un archivo para poder restaurar la base de datos");
            }else{
                if(confirm("Estas seguro de restaurar la base de datos") == false){
                event.preventDefault();
                }
            }
        });        
    });
</script>
    <div class="container">
        <h1 class='text-center'>Backup</h1>
        <div class="row">
            <div class="col-md-8 mx-auto bg-secondary">
                <div class="row mt-3 pt-2">
                    <div class="col-md-10 mx-auto text-center bg-secondary">
                        <h2 class="text-center">Backup base de datos y las imagenes</h2>
                        <?php
                        $this->load->helper('form');
                        echo '<a class="btn btn-primary m-1" href='.site_url("Backup/backupSql").' role="button">Backup base de datos</a>';
                        echo '<a class="btn btn-primary m-1" href='.site_url("Backup/backupAssets").' role="button">Backup imagenes</a>';
                        ?>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-8 mx-auto text-center">
                        <h2>Restaurar backup imagenes</h2>
                        <?php echo form_open_multipart('Backup/restoreAssets'); ?>
                            <div class="form-group">
                                <label for=""></label>
                                <input type="file" class="form-control-file" name="assetsZip" id="assetsZip" accept=".sql" aria-describedby="fileHelpId">
                            </div>
                            <input name="" id="restaurarAssets" class="btn btn-primary" type="button" value="Restaurar imagenes">
                        </form>
                    </div>
                </div>
                <div class="row mt-3 pb-3">
                    <div class="col-md-8 mx-auto text-center">
                        <h2>Restaurar base datos</h2>
                        <p class="text-left">Puede tardar algunos minutos, una vez iniciado el proceso de restauración debe dejar que finalice, en ningún momento cambie de viste mientras el proceso se está ejecutando.</p>
                        <?php echo form_open_multipart('Backup/restoreSql'); ?>
                            <div class="form-group">
                                <label for=""></label>
                                <input type="file" class="form-control-file" name="sqlZip" id="sqlZip" accept=".sql" aria-describedby="fileHelpId">
                            </div>
                            <input name="" id="restaurarSql" class="btn btn-primary" type="button" value="Restaurar base de datos">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

