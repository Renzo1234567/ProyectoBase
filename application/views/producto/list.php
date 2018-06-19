<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
        </tr>
    </thead>
    <tbody>
        <?php if(!empty($productos)): ?>
            <?php foreach ($productos as $producto): ?>
                <tr class="item-row" data-id="<?php echo $producto['prod_id']; ?>">
                    <td scope="row"><?php echo $producto['prod_id']; ?></td>
                    <td><?php echo $producto['prod_nombre']; ?></td>
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