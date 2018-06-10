<div class="container">
    <h1>Edit</h1>
    <form class="form-inline" action="<?php echo base_url() ?>crud/edit/<?php echo $id ?>" method="POST">
        <div class="form-group mb-2">
            <input type="text" class="form-control" name="name" placeholder="Name" value="<?php echo $name ?>">
        </div>
        <div class="form-group mx-sm-3 mb-2">
            <input type="text" class="form-control" name="msg" placeholder="Message" value="<?php echo $msg ?>">
        </div>
        <button type="submit" class="btn btn-primary mb-2">Submit</button>
    </form>
    <div class="row">
        <div class="col-md-1">
            <a href="<?php echo base_url() ?>crud/index">Back</a>
        </div>
        <div class="col-md-1">
            <a href="<?php echo base_url() . 'crud/view/' . $id ?>">View</a>
        </div>
        <div class="col-md-1">
            <a href="<?php echo base_url() . 'crud/delete/' . $id ?>">Delete</a>
        </div>  
    </div>   
</div>

