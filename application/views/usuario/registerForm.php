<style>
    .escondida {
        display: none;
    }
</style>
<div class="container">

    <?php echo"<p style='text-align:center; color:red;'>".$mensaje."</p>";?>

    <div class="row">
        <div class="col-md-6 mx-auto bg-secondary">
            <h1 class="text-center">Registro de usuarios</h1>
            <?php echo"<form action='".site_url("usuario/processregisterform")."' method='post'>";?>
                <div class="form-group">
                <label for="username"><h5>Nombre de usuario</h5></label>
                <input type="text"
                    class="form-control" name="username" id="username" aria-describedby="helpId" placeholder="" required>
                </div>
                <div class="form-group">
                <label for="pass"><h5>Password</h5></label>
                <input type="password" class="form-control" name="pass" id="pass" placeholder="" required>
                </div>
                <div class="form-group">
                <label for="email"><h5>Correo</h5></label>
                <input type="email"
                    class="form-control" name="email" id="email" aria-describedby="helpId" placeholder="" required>
                </div>
                <div class="form-group">
                <label for="name"><h5>Nombre</h5></label>
                <input type="text"
                    class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="" required>
                </div>
                <div class="form-group">
                <label for="subname"><h5>Apellidos</h5></label>
                <input type="text"
                    class="form-control" name="subname" id="subname" aria-describedby="helpId" placeholder="" required>
                </div>
                <div class="form-group">
                <label class="escondida" for="">Dejar esto en blanco (para detectar bots)</label>
                <input type="text"
                    class="form-control escondida" name="dejarenblanco" id="dejarenblanco" aria-describedby="helpId" placeholder="">
                </div>     
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <button type="submit" class="btn float-right btn-primary">Aceptar</button>
                        <a name="" id="" class="btn btn-primary" href="<?php echo site_url("usuario");?>" role="button">Login</a>
                    </div>
                </div> 
            </form>
        </div>
    </div>

</div><!-- Final del container -->

