<div class="container">
    <div class="row">
        <div class="col-12">
            <br>
            <h3>Buscar cliente</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <form action="<?php echo base_url(); ?>carrito/cliente/natural">
                <div class="form-grop">
                    <label for="id">Cliente Natural</label>
                    <input class="form-control" type="text" name="id" placeholder="rif" required>
                </div>     
                <div class="form-grop">
                    <input class="btn btn-success" type="submit" value="Buscar">
                </div>                
            </form>
        </div>
        <div class="col-sm-6">
            <form action="<?php echo base_url(); ?>carrito/cliente/juridico">
                <div class="form-grop">
                    <label for="id">Cliente Juridico</label>
                    <input class="form-control" type="text" name="id" placeholder="rif" required>
                </div>            
                <div class="form-grop">
                    <input class="btn btn-success" type="submit" value="Buscar">
                </div>        
            </form>
        </div>
    </div>
</div>