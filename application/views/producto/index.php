<style>
    html, body {
        height: 100%;
    }
</style>

<div class="master-detail">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3" id="item-list">
                <i class="fas fa-spinner fa-pulse"></i>
            </div>
            <div class="col-sm-8" id="item-detail">
                <i class="fas fa-spinner fa-pulse"></i>
            </div>
            <div class="col-sm-1">
                <button class="btn btn-primary" id="new-item-btn">
                    <i class="fas fa-plus-circle" title="crear nuevo"></i>
                </button>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url() ?>public/js/producto.js"></script>
