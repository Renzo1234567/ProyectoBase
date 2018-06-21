<div class="container">
    <div class="row">
        <div class="col-12">
            <h2>Editar nombre</h2>
        </div>
    </div>
    <div class="row">
        <form class="edit-form col-12">
            <div class="form-group">
                <label for="prod_nombre">Nombre: </label>
                <input type="text" 
                       value="<?php echo $tienda['tien_nombre']; ?>"
                       class="form-control" 
                       name="tien_nombre" 
                       placeholder="Nombre" require>
            </div>
            <div class="form-group"> 
                <label for="Direccion" class="cols-sm-2 control-label">Lugar</label>
                <div class="cols-sm-4">
                    <div class="input-group">

                        <select class="js-example-basic-multiple form-control" name="tien_lugar">
                            <?php foreach ($parroquias as $estado): ?>
                                <option name="tien_lugar" value="<?php echo $estado['luga_codigo'] ?>"><?php echo $estado['luga_nombre'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                </div>
            </div>
           
            
            <input type="hidden" name="tien_clave" value="<?php echo $tienda['tien_clave']; ?>">
            <button type="submit" class="btn btn-primary">Editar</button>
        </form>   
    </div>
</div>

