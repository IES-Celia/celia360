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
                    <div class="col-md-8 mx-auto text-center bg-secondary">
                        <h2 class="text-center">Backup base de datos y assets</h2>
                        <?php
                        $this->load->helper('form');
                        echo '<a class="insert mr-1" href='.site_url("Backup/backupSql").' role="button">Backup base de datos</a>';
                        echo '<a class="insert mr-1" href='.site_url("Backup/backupAssets").' role="button">Backup imagnes</a>';
                        ?>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-8 mx-auto text-center">
                        <h2>Restaurar backup assets</h2>
                        <?php echo form_open_multipart('Backup/restoreAssets'); ?>
                            <input class="text-dark" id="assetsZip" type='file' name='assetsZip'>
                            <input id='restaurarAssets' type='submit' value='Restaurar imagenes'>
                        </form>
                    </div>
                </div>
                <div class="row mt-3 pb-3">
                    <div class="col-md-8 mx-auto text-center">
                        <h2>Restaurar base datos</h2>
                        <p class="text-left">Puede tardar algunos minutos, una vez iniciado el proceso de restauración debe dejar que finalice, en ningún momento cambie de viste mientras el proceso se está ejecutando.</p>
                        <?php echo form_open_multipart('Backup/restoreSql'); ?>
                            <input class="text-dark" id="sqlZip" type='file' name='sqlZip'>
                            <input id='restaurarSql' type='submit' value='Restaurar bd'>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

