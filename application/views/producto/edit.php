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
            <input type="hidden" name="prod_id" value="<?php echo $prod_id; ?>">
            <button type="submit" class="btn btn-primary">Editar</button>
        </form>   
    </div>
</div>

