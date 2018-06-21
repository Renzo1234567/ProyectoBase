<div class="container">
    <div class="row">
        <div class="col-12">
            <h2>Detalle de la tienda</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-3">
            <p>#</p>
        </div>
        <div class="col-3">
            <p>Nombre</p>
        </div>
        <div class="col-3">
            <p>ID de Lugar</p>
        </div>
    </div> 
    <div class="row">
        <div class="col-3">
            <p><?php echo $tien_clave ?></p>
        </div>
        <div class="col-3">
            <p><?php echo $tien_nombre ?></p>
        </div>
        <div class="col-3">
            <p><?php echo $cf_tien_lugar ?></p>
        </div>
          
    </div>  
    <div class="row">
        <div class="col-12 text-right">
            <button id="edit-item-btn" class="btn btn-success" data-id="<?php echo $tien_clave; ?>">
                Editar
            </button>
            <button id="delete-item-btn" class="btn btn-danger" data-id="<?php echo $tien_clave; ?>">
                Eliminar
            </button>
        </div>
    </div>
</div>

