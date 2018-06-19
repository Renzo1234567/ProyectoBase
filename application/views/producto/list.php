<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
        </tr>
    </thead>
    <tbody>
        <?php if(!empty($productos)): ?>
            <?php foreach ($data as $row): ?>
                <tr class="item-row" data-id="<?php echo $row->id; ?>">
                    <td scope="row"><?php echo $row->id; ?></td>
                    <td><?php echo $row->name; ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="2">
                    <span class="text-info">Sin inventario</span>
                </td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>