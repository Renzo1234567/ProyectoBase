<!DOCTYPE html>
<html>
    <head>
        <title>Index</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo base_url() ?>public/css/bootstrap.min.css">
        <script src="<?php echo base_url() ?>public/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Message</th>
                        <th scope="col">View</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($messages as $row): ?>
                        <tr>
                            <th scope="row"><?php echo $row->id; ?></th>
                            <td><?php echo $row->name; ?></td>
                            <td><?php echo $row->msg; ?></td>
                            <td>
                                <a href="<?php echo base_url() . 'crud/view/' . $row->id; ?>">View</a>
                            </td>
                            <td>
                                <a href="<?php echo base_url() . 'crud/edit/' . $row->id; ?>">Edit</a>
                            </td>
                            <td>
                                <a href="<?php echo base_url() . 'crud/delete/' . $row->id; ?>">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <a class="btn" href="<?php echo base_url(); ?>crud/create">Create New +</a>
        </div>
    </body>
</html>