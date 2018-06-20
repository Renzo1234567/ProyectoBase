<br><br>
<div class="container">

    <div class="row">
        <div class="col-md"></div>
        <div class="col-md"><h4>Registrar como Persona Natural</h4></div>
        <div class="col-md"></div>
    </div>
    <br>
    <form class="" method="POST" action="<?php echo base_url() ?>Registrar/registrar">
    <div class="row ">
        <div class="col-md"></div>
         
        <div class="col-md-auto">

                <div class="form-group">
                    <label for="Rif" class="cols-sm-2 control-label">RIF</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <select class="cols-sm-2" id="Rifselect">
                                <option selected value="1">V</option>
                                <option value="2">E</option>
                                <option value="3">P</option>
                            </select>
                            <input type="text" class="form-control" name="Rif" id="Rif" placeholder="Ingresa tu RIF "/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="Id" class="cols-sm-2 control-label">Cedula de Identidad</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <select class="cols-sm-2" id="CedulaSelect">
                                <option selected value="1">V</option>
                                <option value="2">E</option>
                            </select>
                            <input type="text" class="form-control" name="Cedula" id="Cedula"  placeholder="Ingresa tu Cedula"/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="nombres" class="cols-sm-2 control-label">Nombres</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <input type="text" class="form-control" name="PrimerNombre" id="PrimerNombre"  placeholder="Primer Nombre"/>
                            <input type="text" class="form-control" name="SegundoNombre" id="SegundoNombre"  placeholder="Segundo Nombre"/>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="apellidos" class="cols-sm-2 control-label">Apellidos</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <input type="text" class="form-control" name="PrimerApellido" id="PrimerApellido"  placeholder="Primer Apellido"/>
                            <input type="text" class="form-control" name="SegundoApellido" id="SegundoApellido"  placeholder="Segundo Apellido"/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="Telefonos" class="cols-sm-2 control-label">Telefonos</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <input type="number" class="form-control" name="TelefonoFijo" id="TelefonoFijo"  placeholder="Telefono Fijo"/>
                            <input type="number" class="form-control" name="TelefonoMovil" id="TelefonoMovil"  placeholder="Telefono Movil"/>
                        </div>
                    </div>
                </div>



                <br>

                
                


        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="Telefonos" class="cols-sm-2 control-label">Correo Electronico</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <input type="email" class="form-control" name="CorreoElectronico" id="CorreoElectronico"  placeholder="Correo Electronico"/>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="password" class="cols-sm-2 control-label">Contraseña</label>
                <div class="cols-sm-10">
                    <div class="input-group">
                        <input type="password" class="form-control" name="Contraseña" id="Contraseña"  placeholder="Ingresa tu contraseña"/>
                    </div>
                </div>
            </div>


            <div class="form-group"> 
                <label for="Direccion" class="cols-sm-2 control-label">Estado</label>
                <div class="cols-sm-4">
                    <div class="input-group">

                        <select class="js-example-basic-multiple form-control" name="states[]">
                            <?php foreach ($estados as $estado): ?>
                                <option value="<?php echo $estado['luga_codigo'] ?>"><?php echo $estado['luga_nombre'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                </div>
            </div>
            <div class="form-group"> 
                <label for="Direccion" class="cols-sm-2 control-label">Municipio</label>
                <div class="cols-sm-10">
                    <div class="input-group">

                        <select class="js-example-basic-multiple form-control" name="states[]">
                            <?php foreach ($municipios as $municipio): ?>
                                <option value="<?php echo $municipio['luga_codigo'] ?>"><?php echo $municipio['luga_nombre'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                </div>
            </div>
            <div class="form-group"> 
                <label for="Direccion" class="cols-sm-2 control-label">Parroquia</label>
                <div class="cols-sm-10">
                    <div class="input-group">

                        <select class="js-example-basic-multiple form-control" name="states[]">
                            <?php foreach ($parroquias as $municipio): ?>
                                <option value="<?php echo $municipio['luga_codigo'] ?>"><?php echo $municipio['luga_nombre'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                </div>
            </div>
            <br>


        </div>
                 
<div class="col-md"></div>
        </div>
        <div class="row">
                    <div class="col-md"></div>
                    <div class="col-md"><div class="form-group ">
                    <button type="submit" id="button" class="btn btn-primary btn-lg btn-block login-button">Registrarse</a>
                </div></div>
                    <div class="col-md"></div>
                </div>
        </form>  
    </div>
    
    <script src="<?php echo base_url() ?>public/js/registro.js"></script>