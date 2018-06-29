<div class="container">
    <div class="row">
        <div class="col-12">
            <h2>Crear Rol</h2>
        </div>
    </div>
    <div class="row">
        <form class="create-form col-12">
            <div class="form-group">
                <label for="rol_nombre">Nombre: </label>
                <input type="text" class="form-control" name="rol_nombre" placeholder="Nombre del rol" require>
            </div>
            <div class="form-group">
                <label for="rol_descripcion">Descripcion: </label>
                <input type="text" class="form-control" name="rol_descripcion" placeholder="Descripcion" require>
            </div>
            <div class="form-group">
                <label for="permisos">Permisos: </label>
                <select class="form-control select2" name="permisos" multiple require>
                    <?php foreach($permisos as $permiso): ?>
                        <option value="<?php echo $permiso['perm_clave'] ?>"><?php echo $permiso['perm_accion'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>            
            <button type="submit" class="btn btn-primary">Crear</button>
        </form>   
    </div>
</div>
