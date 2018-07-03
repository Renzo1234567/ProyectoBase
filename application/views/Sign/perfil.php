<div class="container">
   
    
  <div class="row">
    <div class="col-sm">
     
    </div>
    <div class="col-sm text-center">
      <br>
      <h2>Mi Perfil</h2>
    </div>
    <div class="col-sm">
  
    </div>
  </div>

<form  id="login" class="text-left" action="<?php echo base_url()?>Sign/perfil_update" method="POST">
   <div class="row">
    <br>
     <div class="col-sm"></div>
    <div class="col-sm">
     <label for="natu1">Primer Nombre </label>
                <input type="text" class="form-control" name="natu1" placeholder="<?php echo $natu_nombre1 ?>">
            </div>
    <div class="col-sm">
     <label for="natu2">Segundo Nombre </label>
                <input type="text" class="form-control" name="natu2" placeholder="<?php echo $natu_nombre2 ?>" >
    </div>
    <div class="col-sm"></div>
  </div>
  <br>
  <div class="row">
    <br>
     <div class="col-sm"></div>
    <div class="col-sm">
     <label for="natu3">Primer Apellido </label>
                <input type="text" class="form-control" name="natu3" placeholder="<?php echo $natu_apellido1 ?>" >
            </div>
    <div class="col-sm">
     <label for="natu4">Segundo Apellido </label>
                <input type="text" class="form-control" name="natu4" placeholder="<?php echo $natu_apellido2 ?>" >
    </div>
    <div class="col-sm"></div>
  </div>
  <br>
  <div class="row">
    <br>
     <div class="col-sm"></div>
    <div class="col-sm">
     <label for="natu5">Contraseña</label>
                <input type="password" class="form-control" name="natu5" placeholder="<?php echo $contraseña ?>" >
            </div>
    <div class="col-sm">
     <label for="natu6">Cedula </label>
                <input type="text" class="form-control" name="natu6" placeholder="<?php echo $natu_cedula ?>" >
    </div>
    <div class="col-sm"></div>
  </div>
  <br>
  <div class="row">
    <br>
     <div class="col-sm"></div>
    <div class="col-sm">
     <label for="natu7">Correo Personal</label>
                <input type="text" class="form-control" name="natu7" placeholder="<?php echo $natu_correo?>" >
            </div>
    <div class="col-sm">
     <label for="natu8">Correo CANDYUCAB </label>
                <input type="text" class="form-control" name="natu8" id="natu8"placeholder="<?php echo $email?>">
    </div>
    <div class="col-sm"></div>
  </div>
  <br><br>
  <div class="row">
                    <div class="col-md"></div>
                    <div class="col-md"><div class="form-group ">
                    <button type="submit" id="button1" class="btn btn-primary btn-lg btn-block login-button">Editar</a>
                </div></div>
                    <div class="col-md"></div>
                </div>
</form>
