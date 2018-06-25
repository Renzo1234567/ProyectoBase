<div class="container medio-pago">
    <div class="row">
        <div class="col-12">
            <br>
            <h3>
                Administrar Medios de Pagos
            </h3>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 lista-tarjetas">
            <div class="row">
                <div class="col-12">
                    <h5>Tarjetas</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <?php foreach($tarjetas as $tarjeta): ?>
                        <div class="tarjeta">
                            <div class="row">
                                <div class="col-9">
                                    <b><?php echo $tarjeta['tarj_numero'] ?></b>
                                </div>
                                <div class="col-3">
                                    <!-- Elimina medios de pago por get -->
                                    <a class="btn btn-danger" 
                                        href="<?php echo base_url() . 'medio_pago/desvincular/' . $tarjeta['medi_clave']; ?>">
                                        x
                                    </a>
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
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="row"> <!-- Formulario para añadir tarjetas -->
                <div class="col-12">
                    <!-- No AJAX por razones de tiempo -->
                    <form id="form-añadir-tarjeta" 
                        style="display: none"
                        method="POST"
                        action="<?php echo base_url() ?>medio_pago/anadir_tarjeta"
                        >
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="numero">Numero de tarjeta</label>
                                    <input class="form-control" type="number" name="numero" require placeholder="Numero de tarjeta">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="tipo">Tipo</label>
                                    <select name="tipo" class="form-control">
                                        <option value="c">Credito</option>
                                        <option value="d">Debito</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="banco">Banco</label>
                                    <select class="form-control" name="banco">
                                        <?php foreach ($bancos as $banco): ?>
                                            <option value="<?php echo $banco['banc_codigo'] ?>"><?php echo $banco['banc_nombre'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <input type="submit" value="Añadir" class="form-control btn btn-success">
                                </div>
                            </div>
                        </div>                        
                    </form>
                    <button class="btn btn-primary" id="btn-añadir-tarjeta">
                        Añadir tarjeta
                    </button>
                </div>
            </div>
        </div>
        <div class="col-sm-6 lista-cheques">
            <div class="row">
                <div class="col-12">
                    <h5>Chequeras</h5>
                </div>
            </div>          
            <div class="row">
                <div class="col-12">
                    <?php foreach($cheques as $cheque): ?>
                        <div class="cheque">
                            <div class="row">
                                <div class="col-9">
                                    <b><?php echo $cheque['cheq_numero'] ?></b>
                                </div>
                                <div class="col-3">
                                    <!-- Elimina medios de pago por get -->
                                    <a class="btn btn-danger" 
                                        href="<?php echo base_url() . 'medio_pago/desvincular/' . $cheque['medi_clave']; ?>">
                                        x
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <span><?php echo $cheque['banc_nombre'] ?></span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="row"> <!-- Formulario para añadir chequeras -->
                <div class="col-12">
                    <!-- No AJAX por razones de tiempo -->
                    <form id="form-añadir-chequera" 
                        style="display: none"
                        method="POST"
                        action="<?php echo base_url() ?>medio_pago/anadir_chequera"
                        >
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="numero">Numero de cuenta</label>
                                    <input class="form-control" type="number" name="numero" require placeholder="Numero de tarjeta">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="banco">Banco</label>
                                    <select class="form-control" name="banco">
                                        <?php foreach ($bancos as $banco): ?>
                                            <option value="<?php echo $banco['banc_codigo'] ?>"><?php echo $banco['banc_nombre'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <input type="submit" value="Añadir" class="form-control btn btn-success">
                                </div>
                            </div>
                        </div>                        
                    </form>
                    <button class="btn btn-primary" id="btn-añadir-chequera">
                        Añadir chequera
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url(); ?>public/js/medio_pago.js"></script>