<br><br><br>
<div class="container"  id="error1">
  <div class="row">
   <div class="col-4"></div>
        <div class="col-4 text-center">
            <div class="bg-danger text-white" style="width: 18rem; height:auto ">
                <div class="card-body">
                    <label>Correo o contraseña incorrectos</label>
                    <button type="button" class="close" aria-hidden="true" id="closeboton"style="text-shadow: 0 1px 20px ">&times;</button>
                </div>
            </div>
        </div>
        <div class="col-4"></div>
      </div>
    </div>
<div class="container">
    <br>
    
    <div class="row">
        <div class="col-4"></div>
        <div class="col-4 text-center">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <form  id="login" class="text-left" action="<?php echo base_url() ?>sign/in" method="POST">
                        <div class="form-group">
                          <label for="email">Ingresa tu correo</label>
                          <input type="email" class="form-control" id="email" name="email"placeholder="Ingresa tu correo" required="">

                        </div>
                        <div class="form-group">
                          <label for="pass">Contraseña</label>
                          <input type="password" class="form-control" id="pass" name="pass" placeholder="Contraseña" required="">
                        </div>
                        <div class="form-check" id="Mantener">
                          <input type="checkbox" class="form-check-input" id="chebox1">
                          <label class="form-check-label" for="exampleCheck1" id="Manteneractiva">Mantener la sesion activa</label>
                        </div>
                        <br>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary" width="200 id="boton"  name="boton">Ingresar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-4"></div>
    </div>
</div>
<br>
<div class="container">
  <div class="row">
   <div class="col-4"></div>
        <div class="col-4 text-center">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <label>Nuevo en el sitio? </label><a href="<?php echo base_url() ?>Registrar/comoregistrarse"> Registrate aqui</a>
                </div>
            </div>
        </div>
        <div class="col-4"></div>
      </div>
    </div>
</div>


<script src="<?php echo base_url() ?>public/js/sigin.js"></script>