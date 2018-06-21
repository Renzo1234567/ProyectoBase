<div class="container">
    <div class="row">
        <div class="col-12">
            <h2>Crear una nueva tienda</h2>
        </div>
    </div>
    <div class="row">
        <form class="create-form col-12">
            <div class="form-group">
                <label for="prod_nombre">Lugar: </label>
                <input type="text" class="form-control" name="tien_nombre" placeholder="Nombre" require>
            </div>
            <div class="form-group"> 
                <label for="Direccion" class="cols-sm-2 control-label">Lugar</label>
                <div class="cols-sm-4">
                    <div class="input-group">

                        <select class="js-example-basic-multiple form-control" name="tien_lugar">
                            <?php foreach ($parroquias as $estado): ?>
                                <option name="tien_nombre" value="<?php echo $estado['luga_codigo'] ?>"><?php echo $estado['luga_nombre'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                </div>
            </div>

            <button type="submit" class="btn btn-primary">Crear</button>
        </form>   
    </div>
</div>
