<div class="container">
    <div class="row">
        <div class="col-12">
            <h2>Editar valor</h2>
        </div>
    </div>
    <div class="row">
        <form class="edit-form col-12">
            <div class="form-group">
                <label for="punt_valor">Valor: </label>
                <input type="text" 
                       value="<?php echo $punt_valor; ?>"
                       class="form-control" 
                       name="punt_valor" 
                       placeholder="Valor" require>
            </div>.
            <input type="hidden" name="punt_clave" value="<?php echo $punt_clave; ?>">
            <button type="submit" class="btn btn-primary">Editar</button>
        </form>   
    </div>
</div>

