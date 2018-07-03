<?php 
    //Validamos que imprima tarjetas de credito en pantalla
    $tiene_tdc = FALSE;
?>
<div class="container">
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-10 col-12">
            <div class="row">
                <div class="col-12">
                    <br>
                    <h3>
                        Seleccione su medio de pago <i class="fas fa-shopping-cart"></i> 
                    </h3>
                    <br>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <?php foreach($tarjetas as $tarjeta): ?>
                        <?php   
                            if($tarjeta['tarj_tipo'] === 'c')  
                                $tiene_tdc = TRUE;
                            else
                                continue; 
                        ?>
                        <div class="tarjeta">
                            <div class="row">
                                <div class="col-9">
                                    <b><?php echo $tarjeta['tarj_numero'] ?></b>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <i><?php echo $tarjeta['tarj_tipo'] === 'c' ? 'credito' : 'debito' ?></i>
                                </div>
                                <div class="col-6">
                                    <span><?php echo $tarjeta['banc_nombre'] ?></span>
                                </div>
                            </div>
                            <input type="radio" name="medi_clave" value="<?php echo $tarjeta['medi_clave'] ?>">
                        </div>
                    <?php endforeach; ?>
                    <?php if(!$tiene_tdc): ?>
                        <p class="text-info">
                            Para continuar con la operación usted debe registrar almenos una tarjeta de credito
                        </p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-right">
                    <a href="<?php echo base_url(); ?>medio_pago" class="btn btn-info">
                            Administrar medios de pago
                    </a>
                    <?php if(isset($_SESSION['usua_token']) && $tiene_tdc): ?>
                        <button class="btn btn-success" id="btn-pagar">
                            Pagar
                        </button>
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
<script src="<?php echo base_url(); ?>public/js/carrito.js"></script>