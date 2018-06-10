<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $row): ?>
            <tr class="item-row" data-id="<?php echo $row->id; ?>">
                <th scope="row"><?php echo $row->id; ?></th>
                <td><?php echo $row->name; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>