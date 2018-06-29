<div class="container">
    <div class="row">
        <div class="col-12">
            <h2>Detalles del Rol</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <p>#</p>
        </div>
        <div class="col-sm-4">
            <p>Rol</p>
        </div> 
        <div class="col-sm-4">
            <p>Descripcion</p>
        </div> 
    </div> 
    <div class="row">
        <div class="col-sm-4">
            <p><?php echo $codigo ?></p>
        </div>
        <div class="col-sm-4">
            <p><?php echo $nombre ?></p>
        </div> 
        <div class="col-sm-4">
            <p><?php echo $descripcion ?></p>
        </div> 
    </div>  
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-8">
            Permisos
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-8">
            <ul>
                <?php foreach($permisos as $permiso): ?>
                    <?php if(isset($permiso['clave'])): ?>
                        <li><?php echo $permiso['accion'] ?></li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-12 text-right">
            <button id="edit-item-btn" class="btn btn-success" data-id="<?php echo $codigo; ?>">
                Editar
            </button>
            <button id="delete-item-btn" class="btn btn-danger" data-id="<?php echo $codigo; ?>">
                Eliminar
            </button>
        </div>
    </div>
</div>

