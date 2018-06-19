<div class="container">
    <div class="row">
        <div class="col-12">
            <h2>Detalle del producto</h2>
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
            <p>Descripcion</p>
        </div>  
    </div> 
    <div class="row">
        <div class="col-3">
            <p><?php echo $prod_id ?></p>
        </div>
        <div class="col-3">
            <p><?php echo $prod_nombre ?></p>
        </div>
        <div class="col-3">
            <p><?php echo $prod_descripcion ?></p>
        </div>  
    </div>  
    <div class="row">
        <div class="col-12 text-right">
            <button id="edit-item-btn" class="btn btn-success" data-id="<?php echo $prod_id; ?>">
                Editar
            </button>
            <button id="delete-item-btn" class="btn btn-danger" data-id="<?php echo $prod_id; ?>">
                Eliminar
            </button>
        </div>
    </div>
</div>

