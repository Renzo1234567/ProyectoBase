<div class="container">
    <div class="row">
        <div class="col-12">
            <h2>
                Detalle del producto
                <small># <?php echo $prod_id ?></small>
            </h2>
            
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <b>Nombre</b>
            <p><?php echo $prod_nombre ?></p>
        </div>
        <div class="col-sm-4">
            <b>Descripcion</b>
            <p><?php echo $prod_descripcion ?></p>
        </div>
        <div class="col-sm-4">
            <b>Tipo</b>
            <p><?php echo $tipo_nombre ?></p>
        </div>  
    </div> 
    <div class="row">
        <div class="col-sm-4">
            <!-- Nada -->
        </div>
        <div class="col-sm-4">
            <b>Imagen</b>
            <p>
            <img src="<?php echo base_url() . 'public/img/producto/' . $prod_imagen; ?>" 
                alt="<?php echo $prod_nombre ?>" 
                width="50" />
            </p>
        </div>
        <div class="col-sm-4">
            <b>Precio</b>
            <p><?php echo $prod_tipo_preciounitario ?></p>
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

