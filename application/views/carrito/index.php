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
                            <?php foreach($_SESSION['carrito'] as $key => $producto): ?>
                                <tr>
                                    <td><?php echo $key ?></td>
                                    <td><?php echo $producto['id'] ?></td>
                                    <td><?php echo $producto['id'] ?> Bs</td>
                                    <td><?php echo $producto['cantidad'] ?></td>
                                    <td><?php echo $producto['cantidad'] * $producto['cantidad'] ?> Bs</td>
                                </tr>
                            <?php endforeach; ?>
                            <tr class="table-light">
                                <td colspan="4" class="text-right"><b>Sub total: </b></td>
                                <td><b><?php echo $producto['cantidad'] * $producto['cantidad'] ?> Bs</b></td>
                            </tr>
                            <tr class="table-light">
                                <td colspan="4" class="text-right"><b>Iva: </b></td>
                                <td><b><?php echo $producto['cantidad'] * $producto['cantidad'] * 0.12 ?> Bs</b></td>
                            </tr>
                            <tr class="table-light">
                                <td colspan="4" class="text-right"><b>Total: </b></td>
                                <td><b><?php echo $producto['cantidad'] * $producto['cantidad'] * 1.12 ?> Bs</b></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-right">
                    <a href="<?php echo base_url(); ?>carrito/pagar" class="btn btn-success">
                        Realizar compra
                    </a>
                </div>
            </div>   
        </div>
        <div class="col-sm-1"></div>
    </div>
</div>
<hr>