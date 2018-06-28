<div class="container">
    <div class="row">
        <div class="col-12">
            <br>
            <h1>
                Realizar consultas a la base de datos
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="<?php base_url() ?>consulta/ejecutar" method="POST">
                <div class="form-group">
                    <label for="consulta">Seleccione la consulta que desea realizar</label>
                    <select class="form-control" name="consulta">
                        <?php foreach ($consultas as $key => $consulta): ?>
                            <option value="<?php echo $key ?>"><?php echo $consulta; ?></option> 
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <input class="btn btn-primary" value="Consultar" type="submit">
                </div>
            </form>
        </div>
    </div>
</div>
