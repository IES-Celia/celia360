<style>
  /* Ocultar el scroll de la ventana*/
  body{
    overFlow-x: hidden;
    overFlow-y: hidden;
  }
  label{
    font-size: 1.25rem;
  }
  /* Posicionar la ventana de login en el centro */
  .posicion_relativa{
    top: 50%;
    left: 50%;
    position: absolute;
    transform: translate(-50%, -50%);
    -webkit-transform: translate(-50%, -50%);
    width: 80%;
  }
</style>
<div class="container">

  <div class="posicion_relativa">
    <div class="col-md-6 mx-auto bg-secondary">
      <h1 class="text-center">Login</h1>
      <?php echo"<form action='".site_url("Usuario/checkLogin")."' method='post'>";?>
        <div class="form-group">
          <label for="user"><i class="far fa-user"></i> Nick</label>
          <input type="text"
            class="form-control" name="user" id="user" aria-describedby="helpId" placeholder="" required>
        </div>
        <div class="form-group">
          <label for="pass"><i class="fas fa-lock"></i> Password</label>
          <input type="password" class="form-control" name="pass" id="pass" placeholder="" required>
        </div>
        <div class="row">
          <div class="col-md-12 mb-3">
            <button type="submit" class="btn float-right btn-primary">Entrar</button>
            <a name="" id="" class="btn btn-primary" href="<?php echo site_url("Usuario/showRegisterForm");?>" role="button">Registrarse</a>
          </div>
        </div> 
      </form>
    </div>
  </div>

</div><!-- Final del container -->



