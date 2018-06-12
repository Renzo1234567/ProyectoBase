<?php
?>
<div class="container">
    <br><br><br>
    <div class="row">
        <div class="col-4"></div>
        <div class="col-4 text-center">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <form class="text-left" action="<?php echo base_url() ?>sign/in" method="POST">
                        <div class="form-group">
                          <label for="email">Ingresa tu correo</label>
                          <input type="email" class="form-control" id="email" name="email"placeholder="Ingresa tu correo" required="">

                        </div>
                        <div class="form-group">
                          <label for="pass">Contraseña</label>
                          <input type="password" class="form-control" id="pass" name="pass" placeholder="Contraseña" required="">
                        </div>
                        <div class="form-check">
                          <input type="checkbox" class="form-check-input" id="exampleCheck1">
                          <label class="form-check-label" for="exampleCheck1">Mantener sesión</label>
                        </div>
                        <br>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary" width="200" >Ingresar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-4"></div>
    </div>
</div>
<br>
<div class="container">s
  <div class="row">
   <div class="col-4"></div>
        <div class="col-4 text-center">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <label>Nuevo en el sitio? </label><a href="<?php echo base_url() ?>Registrar/registrar"> Registrate aqui</a>
                </div>
            </div>
        </div>
        <div class="col-4"></div>
      </div>
    </div>
</div>


