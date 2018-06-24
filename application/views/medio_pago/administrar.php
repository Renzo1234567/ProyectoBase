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
            <h5>
                Tarjetas
            </h5>
            <?php echo "<p>Tarjetas</p>" ?>
            <form id="form-añadir-tarjeta">
                <div class="form-group">
                    <label for="numero">Numero de tarjeta</label>
                    <input class="form-control" type="number" name="numero" require placeholder="Numero de tarjeta">
                </div>
                <div class="form-group">
                    <label for="tipo">Tipo</label>
                    <select name="tipo" class="form-control">
                        <option value="null">Seleccione</option>
                        <option value="c">Credito</option>
                        <option value="d">Debito</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="banco">Banco</label>
                    <select name="banco" class="form-control">
                        <option value="null">Seleccione</option>
                        <option value="c">Credito</option>
                        <option value="d">Debito</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" value="Añadir" class="btn btn-success">
                </div>
            </form>
            <button class="btn btn-primary" id="btn-añadir-tarjeta">
                Añadir tarjeta
            </button>
        </div>
        <div class="col-sm-6 lista-cheques">
            <h5>
                Chequeras
            </h5>            
            <?php echo "<p>Cheques</p>" ?>
            <button class="btn btn-primary" id="btn-añadir-chequera">
                Añadir chequera
            </button>
        </div>
    </div>
</div>

<script src="<?php base_url(); ?>public/js/medio_pago.js"></script>