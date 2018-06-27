<div class="container">
    <div class="row">
        <div class="col-12">
            <h2>Crear un nuevo producto</h2>
        </div>
    </div>
    <div class="row">
        <form class="create-form col-12">
            <div class="form-group">
                <label for="prod_nombre">Nombre: </label>
                <input type="text" class="form-control" name="prod_nombre" placeholder="Nombre" require>
            </div>
            <div class="form-group">
                <label for="prod_descripcion">Descripcion: </label>
                <input type="text" class="form-control" name="prod_descripcion" placeholder="Descripcion" require>
            </div>
            <div class="form-group">
            <label for="cf_prod_tipo_tipo">Tipo: </label>
                <select name="cf_prod_tipo_tipo" class="form-control">
                    <?php foreach ($tipos_posibles as $tipo): ?>
                        <option value="<?php echo $tipo['tipo_id'] ?>">
                            <?php echo $tipo['tipo_nombre'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="prod_tipo_preciounitario">Precio unitario: </label>
                <input type="number" 
                       class="form-control" 
                       name="prod_tipo_preciounitario" 
                       placeholder="Precio unitario" require>
            </div>
            <div class="form-group">
                <label for="prod_tipo_imagen">Imagen</label><br>
                <input type="file" name="prod_tipo_imagen" accept="image/*" require>
            </div>
            <button type="submit" class="btn btn-primary">Crear</button>
        </form>   
    </div>
</div>
