<br><br>
<div class="container">

    <div class="row">
        <div class="col-md"></div>
        <div class="col-md"><h4>Registrar como Persona Juridica</h4></div>
        <div class="col-md"></div>
    </div>
    <br>
    <form class="" method="POST" action="<?php echo base_url() ?>Registrar/registrarjuridica">
    <div class="row ">
        <div class="col-md"></div>
         
        <div class="col-md-5">

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
                    <label for="nombres" class="cols-sm-2 control-label">Capital Disponible</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <input type="text" class="form-control" name="CapitalDisponible" id="CapitalDisponible"  placeholder="Capital Disponible"/>
                            
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="nombres" class="cols-sm-2 control-label">Nombres Juridicos</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <input type="text" class="form-control" name="DenominacionComercial" id="DenominacionComercial"  placeholder="Denominacion Comercial"/>
                            <input type="text" class="form-control" name="RazonSocial" id="RazonSocial"  placeholder="Razon Social"/>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="apellidos" class="cols-sm-2 control-label">Pagina Web</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <input type="text" class="form-control" name="PaginaWeb" id="PaginaWeb"  placeholder="Pagina Web"/>
                            
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

                <div class="form-group">
                    <label for="Telefonos" class="cols-sm-2 control-label">Personas de Contacto</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <input type="text" class="form-control" name="Persona1" id="Persona1"  placeholder="Persona 1"/>
                            <input type="text" class="form-control" name="Persona2" id="Persona2"  placeholder="Persona 2"/>
                        </div>
                    </div>
                </div>

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

                <h4>Direccion Fiscal</h4>
            <div class="form-group"> 
                <label for="Direccion" class="cols-sm-2 control-label">Estado</label>
                <div class="cols-sm-4">
                    <div class="input-group">

                        <select class="js-example-basic-multiple form-control" name="states[]" >
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

                        <select class="js-example-basic-multiple form-control" name="states[]" >
                           <?php foreach ($municipios as $estado): ?>
                                <option value="<?php echo $estado['luga_codigo'] ?>"><?php echo $estado['luga_nombre'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                </div>
            </div>
            <div class="form-group"> 
                <label for="Direccion" class="cols-sm-2 control-label">Parroquia</label>
                <div class="cols-sm-10">
                    <div class="input-group">

                        <select class="js-example-basic-multiple form-control" name="states[]" >
                            <?php foreach ($parroquias as $estado): ?>
                                <option value="<?php echo $estado['luga_codigo'] ?>"><?php echo $estado['luga_nombre'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                </div>
            </div>
            <h4>Direccion Fisica</h4>
            <div class="form-group"> 
                <label for="Direccion" class="cols-sm-2 control-label">Estado</label>
                <div class="cols-sm-4">
                    <div class="input-group">

                        <select class="js-example-basic-multiple form-control" name="states[]" >
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
                            <?php foreach ($municipios as $estado): ?>
                                <option value="<?php echo $estado['luga_codigo'] ?>"><?php echo $estado['luga_nombre'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                </div>
            </div>
            <div class="form-group"> 
                <label for="Direccion" class="cols-sm-2 control-label">Parroquia</label>
                <div class="cols-sm-10">
                    <div class="input-group">

                        <select class="js-example-basic-multiple form-control" name="states[]" >
                            <?php foreach ($parroquias as $estado): ?>
                                <option value="<?php echo $estado['luga_codigo'] ?>"><?php echo $estado['luga_nombre'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                </div>
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

                
                
           <div class="col-md"></div>     


        
         
    
    <script src="<?php echo base_url() ?>public/js/registro.js"></script>