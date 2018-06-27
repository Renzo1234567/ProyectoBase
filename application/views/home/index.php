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

    <!-- Main area -->
    <div class="row">
        <!-- Filters -->
        <div class="col-md-3">
            <form>
                <div class="form-group">
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" id="form-search" placeholder="Buscar caramelos">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-search"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="item-1">
                    <label class="form-check-label" for="item-1">
                        Item 1
                    </label>
                </div>
                <br>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="item-2">
                    <label class="form-check-label" for="item-2">
                        Item 2
                    </label>
                </div>
                <br>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="item-3">
                    <label class="form-check-label" for="item-3">
                        Item 3
                    </label>
                </div>
                <br>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="item-4">
                    <label class="form-check-label" for="item-4">
                        Item 4
                    </label>
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-default mt-2">Limpiar</button>
                    <button type="submit" class="btn btn-primary mt-2">Buscar</button>
                </div>
            </form>
        </div>
        <!-- Products -->
        <div class="col-md-9">
            <?php for($i = 0; $i < 3; $i++): ?>            
            <div class="row">
                <?php for($j = 0; $j < 3; $j++): ?>
                <?php $producto = $productos[($i * 3) + $j]; ?>
                <div class="col-md-4">
                    <div class="card text-center">
                        <img class="card-img-top" src="<?php echo base_url() ?>public/img/producto/<?php echo $producto['prod_tipo_imagen'] ?>" alt="Imagen de <?php echo $producto['prod_nombre'] ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $producto['prod_nombre'] ?></h5>
                            <p class="card-text"><?php echo $producto['prod_descripcion'] ?></p>
                            <button data-id="<?php echo $producto['prod_id'] ?>" class="btn btn-primary agregar-prodcuto-carrito">Agregar al carrito</button>
                            <form style="display: none" class="agregar-prodcuto-form">
                                <div class="form-group">
                                    <input type="number" name="cantidad" value="1" > <br>
                                    <input type="text" name="producto-id" value="<?php echo $producto['prod_id'] ?>" hidden="" >
                                    <input type="text" name="producto-nombre" value="<?php echo $producto['prod_nombre'] ?>" hidden="" >
                                    <input type="submit" value="Agregar" class="btn btn-success" > 
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
