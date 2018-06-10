<div class="container">
    <h1>View</h1>
    <div class="row">
        <div class="col-3">
            <p>#</p>
        </div>
        <div class="col-3">
            <p>Name</p>
        </div>
        <div class="col-3">
            <p>Message</p>
        </div>  
    </div> 
    <div class="row">
        <div class="col-3">
            <p><?php echo $id ?></p>
        </div>
        <div class="col-3">
            <p><?php echo $name ?></p>
        </div>
        <div class="col-3">
            <p><?php echo $msg ?></p>
        </div>  
    </div>
    <div class="row">
        <div class="col-md-1">
            <a href="<?php echo base_url() ?>crud/index">Back</a>
        </div>
        <div class="col-md-1">
            <a href="<?php echo base_url() . 'crud/edit/' . $id ?>">Edit</a>
        </div>
        <div class="col-md-1">
            <a href="<?php echo base_url() . 'crud/delete/' . $id ?>">Delete</a>
        </div>  
    </div>            
</div>

