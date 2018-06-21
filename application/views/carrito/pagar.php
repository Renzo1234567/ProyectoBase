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
                    medios de pago
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-right">
                    <?php if(isset($_SESSION['usua_token'])): ?>
                        <a href="<?php echo base_url(); ?>carrito/recibo" class="btn btn-success">
                            Pagar
                        </a>
                    <?php else: ?>
                        <a href="<?php echo base_url(); ?>carrito/recibo" class="btn btn-primary">
                            Iniciar session
                        </a>
                        <a href="<?php echo base_url(); ?>carrito/recibo" class="btn btn-secondary">
                            Registrarse
                        </a>
                    <?php endif; ?>
                    
                </div>
            </div>   
        </div>
        <div class="col-sm-1"></div>
    </div>
</div>
<hr>