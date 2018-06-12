<nav class="navbar fixed-top navbar-expand-md bg-white" id="main-nav">
    <!-- Left section -->
    <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
        <ul class="navbar-nav mr-auto ">
            <li class="nav-item active text-center">
                <?php if(isset($this->session->email)): ?>
                <a class="nav-link" href="<?php echo base_url() ?>sign/out">
                    <!-- <img src="public/img/usuario.jpg" width="60" height="60" alt="usuario"> -->
                    <i class="fas fa-user fa-2x text-dark"></i> <br>
                    <small>Cerrar Sesión</small>
                </a>
                <?php else: ?>
                <a class="nav-link" href="<?php echo base_url() ?>sign/in">
                    <i class="fas fa-user fa-2x text-dark"></i><br>
                    <small>Iniciar Sesión</small>
                </a>
                <?php endif; ?>
                    
                
            </li>
            
            <li class="nav-item text-center">
                    <!-- <img src="public/img/localizar.jpg" width="60" height="60" alt="localizar"> -->
                <a class="nav-link" href="#">
                    <i class="fas fa-map-marker-alt fa-2x text-dark"></i> <br>
                    <small>Encuentranos</small>
                </a>
            </li>
            
        </ul>
    </div>
    <!-- Colapse section -->
    <div class="mx-auto order-0 ">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
            <i class="fas fa-align-justify fa-2x text-dark"></i>
        </button>
        <a class="navbar-brand" href="<?php echo base_url() ?>" >
            <img src="<?php echo base_url() ?>public/img/logo.png" width="300" alt="CandyUcab">
        </a>
    </div>
    <!-- Right section -->
    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
        
        <ul class="navbar-nav ml-auto ">
            <li class="nav-item text-center">
                    <!-- <img src="public/img/telefono.jpg " width="60" height="60" alt="telefono"> -->
                <a class="nav-link" href="#">
                    <i class="fas fa-phone-volume fa-2x text-dark"></i> <br>
                    <small>Contactanos</small>
                </a>
            </li>
            <!-- <li class="nav-item" >
                <a class="nav-link" href="#">
                    <!- - <img src="public/img/sig.jpg"   width="60" height="60" alt="Sign in"> - ->
                    <i class="fas fa-map-marker-alt fa-2x text-dark"></i> <br>
                    <small>Sig</small>
                </a>
            </li> -->
            <li class="nav-item text-center">
                <a class="nav-link " href="#">
                    <!-- <img src="public/img/carrito.png " width="60" height="60" alt="carrito"> -->
                    <i class="fas fa-shopping-cart fa-2x text-dark"></i> <br>
                    <small>Ver carrito</small>
                </a>
            </li>
        </ul>
    </div>
</nav>
<!-- make some space after the navbar -->
<br>
<br>
<br>