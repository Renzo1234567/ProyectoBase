<div class="container">
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-10 col-12">
            <div class="row">
                <div class="col-12">
                    <br>
                    <h3>
                        Carrito <i class="fas fa-shopping-cart"></i> 
                    </h3>
                    <br>
                </div>
            </div>
            <div class="row">
                <?php if(isset($_SESSION['carrito'])): ?>
                    <div class="col-12">
                        <table class="table table-striped table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>Producto</th>
                                    <th>Precio unitario</th>
                                    <th>Cantidad</th>
                                    <th>Total:</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $subtotal = 0; ?>
                                <?php foreach($_SESSION['carrito'] as $key => $producto): ?>
                                    <tr>
                                        <td><?php echo $key + 1?></td>
                                        <td><?php echo $producto['nombre'] ?></td>
                                        <td><?php echo $producto['precio'] ?> Bs</td>
                                        <td><?php echo $producto['cantidad'] ?></td>
                                        <td><?php echo $producto['cantidad'] * $producto['precio'] ?> Bs</td>
                                    </tr>
                                    <?php $subtotal += $producto['cantidad'] * $producto['precio'] ; ?>
                                <?php endforeach; ?>
                                <tr class="table-light">
                                    <td colspan="4" class="text-right"><b>Sub total: </b></td>
                                    <td><b><?php echo $subtotal ?> Bs</b></td>
                                </tr>
                                <tr class="table-light">
                                    <td colspan="4" class="text-right"><b>Iva: </b></td>
                                    <td><b><?php echo $subtotal * 0.12 ?> Bs</b></td>
                                </tr>
                                <tr class="table-light">
                                    <td colspan="4" class="text-right"><b>Total: </b></td>
                                    <td><b><?php echo $subtotal * 1.12 ?> Bs</b></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <p class="text-info"><i>
                        No ha agregado productos a su carrito
                    </i></p>
                <?php endif; ?>
            </div>
            <div class="row">
                <div class="col-12 text-right">
                    
                    <?php if(isset($_SESSION['usua_token']) && isset($_SESSION['carrito'])): ?>
                        <a href="<?php echo base_url(); ?>carrito/pagar" class="btn btn-success">
                            Realizar compra
                        </a>
                    <?php elseif(isset($_SESSION['carrito'])): ?>
                        <a href="<?php echo base_url(); ?>sign/in" class="btn btn-primary">
                            Iniciar session
                        </a>
                        <a href="<?php echo base_url(); ?>Registrar/comoregistrarse" class="btn btn-secondary">
                            Registrarse
                        </a>
                    <?php else: ?>
                        <a href="<?php echo base_url(); ?>" class="btn btn-primary">
                            Ir a comprar
                        </a>
                    <?php endif; ?>
                </div>
            </div>   
        </div>
        <div class="col-sm-1"></div>
    </div>
    <hr>
    <div class="row">
        <div class="col-12 text-center">
            <p>
                <i>Tienda: <?php echo $_SESSION['tienda']['tien_nombre']; ?></i>
            </p>
        </div>
    </div>
</div>
<hr>