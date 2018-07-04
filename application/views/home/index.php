<div class="container">
    <!-- Carrousel -->
    <div class="row">
        <div class="col-md-1">
        </div>
        <div class="col-md-10">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img class="d-block w-100" src="<?php echo base_url() ?>public/img/carrusel-ejemplo/publicidad0.PNG" alt="First slide">
                    </div>
                    <div class="carousel-item">
                    <img class="d-block w-100" src="<?php echo base_url() ?>public/img/carrusel-ejemplo/publicidad1.PNG" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                    <img class="d-block w-100" src="<?php echo base_url() ?>public/img/carrusel-ejemplo/publicidad2.PNG" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
    <!-- end carrousel -->

    <hr>
    <div class="row">
        <div class="col-12 text-center">
            <p>
                <i>Tienda: <?php echo $_SESSION['tienda']['tien_nombre']; ?></i>
            </p>
        </div>
    </div>
    <hr>

    <!-- Main area -->
    <div class="row">
        <!-- Products -->
        <div class="col-md-12">
            <?php for($i = 0; $i < count($productos) /  3; $i++): ?>            
            <div class="row">
                <?php for($j = 0; $j < 3 && (($i * 3) + $j) < count($productos); $j++): ?>
                <?php $producto = $productos[($i * 3) + $j]; ?>
                <div class="col-md-4">
                    <div class="card text-center">
                        <img class="card-img-top" src="<?php echo base_url() ?>public/img/producto/<?php echo $producto['prod_tipo_imagen'] ?>" alt="Imagen de <?php echo $producto['prod_nombre'] ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $producto['prod_nombre'] ?></h5>
                            <p class="card-text">
                                <?php echo $producto['prod_descripcion'] ?> <br>
                                <small><b><?php echo $producto['prod_tipo_preciounitario'] ?> Bs.</b></small>
                            </p>
                            <button data-id="<?php echo $producto['prod_id'] ?>" class="btn btn-primary agregar-prodcuto-carrito">Agregar al carrito</button>
                            <!-- Formulario para agregar productos al carrito -->
                            <form style="display: none" class="agregar-prodcuto-form">
                                <div class="form-group">
                                    <input type="number" name="cantidad" class="form-control" value="1" >
                                    <input type="hidden" name="producto-id" value="<?php echo $producto['prod_id'] ?>">
                                    <input type="hidden" name="producto-nombre" value="<?php echo $producto['prod_nombre'] ?>">
                                    <input type="hidden" name="producto-precio" value="<?php echo $producto['prod_tipo_preciounitario'] ?>">
                                </div>
                                <div class="form-group">
                                  <input type="submit" class="form-control btn btn-success" value="Agregar">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <?php endfor; ?>
            </div>
            <?php endfor; ?>
        </div>
    </div>
    <!-- end main area -->
</div>

<hr>

<script src="<?php echo base_url() ?>public/js/home.js"></script>
