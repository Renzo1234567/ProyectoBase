<!DOCTYPE html>
<html>
    <head>
        <title>Create</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo base_url() ?>public/css/bootstrap.min.css">
        <script src="<?php echo base_url() ?>public/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <h1>Create</h1>
            <form class="form-inline" action="<?php echo base_url() ?>crud/create" method="POST">
                <div class="form-group mb-2">
                    <input type="text" class="form-control" name="name" placeholder="Name">
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <input type="text" class="form-control" name="msg" placeholder="Message">
                </div>
                <button type="submit" class="btn btn-primary mb-2">Submit</button>
            </form>  
            <div class="row">
                <div class="col-md-1">
                    <a href="<?php echo base_url() ?>crud/index">Back</a>
                </div> 
            </div>  
        </div>
    </body>
</html>
