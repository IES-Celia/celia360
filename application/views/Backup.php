<script>
    $(document).ready(function(){
        //Confrim para asegurarse que el usuario quiere restaurar los assets
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
        //Confrim para asegurarse que el usuario quiere restaurar la base da datos
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
<style>
    .mx-auto{
        margin: 0 auto;
    }
    .container{
        margin: 0 auto;
        width: 1300px;
    }
    .col-md-8{
        margin: 0 auto;
        width: 66.6%;
    }
    .text-center{
        text-align: center;
    }
    .row{
        margin-top: 5px;
        display: block;
        width: 100%;
    }
    .mr-1{
        margin-right: 10px;
    }
    .mt-3{
        margin-top: 30px;
    }
</style>
    <div class="container">
        <h1 class='text-center'>Backup</h1>
        <div class="row mt-3">
            <div class="col-md-8 mx-auto text-center">
                <h2 class="text-center">Backup base de datos y assets</h2>
                <?php
                $this->load->helper('form');
                echo '<a class="mr-1" href='.site_url("Backup/backupSql").' role="button">Backup base de datos</a>';
                echo '<a class="mr-1" href='.site_url("Backup/backupAssets").' role="button">Backup assets</a>';
                ?>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-8 mx-auto text-center">
                <h2>Restaurar backup assets</h2>
                <?php echo form_open_multipart('Backup/restoreAssets'); ?>
                    <input id="assetsZip" type='file' name='assetsZip'>
                    <input class='' id='restaurarAssets' type='submit' value='Restaurar assets'>
                </form>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-8 mx-auto text-center">
                <h2>Restaurar base datos</h2>
                <?php echo form_open_multipart('Backup/restoreSql'); ?>
                    <input id="sqlZip" type='file' name='sqlZip'>
                    <input class='' id='restaurarSql' type='submit' value='Restaurar bd'>
                </form>
            </div>
        </div>
    </div>

