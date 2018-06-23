<div class="container">
    <div class="row">
        <div class="col-12">
            <h2>Detalle de puntos</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-3">
            <p>#</p>
        </div>
        <div class="col-3">
            <p>Valor</p>
        </div> 
    </div> 
    <div class="row">
        <div class="col-3">
            <p><?php echo $punt_clave ?></p>
        </div>
        <div class="col-3">
            <p><?php echo $punt_valor ?></p>
        </div> 
    </div>  
    <div class="row">
        <div class="col-12 text-right">
            <button id="edit-item-btn" class="btn btn-success" data-id="<?php echo $punt_clave; ?>">
                Editar
            </button>
            <button id="delete-item-btn" class="btn btn-danger" data-id="<?php echo $punt_clave; ?>">
                Eliminar
            </button>
        </div>
    </div>
</div>

