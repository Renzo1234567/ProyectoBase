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
            <div class="col-sm-9" id="item-detail">
                <i class="fas fa-spinner fa-pulse"></i>
            </div>
        </div>
    </div>
    <button class="btn btn-primary" id="new-item-btn">
        <i class="fas fa-plus-circle" title="crear nuevo"></i>
    </button>
</div>

<script src="<?php echo base_url() ?>public/js/punto.js"></script>
<script src="<?php echo base_url() ?>public/js/resize-master-detail.js"></script>
