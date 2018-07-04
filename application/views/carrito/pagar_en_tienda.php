<?php 
    //Validamos que imprima tarjetas de credito en pantalla
    $tiene_tdc = FALSE;
    $tiene_cheque = FALSE;
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
                    <h3>
                        Tarjetas: 
                    </h3>
                    <?php foreach($tarjetas as $tarjeta): ?>
                        <?php $tiene_tdc = TRUE; ?>
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
                            Sin tarjetas registradas
                        </p>
                    <?php endif; ?>
                </div>
                <div class="col-sm-6">
                <h3>
                    Cheques
                </h3>
                <?php foreach($cheques as $cheque): ?>
                    <?php $tiene_cheque = TRUE; ?>
                        <div class="cheque">
                            <div class="row">
                                <div class="col-9">
                                    <b><?php echo $cheque['cheq_numero'] ?></b>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <span><?php echo $cheque['banc_nombre'] ?></span>
                                </div>
                            </div>
                            <input type="radio" name="medi_clave" value="<?php echo $cheque['cheq_numero'] ?>">
                        </div>
                    <?php endforeach; ?>
                    <?php if(!$tiene_cheque): ?>
                        <p class="text-info">
                            Sin Cheques registradas
                        </p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-right">
                    <input type="hidden" id="tipo_usuario" value="<?php echo $tipo_usuario; ?>">
                    <button class="btn btn-success" id="btn-pagar-tienda">
                        Pagar
                    </button>
                    
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