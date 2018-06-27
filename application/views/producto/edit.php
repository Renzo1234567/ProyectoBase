<div class="container">
    <div class="row">
        <div class="col-12">
            <h2>Editar producto</h2>
        </div>
    </div>
    <div class="row">
        <form class="edit-form col-12">
            <div class="form-group">
                <label for="prod_nombre">Nombre: </label>
                <input type="text" 
                       value="<?php echo $prod_nombre; ?>"
                       class="form-control" 
                       name="prod_nombre" 
                       placeholder="Nombre" require>
            </div>
            <div class="form-group">
                <label for="prod_descripcion">Descripcion: </label>
                <input type="text" 
                       value="<?php echo $prod_descripcion; ?>"
                       class="form-control" 
                       name="prod_descripcion" 
                       placeholder="Descripcion" require>
            </div>
            <div class="form-group">
                <label for="cf_prod_tipo_tipo">Tipo: </label>
                <select name="cf_prod_tipo_tipo" class="form-control">
                    <?php foreach ($tipos_posibles as $tipo): ?>
                        <option value="<?php echo $tipo['tipo_id'] ?>"
                                <?php echo $cf_prod_tipo_tipo === $tipo['tipo_id'] ? 'selected' : ''; ?>
                        >
                            <?php echo $tipo['tipo_nombre'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="prod_tipo_preciounitario">Precio unitario: </label>
                <input type="number" 
                       value="<?php echo $prod_tipo_preciounitario; ?>"
                       class="form-control" 
                       name="prod_tipo_preciounitario" 
                       placeholder="Precio unitario" require>
            </div>
            <div class="form-group">
                <label for="prod_tipo_imagen">Nueva imagen</label><br>
                <input type="file" name="prod_tipo_imagen" accept="image/*">
            </div>
            <input type="hidden" name="prod_id" value="<?php echo $prod_id; ?>">
            <button type="submit" class="btn btn-primary">Editar</button>
        </form>   
    </div>
</div>

